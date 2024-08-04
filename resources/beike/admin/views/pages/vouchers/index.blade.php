@php
    use Carbon\Carbon;
@endphp


@extends('admin::layouts.master')

@section('title', __('admin/common.product'))

@section('content')
  @if ($errors->has('error'))
    <x-admin-alert type="danger" msg="{{ $errors->first('error') }}" class="mt-4" />
  @endif

  @if (session()->has('success'))
    <x-admin-alert type="success" msg="{{ session('success') }}" class="mt-4" />
  @endif

  <div id="product-app">
    <div class="card h-min-600">
      <div class="card-body">
        <div class="bg-light p-4">
          <div class="row">
            <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
              <label class="filter-title">{{ __('product.name') }}</label>
              <input @keyup.enter="search" type="text" v-model="filter.name" class="form-control" placeholder="{{ __('product.name') }}">
            </div>
            
    

   

            <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
              <label class="filter-title">{{ __('common.status') }}</label>
              <select v-model="filter.status" class="form-select">
                <option value="">{{ __('common.all') }}</option>
                <option value="active">{{ __('product.active') }}</option>
                <option value="inactive">{{ __('product.inactive') }}</option>
              </select>
            </div>

            @hook('admin.product.list.filter')
          </div>

          <div class="row">
            <label class="filter-title"></label>
            <div class="col-auto">
              <button type="button" @click="search" class="btn btn-outline-primary btn-sm">{{ __('common.filter') }}</button>
              <button type="button" @click="resetSearch" class="btn btn-outline-secondary btn-sm">{{ __('common.reset') }}</button>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-between my-4 flex-wrap gap-2">
          <a href="{{ admin_route('vouchers.create') }}" >
            <button class="btn btn-primary">{{ __('admin/product.products_create') }}</button>
          </a>
       
        </div>

      @if ($vouchers->total())
          <div class="table-push overflow-auto">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th><input type="checkbox" v-model="allSelected" /></th>
                  <th>{{ __('common.id') }}</th>
                  <th>{{ __('product.name') }}</th>
                  <th>Mã giảm giá</th>
                  <th>Miêu tả</th>
                  <th>Giá trị</th>
                  <th>Loại giảm giá</th>
                  <th>Ngày kích hoạt</th>
                  <th>Ngày hết hạn</th>
                  <th>Giới hạn sử dụng</th>
                  <th>Đã sử dụng</th>
                  <th>Trạng thái</th>
                  <th>
                    <div class="d-flex align-items-center">
                        {{ __('common.created_at') }}
                      <div class="d-flex flex-column ml-1 order-by-wrap">
                        <i class="el-icon-caret-top" @click="checkedOrderBy('created_at:asc')"></i>
                        <i class="el-icon-caret-bottom" @click="checkedOrderBy('created_at:desc')"></i>
                      </div>
                    </div>
                  </th>

                 
                  @hook('admin.product.list.column')
                  <th class="text-end">{{ __('common.action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vouchers_format['data'] as $voucher)
                <tr>
                  <td><input type="checkbox" :value="{{ $voucher['id'] }}" v-model="selectedIds" /></td>
                  <td>{{ $voucher['id'] }}</td>
                  <td>{{ $voucher['name'] }}</td>
                  </td>
                  <td>
                    <a href="" target="_blank" title="{{ $voucher['name'] }}" class="text-dark">{{ $voucher['code'] }}</a>
                  </td>
                  
                  <td>{{ $voucher['description'] }}</td>
                  <td>{{ $voucher['discount_value'] }}</td>
                  <td>{{ $voucher['discount_type'] }}</td>
                  <td>{{ Carbon::parse($voucher['start_date'])->format('d-m-Y H:i:s') }}</td>
                  <td>{{ Carbon::parse($voucher['end_date'])->format('d-m-Y H:i:s') }}</td>
                  <td>{{ $voucher['usage_limit'] }}</td>
                  <td>{{ $voucher['used_count'] }}</td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input cursor-pointer" type="checkbox" role="switch" data-active="{{ $voucher['status'] === 'active' ? true : false }}" data-id="{{ $voucher['id'] }}" @change="turnOnOff($event)" {{ $voucher['status'] === 'active' ? 'checked' : '' }}>
                    </div>
                  </td>
                  
                  <td>{{ Carbon::parse($voucher['created_at'])->format('d-m-Y H:i:s') }}</td>
                  @hook('admin.product.list.column_value')
                  <td class="text-end text-nowrap">
                   
                      
                      <a href="{{ admin_route('vouchers.show', [$voucher['id']]) }}" class="btn btn-outline-secondary btn-sm">{{ __('common.edit') }}</a>
                      <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" @click.prevent="deleteVoucher({{ $loop->index }})">{{ __('common.delete') }}</a>
                      @hook('admin.product.list.action')
                
                     
                      @hook('admin.products.trashed.action')
                 
                  </td>
                
              
           
               
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          {{ $vouchers->withQueryString()->links('admin::vendor/pagination/bootstrap-4') }}
        @else
          <x-admin-no-data />
        @endif
      </div>
    </div>
  </div>

  @hook('admin.product.list.content.footer')
@endsection

@push('footer')


  <script>


    let app = new Vue({
      el: '#product-app',
      data: {
        url: '{{ admin_route("vouchers.index") }}',
        filter: {
          name: bk.getQueryString('name'),
         
          status: bk.getQueryString('status'),
        
        },
        selectedIds: [],
        voucherIds: @json($vouchers->pluck('id')),
      },

      computed: {
        allSelected: {
          get(e) {
            return this.selectedIds.length == this.voucherIds.length;
          },
          set(val) {
            return val ? this.selectedIds = this.voucherIds : this.selectedIds = [];
          }
        }
      },

      created() {
        bk.addFilterCondition(this);
      },

      methods: {
        turnOnOff() {
          let id = event.currentTarget.getAttribute("data-id");
          let checked = event.currentTarget.getAttribute("data-active");
          let type = true;
          if (checked) type = false;
          $http.post('vouchers/edit', {id: id, status: type ? "active" : "inactive"}).then((res) => {
            layer.msg(res.message)
            location.reload();
          })
        },

        batchDelete() {
          this.$confirm('{{ __('admin/product.confirm_batch_product') }}', '{{ __('common.text_hint') }}', {
            confirmButtonText: '{{ __('common.confirm') }}',
            cancelButtonText: '{{ __('common.cancel') }}',
            type: 'warning'
          }).then(() => {
            $http.delete('products/delete', {ids: this.selectedIds}).then((res) => {
              layer.msg(res.message)
              location.reload();
            })
          }).catch(()=>{});
        },

        batchActive(type) {
          this.$confirm('{{ __('admin/product.confirm_batch_status') }}', '{{ __('common.text_hint') }}', {
            confirmButtonText: '{{ __('common.confirm') }}',
            cancelButtonText: '{{ __('common.cancel') }}',
            type: 'warning'
          }).then(() => {
            $http.post('products/status', {ids: this.selectedIds, status: type}).then((res) => {
              layer.msg(res.message)
              location.reload();
            })
          }).catch(()=>{});
        },

        search() {
          this.filter.page = '';
          location = bk.objectToUrlParams(this.filter, this.url)
        },

        checkedOrderBy(orderBy) {
          this.filter.sort = orderBy.split(':')[0];
          this.filter.order = orderBy.split(':')[1];
          location = bk.objectToUrlParams(this.filter, this.url)
        },

        resetSearch() {
          this.filter = bk.clearObjectValue(this.filter)
          location = bk.objectToUrlParams(this.filter, this.url)
        },

        deleteVoucher(index) {
          const id = this.productIds[index];

          this.$confirm('{{ __('common.confirm_delete') }}', '{{ __('common.text_hint') }}', {
            type: 'warning'
          }).then(() => {
            $http.post('vouchers/delete', {id: id} ).then((res) => {
              this.$message.success(res.message);
              location.reload();
            })
          }).catch(()=>{});
        },

     

        
      }
    });
  </script>
@endpush
