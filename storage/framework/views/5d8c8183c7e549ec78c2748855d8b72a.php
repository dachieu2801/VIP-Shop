<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginalb9676ba17e19df8af5d638172bcd52aa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9676ba17e19df8af5d638172bcd52aa = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\Image402::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-image402'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\Image402::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9676ba17e19df8af5d638172bcd52aa)): ?>
<?php $attributes = $__attributesOriginalb9676ba17e19df8af5d638172bcd52aa; ?>
<?php unset($__attributesOriginalb9676ba17e19df8af5d638172bcd52aa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9676ba17e19df8af5d638172bcd52aa)): ?>
<?php $component = $__componentOriginalb9676ba17e19df8af5d638172bcd52aa; ?>
<?php unset($__componentOriginalb9676ba17e19df8af5d638172bcd52aa); ?>
<?php endif; ?><?php /**PATH G:\workspace\new\storage\framework\views/c7ad2294063913a47af833fe55429374.blade.php ENDPATH**/ ?>