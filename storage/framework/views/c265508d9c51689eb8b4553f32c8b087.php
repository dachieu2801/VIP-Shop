<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginal04d8486c500b9b425c48098b8319627f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal04d8486c500b9b425c48098b8319627f = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\TabProduct::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-tab_product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\TabProduct::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal04d8486c500b9b425c48098b8319627f)): ?>
<?php $attributes = $__attributesOriginal04d8486c500b9b425c48098b8319627f; ?>
<?php unset($__attributesOriginal04d8486c500b9b425c48098b8319627f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal04d8486c500b9b425c48098b8319627f)): ?>
<?php $component = $__componentOriginal04d8486c500b9b425c48098b8319627f; ?>
<?php unset($__componentOriginal04d8486c500b9b425c48098b8319627f); ?>
<?php endif; ?><?php /**PATH G:\workspace\new\storage\framework\views/5ce4d2c91505a390f5a92614fa68a615.blade.php ENDPATH**/ ?>