<div class="header-content d-none d-lg-block" style="background-color: #fb5631;">
  <div class="header-wrap">
    <div class="header-left">
      <div class="logo">
        <a href=""><img src="<?php echo e(asset('image/logo.png')); ?>" class="img-fluid"></a>
      </div>
    </div>
    <div class="header-right">
      <div class="search-wrap">
        <div class="input-wrap">
          <div class="search-icon"><i class="bi bi-search"></i></div>
          <input type="text" id="header-search-input" autocomplete="off" class="form-control" placeholder="<?php echo e(__('admin/common.header_search_input')); ?>">
          <button class="btn close-icon" type="button"><i class="bi bi-x-lg"></i></button>
        </div>

        <div class="dropdown-menu">
          <div class="search-ing"><i class="el-icon-loading"></i></div>
          <div class="dropdown-search">
            <div class="dropdown-header fw-bold"><?php echo e(__('admin/common.header_search_title')); ?></div>
            <div class="common-links"></div>
            <div class="header-search-no-data"><i class="bi bi-file-earmark"></i> <?php echo e(__('common.no_data')); ?></div>
          </div>
          <div class="dropdown-wrap">
            <?php if($historyLinks): ?>
              <div class="link-item recent-search">
                <div class="dropdown-header fw-bold mb-2"><?php echo e(__('admin/common.recent_view')); ?></div>
                <div class="recent-search-links">
                  <?php $__currentLoopData = $historyLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($link['url']); ?>"><i class="bi bi-search"></i> <?php echo e($link['title']); ?></a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            <?php endif; ?>
            <div class="link-item">
              <div class="dropdown-header fw-bold"><?php echo e(__('admin/common.common_link')); ?></div>
              <div class="common-links">
                <?php $__currentLoopData = $commonLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a class="dropdown-item" href="<?php echo e($link['url']); ?>" target="<?php echo e($link['blank'] ? '_blank' : '_self'); ?>">
                    <span><i class="<?php echo e($link['icon']); ?>"></i></span> <?php echo e($link['title']); ?>

                  </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ul class="navbar navbar-right">
        <?php if(!check_license()): ?>
        <?php endif; ?>

         <?php
                    $__hook_name="admin.header.upgrade";
                    ob_start();
                ?>
        <li class="nav-item update-btn me-2" style="display: none">
          <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm"><?php echo app('translator')->get('admin/common.update_nav'); ?></a>
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

        <!--  <?php
                    $__hook_name="admin.header.license";
                    ob_start();
                ?>
        <li class="nav-item">
          <a href="<?php echo e(beike_api_url()); ?>/vip/subscription?domain=<?php echo e(config('app.url')); ?>&developer_token=<?php echo e(system_setting('base.developer_token')); ?>&type=tab-license" target="_blank" class="nav-link">
            <i class="bi bi-wrench-adjustable-circle text-info"></i>&nbsp;<?php echo app('translator')->get('admin/common.license_services'); ?>
          </a>
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
                ?> -->

        <!--  <?php
                    $__hook_name="admin.header.marketing";
                    ob_start();
                ?>
        <li class="nav-item">
          <a href="<?php echo e(admin_route('marketing.index')); ?>" class="nav-link"><i class="bi bi-gem text-primary"></i>&nbsp;<?php echo app('translator')->get('admin/common.marketing'); ?></a>
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
                ?> -->

         <?php
                    $__hook_name="admin.header.language";
                    ob_start();
                ?>
        <li class="nav-item">
          <!-- <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"><?php echo e($admin_language['name']); ?></a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
              <?php $__currentLoopData = $admin_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="<?php echo e(admin_route('edit.locale', ['locale' => $language['code']])); ?>" class="dropdown-item"><?php echo e($language['name']); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div> -->
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

         <?php
                    $__hook_name="admin.header.user";
                    ob_start();
                ?>
        <li class="nav-item me-3">
          <div class="dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <span class="ml-2"><?php echo e(current_user()->name); ?></span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
              <li>
                <a target="_blank" href="<?php echo e(shop_route('home.index')); ?>" class="dropdown-item py-2">
                  <i class="bi bi-send me-1"></i> <?php echo e(__('admin/common.access_frontend')); ?>

                </a>
              </li>
              <li>
                <a href="<?php echo e(admin_route('account.index')); ?>" class="dropdown-item py-2">
                  <i class="bi bi-person-circle me-1"></i> <?php echo e(__('admin/common.account_index')); ?>

                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a href="<?php echo e(admin_route('logout.index')); ?>" class="dropdown-item py-2">
                  <i class="bi bi-box-arrow-left me-1"></i> <?php echo e(__('common.sign_out')); ?>

                </a>
              </li>
            </ul>
          </div>
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
      </ul>
    </div>
  </div>
</div>

<div class="header-mobile d-lg-none">
  <div class="header-mobile-wrap">
    <div class="header-mobile-left">
      <div class="mobile-open-menu"><i class="bi bi-list"></i></div>
    </div>
    <div class="logo">
      <a href=""><img src="<?php echo e(asset('image/logo.png')); ?>" class="img-fluid"></a>
    </div>
    <div class="header-mobile-right">
      <div class="mobile-to-front">
        <a target="_blank" href="<?php echo e(shop_route('home.index')); ?>" class="nav-divnk"><i class="bi bi-send"></i></a>
      </div>
    </div>
  </div>
</div>

<div class="update-pop p-3" style="display: none">
  <div class="mb-4 fs-5 fw-bold text-center"><?php echo e(__('admin/common.update_title')); ?></div>
  <div class="py-3 px-4 bg-light mx-3 lh-lg mb-4">
    <div><?php echo e(__('admin/common.update_new_version')); ?>：<span class="new-version fs-5 fw-bold text-success"></span></div>
    <div><?php echo e(__('admin/common.update_old_version')); ?>：<span class="fs-5"><?php echo e(config('beike.version')); ?></span></div>
    <div><?php echo e(__('admin/common.update_date')); ?>：<span class="update-date fs-5"></span></div>
  </div>

  <div class="d-flex justify-content-center mb-3">
    <button class="btn btn-outline-secondary me-3 "><?php echo e(__('common.cancel')); ?></button>
    <a href="https://beikeshop.com/download" target="_blank" class="btn btn-primary"><?php echo e(__('admin/common.update_btn')); ?></a>
  </div>
</div>
<?php /**PATH G:\workspace\new\resources\/beike/admin/views/components/header.blade.php ENDPATH**/ ?>