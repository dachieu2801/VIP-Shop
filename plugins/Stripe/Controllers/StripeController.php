<?php

namespace Plugin\Stripe\Controllers;

use Beike\Repositories\OrderPaymentRepo;
use Beike\Repositories\OrderRepo;
use Beike\Services\StateMachineService;
use Beike\Shop\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Plugin\Stripe\Services\StripeService;

class StripeController extends Controller
{
    public function capture(Request $request): JsonResponse
    {
        try {
            $number         = request('order_number');
            $customer       = current_customer();
            $order          = OrderRepo::getOrderByNumber($number, $customer);
            $creditCardData = $request->all();

            OrderPaymentRepo::createOrUpdatePayment($order->id, ['request' => $creditCardData]);
            $result = (new StripeService($order))->capture($creditCardData);
            OrderPaymentRepo::createOrUpdatePayment($order->id, ['response' => $result]);

            if ($result) {
                StateMachineService::getInstance($order)->setShipment()->changeStatus(StateMachineService::PAID);

                return json_success(trans('Stripe::common.capture_success'));
            }

            return json_success(trans('Stripe::common.capture_fail'));

        } catch (\Exception $e) {
            return json_fail($e->getMessage());
        }
    }

    public function callback(Request $request): JsonResponse
    {

        try {
            $requestData = $request->all();
            Log::info('Request data: ' . json_encode($requestData));

            $type        = $requestData['type'];
            $orderNumber = $request['data']['object']['metadata']['order_number'] ?? '';
            $order       = OrderRepo::getOrderByNumber($orderNumber);

            Log::info('Request type: ' . $type);
            Log::info('Request number: ' . $orderNumber);

            if ($type == 'charge.succeeded' && $order) {
                StateMachineService::getInstance($order)->setShipment()->changeStatus(StateMachineService::PAID);

                return json_success(trans('Stripe::common.capture_success'));
            }

            return json_success(trans('Stripe::common.capture_fail'));

        } catch (\Exception $e) {
            Log::info('Stripe error: ' . $e->getMessage());

            return json_success($e->getMessage());
        }
    }
}
