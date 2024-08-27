@extends('admin::layouts.master')

@section('title', 'Chỉnh sửa đơn hàng')

@section('page-bottom-btns')
@hook('order.detail.title.right')
@endsection



@section('content')
  @hookwrapper('admin.order.form.base')
  <!-- THONG TIN CHUNG VE KHACH HANG -->
<div id="app"> 
   <div class="card mb-4">
  
    <div class="card-header mb-3">
        <h6 class="card-title">Phương thức thanh toán</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            
            <select class="form-control custom-select" id="paymentMethod" style="width: 50%;">
              <option>{{ $order['payment_method_name'] }}</option>
              @foreach($paymentMethod as $method)
              @if($method['name'] != $order['payment_method_name']) 
                <option>{{ $method['name'] }}</option>
              @endif
                  
              @endforeach
            </select>
        </div>
    </div>
</div>

  @endhookwrapper

  @hookwrapper('admin.order.form.address')
  <!-- THONG TIN VE DIA -->

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
    <div class="card-header"><h6 class="card-title">Thông tin đơn hàng</h6></div>
    <div class="card-body">
        <div class="table-push">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('order.product_name') }}</th>
                        <th class="">{{ __('order.product_sku') }}</th>
                        <th>{{ __('order.product_price') }}</th>
                        <th class="">{{ __('order.product_quantity') }}</th>
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
        <td class="">
            <input type="text" class="form-control" v-model="product.product_sku" name="product_sku[]">
        </td>
        <td>
            <input type="text" class="form-control" v-model="product.price" name="product_price[]">
        </td>
        <td class="">
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
      <div>@{{ subTotal }}</div>
    </td>
  </tr>
  <tr v-if="orderTotals['tax']">
    <td colspan="4" class="text-end">@{{ orderTotals['tax'].title }}</td>
    <td class="text-end">
      <input type="text" class="form-control text-end" v-model="orderTotals['tax'].value">
    </td>
  </tr>
  <tr v-if="orderTotals['shipping']">
    <td colspan="4" class="text-end">@{{ orderTotals['shipping'].title }}</td>
    <td class="text-end">
      <input type="text" class="form-control text-end" v-model="orderTotals['shipping'].value">
    </td>
  </tr>
  <tr v-if="orderTotals['customer_discount']">
    <td colspan="4" class="text-end">@{{ orderTotals['customer_discount'].title }}</td>
    <td class="text-end">
      <input type="text" class="form-control text-end" v-model="orderTotals['customer_discount'].value">
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
    </div>
    <div class="d-flex justify-content-end mt-3">
    <button class="btn btn-primary btn-lg shadow" @click="submitOrder" style="padding: 15px 30px; font-weight: bold; font-size: 1.2rem;">
        Chỉnh sửa
    </button>
</div>
</div>
  @endhookwrapper


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
    statuses: @json($statuses ?? []),
    form: {
      status: "",
      express_number: '',
      express_code: '',
      notify: 0,
      comment: '',
    },
    source: {
      express_company: @json(system_setting('base.express_company', [])),
    },
    rules: {
      status: [{required: true, message: '{{ __('admin/order.error_status') }}', trigger: 'blur'}, ],
      express_code: [{required: true,message: '{{ __('common.error_required', ['name' => __('order.express_company')]) }}',trigger: 'blur'}, ],
      express_number: [{required: true,message: '{{ __('common.error_required', ['name' => __('order.express_number')]) }}',trigger: 'blur'}, ],
    },
    orderTotals: @json($order->orderTotals->keyBy('code')),
  },
  computed: {
    subTotal() {
      return this.products.reduce((total, product) => {
        return total + (product.price * product.quantity);
      }, 0);
    },
    orderTotal() {
      let total = this.subTotal;
      if (this.orderTotals['tax']) {
        total += parseFloat(this.orderTotals['tax'].value);
      }
      if (this.orderTotals['shipping']) {
        total += parseFloat(this.orderTotals['shipping'].value);
      }
      if (this.orderTotals['customer_discount']) {
        total -= parseFloat(this.orderTotals['customer_discount'].value);
      }
      if(total < 0){
        total = 0;
      }
      return total;
    }
  },
  methods: {
    submitOrder() {
      // Collecting data from the form inputs and products
      const orderData = {
        id: this.orderId,
        paymentMethod: document.getElementById('paymentMethod').value,
        products: this.products.map(product => ({
       
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
          customer_discount: this.orderTotals['customer_discount'] ? this.orderTotals['customer_discount'].value : 0
        },  
       
      };
      console.log(orderData);

      // Sending the collected data via a POST request
      // $http.post('/your-endpoint-url', orderData)
      //   .then(response => {
      //     // Handle successful response
      //     alert('Order updated successfully');
      //   })
      //   .catch(error => {
      //     // Handle error response
      //     console.error('Error updating order:', error);
      //   });
    }
  }
});
  </script>
  @endcan
@endpush

