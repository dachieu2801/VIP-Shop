<section class="module-item <?php echo e($design ? 'module-item-design' : ''); ?>" id="module-<?php echo e($module_id); ?>">
  <?php echo $__env->make('design._partial._module_tool', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="module-image-banner module-info <?php echo e(!$content['full'] ? 'container' : ''); ?> mb-3 mb-md-5 d-flex justify-content-center">
    <div class="container<?php echo e($content['full'] ? '-fluid' : ''); ?> d-flex justify-content-center">
      <a href="<?php echo e($content['images'][0]['link']['link'] ?: 'javascript:void(0)'); ?>"><img src="<?php echo e($content['images'][0]['image']); ?>" class="img-fluid"></a>
    </div>
  </div>
</section>
<?php /**PATH G:\workspace\shop-freelance\themes\default/design/image100.blade.php ENDPATH**/ ?>