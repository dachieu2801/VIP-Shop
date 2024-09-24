<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginale79ab0597cca1c29f4e38db0d27c002d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale79ab0597cca1c29f4e38db0d27c002d = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\Product::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\Product::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale79ab0597cca1c29f4e38db0d27c002d)): ?>
<?php $attributes = $__attributesOriginale79ab0597cca1c29f4e38db0d27c002d; ?>
<?php unset($__attributesOriginale79ab0597cca1c29f4e38db0d27c002d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale79ab0597cca1c29f4e38db0d27c002d)): ?>
<?php $component = $__componentOriginale79ab0597cca1c29f4e38db0d27c002d; ?>
<?php unset($__componentOriginale79ab0597cca1c29f4e38db0d27c002d); ?>
<?php endif; ?><?php /**PATH G:\workspace\new\storage\framework\views/8ab101d1a213c8ce32b69f97e2511bc3.blade.php ENDPATH**/ ?>