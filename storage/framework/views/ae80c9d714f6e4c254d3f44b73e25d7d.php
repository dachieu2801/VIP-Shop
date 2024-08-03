

<?php $__env->startSection('title', __('admin/common.theme_index')); ?>

<?php $__env->startSection('body-class', 'page-theme'); ?>

<?php $__env->startSection('content'); ?>
  <div id="customer-app" class="card h-min-600">
    <div class="card-header d-flex justify-content-between align-items-start">
      <h5 class="card-title"><?php echo e(__('admin/theme.page_title')); ?></h5>
      <a href="<?php echo e(admin_route('marketing.index')); ?>?type=theme" class="btn btn-outline-info"><?php echo e(__('common.get_more')); ?></a>
    </div>
    <div class="card-body">
      <div class="theme-wrap">
        <div class="row">
          <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="item">
              <div class="img"><img src="<?php echo e($item['image']); ?>" class="img-fluid"></div>
              <div class="theme-bottom d-flex justify-content-between align-items-center">
                <div class="name fs-5"><?php echo e($item['name']); ?></div>
                <div class="theme-tool">
                  <?php if($item['status']): ?>
                    <div class="enabled-text"><?php echo e(__('admin/theme.enabled_text')); ?></div>
                  <?php else: ?>
                    <button class="btn btn-outline-success enabled-theme" data-code="<?php echo e($item['code']); ?>"><?php echo e(__('common.enabled')); ?></button>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
  <div id="theme-config" class="p-3" style="display: none">
    <div class="form-check form-check-inline mb-3">
      <input class="form-check-input" type="checkbox" id="theme-demo-data" value="">
      <label class="form-check-label" for="theme-demo-data"><?php echo e(__('admin/theme.theme_pop_checkbox')); ?></label>
    </div>
    <div class="text-danger"><i class="bi bi-exclamation-triangle-fill"></i> <?php echo e(__('admin/theme.theme_pop_text')); ?></div>
    <div class="d-flex justify-content-end mt-3">
      <button class="btn btn-primary theme-config-btn"><?php echo e(__('common.confirm')); ?></button>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    $(function () {
      let theme = null;
      $('.enabled-theme').click(function () {
        theme = $(this).data('code');

        layer.open({
          type: 1,
          title: '<?php echo e(__('common.text_hint')); ?>',
          area: ['400px'],
          content: $('#theme-config'),
        })
      })

      $('.theme-config-btn').click(function () {
        const demoData = $('#theme-demo-data').is(':checked');

        $http.put(`themes/${theme}`, {import_demo: demoData}).then((res) => {
          layer.msg(res.message, {time: 600}, ()=> {
            window.location.reload();
          });
        })
      })
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\team-free-lance\shop-freelance\resources\/beike/admin/views/pages/theme/index.blade.php ENDPATH**/ ?>