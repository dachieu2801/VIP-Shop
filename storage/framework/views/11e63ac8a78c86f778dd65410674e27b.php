

<?php $__env->startSection('title', __('admin/common.category')); ?>

<?php $__env->startSection('content'); ?>
  <div id="category-app" class="card">
    <div class="card-header"><?php echo e(__('admin/category.edit_category')); ?></div>
    <div class="card-body">
      <form class="needs-validation" novalidate action="<?php echo e(admin_route($category->id ? 'categories.update' : 'categories.store', $category)); ?>"
        method="POST" >
        <?php echo csrf_field(); ?>
        <?php echo method_field($category->id ? 'PUT' : 'POST'); ?>
        <input type="hidden" name="_redirect" value="<?php echo e($_redirect); ?>">

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

         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.category.form.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

        <?php if (isset($component)) { $__componentOriginala681672db39a7b0a9f0cb6f3c0615226 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala681672db39a7b0a9f0cb6f3c0615226 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\InputLocale::resolve(['name' => 'descriptions.*.name','title' => ''.e(__('common.name')).'','value' => $descriptions,'required' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                
                $output = \Hook::getHook("admin.product.categories.edit.name.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
        <?php if (isset($component)) { $__componentOriginala681672db39a7b0a9f0cb6f3c0615226 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala681672db39a7b0a9f0cb6f3c0615226 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\InputLocale::resolve(['name' => 'descriptions.*.content','title' => ''.e(__('admin/builder.modules_content')).'','value' => $descriptions] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                
                $output = \Hook::getHook("admin.product.categories.edit.content.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
        <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'position','title' => ''.e(__('common.sort_order')).'','value' => old('position', $category->position ?? 0)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

        <?php if (isset($component)) { $__componentOriginal2bdd100b138485f397cdd769977f45a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2bdd100b138485f397cdd769977f45a6 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Image::resolve(['name' => 'image','title' => ''.e(__('admin/category.category_image')).'','value' => old('image', $category->image ?? '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Image::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
          <div class="help-text font-size-12 lh-base"><?php echo e(__('common.recommend_size')); ?> 300*300</div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2bdd100b138485f397cdd769977f45a6)): ?>
<?php $attributes = $__attributesOriginal2bdd100b138485f397cdd769977f45a6; ?>
<?php unset($__attributesOriginal2bdd100b138485f397cdd769977f45a6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2bdd100b138485f397cdd769977f45a6)): ?>
<?php $component = $__componentOriginal2bdd100b138485f397cdd769977f45a6; ?>
<?php unset($__componentOriginal2bdd100b138485f397cdd769977f45a6); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('admin/category.parent_category')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('admin/category.parent_category')).'']); ?>
          <?php
            $_parent_id = old('parent_id', $category->parent_id ?? 0);
          ?>
          <select name="parent_id" id="" class="form-control short wp-400">
            <option value="0">--<?php echo e(__('common.please_choose')); ?>--</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($_category->id); ?>" <?php echo e($_parent_id == $_category->id ? 'selected' : ''); ?>>
                <?php echo e($_category->name); ?>

              </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => 'Meta title']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Meta title']); ?>
          <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="input-group w-max-600">
            <span class="input-group-text wp-100"><?php echo e($language['name']); ?></span>
            <textarea rows="2" type="text" name="descriptions[<?php echo e($language['code']); ?>][meta_title]"
              class="<?php echo e($errors->first("descriptions.{$language['code']}.meta_title") ? 'is-invalid' : ''); ?> form-control input-<?php echo e($language['code']); ?> wp-400" placeholder="Meta title"><?php echo e(old('descriptions.' . $language['code'] . '.meta_title', $category->descriptions->keyBy('locale')[$language->code]->meta_title ?? '')); ?></textarea>
            <div class="invalid-feedback"><?php echo e($errors->first("descriptions.{$language['code']}.meta_title")); ?></div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php echo $__env->make('admin::shared.auto-translation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                
                $output = \Hook::getHook("admin.product.categories.edit.meta_title.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
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
          <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="input-group w-max-600">
            <span class="input-group-text wp-100"><?php echo e($language['name']); ?></span>
            <textarea rows="2" type="text" name="descriptions[<?php echo e($language['code']); ?>][meta_keywords]"
              class="<?php echo e($errors->first("descriptions.{$language['code']}.meta_keywords") ? 'is-invalid' : ''); ?> form-control input-<?php echo e($language['code']); ?> wp-400" placeholder="Meta keywords"><?php echo e(old('descriptions.' . $language['code'] . '.meta_keywords', $category->descriptions->keyBy('locale')[$language->code]->meta_keywords ?? '')); ?></textarea>
            <div class="invalid-feedback"><?php echo e($errors->first("descriptions.{$language['code']}.meta_keywords")); ?></div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php echo $__env->make('admin::shared.auto-translation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                
                $output = \Hook::getHook("admin.product.categories.edit.meta_keywords.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
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
          <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="input-group w-max-600">
            <span class="input-group-text wp-100"><?php echo e($language['name']); ?></span>
            <textarea rows="2" type="text" name="descriptions[<?php echo e($language['code']); ?>][meta_description]"
              class="<?php echo e($errors->first("descriptions.{$language['code']}.meta_description") ? 'is-invalid' : ''); ?> form-control input-<?php echo e($language['code']); ?> wp-400" placeholder="Meta description"><?php echo e(old('descriptions.' . $language['code'] . '.meta_description', $category->descriptions->keyBy('locale')[$language->code]->meta_description ?? '')); ?></textarea>
            <div class="invalid-feedback"><?php echo e($errors->first("descriptions.{$language['code']}.meta_description")); ?></div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php echo $__env->make('admin::shared.auto-translation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                
                $output = \Hook::getHook("admin.product.categories.edit.meta_description.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.category.form.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

        <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['title' => ''.e(__('common.status')).'','name' => 'active','value' => old('active', $category->active ?? 1)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
          <button type="submit" class="btn btn-primary w-min-100 btn-lg mt-3"><?php echo e(__('common.save')); ?></button>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/categories/form.blade.php ENDPATH**/ ?>