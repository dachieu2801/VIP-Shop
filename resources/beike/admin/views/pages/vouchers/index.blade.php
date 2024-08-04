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
              <label class="filter-title">{{ __('product.sku') }}</label>
              <input @keyup.enter="search" type="text" v-model="filter.sku" class="form-control" placeholder="{{ __('product.sku') }}">
            </div>

            <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
              <label class="filter-title">{{ __('product.model') }}</label>
              <input @keyup.enter="search" type="text" v-model="filter.model" class="form-control" placeholder="{{ __('product.model') }}">
            </div>

   

            <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
              <label class="filter-title">{{ __('common.status') }}</label>
              <select v-model="filter.active" class="form-select">
                <option value="">{{ __('common.all') }}</option>
                <option value="1">{{ __('product.active') }}</option>
                <option value="0">{{ __('product.inactive') }}</option>
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
          <a href="{{ admin_route('products.create') }}" >
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

                  <th class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        {{ __('common.sort_order') }} 
                      <div class="d-flex flex-column ml-1 order-by-wrap">
                        <i class="el-icon-caret-top" @click="checkedOrderBy('position:asc')"></i>
                        <i class="el-icon-caret-bottom" @click="checkedOrderBy('position:desc')"></i>
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
                  <td>
                    <div class="wh-60 border d-flex rounded-2 justify-content-center align-items-center"><img src="{{ $voucher['images'][0] ?? 'image/placeholder.png' }}" class="img-fluid max-h-100"></div>
                  </td>
                  <td>
                    <a href="" target="_blank" title="{{ $voucher['name'] }}" class="text-dark">{{ $voucher['name'] }}</a>
                  </td>
                  
                  <td>{{ $voucher['created_at'] }}</td>
                
              
           
               
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('#upload-excel').click(function() {
    const fileInput = document.getElementById('import-excel');
    const file = fileInput.files[0];
    
    if (!file) {
      alert("Please select an Excel file.");
      return;
    }

    const reader = new FileReader();

    reader.onload = function(e) {
      try {
        const data = new Uint8Array(e.target.result);
        const workbook = XLSX.read(data, { type: 'array' });
        const firstSheetName = workbook.SheetNames[0];
        const worksheet = workbook.Sheets[firstSheetName];
        const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

        if (jsonData.length < 2) {
          alert("The Excel file doesn't contain enough data.");
          return;
        }

        // Convert jsonData to the format needed for the POST request
        const formattedData = jsonData.slice(1).map((row, index) => {
          if (row.length < 23) {
            console.warn(`Row ${index + 2} has insufficient columns`);
            return null; // Skip rows with insufficient columns
          }

          // Helper function to safely parse JSON
          function safeParse(jsonString) {
            try {
              return JSON.parse(jsonString);
            } catch (e) {
              console.error(`Error parsing JSON in row ${index + 2}: ${e.message}`);
              return [];
            }
          }

          return {
            descriptions: {
              zh_cn: {
                name: row[0] ? String(row[0]) : "",
                content: row[1] ? String(row[1]) : "",
                meta_title: row[2] ? String(row[2]) : "",
                meta_keywords: row[3] ? String(row[3]) : "",
                meta_description: row[4] ? String(row[4]) : ""
              },
              en: {
                name: row[5] ? String(row[5]) : "",
                content: row[6] ? String(row[6]) : "",
                meta_title: row[7] ? String(row[7]) : "",
                meta_keywords: row[8] ? String(row[8]) : "",
                meta_description: row[9] ? String(row[9]) : ""
              }
            },
            images: row[10] ? String(row[10]).split(',') : [],
            video: row[11] ? String(row[11]) : "",
            position: row[12] ? parseInt(row[12], 10) : 0,
            weight: row[13] ? parseFloat(row[13]) : 0,
            weight_class: row[14] ? String(row[14]) : "",
            brand_name: row[15] ? String(row[15]) : "",
            brand_id: row[16] ? String(row[16]) : "",
            tax_class_id: row[17] ? parseInt(row[17], 10) : 0,
            shipping: row[18] ? String(row[18]) : "1",
            categories: row[19] ? String(row[19]).split(',') : [],
            active: row[20] ? String(row[20]) : "1",
            variables: safeParse(row[21] ? String(row[21]) : "[]"),
            skus: safeParse(row[22] ? String(row[22]) : "[]")
          };
        }).filter(item => item !== null);

        if (formattedData.length === 0) {
          alert("No valid data found in the Excel file.");
          return;
        }

        // Send the formatted data as a POST request
        const token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
          url: '/admin/products/list',
          method: 'POST',
          headers: {
            'X-CSRF-Token': token,
            'Content-Type': 'application/json'
          },
          data: JSON.stringify({ products: formattedData }),
          success: function(response) {
            console.log(response);
            alert('Products imported successfully.');
          },
          error: function(error) {
            console.error('Error:', error);
            alert('Failed to import products.');
          }
        });
      } catch (error) {
        console.error('Error processing file:', error);
        alert('Error processing the file. Please check the file format and content.');
      }
    };

    reader.readAsArrayBuffer(file);
  });
});
</script>






<script>
$(document).ready(function() {
  $('#export-excel').click(function() {
    const token = $('meta[name="csrf-token"]').attr('content');
    
    fetch('/admin/products/list', {
      method: 'GET',
      headers: {
        'X-CSRF-Token': token,
        'Content-Type': 'application/json'
      }
    })
    .then(function(res) {
      return res.json(); // Parse JSON data
    })
    .then(function(dataArray) {
      console.log(dataArray);
      // Flatten the data array for Excel
      const flattenedData = dataArray.map(data => ({
        id: data.id,
        brand_id: data.brand_id,
        images: data.images.join(', '), // Join images array into a string
        // price: data.price,
        // video: data.video,
        position: data.position,
        shipping: data.shipping,
        active: data.active,
        tax_class_id: data.tax_class_id,
        weight: data.weight,
        weight_class: data.weight_class,
        // sales: data.sales,
        created_at: data.created_at,
        updated_at: data.updated_at,
        image: data.image,
        description_zh_cn: data.descriptions.find(d => d.locale === 'zh_cn')?.content || '',
        description_en: data.descriptions.find(d => d.locale === 'en')?.content || '',
        sku: data.skus.length > 0 ? data.skus[0].sku : '',
        sku_price: data.skus.length > 0 ? data.skus[0].price : '',
        sku_quantity: data.skus.length > 0 ? data.skus[0].quantity : '',
        category_id: data.categories.length > 0 ? data.categories[0].id : '',
        category_name: data.categories.length > 0 ? data.categories[0].name : ''
      }));

      // Create a new workbook and add the data
      const wb = XLSX.utils.book_new();
      const ws = XLSX.utils.json_to_sheet(flattenedData);
      XLSX.utils.book_append_sheet(wb, ws, 'Products');

      // Export to Excel
      XLSX.writeFile(wb, 'products_data.xlsx');
    })
    .catch(function(error) {
      console.error('Error:', error);
    });
  });
});
</script>


  <script>


    let app = new Vue({
      el: '#product-app',
      data: {

        filter: {
          name: bk.getQueryString('name'),
          page: bk.getQueryString('page'),
          category_id: bk.getQueryString('category_id'),
          sku: bk.getQueryString('sku'),
          model: bk.getQueryString('model'),
          active: bk.getQueryString('active'),
          sort: bk.getQueryString('sort', ''),
          order: bk.getQueryString('order', ''),
        },
        selectedIds: [],
        productIds: @json($vouchers->pluck('id')),
      },

      computed: {
        allSelected: {
          get(e) {
            return this.selectedIds.length == this.productIds.length;
          },
          set(val) {
            return val ? this.selectedIds = this.productIds : this.selectedIds = [];
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
          $http.post('products/status', {ids: [id], status: type}).then((res) => {
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

        deleteProduct(index) {
          const id = this.productIds[index];

          this.$confirm('{{ __('common.confirm_delete') }}', '{{ __('common.text_hint') }}', {
            type: 'warning'
          }).then(() => {
            $http.delete('products/' + id).then((res) => {
              this.$message.success(res.message);
              location.reload();
            })
          }).catch(()=>{});
        },

        restoreProduct(index) {
          const id = this.productIds[index];

          this.$confirm('{{ __('admin/product.confirm_batch_restore') }}', '{{ __('common.text_hint') }}', {
            type: 'warning'
          }).then(() => {
            $http.put('products/restore', {id: id}).then((res) => {
              location.reload();
            })
          }).catch(()=>{});;
        },

        clearRestore() {
          this.$confirm('{{ __('admin/product.confirm_delete_restore') }}', '{{ __('common.text_hint') }}', {
            type: 'warning'
          }).then(() => {
            $http.post('products/trashed/clear').then((res) => {
              location.reload();
            })
          }).catch(()=>{});;
        }
      }
    });
  </script>
@endpush
