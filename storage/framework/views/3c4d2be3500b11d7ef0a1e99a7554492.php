<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginalea288b7034c9db3f85787a15b7d85ff9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalea288b7034c9db3f85787a15b7d85ff9 = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\RichText::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-rich_text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\RichText::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalea288b7034c9db3f85787a15b7d85ff9)): ?>
<?php $attributes = $__attributesOriginalea288b7034c9db3f85787a15b7d85ff9; ?>
<?php unset($__attributesOriginalea288b7034c9db3f85787a15b7d85ff9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalea288b7034c9db3f85787a15b7d85ff9)): ?>
<?php $component = $__componentOriginalea288b7034c9db3f85787a15b7d85ff9; ?>
<?php unset($__componentOriginalea288b7034c9db3f85787a15b7d85ff9); ?>
<?php endif; ?><?php /**PATH G:\workspace\shop-freelance\storage\framework\views/adb5097747266fc1daf05d383779723f.blade.php ENDPATH**/ ?>