

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
              <label class="filter-title"><?php echo e(__('common.star')); ?></label>
              <select v-model="filter.star" class="form-select">
                <option value=""><?php echo e(__('common.all_star')); ?></option>
                <option value="1"><?php echo e(__('common.star_1')); ?></option>
                <option value="2"><?php echo e(__('common.star_2')); ?></option>
                <option value="3"><?php echo e(__('common.star_3')); ?></option>
                <option value="4"><?php echo e(__('common.star_4')); ?></option>
                <option value="5"><?php echo e(__('common.star_5')); ?></option>
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
            </div>
          </div>
        </div>

        <div class=" justify-content-between my-4">
          <div style="text-align: right; margin-bottom: 16px">
            <button class="btn btn-outline-secondary" :disabled="!selectedIds.length" @click="batchDelete"><?php echo e(__('admin/product.batch_delete')); ?></button>
          </div>
          <?php if(count($reviews)>0): ?>
              <div class="table-push">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th><input type="checkbox" v-model="allSelected" /></th>
                      <th><?php echo e(__('common.id')); ?></th>
                      <th><?php echo e(__('common.user')); ?></th>
                      <th><?php echo e(__('common.star')); ?></th>
                      <th><?php echo e(__('common.content')); ?></th>
                      <th ><?php echo e(__('common.created_at')); ?></th>
                      <th class="text-end"><?php echo e(__('common.action')); ?></th>
                    </tr>
                  </thead>

                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><input type="checkbox" :value="<?php echo e($review['id']); ?>" v-model="selectedIds" /></td>
                        <td><?php echo e($review->id); ?></td>
                        <td><?php echo e($review->customer_name); ?></td>
                        <td><?php echo e($review->star_rating); ?></td>
                        <td><?php echo e($review->content); ?></td>
                        <td><?php echo e($review->created_at); ?></td>
                        <td class="text-end">
                          <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" @click.prevent="deleteReview(<?php echo e($loop->index); ?>)"><?php echo e(__('common.delete')); ?></a>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </table>
              </div>
          <?php echo e($reviews->withQueryString()->links('shared/pagination/bootstrap-4')); ?>

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
        url: '<?php echo e(admin_route("products.reviews")); ?>',
        filter: {
          star:  bk.getQueryString('star'),
          product_id: <?php echo e($product_id); ?> ?? '',
        },
        selectedIds: [],
        reviewIds: <?php echo json_encode($reviews->pluck('id'), 15, 512) ?>,
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
          this.$confirm('<?php echo e(__('common.confirm_delete')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
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
          this.$confirm('<?php echo e(__('admin/product.confirm_batch_product')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
            cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/products/reviews.blade.php ENDPATH**/ ?>