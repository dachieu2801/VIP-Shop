

<?php $__env->startSection('title', __('admin/common.product')); ?>

<?php $__env->startSection('content'); ?>
  <?php if($errors->has('error')): ?>
    <?php if (isset($component)) { $__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Alert::resolve(['type' => 'danger','msg' => ''.e($errors->first('error')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Alert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8)): ?>
<?php $attributes = $__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8; ?>
<?php unset($__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8)): ?>
<?php $component = $__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8; ?>
<?php unset($__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8); ?>
<?php endif; ?>
  <?php endif; ?>

  <?php if(session()->has('success')): ?>
    <?php if (isset($component)) { $__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Alert::resolve(['type' => 'success','msg' => ''.e(session('success')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Alert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8)): ?>
<?php $attributes = $__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8; ?>
<?php unset($__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8)): ?>
<?php $component = $__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8; ?>
<?php unset($__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8); ?>
<?php endif; ?>
  <?php endif; ?>

  <div id="product-app">


    <div class="card h-min-600">
      <div class="card-body">
        <div class="bg-light p-4">
          <div class="row">
            <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
              <label class="filter-title"><?php echo e(__('product.name')); ?></label>
              <input @keyup.enter="search" type="text" v-model="filter.name" class="form-control" placeholder="<?php echo e(__('product.name')); ?>">
            </div>
            <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
              <label class="filter-title"><?php echo e(__('product.sku')); ?></label>
              <input @keyup.enter="search" type="text" v-model="filter.sku" class="form-control" placeholder="<?php echo e(__('product.sku')); ?>">
            </div>

            <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
              <label class="filter-title"><?php echo e(__('product.model')); ?></label>
              <input @keyup.enter="search" type="text" v-model="filter.model" class="form-control" placeholder="<?php echo e(__('product.model')); ?>">
            </div>



            <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
              <label class="filter-title"><?php echo e(__('product.category')); ?></label>
              <select v-model="filter.category_id" class="form-select">
                <option value=""><?php echo e(__('common.all')); ?></option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option :value="<?php echo e($_category->id); ?>"><?php echo e($_category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>

            <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
              <label class="filter-title">Lọc theo tồn kho</label>
              <select v-model="filter.sort_quantity" class="form-select">
                <option value="0">Không</option>

                  <option value="1">Có</option>
              </select>
            </div>

            <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
              <label class="filter-title"><?php echo e(__('common.status')); ?></label>
              <select v-model="filter.active" class="form-select">
                <option value=""><?php echo e(__('common.all')); ?></option>
                <option value="1"><?php echo e(__('product.active')); ?></option>
                <option value="0"><?php echo e(__('product.inactive')); ?></option>
              </select>
            </div>

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.list.filter",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
          </div>

          <div class="row">
            <label class="filter-title"></label>
            <div class="col-auto">
              <button type="button" @click="search" class="btn btn-outline-primary btn-sm"><?php echo e(__('common.filter')); ?></button>
              <button type="button" @click="resetSearch" class="btn btn-outline-secondary btn-sm"><?php echo e(__('common.reset')); ?></button>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-between my-4 flex-wrap gap-2">
          <?php if($type != 'trashed'): ?>
          <div class="me-1 nowrap">

            <a href="<?php echo e(admin_route('products.create')); ?>" >
              <button class="btn btn-primary"><?php echo e(__('admin/product.products_create')); ?></button>
            </a>

              <input type="file" id="import-excel" accept=".xlsx, .xls">
              <button class="btn btn-success text-white"  id="upload-excel">Upload Excel</button>

              <button id="export-example-excel" class="btn btn-light">Tải file excel mẫu</button>
              <button id="export-excel" class="btn btn-danger"><?php echo e(__('admin/product.export_excel')); ?></button>
          </div>
          <?php else: ?>
            <?php if($products->total()): ?>
              <button class="btn btn-primary" @click="clearRestore"><?php echo e(__('admin/product.clear_restore')); ?></button>
            <?php endif; ?>
          <?php endif; ?>

          <?php if($type != 'trashed' && $products->total()): ?>
            <div class="d-flex gap-2 flex-wrap">
              <button class="btn btn-outline-secondary" :disabled="!selectedIds.length" @click="batchDelete"><?php echo e(__('admin/product.batch_delete')); ?></button>
              <button class="btn btn-outline-secondary" :disabled="!selectedIds.length"
              @click="batchActive(true)"><?php echo e(__('admin/product.batch_active')); ?></button>
              <button class="btn btn-outline-secondary" :disabled="!selectedIds.length"
              @click="batchActive(false)"><?php echo e(__('admin/product.batch_inactive')); ?></button>
            </div>
          <?php endif; ?>
        </div>

        <?php if($products->total()): ?>
          <div class="table-push overflow-auto">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th><input type="checkbox" v-model="allSelected" /></th>
                  <th class="d-none d-md-table-cell"><?php echo e(__('common.id')); ?></th>
                  <th><?php echo e(__('product.image')); ?></th>
                  <th><?php echo e(__('product.name')); ?></th>
                  <th><?php echo e(__('product.price')); ?></th>
                  <th class="d-none d-md-table-cell">
                    <div class="d-flex align-items-center">
                        <?php echo e(__('common.created_at')); ?>

                      <div class="d-flex flex-column ml-1 order-by-wrap">
                        <i class="el-icon-caret-top" @click="checkedOrderBy('created_at:asc')"></i>
                        <i class="el-icon-caret-bottom" @click="checkedOrderBy('created_at:desc')"></i>
                      </div>
                    </div>
                  </th>

                  <th class="d-none d-md-table-cell">
                    <div class="d-flex align-items-center">
                        TT ưu tiên
                      <div class="d-flex flex-column ml-1 order-by-wrap">
                        <i class="el-icon-caret-top" @click="checkedOrderBy('position:asc')"></i>
                        <i class="el-icon-caret-bottom" @click="checkedOrderBy('position:desc')"></i>
                      </div>
                    </div>
                  </th>
                  <th>Tồn kho</th>
                  <th>Trạng thái tồn kho</th>
                  <?php if($type != 'trashed'): ?>
                    <th><?php echo e(__('common.status')); ?></th>
                  <?php endif; ?>
                   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.list.column",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                  <th class="text-center"><?php echo e(__('common.action')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $products_format; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><input type="checkbox" :value="<?php echo e($product['id']); ?>" v-model="selectedIds" /></td>
                  <td class="d-none d-md-table-cell"><?php echo e($product['id']); ?></td>
                  <td>
                    <div class="wh-60 border d-flex rounded-2 justify-content-center align-items-center"><img src="<?php echo e($product['images'][0] ?? 'image/placeholder.png'); ?>" class="img-fluid max-h-100"></div>
                  </td>
                  <td>
                    <a href="<?php echo e($product['url']); ?>" target="_blank" title="<?php echo e($product['name']); ?>" class="text-dark"><?php echo e($product['name']); ?></a>
                  </td>
                  <td><?php echo e($product['price_formatted']); ?></td>
                  <td class="d-none d-md-table-cell"><?php echo e($product['created_at']); ?></td>
                  <td class="d-none d-md-table-cell text-center"><?php echo e($product['position']); ?></td>
                  <td class="text-center"><?php echo e($product['quantity']); ?></td>
                  <td>
                    <div class="
    <?php if($product['status_quantity'] == 'Normal'): ?> bg-success
    <?php elseif($product['status_quantity'] == 'Few'): ?> bg-warning
    <?php elseif($product['status_quantity'] == 'Out'): ?> bg-danger
    <?php endif; ?>
    shadow-lg
" style="padding: 0; border-radius: 1rem;">
                      <div class=" text-white text-center px-1 py-2" >
                        <div class="text-xl font-bold

        ">
                          <?php if($product['status_quantity'] == 'Normal'): ?>
                            Còn hàng
                          <?php elseif($product['status_quantity'] == 'Few'): ?>
                            Có mã sắp hết
                          <?php elseif($product['status_quantity'] == 'Out'): ?>
                            Có mã đã hết
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </td>


                  <?php if($type != 'trashed'): ?>
                    <td>
                      <div class="form-check form-switch">
                        <input class="form-check-input cursor-pointer" type="checkbox" role="switch" data-active="<?php echo e($product['active'] ? true : false); ?>" data-id="<?php echo e($product['id']); ?>" @change="turnOnOff($event)" <?php echo e($product['active'] ? 'checked' : ''); ?>>
                      </div>
                    </td>
                  <?php endif; ?>
                   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.list.column_value",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                  <td class="text-end text-nowrap">
                    <?php if($product['deleted_at'] == ''): ?>
                      <a href="<?php echo e(admin_route('products.reviews',['product_id' => $product['id']])); ?>" class="btn btn-outline-secondary btn-sm"><?php echo e(__('common.review')); ?></a>
                      <a href="<?php echo e(admin_route('products.edit', [$product['id']])); ?>" class="btn btn-outline-secondary btn-sm"><?php echo e(__('common.edit')); ?></a>
                      <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" @click.prevent="deleteProduct(<?php echo e($loop->index); ?>)"><?php echo e(__('common.delete')); ?></a>
                       <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.list.action",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                    <?php else: ?>
                      <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm" @click.prevent="restoreProduct(<?php echo e($loop->index); ?>)"><?php echo e(__('common.restore')); ?></a>
                       <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.products.trashed.action",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>

          <?php echo e($products->withQueryString()->links('admin::vendor/pagination/bootstrap-4')); ?>

        <?php else: ?>
          <?php if (isset($component)) { $__componentOriginal5e41293ba75edb5b6791bae671134304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e41293ba75edb5b6791bae671134304 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\NoData::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\NoData::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e41293ba75edb5b6791bae671134304)): ?>
<?php $attributes = $__attributesOriginal5e41293ba75edb5b6791bae671134304; ?>
<?php unset($__attributesOriginal5e41293ba75edb5b6791bae671134304); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e41293ba75edb5b6791bae671134304)): ?>
<?php $component = $__componentOriginal5e41293ba75edb5b6791bae671134304; ?>
<?php unset($__componentOriginal5e41293ba75edb5b6791bae671134304); ?>
<?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.list.content.footer",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
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

          return {
            descriptions: {
              zh_cn: {
                name: row[0] ? String(row[0]) : "",
                content: row[1] ? String(row[1]) : "",
                meta_title:  "",
                meta_keywords: "",
                meta_description:  ""
              }
            },
            images: row[2] ? String(row[2]).split(',') : [],
            video: "",
            position: 0,
            weight:  0,
            weight_class: 0,
            brand_name:  "",
            brand_id:  0,
            tax_class_id: 1,
            shipping:  "1",
            categories: row[3] ? String(row[3]).split(',') : [],
            active:"1",
            variables: [],
            skus: [ {
            images: [],
            is_default: "1",
            variants: [],
            // sku: row[6] ?  String(row[6]) : [],
            model: row[4] ?  String(row[4]) : "",
            cost_price: row[5] ?  String(row[5]) : 0,
            origin_price: row[6] ?  String(row[6]) : 0,
            quantity: row[7] ?  String(row[7]) : 0,
            }]
          };
        }).filter(item => item !== null);

        if (formattedData.length === 0) {
          alert("No valid data found in the Excel file.");
          return;
        }

        console.log('formattedData',formattedData)


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
            console.log(response)
            if(response.failed_products.length === 0){
              alert("Đã import sản phẩm thành công !!!")
            }else{
              const errorMap = new Map();

              response.failed_products.forEach(item => {
                const error = item.error;
                const row = Number(item.row) + 2;


                if (errorMap.has(error)) {
                  errorMap.get(error).count += 1;
                  errorMap.get(error).rows.push(row);
                } else {
                  errorMap.set(error, { count: 1, rows: [row] });
                }
              });

              // Create a message string for the alert
              let message = '';

              errorMap.forEach((value, error) => {
                const rows = value.rows.join(', ');
                message += `Có ${value.count} sản phẩm ở các hàng ${rows} bị lỗi do ${error}\n`;
              });

              // Show a single alert with the complete message
              alert(message);
            }

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
        shipping: data.shipping,
        active: data.active,
        tax_class_id: data.tax_class_id,
        weight: data.weight ?? 0,
        weight_class: data.weight_class ?? 0,
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

  $(document).ready(function() {
    $('#export-example-excel').click(function() {
      const data = [{
        name:"",
        description:"",
        images: "điền link img cách nhau bởi dấu phẩy",
        // position: 0,
        // tax_class_id: 1,
        categories: "Điền ID của category và cách nhau bởi dấu phẩy",
        // skus: 'Điền mã sku của sản phẩm',
        model: "Điền mã model của sản phẩm",
        cost_price: 'Giá trước thuế',
        origin_price: 'Gia gốc',
        quantity: 'Số lượng tồn kho'
      }];
      try {
         const wb = XLSX.utils.book_new();
         const ws = XLSX.utils.json_to_sheet(data);
         XLSX.utils.book_append_sheet(wb, ws, 'Products');

        // Export to Excel
        XLSX.writeFile(wb, 'products_data_example.xlsx');
          }catch (error) {
            console.error('Error:', error);
          }
    });
  })
  </script>


  <script>


    let app = new Vue({
      el: '#product-app',
      data: {
        url: '<?php echo e($type == 'trashed' ? admin_route("products.trashed") : admin_route("products.index")); ?>',
        filter: {
          name: bk.getQueryString('name'),
          page: bk.getQueryString('page'),
          category_id: bk.getQueryString('category_id'),
          sku: bk.getQueryString('sku'),
          model: bk.getQueryString('model'),
          active: bk.getQueryString('active'),
          sort: bk.getQueryString('sort', ''),
          order: bk.getQueryString('order', ''),
          sort_quantity: bk.getQueryString('sort_quantity',0)
        },
        selectedIds: [],
        productIds: <?php echo json_encode($products->pluck('id'), 15, 512) ?>,
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
          this.$confirm('<?php echo e(__('admin/product.confirm_batch_product')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
            cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
            type: 'warning'
          }).then(() => {
            $http.delete('products/delete', {ids: this.selectedIds}).then((res) => {
              layer.msg(res.message)
              location.reload();
            })
          }).catch(()=>{});
        },

        batchActive(type) {
          this.$confirm('<?php echo e(__('admin/product.confirm_batch_status')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
            cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
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

          this.$confirm('<?php echo e(__('common.confirm_delete')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
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

          this.$confirm('<?php echo e(__('admin/product.confirm_batch_restore')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            type: 'warning'
          }).then(() => {
            $http.put('products/restore', {id: id}).then((res) => {
              location.reload();
            })
          }).catch(()=>{});;
        },

        clearRestore() {
          this.$confirm('<?php echo e(__('admin/product.confirm_delete_restore')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/products/index.blade.php ENDPATH**/ ?>