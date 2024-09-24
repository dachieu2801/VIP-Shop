<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginal2157843a2106fadc6f74528753ebdceb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2157843a2106fadc6f74528753ebdceb = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\Icons::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-icons'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\Icons::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2157843a2106fadc6f74528753ebdceb)): ?>
<?php $attributes = $__attributesOriginal2157843a2106fadc6f74528753ebdceb; ?>
<?php unset($__attributesOriginal2157843a2106fadc6f74528753ebdceb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2157843a2106fadc6f74528753ebdceb)): ?>
<?php $component = $__componentOriginal2157843a2106fadc6f74528753ebdceb; ?>
<?php unset($__componentOriginal2157843a2106fadc6f74528753ebdceb); ?>
<?php endif; ?><?php /**PATH G:\workspace\new\storage\framework\views/f2053f176d6f21ee8c6f34d57682d52c.blade.php ENDPATH**/ ?>