<?php
/**
 * CheckoutController.php
 *
 * @copyright  2022 beikeshop.com - All Rights Reserved
 * @link       https://beikeshop.com
 * @author     Edward Yang <yangjin@guangda.work>
 * @created    2022-06-28 16:47:57
 * @modified   2022-06-28 16:47:57
 */

namespace Beike\Shop\Http\Controllers;

use Beike\Models\AdminUser;
use Beike\Notifications\sendNewOrderNotification;
use Beike\Repositories\OrderRepo;
use Beike\Shop\Services\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        try {
            $data = (new CheckoutService)->checkoutData();
            Log::log('info', 'checkout.index.data111111', ['data' => $data]);
            $data = hook_filter('checkout.index.data', $data);

            return view('checkout', $data);
        } catch (\Exception $e) {
            return redirect(shop_route('carts.index'))->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * 更改结算信息
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request): mixed
    {
        try {
            $requestData = $request->all();

            $data = (new CheckoutService)->update($requestData);

            return hook_filter('checkout.update.data', $data);
        } catch (\Exception $e) {
            return json_fail($e->getMessage());
        }
    }

    /**
     * 确认提交订单
     *
     * @return mixed
     * @throws \Throwable
     */
    public function confirm()
    {
        try {
            $data = (new CheckoutService)->confirm();
            Log::log('info', 'checkout.confirm.data', ['data' => $data]);
            $orderProducts = [];
            foreach ($data->orderProducts as $product) {
                $orderProducts[] = [
                    'product_name'         => $product['name'],
                    'product_quantity'     => $product['quantity'],
                    'product_total'        => $product['price'],
                    'product_total_format' => $product['price_format'],
                ];
            }

            $buyer = [
                'product_name'    => $orderProducts,
                'buyer_id'        => $data['customer_id'] ?? 0,
                'buyer_email'     => $data['email'],
                'title'           => 'Thông báo từ VIPShop, mã đơn hàng ' . $data['number'] . ' đã được tạo',
                'sub_title'       => 'Đặt Hàng Thành Công!!!',
                'thanks_1'        => 'Chân thành cảm ơn quý khách đã lựa chọn VIPShop.',
                'thanks_2'        => 'Chúng tôi hy vọng Quý khách hài lòng với dịch vụ đã chọn!',
                'tracking_number' => $data['number'],
                'total'           => $data['total'],
                'date'            => $data['updated_at'],
                'name'            => $data['customer_name'],
                'status_payment'  => $data['status_format'],
                'payment_method'  => $data['payment_method_name'],
                'total_format'    => $data['total_format'],
                'telephone'       => $data['payment_telephone'],
                'address'         => $data['payment_address_1'] . ' ' . $data['payment_address_1'] . ' ' . $data['payment_city'] . ' ' . $data['payment_zone'],
            ];
            $sellers = [];
            $admins  = AdminUser::all();
            foreach ($admins as $admin) {
                $sellers[] = [
                    'product_name'     => $orderProducts,
                    'admin_id '        => $admin['id'],
                    'admin_email'      => $admin['email'],
                    'sub_title'        => 'Đơn Hàng Mới!!!',
                    'title'            => 'Có đơn hàng mới. Mã đơn hàng ' . $data['number'],
                    'tracking_number'  => $data['number'],
                    'total'            => $data['total'],
                    'date'             => $data['updated_at'],
                    'name'             => $data['customer_name'],
                    'status_payment'   => $data['status_format'],
                    'payment_method'   => $data['payment_method_name'],
                    'total_format'     => $data['total_format'],
                    'telephone'        => $data['payment_telephone'],
                    'address'          => $data['payment_address_1'] . ' ' . $data['payment_address_1'] . ' ' . $data['payment_city'] . ' ' . $data['payment_zone'],
                ];
            }
            $dataSend = [
                'buyer'    => $buyer,
                'seller'   => $sellers,
                'template' => 'vipshop',
                'type'     => 'vipshop',
            ];
            $dataEncrypted = $this->encrypt($dataSend);
            sendNewOrderNotification::handleSendOrder($dataEncrypted, env('ENDPOINT_SEND_MAIL', 'api/sendMail/vipshop-notification'));

            return hook_filter('checkout.confirm.data', $data);
        } catch (\Exception $e) {
            return json_fail($e->getMessage());
        }
    }

    public function success()
    {
        $order_number = request('order_number');

        $customer = current_customer();
        $order    = OrderRepo::getOrderByNumber($order_number, $customer);
        $data     = hook_filter('account.order.show.data', ['order' => $order, 'html_items' => []]);

        return view('checkout/success', $data);
    }

    public function decrypt($encrypted): string
    {
        return openssl_decrypt($encrypted, 'aes-256-cbc', env('CREATE_TOKEN_KEY'), 0, env('CREATE_TOKEN_IV'));
    }

    public function encrypt($data): string
    {
        return openssl_encrypt(json_encode($data), 'aes-256-cbc', env('CREATE_TOKEN_KEY'), 0, env('CREATE_TOKEN_IV'));
    }
}
