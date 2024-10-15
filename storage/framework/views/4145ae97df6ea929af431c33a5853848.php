<aside class="sidebar-box navbar-expand-xs border-radius-xl">
  <div class="sidebar-info">
    <div class="left">
      <ul class="list-unstyled navbar-nav">
        <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav-item <?php echo e($link['active'] ? 'active' : ''); ?>">
          <a target="<?php echo e($link['blank'] ? '_blank' : '_self'); ?>" class="nav-link" href="<?php echo e($link['url']); ?>">
            <i class="<?php echo e($link['icon']); ?>"></i> <span><?php echo e($link['title']); ?></span>
          </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>

    <?php if($currentLink['children'] ?? []): ?>
      <div class="right">
        <h4 class="title"><?php echo e($currentLink['title']); ?></h4>
        <ul class="list-unstyled navbar-nav">
          <?php $__currentLoopData = $currentLink['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="nav-item <?php echo e($link['active'] ? 'active' : ''); ?>">
            <a target="<?php echo e($link['blank'] ? '_blank' : '_self'); ?>" class="nav-link" href="<?php echo e($link['url']); ?>">
              <?php echo e($link['title']); ?>

            </a>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>
</aside>

<?php /**PATH G:\workspace\new\resources\/beike/admin/views/components/sidebar.blade.php ENDPATH**/ ?>