<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <link href="<?php echo e(mix('/build/beike/admin/css/bootstrap.css')); ?>" rel="stylesheet">
  
  <link href="<?php echo e(mix('build/beike/admin/css/app.css')); ?>" rel="stylesheet">
  <title><?php echo e(__('admin/login.plugins_index')); ?></title>
</head>
<body class="page-login">
  <div class="d-flex align-items-center vh-100 pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
      <div class="card">
        <div class="w-480">
          <div class="card-header mt-3 mb-4">
            <h4 class="fw-bold"><?php echo e(__('admin/login.plugins_index')); ?></h4>
            
          </div>

          <div class="card-body">
            <form action="<?php echo e(admin_route('login.store')); ?>" method="post">
              <?php echo csrf_field(); ?>

              <div class="form-floating mb-4">
                <input type="text" name="email" class="form-control" id="email-input" value="<?php echo e(old('email', $admin_email ?? '')); ?>" placeholder="<?php echo e(__('common.email')); ?>">
                <label for="email-input"><?php echo e(__('common.email')); ?></label>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <?php if (isset($component)) { $__componentOriginal747bb290534d6a7a945c0c3f6c697441 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal747bb290534d6a7a945c0c3f6c697441 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.error','data' => ['message' => $message]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($message)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal747bb290534d6a7a945c0c3f6c697441)): ?>
<?php $attributes = $__attributesOriginal747bb290534d6a7a945c0c3f6c697441; ?>
<?php unset($__attributesOriginal747bb290534d6a7a945c0c3f6c697441); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal747bb290534d6a7a945c0c3f6c697441)): ?>
<?php $component = $__componentOriginal747bb290534d6a7a945c0c3f6c697441; ?>
<?php unset($__componentOriginal747bb290534d6a7a945c0c3f6c697441); ?>
<?php endif; ?>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <div class="form-floating mb-5">
                <input type="password" name="password" class="form-control" id="password-input" value="<?php echo e(old('password', $admin_password ?? '')); ?>" placeholder="<?php echo e(__('shop/login.password')); ?>">
                <label for="password-input"><?php echo e(__('shop/login.password')); ?></label>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <?php if (isset($component)) { $__componentOriginal747bb290534d6a7a945c0c3f6c697441 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal747bb290534d6a7a945c0c3f6c697441 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.error','data' => ['message' => $message]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($message)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal747bb290534d6a7a945c0c3f6c697441)): ?>
<?php $attributes = $__attributesOriginal747bb290534d6a7a945c0c3f6c697441; ?>
<?php unset($__attributesOriginal747bb290534d6a7a945c0c3f6c697441); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal747bb290534d6a7a945c0c3f6c697441)): ?>
<?php $component = $__componentOriginal747bb290534d6a7a945c0c3f6c697441; ?>
<?php unset($__componentOriginal747bb290534d6a7a945c0c3f6c697441); ?>
<?php endif; ?>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <?php if(session('error')): ?>
                <div class="alert alert-danger">
                  <?php echo e(session('error')); ?>

                </div>
              <?php endif; ?>

              <div class="d-grid mb-4"><button type="submit" class="btn btn-lg btn-primary"><?php echo e(__('admin/login.log_in')); ?></button></div>
              <a href="<?php echo e(admin_route('forgotten.index')); ?>" class="text-muted"><i class="bi bi-question-circle"></i> Quên mật khẩu</a>
            </form>
          </div>
        </div>
      </div>





    </div>
  </div>
</body>
</html>
<?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/login/login.blade.php ENDPATH**/ ?>