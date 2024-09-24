<?php
/**
 * OrderController.php
 *

 * @created    2022-07-05 10:29:07
 * @modified   2022-07-05 10:29:07
 */

namespace Beike\Shop\Http\Controllers\Account;

use Beike\Models\Order;
use Beike\Repositories\OrderRepo;
use Beike\Services\StateMachineService;
use Beike\Shop\Http\Controllers\Controller;
use Beike\Shop\Http\Resources\Account\OrderSimpleList;
use Beike\Shop\Services\PaymentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * 获取当前客户订单列表
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        if ($request->get('status') == 'not_yet_reviewed' || $request->get('status') == 'reviewed') {
            $filters = [
                'customer' => current_customer(),
                'status'   => 'completed',
            ];
            $orders        = OrderSimpleList::collection(OrderRepo::filterOrders($filters));
            $orderProducts = [];
            foreach ($orders as $order) {
                $orderProduct = $order->orderProducts;
                foreach ($orderProduct as $product) {
                    if ($request->get('status') == 'not_yet_reviewed') {
                        if (! $product['reviewed']) {
                            $orderProducts[] = $product;
                        }
                    } else {
                        if ($product['reviewed'] == 'reviewed') {
                            $orderProducts[] = $product;
                        }
                    }
                }
            }
            $data   = [
                'orders'        => $orders,
                'orderProducts' => $orderProducts,
                'review'        => true,
            ];

            return view('account/order', $data);
        }
        $filters = [
            'customer' => current_customer(),
            'status'   => $request->get('status'),
        ];

        $orders = OrderRepo::filterOrders($filters);
        $data   = [
            'orders' => OrderSimpleList::collection($orders),
            'review' => false,
        ];

        Log::log('info', 'account.order.index.data', ['data' => $data]);

        return view('account/order', $data);

    }

    /**
     * 获取当前客户订单列表
     *
     * @param Request $request
     * @param         $number
     * @return View
     */
    public function show(Request $request, $number): View
    {
        $customer = current_customer();
        $order    = OrderRepo::getOrderByNumber($number, $customer);
        $data     = hook_filter('account.order.show.data', ['order' => $order, 'html_items' => []]);

        return view('account/order_info', $data);
    }

    /**
     * 订单支付页面
     *
     * @param Request $request
     * @param         $number
     * @return mixed
     * @throws \Exception
     */
    public function pay(Request $request, $number)
    {
        try {
            $customer = current_customer();
            $order    = OrderRepo::getOrderByNumber($number, $customer);
            hook_action('account.order.pay.before', ['order' => $order]);

            return (new PaymentService($order))->pay();
        } catch (\Exception $e) {
            return redirect(shop_route('account.order.show', $number))->withErrors($e->getMessage());
        }
    }

    /**
     * 完成订单
     *
     * @param Request $request
     * @param         $number
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function complete(Request $request, $number)
    {
        $customer = current_customer();
        $order    = OrderRepo::getOrderByNumber($number, $customer);
        if (empty($order)) {
            throw new \Exception(trans('shop/order.invalid_order'));
        }
        $comment = trans('shop/order.confirm_order');
        StateMachineService::getInstance($order)->changeStatus(StateMachineService::COMPLETED, $comment);

        return json_success(trans('shop/account/order.completed'));
    }

    /**
     * 取消订单
     *
     * @param Request $request
     * @param         $number
     * @return array
     * @throws \Exception
     */
    public function cancel(Request $request, $number)
    {
        $customer = current_customer();
        $order    = OrderRepo::getOrderByNumber($number, $customer);
        if (empty($order)) {
            throw new \Exception(trans('shop/order.invalid_order'));
        }
        $comment = trans('shop/order.cancel_order');

        Log::log('info', 'account.order.index.order', ['data' => $order]);

        if (! $request->input('cancellation_reason')) {
            return json_success(trans('shop/account/order.reason_empty'));
        }

        try {
            DB::beginTransaction();
            StateMachineService::getInstance($order)->changeStatus(StateMachineService::CANCELLED, $comment);
            OrderRepo::cancelOrder($number, $request->input('cancellation_reason'));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw new \Exception($e->getMessage());
        }

        return json_success(trans('shop/account/order.cancelled'));
    }

    public function showTrackingOrderPage()
    {
        return view('order_tracking');
    }

    public function showTracking(Request $request, $number)
    {
        $order = Order::query()->where('number', $number)->get();
        if ($order->isEmpty()) { // Check if the collection is empty
            $order = Order::query()->where('shipping_telephone', $number)->orderBy('id', 'desc')->get();        }
        $jsonData = $order->toJson();

        return response()->json($jsonData);
    }
}
