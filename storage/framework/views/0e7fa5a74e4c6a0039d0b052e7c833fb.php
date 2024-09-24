<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginal1111a7d06f38552ff2d57b7f31066a5c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1111a7d06f38552ff2d57b7f31066a5c = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\Image200::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-image200'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\Image200::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1111a7d06f38552ff2d57b7f31066a5c)): ?>
<?php $attributes = $__attributesOriginal1111a7d06f38552ff2d57b7f31066a5c; ?>
<?php unset($__attributesOriginal1111a7d06f38552ff2d57b7f31066a5c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1111a7d06f38552ff2d57b7f31066a5c)): ?>
<?php $component = $__componentOriginal1111a7d06f38552ff2d57b7f31066a5c; ?>
<?php unset($__componentOriginal1111a7d06f38552ff2d57b7f31066a5c); ?>
<?php endif; ?><?php /**PATH G:\workspace\new\storage\framework\views/86ea86f4e7120e49dd47c3cb61e4613f.blade.php ENDPATH**/ ?>