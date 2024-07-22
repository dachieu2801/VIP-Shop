<ul class="nav nav-tabs overflow-x-auto d-flex flex-row flex-nowrap w-100 pb-4">
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap {{ !request('status') ? 'active' : '' }}" href="{{ shop_route('account.order.index') }}">{{ __('order.order_all') }}</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap {{ request('status') == 'unpaid' ? 'active' : '' }}" href="{{ shop_route('account.order.index', ['status' => 'unpaid']) }}">{{ __('order.unpaid') }}</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap {{ request('status') == 'paid' ? 'active' : '' }}" href="{{ shop_route('account.order.index', ['status' => 'paid']) }}">{{ __('shop/account.pending_send') }}</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap {{ request('status') == 'shipped' ? 'active' : '' }}" href="{{ shop_route('account.order.index', ['status' => 'shipped']) }}">{{ __('shop/account.pending_receipt') }}</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap {{ request('status') == 'completed' ? 'active' : '' }}" href="{{ shop_route('account.order.index', ['status' => 'completed']) }}">{{ __('order.completed') }}</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap {{ request('status') == 'cancelled' ? 'active' : '' }}" href="{{ shop_route('account.order.index', ['status' => 'cancelled']) }}">{{ __('order.cancelled') }}</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap {{ request('status') == 'not_yet_reviewed' ? 'active' : '' }}" href="{{ shop_route('account.order.index', ['status' => 'not_yet_reviewed']) }}">{{ __('order.not_yet_reviewed') }}</a>
  </li>
{{--  <li class="nav-item" role="presentation">--}}
{{--    <a class="nav-link {{ request('status') == 'reviewed' ? 'active' : '' }}" href="{{ shop_route('account.order.index', ['status' => 'reviewed']) }}">{{ __('order.reviewed') }}</a>--}}
{{--  </li>--}}
</ul>
