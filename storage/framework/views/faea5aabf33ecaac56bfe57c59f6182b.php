<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/swiper/swiper-bundle.min.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/swiper/swiper-bundle.min.css')); ?>">
<?php $__env->stopPush(); ?>

<section class="module-item <?php echo e($design ? 'module-item-design' : ''); ?>" id="module-<?php echo e($module_id); ?>">
  <?php echo $__env->make('design._partial._module_tool', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="module-info module-product mb-3 mb-md-5 swiper-style-plus">
    <div class="container position-relative">
      <div class="module-title"><?php echo e($content['title']); ?></div>
        <?php if($content['products']): ?>
          <div class="row">
            <?php $__currentLoopData = $content['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-grid col-6 col-md-4 col-lg-3">
              <?php echo $__env->make('shared.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php elseif(!$content['products'] and $design): ?>
          <div class="row">
            <?php for($s = 0; $s < 4; $s++): ?>
            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-wrap">
                <div class="image"><a href="javascript:void(0)"><img src="<?php echo e(asset('catalog/placeholder.png')); ?>" class="img-fluid"></a></div>
                <div class="product-name">Vui lòng cấu hình sản phẩm</div>
                <div class="product-price">
                  <span class="price-new">66.66 </span>
                  <span class="price-lod">99.99</span>
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>

  </div>
</section>
<?php /**PATH G:\workspace\shop-freelance\themes\default/design/product.blade.php ENDPATH**/ ?>