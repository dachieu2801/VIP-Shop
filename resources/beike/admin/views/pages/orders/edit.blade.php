@extends('admin::layouts.master')

@section('title', 'Chỉnh sửa đơn hàng')

@section('page-bottom-btns')
@hook('order.detail.title.right')
@endsection



@section('content')
  @hookwrapper('admin.order.form.base')
  <!-- THONG TIN CHUNG VE KHACH HANG -->
   <div>{{json_encode($paymentMethod)}}</div>
  <div class="card mb-4 ">
    <div class="card-header mb-5"><h6 class="card-title">Phương thức thanh toán</h6></div>
    <select>
      <option>{{ $order->payment_method_name }}</option>
    </select>
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
    <div class="card-header"><h6 class="card-title">{{ __('order.product_info') }}</h6></div>
    <div class="card-body">
      <div class="table-push">
        <table class="table ">
          <thead class="">
            <tr>
              <th>ID</th>
              <th>{{ __('order.product_name') }}</th>
              <th class="">{{ __('order.product_sku') }}</th>
              <th>{{ __('order.product_price') }}</th>
              <th class="">{{ __('order.product_quantity') }}</th>
              <th class="text-end">{{ __('order.product_sub_price') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order->orderProducts as $product)
            <tr>
              <td>{{ $product->product_id }}</td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="wh-60 me-2"><img src="{{ image_resize($product->image) }}" class="img-fluid max-h-100"></div>{{ $product->name }}
                </div>
              </td>
              <td class="">{{ $product->product_sku }}</td>
              <td>{{ currency_format($product->price, $order->currency_code, $order->currency_value) }}</td>
              <td class="">{{ $product->quantity }}</td>
              <td class="text-end">{{ currency_format($product->price * $product->quantity, $order->currency_code, $order->currency_value) }}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            @foreach ($order->orderTotals as $orderTotal)
              <tr>
                <td colspan="5" class="text-end">{{ $orderTotal->title }}</td>
                <td class="text-end"><span class="fw-bold">{{ currency_format($orderTotal->value, $order->currency_code, $order->currency_value) }}</span></td>
              </tr>
            @endforeach
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  @endhookwrapper


@endsection

@push('footer')
  @can('orders_update_status')
    <script>
      $('.edit-shipment').click(function() {
        $(this).siblings('.shipment-tool').removeClass('d-none');
        $(this).addClass('d-none');

        $(this).parents('tr').find('.edit-show').addClass('d-none');
        $(this).parents('tr').find('.edit-form').removeClass('d-none');
        @if(!$expressCompanies)
        $(this).parents('tr').find('.express-company').removeClass('d-none');
        @endif
      });

      $('.shipment-tool .btn-outline-secondary').click(function() {
        $(this).parent().siblings('.edit-shipment').removeClass('d-none');
        $(this).parent().addClass('d-none');

        $(this).parents('tr').find('.edit-show').removeClass('d-none');
        $(this).parents('tr').find('.edit-form').addClass('d-none');
      });

      $('.shipment-tool .btn-primary').click(function() {
        const id = $(this).parents('tr').data('id');
        const express_code = $(this).parents('tr').find('.express-code').val();
        const express_name = $(this).parents('tr').find('.express-code option:selected').text();
        const express_number = $(this).parents('tr').find('.express-number').val();

        $(this).parent().siblings('.edit-shipment').removeClass('d-none');
        $(this).parent().addClass('d-none');

        $(this).parents('tr').find('.edit-show').removeClass('d-none');
        $(this).parents('tr').find('.edit-form').addClass('d-none');

        $http.put(`/orders/{{ $order->id }}/shipments/${id}`, {express_code,express_name,express_number}).then((res) => {
          layer.msg(res.message);
          window.location.reload();
        })
      });

    new Vue({
      el: '#app',

      data: {
        // statuses: [{"value":"pending","label":"待处理"},{"value":"rejected","label":"已拒绝"},{"value":"approved","label":"已批准（待顾客寄回商品）"},{"value":"shipped","label":"已发货（寄回商品）"},{"value":"completed","label":"已完成"}],
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
        }
      },

      // beforeMount() {
      //   let statuses = @json($statuses ?? []);
      //   this.statuses = Object.keys(statuses).map(key => {
      //     return {
      //       value: key,
      //       label: statuses[name]
      //     }
      //   });
      // },

      methods: {
        submitForm(form) {
          this.$refs[form].validate((valid) => {
            if (!valid) {
              layer.msg('{{ __('common.error_form') }}',()=>{});
              return;
            }

            $http.put(`/orders/{{ $order->id }}/status`,this.form).then((res) => {
              layer.msg(res.message);
              window.location.reload();
            })
          });
        }
      }
    })
  </script>
  @endcan
@endpush

