@extends('admin::layouts.master')

@section('title', $type === "edit" ? "Sửa mã giảm giá" : "Tạo mã giảm giá")

@section('body-class', 'page-product-form')

@push('header')
  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <!-- Vue and other local scripts -->
  <script src="{{ asset('vendor/vue/Sortable.min.js') }}"></script>
  <script src="{{ asset('vendor/vue/vuedraggable.js') }}"></script>
  <script src="{{ asset('vendor/tinymce/5.9.1/tinymce.min.js') }}"></script>
  
  <!-- Bootstrap Datepicker CSS and JS from CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endpush

@section('page-bottom-btns')
  <button type="button" class="btn w-min-100 btn-lg btn-primary submit-form-edit">{{ $type === "edit" ? __('common.save') : __('common.save_new') }}</button>
  <button type="button" class="btn w-min-100 btn-lg btn-default submit-form ms-2">{{ __('common.save_return') }}</button>
@endsection

@section('content')
    @if (session()->has('success'))
      <x-admin-alert type="success" msg="{{ session('success') }}" class="mt-4" />
    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif
    <ul class="nav nav-tabs nav-bordered mb-3" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-basic" type="button">{{ __('admin/product.basic_information') }}</button>
      </li>
    </ul>

    <div class="card">
      <div class="card-body h-min-600">
        <form novalidate class="needs-validation" action="{{ $type === 'edit' ? admin_route('vouchers.update', $voucher) : admin_route('vouchers.store') }}" method="POST" id="app">
          @csrf
      

          <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-basic">
              <h6 class="border-bottom pb-3 mb-4">{{ __('common.data') }}</h6>
              <x-admin::form.row :title="__('common.name') . ' Voucher'" :required="true">
                <input type="text" name="name" class="form-control wp-600" value="{{ $voucher['name'] ?? '' }}" placeholder="{{ __('common.name') . ' Voucher' }}" required>
              </x-admin::form.row>
              <x-admin::form.row :title="'Mô tả Voucher'" :required="true">
                <input type="text" name="description" class="form-control wp-600" value="{{ $voucher['description'] ?? '' }}" placeholder="Nhập Mô Tả" required>
              </x-admin::form.row>
              <x-admin::form.row :title="'Giá trị Voucher'" :required="true">
                <input type="text" name="discount_value" class="form-control wp-600" value="{{ $voucher['discount_value'] ?? '' }}" placeholder="Nhập giá trị" required>
              </x-admin::form.row>
              <x-admin::form.row :title="'Loaị giảm giá'">
  <div class="mb-1 mt-2">
    <div class="form-check form-check-inline">
      <input class="form-check-input" id="enable" type="radio" name="discount_type"  value="percentage" {{$type==='edit' ? $voucher['discount_type'] === 'percentage' ? 'checked' : '' : 'checked' }}>
      <label class="form-check-label" for="enable">Theo phần trăm</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" id="disable" type="radio" name="discount_type"  value="fixed" {{ $type==='edit' ? $voucher['discount_type'] !== 'percentage' ? 'checked' : '' : 'checked' }}>
      <label class="form-check-label" for="disable">Theo giá trị </label>
    </div>
  </div>
</x-admin::form.row >
              <x-admin::form.row :title="'Giới hạn số lượng Voucher'" :required="true">
                <input type="text" name="usage_limit" class="form-control wp-600" value="{{ $voucher['usage_limit'] ?? '' }}" placeholder="Nhập số lượng" required>
              </x-admin::form.row>

              <x-admin::form.row :title="'Ngày kích hoạt'" :required="true">
                <input type="text" name="start_date" class="form-control wp-600 datepicker" value="{{ old('start_date', $voucher['start_date'] ?? '') }}" placeholder="Chọn ngày" required>
              </x-admin::form.row>
              <x-admin::form.row :title="'Ngày hết hạn'" :required="true">
                <input type="text" name="end_date" class="form-control wp-600 datepicker" value="{{ old('end_date', $voucher['end_date'] ?? '') }}" placeholder="Chọn ngày" required>
              </x-admin::form.row>

              
 

              <x-admin::form.row :title="'Trạng thái'">
  <div class="mb-1 mt-2">
    <div class="form-check form-check-inline">
      <input class="form-check-input" id="enable" type="radio" name="status"  value="active" {{$type==='edit' ? $voucher['status'] === 'active' ? 'checked' : '' : 'checked' }}>
      <label class="form-check-label" for="enable">{{ __('common.enable') }}</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" id="disable" type="radio" name="status"  value="inactive" {{ $type==='edit' ? $voucher['status'] !== 'active' ? 'checked' : '' : 'checked' }}>
      <label class="form-check-label" for="disable">{{ __('common.disable') }}</label>
    </div>
  </div>
 
</x-admin::form.row>
            </div>
          </div>

          <x-admin::form.row title="">
            <button type="submit" class="btn d-none btn-primary btn-submit mt-3 btn-lg">{{ __('common.save') }}</button>
          </x-admin::form.row>
        </form>
      </div>
    </div>

    @hook('admin.product.form.footer')
@endsection

@push('footer')
  <script>
    $(document).ready(function() {
      // Check if jQuery is loaded
      if (typeof jQuery === 'undefined') {
        console.error('jQuery not loaded');
      } else {
        console.log('jQuery is loaded');
      }

      // Initialize datepicker for all inputs with the class 'datepicker'
      if ($.fn.datepicker) {
        console.log('Initializing datepicker');
        $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true,
          todayHighlight: true
        });
      } else {
        console.error('Datepicker plugin not loaded');
      }

      $('.submit-form-edit').on('click', function () {
      const action = $(`form#app`).attr('action');
      console.log('action',action)
     
      // $(`form#app`).attr('action', bk.updateQueryStringParameter(action, 'action_type', 'stay'));
      // const updatedAction = bk.updateQueryStringParameter(action, 'action_type', 'stay');
      // console.log('updatedAction',updatedAction)

      setTimeout(() => {
        console.log('Form data at submission time:', $(`form#app`).serializeArray());
        $(`form#app`).find('button[type="submit"]')[0].click();
      }, 0);
    })

    $('.submit-form').on('click', function () {
     

      setTimeout(() => {
        $(`form#app`).find('button[type="submit"]')[0].click();
      }, 0);
    })

      
    //   
    });
  </script>
@endpush
