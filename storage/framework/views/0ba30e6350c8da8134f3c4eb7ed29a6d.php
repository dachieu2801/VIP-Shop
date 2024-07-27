

<?php $__env->startSection('template_title'); ?>
  <?php echo e(trans('installer::installer_messages.permissions.template_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
  <i class="fa fa-key fa-fw" aria-hidden="true"></i>
  <?php echo e(trans('installer::installer_messages.permissions.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="install-2">
    <h3 class="mb-5"><?php echo e(__('installer::installer_messages.permissions.title')); ?></h3>
    <table class="table table-hover text-black text-opacity-75 fs-5 mb-5">
      <thead>
        <tr>
          <th width="40%"><?php echo e(__('installer::installer_messages.permissions.table')); ?></th>
          <th width="30%"><?php echo e(__('installer::installer_messages.permissions.next')); ?></th>
          <th width="30%"><?php echo e(__('installer::installer_messages.status')); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $permissions['permissions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr class="<?php echo e($permission['isSet'] ? '' : 'table-danger'); ?>">
            <td><?php echo e($permission['folder']); ?></td>
            <td><?php echo e($permission['permission']); ?></td>
            <td>
              <i class="bi bi-<?php echo e($permission['isSet'] ? 'check-circle-fill' : 'exclamation-circle-fill'); ?> <?php echo e($permission['isSet'] ? 'text-success' : 'text-danger'); ?> row-icon"
                aria-hidden="true"></i>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>

  <?php if(!isset($permissions['errors'])): ?>
    <div class="d-flex justify-content-end">
      <a class="btn btn-primary d-flex align-items-center" href="<?php echo e(route('installer.final')); ?>">
        <?php echo e(trans('installer::installer_messages.permissions.next')); ?>

        <i class="bi bi-arrow-right-short fs-2 lh-1 ms-2"></i>
      </a>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\team-free-lance\shop-freelance\beike\Installer\Providers/../Views/permissions.blade.php ENDPATH**/ ?>