<?php
    use Carbon\Carbon;
?>




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
              <label class="filter-title"><?php echo e(__('common.status')); ?></label>
              <select v-model="filter.status" class="form-select">
                <option value=""><?php echo e(__('common.all')); ?></option>
                <option value="active"><?php echo e(__('product.active')); ?></option>
                <option value="inactive"><?php echo e(__('product.inactive')); ?></option>

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
          <a href="<?php echo e(admin_route('vouchers.create')); ?>" >
            <button class="btn btn-primary"><?php echo e(__('admin/product.products_create')); ?></button>
          </a>

        </div>

      <?php if($vouchers->total()): ?>
          <div class="table-push overflow-auto">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th><input type="checkbox" v-model="allSelected" /></th>
                  <th><?php echo e(__('common.id')); ?></th>
                  <th><?php echo e(__('product.name')); ?></th>
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
                        <?php echo e(__('common.created_at')); ?>

                      <div class="d-flex flex-column ml-1 order-by-wrap">
                        <i class="el-icon-caret-top" @click="checkedOrderBy('asc')"></i>
                        <i class="el-icon-caret-bottom" @click="checkedOrderBy('desc')"></i>
                      </div>
                    </div>
                  </th>


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
                  <th class="text-end"><?php echo e(__('common.action')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $vouchers_format['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><input type="checkbox" :value="<?php echo e($voucher['id']); ?>" v-model="selectedIds" /></td>
                  <td><?php echo e($voucher['id']); ?></td>
                  <td><?php echo e($voucher['name']); ?></td>
                  </td>
                  <td>
                    <a href="" target="_blank" title="<?php echo e($voucher['name']); ?>" class="text-dark"><?php echo e($voucher['code']); ?></a>
                  </td>

                  <td><?php echo e($voucher['description']); ?></td>
                  <td><?php echo e($voucher['discount_value']); ?></td>
                  <td><?php echo e($voucher['discount_type']); ?></td>
                  <td><?php echo e(Carbon::parse($voucher['start_date'])->format('d-m-Y H:i:s')); ?></td>
                  <td><?php echo e(Carbon::parse($voucher['end_date'])->format('d-m-Y H:i:s')); ?></td>
                  <td><?php echo e($voucher['usage_limit']); ?></td>
                  <td><?php echo e($voucher['used_count']); ?></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input cursor-pointer" type="checkbox" role="switch" data-active="<?php echo e($voucher['status'] === 'active' ? true : false); ?>" data-id="<?php echo e($voucher['id']); ?>" @change="turnOnOff($event)" <?php echo e($voucher['status'] === 'active' ? 'checked' : ''); ?>>
                    </div>
                  </td>

                  <td><?php echo e(Carbon::parse($voucher['created_at'])->format('d-m-Y H:i:s')); ?></td>
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


                      <a href="<?php echo e(admin_route('vouchers.show', [$voucher['id']])); ?>" class="btn btn-outline-secondary btn-sm"><?php echo e(__('common.edit')); ?></a>
                      <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" @click.prevent="deleteVoucher(<?php echo e($loop->index); ?>)"><?php echo e(__('common.delete')); ?></a>
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

                  </td>




                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>

          <?php echo e($vouchers->withQueryString()->links('admin::vendor/pagination/bootstrap-4')); ?>

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


  <script>


    let app = new Vue({
      el: '#product-app',
      data: {
        url: '<?php echo e(admin_route("vouchers.index")); ?>',
        filter: {
          name: bk.getQueryString('name'),

          status: bk.getQueryString('status'),
          sort_by:'',

        },
        selectedIds: [],
        voucherIds: <?php echo json_encode($vouchers->pluck('id'), 15, 512) ?>,
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
          this.filter.sort_by=orderBy;

          location = bk.objectToUrlParams(this.filter, this.url)
        },

        resetSearch() {
          this.filter = bk.clearObjectValue(this.filter)
          location = bk.objectToUrlParams(this.filter, this.url)
        },

        deleteVoucher(index) {
          const id = this.productIds[index];

          this.$confirm('<?php echo e(__('common.confirm_delete')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/vouchers/index.blade.php ENDPATH**/ ?>