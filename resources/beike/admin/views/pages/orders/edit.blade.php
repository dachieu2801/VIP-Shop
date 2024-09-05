@extends('admin::layouts.master')

@section('title', 'Chỉnh sửa đơn hàng')

@section('page-bottom-btns')
@hook('order.detail.title.right')
@endsection

@section('content')
@hookwrapper('admin.order.form.base')
<!-- THÔNG TIN CHUNG VỀ KHÁCH HÀNG -->
<div id="app">
    <div class="card mb-4">
        <div class="card-header mb-3">
            <h6 class="card-title">Phương thức thanh toán</h6>
        </div>

        <div class="card-body">
            <div class="form-group">

                <select class="form-control custom-select" id="paymentMethod" style="width: 50%;">
                    <option value="{{ $order['payment_method_code'] }}" >{{ $order['payment_method_name'] }}</option>
                    @foreach($paymentMethod as $method)
                    @if($method['name'] != $order['payment_method_name'])
                    <option value="{{ $method['code'] }}">{{ $method['name'] }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    @endhookwrapper

    @hookwrapper('admin.order.form.address')
    <!-- THÔNG TIN VỀ ĐỊA CHỈ -->

    @endhookwrapper

    @foreach ($html_items as $item)
    {!! $item !!}
    @endforeach

    @can('orders_update_status')
    @hookwrapper('admin.order.form.status')

    @endhookwrapper
    @endcan

    @hookwrapper('admin.order.form.products')
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="card-title">Thông tin đơn hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-push">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('order.product_name') }}</th>
                            <th>{{ __('order.product_sku') }}</th>
                            <th>{{ __('order.product_price') }}</th>
                            <th>{{ __('order.product_quantity') }}</th>
                            <th class="text-end">{{ __('order.product_sub_price') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product, index) in products" :key="product.id">
                            <td>
                                <div class="d-flex align-items-center">
                                    <input type="text" class="form-control" v-model="product.name" name="product_name[]">
                                </div>
                            </td>
                            <td>
                                <input type="text" class="form-control" v-model="product.product_sku" name="product_sku[]">
                            </td>
                            <td>
                                <input type="text" class="form-control" v-model="product.price" name="product_price[]">
                            </td>
                            <td>
                                <input type="number" class="form-control" v-model="product.quantity" name="product_quantity[]" min="0">
                            </td>
                            <td class="text-end bg-light">
                                <div>@{{ product.price * product.quantity }}</div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end">Tổng giá trị</td>
                            <td class="text-end bg-light">
                                <div>@{{ subTotal.toFixed(2) }}</div>
                            </td>
                        </tr>
                        <tr v-for="(totalItem, key) in orderTotals" :key="key" v-if="key !== 'order_total' && key !== 'sub_total'">
                            <td colspan="4" class="text-end">@{{ totalItem.title }}</td>
                            <td class="text-end">
                                <input type="number" step="0.01" class="form-control text-end" v-model.number="totalItem.value">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end">Tổng thanh toán</td>
                            <td class="text-end bg-light">
                                <div>@{{ orderTotal }}</div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-primary btn-lg shadow" @click="submitOrder" style="padding: 15px 30px; font-weight: bold; font-size: 1.2rem;">
                Chỉnh sửa
            </button>
        </div>
    </div>
    @endhookwrapper
</div>

@endsection

@push('footer')
@can('orders_update_status')

<?php
$products = $order->orderProducts->map(function ($product) {
    return [
        'id' => $product->id,
        'order_id' => $product->order_id,
        'product_id' => $product->product_id,
        'order_number' => $product->order_number,
        'product_sku' => $product->product_sku,
        'name' => $product->name,
        'image' => $product->image,
        'quantity' => $product->quantity,
        'price' => $product->price,
        'created_at' => $product->created_at,
        'updated_at' => $product->updated_at,
        'deleted_at' => $product->deleted_at,
        'reviewed' => $product->reviewed,
        'origin_price' => $product->origin_price,
        'review_id' => $product->review_id,
        'price_format' => $product->price_format,
    ];
});
?>
<script>
new Vue({
    el: '#app',
    data: {
        orderId: @json($order['id']),
        products: @json($products),
        orderTotals: @json($order->orderTotals->keyBy('code')),
        paymentMethods: @json($paymentMethod),
    },
    computed: {
        subTotal() {
return this.products.reduce((total, product) => {
                const price = parseFloat(product.price) || 0;
                const quantity = parseInt(product.quantity) || 0;
                return total + (price * quantity);
            }, 0);
        },
        orderTotal() {
            let total = this.subTotal;

            for (const [key, totalItem] of Object.entries(this.orderTotals)) {
                if (key === 'order_total' || key === 'sub_total') continue;

                const value = parseFloat(totalItem.value) || 0;

                if (key === 'customer_discount') {
                    total -= value;
                } else {
                    total += value;
                }
            }

            // Ensure total is not negative and round to two decimal places
            return total > 0 ? total.toFixed(2) : '0.00';
        }
    },
    methods: {
        submitOrder() {

            // Collecting data from the form inputs and products
            const orderData = {
                id: this.orderId,
                paymentMethod: this.paymentMethods.find(item=> item.code === document.getElementById('paymentMethod').value)  ,
                products: this.products.map(product => ({
                    id: product.id,
                    name: product.name,
                    sku: product.product_sku,
                    price: product.price,
                    quantity: product.quantity
                })),
                orderTotals: {
                    sub_total: this.subTotal,
                    order_total: this.orderTotal,
                    tax: this.orderTotals['tax'] ? this.orderTotals['tax'].value : 0,
                    shipping: this.orderTotals['shipping'] ? this.orderTotals['shipping'].value : 0,
                    customer_discount: this.orderTotals['customer_discount'] ? this.orderTotals['customer_discount'].value : 0,
                    paypay_fee: this.orderTotals['paypay_fee'] ? this.orderTotals['paypay_fee'].value : 0,
                    tax_fee: this.orderTotals['tax_fee'] ? this.orderTotals['tax_fee'].value : 0,
                },
            };

            layer.confirm('Bạn có chắc muốn chỉnh sửa đơn ?', {
                title: "{{ __('common.text_hint') }}",
                btn: ['{{ __('common.cancel') }}', '{{ __('common.confirm') }}'],
                area: ['400px'],
                btn2: () => {
                    // Sending the collected data via a put request
                    $http.put('/orders', orderData)
                      .then(response => {
                        alert('Order updated successfully');
                      })
                      .catch(error => {
                        console.error('Error updating order:', error);
                      });
                }
            });
        }
    },
    mounted(){
        console.log(this.products);
    }
});
</script>
@endcan
@endpush
