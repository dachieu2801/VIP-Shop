@extends('layout.master')

@section('body-class', 'page-payment')

@section('content')
  <x-shop-breadcrumb type="static" value="checkout.index" :text="[31231]" />

  <div class="container">
    @if (!is_mobile())
    <div class="row mt-5 mb-5 justify-content-center">
      <div class="col-12 col-md-9">@include('shared.steps', ['steps' => 3])</div>
    </div>
    @endif

    <div class="col-12">
      <div class="card order-wrap">
        <div class="card-body main-body">
          <div class="order-top">

            <div class="right">
              @if($order['payment_method_code'] == 'cod')
                <h3 class="order-title mb-4">{{ __('shop/checkout.payment_success') }}</h3>
              @else
                <h3 class="order-title mb-4">{{ __('shop/checkout.payment_please_pay') }}</h3>
              @endif
              <div class="order-info mb-lg-4 mb-2">
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>{{ __('shop/checkout.payment_order_number') }}：<span class="text-order">{{ $order['number'] }}</span></td>
                    </tr>
                    <tr>
                      <td>{{ __('shop/checkout.payment_amounts_payable') }}：<span class="text-order">{{ $order['total_format'] }}</span></td>
                    </tr>
                    <tr>
                      <td>{{ __('shop/checkout.payment_payment_method') }}：<span class="text-order">{{ $order['payment_method_name'] }}</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="alert alert-warning" role="alert">
                Vui lòng chụp ảnh màn hình đơn hàng !!!
              </div>

              {!! $payment !!}
            </div>
          </div>

          @hook('payment.footer')
        </div>
      </div>
    </div>
  </div>
@endsection
