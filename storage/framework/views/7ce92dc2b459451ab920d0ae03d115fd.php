<?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => $title,'required' => $required]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($required)]); ?>
  <input type="<?php echo e($type); ?>" name="<?php echo e($name); ?>"
    class="form-control wp-<?php echo e($width); ?> <?php echo e($error ? 'is-invalid' : ''); ?>" value="<?php echo e($value); ?>"
    placeholder="<?php echo e($placeholder ?: $title); ?>" <?php if($required): ?> required <?php endif; ?> <?php if($step): ?> step="<?php echo e($step); ?>" <?php endif; ?>>
    <?php if($description): ?>
    <div class="help-text font-size-12 lh-base"><?php echo $description; ?></div>
    <?php endif; ?>

  <span class="invalid-feedback" role="alert">
    <?php if($error): ?>
      <?php echo e($error); ?>

    <?php else: ?>
    <?php echo e(__('common.error_required', ['name' => $title])); ?>

    <?php endif; ?>
  </span>
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
<?php /**PATH G:\workspace\new\resources\/beike/admin/views/components/form/input.blade.php ENDPATH**/ ?>