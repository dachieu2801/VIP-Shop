

<?php $__env->startSection('title', __('admin/plugin.plugins_show')); ?>

<?php $__env->startSection('content'); ?>
  <div class="card h-min-600">
    <div class="card-body">
      <h6 class="border-bottom pb-3 mb-4"><?php echo e($plugin->getLocaleName()); ?></h6>

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
                    $__hook_name="admin.plugin.form";
                    ob_start();
                ?>
        <form class="needs-validation" novalidate action="<?php echo e(admin_route('plugins.update', [$plugin->code])); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo e(method_field('put')); ?>


          <?php $__currentLoopData = $plugin->getColumns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($column['type'] == 'string'): ?>
              <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => $column['name'],'title' => $column['label'],'placeholder' => $column['placeholder'] ?? '','description' => $column['description'] ?? '','error' => $errors->first($column['name']),'required' => $column['required'] ? true : false,'value' => old($column['name'], $column['value'] ?? '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <?php endif; ?>

              <?php if($column['type'] == 'number'): ?>
                <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => $column['name'],'type' => $column['type'],'title' => $column['label'],'placeholder' => $column['placeholder'] ?? '','description' => $column['description'] ?? '','error' => $errors->first($column['name']),'required' => $column['required'] ? true : false,'value' => old($column['name'], $column['value'] ?? '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
              <?php endif; ?>

            <?php if($column['type'] == 'string-multiple'): ?>
              <?php if (isset($component)) { $__componentOriginala681672db39a7b0a9f0cb6f3c0615226 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala681672db39a7b0a9f0cb6f3c0615226 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\InputLocale::resolve(['name' => $column['name'].'.*','title' => $column['label'],'placeholder' => $column['placeholder'] ?? '','required' => $column['required'] ? true : false,'value' => old($column['name'], $column['value'] ?? '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-input-locale'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\InputLocale::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first($column['name']))]); ?>
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
            <?php endif; ?>

            <?php if($column['type'] == 'select'): ?>
              <?php if (isset($component)) { $__componentOriginaleff91ade87f65c4b8fb64ccedab31269 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleff91ade87f65c4b8fb64ccedab31269 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Select::resolve(['name' => $column['name'],'title' => $column['label'],'value' => old($column['name'], $column['value'] ?? ''),'options' => $column['options']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if(isset($column['description'])): ?>
                  <div class="help-text font-size-12 lh-base"><?php echo e($column['description']); ?></div>
                <?php endif; ?>
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

            <?php if($column['type'] == 'bool'): ?>
              <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['name' => $column['name'],'title' => $column['label'],'value' => old($column['name'], $column['value'] ?? '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\SwitchRadio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if(isset($column['description'])): ?>
                  <div class="help-text font-size-12 lh-base"><?php echo e($column['description']); ?></div>
                <?php endif; ?>
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
            <?php endif; ?>

            <?php if($column['type'] == 'textarea'): ?>
              <?php if (isset($component)) { $__componentOriginal40654600a7b895811c24f44ff1ca6373 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40654600a7b895811c24f44ff1ca6373 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Textarea::resolve(['name' => $column['name'],'title' => $column['label'],'required' => $column['required'] ? true : false,'value' => old($column['name'], $column['value'] ?? '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if(isset($column['description'])): ?>
                  <div class="help-text font-size-12 lh-base"><?php echo e($column['description']); ?></div>
                <?php endif; ?>
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
            <?php endif; ?>

            <?php if($column['type'] == 'rich-text'): ?>
              <?php if (isset($component)) { $__componentOriginala0026a716172d73bbe702eb3db216cf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala0026a716172d73bbe702eb3db216cf4 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\RichText::resolve(['name' => $column['name'],'title' => $column['label'],'value' => old($column['name'], $column['value'] ?? ''),'required' => $column['required'] ? true : false,'multiple' => $column['multiple'] ?? false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-rich-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\RichText::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if(isset($column['description'])): ?>
                  <div class="help-text font-size-12 lh-base"><?php echo e($column['description']); ?></div>
                <?php endif; ?>
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala0026a716172d73bbe702eb3db216cf4)): ?>
<?php $attributes = $__attributesOriginala0026a716172d73bbe702eb3db216cf4; ?>
<?php unset($__attributesOriginala0026a716172d73bbe702eb3db216cf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0026a716172d73bbe702eb3db216cf4)): ?>
<?php $component = $__componentOriginala0026a716172d73bbe702eb3db216cf4; ?>
<?php unset($__componentOriginala0026a716172d73bbe702eb3db216cf4); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if($column['type'] == 'checkbox'): ?>
              <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => $column['label'],'required' => $column['required'] ? true : false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column['label']),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column['required'] ? true : false)]); ?>
                <div class="form-checkbox">
                  <?php $__currentLoopData = $column['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="form-check d-inline-block mt-2 me-3">
                    <input
                      class="form-check-input"
                      name="<?php echo e($column['name']); ?>[]"
                      type="checkbox"
                      value="<?php echo e(old($column['name'], $item['value'])); ?>"
                      <?php echo e(in_array($item['value'], old($column['name'], json_decode($column['value'] ?? '[]', true))) ? 'checked' : ''); ?>

                      id="flexCheck-<?php echo e($column['name']); ?>-<?php echo e($loop->index); ?>">
                    <label class="form-check-label" for="flexCheck-<?php echo e($column['name']); ?>-<?php echo e($loop->index); ?>">
                      <?php echo e($item['label']); ?>

                    </label>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if(isset($column['description'])): ?>
                  <div class="help-text font-size-12 lh-base"><?php echo e($column['description']); ?></div>
                <?php endif; ?>
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
            <?php endif; ?>

            <?php if($column['type'] == 'string_group'): ?>
              <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => $column['label'],'required' => $column['required'] ? true : false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column['label']),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column['required'] ? true : false)]); ?>
                <div class="input-group wp-400">
                  <?php if($column['left'] ?? false): ?>
                  <span class="input-group-text"><?php echo e($column['left']); ?></span>
                  <?php endif; ?>
                  <input type="text" class="form-control <?php echo e($errors->first($column['name']) ? 'is-invalid' : ''); ?>" name="<?php echo e($column['name']); ?>" value="<?php echo e(old($column['name'], $column['value'] ?? '')); ?>" placeholder="<?php echo e($column['placeholder'] ?? ''); ?>">
                  <?php if($column['right'] ?? false): ?>
                  <span class="input-group-text"><?php echo e($column['right']); ?></span>
                  <?php endif; ?>
                </div>
                <?php if($errors->first($column['name'])): ?>
                  <div class="invalid-feedback d-block"><?php echo e($errors->first($column['name'])); ?></div>
                <?php endif; ?>

                <?php if(isset($column['description'])): ?>
                  <div class="help-text font-size-12 lh-base"><?php echo e($column['description']); ?></div>
                <?php endif; ?>
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
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
            <button type="submit" class="btn btn-primary btn-lg mt-4"><?php echo e(__('common.submit')); ?></button>
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


<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    $(function () {
      $('.form-checkbox input[type="checkbox"]').on('change', function () {
        const isAllUnchecked = $(this).parents('.form-checkbox').find('input[type="checkbox"]:checked').length === 0;
        const name = $(this).attr('name');

        if (isAllUnchecked) {
          $(this).parents('.form-checkbox').append(`<input type="hidden" name="${name}" class="placeholder-input" value="">`);
        } else {
          $(this).parents('.form-checkbox').find('.placeholder-input').remove();
        }
      });
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/plugins/form.blade.php ENDPATH**/ ?>