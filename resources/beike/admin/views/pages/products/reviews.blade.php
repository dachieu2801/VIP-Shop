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
              <label class="filter-title">{{ __('common.star') }}</label>
              <select v-model="filter.star" class="form-select">
                <option value="">{{ __('common.all_star') }}</option>
                <option value="1">{{ __('common.star_1') }}</option>
                <option value="2">{{ __('common.star_2') }}</option>
                <option value="3">{{ __('common.star_3') }}</option>
                <option value="4">{{ __('common.star_4') }}</option>
                <option value="5">{{ __('common.star_5') }}</option>
              </select>
            </div>
            @hook('admin.product.list.filter')
          </div>

          <div class="row">
            <label class="filter-title"></label>
            <div class="col-auto">
              <button type="button" @click="search" class="btn btn-outline-primary btn-sm">{{ __('common.filter') }}</button>
            </div>
          </div>
        </div>

        <div class=" justify-content-between my-4">
          <div style="text-align: right; margin-bottom: 16px">
            <button class="btn btn-outline-secondary" :disabled="!selectedIds.length" @click="batchDelete">{{ __('admin/product.batch_delete')  }}</button>
          </div>
          @if (count($reviews)>0)
              <div class="table-push">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th><input type="checkbox" v-model="allSelected" /></th>
                      <th>{{ __('common.id') }}</th>
                      <th>{{ __('common.user') }}</th>
                      <th>{{ __('common.star') }}</th>
                      <th>{{ __('common.content') }}</th>
                      <th >{{ __('common.created_at') }}</th>
                      <th class="text-end">{{ __('common.action') }}</th>
                    </tr>
                  </thead>

                    @foreach($reviews as $review)
                      <tr>
                        <td><input type="checkbox" :value="{{ $review['id'] }}" v-model="selectedIds" /></td>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->customer_name }}</td>
                        <td>{{ $review->star_rating }}</td>
                        <td>{{ $review->content }}</td>
                        <td>{{ $review->created_at }}</td>
                        <td class="text-end">
                          <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" @click.prevent="deleteReview({{ $loop->index }})">{{ __('common.delete') }}</a>
                        </td>
                      </tr>
                    @endforeach


                </table>
              </div>
          {{ $reviews->withQueryString()->links('shared/pagination/bootstrap-4') }}
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
        url: '{{  admin_route("products.reviews") }}',
        filter: {
          star:  bk.getQueryString('star'),
          product_id: {{ $product_id }} ?? '',
        },
        selectedIds: [],
        reviewIds: @json($reviews->pluck('id')),
      },
      computed: {
        allSelected: {
          get(e) {
            return this.selectedIds.length == this.reviewIds.length;
          },
          set(val) {
            return val ? this.selectedIds = this.reviewIds : this.selectedIds = [];
          }
        }
      },
      methods: {
        search() {
          this.filter.page = '';
          location = bk.objectToUrlParams(this.filter, this.url)
        },
        deleteReview(index) {
          const id = this.reviewIds[index];
          this.$confirm('{{ __('common.confirm_delete') }}', '{{ __('common.text_hint') }}', {
            type: 'warning'
          }).then(() => {
            $http.delete('products/reviews/delete', {ids: [id]}).then((res) => {
              console.log(res)
              this.$message.success(res.message);
              location.reload();
            })
          }).catch(()=>{});
        },
        batchDelete() {
          this.$confirm('{{ __('admin/product.confirm_batch_product') }}', '{{ __('common.text_hint') }}', {
            confirmButtonText: '{{ __('common.confirm') }}',
            cancelButtonText: '{{ __('common.cancel') }}',
            type: 'warning'
          }).then(() => {
            $http.delete('products/reviews/delete', {ids: this.selectedIds}).then((res) => {
              layer.msg(res.message)
              location.reload();
            })
          }).catch(()=>{});
        },
      }
    });
  </script>
@endpush
