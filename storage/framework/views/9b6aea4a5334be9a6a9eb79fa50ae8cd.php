

<?php $__env->startSection('title', __('admin/common.category')); ?>

<?php $__env->startSection('body-class', 'page-categories'); ?>

<?php $__env->startSection('content'); ?>
  <div id="category-app" class="card h-min-600">
    <div class="card-body">
      <a href="<?php echo e(admin_route('categories.create')); ?>" class="btn btn-primary"><?php echo e(__('admin/category.categories_create')); ?></a>
       <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.categories.create.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
      <div class="mt-4" style="" v-if="categories.length">
        <el-tree :data="categories" node-key="id" ref="tree">
          <div class="custom-tree-node d-flex gap-2 align-items-center justify-content-between w-100" slot-scope="{ node, data }">
            <div><span class="text-wrap">{{ data.id }} - {{ data.name }}</span></div>
            <div class="d-flex align-items-center">
              <span class="me-4 badge bg-success" v-if="data.active"><?php echo e(__('common.enabled')); ?></span>
              <span class="me-4 badge bg-secondary" v-else><?php echo e(__('common.disabled')); ?></span>
              <div>
                <a :href="data.url_edit" class="btn btn-outline-secondary btn-sm"><?php echo e(__('common.edit')); ?></a>
                <a class="btn btn-outline-danger btn-sm" @click="removeCategory(node, data)"><?php echo e(__('common.delete')); ?></a>
              </div>
            </div>
          </div>
        </el-tree>
      </div>
      <div v-else><?php if (isset($component)) { $__componentOriginal5e41293ba75edb5b6791bae671134304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e41293ba75edb5b6791bae671134304 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\NoData::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\NoData::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e41293ba75edb5b6791bae671134304)): ?>
<?php $attributes = $__attributesOriginal5e41293ba75edb5b6791bae671134304; ?>
<?php unset($__attributesOriginal5e41293ba75edb5b6791bae671134304); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e41293ba75edb5b6791bae671134304)): ?>
<?php $component = $__componentOriginal5e41293ba75edb5b6791bae671134304; ?>
<?php unset($__componentOriginal5e41293ba75edb5b6791bae671134304); ?>
<?php endif; ?></div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    let category_app = new Vue({
      el: '#category-app',
      data: {
        categories: <?php echo json_encode($categories, 15, 512) ?>,
        defaultProps: {
          children: 'children',
          label: 'name'
        }
      },

      methods: {
        removeCategory(node, data) {
          this.$confirm('<?php echo e(__('common.confirm_delete')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
            cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
            type: 'warning'
          }).then(() => {
            $http.delete(`/categories/${data.id}`).then((res) => {
              layer.msg(res.message);
              this.$refs.tree.remove(data.id)
            })
          }).catch(()=>{})
        },
      }
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/categories/index.blade.php ENDPATH**/ ?>