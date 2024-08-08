<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title>
    <?php if(trim($__env->yieldContent('template_title'))): ?>
      <?php echo $__env->yieldContent('template_title'); ?> |
    <?php endif; ?> <?php echo e(trans('installer::installer_messages.title')); ?>

  </title>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/build/beike/shop/default/css/bootstrap.css')); ?>">
  <script src="<?php echo e(asset('vendor/jquery/jquery-3.6.0.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/layer/3.5.1/layer.js')); ?>"></script>
  <link rel="shortcut icon" href="<?php echo e(asset('/image/favicon.png')); ?>">
  <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/install/css/app.css')); ?>">
  <?php echo $__env->yieldContent('style'); ?>
</head>

<body>
  <div class="install-box">
    <aside class="aside-wrap">
      <div class="top">
        <div class="logo mb-5"><img src="<?php echo e(asset('/image/logo.png')); ?>" class="img-fluid"></div>
        <div class="steps-wrap">
          <ul>
            <li class="<?php echo e($steps == 1 ? 'ing' : ''); ?> <?php echo e($steps > 1 ? 'success' : ''); ?>">
              <div class="left">
                 <span class="index"><?php if($steps > 1): ?> <i class="bi bi-check-lg"></i> <?php else: ?> 1 <?php endif; ?></span>
                 <?php echo e(__('installer::installer_messages.welcome.title')); ?>

                </div>
              <span class="right"><i class="bi bi-arrow-right-short"></i></span>
            </li>
            <li class="<?php echo e($steps == 2 ? 'ing' : ''); ?> <?php echo e($steps > 2 ? 'success' : ''); ?>">
              <div class="left">
                <span class="index"><?php if($steps > 2 && $steps != 2): ?> <i class="bi bi-check-lg"></i> <?php else: ?> 2 <?php endif; ?></span>
                <?php echo e(__('installer::installer_messages.requirements.title')); ?>

              </div>
              <span class="right"><i class="bi bi-arrow-right-short"></i></span>
            </li>
            <li class="<?php echo e($steps == 3 ? 'ing' : ''); ?> <?php echo e($steps > 3 ? 'success' : ''); ?>">
              <div class="left">
                <span class="index"><?php if($steps > 3 && $steps != 3): ?> <i class="bi bi-check-lg"></i> <?php else: ?> 3 <?php endif; ?></span>
                <?php echo e(__('installer::installer_messages.permissions.title')); ?>

              </div>
              <span class="right"><i class="bi bi-arrow-right-short"></i></span>
            </li>
            <!-- <li class="<?php echo e($steps == 4 ? 'ing' : ''); ?> <?php echo e($steps > 4 ? 'success' : ''); ?>">
              <div class="left">
                <span class="index"><?php if($steps > 4 && $steps != 4): ?> <i class="bi bi-check-lg"></i> <?php else: ?> 4 <?php endif; ?></span>
                <?php echo e(__('installer::installer_messages.environment.title')); ?>

              </div>
              <span class="right"><i class="bi bi-arrow-right-short"></i></span>
            </li> -->
            <li class="<?php echo e($steps == 4 ? 'ing' : ''); ?> <?php echo e($steps > 4 ? 'success' : ''); ?>">
              <div class="left">
                <span class="index"><?php if($steps > 4 && $steps != 4): ?> <i class="bi bi-check-lg"></i> <?php else: ?> 4 <?php endif; ?></span>
                <?php echo e(__('installer::installer_messages.final.template_title')); ?>

              </div>
              <span class="right"><i class="bi bi-arrow-right-short"></i></span>
            </li>
          </ul>
        </div>
      </div>
      <div class="bottom">
      </div>
    </aside>

    <div class="content">
      <?php if(session()->has('errors')): ?>
        <div class="alert alert-danger" id="error_alert">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($error); ?></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?>

      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>
  <?php echo $__env->yieldContent('scripts'); ?>

  <script>
    $(document).ready(function() {
      $('html, body').css('height', $(window).height());
    });
  </script>
</body>
</html>
<?php /**PATH D:\shop-freelance\beike\Installer\Providers/../Views/layouts/master.blade.php ENDPATH**/ ?>