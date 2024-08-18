

<?php $__env->startSection('title', __('admin/admin_roles.role_management')); ?>

<?php $__env->startSection('content'); ?>
  <div id="app" class="card" v-cloak>
    <div class="card-body h-min-600">
      <el-form ref="form" :rules="rules" :model="form" label-width="100px">
        <el-form-item label="<?php echo e(__('admin/admin_roles.role_name')); ?>" prop="name">
          <el-input v-model="form.name" placeholder="<?php echo e(__('admin/admin_roles.role_name')); ?>" class="w-auto"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/admin_roles.permission')); ?>" prop="roles">
          <div class="roles-wrap border w-max-900">
            <div class="bg-dark p-2 text-dark bg-opacity-10 px-2">
              <el-button size="small" @click="updateAllState('core_permissions', true)"><?php echo app('translator')->get('admin/admin_roles.select_all'); ?></el-button>
              <el-button size="small" @click="updateAllState('core_permissions', false)"><?php echo app('translator')->get('admin/admin_roles.unselect_all'); ?></el-button>
            </div>
            <div v-for="role, index in form.core_permissions" :key="index">
              <div class="bg-light px-2 d-flex">
                {{ role.title }}
                <div class="row-update ms-2 link-secondary">[<span @click="updateState('core_permissions', true, index)"><?php echo e(__('common.select_all')); ?></span> / <span @click="updateState('core_permissions', false, index)"><?php echo e(__('common.cancel')); ?></span>]</div>
              </div>
              <div class="role-methods">
                <div class="d-flex flex-wrap px-3">
                  <div v-for="method,index in role.permissions" class="me-3">
                    <el-checkbox class="text-dark" v-model="method.selected">{{ method.name }}</el-checkbox>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/admin_roles.plugin_permission')); ?>" prop="roles" v-if="form.plugin_permissions.length">
          <div class="roles-wrap border w-max-900">
            <div class="bg-dark p-2 text-dark bg-opacity-10 px-2">
              <el-button size="small" @click="updateAllState('plugin_permissions', true)"><?php echo app('translator')->get('admin/admin_roles.select_all'); ?></el-button>
              <el-button size="small" @click="updateAllState('plugin_permissions', false)"><?php echo app('translator')->get('admin/admin_roles.unselect_all'); ?></el-button>
            </div>
            <div v-for="role, index in form.plugin_permissions" :key="index">
              <div class="bg-light px-2 d-flex">
                {{ role.title }}
                <div class="row-update ms-2 link-secondary">[<span @click="updateState('plugin_permissions', true, index)"><?php echo e(__('common.select_all')); ?></span> / <span @click="updateState('plugin_permissions', false, index)"><?php echo e(__('common.cancel')); ?></span>]</div>
              </div>
              <div class="role-methods">
                <div class="d-flex flex-wrap px-3">
                  <div v-for="method,index in role.permissions" class="me-3">
                    <el-checkbox class="text-dark" v-model="method.selected">{{ method.name }}</el-checkbox>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </el-form-item>

        <el-form-item class="mt-5">
          <el-button type="primary" @click="addFormSubmit('form')"><?php echo e(__('common.save')); ?></el-button>
          <el-button @click="closeCustomersDialog('form')"><?php echo e(__('common.cancel')); ?></el-button>
        </el-form-item>
      </el-form>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    new Vue({
      el: '#app',

      data: {
        form: {
          id: <?php echo json_encode($role->id ?? null, 15, 512) ?>,
          name: <?php echo json_encode($role->name ?? '', 15, 512) ?>,
          core_permissions: <?php echo json_encode($core_permissions ?? [], 15, 512) ?>,
          plugin_permissions: <?php echo json_encode($plugin_permissions ?? [], 15, 512) ?>,
        },

        source: {

        },

        rules: {
          name: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('admin/admin_roles.role_name')])); ?>',trigger: 'blur'}, ],
        }
      },

      beforeMount() {
        // this.source.languages.forEach(e => {
        //   this.$set(this.form.name, e.code, '')
        //   this.$set(this.form.description, e.code, '')
        // })
      },

      methods: {
        updateState(key, type, index) {
          this.form[key][index].permissions.map(e => e.selected = !!type)
        },

        updateAllState(key, type) {
          this.form[key].forEach(e => {
            e.permissions.forEach(method => {
              method.selected = !!type
            });
          });
        },

        addFormSubmit(form) {
          const self = this;
          const type = this.form.id == null ? 'post' : 'put';
          const url = this.form.id == null ? 'admin_roles' : 'admin_roles/' + this.form.id;

          this.$refs[form].validate((valid) => {
            // this.form.permissions.forEach(e => {
            //   e.permissions = e.permissions.filter(x => x.selected).map(j => j.code)
            // });

            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http[type](url, this.form).then((res) => {
              layer.msg(res.message);
              location = '<?php echo e(admin_route('admin_roles.index')); ?>'
            })
          });
        },
      }
    })
  </script>

  <style>
    .roles-wrap .el-checkbox.text-dark .el-checkbox__label {
      font-size: 12px;
      padding-left: 6px;
    }

    .row-update {
      cursor: pointer;
      font-size: 12px;
    }
  </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/admin_roles/edit.blade.php ENDPATH**/ ?>