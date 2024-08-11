<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginalc2cd289359e9a9004711f46f574cb99d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2cd289359e9a9004711f46f574cb99d = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\Brand::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-brand'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\Brand::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2cd289359e9a9004711f46f574cb99d)): ?>
<?php $attributes = $__attributesOriginalc2cd289359e9a9004711f46f574cb99d; ?>
<?php unset($__attributesOriginalc2cd289359e9a9004711f46f574cb99d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2cd289359e9a9004711f46f574cb99d)): ?>
<?php $component = $__componentOriginalc2cd289359e9a9004711f46f574cb99d; ?>
<?php unset($__componentOriginalc2cd289359e9a9004711f46f574cb99d); ?>
<?php endif; ?><?php /**PATH G:\workspace\shop-freelance\storage\framework\views/eaafbfd540ac1737e9b97b4e85c716ef.blade.php ENDPATH**/ ?>