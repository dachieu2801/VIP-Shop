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
<div class="input-locale-wrap">
  <?php $__currentLoopData = locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="d-flex wp-<?php echo e($width); ?> input-for-group">
      <span class="input-group-text wp-100 px-1" id="basic-addon1"><?php echo e($locale['name']); ?></span>
      <input type="text" name="<?php echo e($formatName($locale['code'])); ?>" value="<?php echo e($formatValue($locale['code'])); ?>"
        class="form-control short input-<?php echo e($locale['code']); ?> <?php echo e($errors->first("descriptions.{$locale['code']}.name") ? 'is-invalid' : ''); ?>" placeholder="<?php echo e($placeholder ?: $locale['name']); ?>" <?php if($required): ?> required <?php endif; ?>>
      <?php if(!$errors->first("descriptions.{$locale['code']}.name")): ?>
        <span class="invalid-feedback w-auto" style="white-space:nowrap;"><?php echo e(__('common.error_required', ['name' => $title])); ?></span>
      <?php endif; ?>
    </div>
    <?php if($errors->first("descriptions.{$locale['code']}.name")): ?>
      <span class="invalid-feedback d-block"><?php echo e($errors->first("descriptions.{$locale['code']}.name")); ?></span>
    <?php endif; ?>
    <?php if($attributes->has('required')): ?>
      <?php $__errorArgs = [$errorKey($locale['code'])];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <?php if (isset($component)) { $__componentOriginal747bb290534d6a7a945c0c3f6c697441 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal747bb290534d6a7a945c0c3f6c697441 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.error','data' => ['message' => $message]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($message)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal747bb290534d6a7a945c0c3f6c697441)): ?>
<?php $attributes = $__attributesOriginal747bb290534d6a7a945c0c3f6c697441; ?>
<?php unset($__attributesOriginal747bb290534d6a7a945c0c3f6c697441); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal747bb290534d6a7a945c0c3f6c697441)): ?>
<?php $component = $__componentOriginal747bb290534d6a7a945c0c3f6c697441; ?>
<?php unset($__componentOriginal747bb290534d6a7a945c0c3f6c697441); ?>
<?php endif; ?>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php echo $__env->make('admin::shared.auto-translation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
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
<?php /**PATH G:\workspace\new\resources\/beike/admin/views/components/form/input-locale.blade.php ENDPATH**/ ?>