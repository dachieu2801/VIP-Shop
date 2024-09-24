<?php
/**
 * BankTransferController.php
 *

 * @created    2022-08-10 18:57:56
 * @modified   2022-08-10 18:57:56
 *
 * https://www.zongscan.com/demo333/1311.html
 * https://clickysoft.com/how-to-integrate-paypal-payment-gateway-in-laravel/
 * https://www.positronx.io/how-to-integrate-paypal-payment-gateway-in-laravel/
 */

namespace Plugin\PhuongThuc1\Controllers;

use Beike\Repositories\OrderRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BankTransferController
{
    public function create(Request $request): JsonResponse
    {
        $data        = \json_decode($request->getContent(), true);
        $orderNumber = $data['orderNumber'];
        $customer    = current_customer();
        $order       = OrderRepo::getOrderByNumber($orderNumber, $customer);

        return response()->json($order);
    }
}
