<?php if(has_translator()): ?>
  <div class="mt-1 auto-translation-wrap">
    <div class="auto-translation-info d-flex align-items-center">
      <?php echo e(__('admin/common.auto_translation')); ?>：
      <select class="form-select form-select-sm w-auto from-locale-code">
        <?php $__currentLoopData = locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($locale['code']); ?>" <?php echo e($locale['code'] == locale() ? 'selected': ''); ?>><?php echo e($locale['name']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      <span class="mx-1"><i class="bi bi-arrow-right"></i></span>
      <select class="form-select form-select-sm w-auto to-locale-code">
        <option value="all"><?php echo e(__('admin/common.all_others')); ?></option>
        <?php $__currentLoopData = locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($locale['code']); ?>"><?php echo e($locale['name']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      <button type="button" class="btn btn-outline-secondary btn-sm ms-2 translate-btn"><?php echo e(__('admin/common.text_translate')); ?></button>
    </div>
  </div>
<?php endif; ?><?php /**PATH G:\workspace\new\resources\/beike/admin/views/shared/auto-translation.blade.php ENDPATH**/ ?>