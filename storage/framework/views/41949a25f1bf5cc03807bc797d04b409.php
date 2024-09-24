<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginalc9ea1213d6b17738e87c158048549fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc9ea1213d6b17738e87c158048549fef = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\Page::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\Page::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc9ea1213d6b17738e87c158048549fef)): ?>
<?php $attributes = $__attributesOriginalc9ea1213d6b17738e87c158048549fef; ?>
<?php unset($__attributesOriginalc9ea1213d6b17738e87c158048549fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc9ea1213d6b17738e87c158048549fef)): ?>
<?php $component = $__componentOriginalc9ea1213d6b17738e87c158048549fef; ?>
<?php unset($__componentOriginalc9ea1213d6b17738e87c158048549fef); ?>
<?php endif; ?><?php /**PATH G:\workspace\new\storage\framework\views/7f14f8b4acfa98e8f0227fcc35382cbe.blade.php ENDPATH**/ ?>