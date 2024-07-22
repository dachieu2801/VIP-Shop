@extends('layout.master')

@section('body-class', 'page-account-order-list')

@section('content')
  <x-shop-breadcrumb type="static" value="account.order.index" />

  <div class="container">
    <div class="row">
      <x-shop-sidebar />

      <div class="col-12 col-md-9">
          <h5 class="card-title mb-4">{{ __('shop/account/order.review') }}</h5>
        <form>
          @csrf
          <div class="user-rating mb-2">
            <input  type="radio" id="star1" name="rating" value="5">
            <label for="star1"><i class="bi bi-star-fill"></i></label>
            <input type="radio" id="star2" name="rating" value="4">
            <label for="star2"><i class="bi bi-star-fill"></i></label>
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3"><i class="bi bi-star-fill"></i></label>
            <input type="radio" id="star4" name="rating" value="2">
            <label for="star4"><i class="bi bi-star-fill"></i></label>
            <input checked type="radio" id="star5" name="rating" value="1">
            <label for="star5"><i class="bi bi-star-fill"></i></label>
          </div>

          <div class="form-group" style="margin-bottom: 10px;">
            <label for="content" class="form-label">{{__('product.product_review')}}</label>
            <textarea class="form-control" name="content" rows="4" style="width: 100%; padding: 10px;" required></textarea>
          </div>
          <button id="home-modules-box-toggle-1111111" class="btn btn-primary" style="background-color: #007bff; border: none; padding: 10px 20px;">
            {{__('product.rating_submit')}}
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('add-scripts')
  <script>
    $('#home-modules-box-toggle-1111111').click(function(e) {
      // Lấy giá trị của radio button đã chọn
      const rating = $('input[name="rating"]:checked').val();

      // Lấy nội dung từ textarea
      const content = $('textarea[name="content"]').val();

      const data ={
        content,
        star_rating: +rating,
        product_id:{{ $product_id }},
        // rating_service:'rating_service',
        order_product_id: {{ $order_product_id }}
      }
      $http.post('/product/review',data).then((res) => {
        window.location.href = '/account';
      })
    })
  </script>
@endpush
