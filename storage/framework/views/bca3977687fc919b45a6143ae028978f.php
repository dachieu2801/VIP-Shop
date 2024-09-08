<div class="alert alert-<?php echo e($type); ?> alert-dismissible">
  <?php
    $class = 'check-circle-fill';
    if ($type == 'danger') {
      $class = 'x-circle-fill';
    } elseif ($type == 'warning') {
      $class = 'exclamation-circle-fill';
    } elseif ($type == 'info') {
      $class = 'info-circle-fill';
    }
  ?>
  <i class="bi bi-<?php echo e($class); ?>"></i>
  <?php echo $msg; ?>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div><?php /**PATH G:\workspace\new\resources\/beike/admin/views/components/alert.blade.php ENDPATH**/ ?>