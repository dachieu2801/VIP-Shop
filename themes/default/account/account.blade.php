@extends('layout.master')

@section('body-class', 'page-account')

@section('content')
  <x-shop-breadcrumb type="static" value="account.index" />

  <div class="container">
    <div class="row">
      <x-shop-sidebar />
      <div class="col-12 col-md-9">
        @if (\Session::has('success'))
          <div class="alert alert-success">
            <ul>
              <li>{!! \Session::get('success') !!}</li>
            </ul>
          </div>
        @endif

        <div class="card account-card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">{{ __('shop/account.my_order') }}</h5>
            <a href="{{ shop_route('account.order.index') }}" class="text-muted">{{ __('shop/account.orders') }}</a>
          </div>
          <div class="card-body p-0">
            <div class="d-flex flex-nowrap card-items mb-4 py-3">
              <a href="{{ shop_route('account.order.index', ['status' => 'unpaid']) }}" class="d-flex flex-column align-items-center"><i class="iconfont">&#xf12f;</i><span
                  class="text-muted text-center">{{ __('order.unpaid') }}</span></a>
              <a href="{{ shop_route('account.order.index', ['status' => 'paid']) }}" class="d-flex flex-column align-items-center"><i class="iconfont">&#xf130;</i><span
                  class="text-muted text-center">{{ __('shop/account.pending_send') }}</span></a>
              <a href="{{ shop_route('account.order.index', ['status' => 'shipped']) }}" class="d-flex flex-column align-items-center"><i class="iconfont">&#xf131;</i><span
                  class="text-muted text-center">{{ __('shop/account.pending_receipt') }}</span></a>
              <a href="{{ shop_route('account.rma.index') }}" class="d-flex flex-column align-items-center"><i class="iconfont">&#xf132;</i><span
                  class="text-muted text-center">{{ __('shop/account.after_sales') }}</span></a>
            </div>
            <div class="order-wrap">
              @if (!count($latest_orders))
                <div class="no-order d-flex flex-column align-items-center">
                  <div class="icon mb-2"><i class="iconfont">&#xe60b;</i></div>
                  <div class="text mb-3 text-muted">{{ __('shop/account.no_order') }}<a href="">{{ __('shop/account.to_buy') }}</a></div>
                </div>
              @else
                {{-- <p class="text-muted">近期订单</p> --}}
                <ul class="list-unstyled orders-list table-responsive d-none d-lg-block">
                  <table class="table table-hover p-0">
                    <tbody>
                      @foreach ($latest_orders as $order)
                      <tr class="align-middle bg-white">
                        <td style="width: 100px; height: 100px">
                          <div class="img border">
                            <img src="{{ $order->orderProducts[0]->image ?? '' }}" class="img-fluid">
                          </div>
                        </td>
                        <td>
                          <div class="mb-2 text-nowrap">{{ __('shop/account.order_number') }}：<span style="width: 110px;display: inline-block;">{{ $order->number }}</span></div>
                          <p class="pt-2">{{ __('shop/account.all') }} {{ count($order->orderProducts) }} {{ __('shop/account.items') }}</p>
                          <div class="text-muted">{{ __('shop/account.order_time') }}：{{ $order->created_at }}</div>
                        </td>

                        <td>
                          <div class="h-100 d-flex align-items-center">
                          <p class=" text-center text-nowrap mb-0 d-inline-block @if($order->status == 'unpaid') unpaid-status-text @elseif($order->status == 'completed') completed-status-text @elseif($order->status=='paid') paid-status-text @elseif($order->status=='shipped') shipped-status-text @elseif($order->status=='cancelled') cancelled-status-text @endif">{{ $order->status_format }}</p>
                          </div>
                        </td>
                        <td>
                          <span class="ms-0 ms-lg-3 text-nowrap d-inline-block">{{ __('shop/account.amount') }}：{{ currency_format($order->total, $order->currency_code, $order->currency_value) }}</span>
                        </td>

                        <td>
                          <a href="{{ shop_route('account.order.show', ['number' => $order->number]) }}"
                            class="btn btn-outline-secondary text-nowrap btn-sm">{{ __('shop/account.check_details') }}</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </ul>
                <div class="flex flex-column d-lg-none d-block">

                    @foreach ($latest_orders as $order)
                      <div class="bg-white p-2 mb-3 rounde">
                        <div class="d-flex justify-content-between align-items-start">
                          <img src="{{ $order->orderProducts[0]->image ?? '' }}" class="img-fluid" width="100px">
                          <p class=" text-center text-nowrap py-1 px-2 @if($order->status == 'unpaid') unpaid-status-text @elseif($order->status == 'completed') completed-status-text @elseif($order->status=='paid') paid-status-text @elseif($order->status=='shipped') shipped-status-text @elseif($order->status=='cancelled') cancelled-status-text @endif">{{ $order->status_format }}</p>
                        </div>
                        <div class="mt-2">
                          <div class="mb-2 text-nowrap fw-semibold">{{ __('shop/account.order_number') }}：<span style="width: 110px;display: inline-block;">{{ $order->number }}</span></div>
                          <p>{{ __('shop/account.all') }} {{ count($order->orderProducts) }} {{ __('shop/account.items') }}</p>
                          <div class="text-muted">{{ __('shop/account.order_time') }}：{{ $order->created_at }}</div>
                        </div>
                        <div>
                          <span class="fw-semibold ms-0 ms-lg-3 text-nowrap d-inline-block">{{ __('shop/account.amount') }}：{{ currency_format($order->total, $order->currency_code, $order->currency_value) }}</span>
                        </div>
                      </div>
                    @endforeach

                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
