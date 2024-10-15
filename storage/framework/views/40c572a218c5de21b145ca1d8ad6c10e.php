<div class="accordion accordion-flush" id="menu-accordion">
  <?php $__currentLoopData = $menu_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($menu['name']): ?>
      <div class="accordion-item">
        <div class="nav-item-text">
          <a class="nav-link" target="<?php echo e(isset($menu['new_window']) && $menu['new_window'] ? '_blank' : '_self'); ?>" href="<?php echo e($menu['link'] ?: '#flush-menu-' . $key); ?>" data-bs-toggle="<?php echo e(!$menu['link'] ? 'collapse' : ''); ?>">
            <?php echo e($menu['name']); ?>

            <?php if(isset($menu['badge']) && $menu['badge']['name']): ?>
            <span class="badge" style="background-color: <?php echo e($menu['badge']['bg_color']); ?>; color: <?php echo e($menu['badge']['text_color']); ?>; border-color: <?php echo e($menu['badge']['bg_color']); ?>">
              <?php echo e($menu['badge']['name']); ?>

            </span>
            <?php endif; ?>
          </a>
          <?php if(isset($menu['children_group']) && $menu['children_group']): ?>
          <span class="collapsed" data-bs-toggle="collapse" data-bs-target="#flush-menu-<?php echo e($key); ?>"><i class="bi bi-chevron-down"></i></span>
          <?php endif; ?>
        </div>
        <?php if(isset($menu['children_group']) && $menu['children_group']): ?>
        <div class="accordion-collapse collapse" id="flush-menu-<?php echo e($key); ?>" data-bs-parent="#menu-accordion">
          <?php $__empty_2 = true; $__currentLoopData = $menu['children_group']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
          <div class="children-group">
            <?php if($group['name']): ?>
            <div class="d-flex justify-content-between align-items-center children-title" data-bs-toggle="collapse" data-bs-target="#children-menu-<?php echo e($key); ?>-<?php echo e($c_key); ?>">
              <div><?php echo e($group['name']); ?></div>
              <?php if($group['children']): ?>
              <span class="collapsed" data-bs-toggle="collapse" data-bs-target="#children-menu-<?php echo e($key); ?>-<?php echo e($c_key); ?>"><i class="bi bi-plus-lg"></i></span>
              <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="accordion-collapse collapse <?php echo e(!$group['name'] ? 'd-block' : ''); ?>" id="children-menu-<?php echo e($key); ?>-<?php echo e($c_key); ?>" data-bs-parent="#flush-menu-<?php echo e($key); ?>">
              <?php if($group['type'] == 'image'): ?>
              <a target="<?php echo e(isset($group['image']['link']['new_window']) && $group['image']['link']['new_window'] ? '_blank' : '_self'); ?>" href="<?php echo e($group['image']['link']); ?>"><img src="<?php echo e($group['image']['image']); ?>" class="img-fluid"></a>
              <?php else: ?>
              <ul class="nav flex-column ul-children">
                <?php $__currentLoopData = $group['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!is_array($children['link']['text']) && $children['link']['text']): ?>
                <li class="nav-item">
                  <a target="<?php echo e(isset($children['link']['new_window']) && $children['link']['new_window'] ? '_blank' : '_self'); ?>" class="nav-link px-0" href="<?php echo e($children['link']['link']); ?>"><?php echo e($children['link']['text']); ?></a>
                </li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH G:\workspace\new\themes\default/shared/menu-mobile.blade.php ENDPATH**/ ?>