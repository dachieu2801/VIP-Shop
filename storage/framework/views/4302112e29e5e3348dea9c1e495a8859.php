<div class="steps-wrap">
  <div class="<?php echo e($steps == 1 || $steps == 2 || $steps == 3 ? 'active':''); ?>">
    <div class="number-wrap"><span class="number">1</span></div>
    <span class="title"><?php echo e(__('shop/steps.cart')); ?></span>
  </div>
  <div class="<?php echo e($steps == 2 || $steps == 3  ? 'active':''); ?>">
    <div class="number-wrap"><span class="number">2</span></div>
    <span class="title"><?php echo e(__('shop/steps.checkout')); ?></span>
  </div>
  <div class="<?php echo e($steps == 3 ? 'active':''); ?>">
    <div class="number-wrap"><span class="number">3</span></div>
    <span class="title"><?php echo e(__('shop/steps.payment')); ?></span>
  </div>
</div><?php /**PATH G:\workspace\new\themes\default/shared/steps.blade.php ENDPATH**/ ?>