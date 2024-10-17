

<?php $__env->startSection('title', __('admin/product.products_show')); ?>

<?php $__env->startSection('body-class', 'page-product-form'); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/vue/Sortable.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/vue/vuedraggable.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/tinymce/5.9.1/tinymce.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('page-bottom-btns'); ?>
  <button type="button" class="btn w-min-100 btn-lg btn-primary submit-form-edit"><?php echo e($product->id ? __('common.save') : __('common.save_new')); ?></button>
  <button type="button" class="btn w-min-100 btn-lg btn-default submit-form ms-2"><?php echo e(__('common.save_return')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session()->has('success')): ?>
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
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div><?php echo e($error); ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>

  <ul class="nav nav-tabs nav-bordered mb-3" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-basic" type="button" ><?php echo e(__('admin/product.basic_information')); ?></button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-descriptions" type="button"><?php echo e(__('admin/product.product_details')); ?></button>
    </li>
    <!-- <li class="nav-item" role="presentation">
      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-attribute" type="button"><?php echo e(__('admin/attribute.index')); ?></button>
    </li> -->
    <!-- <li class="nav-item" role="presentation">
      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-seo" type="button" >SEO</button>
    </li> -->
    <li class="nav-item" role="presentation">
      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-relations" type="button"><?php echo e(__('admin/product.product_relations')); ?></button>
    </li>
  </ul>

  <div class="card">
    <div class="card-body h-min-600">
      <form novalidate class="needs-validation" action="<?php echo e($product->id ? admin_route('products.update', $product) : admin_route('products.store')); ?>"
        method="POST" id="app">
        <?php echo csrf_field(); ?>
        <?php echo method_field($product->id ? 'PUT' : 'POST'); ?>
        <input type="hidden" name="_redirect" value="<?php echo e($_redirect); ?>" />

        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab-basic">
            <h6 class="border-bottom pb-3 mb-4"><?php echo e(__('common.data')); ?></h6>
            <?php if (isset($component)) { $__componentOriginala681672db39a7b0a9f0cb6f3c0615226 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala681672db39a7b0a9f0cb6f3c0615226 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\InputLocale::resolve(['width' => 600,'name' => 'descriptions.*.name','title' => ''.e(__('common.name')).'','value' => $descriptions,'required' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input-locale'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\InputLocale::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala681672db39a7b0a9f0cb6f3c0615226)): ?>
<?php $attributes = $__attributesOriginala681672db39a7b0a9f0cb6f3c0615226; ?>
<?php unset($__attributesOriginala681672db39a7b0a9f0cb6f3c0615226); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala681672db39a7b0a9f0cb6f3c0615226)): ?>
<?php $component = $__componentOriginala681672db39a7b0a9f0cb6f3c0615226; ?>
<?php unset($__componentOriginala681672db39a7b0a9f0cb6f3c0615226); ?>
<?php endif; ?>
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.name.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('common.image')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('common.image')).'']); ?>
              <draggable
                element="div"
                ghost-class="dragabble-ghost"
                class="product-images d-flex flex-wrap"
                :list="form.images"
                :options="{animation: 200, handle: '.product-item'}"
                >
                <div v-for="image, index in form.images" :key="index" class="wh-80 rounded-2 product-item position-relative me-2 mb-2 border d-flex justify-content-center align-items-center max-h-100 overflow-hidden">
                  <div class="position-absolute top-0 end-0">
                    <button class="btn btn-danger btn-sm wh-20 p-0" @click="removeImages(index)" type="button"><i class="bi bi-trash"></i></button>
                  </div>
                  <img :src="thumbnail(image.startsWith('/') ? image.substring(1) : image)" class="img-fluid rounded-2">
                  <input type="hidden" name="images[]" :value="image">
                </div>
                <div v-if="!form.images.length" class="d-none"><input type="hidden" name="images[]" value=""></div>
                <div class="set-product-img wh-80 rounded-2" @click="addProductImages"><i class="bi bi-plus fs-1 text-muted"></i></div>
              </draggable>
              <div class="help-text mb-1 mt-1"><?php echo e(__('admin/product.image_help')); ?></div>
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

            <!-- <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('product.video')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('product.video')).'']); ?>
              <div class="wp-400 border">
                <div class="nav nav-tabs video-nav-tabs" role="tablist">
                  <button :class="['nav-link rounded-0', form.video.videoType == 'local' ? 'active' : '']" @click="videoTypeChange('local')" data-bs-toggle="tab" data-bs-target="#nav-v-local" type="button"><?php echo e(__('admin/product.video_local')); ?></button>
                  <button :class="['nav-link rounded-0', form.video.videoType == 'iframe' ? 'active' : '']" @click="videoTypeChange('iframe')" data-bs-toggle="tab" data-bs-target="#nav-v-iframe" type="button"><?php echo e(__('admin/product.iframe_code')); ?></button>
                  <button :class="['nav-link rounded-0', form.video.videoType == 'custom' ? 'active' : '']" @click="videoTypeChange('custom')" data-bs-toggle="tab" data-bs-target="#nav-v-custom" type="button"><?php echo e(__('admin/builder.text_custom')); ?></button>
                </div>

                <div class="tab-content p-3" id="nav-tabContent">
                  <div :class="['tab-pane fade ', form.video.videoType == 'local' ? 'show active' : '']" id="nav-v-local">
                    <div class="d-flex align-items-end">
                      <div class="set-product-img wh-80 rounded-2 me-2" @click="addProductVideo">
                        
                        <i v-if="form.video.url" class="bi bi-play-circle fs-1"></i>
                        <i v-else class="bi bi-plus fs-1 text-muted"></i>
                      </div>
                      <a v-if="form.video.url" target="_blank" :href="form.video.url"><?php echo e(__('common.view')); ?></a>
                      <span v-if="form.video.url" @click="deleteVideo" class="text-danger cursor-pointer ms-2"><?php echo e(__('common.delete')); ?></span>
                    </div>
                    <div class="help-text mt-1"><?php echo e(__('admin/product.video_help')); ?></div>
                  </div>
                  <div :class="['tab-pane fade', form.video.videoType == 'iframe' ? 'show active' : '']" id="nav-v-iframe">
                    <textarea class="form-control" rows="3" placeholder="<?php echo e(__('admin/product.iframe_code')); ?>" v-model="form.video.iframe"></textarea>
                    <div class="help-text mt-1"><?php echo e(__('admin/product.iframe_code_hint')); ?></div>
                  </div>
                  <div :class="['tab-pane fade', form.video.videoType == 'custom' ? 'show active' : '']" id="nav-v-custom">
                    <input class="form-control" placeholder="<?php echo e(__('admin/product.video_path')); ?>" v-model="form.video.custom">
                    <div class="help-text mt-1"><?php echo e(__('admin/product.video_path_hint')); ?></div>
                  </div>
                </div>

                <input type="hidden" name="video" :value="form.video.path">
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

            <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'position','title' => __('common.sort_order'),'value' => old('position', $product->position ?? '0')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

            <!-- <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => __('admin/product.weight_text')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('admin/product.weight_text'))]); ?>
              <div class="d-flex wp-400">
                <input type="text" name="weight" placeholder="<?php echo e(__('admin/product.weight_text')); ?>" value="<?php echo e(old('weight', $product->weight ?? '')); ?>" class="form-control" style="flex: 0 0 260px" />
                <select class="form-select ms-4 bg-white" name="weight_class">
                  <?php $__currentLoopData = $weight_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item); ?>" <?php echo e($product->weight_class == $item ? 'selected' : ''); ?>><?php echo e(__('product.' . $item)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
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
                    $__hook_name="admin.product.edit.brand";
                    ob_start();
                ?>
            <!-- <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => __('admin/brand.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('admin/brand.index'))]); ?>
              <input type="text" name="brand_name" value="<?php echo e(old('brand_name', $product->brand->name ?? '')); ?>" placeholder="<?php echo e(__('admin/builder.modules_keywords_search')); ?>" id="brand-autocomplete" class="form-control wp-400 " />
              <input type="hidden" name="brand_id" value="<?php echo e(old('brand_id', $product->brand_id ?? '')); ?>" />
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
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>
         
          <?php if($showTax): ?>
            <?php if (isset($component)) { $__componentOriginaleff91ade87f65c4b8fb64ccedab31269 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Select::resolve(['title' => __('admin/tax_class.index'),'name' => 'tax_class_id','value' => old('tax_class_id', $product->tax_class_id ?? ''),'options' => $tax_classes,'key' => 'id','label' => 'title'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
          <?php endif; ?>  
            <?php if (isset($component)) { $__componentOriginaleff91ade87f65c4b8fb64ccedab31269 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Select::resolve(['name' => 'shipping','title' => __('admin/common.shipping'),'value' => old('shipping', $product->shipping ?? 1),'options' => [['title' => __('common.yes'), 'id' => 1], ['title' => __('common.no'),'id' => 0]],'key' => 'id','label' => 'title'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

             <?php
                    $__hook_name="admin.product.edit.category";
                    ob_start();
                ?>
            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => __('admin/category.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('admin/category.index'))]); ?>
              <el-cascader
                :options="source.flattenCategories"
                size="small"
                ref="refCascader"
                placeholder="<?php echo e(__('admin/product.category_placeholder')); ?>"
                :class="['wp-400 category-cascader', !form.categories.length ? 'no-data' : '']"
                :props="{ label: 'name', value: 'id', children: 'children', checkStrictly: true}"
                @change="categoriesChange" filterable></el-cascader>
              <div class="wp-400 form-control category-data" v-if="categoryFormat.length">
                <div v-for="item, index in categoryFormat" :key="index" class="d-flex align-items-center">
                  <div class="me-2 cursor-pointer delete-icon" @click="form.categories.splice(index, 1)"><i class="bi bi-dash-circle"></i></div>
                  <div class="category-name">{{ item.name }}</div>
                  <input type="hidden" name="categories[]" :value="item.id">
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
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>

            <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['name' => 'active','title' => __('common.status'),'value' => old('active', $product->active ?? 1)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.edit.extra",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

            <div>
              <h5 class="border-bottom pb-3 mb-4"><?php echo e(__('admin/product.stocks')); ?></h5>

               <?php
                    $__hook_name="admin.product.edit.switch";
                    ob_start();
                ?>
              <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => __('admin/product.enable_multi_spec')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('admin/product.enable_multi_spec'))]); ?>
                <el-switch v-model="editing.isVariable" @change="isVariableChange" class="mt-2"></el-switch>
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
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>

              <input type="hidden" name="variables" :value="JSON.stringify(form.variables)">

              <div class="row g-3 mb-3" v-if="editing.isVariable">
                <label class="wp-200 col-form-label text-end"></label>
                <div class="col-auto wp-200-">
                  <div class="selectable-variants">
                    <div>
                      <draggable :list="source.variables" :options="{animation: 100}">
                        <div v-for="(variant, variantIndex) in source.variables" :id="'selectable-variant-' + variantIndex">
                          <div class="title">
                            <div>
                              <b>{{ variant.name[current_language_code] }}</b>
                              <el-link type="primary" @click="modalVariantOpenButtonClicked(variantIndex, null)"><?php echo e(__('common.edit')); ?></el-link>
                              <el-link type="danger" class="ms-2" @click="removeSourceVariant(variantIndex)"><?php echo e(__('common.delete')); ?></el-link>
                               <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.edit.source.variables.actions",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                            </div>
                            <div>
                              <el-checkbox v-model="variant.isImage" @change="(e) => {variantIsImage(e, variantIndex)}" border size="mini" class="me-2 bg-white"><?php echo e(__('admin/product.add_variable_image')); ?></el-checkbox>
                              <el-button type="primary" plain size="mini" @click="modalVariantOpenButtonClicked(variantIndex, -1)"><?php echo e(__('admin/product.add_variable_value')); ?></el-button>
                            </div>
                          </div>
                          <template v-if="variant.values.length">
                             <draggable
                               element="div"
                               @start="isMove = true"
                               class="variants-wrap"
                               @update="(e) => {swapSourceVariantValue(e, variantIndex)}"
                               @end="isMove = false"
                               ghost-class="dragabble-ghost"
                               :list="variant.values"
                               :options="{animation: 100}"
                               >
                               <div v-for="(value, value_index) in variant.values" :key="value_index" class="variants-item" @dblclick="modalVariantOpenButtonClicked(variantIndex, value_index)">
                                 <div class="open-file-manager variant-value-img" v-if="variant.isImage">
                                   <div>
                                     <img :src="thumbnail(value.image.startsWith('/') ? value.image.substring(1) : value.image)"  class="img-fluid">
                                   </div>
                                 </div>
                                 <input type="hidden" v-model="value.image">

                                 <div class="btn-remove" @click="removeSourceVariantValue(variantIndex, value_index)"><i class="el-icon-error"></i></div>
                                 <div class="name">
                                   {{ value.name[current_language_code] }}
                                 </div>
                               </div>
                            </draggable>
                            <div class="ps-2 mt-2 mb-3 opacity-50"><i class="bi bi-exclamation-circle"></i> <?php echo e(__('admin/product.modify_order')); ?></div>
                          </template>
                          <div v-else class="d-flex justify-content-center align-items-center">
                            <div class="p-4 fs-5 btn" @click="modalVariantOpenButtonClicked(variantIndex, -1)"><i class="bi bi-plus-square-dotted"></i> <?php echo e(__('admin/product.add_variable_value')); ?></div>
                          </div>

                        </div>
                      </draggable>

                      <el-button type="primary" plain size="small" @click="modalVariantOpenButtonClicked(-1, null)" class="btn btn-xs mr-1 mb-1"><?php echo e(__('admin/product.add_variable')); ?></el-button>
                    </div>

                    <div v-if="form.skus.length && form.variables.length" class="mt-3 table-push table-responsive">
                      <div class="batch-setting d-flex align-items-center mb-3 p-2 bg-body">
                        <div v-for="(variant, index) in form.variables" :key="index" class="me-2">
                          <select class="form-select me-2 bg-white" aria-label="Default select example" v-model="variablesBatch.variables[index]">
                            <option selected value="">{{ variant.name[current_language_code] || 'No name' }}</option>
                            <option :value="value_index" v-for="value, value_index in variant.values" :key="index+'-'+value_index" >
                              {{ value.name[current_language_code]}}
                            </option>
                          </select>
                        </div>
                        <div role="button" class="border d-flex justify-content-center align-items-center border-dashed bg-light wh-40 me-2 bg-white" @click="batchSettingVariantImage">
                          <img :src="thumbnail(variablesBatch.image.startsWith('/') ? variablesBatch.image.substring(1) : variablesBatch.image)"  class="img-fluid" v-if="variablesBatch.image" style="max-height: 40px;">
                          <i class="bi bi-plus fs-3 text-muted" v-else></i>
                        </div>
                        <input type="text" class="form-control me-2 bg-white" v-model="variablesBatch.model" placeholder="<?php echo e(__('admin/product.model')); ?>">
                        <!-- <input type="text" class="form-control me-2 bg-white" v-model="variablesBatch.sku" placeholder="sku"> -->
                        <input type="number" class="form-control me-2 bg-white" v-model="variablesBatch.cost_price" placeholder="<?php echo e('Giá trước thuế'); ?>">
                        <!-- <input type="number" class="form-control me-2 bg-white" v-model="variablesBatch.price" placeholder="<?php echo e('Giá sau thuế'); ?>"> -->
                        <input type="number" class="form-control me-2 bg-white" v-model="variablesBatch.origin_price" placeholder="<?php echo e(__('admin/product.origin_price')); ?>">
                        <input type="number" class="form-control me-2 bg-white" v-model="variablesBatch.quantity" placeholder="<?php echo e(__('admin/product.quantity')); ?>">
                         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.edit.variables.batch.input.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                        <button type="button" class="btn btn-primary text-nowrap" @click="batchSettingVariant"><?php echo e(__('common.batch_setting')); ?></button>
                         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.edit.variables.batch.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                      </div>

                      <table class="table table-bordered table-hover table-skus">
                        <thead>
                          <th v-for="(variant, index) in form.variables" :key="'pv-header-' + index">
                            {{ variant.name[current_language_code] || 'No name' }}
                          </th>
                          <th width="106px"><?php echo e(__('common.image')); ?></th>
                          <th class="w-min-100"><?php echo e(__('admin/product.model')); ?></th>
                          <!-- <th class="w-min-100">sku</th> -->
                          <th class="w-min-100"><?php echo e('Giá trước thuế'); ?></th>
                          <th class="w-min-100"><?php echo e(__('admin/product.origin_price')); ?></th>
                          <!-- <th class="w-min-100"><?php echo e('Giá sau thuế'); ?></th> -->
                          <th style="width: 70px"><?php echo e(__('admin/product.quantity')); ?></th>
                           <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.edit.sku.variants.title.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                        </thead>
                        <tbody>
                          <tr v-for="(sku, skuIndex) in form.skus" :key="skuIndex">
                            <template v-for="(variantValueIndex, j) in sku.variants">
                              <td v-if="skuIndex % variantValueRepetitions[j] == 0" :key="'pvv' + skuIndex + '-' + j"
                                :rowspan="variantValueRepetitions[j]">
                                <span>{{ form.variables[j].values[variantValueIndex].name[current_language_code] || 'No name' }}</span>
                              </td>
                            </template>
                            <td>
                              <div class="product-images d-flex flex-wrap" style="margin-right: -8px">
                                <div v-for="image, index in sku.images" :key="index" class="product-item wh-40 border d-flex justify-content-center align-items-center me-2 mb-2 position-relative">
                                  <div class="position-absolute top-0 end-0">
                                    <button class="btn btn-danger btn-sm wh-20 p-0" @click="removeSkuImages(skuIndex, index)" type="button"><i class="bi bi-trash"></i></button>
                                  </div>
                                  <img :src="thumbnail(image.startsWith('/') ? image.substring(1) : image)" class="img-fluid" style="max-height: 40px;">
                                  <input type="hidden" class="form-control" v-model="sku.images[index]" :name="'skus[' + skuIndex + '][images][]'" placeholder="image">
                                </div>
                                <div class="border d-flex justify-content-center align-items-center border-dashed bg-light wh-40" role="button" @click="addProductImages(skuIndex)"><i class="bi bi-plus fs-3 text-muted"></i></div>
                              </div>
                              <input type="hidden" class="form-control" :name="'skus[' + skuIndex + '][is_default]'" :value="skuIndex == 0 ? 1 : 0">
                              <input v-for="(variantValueIndex, j) in sku.variants" type="hidden"
                                :name="'skus[' + skuIndex + '][variants][' + j + ']'" :value="variantValueIndex">
                            </td>
                            <td><input type="text" class="form-control" v-model="sku.model" :name="'skus[' + skuIndex + '][model]'"
                                placeholder="<?php echo e(__('admin/product.model')); ?>"></td>
                            <!-- <td>
                              <input type="text" class="form-control" v-model="sku.sku" :name="'skus[' + skuIndex + '][sku]'" placeholder="sku" :style="sku.is_default ? 'margin-top: 19px;' : ''" required>
                              <span role="alert" class="invalid-feedback"><?php echo e(__('common.error_required', ['name' => 'sku'])); ?></span>
                              <span v-if="sku.is_default * 1" class="text-success"><?php echo e(__('admin/product.default_main_product')); ?></span>
                            </td> -->
                            <td><input type="number" class="form-control" v-model="sku.cost_price" :name="'skus[' + skuIndex + '][cost_price]'" step="any"
                                placeholder="<?php echo e('Giá trước thuế'); ?>">
                            </td>
                           
                            <td><input type="number" class="form-control" v-model="sku.origin_price" :name="'skus[' + skuIndex + '][origin_price]'" step="any"
                              placeholder="<?php echo e(__('admin/product.origin_price')); ?>">
                              <span role="alert" class="invalid-feedback"><?php echo e(__('common.error_required', ['name' => __('admin/product.origin_price')])); ?></span>
                            </td>
                            <!-- <td>
                              <input type="number" class="form-control" v-model="sku.price" :name="'skus[' + skuIndex + '][price]'" step="any"
                                placeholder="<?php echo e('Giá sau thuế'); ?>" required>
                              <span role="alert" class="invalid-feedback"><?php echo e(__('common.error_required', ['name' => 'Giá sau thuế'])); ?></span>
                               <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.edit.sku.price.tiered",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                            </td>
                             -->
                            <td><input type="number" class="form-control" v-model="sku.quantity" :name="'skus[' + skuIndex + '][quantity]'"
                                placeholder="<?php echo e(__('admin/product.quantity')); ?>"></td>
                             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.edit.sku.variants.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <input class="form-control d-none" :value="skuIsEmpty" required>
                  <div class="invalid-feedback" style="font-size: 16px"><i class="bi bi-exclamation-circle-fill"></i> <?php echo e(__('admin/product.add_variable')); ?></div>
                </div>
              </div>

               <?php
                    $__hook_name="admin.product.edit.variable";
                    ob_start();
                ?>
              <div v-if="!editing.isVariable">
                <input type="hidden" value="<?php echo e(old('skus.0.image', $product->skus[0]->image ?? '')); ?>" name="skus[0][image]">
                <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'skus[0][model]','title' => __('admin/product.model'),'value' => old('skus.0.model', $product->skus[0]->model ?? '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <!-- <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'skus[0][sku]','title' => 'sku','value' => old('skus.0.sku', $product->skus[0]->sku ?? ''),'required' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?> -->
                <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'skus[0][cost_price]','type' => 'number','title' => 'Giá trước thuế','value' => old('skus.0.cost_price', $product->skus[0]->cost_price ?? ''),'step' => 'any','required' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <!-- <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'skus[0][price]','type' => 'number','title' => 'Giá sau thuế','value' => old('skus.0.price', $product->skus[0]->price ?? ''),'step' => 'any','required' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?> -->
                <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'skus[0][origin_price]','type' => 'number','title' => __('admin/product.origin_price'),'value' => old('skus.0.origin_price', $product->skus[0]->origin_price ?? ''),'step' => 'any'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'skus[0][quantity]','type' => 'number','title' => __('admin/product.quantity'),'value' => old('skus.0.quantity', $product->skus[0]->quantity ?? '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <input type="hidden" name="skus[0][variants]" placeholder="variants" value="">
                <input type="hidden" name="skus[0][position]" placeholder="position" value="0">
                <input type="hidden" name="skus[0][is_default]" placeholder="is_default" value="1">
                 <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.edit.sku.price.single.tiered",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
              </div>
               <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>
            </div>
          </div>
          <div class="tab-pane fade" id="tab-descriptions">
            <h6 class="border-bottom pb-3 mb-4"><?php echo e(__('admin/product.product_details')); ?></h6>
            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => __('admin/product.product_details')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('admin/product.product_details'))]); ?>

              <ul class="nav nav-tabs mb-3" role="tablist">
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>" data-bs-toggle="tab" data-bs-target="#tab-descriptions-<?php echo e($language->code); ?>" type="button" ><?php echo e($language->name); ?></button>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>

              <div class="tab-content">
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="tab-pane fade <?php echo e($loop->first ? 'show active' : ''); ?>" id="tab-descriptions-<?php echo e($language->code); ?>">
                    <textarea name="descriptions[<?php echo e($language->code); ?>][content]" class="form-control tinymce">
                      <?php echo e(old('content', $product->descriptions->keyBy('locale')[$language->code]->content ?? '')); ?>

                    </textarea>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.content.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
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
          </div>
          <div class="tab-pane fade" id="tab-attribute">
            <h6 class="border-bottom pb-3 mb-4"><?php echo e(__('admin/attribute.index')); ?></h6>
            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('admin/attribute.set_attribute')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('admin/attribute.set_attribute')).'']); ?>
              <div class="pdf-table">
                <table class="table table-bordered w-max-600">
                  <thead><th><?php echo e(__('admin/attribute.index')); ?></th><th><?php echo e(__('admin/attribute.attribute_value')); ?></th><th width="50px"></th></thead>
                  <tbody>
                    <tr v-for="item, index in form.attributes" :key="index">
                      <td>
                        <el-autocomplete
                          v-model="item.attribute.name"
                          :fetch-suggestions="attributeQuerySearch"
                          placeholder="<?php echo e(__('admin/builder.modules_keywords_search')); ?>"
                          value-key="name"
                          class="w-100"
                          size="small"
                          @select="(e) => {attributeHandleSelect(e, index, 'attribute')}"
                        ></el-autocomplete>
                        <input type="text" required :name="'attributes['+ index +'][attribute_id]'" v-model="item.attribute.id" class="form-control d-none">
                        <div class="invalid-feedback"><?php echo e(__('common.error_required', ['name' => __('admin/attribute.index')])); ?></div>
                      </td>
                      <td>
                        <el-autocomplete
                          v-model="item.attribute_value.name"
                          :fetch-suggestions="((query, cb) => {attributeValueQuerySearch(query, cb, index)})"
                          size="small"
                          :disabled="item.attribute.id == ''"
                          value-key="name"
                          class="w-100"
                          :placeholder="item.attribute.id == '' ? '<?php echo e(__('admin/attribute.before_attribute')); ?>' : '<?php echo e(__('admin/builder.modules_keywords_search')); ?>'"
                          @select="(e) => {attributeHandleSelect(e, index, 'attribute_value')}"
                        ></el-autocomplete>
                        <input type="text" required :name="'attributes['+ index +'][attribute_value_id]'" v-model="item.attribute_value.id" class="form-control d-none">
                        <div class="invalid-feedback"><?php echo e(__('common.error_required', ['name' => __('admin/attribute.attribute_value')])); ?></div>
                      </td>
                      <td class="text-end">
                        <i @click="form.attributes.splice(index, 1)" class="bi bi-x-circle fs-4 text-danger cursor-pointer"></i>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <td class="text-end"><i class="bi bi-plus-circle cursor-pointer fs-4" @click="addAttribute"></i></td>
                    </tr>
                  </tbody>
                </table>
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
          </div>

          <div class="tab-pane fade" id="tab-seo">
            <h6 class="border-bottom pb-3 mb-4">SEO</h6>

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.seo.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

            <?php if (isset($component)) { $__componentOriginala681672db39a7b0a9f0cb6f3c0615226 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala681672db39a7b0a9f0cb6f3c0615226 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\InputLocale::resolve(['width' => 600,'name' => 'descriptions.*.meta_title','title' => 'Meta title','value' => $descriptions] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input-locale'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\InputLocale::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala681672db39a7b0a9f0cb6f3c0615226)): ?>
<?php $attributes = $__attributesOriginala681672db39a7b0a9f0cb6f3c0615226; ?>
<?php unset($__attributesOriginala681672db39a7b0a9f0cb6f3c0615226); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala681672db39a7b0a9f0cb6f3c0615226)): ?>
<?php $component = $__componentOriginala681672db39a7b0a9f0cb6f3c0615226; ?>
<?php unset($__componentOriginala681672db39a7b0a9f0cb6f3c0615226); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => 'Meta keywords']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Meta keywords']); ?>
              <div class="input-locale-wrap">
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="input-group w-max-600">
                  <span class="input-group-text wp-100"><?php echo e($language['name']); ?></span>
                  <textarea rows="2" type="text" name="descriptions[<?php echo e($language['code']); ?>][meta_keywords]" class="form-control input-<?php echo e($language['code']); ?> wp-400" placeholder="Meta keywords"><?php echo e(old('meta_keywords', $product->descriptions->keyBy('locale')[$language->code]->meta_keywords ?? '')); ?></textarea>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('admin::shared.auto-translation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => 'Meta description']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Meta description']); ?>
              <div class="input-locale-wrap">
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="input-group w-max-600">
                  <span class="input-group-text wp-100"><?php echo e($language['name']); ?></span>
                  <textarea rows="2" type="text" name="descriptions[<?php echo e($language['code']); ?>][meta_description]" class="form-control input-<?php echo e($language['code']); ?> wp-400" placeholder="Meta description"><?php echo e(old('meta_description', $product->descriptions->keyBy('locale')[$language->code]->meta_description ?? '')); ?></textarea>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('admin::shared.auto-translation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.seo.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
          </div>

          <div class="tab-pane fade" id="tab-relations">
            <h6 class="border-bottom pb-3 mb-4"><?php echo e(__('admin/product.product_relations')); ?></h6>
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.edit.product_relations.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('admin/product.product_relations')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('admin/product.product_relations')).'']); ?>
              <div class="module-edit-group wp-600">
                <div class="autocomplete-group-wrapper">
                  <el-autocomplete
                    class="inline-input"
                    v-model="relations.keyword"
                    value-key="name"
                    size="small"
                    :fetch-suggestions="relationsQuerySearch"
                    placeholder="<?php echo e(__('admin/builder.modules_keywords_search')); ?>"
                    @select="relationsHandleSelect"
                  ></el-autocomplete>
                   
                  <div class="item-group-wrapper" v-loading="relations.loading">
                    <template v-if="relations.products.length">
                      <draggable
                        ghost-class="dragabble-ghost"
                        :list="relations.products"
                        :options="{animation: 330}"
                      >
                        <div v-for="(item, index) in relations.products" :key="index" class="item">
                          <div>
                            <i class="el-icon-s-unfold"></i>
                            <span>{{ item.name }}</span>
                          </div>
                          <i class="el-icon-delete right" @click="relationsRemoveProduct(index)"></i>
                          <input type="text" :name="'relations['+ index +']'" v-model="item.id" class="form-control d-none">
                        </div>
                      </draggable>
                    </template>
                    <template v-else><?php echo e(__('admin/builder.modules_please_products')); ?></template>
                  </div>
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
          </div>
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
          <button type="submit" class="btn d-none btn-primary btn-submit mt-3 btn-lg"><?php echo e(__('common.save')); ?></button>
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

        <el-dialog
          title="<?php echo e(__('common.edit')); ?>"
          :visible.sync="dialogVariables.show"
          width="400"
          @close="closedialogVariablesFormDialog('form')"
          :close-on-click-modal="false"
          >
          <el-form ref="form" :rules="rules" :model="dialogVariables.form" label-width="100px">
            <el-form-item label="<?php echo e(__('common.name')); ?>" required class="language-inputs">
              <el-form-item  :prop="'name.' + lang.code" :inline-message="true"  v-for="lang, lang_i in source.languages" :key="lang_i"
                :rules="[
                  { required: true, message: '<?php echo e(__('common.error_input_required')); ?>', trigger: 'blur' },
                ]"
              >
                <el-input size="mini" v-model="dialogVariables.form.name[lang.code]" placeholder="<?php echo e(__('common.name')); ?>"><template slot="prepend">{{lang.name}}</template></el-input>
              </el-form-item>
               <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.sku.edit.item.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            </el-form-item>

            <el-form-item>
              <el-button type="primary" @click="dialogVariablesFormSubmit('form')"><?php echo e(__('common.save')); ?></el-button>
              <el-button @click="closedialogVariablesFormDialog('form')"><?php echo e(__('common.cancel')); ?></el-button>
            </el-form-item>
          </el-form>
        </el-dialog>

        <el-dialog title="<?php echo e(__('admin/attribute.attribute_value')); ?>" :visible.sync="attributeDialog.show" width="670px"
          @close="attributeCloseDialog('attribute_form')" :close-on-click-modal="false">

          <el-form ref="attribute_form" :model="attributeDialog.form" label-width="155px">
            <el-form-item label="<?php echo e(__('common.name')); ?>" required class="language-inputs">
              <el-form-item  :prop="'name.' + lang.code" :inline-message="true"  v-for="lang, lang_i in source.languages" :key="lang_i"
                :rules="[
                  { required: true, message: '<?php echo e(__('common.error_required', ['name' => __('common.name')])); ?>', trigger: 'blur' },
                ]"
              >
                <el-input size="mini" v-model="attributeDialog.form.name[lang.code]" placeholder="<?php echo e(__('common.name')); ?>"><template slot="prepend">{{lang.name}}</template></el-input>
              </el-form-item>
            </el-form-item>

            <el-form-item>
              <div class="d-flex d-lg-block mt-4">
                <el-button type="primary" @click="attributeSubmit('attribute_form')"><?php echo e(__('common.save')); ?></el-button>
                <el-button @click="attributeCloseDialog('attribute_form')"><?php echo e(__('common.cancel')); ?></el-button>
              </div>
            </el-form-item>
          </el-form>
        </el-dialog>
      </form>
    </div>
  </div>

   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.form.footer",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    $('.submit-form-edit').on('click', function () {
      const action = $(`form#app`).attr('action');
      console.log('action',action)
      submitBeforeFormat()
      $(`form#app`).attr('action', bk.updateQueryStringParameter(action, 'action_type', 'stay'));
      const updatedAction = bk.updateQueryStringParameter(action, 'action_type', 'stay');
      console.log('updatedAction',updatedAction)

      setTimeout(() => {
        console.log('Form data at submission time:', $(`form#app`).serializeArray());
        $(`form#app`).find('button[type="submit"]')[0].click();
      }, 0);
    })

    $('.submit-form').on('click', function () {
      submitBeforeFormat()

      setTimeout(() => {
        $(`form#app`).find('button[type="submit"]')[0].click();
      }, 0);
    })

    function submitBeforeFormat() {
      console.log('submitBeforeFormat called');
      if (!app.editing.isVariable) {
        app.source.variables = [];
      }
      console.log('Form data before submit:', app.form);
      app.videoSubmitFormat()
    }

    var app = new Vue({
      el: '#app',
      data: {
        current_language_code: '<?php echo e(locale()); ?>',
        isMove: false,
        form: {
          categories: <?php echo json_encode(old('categories', $category_ids) ?? [], 512) ?>,
          attributes: <?php echo json_encode(old('pickups', $product_attributes) ?? [], 512) ?>,
          images: <?php echo json_encode(old('images', $product->images) ?? [], 512) ?>,
          video: {
            path: <?php echo json_encode(old('video', $product->video ?? ''), 512) ?>,
            url: '',
            iframe: '',
            custom: '',
            videoType: 'local',
          },
          model: <?php echo json_encode($product->skus[0]['model'] ?? '', 15, 512) ?>,
          price: <?php echo json_encode($product->skus[0]['price'] ?? '', 15, 512) ?>,
          quantity: <?php echo json_encode($product->skus[0]['quantity'] ?? '', 15, 512) ?>,
          sku: <?php echo json_encode($product->skus[0]['sku'] ?? '', 15, 512) ?>,
          status: <?php echo json_encode($product->skus[0]['status'] ?? false, 15, 512) ?>,
          variables: [],
          skus: <?php echo json_encode(old('skus', $product->skus) ?? [], 512) ?>,
        },

        variablesBatch: {
          variables: [],
          model: '',
          sku: '',
          price: '',
          origin_price: '',
          cost_price: '',
          quantity: '',
          image: '',
          status: false,
        },

        relations: {
          keyword: '',
          products: <?php echo json_encode($relations ?? [], 15, 512) ?>,
          loading: null,
        },

        source: {
          variables: [],
          languages: <?php echo json_encode($languages ?? [], 15, 512) ?>,
          categories: <?php echo json_encode($source['categories'] ?? [], 15, 512) ?>,
          flattenCategories: <?php echo json_encode($source['flatten_categories'] ?? [], 15, 512) ?>,
        },

        editing: {
          isVariable: false,
        },

        dialogVariables: {
          show: false,
          variantIndex: null,
          variantValueIndex: null,
          form: {
            name: {}
          },
        },

        attributeDialog: {
          show: false,
          index: null,
          form: {
            name: {},
          }
        },

        rules: {},
        <?php echo $__env->yieldPushContent('admin.product.edit.vue.data'); ?>
      },

      computed: {
        variantValueRepetitions() {
          var repeats = [];
          var repeat = 1;
          for (var index = this.form.variables.length - 2; index >= 0; index--) {
            repeat *= this.form.variables[index + 1].values.length;
            repeats[index] = repeat;
          }
          repeats.push(1);
          return repeats;
        },

        skuIsEmpty() {
          return (this.form.skus.length && this.form.skus[0].variants.length) || ''
        },

        categoryFormat() {
          const categories = JSON.parse(JSON.stringify(this.source.categories));
          const categoryIds = this.form.categories;
          const categoryFormat = [];

          categoryIds.forEach((categoryId, index) => {
            const category = categories.find(v => v.id == categoryId);
            if (category) {
              categoryFormat.push(category);
            }
          })

          return categoryFormat;
        }
      },

      beforeMount() {
        let variables = <?php echo json_encode(old('variables', $product->variables) ?? [], 512) ?>;
        if (typeof variables === 'string') {
          variables = JSON.parse(variables);
        }

        this.form.variables = variables
        this.source.variables = variables
        this.editing.isVariable = variables.length > 0

        if (this.form.variables.length) {
          this.variablesBatch.variables = this.form.variables.map((v, i) => '');
        }

        this.videoDataFormat()
      },

      watch: {
        'source.variables': {
          deep: true,
          handler: function(val) {
            let variants = [];
            const sourceVariants = JSON.parse(JSON.stringify(this.source.variables));
            for (var i = 0; i < sourceVariants.length; i++) {
              let sourceVariant = sourceVariants[i];
              if (sourceVariant.values.length > 0) {
                variants.push(sourceVariant);
              }
            }

            this.form.variables = variants;
            // 在 variablesBatch.variables 生成对应的 variants 的index
            this.variablesBatch.variables = variants.map((v, i) => '');

            if (this.isMove) return;
            this.remakeSkus();
          }
        }
      },

      methods: {
        categoriesChange(e) {
          const last = e[e.length - 1];

          this.$nextTick(() => {
            this.$refs.refCascader.dropDownVisible = false
            // this.$refs.refCascader.$refs.panel.checkedValue = [];
            this.$refs.refCascader.$refs.panel.activePath = [];
            this.$refs.refCascader.$refs.panel.syncActivePath()
            this.$refs.refCascader.panel.clearCheckedNodes()
          });

          if (this.form.categories.find(v => v == last)) return layer.msg('<?php echo e(__('admin/product.category_already')); ?>');
          if (last) {
            this.form.categories.push(last);
          }
        },

        // 视频数据格式化 type
        videoDataFormat() {
          const videoPath = <?php echo json_encode(old('video', $product->video ?? ''), 512) ?>;

          if (videoPath.indexOf('<iframe') > -1) {
            this.form.video.videoType = 'iframe';
            this.form.video.iframe = videoPath;
            return
          }

          if (videoPath.indexOf('http') > -1) {
            this.form.video.videoType = 'custom';
            this.form.video.custom = videoPath;
            return
          }

          this.form.video.path = videoPath;

          if (videoPath) {
            this.form.video.url = <?php echo json_encode(image_origin(old('video', $product->video ?? '')), 512) ?>;
          }
        },

        // 视频数据提交的时候格式化
        videoSubmitFormat() {
          if (this.form.video.videoType == 'iframe')  {
            this.form.video.path = this.form.video.iframe;
          }

          if (this.form.video.videoType == 'custom')  {
            this.form.video.path = this.form.video.custom;
          }
        },

        deleteVideo() {
          this.form.video.path = ''
          this.form.video.url = ''
        },

        relationsQuerySearch(keyword, cb) {
          $http.get('products/autocomplete?name=' + encodeURIComponent(keyword), null, {hload:true}).then((res) => {
            cb(res.data);
          })
        },

        relationsHandleSelect(item) {
          if (!this.relations.products.find(v => v == item.id)) {
            this.relations.products.push(item);
          }
          this.relations.keyword = ""
        },

        relationsRemoveProduct(index) {
          this.relations.products.splice(index, 1);
        },

        isVariableChange(e) {
          // if (!e) {
          //   this.source.variables = [];
          // }
        },

        variantIsImage(e, index) {
          if (!e) {
            this.source.variables[index].values.forEach(v => {
              v.image = '';
            })
          }
        },

        batchSettingVariantImage() {
          bk.fileManagerIframe(images => {
            this.variablesBatch.image = images[0].path
          })
        },

        addProductImages(skuIndex) {
          bk.fileManagerIframe(images => {
            if (!isNaN(skuIndex)) {
              if (this.form.skus[skuIndex].images === null) {
                this.form.skus[skuIndex].images = images.map((e)=>{
                  if(e.path.charAt(0)==='/'){
                    return e.path
                  }
                  return e.path
                })
              } else {
                this.form.skus[skuIndex].images.push(...images.map((e)=>{
                  if(e.path.charAt(0)==='/'){
                    return e.path
                  }
                  return e.path
                }))
              }
              return;
            }
            this.form.images.push(...images.map((e)=>{
              return e.path
            }))
          }, {mime: 'image'})
        },

        addProductVideo() {
          bk.fileManagerIframe(images => {
            this.form.video.path = images[0].path
            this.form.video.url = images[0].url
          }, {mime: 'video'})
        },

        removeImages(index) {
          this.form.images.splice(index, 1)
        },

        removeSkuImages(variantIndex, index) {
          this.form.skus[variantIndex].images.splice(index, 1)
        },

        batchSettingVariant() {
          let setSkuIndex = [];
          const skus = JSON.parse(JSON.stringify(this.form.skus));

          skus.forEach((sku, skuIndex) => {
            this.variablesBatch.variables.forEach((v, i) => {
              if (v === '') {
                sku.variants[i] = '';
              }
            })

            if (this.variablesBatch.variables.toString() === sku.variants.toString()) {
              setSkuIndex.push(skuIndex);
            }
          })

          setSkuIndex.forEach((index) => {
            if (this.variablesBatch.model) {
              this.form.skus[index].model = this.variablesBatch.model + '-' + (index + 1);
            }
            if (this.variablesBatch.sku) {
              this.form.skus[index].sku = this.variablesBatch.sku + '-' + (index + 1);
            }
            if (this.variablesBatch.image) {
              this.form.skus[index].images = [this.variablesBatch.image];
            }
            if (this.variablesBatch.price) {
              this.form.skus[index].price = this.variablesBatch.price;
            }
            if (this.variablesBatch.origin_price) {
              this.form.skus[index].origin_price = this.variablesBatch.origin_price;
            }
            if (this.variablesBatch.cost_price) {
              this.form.skus[index].cost_price = this.variablesBatch.cost_price;
            }
            if (this.variablesBatch.quantity) {
              this.form.skus[index].quantity = this.variablesBatch.quantity;
            }
            <?php echo $__env->yieldPushContent('admin.product.edit.vue.method.batchSettingVariant'); ?>
          })

          for (let key in this.variablesBatch) {
            if (key !== 'variables') {
              this.variablesBatch[key] = '';
            }
          }
        },

        dialogVariablesFormSubmit(form) {
          const name = JSON.parse(JSON.stringify(this.dialogVariables.form.name));
          const variantIndex = this.dialogVariables.variantIndex;
          const variantValueIndex = this.dialogVariables.variantValueIndex;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            if (variantValueIndex !== null) {
              if (variantValueIndex == -1) { // 创建
                this.source.variables[variantIndex].values.push({name, image: ''});
              } else {
                this.source.variables[variantIndex].values[variantValueIndex].name = name;
              }
            } else {
              if (variantIndex == -1) { // 创建
                this.source.variables.push({name, values: [], isImage: false});
              } else {
                this.source.variables[variantIndex].name = name;
              }
            }

            this.dialogVariables.show = false;
          });
        },

        closedialogVariablesFormDialog(form) {
          this.dialogVariables.show = false;
          this.dialogVariables.variantIndex = null;
          this.dialogVariables.variantValueIndex = null;
          this.dialogVariables.form.name = {};
          this.$refs[form].clearValidate();
        },

        removeSourceVariantValue(variantIndex, variantValueIndex) {
          this.source.variables[variantIndex].values.splice(variantValueIndex, 1);
          // 找出 this.form.skus 中 variants[variantIndex] === variantValueIndex 的 sku，删除
          this.form.skus = this.form.skus.filter(sku => sku.variants[variantIndex] * 1 !== variantValueIndex * 1);

          // 根据现在的 this.source.variables values 重新生成迪卡尔积 ['0,0', '0,1']...
          const variants = this.source.variables.map(e => e.values.map((v, i) => i));
          const cartesian = this.cartesian(...variants);

          // 用 cartesian 跟新 this.form.skus 中的 variants
          cartesian.forEach((c, i) => {
            c = !Array.isArray(c) ? [c] : c;
            this.form.skus[i].variants = c.map(e => e + '');
          })
        },

        cartesian(...args) {
          if (args.length < 2) return args[0] || [];
          return [].reduce.call(args, (col, set) => {
            let res = [];
            col.forEach(c => {
              set.forEach(s => {
                let t = [].concat(Array.isArray(c) ? c : [c]);
                t.push(s);
                res.push(t);
              });
            });
            return res;
          });
        },

        modalVariantOpenButtonClicked(variantIndex, variantValueIndex) {
          this.dialogVariables.variantIndex = variantIndex;
          this.dialogVariables.variantValueIndex = variantValueIndex;

          let name = null;
          if (variantIndex === -1 || variantValueIndex === -1) {
            name = {};
          } else {
            if (variantValueIndex !== null) {
              // 编辑 variant value
              name = this.source.variables[variantIndex].values[variantValueIndex].name;
            } else {
              // 编辑 variant
              name = this.source.variables[variantIndex].name;
            }
          }

          this.dialogVariables.form.name = JSON.parse(JSON.stringify(name));
          this.dialogVariables.show = true;
        },

        removeSourceVariant(variantIndex) {
          this.source.variables.splice(variantIndex, 1);
          if (!this.source.variables.length) {
            setTimeout(() => { // 等 remakeSkus 完成 this.form.skus = [];
              this.form.skus = [{product_sku_id: 0,position: 1,variants: [],image: '',model: '',sku: '',price: null,quantity: null,is_default: 1}];
              this.editing.isVariable = false;
            }, 0);
          }
        },
        addVariantValue(variantIndex) {
          this.dialogVariables.show = true;
          this.dialogVariables.type = 'variant-value';
          this.dialogVariables.variantIndex = variantIndex;
        },

        addAttribute() {
          this.form.attributes.push({attribute:{id:'',name:''}, attribute_value: {id:'',name:''}})
        },

        attributeQuerySearch(keyword, cb) {
          $http.get('attributes/autocomplete?name=' + encodeURIComponent(keyword), null, {hload:true}).then((res) => {
            cb(res.data);
          })
        },

        attributeValueQuerySearch(keyword, cb, index) {
          $http.get(`attributes/${this.form.attributes[index].attribute.id}/values/autocomplete?name=${encodeURIComponent(keyword)}`, null, {hload:true}).then((res) => {
            res.data.push({id: 'add', name: '<?php echo e(__('admin/attribute.add_attribute')); ?>'})
            cb(res.data);
          })
        },

        attributeHandleSelect(item, index, type) {
          if (type == 'attribute' && item.id != this.form.attributes[index].attribute.id) {
            this.form.attributes[index].attribute_value.name = ''
            this.form.attributes[index].attribute_value.id = ''
          }

          if (item.id == 'add') {
            this.attributeDialog.show = true;
            this.attributeDialog.index = index;
            this.form.attributes[index].attribute_value.name = ''
            return;
          }

          this.form.attributes[index][type].name = item.name
          this.form.attributes[index][type].id = item.id
        },

        attributeSubmit(form) {
          const self = this;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            const id = this.form.attributes[this.attributeDialog.index].attribute.id;

            $http.post(`attributes/${id}/values`, this.attributeDialog.form).then((res) => {
              this.form.attributes[this.attributeDialog.index].attribute_value.id = res.data.id
              this.form.attributes[this.attributeDialog.index].attribute_value.name = res.data.description.name
              this.attributeDialog.show = false
            })
          });
        },

        attributeCloseDialog(form) {
          this.$refs[form].resetFields();
          this.attributeDialog.form.name = {}
          this.attributeDialog.show = false
        },

        remakeSkus() {
          const combos = makeVariableIndexes();

          if (combos.length < 1) {
            this.form.skus = [];
            return;
          }

          // 找出已存在的组合
          const productVariantCombos = this.form.skus.map(v => v.variants.join()); // ['0,0,0', '0,0,1']
          let skus = [];
          for (var i = 0; i < combos.length; i++) {
            const combo = combos[i]; // 0,0,0
            const index = productVariantCombos.indexOf(combo.join());
            if (index > -1) {
              skus.push(this.form.skus[index]);
            } else {
              skus.push({
                product_sku_id: 0,
                position: i,
                variants: combo,
                images: [],
                model: '',
                sku: '',
                price: null,
                quantity: null,
                is_default: i == 0,
              });
            }
          }

          this.form.skus = skus;
        },

        // 规格值拖拽
        swapSourceVariantValue(e, variantIndex) {
          this.form.skus.forEach(function(sku) {
            const oldIndex = parseInt(sku.variants[variantIndex]);
            if (oldIndex == e.oldIndex) {
              sku.variants[variantIndex] = e.newIndex.toString();
            } else if (oldIndex > e.oldIndex && oldIndex <= e.newIndex) {
              sku.variants[variantIndex] = (oldIndex - 1).toString();
            } else if (oldIndex < e.oldIndex && oldIndex >= e.newIndex) {
              sku.variants[variantIndex] = (oldIndex + 1).toString();
            } else {
              sku.variants[variantIndex] = oldIndex.toString();
            }
          });

          this.remakeSkus()
        },

        videoTypeChange(code) {
          this.form.video.videoType = code;
          // this.form.video.path = '';
          // this.form.video.url = '';
        },
        <?php echo $__env->yieldPushContent('admin.product.edit.vue.method'); ?>
      }
    });

    function makeVariableIndexes() {
      // 每组值重复次数
      var repeats = app.variantValueRepetitions;
      var results = [];

      if (app.form.variables.length < 1) {
        return results;
      }

      for (let i = 0; i < repeats[0] * app.form.variables[0].values.length; i++) {
        results.push([]);
      }
      for (let xIndex = 0; xIndex < repeats.length; xIndex++) { // 0 - 3
        let repeat = 0;
        let itemIndex = 0;
        for (let yIndex = 0; yIndex < results.length; yIndex++) { // 0 - 36
          results[yIndex].push(itemIndex);
          repeat++;
          if (repeat >= repeats[xIndex]) {
            repeat = 0;
            itemIndex++;
            if (itemIndex >= app.form.variables[xIndex].values.length) {
              itemIndex = 0;
            }
          }
        }
      }

      return results;
    }

    $(document).ready(function ($) {
      $('#brand-autocomplete').autocomplete({
        'source': function(request, response) {
          $http.get(`brands/autocomplete?name=${encodeURIComponent(request)}`, null, {hload: true}).then((res) => {
            response($.map(res.data, function(item) {
              return {label: item['name'], value: item['id']}
            }));
          })
        },
        'select': function(item) {
          $(this).val(item['label']);
          $('input[name="brand_id"]').val(item['value']);
        }
      });

      // skus[*][sku] 只能填写 数字、字母、中横线、下划线
      $(document).on('input', 'input[name^="skus"][name$="[sku]"]', function() {
        $(this).val($(this).val().replace(/[^a-zA-Z0-9-_]/g, ''));
        $(this)[0].dispatchEvent(new Event('input'));
      });
    });

    // 回车键 功能修改为 tab建的功能
    $(document).on('keydown', '*', function(e) {
      if (e.keyCode == 13) {
        e.preventDefault();
        var inputs = $(this).parents("form").eq(0).find(":input:visible:not([disabled]):not([readonly])");
        var idx = inputs.index(this);
        if (idx == inputs.length - 1) {
          inputs[0].select()
        } else {
          inputs[idx + 1].focus();
          inputs[idx + 1].select();
        }
        return false;
      }
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/products/form/form.blade.php ENDPATH**/ ?>