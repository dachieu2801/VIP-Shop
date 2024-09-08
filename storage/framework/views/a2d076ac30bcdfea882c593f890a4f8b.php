<ul class="navbar-nav mx-auto" style="color: white;  ">
   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("header.menu.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
  <?php $__currentLoopData = $menu_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($menu['name']): ?>
      <li
        class="nav-item <?php echo e(isset($menu['children_group']) ? 'dropdown' : ''); ?> <?php echo e(isset($menu['isFull']) && $menu['isFull'] ? 'position-static' : ''); ?>">
        <a class="nav-link fw-bold <?php echo e(isset($menu['children_group']) ? 'dropdown-toggle' : ''); ?>"
          target="<?php echo e(isset($menu['new_window']) && $menu['new_window'] ? '_blank' : '_self'); ?>"
          href="<?php echo e($menu['link'] ?: 'javascript:void(0)'); ?>">
          <?php echo e($menu['name']); ?>

          <?php if(isset($menu['badge']) && $menu['badge']['name']): ?>
            <span class="badge"
              style="background-color: <?php echo e($menu['badge']['bg_color']); ?>; color: <?php echo e($menu['badge']['text_color']); ?>; border-color: <?php echo e($menu['badge']['bg_color']); ?>">
              <?php echo e($menu['badge']['name']); ?>

            </span>
          <?php endif; ?>
        </a>
        <?php if(isset($menu['children_group']) && $menu['children_group']): ?>
          <div class="dropdown-menu <?php echo e($menu['isFull'] ? 'w-100' : ''); ?>"
            style="min-width: <?php echo e(count($menu['children_group']) * 240); ?>px">
            <div class="card card-lg">
              <div class="card-body">
                <div class="container">
                  <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $menu['children_group']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                      <div class="col-6 col-md">
                        <?php if($group['name']): ?>
                          <div class="mb-3 fw-bold group-name"><?php echo e($group['name']); ?></div>
                        <?php endif; ?>
                        <?php if($group['type'] == 'image'): ?>
                          <a
                          target="<?php echo e(isset($group['image']['link']['new_window']) && $group['image']['link']['new_window'] ? '_blank' : '_self'); ?>"
                          href="<?php echo e($group['image']['link'] ?: 'javascript:void(0)'); ?>"><img src="<?php echo e($group['image']['image']); ?>"
                              class="img-fluid"></a>
                        <?php else: ?>
                          <ul class="nav flex-column ul-children">
                            <?php $__currentLoopData = $group['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if(!is_array($children['link']['text']) && $children['link']['text']): ?>
                                <li class="nav-item">
                                  <a
                                  target="<?php echo e(isset($children['link']['new_window']) && $children['link']['new_window'] ? '_blank' : '_self'); ?>"
                                  class="nav-link px-0"
                                    href="<?php echo e($children['link']['link'] ?: 'javascript:void(0)'); ?>"><?php echo e($children['link']['text']); ?></a>
                                </li>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                        <?php endif; ?>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </li>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("header.menu.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
</ul>

<style>
  header .header-content .nav-item:hover>a {
    color: black;
}
</style>
<?php /**PATH G:\workspace\new\themes\default/shared/menu-pc.blade.php ENDPATH**/ ?>