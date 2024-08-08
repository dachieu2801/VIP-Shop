<div class="h-100 product-wrap <?php echo e(request('style_list') ?? ''); ?>">
  <?php if($product['origin_price'] > $product['price'] && $product['discount'] > 0): ?>
    <div class="discount">
      -<?php echo e($product['discount']); ?>%
    </div>
   <?php endif; ?>

  <div class="image">
     <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("product_list.item.image.tag",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

    <a href="<?php echo e($product['url']); ?>">
      <div class="image-old">
        <img
          data-sizes="auto"
          data-src="<?php echo e($product['images'][0] ?? image_resize('', 400, 400)); ?>"
          src="<?php echo e(image_resize('', 400, 400)); ?>"
          class="img-fluid lazyload">
      </div>
    </a>
    <?php if(!request('style_list') || request('style_list') == 'grid'): ?>
      <div class="button-wrap">
         <?php
                    $__hook_name="shared.product.btn.add_cart";
                    ob_start();
                ?>
        <button
          class="btn btn-dark text-light btn-add-cart"
          product-id="<?php echo e($product['sku_id']); ?>"
          product-price="<?php echo e($product['price']); ?>"
          onclick="bk.addCart({sku_id: '<?php echo e($product['sku_id']); ?>'}, this)">
          <i class="bi bi-cart"></i>
          <?php echo e(__('shop/products.add_to_cart')); ?>

        </button>
         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>
        <button
          class="btn btn-dark text-light btn-quick-view"
          product-id="<?php echo e($product['sku_id']); ?>"
          product-price="<?php echo e($product['price']); ?>"
          data-bs-toggle="tooltip"
          data-bs-placement="top"
          title="<?php echo e(__('common.quick_view')); ?>"
          onclick="bk.productQuickView(<?php echo e($product['id']); ?>)">
          <i class="bi bi-eye"></i>
        </button>
        <button
          class="btn btn-dark text-light btn-wishlist"
          product-id="<?php echo e($product['sku_id']); ?>"
          product-price="<?php echo e($product['price']); ?>"
          data-bs-toggle="tooltip"
          data-bs-placement="top"
          title="<?php echo e(__('shop/products.add_to_favorites')); ?>"
          data-in-wishlist="<?php echo e($product['in_wishlist']); ?>"
          onclick="bk.addWishlist('<?php echo e($product['id']); ?>', this)">
          <i class="bi bi-heart<?php echo e($product['in_wishlist'] ? '-fill' : ''); ?>"></i>
        </button>
      </div>
    <?php endif; ?>
  </div>
  <div class="product-bottom-info">
     <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("product_list.item.name.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
    <div class="product-name text-wrap" ><?php echo e($product['name_format']); ?></div>
    <?php if((system_setting('base.show_price_after_login') and current_customer()) or !system_setting('base.show_price_after_login')): ?>
     <div style="height: 12px"></div>
      <div class="product-price flex-column flex-md-row">
        <div class="price-new"><?php echo e($product['price_format']); ?></div>





          <div class="quantity-sold">
            <?php if($product['quantity_sold'] > 0): ?>
              Đã bán <?php echo e($product['quantity_sold_format']); ?>

            <?php endif; ?>
          </div>

      </div>
    <?php else: ?>
      <div class="product-price">
        <div class="text-dark fs-6"><?php echo e(__('common.before')); ?> <a class="price-new fs-6 login-before-show-price" href="javascript:void(0);"><?php echo e(__('common.login')); ?></a> <?php echo e(__('common.show_price')); ?></div>
      </div>
    <?php endif; ?>

    <?php if(request('style_list') == 'list'): ?>
      <div class="button-wrap mt-3">
        <button
          class="btn btn-dark text-light"
          onclick="bk.addCart({sku_id: '<?php echo e($product['sku_id']); ?>'}, this)">
          <i class="bi bi-cart"></i>
          <?php echo e(__('shop/products.add_to_cart')); ?>

        </button>
      </div>

      <div class="mt-2">
        <button
        class="btn btn-link p-0 btn-quick-view text-secondary"
        product-id="<?php echo e($product['sku_id']); ?>"
        product-price="<?php echo e($product['price']); ?>"
        onclick="bk.productQuickView(<?php echo e($product['id']); ?>)">
        <i class="bi bi-eye"></i>
        <?php echo e(__('common.quick_view')); ?>

      </button>
        <br>
        <button class="btn btn-link p-0 mt-1 text-secondary btn-wishlist" data-in-wishlist="<?php echo e($product['in_wishlist']); ?>" onclick="bk.addWishlist('<?php echo e($product['id']); ?>', this)">
          <i class="bi bi-heart<?php echo e($product['in_wishlist'] ? '-fill' : ''); ?> me-1"></i> <?php echo e(__('shop/products.add_to_favorites')); ?>

        </button>
      </div>
    <?php endif; ?>
  </div>

   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("product_list.item.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
</div>
<?php /**PATH G:\workspace\shop-freelance\themes\default/shared/product.blade.php ENDPATH**/ ?>