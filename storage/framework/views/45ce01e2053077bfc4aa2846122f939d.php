<!DOCTYPE html>
<html lang="<?php echo e(admin_locale()); ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <base href="<?php echo e($admin_base_url); ?>">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="asset" content="<?php echo e(asset('/')); ?>">
  <meta name="editor_language" content="<?php echo e(locale()); ?>">
  <script src="<?php echo e(asset('vendor/vue/2.7/vue' . (!config('app.debug') ? '.min' : '') . '.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/element-ui/index.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/jquery/jquery-3.6.0.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/layer/3.5.1/layer.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/cookie/js.cookie.min.js')); ?>"></script>
  <link href="<?php echo e(mix('/build/beike/admin/css/bootstrap.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('vendor/element-ui/index.css')); ?>">
  <?php if(locale() != 'zh_cn'): ?>
    <script src="<?php echo e(asset('vendor/element-ui/language/' . locale() . '.js')); ?>"></script>
  <?php endif; ?>
  <link rel="shortcut icon" href="<?php echo e(image_origin(system_setting('base.favicon'))); ?>">
  <link href="<?php echo e(mix('build/beike/admin/css/app.css')); ?>" rel="stylesheet">
  <script src="<?php echo e(mix('build/beike/admin/js/app.js')); ?>"></script>
  <title>BeikeShop - <?php echo $__env->yieldContent('title'); ?></title>
  <?php echo $__env->yieldPushContent('header'); ?>
  
  <script>
    const $languages = <?php echo json_encode(locales(), 15, 512) ?>;
    const $locale = '<?php echo e(locale()); ?>';
  </script>
</head>

<body class="<?php echo $__env->yieldContent('body-class'); ?> <?php echo e(admin_locale()); ?>">
  <?php if (isset($component)) { $__componentOriginal469f716b0a86d59a343064655581e12a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal469f716b0a86d59a343064655581e12a = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Header::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal469f716b0a86d59a343064655581e12a)): ?>
<?php $attributes = $__attributesOriginal469f716b0a86d59a343064655581e12a; ?>
<?php unset($__attributesOriginal469f716b0a86d59a343064655581e12a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal469f716b0a86d59a343064655581e12a)): ?>
<?php $component = $__componentOriginal469f716b0a86d59a343064655581e12a; ?>
<?php unset($__componentOriginal469f716b0a86d59a343064655581e12a); ?>
<?php endif; ?>

  <div class="main-content">
    <?php if (isset($component)) { $__componentOriginal568390bc9d0edec5bb14732982c1a4eb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal568390bc9d0edec5bb14732982c1a4eb = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal568390bc9d0edec5bb14732982c1a4eb)): ?>
<?php $attributes = $__attributesOriginal568390bc9d0edec5bb14732982c1a4eb; ?>
<?php unset($__attributesOriginal568390bc9d0edec5bb14732982c1a4eb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal568390bc9d0edec5bb14732982c1a4eb)): ?>
<?php $component = $__componentOriginal568390bc9d0edec5bb14732982c1a4eb; ?>
<?php unset($__componentOriginal568390bc9d0edec5bb14732982c1a4eb); ?>
<?php endif; ?>
    <div id="content">
      <div class="page-title-box py-1 d-flex align-items-center justify-content-between">
        <div class="d-flex">
          <h5  class="page-title">
              <svg style="height: 16px; color:#ee4d2d"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><<path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
              <?php echo $__env->yieldContent('title'); ?>
           </h5>
          <div class="ms-4 text-danger"><?php echo $__env->yieldContent('page-title-after'); ?></div>
        </div>
        <div class="text-nowrap"><?php echo $__env->yieldContent('page-title-right'); ?></div>
      </div>
      <div class="container-fluid p-0">
        <div class="content-info"><?php echo $__env->yieldContent('content'); ?></div>
        <div class="page-bottom-btns">
          <?php echo $__env->yieldContent('page-bottom-btns'); ?>
        </div>
      </div>
    </div>
  </div>

  <script>
    <?php if(locale() != 'zh_cn'): ?>
      ELEMENT.locale(ELEMENT.lang['<?php echo e(locale()); ?>'])
    <?php endif; ?>
    const lang = {
      file_manager: '<?php echo e(__('admin/file_manager.file_manager')); ?>',
      error_form: '<?php echo e(__('common.error_form')); ?>',
      text_hint: '<?php echo e(__('common.text_hint')); ?>',
      translate_form: '<?php echo e(__('admin/common.translate_form')); ?>',
    }

    const config = {
      beike_version: '<?php echo e(config('beike.version')); ?>',
      api_url: '<?php echo e(beike_api_url()); ?>',
      app_url: '<?php echo e(config('app.url')); ?>',
      has_license: <?php echo e(json_encode(check_license())); ?>,
      has_license_code: '<?php echo e(system_setting("base.license_code", "")); ?>',
    }

    function languagesFill(text) {
      var obj = {};
      $languages.map(e => {
        obj[e.code] = text
      })
      return obj;
    }
  </script>
  <?php echo $__env->yieldPushContent('footer'); ?>
</body>
</html>
<?php /**PATH G:\workspace\new\resources\/beike/admin/views/layouts/master.blade.php ENDPATH**/ ?>