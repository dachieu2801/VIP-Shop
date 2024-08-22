
<?php $__env->startSection('content'); ?>
<div class="breadcrumb-wrap">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><?php echo app('translator')->get('shop/common.home'); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('LatestProducts::header.latest_products')); ?></li>
      </ol>
    </nav>
  </div>
</div>
<div class="container">
  <div class="row">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-6 col-md-3"><?php echo $__env->make('shared.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php echo e($products->links('shared/pagination/bootstrap-4')); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\plugins/LatestProducts/Views/shop/latest_products.blade.php ENDPATH**/ ?>