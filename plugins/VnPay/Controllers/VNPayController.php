<?php

namespace Plugin\VnPay\Controllers;

use Beike\Models\Order;
use Beike\Models\OrderHistory;
use Beike\Repositories\OrderPaymentRepo;
use Beike\Services\StateMachineService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PayPay\OpenPaymentAPI\Client;
use PayPay\OpenPaymentAPI\Models\CreateQrCodePayload;
use PayPay\OpenPaymentAPI\Models\OrderItem;

class VNPayController
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'API_KEY'     => env('PAYPAY_API_KEY'),
            'API_SECRET'  => env('PAYPAY_API_SECRET'),
            'MERCHANT_ID' => env('PAYPAY_MERCHANT_ID'),
            'production'  => false, // Set to true for production environment
        ]);
    }

    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $orderNumber = $data['orderNumber'];
        $orderId     = $data['orderId'];
        $returnUrl   = env('APP_URL') . '/vn-pay/capture';

        // Prepare the payload
        $CQCPayload = new CreateQrCodePayload;
        $CQCPayload->setMerchantPaymentId($orderNumber);
        $CQCPayload->setRequestedAt();
        $CQCPayload->setCodeType('ORDER_QR');

        $orderItem = new OrderItem;
        $orderItem->setName('Order Payment')
            ->setQuantity(1)
            ->setUnitPrice(['amount' => round($data['amount']), 'currency' => 'JPY']);
        $CQCPayload->setOrderItems([$orderItem]);

        $amount = [
            'amount'   => round($data['amount']),
            'currency' => 'JPY',
        ];
        $CQCPayload->setAmount($amount);
        $CQCPayload->setRedirectType('WEB_LINK');
        $CQCPayload->setRedirectUrl($returnUrl);

        // Send the request
        $response = $this->client->code->createQRCode($CQCPayload);

        Log::info('PayPayController create response', ['response' => $response]);

        if ($response && $response['resultInfo']['code'] === 'SUCCESS') {
            OrderPaymentRepo::createOrUpdatePayment($orderId, ['request' => $CQCPayload, 'receipt' => round($data['amount'])]);

            return response()->json(['url' => $response['data']['url']]);
        }

        return response()->json(['error' => 'Payment creation failed. Please try again later.'], 500);
    }

    public function capture(Request $request)
    {
        $inputData = $request->all();
        Log::info('PayPayController capture', ['inputData' => $inputData]);

        if ($inputData['status'] == 'COMPLETED') {
            $customer     = auth()->user();
            $orderNumber  = $inputData['merchantPaymentId'];
            $order        = Order::where('number', $orderNumber)->where('customer_id', $customer->id)->firstOrFail();
            $orderHistory = OrderHistory::where('order_id', $order->id)->where('status', StateMachineService::PAID)->first();

            try {
                DB::beginTransaction();
                $order->update(['status' => StateMachineService::PAID]);
                if (empty($orderHistory)) {
                    OrderHistory::create([
                        'order_id' => $order->id,
                        'status'   => StateMachineService::PAID,
                        'notify'   => 0,
                        'comment'  => 'Paid via PayPay',
                    ]);
                }
                OrderPaymentRepo::createOrUpdatePayment($order->id, ['response' => $inputData, 'transaction_id' => $inputData['transaction_id']]);
                DB::commit();

                return view('vn_pay/vn_pay', ['inputData' => $inputData, 'order' => $order, 'message' => 'success']);
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Payment capture failed: ' . $e->getMessage());
            }
        }

        return view('vn_pay/vn_pay', ['inputData' => $inputData, 'message' => 'fail']);
    }
}
