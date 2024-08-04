

<?php $__env->startSection('title', __('admin/common.multi_filter_index')); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body h-min-600">
    <form action="<?php echo e(admin_route('multi_filter.store')); ?>" class="needs-validation" novalidate method="POST" id="app">
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
      <h6 class="border-bottom pb-3 mb-4"><?php echo e(__('common.data')); ?></h6>

      <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => __('admin/setting.filter_attribute')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('admin/setting.filter_attribute'))]); ?>
        <div class="module-edit-group wp-600">
          <div class="autocomplete-group-wrapper">
            <el-autocomplete class="inline-input" v-model="multi_filter.keyword" value-key="name" size="small"
              :fetch-suggestions="(keyword, cb) => {attributesQuerySearch(keyword, cb, 'products')}"
              placeholder="<?php echo e(__('admin/builder.modules_keywords_search')); ?>"
              @select="(e) => {handleSelect(e, 'product_attributes')}"></el-autocomplete>

            <div class="item-group-wrapper" v-loading="multi_filter.loading">
              <div v-for="(item, index) in multi_filter.filters.attribute" :key="index" class="item">
                <div>
                  <i class="el-icon-s-unfold"></i>
                  <span>{{ item.name }}</span>
                </div>
                <i class="el-icon-delete right" @click="attributesRemoveProduct(index)"></i>
                <input type="text" :name="'multi_filter[attribute]['+ index +']'" v-model="item.id"
                  class="form-control d-none">
              </div>
            </div>
            <div class="help-text font-size-12 lh-base"><?php echo e(__('admin/setting.multi_filter_helper')); ?></div>
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

      <?php if (isset($component)) { $__componentOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25bd75d7700e74c748b2a7c7586ce7b0 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Form\SwitchRadio::resolve(['name' => 'multi_filter[price_filter]','title' => __('admin/multi_filter.price_filter'),'value' => old('price_filter', $multi_filter['price_filter'] ?? 1)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => '']); ?>
        <button class="btn btn-lg btn-primary mt-5"><?php echo e(__('common.save')); ?></button>
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

<?php $__env->startPush('footer'); ?>
  <script>
    let app = new Vue({
      el: '#app',
      data: {
        multi_filter: {
          keyword: '',
          filters: <?php echo json_encode($multi_filter ?? null, 15, 512) ?>,
          loading: null,
        },

        source: {
          mailEngines: [
            {name: '<?php echo e(__('admin/builder.text_no')); ?>', code: ''},
            {name: 'SMTP', code: 'smtp'},
            {name: 'Sendmail', code: 'sendmail'},
            {name: 'Mailgun', code: 'mailgun'},
            {name: 'Log', code: 'log'},
          ]
        },
      },
      methods: {
        attributesQuerySearch(keyword, cb, url) {
          $http.get('attributes/autocomplete?name=' + encodeURIComponent(keyword), null, {hload:true}).then((res) => {
            cb(res.data);
          })
        },

        attributesRemoveProduct(index) {
          this.multi_filter.filters.attribute.splice(index, 1);
        },

        handleSelect(item, key) {
          if (key == 'product_attributes') {
            if (!this.multi_filter.filters.attribute.find(v => v.id * 1 == item.id * 1)) {
              this.multi_filter.filters.attribute.push(item);
            } else {
              layer.msg('<?php echo e(__('common.no_repeat')); ?>', () => {})
            }

            this.multi_filter.keyword = ""
          }
        },
      }
    });
  </script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\team-free-lance\shop-freelance\resources\/beike/admin/views/pages/multi_filter/index.blade.php ENDPATH**/ ?>