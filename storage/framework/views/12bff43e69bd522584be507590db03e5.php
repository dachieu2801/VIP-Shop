

<?php $__env->startSection('title', __('admin/setting.index')); ?>

<?php $__env->startSection('page-bottom-btns'); ?>
  <button type="button" class="btn btn-lg w-min-100 btn-primary submit-form" form="app"><?php echo e(__('common.save')); ?></button>
  <button class="btn btn-lg btn-default w-min-100 ms-3" onclick="bk.back()"><?php echo e(__('common.return')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/cropper/cropper.min.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/cropper/cropper.min.css')); ?>">
  <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <div id="plugins-app-form" class="card h-min-600">
    <div class="card-body">
      <form action="<?php echo e(admin_route('settings.store')); ?>" class="needs-validation" novalidate method="POST" id="app" v-cloak>
        <?php echo csrf_field(); ?>
        <?php if(session('success')): ?>
          <?php if (isset($component)) { $__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Alert::resolve(['type' => 'success','msg' => ''.e(session('success')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Alert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8)): ?>
<?php $attributes = $__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8; ?>
<?php unset($__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8)): ?>
<?php $component = $__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8; ?>
<?php unset($__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8); ?>
<?php endif; ?>
        <?php endif; ?>
        <?php if(session('error')): ?>
          <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

          </div>
        <?php endif; ?>
        <ul class="nav nav-tabs nav-bordered mb-5" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" data-bs-toggle="tab" href="#tab-general"><?php echo e(__('admin/setting.basic_settings')); ?></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-store"><?php echo e(__('admin/setting.store_settings')); ?></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-checkout"><?php echo e(__('admin/setting.checkout_settings')); ?></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-image"><?php echo e(__('admin/setting.picture_settings')); ?></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-express-company"><?php echo e(__('order.express_company')); ?></a>
          </li>
          <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-shop-address"> Địa chỉ cửa hàng </a>
                </li>



           <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.nav.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
        </ul>

        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab-general">
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.general.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'meta_title','title' => ''.e(__('admin/setting.meta_title')).'','value' => ''.e(old('meta_title', system_setting('base.meta_title', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal40654600a7b895811c24f44ff1ca6373 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40654600a7b895811c24f44ff1ca6373 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Textarea::resolve(['name' => 'meta_description','title' => ''.e(__('admin/setting.meta_description')).'','value' => ''.e(old('meta_description', system_setting('base.meta_description', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40654600a7b895811c24f44ff1ca6373)): ?>
<?php $attributes = $__attributesOriginal40654600a7b895811c24f44ff1ca6373; ?>
<?php unset($__attributesOriginal40654600a7b895811c24f44ff1ca6373); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40654600a7b895811c24f44ff1ca6373)): ?>
<?php $component = $__componentOriginal40654600a7b895811c24f44ff1ca6373; ?>
<?php unset($__componentOriginal40654600a7b895811c24f44ff1ca6373); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal40654600a7b895811c24f44ff1ca6373 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40654600a7b895811c24f44ff1ca6373 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Textarea::resolve(['name' => 'meta_keywords','title' => ''.e(__('admin/setting.meta_keywords')).'','value' => ''.e(old('meta_keywords', system_setting('base.meta_keywords', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40654600a7b895811c24f44ff1ca6373)): ?>
<?php $attributes = $__attributesOriginal40654600a7b895811c24f44ff1ca6373; ?>
<?php unset($__attributesOriginal40654600a7b895811c24f44ff1ca6373); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40654600a7b895811c24f44ff1ca6373)): ?>
<?php $component = $__componentOriginal40654600a7b895811c24f44ff1ca6373; ?>
<?php unset($__componentOriginal40654600a7b895811c24f44ff1ca6373); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'telephone','title' => ''.e(__('admin/setting.telephone')).'','value' => ''.e(old('telephone', system_setting('base.telephone', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'email','title' => ''.e(__('admin/setting.email')).'','value' => ''.e(old('email', system_setting('base.email', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
            <!--  -->
            <!-- <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('admin/setting.license_code')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('admin/setting.license_code')).'']); ?>
              <div class="input-group wp-400">
                <input type="text" class="form-control text-uppercase bg-light" name="license_code" placeholder="<?php echo e(__('admin/setting.license_code')); ?>" value="<?php echo e(old('license_code', system_setting('base.license_code', ''))); ?>" readonly="readonly">
                <button class="btn btn-outline-primary get-license-code" type="button"><?php echo e(__('admin/setting.license_code_get')); ?></button>
              </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?> -->
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.general.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
          </div>

          <div class="tab-pane fade" id="tab-store">
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.store.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('admin/setting.default_address')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('admin/setting.default_address')).'']); ?>
              <div class="d-lg-flex">
                <div>
                  <select class="form-select wp-200 me-3" name="country_id" aria-label="Default select example">
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option
                        value="<?php echo e($country->id); ?>"
                        <?php echo e($country->id == system_setting('base.country_id', '1') ? 'selected': ''); ?>>
                        <?php echo e($country->name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.default_country_set')); ?></div>
                </div>
                <div>
                  <select class="form-select wp-200 zones-select" name="zone_id" aria-label="Default select example"></select>
                  <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.default_zone_set')); ?></div>
                </div>
              </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginaleff91ade87f65c4b8fb64ccedab31269 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Select::resolve(['title' => ''.e(__('admin/setting.default_currency')).'','name' => 'currency','value' => old('currency', system_setting('base.currency', 'USD')),'options' => $currencies->toArray(),'key' => 'code','label' => 'name'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.default_currency')); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleff91ade87f65c4b8fb64ccedab31269)): ?>
<?php $attributes = $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269; ?>
<?php unset($__attributesOriginaleff91ade87f65c4b8fb64ccedab31269); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleff91ade87f65c4b8fb64ccedab31269)): ?>
<?php $component = $__componentOriginaleff91ade87f65c4b8fb64ccedab31269; ?>
<?php unset($__componentOriginaleff91ade87f65c4b8fb64ccedab31269); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginaleff91ade87f65c4b8fb64ccedab31269 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Select::resolve(['title' => ''.e(__('admin/setting.default_language')).'','name' => 'locale','value' => old('locale', system_setting('base.locale', 'zh_cn')),'options' => $languages,'key' => 'code','label' => 'name'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.default_language')); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleff91ade87f65c4b8fb64ccedab31269)): ?>
<?php $attributes = $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269; ?>
<?php unset($__attributesOriginaleff91ade87f65c4b8fb64ccedab31269); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleff91ade87f65c4b8fb64ccedab31269)): ?>
<?php $component = $__componentOriginaleff91ade87f65c4b8fb64ccedab31269; ?>
<?php unset($__componentOriginaleff91ade87f65c4b8fb64ccedab31269); ?>
<?php endif; ?>

            <?php
              $weights = [['code'=>'kg','name'=>'kg'], ['code'=>'g','name'=>'g'], ['code'=>'oz','name'=>'oz'], ['code'=>'lb','name'=>'lb']];
            ?>
            <?php if (isset($component)) { $__componentOriginaleff91ade87f65c4b8fb64ccedab31269 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Select::resolve(['title' => ''.e(__('admin/setting.weight_unit')).'','name' => 'weight','value' => old('weight', system_setting('base.weight', 'kg')),'options' => $weights,'key' => 'code','label' => 'name'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.weight_unit')); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleff91ade87f65c4b8fb64ccedab31269)): ?>
<?php $attributes = $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269; ?>
<?php unset($__attributesOriginaleff91ade87f65c4b8fb64ccedab31269); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleff91ade87f65c4b8fb64ccedab31269)): ?>
<?php $component = $__componentOriginaleff91ade87f65c4b8fb64ccedab31269; ?>
<?php unset($__componentOriginaleff91ade87f65c4b8fb64ccedab31269); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginaleff91ade87f65c4b8fb64ccedab31269 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Select::resolve(['title' => ''.e(__('admin/setting.default_customer_group')).'','name' => 'default_customer_group_id','value' => old('locale', system_setting('base.default_customer_group_id', '')),'options' => $customer_groups,'key' => 'id','label' => 'name'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.default_customer_group')); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleff91ade87f65c4b8fb64ccedab31269)): ?>
<?php $attributes = $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269; ?>
<?php unset($__attributesOriginaleff91ade87f65c4b8fb64ccedab31269); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleff91ade87f65c4b8fb64ccedab31269)): ?>
<?php $component = $__componentOriginaleff91ade87f65c4b8fb64ccedab31269; ?>
<?php unset($__componentOriginaleff91ade87f65c4b8fb64ccedab31269); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'admin_name','title' => ''.e(__('admin/setting.admin_name')).'','required' => true,'value' => ''.e(old('admin_name', system_setting('base.admin_name', 'admin'))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.admin_name_info')); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'product_per_page','title' => ''.e(__('admin/setting.product_per_page')).'','required' => true,'value' => ''.e(old('product_per_page', system_setting('base.product_per_page', 20))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'cdn_url','title' => ''.e(__('admin/setting.cdn_url')).'','value' => ''.e(old('cdn_url', system_setting('base.cdn_url', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal40654600a7b895811c24f44ff1ca6373 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40654600a7b895811c24f44ff1ca6373 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Textarea::resolve(['name' => 'head_code','title' => ''.e(__('admin/setting.head_code')).'','value' => ''.old('head_code', system_setting('base.head_code', '')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.head_code_info')); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40654600a7b895811c24f44ff1ca6373)): ?>
<?php $attributes = $__attributesOriginal40654600a7b895811c24f44ff1ca6373; ?>
<?php unset($__attributesOriginal40654600a7b895811c24f44ff1ca6373); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40654600a7b895811c24f44ff1ca6373)): ?>
<?php $component = $__componentOriginal40654600a7b895811c24f44ff1ca6373; ?>
<?php unset($__componentOriginal40654600a7b895811c24f44ff1ca6373); ?>
<?php endif; ?>

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.store.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

          </div>

          <div class="tab-pane fade" id="tab-image">

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.image.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => 'Logo']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Logo']); ?>
              <div class="open-crop cursor-pointer bg-light wh-80 border d-flex justify-content-center align-items-center me-2 mb-2 position-relative" ratio="380/100">
                <img src="<?php echo e(image_resize(old('logo', system_setting('base.logo', '')))); ?>" class="img-fluid">
              </div>
              <input type="hidden" value="<?php echo e(old('logo', system_setting('base.logo', ''))); ?>" name="logo">
              <div class="help-text font-size-12 lh-base"><?php echo e(__('common.recommend_size')); ?> 380*100</div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => 'favicon']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'favicon']); ?>
              <div class="open-crop cursor-pointer bg-light wh-80 border d-flex justify-content-center align-items-center me-2 mb-2 position-relative" ratio="32/32">
                <img src="<?php echo e(image_resize(old('favicon', system_setting('base.favicon', '')))); ?>" class="img-fluid">
              </div>
              <input type="hidden" value="<?php echo e(old('favicon', system_setting('base.favicon', ''))); ?>" name="favicon">
              <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.favicon_info')); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => __('admin/setting.placeholder_image')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('admin/setting.placeholder_image'))]); ?>
              <div class="open-crop cursor-pointer bg-light wh-80 border d-flex justify-content-center align-items-center me-2 mb-2 position-relative" ratio="500/500">
                <img src="<?php echo e(image_resize(old('placeholder', system_setting('base.placeholder', '')))); ?>" class="img-fluid">
              </div>
              <input type="hidden" value="<?php echo e(old('placeholder', system_setting('base.placeholder', ''))); ?>" name="placeholder">
              <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.placeholder_image_info')); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.image.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
          </div>

          <div class="tab-pane fade" id="tab-express-company">
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.express.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('order.express_company')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('order.express_company')).'']); ?>
              <table class="table table-bordered w-max-600">
                <thead>
                  <th><?php echo e(__('order.express_company')); ?></th>
                  <th>Code</th>
                   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.express.table.thead.th",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                  <th></th>
                </thead>
                <tbody>
                  <tr v-for="item, index in express_company" :key="index">
                    <td>
                      <input required placeholder="<?php echo e(__('order.express_company')); ?>" type="text" :name="'express_company['+ index +'][name]'" v-model="item.name" class="form-control">
                      <div class="invalid-feedback"><?php echo e(__('common.error_required', ['name' => __('order.express_company')])); ?></div>
                    </td>
                    <td>
                      <input required placeholder="<?php echo e(__('admin/setting.express_code_help')); ?>" type="text" :name="'express_company['+ index +'][code]'" v-model="item.code" class="form-control">
                      <div class="invalid-feedback"><?php echo e(__('common.error_required', ['name' => 'Code'])); ?></div>
                    </td>
                     <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.express.table.tbody.td",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                    <td><i @click="express_company.splice(index, 1)" class="bi bi-x-circle fs-4 text-danger cursor-pointer"></i></td>
                  </tr>
                  <tr>
                    <td colspan="2"><input v-if="!express_company.length" name="express_company" class="d-none"></td>
                    <td><i class="bi bi-plus-circle cursor-pointer fs-4" @click="addCompany"></i></td>
                  </tr>
                </tbody>
              </table>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.express.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
          </div>

          <div class="tab-pane fade" id="tab-shop-address">
                     <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.express.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                    <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('order.express_company')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('order.express_company')).'']); ?>
                        <table class="table table-bordered w-max-900">
                            <thead>
                                <th>Tên nhà hàng</th>
                                <th>Địa chỉ</th>
                                <th>Link bản đồ</th>
                                 <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.express.table.thead.th",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                                <th>Giờ làm việc</th>
                            </thead>
                            <tbody>
                            <tr v-for="(item, index) in store_address" :key="index">
  <td>
    <input required placeholder="Tên nhà hàng" type="text" :name="'store_address['+ index +'][name]'" v-model="item.name" class="form-control timepicker">
    <div class="invalid-feedback"><?php echo e(__('common.error_required', ['name' => __('order.store_address')])); ?></div>
  </td>
  <td>
    <input required placeholder="Địa chỉ" type="text" :name="'store_address['+ index +'][address]'" v-model="item.address" class="form-control timepicker">
    <div class="invalid-feedback"><?php echo e(__('common.error_required', ['name' => __('order.store_address')])); ?></div>
  </td>
  <td>
    <input required placeholder="Link bản đồ" type="text" :name="'store_address['+ index +'][link_map]'" v-model="item.link_map" class="form-control timepicker">
    <div class="invalid-feedback"><?php echo e(__('common.error_required', ['name' => 'Code'])); ?></div>
  </td>
  <td class="d-flex flex-column gap-1">

  <div v-for="(time, workingTimeIndex) in item.time_working" :key="workingTimeIndex" class="d-flex gap-2 align-items-center">
    <input type="text" class="form-control" placeholder="Giờ mở cửa"
           :name="'store_address['+ index +'][time_working]['+ workingTimeIndex +'][time_start]'"
           :data-time-index="index"
           v-model="time.time_start">
    -
    <input type="text" class="form-control" placeholder="Giờ đóng cửa"
           :name="'store_address['+ index +'][time_working]['+ workingTimeIndex +'][time_end]'"
           :data-time-index="index"
           v-model="time.time_end">
    <i @click="removeWorkingTime(index, workingTimeIndex)" class="bi bi-x-circle fs-4 text-danger cursor-pointer"></i>
  </div>
 
</div>

 
</div>
    <div class="text-center">
      <i @click="addWorkingTime(index)" class="bi bi-plus-circle cursor-pointer fs-4"></i>
    </div>
  </td>
</tr>


                                <tr>
                                    <td colspan="1"><input v-if="!express_company.length" name="express_company"
                                            class="d-none"></td>
                                    <td class="text-center"><i class="bi bi-plus-circle cursor-pointer fs-4"
                                            @click="addStoreAddress"></i></td>
                                </tr>

                            </tbody>
                        </table>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
                     <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.express.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                </div>

          <div class="tab-pane fade" id="tab-mail">

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.mail.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

            <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['name' => 'use_queue','title' => ''.e(__('admin/setting.use_queue')).'','value' => ''.e(old('use_queue', system_setting('base.use_queue', '0'))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\SwitchRadio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $attributes = $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $component = $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('admin/setting.mail_engine')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('admin/setting.mail_engine')).'']); ?>
              <select name="mail_engine" v-model="mail_engine" class="form-select wp-200 me-3">
                <option :value="item.code" v-for="item, index in source.mailEngines" :key="index">{{ item.name }}</option>
              </select>
              <div v-if="mail_engine == 'log'" class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.mail_log')); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>

            <div v-if="mail_engine == 'smtp'">
              <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'smtp[host]','required' => true,'title' => ''.e(__('admin/setting.smtp_host')).'','value' => ''.e(old('host', system_setting('base.smtp.host', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
              <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'smtp[username]','required' => true,'title' => ''.e(__('admin/setting.smtp_username')).'','value' => ''.e(old('username', system_setting('base.smtp.username', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
              <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'smtp[password]','required' => true,'title' => ''.e(__('admin/setting.smtp_password')).'','value' => ''.e(old('password', system_setting('base.smtp.password', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.smtp_password_info')); ?></div>
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
              <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'smtp[encryption]','required' => true,'title' => ''.e(__('admin/setting.smtp_encryption')).'','value' => ''.e(old('encryption', system_setting('base.smtp.encryption', 'TLS'))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.smtp_encryption_info')); ?></div>
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
              <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'smtp[port]','required' => true,'title' => ''.e(__('admin/setting.smtp_port')).'','value' => ''.e(old('port', system_setting('base.smtp.port', '465'))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
              <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'smtp[timeout]','required' => true,'title' => ''.e(__('admin/setting.smtp_timeout')).'','value' => ''.e(old('timeout', system_setting('base.smtp.timeout', '5'))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
            </div>

            <div v-if="mail_engine == 'sendmail'">
              <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'sendmail[path]','placeholder' => 222,'required' => true,'title' => ''.e(__('admin/setting.sendmail_path')).'','value' => ''.e(old('path', system_setting('base.sendmail.path', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="help-text font-size-12 lh-base">系统 sendmail 执行路径, 一般为 /usr/sbin/sendmail -bs</div>
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
            </div>

            <div v-if="mail_engine == 'mailgun'">
              <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'mailgun[domain]','required' => true,'title' => ''.e(__('admin/setting.mailgun_domain')).'','value' => ''.e(old('domain', system_setting('base.mailgun.domain', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
              <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'mailgun[secret]','required' => true,'title' => ''.e(__('admin/setting.mailgun_secret')).'','value' => ''.e(old('secret', system_setting('base.mailgun.secret', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
              <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'mailgun[endpoint]','required' => true,'title' => ''.e(__('admin/setting.mailgun_endpoint')).'','value' => ''.e(old('endpoint', system_setting('base.mailgun.endpoint', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
            </div>

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.mail.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

          </div>

          <div class="tab-pane fade" id="tab-checkout">
            <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['name' => 'show_price_after_login','title' => ''.e(__('admin/setting.show_price_after_login')).'','value' => ''.e(old('show_price_after_login', system_setting('base.show_price_after_login', '0'))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\SwitchRadio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <div class="help-text font-size-12 lh-base show-price-error-text"><?php echo e(__('admin/setting.show_price_after_login_tips')); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $attributes = $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $component = $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['name' => 'guest_checkout','title' => ''.e(__('admin/setting.guest_checkout')).'','value' => ''.e(old('guest_checkout', system_setting('base.guest_checkout', '1'))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\SwitchRadio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $attributes = $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $component = $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['name' => 'customer_approved','title' => ''.e(__('admin/setting.customer_approved')).'','value' => ''.e(old('customer_approved', system_setting('base.customer_approved', '0'))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\SwitchRadio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $attributes = $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $component = $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>
            
            
           

            <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['name' => 'tax','title' => ''.e(__('admin/setting.enable_tax')).'','value' => ''.e(old('tax', system_setting('base.tax', '0'))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\SwitchRadio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.enable_tax_info')); ?></div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $attributes = $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $component = $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>

            
           

            <?php if (isset($component)) { $__componentOriginaleff91ade87f65c4b8fb64ccedab31269 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Select::resolve(['title' => ''.e(__('admin/setting.tax_address')).'','name' => 'tax_address','value' => old('tax_address', system_setting('base.tax_address', 'shipping')),'options' => $tax_address] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleff91ade87f65c4b8fb64ccedab31269)): ?>
<?php $attributes = $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269; ?>
<?php unset($__attributesOriginaleff91ade87f65c4b8fb64ccedab31269); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleff91ade87f65c4b8fb64ccedab31269)): ?>
<?php $component = $__componentOriginaleff91ade87f65c4b8fb64ccedab31269; ?>
<?php unset($__componentOriginaleff91ade87f65c4b8fb64ccedab31269); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'rate_api_key','title' => ''.e(__('admin/setting.rate_api_key')).'','value' => ''.e(old('rate_api_key', system_setting('base.rate_api_key', ''))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <div class="help-text font-size-12 lh-base">
                <a class="text-secondary" href="https://www.exchangerate-api.com/" target="_blank">www.exchangerate-api.com</a>
              </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $attributes = $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__attributesOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b)): ?>
<?php $component = $__componentOriginal9779c7c6189b71f1c04f0551cbef988b; ?>
<?php unset($__componentOriginal9779c7c6189b71f1c04f0551cbef988b); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => __('admin/setting.order_auto_cancel')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('admin/setting.order_auto_cancel'))]); ?>
              <div class="input-group wp-400">
                <input type="number" value="<?php echo e(old('order_auto_cancel', system_setting('base.order_auto_cancel', ''))); ?>" name="order_auto_cancel" class="form-control" placeholder="<?php echo e(__('admin/setting.order_auto_cancel')); ?>">
                <span class="input-group-text"><?php echo e(__('common.text_hour')); ?></span>
              </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => __('admin/setting.order_auto_complete')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('admin/setting.order_auto_complete'))]); ?>
              <div class="input-group wp-400">
                <input type="number" value="<?php echo e(old('order_auto_complete', system_setting('base.order_auto_complete', ''))); ?>" name="order_auto_complete" class="form-control" placeholder="<?php echo e(__('admin/setting.order_auto_complete')); ?>">
                <span class="input-group-text"><?php echo e(__('common.text_hour')); ?></span>
              </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>

            <div class="w-auto p-2 my-2">
              <h3 class="font-bold text-primary">Phương thức nhận hàng</h3>
                <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['name' => 'store_address_status','title' => 'Lấy hàng tại cửa hàng','value' => ''.e(old('store_address_status', system_setting('base.store_address_status', '0'))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\SwitchRadio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $attributes = $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $component = $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['name' => 'address_status','title' => 'Ship hàng tận nơi','value' => ''.e(old('address_status', system_setting('base.address_status', '0'))).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\SwitchRadio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                  <div class="help-text font-size-12 lh-base">Lưu ý : Vui lòng không vô hiệu hóa cả 2 phương thức nhận hàng</div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $attributes = $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0)): ?>
<?php $component = $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0; ?>
<?php unset($__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0); ?>
<?php endif; ?>
            </div>
          </div>

           <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.setting.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
        </div>

        <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => '']); ?>
          <button type="submit" class="btn btn-primary d-none mt-4"><?php echo e(__('common.submit')); ?></button>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $attributes = $__attributesOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__attributesOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b48936358e72618543915217d3ed939)): ?>
<?php $component = $__componentOriginal1b48936358e72618543915217d3ed939; ?>
<?php unset($__componentOriginal1b48936358e72618543915217d3ed939); ?>
<?php endif; ?>
      </form>
    </div>
  </div>

  <div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="d-flex align-items-center">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('shop/account/edit.crop')); ?></h5>
            <div class="cropper-size ms-4"><?php echo e(__('common.cropper_size')); ?>：<span></span></div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="img-container">
            <img id="cropper-image" src="<?php echo e(image_resize('/')); ?>" class="img-fluid">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('shop/common.cancel')); ?></button>
          <button type="button" class="btn btn-primary cropper-crop"><?php echo e(__('shop/common.confirm')); ?></button>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    <?php if(session('success')): ?>
      layer.msg('<?php echo e(session('success')); ?>')
    <?php endif; ?>

    const country_id = <?php echo e(system_setting('base.country_id', '1')); ?>;
    const zone_id = <?php echo e(system_setting('base.zone_id', '1') ?: 1); ?>;

    // 获取省份
    const getZones = (country_id) => {
      $http.get(`countries/${country_id}/zones`, null, {hload: true}).then((res) => {
        if (res.data.zones.length > 0) {
          $('select[name="zone_id"]').html('');
          res.data.zones.forEach((zone) => {
            $('select[name="zone_id"]').append(`
              <option ${zone_id == zone.id ? 'selected' : ''} value="${zone.id}">${zone.name}</option>
            `);
          });
        } else {
          $('select[name="zone_id"]').html(`
            <option value=""><?php echo e(__('common.please_choose')); ?></option>
          `);
        }
      })
    }

    $(function() {
      const line = bk.getQueryString('line');
      getZones(country_id);

      $('select[name="country_id"]').on('change', function () {
        getZones($(this).val());
      });

      if (line) {
        $(`textarea[name="${line}"], select[name="${line}"], input[name="${line}"]`).parents('.row').addClass('active-line');

        setTimeout(() => {
          $('div').removeClass('active-line');
        }, 1200);
      }

      
      
      
      
      
      
      
      
      
      
      
      

      
      

      
      
      
    });

  </script>

  <script>
    let ratio = 1;
    let $crop = null
    var cropper;

    $(function() {
      $('.open-crop').click(function() {
        var image = document.getElementById('cropper-image');
        $crop = $(this);
        ratio = $(this).attr('ratio')
        var cropper;
        var $input = $('<input type="file" accept="image/*" class="d-none">');
        $input.click();
        $input.change(function() {
          var files = this.files;
          var done = function(url) {
            image.src = url;
            $('#modal').modal('show');
          };

          if (files && files.length > 0) {
            var reader = new FileReader();
            reader.onload = function(e) {
              done(reader.result);
            };
            reader.readAsDataURL(files[0]);
          }
        });
      });

      $('input[name="show_price_after_login"]').change(function () {
        if ($(this).val() == 1 && $('input[name="guest_checkout"]').prop('checked') == true) {
          $('input[name="guest_checkout"]').prop('checked', true);
          $('.show-price-error-text').addClass('text-danger fw-bold');
          setTimeout(() => {
            $('.show-price-error-text').removeClass('text-danger fw-bold');
          }, 1200);
        }
      });

      $('input[name="guest_checkout"]').change(function () {
        if ($(this).val() == 1 && $('input[name="show_price_after_login"]').prop('checked') == true) {
          $('input[name="show_price_after_login"]').prop('checked', 1);
          $('.show-price-error-text').addClass('text-danger fw-bold');
          setTimeout(() => {
            $('.show-price-error-text').removeClass('text-danger fw-bold');
          }, 1200);
        }
      });
    });

    $('#modal').on('shown.bs.modal', function() {
      var image = document.getElementById('cropper-image');
      cropper = new Cropper(image, {
        initialAspectRatio: ratio.split('/')[0] / ratio.split('/')[1],
        autoCropArea: 1,
        viewMode: 1,
        // 回调 获取尺寸
        crop: function(event) {
          $('.cropper-size span').html(parseInt(event.detail.width) + ' * ' + parseInt(event.detail.height))
        }
      });
    }).on('hidden.bs.modal', function() {
      cropper.destroy();
      cropper = null;
    });

    $('.cropper-crop').click(function(event) {
      var canvas;

      $('#modal').modal('hide');

      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          imageSmoothingQuality: 'high',
        });
        canvas.toBlob(function(blob) {
          var formData = new FormData();

          formData.append('file', blob, 'avatar.png');
          formData.append('type', 'avatar');
          $http.post('<?php echo e(shop_route('file.store')); ?>', formData).then(res => {
            $crop.find('img').attr('src', res.data.url);
            $crop.next('input').val(res.data.value);
          })
        });
      }
    });
  </script>

  <script>
let app = new Vue({
  el: '#app',
  data: {
    mail_engine: <?php echo json_encode(old('mail_engine', system_setting('base.mail_engine', ''))) ?>,
    express_company: <?php echo json_encode(old('express_company', system_setting('base.express_company', []))) ?>,
    store_address: <?php echo json_encode(old('store_address', system_setting('base.store_address', []))) ?>,
    flatpickrInstances: [], // To store flatpickr instances
    source: {
      mailEngines: [
        { name: '<?php echo e(__('admin/builder.text_no')); ?>', code: '' },
        { name: 'SMTP', code: 'smtp' },
        { name: 'Sendmail', code: 'sendmail' },
        { name: 'Mailgun', code: 'mailgun' },
        { name: 'Log', code: 'log' }
      ]
    }
  },
  methods: {
    addCompany() {
      if (typeof this.express_company === 'string') {
        this.express_company = [];
      }
      this.express_company.push({ name: '', code: '' });
    },
    addStoreAddress() {
      if (typeof this.store_address === 'string') {
        this.store_address = [];
      }
      this.store_address.push({ address: '', link_map: '', time_working: [] });
    },
    addWorkingTime(index) {
      let newWorkingTime = {
        time_start: '',
        time_end: ''
      };

      if (!Array.isArray(this.store_address[index].time_working)) {
        this.$set(this.store_address[index], 'time_working', []);
      }

      this.store_address[index].time_working.push(newWorkingTime);

      this.$nextTick(() => {
        this.initializeFlatpickrForIndex(index);
      });
    },
    removeWorkingTime(storeIndex, timeIndex) {
      this.store_address[storeIndex].time_working.splice(timeIndex, 1);

      if (this.store_address[storeIndex].time_working.length === 0) {
        this.store_address[storeIndex].time_working.push({
          time_start: '',
          time_end: ''
        });
      }

      this.$nextTick(() => {
        this.initializeFlatpickrForIndex(storeIndex);
      });
    },
    initializeFlatpickrForIndex(storeIndex) {
      if (this.flatpickrInstances[storeIndex]) {
        this.flatpickrInstances[storeIndex].forEach(instance => instance.destroy());
      }

      this.flatpickrInstances[storeIndex] = [];

      const timeInputs = document.querySelectorAll(`[data-time-index="${storeIndex}"]`);
      timeInputs.forEach(input => {
        const flatpickrInstance = flatpickr(input, {
          enableTime: true,
          noCalendar: true,
          dateFormat: "H:i",
          time_24hr: true
        });

        this.flatpickrInstances[storeIndex].push(flatpickrInstance);
      });
    }
  },
  mounted() {
    this.store_address.forEach((_, index) => {
      this.initializeFlatpickrForIndex(index);
    });
  }
});
</script>






<?php $__env->stopPush(); ?>




<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/setting.blade.php ENDPATH**/ ?>