<?php
/**
 * VNPayController.php
 *
 * @copyright  2022 beikeshop.com - All Rights Reserved
 * @link       https://beikeshop.com
 * @author     Edward Yang <yangjin@guangda.work>
 * @created    2022-08-10 18:57:56
 * @modified   2022-08-10 18:57:56
 *
 * https://www.zongscan.com/demo333/1311.html
 * https://clickysoft.com/how-to-integrate-paypal-payment-gateway-in-laravel/
 * https://www.positronx.io/how-to-integrate-paypal-payment-gateway-in-laravel/
 */

namespace Plugin\VnPay\Controllers;

use Beike\Models\Order;
use Beike\Models\OrderHistory;
use Beike\Repositories\OrderPaymentRepo;
use Beike\Services\StateMachineService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function json_decode;

class VNPayController
{
    public function create(Request $request)
    {
        $data        = json_decode($request->getContent(), true);

        $paypayUrl   = env('PAYPAY_BASE_URI') . '/v2/payments';
        $apiKey      = env('PAYPAY_API_KEY');
        $apiSecret   = env('PAYPAY_API_SECRET');
        $orderNumber = $data['orderNumber'];
        $orderId     = $data['orderId'];
        $returnUrl   = env('APP_URL') . '/vn-pay/capture';

        // Tạo mảng dữ liệu gửi tới PayPay
        $inputData = [
            'merchantPaymentId' => $orderNumber,
            'amount'            => [
                'amount'   => round($data['amount']),
                'currency' => 'JPY',
            ],
            'userAuthorizationId' => $orderNumber,
            'requestedAt'         => now()->timestamp,
            'redirectUrl'         => $returnUrl,
            'redirectType'        => 'WEB_LINK',
        ];

        $response = $this->sendPayPayRequest($paypayUrl, $inputData, $apiKey, $apiSecret);
        Log::info('PayPayController capture---------------2', ['$inputData' => $response['data']['redirectUrl']]);

        if ($response && isset($response['resultInfo']['code']) && $response['resultInfo']['code'] === 'SUCCESS') {
            OrderPaymentRepo::createOrUpdatePayment($orderId, ['request' => $inputData, 'receipt' => round($data['amount'])]);
            Log::info('PayPayController capture---------------1', ['$inputData' => $response['data']['redirectUrl']]);
            return response()->json(['url' => $response['data']['redirectUrl']]);
        }
        Log::info('PayPayController capture---------------3', ['$inputData' => $response['data']['redirectUrl']]);

        return response()->json(['error' => 'Payment creation failed. Please try again later.'], 500);
    }

    public function capture(Request $request)
    {
        $inputData = $request->all();
        Log::info('PayPayController capture', ['$inputData' => $inputData]);

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

    private function sendPayPayRequest($url, $data, $apiKey, $apiSecret)
    {
        try {
            Log::info('PayPayController capture1', ['$inputData' => $url]);
            Log::info('PayPayController capture2', ['$inputData' => $data]);
            Log::info('PayPayController capture3', ['$inputData' => $apiKey]);
            Log::info('PayPayController capture4', ['$inputData' => $apiSecret]);

            $client   = new \GuzzleHttp\Client;
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type'  => 'application/json',
                    'X-API-KEY'     => $apiSecret,
                ],
                'json' => $data,
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error('PayPay API request failed: ' . $e->getMessage());
            return null;
        }
    }
}
