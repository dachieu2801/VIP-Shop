@extends('admin::layouts.master')

@section('title', 'Sản phẩm bán chạy')

@push('header')
  <script src="{{ asset('vendor/vue/Sortable.min.js') }}"></script>
  <script src="{{ asset('vendor/vue/vuedraggable.js') }}"></script>
  <script src="{{ asset('vendor/tinymce/5.9.1/tinymce.min.js') }}"></script>
@endpush

@section('content')

            @hook('admin.product.edit.product_relations.before')
            <form novalidate class="needs-validation" action=""
            method="POST" id="app">
                <x-admin::form.row title="Sản phẩm bán chạy">
              <div class="module-edit-group wp-600">
                <div class="autocomplete-group-wrapper">
                  <el-autocomplete
                    class="inline-input"
                    v-model="relations.keyword"
                    value-key="name"
                    size="small"
                    :fetch-suggestions="relationsQuerySearch"
                    placeholder="{{ __('admin/builder.modules_keywords_search') }}"
                    @select="relationsHandleSelect"
                  ></el-autocomplete>

                  <div class="item-group-wrapper" v-loading="relations.loading">
                    <template v-if="relations.products.length">
                      <draggable
                        ghost-class="dragabble-ghost"
                        :list="relations.products"
                        :options="{animation: 330}"
                      >
                        <div v-for="(item, index) in relations.products" :key="index" class="item">
                          <div>
                            <i class="el-icon-s-unfold"></i>
                            <span>@{{ item.name }}</span>
                          </div>
                          <i class="el-icon-delete right" @click="relationsRemoveProduct(index)"></i>
                          <input type="text" :name="'relations['+ index +']'" v-model="item.id" class="form-control d-none">
                        </div>
                      </draggable>
                    </template>
                    <template v-else>{{ __('admin/builder.modules_please_products') }}</template>
                  </div>
                </div>
              </div>
                        </x-admin::form.row>
                <x-admin::form.row title="">
                        <button type="submit" class="btn  btn-primary btn-submit mt-3 btn-lg">{{ __('common.save') }}</button>
                    </x-admin::form.row>
            </form>
            @endsection
            @push('footer')
            <script>
                var app = new Vue({
                    el: '#app',
                    data: {
                        relations: {
                            keyword: '',
                            products: @json($relations ?? []),
                            loading: null,
                },
            // other data properties...
                        },
                    methods:{
                        relationsQuerySearch(keyword, cb) {
                            $http.get('products/autocomplete?name=' + encodeURIComponent(keyword), null, {hload:true}).then((res) => {cb(res.data);})
                    },


                        relationsHandleSelect(item) {
                            if (!this.relations.products.find(v => v == item.id))
                            {
                                this.relations.products.push(item);
                            }         
                                this.relations.keyword = ""
                    },

                    relationsRemoveProduct(index) {
                                this.relations.products.splice(index, 1);
                    },
                            }
                                })
            </script>
            @endpush