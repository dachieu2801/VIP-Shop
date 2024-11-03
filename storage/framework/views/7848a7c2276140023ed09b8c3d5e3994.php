<section class="module-item <?php echo e($design ? 'module-item-design' : ''); ?>" id="module-<?php echo e($module_id); ?>">
  <?php echo $__env->make('design._partial._module_tool', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php
    $editableTabsValue = $content['editableTabsValue'] ?? 0;
  ?>
  <div class="module-info module-tab-product">
    <div class="module-title"><?php echo e($content['title'] ?? ''); ?></div>
    <div class="container">
      <?php if($content['tabs'] ?? false): ?>
        <div class="nav d-flex flex-row flex-nowrap overflow-x-auto mb-4 justify-content-md-center">
          <?php $__currentLoopData = $content['tabs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tabs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a class="nav-link text-nowrap <?php echo e(($design ? $editableTabsValue == $key : $loop->first) ? 'active' : ''); ?>" href="#tab-product-<?php echo e($module_id); ?>-<?php echo e($loop->index); ?>" data-bs-toggle="tab"><?php echo e($tabs['title']); ?></a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="tab-content">
          <?php $__currentLoopData = $content['tabs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="tab-pane fade show <?php echo e(($design ? $editableTabsValue == $key : $loop->first) ? 'active' : ''); ?>" id="tab-product-<?php echo e($module_id); ?>-<?php echo e($loop->index); ?>">
            <div class="row">
              <?php if($products['products']): ?>
                <?php $__currentLoopData = $products['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-grid col-6 col-md-4 col-lg-3 mb-3">
                  <?php echo $__env->make('shared.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php elseif(!$products['products'] and $design): ?>
                <?php for($s = 0; $s < 8; $s++): ?>
                <div class="product-grid col-6 col-md-4 col-lg-3">
                  <div class="product-wrap">
                    <div class="image"><a href="javascript:void(0)"><img src="<?php echo e(asset('catalog/placeholder.png')); ?>" class="img-fluid" lazy='load'></a></div>
                    <div class="product-name">Vui lòng cấu hình sản phẩm</div>
                    <div class="product-price">
                      <span class="price-new">66.66</span>
                      <span class="price-lod">99.99</span>
                    </div>
                  </div>
                </div>
                <?php endfor; ?>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?>
    </div>
 <div class="text-center mt-3 mb-5">
   <?php if($url): ?>
   <a href="<?php echo e($url); ?>" style="font-size: 1rem;">
     Xem tất cả >
  </a>
   <?php endif; ?>
</div>
  </div>
</section>



<?php /**PATH G:\workspace\new\themes\default/design/tab_product.blade.php ENDPATH**/ ?>