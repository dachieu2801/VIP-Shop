<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginalf5ac26145052083c132d08eb64ce33f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ac26145052083c132d08eb64ce33f8 = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\Image100::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-image100'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\Image100::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ac26145052083c132d08eb64ce33f8)): ?>
<?php $attributes = $__attributesOriginalf5ac26145052083c132d08eb64ce33f8; ?>
<?php unset($__attributesOriginalf5ac26145052083c132d08eb64ce33f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ac26145052083c132d08eb64ce33f8)): ?>
<?php $component = $__componentOriginalf5ac26145052083c132d08eb64ce33f8; ?>
<?php unset($__componentOriginalf5ac26145052083c132d08eb64ce33f8); ?>
<?php endif; ?><?php /**PATH G:\workspace\new\storage\framework\views/a9b03046f3132d48c1875aad3b160241.blade.php ENDPATH**/ ?>