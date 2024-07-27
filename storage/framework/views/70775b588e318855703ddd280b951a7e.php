<section class="module-item <?php echo e($design ? 'module-item-design' : ''); ?>" id="module-<?php echo e($module_id); ?>">
  <?php echo $__env->make('design._partial._module_tool', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





















  <div class="module-image-402 banner-magnify-hover module-info mb-3 mb-md-5">
    <div class="container">
      <?php if($content['title'][locale()] ?? false): ?>
      <div class="module-title"><?php echo e($content['title'][locale()]); ?></div>
      <?php endif; ?>
      <?php if($content['sub_title'][locale()] ?? false): ?>
      <div class="image-402-sub-title mt-n3"><?php echo e($content['sub_title'][locale()]); ?></div>
      <?php endif; ?>
      <div class="module-image-info d-grid grid-4">
        <div class="image-402-1">
          <a class="image-wrap" href="<?php echo e($content['images'][0]['link']['link'] ?? ''); ?>">
            <img src="<?php echo e($content['images'][0]['image']); ?>" class="img-fluid">
            <?php if($content['images'][0]['title'][locale()] ?? false): ?>
              <div class="img-name"><span><?php echo e($content['images'][0]['title'][locale()]); ?></span></div>
            <?php endif; ?>
          </a>
        </div>
        <div class="image-402-2">
          <a class="image-wrap" href="<?php echo e($content['images'][1]['link']['link'] ?? ''); ?>">
            <img src="<?php echo e($content['images'][1]['image']); ?>" class="img-fluid">
            <?php if($content['images'][1]['title'][locale()] ?? false): ?>
              <div class="img-name"><span><?php echo e($content['images'][1]['title'][locale()]); ?></span></div>
            <?php endif; ?>
          </a>
        </div>
        <div class="image-402-3">
          <a class="image-wrap" href="<?php echo e($content['images'][2]['link']['link'] ?? ''); ?>">
            <img src="<?php echo e($content['images'][2]['image']); ?>" class="img-fluid">
            <?php if($content['images'][2]['title'][locale()] ?? false): ?>
              <div class="img-name"><span><?php echo e($content['images'][2]['title'][locale()]); ?></span></div>
            <?php endif; ?>
          </a>
        </div>
        <div class="image-402-4">
          <a class="image-wrap" href="<?php echo e($content['images'][3]['link']['link'] ?? ''); ?>">
            <img src="<?php echo e($content['images'][3]['image']); ?>" class="img-fluid">
            <?php if($content['images'][3]['title'][locale()] ?? false): ?>
              <div class="img-name"><span><?php echo e($content['images'][3]['title'][locale()]); ?></span></div>
            <?php endif; ?>
          </a>
        </div>
      </div>
    </div>
  </div>

</section>
<?php /**PATH D:\team-free-lance\shop-freelance\themes\default/design/image402.blade.php ENDPATH**/ ?>