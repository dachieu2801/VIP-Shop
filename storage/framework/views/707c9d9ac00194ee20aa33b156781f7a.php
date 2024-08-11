<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginalcd52b1325c33344b8fc9d99967810571 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd52b1325c33344b8fc9d99967810571 = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\Image300::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-image300'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\Image300::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd52b1325c33344b8fc9d99967810571)): ?>
<?php $attributes = $__attributesOriginalcd52b1325c33344b8fc9d99967810571; ?>
<?php unset($__attributesOriginalcd52b1325c33344b8fc9d99967810571); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd52b1325c33344b8fc9d99967810571)): ?>
<?php $component = $__componentOriginalcd52b1325c33344b8fc9d99967810571; ?>
<?php unset($__componentOriginalcd52b1325c33344b8fc9d99967810571); ?>
<?php endif; ?><?php /**PATH G:\workspace\shop-freelance\storage\framework\views/4d9c04842d7cec5c4b1e0a7dcccd3841.blade.php ENDPATH**/ ?>