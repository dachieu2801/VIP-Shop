<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginala0dd33c25cf9bb4aad528a525017ffd9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala0dd33c25cf9bb4aad528a525017ffd9 = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\Image301::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-image301'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\Image301::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala0dd33c25cf9bb4aad528a525017ffd9)): ?>
<?php $attributes = $__attributesOriginala0dd33c25cf9bb4aad528a525017ffd9; ?>
<?php unset($__attributesOriginala0dd33c25cf9bb4aad528a525017ffd9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0dd33c25cf9bb4aad528a525017ffd9)): ?>
<?php $component = $__componentOriginala0dd33c25cf9bb4aad528a525017ffd9; ?>
<?php unset($__componentOriginala0dd33c25cf9bb4aad528a525017ffd9); ?>
<?php endif; ?><?php /**PATH G:\workspace\new\storage\framework\views/13dbbc64626ce9ea53a2913d19c54770.blade.php ENDPATH**/ ?>