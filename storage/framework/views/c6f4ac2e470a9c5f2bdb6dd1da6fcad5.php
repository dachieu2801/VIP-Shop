<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginala6ea03440e8cc21ab89e891f49b9573b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6ea03440e8cc21ab89e891f49b9573b = $attributes; } ?>
<?php $component = \Beike\Admin\View\DesignBuilders\Image401::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('editor-image401'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(\Beike\Admin\View\DesignBuilders\Image401::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6ea03440e8cc21ab89e891f49b9573b)): ?>
<?php $attributes = $__attributesOriginala6ea03440e8cc21ab89e891f49b9573b; ?>
<?php unset($__attributesOriginala6ea03440e8cc21ab89e891f49b9573b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6ea03440e8cc21ab89e891f49b9573b)): ?>
<?php $component = $__componentOriginala6ea03440e8cc21ab89e891f49b9573b; ?>
<?php unset($__componentOriginala6ea03440e8cc21ab89e891f49b9573b); ?>
<?php endif; ?><?php /**PATH G:\workspace\shop-freelance\storage\framework\views/60cd332c7e8f0340825e34beb9f85989.blade.php ENDPATH**/ ?>