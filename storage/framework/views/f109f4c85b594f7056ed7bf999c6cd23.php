<div class="col-12 col-md-3">
  <div class="account-sides-wrap">
    <div class="account-sides-info">
      <div class="mb-header d-md-none">
        <h5 class="mb-title mb-0"><?php echo e(__('shop/account.index')); ?></h5>
        <span class="btn-close" aria-label="Close"></span>
      </div>
      <div class="head">
        <div class="portrait"><img src="<?php echo e(image_resize($customer->avatar, 200, 200)); ?>" class="img-fluid"></div>
        <div class="text-md-center">
          <div class="account-name"><?php echo e($customer->name); ?></div>
           <?php
                    $__hook_name="account.sidebar.email";
                    ob_start();
                ?>
          <div class="account-email"><?php echo e($customer->email); ?></div>
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
        </div>
      </div>

      <nav class="list-group account-links">
        <a class="list-group-item d-flex justify-content-between align-items-center <?php echo e(equal_route('shop.account.index') ? 'active' : ''); ?>"
          href="<?php echo e(shop_route('account.index')); ?>">
          <span><?php echo e(__('shop/account.index')); ?></span></a>
        <a class="list-group-item d-flex justify-content-between align-items-center <?php echo e(equal_route('shop.account.edit.index') ? 'active' : ''); ?>"
          href="<?php echo e(shop_route('account.edit.index')); ?>">
          <span><?php echo e(__('shop/account/edit.index')); ?></span></a>
        <a class="list-group-item d-flex justify-content-between align-items-center <?php echo e(equal_route('shop.account.password.index') ? 'active' : ''); ?>"
           href="<?php echo e(shop_route('account.password.index')); ?>">
          <span><?php echo e(__('shop/account/password.index')); ?></span></a>
        <a class="list-group-item d-flex justify-content-between align-items-center <?php echo e(equal_route('shop.account.order.index') || equal_route('shop.account.order.show') ? 'active' : ''); ?>"
          href="<?php echo e(shop_route('account.order.index')); ?>">
          <span><?php echo e(__('shop/account/order.index')); ?></span></a>
        <a class="list-group-item d-flex justify-content-between align-items-center <?php echo e(equal_route('shop.account.addresses.index') ? 'active' : ''); ?>"
          href="<?php echo e(shop_route('account.addresses.index')); ?>">
          <span><?php echo e(__('shop/account/addresses.index')); ?></span></a>
        <a class="list-group-item d-flex justify-content-between align-items-center <?php echo e(equal_route('shop.account.wishlist.index') ? 'active' : ''); ?>"
          href="<?php echo e(shop_route('account.wishlist.index')); ?>">
          <span><?php echo e(__('shop/account/wishlist.index')); ?></span></a>
        <a class="list-group-item d-flex justify-content-between align-items-center <?php echo e(equal_route('shop.account.rma.index') || equal_route('shop.account.rma.show') ? 'active' : ''); ?>"
          href="<?php echo e(shop_route('account.rma.index')); ?>">
          <span><?php echo e(__('shop/account/rma.index')); ?></span></a>

           <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("account.sidebar.before.logout",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

        <a class="list-group-item d-flex justify-content-between align-items-center" href="<?php echo e(shop_route('logout')); ?>">
          <span><?php echo e(__('common.sign_out')); ?></span></a>
      </nav>
    </div>
  </div>
</div>
<?php /**PATH G:\workspace\shop-freelance\themes\default/components/account/sidebar.blade.php ENDPATH**/ ?>