

<?php $__env->startSection('template_title'); ?>
  <?php echo e(trans('installer::installer_messages.final.template_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
  <i class="fa fa-flag-checkered fa-fw" aria-hidden="true"></i>
  <?php echo e(__('installer::installer_messages.final.tittemplate_titlele')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="install-2">
		<h3 class="mb-5"><?php echo e(__('installer::installer_messages.final.template_title')); ?></h3>

		<div class="d-flex justify-content-center flex-column align-items-center">

			<div class="welcome-img mb-5" style="max-width: 230px;"><img src="https://beikeshop.com/install/install-2.png?version=<?php echo e(config('beike.version')); ?>&build_date=<?php echo e(config('beike.build')); ?>" class="img-fluid"></div>

			<h5 class="text-center mb-4"><?php echo e(__('installer::installer_messages.final.finished')); ?></h5>






			<div class="d-flex justify-content-center">
				<a href="<?php echo e(url('/')); ?>" class="btn btn-lg btn-outline-primary"><i class="bi bi-window-dock me-2"></i> <?php echo e(trans('installer::installer_messages.final.to_front')); ?></a>
				<a href="<?php echo e(url('/admin/login')); ?>" class="btn btn-lg btn-primary ms-4"><i class="bi bi-window-sidebar me-2"></i> <?php echo e(trans('installer::installer_messages.final.to_admin')); ?></a>
			</div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\beike\Installer\Providers/../Views/finished.blade.php ENDPATH**/ ?>