@extends('layout.master')

@section('body-class', 'page-account-wishlist')

@section('content')
  <x-shop-breadcrumb type="static" value="account.wishlist.index" />

  <div class="container">
    <div class="row">
      <x-shop-sidebar />

      <div class="col-12 col-md-9">
        <div class="card mb-4 h-min-600">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">{{ __('shop/account/wishlist.index') }}</h5>
          </div>
          <div class="card-body">
            <div class="d-none d-lg-block">
              <table class="table align-middle">
                <thead>
                <tr>
                  <th width="90px"></th>
                  <th>{{ __('shop/account/wishlist.product') }}</th>
                  <th>{{ __('shop/account/wishlist.price') }}</th>
                  <th class="text-end"></th>
                </tr>
                </thead>
                <tbody>
                @if (count($wishlist))
                  @foreach ($wishlist as $item)
                    <tr data-id="{{ $item['id'] }}">
                      <td>
                        <div class="wh-70 border d-flex justify-content-between align-items-center"><img src="{{ $item['image'] }}" class="img-fluid"></div>
                      </td>
                      <td>{{ $item['product_name'] }}</td>
                      <td>{{ $item['price'] }}</td>
                      <td class="text-end">
                        <div class="">
                          <a class="btn btn-primary btn-sm"
                             href="{{ shop_route('products.show', $item['product_id']) }}">{{ __('shop/account/wishlist.check_details') }}</a>
                          <button class="btn btn-outline-secondary add-cart btn-sm">{{ __('shop/products.add_to_cart') }}</button>
                          <button class="btn btn-outline-danger btn-sm remove-wishlist"><i class="bi bi-x-lg"></i></button>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="4" class="border-0">
                      <x-shop-no-data />
                    </td>
                  </tr>
                @endif
                </tbody>
              </table>
            </div>

            <div class="d-lg-none">
              @if (count($wishlist))
                @foreach ($wishlist as $item)
                  <div class="mb-2" data-id="{{ $item['id'] }}">
                    <div class="d-flex gap-2">
                      <div class="wh-70 border d-flex justify-content-between align-items-center"><img src="{{ $item['image'] }}" class="img-fluid"></div>
                      <div>
                        <div class="fw-bold">{{ $item['product_name'] }}</div>
                        <div>{{ $item['price'] }}</div>
                      </div>
                    </div>

                    <div class="text-end">
                      <div class="d-flex gap-2 mt-2 justify-content-end flex-wrap">
                        <a class="btn btn-primary btn-sm"
                           href="{{ shop_route('products.show', $item['product_id']) }}">{{ __('shop/account/wishlist.check_details') }}</a>
                        <button class="btn btn-outline-secondary add-cart btn-sm">{{ __('shop/products.add_to_cart') }}</button>
                        <button class="btn btn-outline-danger btn-sm remove-wishlist"><i class="bi bi-x-lg"></i></button>
                      </div>
                    </div>
                    <hr/>
                  </div>
                @endforeach
              @else
                <div>
                  <x-shop-no-data />
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('add-scripts')
  <script>
    $('.remove-wishlist').click(function() {
      const product_id = $(this).closest('tr').data('id');

      $http.delete('account/wishlist/' + product_id).then((res) => {
        if (res.status == 'success') {
          $(this).closest('tr').fadeOut(function() {
            $(this).remove();
            if ($('.remove-wishlist').length == 0) {
              location.reload();
            }
          });
        }
      })
    });

    $('.add-cart').click(function() {
      bk.productQuickView($(this).closest('tr').data('id'))
    });
  </script>
@endpush
