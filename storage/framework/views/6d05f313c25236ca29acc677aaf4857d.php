

<?php $__env->startSection('template_title'); ?>
  <?php echo e(trans('installer::installer_messages.requirements.template_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
  <i class="fa fa-list-ul fa-fw" aria-hidden="true"></i>
  <?php echo e(trans('installer::installer_messages.requirements.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="install-2">
    <h3 class="mb-5"><?php echo e(trans('installer::installer_messages.requirements.title')); ?></h3>
    <table class="table table-hover text-black text-opacity-75 fs-5 mb-5">
      <thead>
        <th width="70%"><?php echo e(trans('installer::installer_messages.requirements.environment')); ?></th>
        <th width="30%"><?php echo e(trans('installer::installer_messages.status')); ?></th>
      </thead>
      <tbody>
        <?php $__currentLoopData = $requirements['requirements']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td colspan="3">
              <strong class="fs-4"><?php echo e(ucfirst($type)); ?></strong>
              <?php if($type == 'php'): ?>
              <small>(version <?php echo e($phpSupportInfo['minimum']); ?> required)</small>
              <span class="float-right">
                <strong><?php echo e($phpSupportInfo['current']); ?></strong>
                <i class="bi bi-<?php echo e($phpSupportInfo['supported'] ? 'check2' : 'x'); ?> row-icon"
                  aria-hidden="true"></i>
              </span>
            <?php endif; ?>
            </td>
          </tr>
          <?php $__currentLoopData = $requirements['requirements'][$type]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extention => $enabled): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="<?php echo e($enabled ? '' : 'table-danger'); ?>">
              <td><?php echo e($extention); ?></td>
              <td class="<?php echo e($enabled ? 'text-success' : 'text-danger'); ?>"><i class="bi bi-<?php echo e($enabled ? 'check-circle-fill' : 'exclamation-circle-fill'); ?> row-icon"
                aria-hidden="true"></i></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>

    <?php if(!isset($requirements['errors']) && $phpSupportInfo['supported']): ?>
      <div class="d-flex justify-content-end">
        <a class="btn btn-primary d-flex align-items-center" href="<?php echo e(route('installer.permissions')); ?>">
          <?php echo e(trans('installer::installer_messages.requirements.next')); ?>

          <i class="bi bi-arrow-right-short fs-2 lh-1 ms-2"></i>
        </a>
      </div>
    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\beike\Installer\Providers/../Views/requirements.blade.php ENDPATH**/ ?>