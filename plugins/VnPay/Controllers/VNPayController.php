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
use Beike\Repositories\SettingRepo;
use Beike\Services\StateMachineService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function json_decode;

class VNPayController
{
    public function create(Request $request)
    {
        $data                 = json_decode($request->getContent(), true);
        $vnp_Url              = $data['vnp_Url'];
        $vnp_TmnCode          = $data['vnp_TmnCode'];
        $vnp_HashSecret       = $data['vnp_HashSecret'];
        $orderNumber          = $data['orderNumber'];
        $orderId              = $data['orderId'];
        $vnp_ReturnUrl        = env('APP_URL') . '/vn-pay/capture';
        // Tạo mảng dữ liệu gửi tới VNPAY
        $inputData = [
            'vnp_Version'    => '2.1.0',
            'vnp_TmnCode'    => $vnp_TmnCode,
            'vnp_Amount'     => round($data['amount']) * 100,
            'vnp_Command'    => 'pay',
            'vnp_CreateDate' => Carbon::now()->format('YmdHis'),
            'vnp_CurrCode'   => 'VND',
            'vnp_IpAddr'     => $data['ip'],
            'vnp_Locale'     => 'vn',
            'vnp_OrderInfo'  => 'Thanh toan GD:' . $orderNumber,
            'vnp_OrderType'  => 'other',
            'vnp_ReturnUrl'  => $vnp_ReturnUrl,
            'vnp_TxnRef'     => $orderNumber,
        ];
        ksort($inputData);
        $query    = '';
        $i        = 0;
        $hashdata = '';

        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . '=' . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . '=' . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . '=' . urlencode($value) . '&';
        }

        $vnp_Url       = $vnp_Url . '?' . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        OrderPaymentRepo::createOrUpdatePayment($orderId, ['request' => $inputData ?? '', 'receipt' => round($data['amount']) * 100]);

        return response()->json(['url' => $vnp_Url]);
    }

    public function capture(Request $request)
    {
        $vn_pay         = SettingRepo::getPluginColumns('vn_pay');
        $vnp_HashSecret = $vn_pay['vnp_HashSecret']['value'];
        $inputData      = $request->all();

        Log::log('info', 'VNPayController capture', ['$inputData' => $inputData]);

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);

        ksort($inputData);

        $query = '';
        foreach ($inputData as $key => $value) {
            $query .= urlencode($key) . '=' . urlencode($value) . '&';
        }
        $query           = rtrim($query, '&');
        $checkSecureHash = hash_hmac('sha512', $query, $vnp_HashSecret);

        if ($checkSecureHash === $vnp_SecureHash) {
            $order;
            if ($inputData['vnp_ResponseCode'] == '00') {
                $customer     = current_customer();
                $orderNumber  = $inputData['vnp_TxnRef'];
                $order        = Order::where('number', $orderNumber)->where('customer_id', $customer->id)->firstOrFail();
                $orderHistory = OrderHistory::where('order_id', $order->id)->where('status', StateMachineService::PAID)->first();

                try {
                    DB::beginTransaction();
                    $order->update([
                        'status' => StateMachineService::PAID,
                    ]);
                    if (empty($orderHistory)) {
                        OrderHistory::create([
                            'order_id' => $order->id,
                            'status'   => StateMachineService::PAID,
                            'notify'   => 0,
                            'comment'  => 'Thanh toán qua VNPay',
                        ]);
                    }
                    OrderPaymentRepo::createOrUpdatePayment($order->id, ['response' => $inputData ?? '', 'transaction_id' => $inputData['vnp_TransactionNo']]);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                }

                //thành công
                return view('vn_pay/vn_pay', ['inputData' => $inputData, 'order'=>$order, 'message'=> 'success']);
            }

            // thanh toán lỗi
            return view('vn_pay/vn_pay', ['inputData' => $inputData ,'message'=> 'fail']);

        }
        return view('vn_pay/vn_pay', ['message'=> 'Invalid signature']);
    }
}
