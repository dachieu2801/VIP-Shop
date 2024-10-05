<?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => $title]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title)]); ?>
  <div class="mb-1 mt-2">
    <div class="form-check form-check-inline">
      <input class="form-check-input" id="<?php echo e($name); ?>-1" type="radio" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>-1" value="1" <?php echo e($value ? 'checked' : ''); ?>>
      <label class="form-check-label" for="<?php echo e($name); ?>-1"><?php echo e(__('common.enable')); ?></label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" id="<?php echo e($name); ?>-0" type="radio" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>-0" value="0" <?php echo e(!$value ? 'checked' : ''); ?>>
      <label class="form-check-label" for="<?php echo e($name); ?>-0"><?php echo e(__('common.disable')); ?></label>
    </div>
  </div>
  <?php echo e($slot); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php /**PATH G:\workspace\new\resources\/beike/admin/views/components/form/switch-radio.blade.php ENDPATH**/ ?>