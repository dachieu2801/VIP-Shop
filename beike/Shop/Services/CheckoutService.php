<?php
/**
 * CheckoutService.php
 *

 * @created    2022-06-30 19:37:05
 * @modified   2022-06-30 19:37:05
 */

namespace Beike\Shop\Services;

use Beike\Exceptions\CartException;
use Beike\Libraries\Weight;
use Beike\Models\Address;
use Beike\Models\Country;
use Beike\Models\Order;
use Beike\Models\Zone;
use Beike\Repositories\AddressRepo;
use Beike\Repositories\CartRepo;
use Beike\Repositories\CountryRepo;
use Beike\Repositories\OrderRepo;
use Beike\Repositories\PluginRepo;
use Beike\Repositories\ProductSkuRepo;
use Beike\Repositories\SettingRepo;
use Beike\Repositories\VouchersRepo;
use Beike\Services\PaymentMethodService;
use Beike\Services\ShippingMethodService;
use Beike\Services\StateMachineService;
use Beike\Shop\Http\Controllers\CheckoutController;
use Beike\Shop\Http\Resources\Account\AddressResource;
use Beike\Shop\Http\Resources\Checkout\PaymentMethodItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutService
{
    public $customer;

    public $cart;

    public $voucher;

    public $selectedProducts;

    public $totalService;

    public function __construct($customer = null)
    {
        if (is_int($customer) || empty($customer)) {
            $customer = current_customer();
        }
        $this->customer         = $customer;
        $this->cart             = CartRepo::createCart($this->customer);
        $this->selectedProducts = CartRepo::selectedCartProducts($this->customer->id ?? 0);
        if ($this->selectedProducts->count() == 0) {
            throw new CartException(trans('shop/carts.empty_selected_products'));
        }
    }

    public function update($requestData): array
    {
        $receivingMethod    = $requestData['receiving_method']     ?? '';
        $pickUpAddress      = $requestData['pick_up_address']      ?? '';
        $pickUpTime         = $requestData['pick_up_time']         ?? '';
        $name               = $requestData['name']                 ?? '';
        $phone              = $requestData['phone']                ?? '';
        $voucherId          = $requestData['voucher_id']           ?? 0;
        $shippingAddressId  = $requestData['shipping_address_id']  ?? 0;
        $shippingMethodCode = $requestData['shipping_method_code'] ?? '';

        $paymentAddressId      = $requestData['payment_address_id']  ?? 0;
        $paymentMethodCode     = $requestData['payment_method_code'] ?? '';

        $guestShippingAddress = $requestData['guest_shipping_address'] ?? [];
        $guestPaymentAddress  = $requestData['guest_payment_address']  ?? [];

        hook_action('service.checkout.update.before', ['request_data' => $requestData, 'cart' => $this->cart]);

        if ($shippingAddressId) {
            $this->updateShippingAddressId($shippingAddressId);
        }
        if ($shippingMethodCode) {
            $this->updateShippingMethod($shippingMethodCode);
        }
        if ($voucherId) {
            $this->updateVoucherId($voucherId);
        }
        if ($paymentAddressId) {
            $this->updatePaymentAddressId($paymentAddressId);
        }
        if ($paymentMethodCode) {
            $this->updatePaymentMethod($paymentMethodCode);
        }
        if ($guestShippingAddress) {
            $this->updateGuestShippingAddress($guestShippingAddress);
        }
        if ($guestPaymentAddress) {
            $this->updateGuestPaymentAddress($guestPaymentAddress);
        }
        if ($receivingMethod) {
            $this->updateReceivingMethod($receivingMethod);
        }
        if ($pickUpAddress) {
            $this->updatePickUpAddress($pickUpAddress);
        }
        if ($pickUpTime) {
            $this->updatePickUpTime($pickUpTime);
        }

        if ($name) {
            $this->updateName($name);
        }

        if ($phone) {
            $this->updatePhone($phone);
        }

        hook_action('service.checkout.update.after', ['request_data' => $requestData, 'checkout' => $this]);
        $data = $this->checkoutData();

        return $data;
    }

    public function confirm($voucher_id = 0): Order
    {
        $customer                         = $this->customer;
        $checkoutData                     = self::checkoutData();
        $checkoutData['customer']         = $customer;
        $checkoutData['comment']          = request('comment');
        $checkoutData['receive_time']     = request('receive_time');

        if ($checkoutData['current']['receiving_method'] == 'shipping' && ! request('receive_time')) {
            throw new \Exception('Vui lòng chọn thời gian nhận');
        }

        if ($voucher_id) {
            $voucher = (new VouchersRepo)->getByIdActive($voucher_id);
            if (! $voucher) {
                throw new \Exception('Voucher không tồn tại hoặc đã hết hạn');
            }
            $checkoutData['current']['voucher_id'] = $voucher_id;
            $newTotals                             = [];
            $orderTotal                            = null;
            foreach ($checkoutData['totals'] as $item) {
                if ($item['code'] === 'order_total') {
                    $orderTotal = $item;
                } else {
                    $newTotals[] = $item;
                }
            }
            if ($voucher['discount_type'] == 'percentage') {
                $amount       = floatval($voucher['discount_value']) / 100 * floatval($orderTotal['amount']);
                $newTotals[]  = [
                    'code'          => 'voucher_id',
                    'title'         => $voucher['name'],
                    'amount'        => $amount,
                    'amount_format' => '- ' . currency_format($amount),
                ];
                $amountTotal = max(floatval($orderTotal['amount']) - $amount, 0);
                $newTotals[] = [
                    'code'          => 'order_total',
                    'title'         => trans('shop/carts.order_total'),
                    'amount'        => $amountTotal,
                    'amount_format' => currency_format($amountTotal),
                ];
            } else {
                $amount       = floatval($voucher['discount_value']);
                $newTotals[]  = [
                    'code'          => 'voucher_id',
                    'title'         => $voucher['name'],
                    'amount'        => $amount,
                    'amount_format' => '- ' . currency_format($amount),
                ];
                $amountTotal = max(floatval($orderTotal['amount']) - $amount, 0);
                $newTotals[] = [
                    'code'          => 'order_total',
                    'title'         => trans('shop/carts.order_total'),
                    'amount'        => $amountTotal,
                    'amount_format' => currency_format($amountTotal),
                ];
            }
            $checkoutData['totals'] = $newTotals;
        }
        $calculationService = new CheckoutController;

        $checkoutData       = $calculationService->applyPaymentFee($checkoutData);
        $checkoutData       = $calculationService->applyTax($checkoutData);

        $this->validateConfirm($checkoutData);
        $carts = $checkoutData['carts']['carts'];

        try {
            DB::beginTransaction();

            $order = OrderRepo::create($checkoutData);
            StateMachineService::getInstance($order)->changeStatus(StateMachineService::UNPAID, '', true);
            CartRepo::clearSelectedCartProducts($customer);
            foreach ($carts as $cart) {
                ProductSkuRepo::updateQuantitySold($cart['sku_id'], $cart['quantity']);
            }
            hook_action('service.checkout.confirm.after', ['order' => $order, 'cart' => $this->cart]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $order;
    }

    public function getCartWeight(): float
    {
        $weight           = 0;
        $selectedProducts = $this->selectedProducts;
        foreach ($selectedProducts as $product) {
            $weight += Weight::getInstance()->convert($product->product['weight'] * $product['quantity'], $product->product['weight_class']);
        }

        return $weight;
    }

    private function validateConfirm($checkoutData)
    {
        $current = $checkoutData['current'];

        if ($this->customer) {
            if ($current['receiving_method'] == 'shipping') {
                if ($this->shippingRequired()) {
                    $shippingAddressId = $current['shipping_address_id'];
                    if (empty(Address::query()->find($shippingAddressId))) {
                        throw new \Exception(trans('shop/carts.invalid_shipping_address'));
                    }
                }
                $paymentAddressId = $current['payment_address_id'];
                if (empty(Address::query()->find($paymentAddressId))) {
                    throw new \Exception(trans('shop/carts.invalid_payment_address'));
                }
            } else {
                if (! $current['pick_up_time'] || ! $current['pick_up_address']
                                               || ! $current['name'] || ! $current['phone']) {
                    throw new \Exception('Vui lòng nhập đủ thông tin và ấn lưu');
                }
            }

        } else {
            if ($current['receiving_method'] == 'shipping') {
                if ($this->shippingRequired() && ! $current['guest_shipping_address']) {
                    throw new \Exception(trans('shop/carts.invalid_shipping_address'));
                }

                if (! $current['guest_payment_address']) {
                    throw new \Exception(trans('shop/carts.invalid_payment_address'));
                }
            } else {
                if (! $current['pick_up_time'] || ! $current['pick_up_address']
                                               || ! $current['name'] || ! $current['phone']) {
                    throw new \Exception('Vui lòng nhập đủ thông tin và ấn lưu');
                }
            }
        }

        if ($current['receiving_method'] == 'shipping') {
            if ($this->showShippingMethod()) {
                $shippingMethodCode = $current['shipping_method_code'];
                if (! PluginRepo::shippingEnabled($shippingMethodCode)) {
                    throw new \Exception(trans('shop/carts.invalid_shipping_method'));
                }
            }

            $paymentMethodCode = $current['payment_method_code'];
            if (! PluginRepo::paymentEnabled($paymentMethodCode)) {
                throw new \Exception(trans('shop/carts.invalid_payment_method'));
            }
        }

        hook_action('service.checkout.validate_confirm.after', $checkoutData);
    }

    private function updateShippingAddressId($shippingAddressId)
    {
        $this->cart->update(['shipping_address_id' => $shippingAddressId]);
        $this->cart->load('shippingAddress');
    }

    private function updatePaymentAddressId($paymentAddressId)
    {
        $this->cart->update(['payment_address_id' => $paymentAddressId]);
        $this->cart->load('paymentAddress');
    }

    private function updateVoucherId($voucherId)
    {

        $newVoucher = (new VouchersRepo)->getByIdActive($voucherId);
        if (! $newVoucher) {
            throw new \Exception('Voucher does not exist or expired.');
        }
        $this->cart->update(['voucher_id' => $newVoucher->id]);
        $this->voucher = $newVoucher;
    }

    private function updateGuestShippingAddress($guestShippingAddress)
    {
        $this->cart->update(['guest_shipping_address' => self::formatAddress($guestShippingAddress)]);
    }

    private function updateGuestPaymentAddress($guestPaymentAddress)
    {
        $this->cart->update(['guest_payment_address' => self::formatAddress($guestPaymentAddress)]);
    }

    private function updateShippingMethod($shippingMethodCode)
    {
        $this->cart->shipping_method_code = $shippingMethodCode;
        $this->cart->save();
    }

    private function updatePaymentMethod($paymentMethodCode)
    {
        $this->cart->payment_method_code = $paymentMethodCode;
        $this->cart->save();
    }

    private function updateReceivingMethod($receivingMethod)
    {
        $this->cart->receiving_method = $receivingMethod;
        Log::info('ádasd',['ádsad'=>$receivingMethod]);
        $this->cart->save();
    }

    private function updatePickUpAddress($pickUpAddress)
    {
        $this->cart->pick_up_address = $pickUpAddress;
        $this->cart->save();
    }

    private function updatePickUpTime($pickUpTime)
    {
        $this->cart->pick_up_time = $pickUpTime;
        $this->cart->save();
    }

    private function updateName($name)
    {
        $this->cart->name = $name;
        $this->cart->save();
    }

    private function updatePhone($phone)
    {
        $this->cart->phone = $phone;
        $this->cart->save();
    }

    public function initTotalService()
    {
        $customer           = $this->customer;
        $totalClass         = hook_filter('service.checkout.total_service', 'Beike\Shop\Services\TotalService');
        $totalService       = (new $totalClass($this->cart, CartService::list($customer, true)));
        $this->totalService = $totalService;
    }

    public function checkoutData(): array
    {
        $customer    = $this->customer;
        $currentCart = $this->cart;

        $cartList           = CartService::list($customer, true);
        $carts              = CartService::reloadData($cartList);
        $vouchers           = (new \Beike\Repositories\VouchersRepo)->getActiveVouchers(now());

        $addStatus              = SettingRepo::getSystemValue('store_address_status');
        $storeAddress           = SettingRepo::getSystemValue('store_address');
        $storeAddressValue      = [];
        if ($addStatus &&  $addStatus->value == 1) {
            $storeAddressValue  = $storeAddress ? json_decode($storeAddress->value, true) : [];
            foreach ($storeAddressValue as &$store) {
                $store['time_slots'] = [];
                if (isset($store['time_working']) && is_array($store['time_working'])) {
                    foreach ($store['time_working'] as $workingPeriod) {
                        $timeStart = $workingPeriod['time_start'];
                        $timeEnd   = $workingPeriod['time_end'];

                        if ($timeStart && $timeEnd) {
                            $store['time_slots'] = array_merge(
                                $store['time_slots'],
                                $this->generateTimeSlots($timeStart, $timeEnd, 15)
                            );
                        }
                    }
                }
            }
        }

        foreach ($vouchers as &$voucher) {
            $voucher['value_format'] = currency_format(floatval($voucher['discount_value']));
        }

        if (! $this->totalService) {
            $this->initTotalService();
        }
        $addressSystem    = SettingRepo::getSystemValue('address_status');

        $addresses        = AddressRepo::listByCustomer($customer);
        $payments         = PaymentMethodItem::collection(PluginRepo::getPaymentMethods())->jsonSerialize();
        $shipments        = ShippingMethodService::getShippingMethodsForCurrentCart($this);
        $shippingRequired = $this->shippingRequired();
        $this->setDefaultCurrentShippingMethod($shipments);

        $shippingQuote = ShippingMethodService::getCurrentQuote($shipments, $currentCart->shipping_method_code);
        $paymentMethod = PaymentMethodService::getCurrentMethod($payments, $currentCart->payment_method_code);

        $typeReceiving = $addressSystem->value ? 'shipping' : 'pick_up_items';

        $data = [
            'current'          => [
                'shipping_address_id'    => $shippingRequired ? $currentCart->shipping_address_id : 0,
                'guest_shipping_address' => $shippingRequired ? $currentCart->guest_shipping_address : null,
                'shipping_method_code'   => $shippingRequired ? $currentCart->shipping_method_code : '',
                'shipping_method_name'   => $shippingQuote['name'] ?? '',
                'payment_address_id'     => $currentCart->payment_address_id,
                'guest_payment_address'  => $currentCart->guest_payment_address,
                'payment_method_code'    => $currentCart->payment_method_code,
                'payment_method_name'    => $paymentMethod['name'] ?? '',
                'extra'                  => $currentCart->extra,
                'voucher_id'             => $currentCart->voucher_id                    ?? 0,
                'receiving_method'       => $currentCart->receiving_method              ?? $typeReceiving,
                'pick_up_address'        => $currentCart->pick_up_address               ?? '',
                'pick_up_time'           => $currentCart->pick_up_time                  ?? '',
                'name'                   => $currentCart->name                          ?? '',
                'phone'                  => $currentCart->phone                         ?? '',
            ],
            'store_address'        => $storeAddressValue,
            'vouchers'             => $vouchers,
            'shipping_require'     => $shippingRequired,
            'country_id'           => (int) system_setting('base.country_id'),
            'customer_id'          => $customer->id ?? null,
            'countries'            => CountryRepo::listEnabled(),
            'addresses'            => AddressResource::collection($addresses),
            'shipping_methods'     => $shipments,
            'payment_methods'      => $payments,
            'carts'                => $carts,
            'address_status'       => $addressSystem->value ?? 0,
            'store_address_status' => $addStatus->value     ?? 0,
            'totals'               => $this->totalService->getTotals($this),
        ];

        return hook_filter('service.checkout.data', $data);
    }

    public function generateTimeSlots($startTime, $endTime, $intervalMinutes)
    {
        $slots       = [];
        $currentTime = $startTime;

        while (strtotime($currentTime) < strtotime($endTime)) {
            $nextTime    = date('H:i', strtotime("+$intervalMinutes minutes", strtotime($currentTime)));
            $slots[]     = "$currentTime-$nextTime";
            $currentTime = $nextTime;
        }

        return $slots;
    }

    private function setDefaultCurrentShippingMethod($shipments)
    {
        $currentCart = $this->cart;
        if ($this->showShippingMethod()) {
            $shipmentCodes = [];
            foreach ($shipments as $shipment) {
                $shipmentCodes = array_merge($shipmentCodes, array_column($shipment['quotes'], 'code'));
            }
            if (! in_array($currentCart->shipping_method_code, $shipmentCodes)) {
                $this->updateShippingMethod($shipmentCodes[0] ?? '');
                $this->totalService->setShippingMethod($shipmentCodes[0] ?? '');
            }
        } else {
            $this->updateShippingMethod('');
            $this->totalService->setShippingMethod('');
        }

    }

    private function shippingRequired(): bool
    {
        $customer = current_customer();

        return CartRepo::shippingRequired($customer->id ?? 0);
    }

    private function showShippingMethod(): bool
    {
        return hook_filter('service.checkout.show_shipping_method', $this->shippingRequired());
    }

    public static function formatAddress($address)
    {
        if (! $address) {
            return [];
        }
        $address['country'] = Country::find($address['country_id'])->name;
        $address['zone']    = Zone::find($address['zone_id'])->name;

        return $address;
    }
}
