<style>
  header .top-wrap .container-fluid .left .dropdown .dropdown-menu .dropdown-item:hover {
    color: green;
  }

  header .top-wrap .container-fluid .left .dropdown .dropdown-menu .dropdown-item:focus {
    background-color: transparent;
  }

  header .header-content .right-btn .nav-link {
    color: white;
  }
  header .header-content .right-btn .nav-link i:hover {
    color: black;
  }

</style>

<header>
   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("header.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
  <div class="top-wrap">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="left d-flex align-items-center" style="font-family: var(--bs-body-font-family)">
         <?php
                    $__hook_name="header.top.currency";
                    ob_start();
                ?>
        <?php if(currencies()->count() > 1): ?>
          <div class="dropdown" style="background-color: transparent">























            <div class="dropdown-menu" aria-labelledby="currency-dropdown">
              <?php $__currentLoopData = currencies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="dropdown-item"
                  href="<?php echo e(shop_route('currency.switch', [$currency->code])); ?>">
                  <?php if($currency->symbol_left): ?>
                  <?php echo e($currency->symbol_left); ?>

                  <?php endif; ?>
                  <?php echo e($currency->name); ?>

                  <?php if($currency->symbol_right): ?>
                  <?php echo e($currency->symbol_right); ?>

                  <?php endif; ?>
                  </a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        <?php endif; ?>
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

         <?php
                    $__hook_name="header.top.language";
                    ob_start();
                ?>
        <?php if(count($languages) > 1): ?>
          <div class="dropdown" style="background-color: transparent">
            <a class="btn dropdown-toggle" href="javascript:void(0)" role="button" id="language-dropdown" data-toggle="dropdown"
              aria-expanded="false"
              style="
              color: white;
              outline: none;
              border: none;
              font-weight: 300;
              font-size: 13px;
              line-height: 16px;
              ">
              <?php echo e(current_language()->name); ?>


            </a>

            <div class="dropdown-menu" aria-labelledby="language-dropdown">
              <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="dropdown-item" href="<?php echo e(shop_route('lang.switch', [$language->code])); ?>">
                  <?php echo e($language->name); ?>

                </a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        <?php endif; ?>
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

         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("header.top.left",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
      </div>

       <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("header.top.language.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

      <div class="right nav">
        <?php if(system_setting('base.telephone', '')): ?>
           <?php
                    $__hook_name="header.top.telephone";
                    ob_start();
                ?>
          <div class="my-auto" style="color: white"><i class="bi bi-telephone-forward me-2"></i> <b style="color: white"><?php echo e(system_setting('base.telephone')); ?></b></div>
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
        <?php endif; ?>

         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("header.top.right",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
      </div>
    </div>
  </div>

  <div class="header-content d-none d-lg-block">
    <div class="container-fluid navbar-expand-lg">
       <?php
                    $__hook_name="header.menu.logo";
                    ob_start();
                ?>
      <div class="logo">
        <a href="<?php echo e(shop_route('home.index')); ?>">
          <img src="<?php echo e(image_origin(system_setting('base.logo'))); ?>" class="img-fluid">
        </a>
      </div>
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
      <div class="menu-wrap">
        <?php echo $__env->make('shared.menu-pc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <div class="right-btn" style="color: white">
        <ul class="navbar-nav flex-row">
           <?php
                    $__hook_name="header.menu.icon";
                    ob_start();
                ?>
          <li class="nav-item"><a href="#offcanvas-search-top" data-bs-toggle="offcanvas"
              aria-controls="offcanvasExample" class="nav-link"><i class="iconfont">&#xe8d6;</i></a></li>
          <li class="nav-item"><a href="<?php echo e(shop_route('account.wishlist.index')); ?>" class="nav-link"><i
                class="iconfont">&#xe662;</i></a></li>
          <li class="nav-item dropdown">
            <a href="<?php echo e(shop_route('account.index')); ?>" class="nav-link"><i class="iconfont">&#xe619;</i></a>
            <ul class="dropdown-menu">
              <?php if(auth()->guard('web_shop')->check()): ?>
                <li class="dropdown-item">
                  <h6 class="mb-0"><?php echo e(current_customer()->name); ?></h6>
                </li>
                <li>
                  <hr class="dropdown-divider opacity-100">
                </li>
                <li><a href="<?php echo e(shop_route('account.index')); ?>" class="dropdown-item"><i class="bi bi-person me-1"></i>
                  <?php echo e(__('shop/account.index')); ?></a></li>
                <li><a href="<?php echo e(shop_route('account.order.index')); ?>" class="dropdown-item"><i
                      class="bi bi-clipboard-check me-1"></i> <?php echo e(__('shop/account/order.index')); ?></a></li>
                <li><a href="<?php echo e(shop_route('account.wishlist.index')); ?>" class="dropdown-item"><i
                      class="bi bi-heart me-1"></i> <?php echo e(__('shop/account/wishlist.index')); ?></a></li>
                <li>
                  <hr class="dropdown-divider opacity-100">
                </li>
                <li><a href="<?php echo e(shop_route('logout')); ?>" class="dropdown-item"><i class="bi bi-box-arrow-left me-1"></i>
                    <?php echo e(__('common.sign_out')); ?></a></li>
              <?php else: ?>
                <li><a href="<?php echo e(shop_route('login.index')); ?>" class="dropdown-item"><i
                      class="
                      bi bi-box-arrow-right
                      me-1"></i><?php echo e(__('shop/login.login_and_sign')); ?></a></li>
              <?php endif; ?>
            </ul>
          </li>
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
          <li class="nav-item">
             <a class="nav-link position-relative" <?php echo e(!equal_route('shop.carts.index') ? 'data-bs-toggle=offcanvas' : ''); ?>

              href="<?php echo e(!equal_route('shop.carts.index') ? '#offcanvas-right-cart' : 'javascript:void(0);'); ?>" role="button"
              aria-controls="offcanvasExample">
              <i class="iconfont">&#xe634;</i>
              <span class="cart-badge-quantity" style="color: #fe6233; background-color: white"></span>
            </a>



          </li>
          <li class="nav-item dropdown">
            <a href="<?php echo e(shop_route('orderTracking')); ?>" class="nav-link"><i class="bi bi-pen me-1"></i></a>
            <ul class="dropdown-menu">
              <li ><a href="<?php echo e(shop_route('orderTracking')); ?>" class="dropdown-item" ><?php echo e(__('shop/account/order.order_tracking')); ?></a></li>
            </ul>
          </li>


        </ul>
      </div>
    </div>
  </div>

  <div class="header-mobile d-lg-none" style="background-color: #fc5831;">
    <div class="mobile-content">
      <div class="left" style="color: white">
        <div class="mobile-open-menu"><i class="bi bi-list"></i></div>
        <div class="mobile-open-search" href="#offcanvas-search-top" data-bs-toggle="offcanvas" aria-controls="offcanvasExample">
          <i class="iconfont">&#xe8d6;</i>
        </div>
      </div>
      <div class="center"><a href="<?php echo e(shop_route('home.index')); ?>">
        <img src="<?php echo e(image_origin(system_setting('base.logo'))); ?>" class="img-fluid"></a>
      </div>
      <div class="right" style="color: white">
        <a href="<?php echo e(shop_route('account.index')); ?>" class="nav-link mb-account-icon">
          <i class="iconfont">&#xe619;</i>
          <?php if(strstr(current_route(), 'shop.account')): ?>
            <span></span>
          <?php endif; ?>
        </a>
        <a href="<?php echo e(shop_route('carts.index')); ?>" class="nav-link ms-3 m-cart position-relative"><i class="iconfont">&#xe634;</i> <span class="cart-badge-quantity" style="color: #fe6233; background-color: white"></span></a>
        <a href="<?php echo e(shop_route('orderTracking')); ?>" class="nav-link mb-account-icon ms-3"><i class="bi bi-pen me-1"></i></a> 
      </div>
    </div>
  </div>
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas-mobile-menu">
    <div class="offcanvas-header" style="background-color: #fb5631;">
      <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel" style="color: white"><?php echo e(__('common.menu')); ?></h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mobile-menu-wrap">
      <?php echo $__env->make('shared.menu-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-right-cart" aria-labelledby="offcanvasRightLabel"></div>

  <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvas-search-top" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
      <input type="text" class="form-control input-group-lg border-0 fs-4" focus placeholder="<?php echo e(__('common.input')); ?>" value="<?php echo e(request('keyword')); ?>">
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
  </div>
   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("header.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
</header>
<?php /**PATH G:\workspace\new\themes\default/layout/header.blade.php ENDPATH**/ ?>