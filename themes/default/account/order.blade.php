@extends('layout.master')

@section('body-class', 'page-account-order-list')

@section('content')
  <x-shop-breadcrumb type="static" value="account.order.index" />

  <div class="container">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('shop/account/order_info.confirm_cancellation')}}</h1>
            <button type="button" class="btn-close cancel-action" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <textarea id="reason-input" class="w-100 p-4 form-control"  placeholder="{{__('shop/account/order_info.reason')}}"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel-action" data-bs-dismiss="modal" >{{ __('shop/account/order_info.cancel') }}</button>
            <button id="confirm-cancellation" type="button" class="btn btn-primary">{{__('common.confirm')}}</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <x-shop-sidebar />

      <div class="col-12 col-md-9">
        @if (!is_mobile())
        <div class="card mb-4 account-card order-wrap h-min-600">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">{{ __('shop/account/order.index') }}</h5>
          </div>
          <div class="card-body">

            @include('account.order_status')
            <div class="table-responsive mt-3 ">
              <div class="">
               <table class="table">
                 @if (count($orders))
                   @if($review)
                     @if (count($orderProducts))
                       <div class="content-wrapper mt-3 ">
                         @foreach ($orderProducts as $product)
                           <div class=" d-flex justify-content-between align-items-center my-3 p-2 border">
                             <div class=" d-flex justify-content-between align-items-center pe-3 ">
                               <div class="img border d-flex align-items-center wh-60"><img src="{{ $product->image }}" class="img-fluid"></div>
                               <div class="name ms-2">
                                 <div>{{ $product->name }}</div>
                                 <div class="quantity mt-1 text-secondary">x {{ $product->quantity }}</div>
                               </div>
                             </div>
                             <div  style="min-width: 80px">
                               <a href="{{ shop_route('product.get_review', ['productId' => $product->product_id,'orderProductId'=>$product->id]) }}" class="btn w-100 btn-primary btn-sm nowrap mb-2">{{ __('shop/account/order.review') }}</a>
                             </div>
                           </div>
                         @endforeach
                       </div>
                       {{--                      {{ $orders->links('shared/pagination/bootstrap-4') }}--}}
                     @else
                       <tbody>
                       <tr><td colspan="4" class="border-0"><x-shop-no-data /></td></tr>
                       </tbody>
                     @endif
                   @else
                     @foreach ($orders as $order)
                       <tbody>
                       <tr class="sep-row"><td colspan="4"></td></tr>
                       <tr class="head-tr">
                         <td colspan="4">
                           <span class="order-created me-4">{{ $order->created_at }}</span>
                           <span
                             class="order-number">{{ __('shop/account/order.order_number') }}：{{ $order->number }}</span>
                         </td>
                       </tr>
                       @foreach ($order->orderProducts as $product)
                         <tr class="{{ $loop->first ? 'first-tr' : '' }}">
                           <td>
                             <div class="product-info">
                               <div class="img border d-flex justify-content-center align-items-center wh-60"><img src="{{ image_resize($product->image) }}" class="img-fluid"></div>
                               <div class="name">
                                 <a class="text-dark"
                                    href="{{ shop_route('products.show', ['product' => $product->product_id]) }}">{{ $product->name }}</a>
                                 <div class="quantity mt-1 text-secondary">x {{ $product->quantity }}</div>
                               </div>
                             </div>
                           </td>
                           @if ($loop->first)
                             <td rowspan="{{ $loop->count }}">
                               <p class="text-center fw-bold text-danger">{{ currency_format($order->total, $order->currency_code, $order->currency_value) }}</p>
                               <p class="text-nowrap text-center @if($order->status == 'unpaid') unpaid-order-text @elseif($order->status == 'completed') completed-order-text @elseif($order->status=='paid') paid-order-text @elseif($order->status=='shipped') shipped-order-text @elseif($order->status=='cancelled') cancelled-order-text @endif">{{$order->status_format}}</p>
                             </td>
                           <td>{{$order->payment}}</td>
                             <td rowspan="{{ $loop->count }}" class="text-end">
                               <a href="{{ shop_route('account.order.show', ['number' => $order->number]) }}" class="btn btn-outline-secondary btn-sm mb-2 w-100">{{ __('shop/account/order.check') }}</a>
                               @if ($order->status == 'unpaid')
                                 @if($order->payment_method_code=="vn_pay") <a href="{{ shop_route('orders.pay', $order->number) }}" class="btn w-100 btn-primary btn-sm nowrap mb-2">{{ __('shop/account/order_info.to_pay') }}</a> @endif
{{--                                 <button class="btn btn-outline-danger btn-sm cancel-order w-100" data-number="{{ $order->number }}" type="button">{{ __('shop/account/order_info.cancel') }}</button>--}}
                                 <button type="button" class="btn  cancel-order w-100 btn-outline-danger btn-sm" data-number="{{ $order->number }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                   {{ __('shop/account/order_info.cancel') }}
                                 </button>
                               @endif
                             </td>
                           @endif
                         </tr>
                       @endforeach
                       </tbody>
                     @endforeach

                   @endif

                 @else
                   <tbody>
                   <tr><td colspan="4" class="border-0"><x-shop-no-data /></td></tr>
                   </tbody>
                 @endif

               </table>
             </div>
{{--              <div class="d-md-none d-block">--}}
{{--                @if (count($orders))--}}
{{--                  <div class="haha">--}}
{{--                    @if($review)--}}
{{--                      @if (count($orderProducts))--}}
{{--                        <div class="content-wrapper mt-3 ">--}}
{{--                          @foreach ($orderProducts as $product)--}}
{{--                            <div class=" d-flex justify-content-between align-items-center my-3 p-2 border">--}}
{{--                              <div class=" d-flex justify-content-between align-items-center pe-3 ">--}}
{{--                                <div class="img border d-flex align-items-center wh-60"><img src="{{ $product->image }}" class="img-fluid"></div>--}}
{{--                                <div class="name">--}}
{{--                                  <a class="text-dark "--}}
{{--                                     href="{{ shop_route('products.show', ['product' => $product->product_id]) }}">{{ $product->name }}</a>--}}
{{--                                  <div class="quantity mt-1 text-secondary">x {{ $product->quantity }}</div>--}}
{{--                                </div>--}}
{{--                              </div>--}}
{{--                              <div  style="min-width: 80px">--}}
{{--                                <a href="{{ shop_route('product.get_review', ['productId' => $product->product_id,'orderProductId'=>$product->id]) }}" class="btn w-100 btn-primary btn-sm nowrap mb-2">{{ __('shop/account/order.review') }}</a>--}}
{{--                              </div>--}}
{{--                            </div>--}}
{{--                          @endforeach--}}
{{--                        </div>--}}
{{--                        --}}{{--                      {{ $orders->links('shared/pagination/bootstrap-4') }}--}}
{{--                      @else--}}

{{--                        <div class="border-0"><x-shop-no-data /></div>--}}

{{--                      @endif--}}
{{--                    @else--}}
{{--                      @foreach ($orders as $order)--}}
{{--                        <div class="my-3">--}}
{{--                          <div>--}}
{{--                            <p class="fw-bold fs-5 mb-2">{{ __('shop/account/order.order_number') }}：{{ $order->number }}</p>--}}
{{--                            <p class="">{{ $order->created_at }}</p>--}}
{{--                            <p class="text-center @if($order->status == 'unpaid') unpaid-order-text @elseif($order->status == 'completed') completed-order-text @elseif($order->status=='paid') paid-order-text @elseif($order->status=='shipped') shipped-order-text @elseif($order->status=='cancelled') cancelled-order-text @endif">{{$order->status_format}}</p>--}}
{{--                          </div>--}}
{{--                          @foreach ($order->orderProducts as $product)--}}
{{--                            <div class="{{ $loop->first ? 'first-tr' : '' }} mb-3">--}}
{{--                              <div class="product-info d-flex justify-content-between gap-2">--}}
{{--                                <div class="img border d-flex justify-content-center align-items-center wh-60"><img src="{{ image_resize($product->image) }}" class="img-fluid"></div>--}}
{{--                                <div class="name">--}}
{{--                                  <a class="text-dark "--}}
{{--                                     href="{{ shop_route('products.show', ['product' => $product->product_id]) }}">{{ $product->name }}</a>--}}
{{--                                  <div class="quantity mt-1 text-secondary">x {{ $product->quantity }}</div>--}}
{{--                                </div>--}}
{{--                              </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <hr/>--}}
{{--                      @endforeach--}}

{{--                      <p class="fw-bold fs-3 text-danger">--}}
{{--                        {{ currency_format($order->total, $order->currency_code, $order->currency_value) }}</p>--}}

{{--                      <div>--}}
{{--                        <a href="{{ shop_route('account.order.show', ['number' => $order->number]) }}" class="btn btn-outline-secondary btn-sm mb-2 w-100">{{ __('shop/account/order.check') }}</a>--}}
{{--                        @if ($order->status == 'unpaid')--}}
{{--                          <a href="{{ shop_route('orders.pay', $order->number) }}" class="btn w-100 btn-primary btn-sm nowrap mb-2">{{ __('shop/account/order_info.to_pay') }}</a>--}}
{{--                          <button class="btn btn-outline-danger btn-sm cancel-order w-100" data-number="{{ $order->number }}" type="button">{{ __('shop/account/order_info.cancel') }}</button>--}}
{{--                        @endif--}}
{{--                      </div>--}}

{{--                      @endforeach--}}


{{--                    @endif--}}
{{--                  </div>--}}
{{--                @else--}}

{{--                  <div class="border-0"><x-shop-no-data /></div>--}}

{{--                @endif--}}

{{--              </div>--}}
              @if(!$review)
              {{ $orders->links('shared/pagination/bootstrap-4') }}
              @endif
            </div>

          </div>
        </div>
        @else
          <div class="order-mb-wrap">
            @include('account.order_status')
            @if (count($orders))
              @if($review)
                @if (count($orderProducts))
                  <div class="content-wrapper mt-3 ">
                    @foreach ($orderProducts as $product)
                      <div class="my-3 p-2 border">
                        <div class=" d-flex justify-content-between align-items-center">
                          <div class="img border d-flex align-items-center wh-60"><img src="{{ $product->image }}" class="img-fluid"></div>
                          <div class="name ms-2">
                            <div style="white-space: nowrap;overflow: hidden;">{{ $product->name }}</div>
                            <div class="quantity mt-1 text-secondary">x {{ $product->quantity }}</div>
                          </div>
                        </div>
                        <div class="footer-wrapper">
                          <div style="min-width: 80px" class="footer-btns d-flex justify-content-end mt-2">
                            <a href="{{ shop_route('product.get_review', ['productId' => $product->product_id,'orderProductId'=>$product->id]) }}" class="btn w-100 btn-primary btn-sm nowrap mb-2">{{ __('shop/account/order.review') }}</a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                @else
                  <tbody>
                  <tr><td colspan="4" class="border-0"><x-shop-no-data /></td></tr>
                  </tbody>
                @endif
              @else
                @foreach ($orders as $order)
                <div class="order-mb-list card mb-3">
                  <div class="card-body">
                    <div class="header-wrapper d-flex justify-content-between">
                      <div>{{ __('shop/account/order.order_number') }}：{{ $order->number }}</div>
                      <div>{{ $order->status_format }}</div>
                    </div>
                    <div class="content-wrapper">
                      <div class="order-product-wrap mb-2" onclick="window.location.href='{{ shop_route('account.order.show', ['number' => $order->number]) }}'">
                        @foreach ($order->orderProducts as $product)
                        <div class="product-info d-flex mb-2">
                          <div class="img border d-flex justify-content-center align-items-center wh-60"><img src="{{ $product->image }}" class="img-fluid"></div>
                          <div class="name ms-2">
                            <div>{{ $product->name }}</div>
                            <div class="quantity mt-1 text-secondary">x {{ $product->quantity }}</div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    <div class="footer-wrapper">
                      <div class="d-flex justify-content-between">
                        <div class="text-secondary">{{ $order->created_at }}</div>
                        <div class="fw-bold">{{ __('admin/order.total') }}：<span class="amount text-primary">{{ currency_format($order->total, $order->currency_code, $order->currency_value) }}</span></div>
                      </div>
                      <div class="footer-btns d-flex justify-content-end mt-2">
                        @if ($order->status == 'unpaid')
                          <a href="{{ shop_route('orders.pay', $order->number) }}" class="btn btn-primary btn-sm nowrap">{{ __('shop/account/order_info.to_pay') }}</a>
{{--                          <button class="btn btn-outline-danger ms-2 btn-sm cancel-order" data-number="{{ $order->number }}" type="button">{{ __('shop/account/order_info.cancel') }}</button>--}}
                          <button type="button" class="btn btn-outline-danger ms-2 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            {{ __('shop/account/order_info.cancel') }}
                          </button>
                        @endif
                        <a href="{{ shop_route('account.order.show', ['number' => $order->number]) }}"
                          class="btn btn-outline-secondary btn-sm ms-2">{{ __('shop/account/order.check') }}</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                {{ $orders->links('shared/pagination/bootstrap-4') }}
              @endif
            @else
              <x-shop-no-data />
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection

@push('add-scripts')
<script>


  let orderNumber = null;

  $('.cancel-order').click(function (event){
    orderNumber = $(this).data('number');
    console.log(orderNumber);
  })

  $('.cancel-action').click(function (event){
    orderNumber=null;
    $('#reason-input').val("");
    console.log(orderNumber, $('reason-input').val());
  })

  $('#confirm-cancellation').click(function (event){
    if (orderNumber){
      console.log($('#reason-input').val(),orderNumber);
      $('#exampleModal').modal('hide');
      console.log(JSON.stringify({cancellation_reason: $('#reason-input').val() ? $('#reason-input').val() : ""}));
      $http.post(`orders/${orderNumber}/cancel`, {cancellation_reason: $('#reason-input').val() ? $('#reason-input').val() : ""}).then((res) => {
        layer.msg(res.message)
        window.location.reload();
      });


    }
  })


  // $('.cancel-order').click(function(event) {
  //   var number = $(this).data('number')
  //   $http.post(`orders/${number}/cancel`).then((res) => {
  //     layer.msg(res.message)
  //     window.location.reload()
  //   })
  // });
</script>
@endpush
