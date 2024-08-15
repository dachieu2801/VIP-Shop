<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginala45588c38bfe18e366edff5a3c60feff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala45588c38bfe18e366edff5a3c60feff = $attributes; } ?>
<?php $component = \Plugin\Bestseller\Admin\View\DesignBuilders\Bestseller::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-bestseller'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Plugin\Bestseller\Admin\View\DesignBuilders\Bestseller::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala45588c38bfe18e366edff5a3c60feff)): ?>
<?php $attributes = $__attributesOriginala45588c38bfe18e366edff5a3c60feff; ?>
<?php unset($__attributesOriginala45588c38bfe18e366edff5a3c60feff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala45588c38bfe18e366edff5a3c60feff)): ?>
<?php $component = $__componentOriginala45588c38bfe18e366edff5a3c60feff; ?>
<?php unset($__componentOriginala45588c38bfe18e366edff5a3c60feff); ?>
<?php endif; ?><?php /**PATH G:\workspace\shop-freelance\storage\framework\views/bf06601b02bf48c46c8b93b7524354ee.blade.php ENDPATH**/ ?>