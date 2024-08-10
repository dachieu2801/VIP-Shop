<section class="module-item {{ $design ? 'module-item-design' : ''}}" id="module-{{ $module_id }}">
  @include('design._partial._module_tool')

  @php
    $editableTabsValue = $content['editableTabsValue'] ?? 0;
  @endphp
  <div class="module-info module-tab-product">
    <div class="module-title">{{ $content['title'] ?? '' }}</div>
    <div class="container">
      @if ($content['tabs'] ?? false)
        <div class="nav d-flex flex-row flex-nowrap overflow-x-auto mb-4 justify-content-md-center">
          @foreach ($content['tabs'] as $key => $tabs)
          <a class="nav-link text-nowrap {{ ($design ? $editableTabsValue == $key : $loop->first) ? 'active' : '' }}" href="#tab-product-{{ $module_id }}-{{ $loop->index }}" data-bs-toggle="tab">{{ $tabs['title'] }}</a>
          @endforeach
        </div>
        <div class="tab-content">
          @foreach ($content['tabs'] as $key => $products)
          <div class="tab-pane fade show {{ ($design ? $editableTabsValue == $key : $loop->first) ? 'active' : '' }}" id="tab-product-{{ $module_id }}-{{ $loop->index }}">
            <div class="row">
              @if ($products['products'])
                @foreach ($products['products'] as $product)
                <div class="product-grid col-6 col-md-4 col-lg-3 mb-3">
                  @include('shared.product')
                </div>
                @endforeach
              @elseif (!$products['products'] and $design)
                @for ($s = 0; $s < 8; $s++)
                <div class="product-grid col-6 col-md-4 col-lg-3">
                  <div class="product-wrap">
                    <div class="image"><a href="javascript:void(0)"><img src="{{ asset('catalog/placeholder.png') }}" class="img-fluid"></a></div>
                    <div class="product-name">Vui lòng cấu hình sản phẩm</div>
                    <div class="product-price">
                      <span class="price-new">66.66</span>
                      <span class="price-lod">99.99</span>
                    </div>
                  </div>
                </div>
                @endfor
              @endif
            </div>
          </div>
          @endforeach
        </div>
      @endif
    </div>
 <div class="text-center mt-3 mb-5">
   <a href="{{ $url}}" class="text-xl">Xem tất cả > </a>
</div>
  </div>
</section>



