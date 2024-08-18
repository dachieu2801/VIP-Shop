

<?php $__env->startSection('title', __('admin/common.admin_user')); ?>

<?php $__env->startSection('content'); ?>
  <ul class="nav-bordered nav nav-tabs mb-3">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(admin_route('admin_users.index')); ?>"><?php echo e(__('admin/common.admin_user')); ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="<?php echo e(admin_route('admin_roles.index')); ?>"><?php echo e(__('admin/common.admin_role')); ?></a>
    </li>
  </ul>

  <div id="tax-classes-app" class="card">
    <div class="card-body h-min-600">
      <div class="d-flex justify-content-between mb-4">
        <a href="<?php echo e(admin_route('admin_roles.create')); ?>"
          class="btn btn-primary"><?php echo e(__('admin/role.admin_roles_create')); ?></a>
      </div>
      <div class="table-push">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th><?php echo e(__('common.name')); ?></th>
              <th><?php echo e(__('common.created_at')); ?></th>
              <th><?php echo e(__('common.updated_at')); ?></th>
              <th class="text-end"><?php echo e(__('common.action')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php if(count($roles)): ?>
              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($role->id); ?></td>
                  <td><?php echo e($role->name); ?></td>
                  <td><?php echo e($role->created_at); ?></td>
                  <td><?php echo e($role->updated_at); ?></td>
                  <td class="text-end">
                    <a href="<?php echo e(admin_route('admin_roles.edit', [$role->id])); ?>"
                      class="btn btn-outline-secondary btn-sm"><?php echo e(__('common.edit')); ?></a>
                    <button class="btn btn-outline-danger btn-sm ml-1 delete-role" data-id="<?php echo e($role->id); ?>"
                      type="button"><?php echo e(__('common.delete')); ?></button>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="border-0"><?php if (isset($component)) { $__componentOriginal5e41293ba75edb5b6791bae671134304 = $component; } ?>
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
<?php endif; ?></td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    $('.delete-role').click(function(event) {
      const id = $(this).data('id');
      const self = $(this);

      layer.confirm('<?php echo e(__('common.confirm_delete')); ?>', {
        title: "<?php echo e(__('common.text_hint')); ?>",
        btn: ['<?php echo e(__('common.cancel')); ?>', '<?php echo e(__('common.confirm')); ?>'],
        area: ['400px'],
        btn2: () => {
          $http.delete(`admin_roles/${id}`).then((res) => {
            layer.msg(res.message);
            self.parents('tr').remove()
          })
        }
      })
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/admin_roles/index.blade.php ENDPATH**/ ?>