

<?php $__env->startSection('title', __('admin/rma.index')); ?>

<?php $__env->startSection('content'); ?>
  <div id="customer-app" class="card h-min-600">
    <div class="card-body">
      <div class="mb-2"><?php echo e(__('admin/rma.rma_list_title')); ?></div>
      <?php if(count($rmas)): ?>
        <div class="table-push overflow-auto">
          <table class="table">
            <thead>
              <tr>
                <th><?php echo e(__('admin/rma.customers_name')); ?></th>
                <th><?php echo e(__('common.email')); ?></th>
                <th><?php echo e(__('common.phone')); ?></th>
                <th><?php echo e(__('admin/builder.modules_product')); ?></th>
                <th><?php echo e(__('product.sku')); ?></th>
                <th><?php echo e(__('admin/rma.quantity')); ?></th>
                <th><?php echo e(__('admin/rma.service_type')); ?></th>
                <th><?php echo e(__('common.status')); ?></th>
                <th><?php echo e(__('common.action')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if(count($rmas_format)): ?>
                <?php $__currentLoopData = $rmas_format; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($rma['name']); ?></td>
                    <td><?php echo e($rma['email']); ?></td>
                    <td><?php echo e($rma['telephone']); ?></td>
                    <td><?php echo e($rma['product_name']); ?></td>
                    <td><?php echo e($rma['sku']); ?></td>
                    <td><?php echo e($rma['quantity']); ?></td>
                    <td><?php echo e($rma['type_text']); ?></td>
                    <td><?php echo e($rma['status']); ?></td>
                    <td><a href="<?php echo e(admin_route('rmas.show', [$rma['id']])); ?>"
                        class="btn btn-outline-secondary btn-sm text-nowrap"><?php echo e(__('common.view')); ?></a>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
                <tr>
                  <td colspan="9" class="border-0">
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
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <?php echo e($rmas->links('admin::vendor/pagination/bootstrap-4')); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/rmas/index.blade.php ENDPATH**/ ?>