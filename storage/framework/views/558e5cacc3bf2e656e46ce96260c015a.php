<div class="d-flex flex-column align-center align-items-center mb-4">
  <img src="<?php echo e(asset('image/no-data.svg')); ?>" class="img-fluid wp-200">
  <div class="text-secondary fs-4 mb-3"><?php echo e($text); ?></div>
  <?php if($link): ?>
    <a href="<?php echo e($link); ?>" class="btn btn-primary"><i class="bi bi-box-arrow-left"></i> <?php echo e($btn); ?></a>
  <?php endif; ?>
</div><?php /**PATH G:\workspace\shop-freelance\themes\default/components/no-data.blade.php ENDPATH**/ ?>