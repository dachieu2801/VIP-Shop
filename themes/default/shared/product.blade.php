<div class="h-100 product-wrap {{ request('style_list') ?? '' }}">
  @if ($product['origin_price'] > $product['price'] && $product['discount'] > 0)
    <div class="discount">
      -{{$product['discount']}}%
    </div>
   @endif
    <button class="btn btn-link p-0 mt-1 text-secondary btn-wishlist-mobile" data-in-wishlist="{{ $product['in_wishlist'] }}" onclick="bk.addWishlist('{{ $product['id'] }}', this)">
      <i class="bi bi-heart{{ $product['in_wishlist'] ? '-fill' : '' }} me-1"></i>
    </button>
    <button
      class="btn btn-light text-light btn-add-cart-mobile "
      product-id="{{ $product['sku_id'] }}"
      product-price="{{ $product['price'] }}"
      onclick="bk.addCart({sku_id: '{{ $product['sku_id'] }}'}, this)">

      <i class="bi bi-cart"></i>

    </button>

  <div class="image">
    @hook('product_list.item.image.tag')

    <div onclick="bk.productQuickView({{ $product['id'] }})" >
      <div class="image-old">
        <img
          data-sizes="auto"
          data-src="{{ $product['images'][0] ?? image_resize('', 400, 400) }}"
          src="{{ image_resize('', 400, 400) }}"
          class="img-fluid lazyload">
      </div>
    </div>
    @if (!request('style_list') || request('style_list') == 'grid')
      <div class="button-wrap">
        @hookwrapper('shared.product.btn.add_cart')
        <button
          class="btn btn-dark text-light btn-add-cart"
          product-id="{{ $product['sku_id'] }}"
          product-price="{{ $product['price'] }}"
          onclick="bk.addCart({sku_id: '{{ $product['sku_id'] }}'}, this)">
          <i class="bi bi-cart"></i>
          {{ __('shop/products.add_to_cart') }}
        </button>
        @endhookwrapper
        <button
          class="btn btn-dark text-light btn-quick-view"
          product-id="{{ $product['sku_id'] }}"
          product-price="{{ $product['price'] }}"
          data-bs-toggle="tooltip"
          data-bs-placement="top"
          title="{{ __('common.quick_view') }}"
          onclick="bk.productQuickView({{ $product['id'] }})">
          <i class="bi bi-eye"></i>
        </button>
        <button
          class="btn btn-dark text-light btn-wishlist"
          product-id="{{ $product['sku_id'] }}"
          product-price="{{ $product['price'] }}"
          data-bs-toggle="tooltip"
          data-bs-placement="top"
          title="{{ __('shop/products.add_to_favorites') }}"
          data-in-wishlist="{{ $product['in_wishlist'] }}"
          onclick="bk.addWishlist('{{ $product['id'] }}', this)">
          <i class="bi bi-heart{{ $product['in_wishlist'] ? '-fill' : '' }}"></i>
        </button>
      </div>
    @endif
  </div>
  <div class="product-bottom-info">
    @hook('product_list.item.name.before')
    <div class="product-name text-wrap" >{{ $product['name_format'] }}</div>
    @if ((system_setting('base.show_price_after_login') and current_customer()) or !system_setting('base.show_price_after_login'))
     <div style="height: 12px"></div>
      <div class="product-price flex-column flex-md-row">
        <div class="price-new">{{ $product['price_format'] }}</div>
{{--        @if ($product['price'] != $product['origin_price'] && $product['origin_price'] > 0)--}}
{{--          <span class="price-old">{{ $product['origin_price_format'] }}</span>--}}
{{--        @endif--}}
{{--        //////////////  số lượng đã bán   --}}

          <div class="quantity-sold">
            @if ($product['quantity_sold'] > 0)
              Đã bán {{$product['quantity_sold_format']}}
            @endif
          </div>

      </div>
    @else
      <div class="product-price">
        <div class="text-dark fs-6">{{ __('common.before') }} <a class="price-new fs-6 login-before-show-price" href="javascript:void(0);">{{ __('common.login') }}</a> {{ __('common.show_price') }}</div>
      </div>
    @endif

    @if (request('style_list') == 'list')
      <div class="button-wrap mt-3">
        <button
          class="btn btn-dark text-light"
          onclick="bk.addCart({sku_id: '{{ $product['sku_id'] }}'}, this)">
          <i class="bi bi-cart"></i>
          {{ __('shop/products.add_to_cart') }}
        </button>
      </div>

      <div class="mt-2">
        <button
        class="btn btn-link p-0 btn-quick-view text-secondary"
        product-id="{{ $product['sku_id'] }}"
        product-price="{{ $product['price'] }}"
        onclick="bk.productQuickView({{ $product['id'] }})">
        <i class="bi bi-eye"></i>
        {{ __('common.quick_view') }}
      </button>
        <br>
        <button class="btn btn-link p-0 mt-1 text-secondary btn-wishlist" data-in-wishlist="{{ $product['in_wishlist'] }}" onclick="bk.addWishlist('{{ $product['id'] }}', this)">
          <i class="bi bi-heart{{ $product['in_wishlist'] ? '-fill' : '' }} me-1"></i> {{ __('shop/products.add_to_favorites') }}

        </button>
      </div>
    @endif

  </div>

  @hook('product_list.item.after')
</div>
