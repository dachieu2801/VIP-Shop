

<?php $__env->startSection('title', 'Sản phẩm bán chạy'); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/vue/Sortable.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/vue/vuedraggable.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/tinymce/5.9.1/tinymce.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

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
            <form novalidate class="needs-validation" action=""
            method="POST" id="app">
       
                <?php if (isset($component)) { $__componentOriginal1b48936358e72618543915217d3ed939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b48936358e72618543915217d3ed939 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.row','data' => ['title' => 'Sản phẩm bán chạy']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Sản phẩm bán chạy']); ?>
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
                        <div><?php echo e(json_encode($allRecords)); ?></div>
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
                        <button type="submit" class="btn  btn-primary btn-submit mt-3 btn-lg"><?php echo e(__('common.save')); ?></button>
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
            
            <?php $__env->stopSection(); ?>
            <?php $__env->startPush('footer'); ?>
            <script>
             
            var app = new Vue({
                    el: '#app',
                    data: {
                        relations: {
                            keyword: '',
                            products: <?php echo json_encode($allRecords ?? [], 15, 512) ?>,
                            loading: null,
                },
            // other data properties...
                        },
                    methods:{
                        relationsQuerySearch(keyword, cb) {
                            $http.get('products/autocomplete?name=' + encodeURIComponent(keyword), null, {hload:true}).then((res) => {cb(res.data);})
                    },


                        relationsHandleSelect(item) {
                            if (!this.relations.products.find(v => v == item.product_id))
                            {
                                this.relations.products.push(item);
                            }         
                                this.relations.keyword = ""
                    },

                    relationsRemoveProduct(index) {
                                this.relations.products.splice(index, 1);
                    },
                            }
                                })
            </script>
            <?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/bestSelling/index.blade.php ENDPATH**/ ?>