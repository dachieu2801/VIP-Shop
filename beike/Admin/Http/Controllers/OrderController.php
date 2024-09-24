<?php


namespace Beike\Admin\Http\Controllers;

use Beike\Admin\Http\Resources\OrderSimple;
use Beike\Models\Order;
use Beike\Models\OrderProduct;
use Beike\Models\OrderShipment;
use Beike\Models\OrderTotal;
use Beike\Repositories\OrderRepo;
use Beike\Repositories\PluginRepo;
use Beike\Services\ShipmentService;
use Beike\Services\StateMachineService;
use Beike\Shop\Http\Resources\Account\OrderShippingList;
use Beike\Shop\Http\Resources\Account\OrderSimpleList;
use Beike\Shop\Http\Resources\Checkout\PaymentMethodItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = OrderRepo::filterOrders($request->all());
        $data   = [
            'orders'          => OrderSimpleList::collection($orders),
            'statuses'        => StateMachineService::getAllStatuses(),
            'type'            => 'index',
        ];
        $data = hook_filter('admin.order.index.data', $data);

        return view('admin::pages.orders.index', $data);
    }

    public function trashed(Request $request)
    {
        $requestData            = $request->all();
        $requestData['trashed'] = true;
        $orders                 = OrderRepo::filterOrders($requestData);
        $data                   = [
            'orders'          => OrderSimpleList::collection($orders),
            'statuses'        => StateMachineService::getAllStatuses(),
            'type'            => 'trashed',
        ];
        $data = hook_filter('admin.order.trashed.data', $data);

        return view('admin::pages.orders.index', $data);
    }

    public function export(Request $request)
    {
        try {
            $orders = OrderRepo::filterAll($request->all());
            $items  = OrderSimple::collection($orders)->jsonSerialize();
            $items  = hook_filter('admin.order.export.data', $items);

            return $this->downloadCsv('orders', $items, 'order');
        } catch (\Exception $e) {
            return redirect(admin_route('orders.index'))->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Request $request, Order $order)
    {
        $order->load(['orderTotals', 'orderHistories', 'orderShipments', 'orderPayments']);

        $data                     = hook_filter('admin.order.show.data', ['order' => $order, 'html_items' => []]);
        $data['statuses']         = StateMachineService::getInstance($order)->nextBackendStatuses();
        $data['expressCompanies'] = system_setting('base.express_company', []);
        hook_action('admin.order.show.after', $data);

        Log::info('ádasd',['ádad'=>$data]);
        return view('admin::pages.orders.form', $data);
    }

    public function edit(Request $request, Order $order)
    {
        $order->load(['orderTotals', 'orderHistories', 'orderShipments', 'orderPayments']);
        $payments                 = PaymentMethodItem::collection(PluginRepo::getPaymentMethods())->jsonSerialize();
        $data                     = hook_filter('admin.order.edit.data', ['order' => $order, 'html_items' => []]);
        $data['statuses']         = StateMachineService::getInstance($order)->nextBackendStatuses();
        $data['paymentMethod']    = $payments;
        $data['expressCompanies'] = system_setting('base.express_company', []);
        hook_action('admin.order.edit.after', $data);

        return view('admin::pages.orders.edit', $data);
    }

    public function update(Request $request, Order $order)
    {
        $requestData = $request->all();

        // Update Order
        Order::where('id', $requestData['id'])->update([
            'payment_method_code' => $requestData['paymentMethod']['code'],
            'payment_method_name' => $requestData['paymentMethod']['name'],
            'total'               => $requestData['orderTotals']['order_total'],
        ]);

        // Update Order Products
        foreach ($requestData['products'] as $productData) {
            OrderProduct::where('id', $productData['id'])
                ->update([
                    'product_sku' => $productData['sku'],
                    'name'        => $productData['name'],
                    'price'       => $productData['price'],
                    'quantity'    => $productData['quantity'],
                ]);
        }

        // Update Order Totals
        foreach ($requestData['orderTotals'] as $code => $value) {
            OrderTotal::where('order_id', $requestData['id'])
                ->where('code', $code)->update([
                'value' => $value,
            ]);
        }

        // Return a response or redirect
        return response()->json(['message' => 'Order updated successfully']);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $status  = $request->get('status');
        $comment = $request->get('comment');
        $notify  = $request->get('notify');

        $shipment = ShipmentService::handleShipment(\request('express_code'), \request('express_number'));

        $stateMachine = new StateMachineService($order);
        $stateMachine->setShipment($shipment)->changeStatus($status, $comment, $notify);

        $orderStatusData = $request->all();

        hook_action('admin.order.update_status.after', $orderStatusData);

        return json_success(trans('common.updated_success'));
    }

    /**
     * 更新发货信息
     */
    public function updateShipment(Request $request, Order $order, int $orderShipmentId): JsonResponse
    {
        $data          = $request->all();
        $orderShipment = OrderShipment::query()->where('order_id', $order->id)->findOrFail($orderShipmentId);
        ShipmentService::updateShipment($orderShipment, $data);
        hook_action('admin.order.update_shipment.after', [
            'request_data' => $data,
            'shipment'     => $orderShipment,
        ]);

        return json_success(trans('common.updated_success'));
    }

    public function destroy(Request $request, Order $order)
    {
        $order->delete();
        hook_action('admin.order.destroy.after', $order);

        return json_success(trans('common.deleted_success'));
    }

    public function restore(Request $request)
    {
        $id = $request->id ?? 0;
        Order::withTrashed()->find($id)->restore();

        hook_action('admin.product.restore.after', $id);

        return ['success' => true];
    }

    public function shipping(Request $request)
    {
        $orderIds = $request->get('selected', '');
        $orderId  = $request->get('order_id');
        if (! $orderIds && $orderId) {
            $orderIds = $orderId;
        }
        $orderIds = explode(',', $orderIds);
        $orders   = OrderRepo::filterAll(['order_ids' => $orderIds]);

        $data = [
            'orders' => OrderShippingList::collection($orders)->jsonSerialize(),
        ];

        $data = hook_filter('admin.order.shipping.data', $data);

        return view('admin::pages.orders.shipping', $data);
    }
}
