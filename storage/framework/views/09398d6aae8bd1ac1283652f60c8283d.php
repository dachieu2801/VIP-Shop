<?php $__env->startPush('header'); ?>
<script src="<?php echo e(asset('vendor/swiper/swiper-bundle.min.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('vendor/swiper/swiper-bundle.min.css')); ?>">
<?php $__env->stopPush(); ?>

<section class="module-item <?php echo e($design ? 'module-item-design' : ''); ?>" id="module-<?php echo e($module_id); ?>">
  <?php echo $__env->make('design._partial._module_tool', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="module-info module-pages mb-3 mb-md-4">
    <div class="container position-relative">
      <div class="module-title"><?php echo e($content['title']); ?></div>
      <?php if($content['items']): ?>
        <div class="row">
          <?php $__currentLoopData = $content['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
            <div class="pages-wrap">
              <div class="image"><a href="<?php echo e(shop_route('pages.show', [$item['id']])); ?>"><img src="<?php echo e($item['image']); ?>" class="img-fluid"></a>
              </div>
              <div class="page-info">
                <div class="pages-title"><a href="<?php echo e(shop_route('pages.show', [$item['id']])); ?>"><?php echo e($item['description']['title'] ?? ''); ?></a></div>
                <div class="pages-summary"><?php echo e($item['description']['summary'] ?? ''); ?></div>
                <div class="pages-view"><a href="<?php echo e(shop_route('pages.show', [$item['id']])); ?>"><?php echo e(__('shop/account.check_details')); ?><i class="bi bi-arrow-right-short"></i></a></div>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if(count($content['items']) > 4): ?>
        <div class="d-flex justify-content-center mt-4">
          <a class="btn btn-outline-secondary btn-lg" href="<?php echo e(shop_route('page_categories.home')); ?>"><?php echo e(__('common.show_all')); ?></a>
        </div>
        <?php endif; ?>
      <?php elseif(!$content['items'] and $design): ?>
        <div class="row">
          <?php for($s = 0; $s < 4; $s++): ?>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="pages-wrap">
              <div class="image"><a href="javascript:void(0)"><img src="<?php echo e(asset('catalog/placeholder.png')); ?>" class="img-fluid"></a></div>
              <div class="pages-name">请配置文章</div>
            </div>
          </div>
          <?php endfor; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php /**PATH D:\team-free-lance\shop-freelance\themes\default/design/page.blade.php ENDPATH**/ ?>