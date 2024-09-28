
<?php $__env->startSection('title', __('common.error_page')); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal73d47510345862f42a7c4fe129814e32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73d47510345862f42a7c4fe129814e32 = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\NoData::resolve(['text' => ''.e(__('common.error_page')).'','link' => ''.e(request()->headers->get('referer') ? 'javascript:history.go(-1)' : '/').'','btn' => ''.e(__('common.error_page_btn')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('shop-no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Shop\View\Components\NoData::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73d47510345862f42a7c4fe129814e32)): ?>
<?php $attributes = $__attributesOriginal73d47510345862f42a7c4fe129814e32; ?>
<?php unset($__attributesOriginal73d47510345862f42a7c4fe129814e32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73d47510345862f42a7c4fe129814e32)): ?>
<?php $component = $__componentOriginal73d47510345862f42a7c4fe129814e32; ?>
<?php unset($__componentOriginal73d47510345862f42a7c4fe129814e32); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\beike\new\themes/default/errors/404.blade.php ENDPATH**/ ?>