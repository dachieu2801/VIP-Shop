
<?php $__env->startSection('body-class', 'page-home'); ?>
<?php $__env->startSection('content'); ?>

<div class="modules-box mt-4" id="home-modules-box">
   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("home.modules.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

  <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make($module['view_path'], $module, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("home.modules.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

</div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\themes\default/home.blade.php ENDPATH**/ ?>