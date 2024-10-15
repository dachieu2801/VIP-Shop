<!doctype html>
<html lang="<?php echo e(locale()); ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo $__env->yieldContent('title', system_setting('base.meta_title', 'BeikeShop开源好用的跨境电商系统')); ?></title>
  <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', system_setting('base.meta_keywords')); ?>">
  <meta name="description" content="<?php echo $__env->yieldContent('description', system_setting('base.meta_description')); ?>">
  <meta name="generator" content="BeikeShop v<?php echo e(config('beike.version')); ?>(<?php echo e(config('beike.build')); ?>)">
  <base href="<?php echo e($shop_base_url); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(mix('/build/beike/shop/'.system_setting('base.theme').'/css/bootstrap.css')); ?>">
  <script src="<?php echo e(asset('vendor/jquery/jquery-3.6.0.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/layer/3.5.1/layer.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/lazysizes/lazysizes.min.js')); ?>"></script>
  <link rel="shortcut icon" href="<?php echo e(image_origin(system_setting('base.favicon'))); ?>">
  <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(mix('/build/beike/shop/'.system_setting('base.theme').'/js/app.js')); ?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo e(mix('/build/beike/shop/'.system_setting('base.theme').'/css/app.css')); ?>">
  <?php if(system_setting('base.head_code')): ?>
    <?php echo system_setting('base.head_code'); ?>

  <?php endif; ?>
   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("layout.header.code",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
  <?php echo $__env->yieldPushContent('header'); ?>
</head>
<body class="<?php echo $__env->yieldContent('body-class'); ?> <?php echo e(request('_from')); ?>">
  <?php if(!request('iframe') && request('_from') != 'app'): ?>
    <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <?php echo $__env->yieldContent('content'); ?>

  <?php if(!request('iframe') && request('_from') != 'app'): ?>
    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <script>
    const config = {
      isLogin: !!<?php echo e(current_customer()->id ?? 'null'); ?>,
      guestCheckout: !!<?php echo e(system_setting('base.guest_checkout', 1)); ?>,
      loginShowPrice: !!<?php echo e(system_setting('base.show_price_after_login', 0)); ?>,
    }

    // 如果页面使用了ElementUI，且当前语言不是中文，则加载对应的语言包
    <?php if(locale() != 'zh_cn'): ?>
      if (typeof ELEMENT !== 'undefined') {
        const elLocale = '<?php echo e(asset('vendor/element-ui/language/'.locale().'.js')); ?>';
        document.write("<script src='" + elLocale + "'><\/script>")

        $(function () {
          setTimeout(() => {
            ELEMENT.locale(ELEMENT.lang['<?php echo e(locale()); ?>'])
          }, 0);
        })
      }
    <?php endif; ?>
  </script>

  <?php echo $__env->yieldPushContent('add-scripts'); ?>
</body>
<!-- BeikeShop v<?php echo e(config('beike.version')); ?>(<?php echo e(config('beike.build')); ?>) -->
</html>
<?php /**PATH G:\workspace\new\themes\default/layout/master.blade.php ENDPATH**/ ?>