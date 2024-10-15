

<?php $__env->startSection('title', __('admin/page.index')); ?>

<?php $__env->startSection('body-class', 'page-pages-form'); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/tinymce/5.9.1/tinymce.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('page-bottom-btns'); ?>
  <button type="button" class="w-min-100 btn btn-primary submit-form btn-lg" form="form-page"><?php echo e(__('common.save')); ?></button>
  <button class="btn btn-lg btn-default w-min-100 ms-3" onclick="bk.back()"><?php echo e(__('common.return')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <ul class="nav nav-tabs nav-bordered mb-3" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-content" type="button" ><?php echo e(__('admin/product.basic_information')); ?></button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-data" type="button"><?php echo e(__('common.data')); ?></button>
    </li>
  </ul>

  <div id="app" class="card h-min-600">
    <div class="card-body">
      <form novalidate id="form-page" class="needs-validation" action="<?php echo e($page->id ? admin_route('pages.update', [$page->id]) : admin_route('pages.store')); ?>" method="POST">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab-content">
            <?php echo csrf_field(); ?>
            <?php echo method_field($page->id ? 'PUT' : 'POST'); ?>
            <ul class="nav nav-tabs mb-3" role="tablist">
              <?php $__currentLoopData = locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item" role="presentation">
                  <button class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>" data-bs-toggle="tab" data-bs-target="#tab-<?php echo e($language['code']); ?>" type="button" ><?php echo e($language['name']); ?></button>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="tab-content">
              <?php $__currentLoopData = locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade <?php echo e($loop->first ? 'show active' : ''); ?>" id="tab-<?php echo e($language['code']); ?>">
                  <?php
                    $error_title = $errors->first("descriptions.{$language['code']}.title");
                  ?>
                  <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['error' => ''.e($error_title).'','name' => 'descriptions['.e($language['code']).'][title]','title' => ''.e(__('admin/page.info_title')).'','required' => true,'value' => ''.e(old('descriptions.' . $language['code'] . '.title', $descriptions[$language['code']]['title'] ?? '')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                  <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('page_category.text_summary')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('page_category.text_summary')).'']); ?>
                    <div class="input-group w-max-400">
                      <textarea rows="3" type="text" name="descriptions[<?php echo e($language['code']); ?>][summary]" class="form-control wp-400 <?php echo e($errors->has("descriptions.{$language['code']}.summary") ? 'is-invalid' : ''); ?>" placeholder="<?php echo e(__('page_category.text_summary')); ?>"><?php echo e(old('descriptions.' . $language['code'] . '.summary', $descriptions[$language['code']]['summary'] ?? '')); ?></textarea>
                    </div>
                    <?php if($errors->has("descriptions.{$language['code']}.summary")): ?>
                      <span class="invalid-feedback d-block" role="alert"><?php echo e($errors->first("descriptions.{$language['code']}.summary")); ?></span>
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

                  <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('admin/page.info_content')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('admin/page.info_content')).'','required' => true]); ?>
                    <div class="w-max-1000">
                      <textarea name="descriptions[<?php echo e($language['code']); ?>][content]" data-tinymce-height="600" class="form-control tinymce">
                        <?php echo e(old('descriptions.' . $language['code'] . '.content', $descriptions[$language['code']]['content'] ?? '')); ?>

                      </textarea>
                    </div>
                    <?php if($errors->has("descriptions.{$language['code']}.content")): ?>
                      <span class="invalid-feedback d-block" role="alert"><?php echo e($errors->first("descriptions.{$language['code']}.content")); ?></span>
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

                  <input type="hidden" name="descriptions[<?php echo e($language['code']); ?>][locale]" value="<?php echo e($language['code']); ?>">
                  <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'descriptions['.e($language['code']).'][meta_title]','title' => ''.e(__('admin/setting.meta_title')).'','value' => ''.e(old('descriptions.' . $language['code'] . '.meta_title', $descriptions[$language['code']]['meta_title'] ?? '')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'descriptions['.e($language['code']).'][meta_description]','title' => ''.e(__('admin/setting.meta_description')).'','value' => ''.e(old('descriptions.' . $language['code'] . '.meta_description', $descriptions[$language['code']]['meta_description'] ?? '')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'descriptions['.e($language['code']).'][meta_keywords]','title' => ''.e(__('admin/setting.meta_keywords')).'','value' => ''.e(old('descriptions.' . $language['code'] . '.meta_keywords', $descriptions[$language['code']]['meta_keywords'] ?? '')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.page.edit.base.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            </div>
          </div>
          <div class="tab-pane fade" id="tab-data">
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.page.data.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

            <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'author','title' => ''.e(__('page_category.author')).'','value' => ''.e(old('author', $page->author ?? '')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => ''.e(__('admin/page_category.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('admin/page_category.index')).'']); ?>
              <div class="wp-400">
                <el-autocomplete
                v-model="page_category_name"
                value-key="name"
                size="small"
                name="category_name"
                class="w-100"
                :fetch-suggestions="(keyword, cb) => {relationsQuerySearch(keyword, cb, 'page_categories')}"
                placeholder="<?php echo e(__('common.input')); ?>"
                @select="(e) => {handleSelect(e, 'page_categories')}"
                ></el-autocomplete>
                <input type="hidden" name="page_category_id" :value="page_category_name ? page_category_id : ''" />
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

            <?php if (isset($component)) { $__componentOriginal2bdd100b138485f397cdd769977f45a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2bdd100b138485f397cdd769977f45a6 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Image::resolve(['name' => 'image','title' => ''.e(__('admin/page.cover_picture')).'','value' => ''.e(old('image', $page->image ?? '')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-form-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Form\Image::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
              <div class="help-text font-size-12 lh-base"><?php echo e(__('common.recommend_size')); ?>: 500*350</div>
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

            <?php if (isset($component)) { $__componentOriginal9779c7c6189b71f1c04f0551cbef988b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9779c7c6189b71f1c04f0551cbef988b = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\Input::resolve(['name' => 'views','title' => ''.e(__('page_category.views')).'','value' => ''.e(old('views', $page->views ?? '')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    :fetch-suggestions="(keyword, cb) => {relationsQuerySearch(keyword, cb, 'products')}"
                    placeholder="<?php echo e(__('admin/builder.modules_keywords_search')); ?>"
                    @select="(e) => {handleSelect(e, 'product_relations')}"
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
                          <input type="text" :name="'products['+ index +']'" v-model="item.id" class="form-control d-none">
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

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.page.data.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

            <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['name' => 'active','title' => ''.e(__('common.status')).'','value' => ''.e(old('active', $page->active ?? 1)).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
          </div>
        </div>

        <button type="submit" class="d-none"><?php echo e(__('common.save')); ?></button>
      </form>
    </div>
  </div>

   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.page.form.footer",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
<script>
  var app = new Vue({
    el: '#app',

    data: {
      relations: {
        keyword: '',
        products: [],
        loading: null,
      },
      page_category_name: '<?php echo e(old('category_name', $page->category->description->title ?? '')); ?>',
      page_category_id: '<?php echo e(old('categories_id', $page->category->id ?? '')); ?>',
    },

    created() {
      const products = <?php echo json_encode($page['products'] ?? [], 15, 512) ?>;

      if (products.length) {
        this.relations.products = products.map(v => {
          return {
            id: v.id,
            name: v.description.name,
          }
        })
      }
    },

    methods: {
      relationsQuerySearch(keyword, cb, url) {
        $http.get(url + '/autocomplete?name=' + encodeURIComponent(keyword), null, {hload:true}).then((res) => {
          cb(res.data);
        })
      },
      handleSelect(item, key) {
        if (key == 'product_relations') {
          if (!this.relations.products.find(v => v == item.id)) {
            this.relations.products.push(item);
          }
          this.relations.keyword = ""
        } else {
          this.page_category_name = item.name
          this.page_category_id = item.id
        }
      },
      relationsRemoveProduct(index) {
        this.relations.products.splice(index, 1);
      },
    }
  })
</script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/pages/form.blade.php ENDPATH**/ ?>