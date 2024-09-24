<footer>
  @hook('footer.before')

  <div class="container">
    @hook('footer.services.before')

    @if ($footer_content['services']['enable'])
      <div class="services-wrap">
        <div class="row align-items-lg-center">
          @foreach ($footer_content['services']['items'] as $item)
            <div class="col-lg-3 col-md-6 col-12">
              <div class="service-item my-1">
                <div class="icon"><img src="{{ image_resize($item['image'], 80, 80) }}" class="img-fluid"></div>
                <div class="text">
                  <p class="title">{{ $item['title'][locale()] ?? '' }}</p>
                  <p class="sub-title">{{ $item['sub_title'][locale()] ?? '' }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endif

    @hook('footer.services.after')
    @php
      $categories = [
[
  'id'=> 100005,
  'name'=> "Mua Với Giá Đặc Biệt",
  'image'=> "http: //127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100005",
  'children'=> [],
],
[
  'id'=> 100006,
  'name'=> "Thể Thao Ngoài Trời",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100006",
  'children'=> [
    [
      'id'=> 100008,
      'name'=> "Lều",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100008",
      'children'=> [],
    ],
  ],
],
[
  'id'=> 100010,
  'name'=> "Quần Áo Nam Và Nữ",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100010",
  'children'=> [
    [
      'id'=> 100011,
      'name'=> "Của Nam Giới",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100011",
      'children'=> [],
    ],
    [
      'id'=> 100013,
      'name'=> "Ngọn",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100013",
      'children'=> [],
    ],
    [
      'id'=> 100014,
      'name'=> "Đáy",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100014",
      'children'=> [],
    ],
  ],
],
[
  'id'=> 100012,
  'name'=> "Giảm Giá Mùa Hè",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100012",
  'children'=> [],
],
[
  'id'=> 100018,
  'name'=> "Thiết Bị Gia Dụng",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100018",
  'children'=> [
    [
      'id'=> 100017,
      'name'=> "Tủ Lạnh Thông Minh",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100017",
      'children'=> [],
    ],
  ],
],
[
  'id'=> 100020,
  'name'=> "Mẹ & bé",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100020",
  'children'=> [],
],
[
  'id'=> 100032,
  'name'=> "Khác",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100032",
  'children'=> [
    [
      'id'=> 100033,
      'name'=> "Nhà sách online",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100033",
      'children'=> [],
    ],
    [
      'id'=> 100034,
      'name'=> "Bách hoá online",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100034",
      'children'=> [],
    ],
    [
      'id'=> 100035,
      'name'=> "Sức khoẻ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100035",
      'children'=> [],
    ],
    [
      'id'=> 100036,
      'name'=> "Sắc đẹp",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100036",
      'children'=> [],
    ],
  ],
],
[
  'id'=> 100037,
  'name'=> "Nhà cửa & đời sống",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100037",
  'children'=> [],
],
[
  'id'=> 100039,
  'name'=> "Trẻ em",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100039",
  'children'=> [],
],
[
  'id'=> 100040,
  'name'=> "Ô Tô & Xe Máy & Xe Đạp",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100040",
  'children'=> [],
],
[
  'id'=> 100041,
  'name'=> "Thể Thao & Du Lịch",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100041",
  'children'=> [],
],
[
  'id'=> 100003,
  'name'=> "Thời Trang",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100003",
  'children'=> [
    [
      'id'=> 100021,
      'name'=> "Thời trang nam",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100021",
      'children'=> [],
    ],
    [
      'id'=> 100022,
      'name'=> "Thời trang nữ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100022",
      'children'=> [],
    ],
    [
      'id'=> 100023,
      'name'=> "Giày dép nam",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100023",
      'children'=> [],
    ],
    [
      'id'=> 100024,
      'name'=> "Giày dép nữ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100024",
      'children'=> [],
    ],
    [
      'id'=> 100025,
      'name'=> "Túi ví nữ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100025",
      'children'=> [],
    ],
    [
      'id'=> 100030,
      'name'=> "Đồng hồ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100030",
      'children'=> [],
    ],
    [
      'id'=> 100031,
      'name'=> "Phụ kiện & trang sức nữ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100031",
      'children'=> [],
    ],
    [
      'id'=> 100038,
      'name'=> "Trẻ em",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100038",
      'children'=> [],
    ],
  ],
],
[
  'id'=> 100007,
  'name'=> "Điện Tử Kỹ Thuật Số",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100007",
  'children'=> [
    [
      'id'=> 100002,
      'name'=> "Tai Nghe Máy Tính Bảng",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100002",
      'children'=> [],
    ],
    [
      'id'=> 100004,
      'name'=> "Máy Ảnh",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100004",
      'children'=> [],
    ],
    [
      'id'=> 100026,
      'name'=> "Điện thoại & phụ kiện",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100026",
      'children'=> [],
    ],
    [
      'id'=> 100027,
      'name'=> "Thiết bị điện tử",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100027",
      'children'=> [],
    ],
    [
      'id'=> 100028,
      'name'=> "Máy tính & laptop",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100028",
      'children'=> [],
    ],
    [
      'id'=> 100029,
      'name'=> "Máy ảnh & máy quay phim",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100029",
      'children'=> [
[
      'id'=> 100028,
      'name'=> "Máy tính & laptop",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100028",
      'children'=> [],
    ],
    [
      'id'=> 100029,
      'name'=> "Máy ảnh & máy quay phim",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100029",
      'children'=> [

],
    ],
],
    ],
  ],
],
];

      function countChildren($category) {
    return count($category['children']);
}

    usort($categories, function($a, $b) {
    $countA = countChildren($a);
    $countB = countChildren($b);

    // Nếu cả hai đều không có children hoặc cả hai đều có cùng số lượng children
    // thì sắp xếp theo thứ tự tên
    if ($countA == 0 && $countB == 0 || $countA == $countB) {
        return strcmp($a['name'], $b['name']);
    }

    // Phần tử không có children sẽ được sắp xếp lên trước
    return $countA > $countB ? -1 : 1;
});


    function renderCategory($category) {
    echo '<div>';
    echo '<a href="'.$category['url'].'"><p class="mb-0"><strong class="text-uppercase">' . $category['name'] . '</strong></p></a>';
    echo '<div class="d-flex flex-wrap gap-1 text-xs">';
    foreach ($category['children'] as $child) {
        echo '<a href="'.$child['url'].'" class="category-link">' . $child['name'] . '</a>';
        if (!empty($child['children'])) {
            renderCategory($child);
        }
    }
    echo '</div>';
    echo '</div>';
}
    @endphp
    <!-- <div>
      <div class="my-4 text-lg"><h5 class="fw-medium text-uppercase">{{__('shop/common.categories')}}</h5></div>
      <div class="">
{{--          <div class="footer-categories d-flex gap-3 flex-wrap flex-column w-100 align-content-start overflow-auto">--}}
        <div class="row">
        @php

        if (isset($footer_content['categories']) && is_array($footer_content['categories'])){
           usort($footer_content['categories'], function($a, $b) {
                $countA = countChildren($a);
                $countB = countChildren($b);

                // Nếu cả hai đều không có children hoặc cả hai đều có cùng số lượng children
                // thì sắp xếp theo thứ tự tên
                if ($countA == 0 && $countB == 0 || $countA == $countB) {
                    return strcmp($a['name'], $b['name']);
                }

                // Phần tử không có children sẽ được sắp xếp lên trước
                return $countA > $countB ? 1 : -1;
              });
        }
        @endphp
            @if(isset($footer_content['categories']) && is_array($footer_content['categories'])&&count($footer_content['categories'])>0)
            @foreach ($footer_content['categories'] as $category)
              <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-2">
                @php renderCategory($category) @endphp
              </div>
            @endforeach
            @endif
          </div> -->

    <div class="footer-content">
      <div class="row">
        <div class="col-12 col-md-3 me-lg-5">
          <div class="footer-content-left footer-link-wrap">
            <h6 class="text-uppercase text-dark intro-title">{{ __('shop/common.company_profile') }}<span class="icon-open"><i class="bi bi-plus-lg"></i></span></h6>
            <div class="intro-wrap">
              @if ($footer_content['content']['intro']['logo'] ?? false)
                <div class="logo"><a href="{{ shop_route('home.index') }}"><img src="{{ image_origin($footer_content['content']['intro']['logo']) }}" class="img-fluid"></a></div>
              @endif
              <div class="text tinymce-format-p">{!! $footer_content['content']['intro']['text'][locale()] ?? '' !!}</div>
              <div class="social-network">
                @foreach ($footer_content['content']['intro']['social_network'] ?? [] as $item)
                <a href="{{ $item['link'] }}" target="_blank"><img src="{{ image_origin($item['image']) }}" class="img-fluid"></a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        @for ($i = 1; $i <= 3; $i++)
          @php
            $link = $footer_content['content']['link' . $i];
          @endphp
          <div class="col-12 col-md footer-content-link{{ $i }} footer-link-wrap">
            <h6 class="text-uppercase text-dark">{{ $link['title'][locale()] ?? '' }}<span class="icon-open"><i class="bi bi-plus-lg"></i></span></h6>
            <ul class="list-unstyled">
              @foreach ($link['links'] as $item)
                @if ($item['link'])
                <li class="lh-lg mb-2">
                  <a href="{{ $item['link'] }}" @if (isset($item['new_window']) && $item['new_window']) target="_blank" @endif>
                    {{ $item['text'] }}
                  </a>
                </li>
              @endif
              @endforeach
            </ul>
          </div>
        @endfor

        @hook('footer.contact.before')
        @hookwrapper('footer.contact')
        <div class="col-12 col-md-3 footer-content-contact footer-link-wrap">
          <h6 class="text-uppercase text-dark">{{ __('common.contact_us') }}<span class="icon-open"><i class="bi bi-plus-lg"></i></span> </h6>
          <ul class="list-unstyled">
            @if ($footer_content['content']['contact']['email'])
              <li class="lh-lg mb-2"><i class="bi bi-envelope-fill"></i> {{ $footer_content['content']['contact']['email'] }}</li>
            @endif
            @if ($footer_content['content']['contact']['telephone'])
              <li class="lh-lg mb-2"><i class="bi bi-telephone-fill"></i> {{ $footer_content['content']['contact']['telephone'] }}</li>
            @endif
            @if ($footer_content['content']['contact']['address'][locale()] ?? '')
              <li class="lh-lg mb-2"><i class="bi bi-geo-alt-fill"></i> {{ $footer_content['content']['contact']['address'][locale()] ?? '' }}</li>
            @endif
          </ul>
        </div>
        @endhookwrapper
        @hook('footer.contact.after')
      </div>
    </div>
  </div>

  @hookwrapper('footer.copyright')
  <div class="footer-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <div class="d-flex flex-wrap">


            {!! $footer_content['bottom']['copyright'][locale()] ?? '' !!}
          </div>
        </div>
        @if (isset($footer_content['bottom']['image']) && $footer_content['bottom']['image'])
          <div class="col-auto right-img py-md-2">
            <img src="{{ image_origin($footer_content['bottom']['image']) }}" class="img-fluid">
          </div>
        @endif
      </div>
    </div>
  </div>
  @endhookwrapper

  @hook('footer.after')
</footer>
