<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/swiper/swiper-bundle.min.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/swiper/swiper-bundle.min.css')); ?>">
<?php $__env->stopPush(); ?>

<section class="module-item <?php echo e($design ? 'module-item-design' : ''); ?>" id="module-<?php echo e($module_id); ?>">
  <?php echo $__env->make('design._partial._module_tool', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="module-info mb-3 mb-md-5 <?php echo e(!$content['full'] ? 'container' : ''); ?>">
    <div class="swiper module-swiper-<?php echo e($module_id); ?> module-slideshow">
      <div class="swiper-wrapper">
        <?php $__currentLoopData = $content['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="swiper-slide wiper-slide1 w-100">
          <a href="<?php echo e($image['link']['link'] ?: 'javascript:void(0)'); ?>" class="d-flex justify-content-center"><img
              src="<?php echo e($image['image']); ?>" class="img-fluid w-100" style="height: auto; max-width: 1500px"></a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="swiper-pagination slideshow-pagination-<?php echo e($module_id); ?>"></div>
      <div class="swiper-button-prev slideshow-btnprev-<?php echo e($module_id); ?>"></div>
      <div class="swiper-button-next slideshow-btnnext-<?php echo e($module_id); ?>"></div>
    </div>
  </div>

  <script>
    function slideshowSwiper() {
      new Swiper ('.module-swiper-<?php echo e($module_id); ?>', {
        loop: '<?php echo e(count($content['images']) > 1 ? true : false); ?>', // 循环模式选项
        autoplay: false,
        pauseOnMouseEnter: true,
        clickable :true,

        // 如果需要分页器
        pagination: {
          el: '.slideshow-pagination-<?php echo e($module_id); ?>',
          clickable :true
        },

        // 如果需要前进后退按钮
        navigation: {
          nextEl: '.slideshow-btnnext-<?php echo e($module_id); ?>',
          prevEl: '.slideshow-btnprev-<?php echo e($module_id); ?>',
        },

      })
    }

  <?php if($design): ?>
    bk.loadStyle('<?php echo e(asset('vendor/swiper/swiper-bundle.min.css')); ?>');
    bk.loadScript('<?php echo e(asset('vendor/swiper/swiper-bundle.min.js')); ?>', () => {
      slideshowSwiper();
    })
  <?php else: ?>
    slideshowSwiper();
  <?php endif; ?>

  </script>
</section>
<?php /**PATH G:\workspace\new\themes\default/design/slideshow.blade.php ENDPATH**/ ?>