<section class="module-item <?php echo e($design ? 'module-item-design' : ''); ?>" id="module-<?php echo e($module_id); ?>">
  <?php echo $__env->make('design._partial._module_tool', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="module-info module-brand mb-3 mb-md-5">
    <div class="module-title"><?php echo e($content['title']); ?></div>
    <div class="container">
      <div class="row">
        <?php $__currentLoopData = $content['brands']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-6 col-md-4 col-lg-3">
          <a href="<?php echo e($brand['url']); ?>" class="text-decoration-none">
            <div class="brand-item">
              <img src="<?php echo e($brand['logo'] ?? asset('image/default/banner-1.png')); ?>" class="img-fluid">
            </div>
            <p class="text-center text-dark mb-4"><?php echo e($brand['name']); ?></p>
          </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
    <?php if($content['brands']): ?>
    <div class="d-flex justify-content-center mt-4">
      <a class="btn btn-outline-secondary btn-lg" href="<?php echo e(shop_route('brands.index')); ?>"><?php echo e(__('common.show_all')); ?></a>
    </div>
    <?php endif; ?>
  </div>
</section><?php /**PATH G:\workspace\shop-freelance\themes\default/design/brand.blade.php ENDPATH**/ ?>