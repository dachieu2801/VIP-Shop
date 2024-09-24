<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginale47e916a44174ce1cc93626b46e61216 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale47e916a44174ce1cc93626b46e61216 = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\SlideShow::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-slide_show'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\SlideShow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale47e916a44174ce1cc93626b46e61216)): ?>
<?php $attributes = $__attributesOriginale47e916a44174ce1cc93626b46e61216; ?>
<?php unset($__attributesOriginale47e916a44174ce1cc93626b46e61216); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale47e916a44174ce1cc93626b46e61216)): ?>
<?php $component = $__componentOriginale47e916a44174ce1cc93626b46e61216; ?>
<?php unset($__componentOriginale47e916a44174ce1cc93626b46e61216); ?>
<?php endif; ?><?php /**PATH G:\workspace\new\storage\framework\views/653ebaa08b8a38f040562446af6ba7c1.blade.php ENDPATH**/ ?>