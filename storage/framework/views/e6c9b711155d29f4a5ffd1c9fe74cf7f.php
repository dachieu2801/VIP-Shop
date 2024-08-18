

<?php $__env->startSection('title', __('admin/page.index')); ?>

<?php $__env->startSection('content'); ?>

<?php if($errors->has('error')): ?>
<?php if (isset($component)) { $__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Alert::resolve(['type' => 'danger','msg' => ''.e($errors->first('error')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

<div class="card">
  <div class="card-body h-min-600">
    <div class="d-flex justify-content-between mb-4">
      <a href="<?php echo e(admin_route('pages.create')); ?>" class="btn btn-primary"><?php echo e(__('common.add')); ?></a>
    </div>
    <div class="table-push">
      <?php if(count($pages_format)): ?>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th><?php echo e(__('common.title')); ?></th>
            <th><?php echo e(__('common.status')); ?></th>
            <th><?php echo e(__('common.created_at')); ?></th>
            <th><?php echo e(__('common.updated_at')); ?></th>
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.page.list.column",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            <th class="text-end"><?php echo e(__('common.action')); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $pages_format; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($page['id']); ?></td>
            <td>
              <div title="<?php echo e($page['title'] ?? ''); ?>"><a class="text-dark"
                  href="<?php echo e(shop_route('pages.show', $page['id'])); ?>" target="_blank"><?php echo e($page['title_format'] ?? ''); ?></a></div>
            </td>
            <td class="<?php echo e($page['active'] ? 'text-success' : 'text-secondary'); ?>">
              <?php echo e($page['active'] ? __('common.enable') : __('common.disable')); ?>

            </td>
            <td><?php echo e($page['created_at']); ?></td>
            <td><?php echo e($page['updated_at']); ?></td>
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.page.list.column_value",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            <td class="text-end">
              <a href="<?php echo e(admin_route('pages.edit', [$page['id']])); ?>" class="mb-1 text-nowrap btn btn-outline-secondary btn-sm"><?php echo e(__('common.edit')); ?></a>
              <button class="btn btn-outline-danger btn-sm delete-btn mb-1" type='button' data-id="<?php echo e($page['id']); ?>"><?php echo e(__('common.delete')); ?></button>
               <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.page.list.action",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <?php else: ?>
        <div><?php if (isset($component)) { $__componentOriginal5e41293ba75edb5b6791bae671134304 = $component; } ?>
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
      <?php endif; ?>
    </div>

    <?php echo e($pages->links('admin::vendor/pagination/bootstrap-4')); ?>

  </div>
</div>

 <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.page.list.content.footer",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
<script>
  $('.delete-btn').click(function(event) {
    const id = $(this).data('id');
    const self = $(this);

    layer.confirm('<?php echo e(__('common.confirm_delete')); ?>', {
      title: "<?php echo e(__('common.text_hint')); ?>",
      btn: ['<?php echo e(__('common.cancel')); ?>', '<?php echo e(__('common.confirm')); ?>'],
      area: ['400px'],
      btn2: () => {
        $http.delete(`pages/${id}`).then((res) => {
          layer.msg(res.message);
          window.location.reload();
        })
      }
    })
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/pages/index.blade.php ENDPATH**/ ?>