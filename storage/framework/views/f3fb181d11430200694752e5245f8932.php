

<?php $__env->startSection('title', __('admin/common.admin_user')); ?>

<?php $__env->startSection('content'); ?>
  <ul class="nav-bordered nav nav-tabs mb-3">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="<?php echo e(admin_route('admin_users.index')); ?>"><?php echo e(__('admin/common.admin_user')); ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(admin_route('admin_roles.index')); ?>"><?php echo e(__('admin/common.admin_role')); ?></a>
    </li>
  </ul>

  <div id="tax-classes-app" class="card" v-cloak>
    <div class="card-body h-min-600">
      <div class="d-flex justify-content-between mb-4">
        <button type="button" class="btn btn-primary" @click="checkedCreate('add', null)"><?php echo e(__('admin/user.admin_users_create')); ?></button>
      </div>
      <div class="table-push">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th><?php echo e(__('common.name')); ?></th>
              <th><?php echo e(__('common.email')); ?></th>
              <th><?php echo e(__('admin/common.admin_role')); ?></th>
              <th><?php echo e(__('common.created_at')); ?></th>
              <th><?php echo e(__('common.updated_at')); ?></th>
              <th class="text-end"><?php echo e(__('common.action')); ?></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="tax, index in admin_users" :key="index">
              <td>{{ tax.id }}</td>
              <td>{{ tax.name }}</td>
              <td>{{ tax.email }}</td>
              <td>
                <span v-for="role, role_index in tax.roles_name" :key="role_index">
                  {{ role }}
                </span>
              </td>
              <td>{{ tax.created_at }}</td>
              <td>{{ tax.updated_at }}</td>
              <td class="text-end">
                <button class="btn btn-outline-secondary btn-sm" @click="checkedCreate('edit', index)"><?php echo e(__('common.edit')); ?></button>
                <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteCustomer(tax.id, index)"><?php echo e(__('common.delete')); ?></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      
    </div>

    <el-dialog title="<?php echo e(__('admin/common.admin_user')); ?>" :visible.sync="dialog.show" width="600px"
      @close="closeCustomersDialog('form')" :close-on-click-modal="false">

      <el-form ref="form" :rules="rules" :model="dialog.form" label-width="100px">
        <el-form-item label="<?php echo e(__('common.name')); ?>" prop="name">
          <el-input v-model="dialog.form.name" placeholder="<?php echo e(__('common.name')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('common.email')); ?>" prop="email">
          <el-input v-model="dialog.form.email" placeholder="<?php echo e(__('common.email')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('shop/login.password')); ?>" :prop="dialog.form.id === null || dialog.form.id == '' ? 'password' : ''">
          <el-input v-model="dialog.form.password" placeholder="<?php echo e(__('shop/login.password')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('common.language')); ?>">
          <el-select v-model="dialog.form.locale" placeholder="">
            <el-option
              v-for="language in source.languages"
              :key="language.code"
              :label="language.name"
              :value="language.code">
            </el-option>
          </el-select>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/admin_roles.role')); ?>" prop="roles">
          <el-checkbox-group v-model="dialog.form.roles">
            <el-checkbox v-for="roles, index in source.roles" :label="roles.id">{{roles.name}}</el-checkbox>
          </el-checkbox-group>
        </el-form-item>

        <el-form-item class="mt-5">
          <el-button type="primary" @click="addFormSubmit('form')"><?php echo e(__('common.save')); ?></el-button>
          <el-button @click="closeCustomersDialog('form')"><?php echo e(__('common.cancel')); ?></el-button>
        </el-form-item>
      </el-form>
    </el-dialog>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    new Vue({
      el: '#tax-classes-app',

      data: {
        admin_users: <?php echo json_encode($admin_users ?? [], 15, 512) ?>,

        source: {
          all_tax_rates: <?php echo json_encode($all_tax_rates ?? [], 15, 512) ?>,
          roles: <?php echo json_encode($admin_roles ?? [], 15, 512) ?>,
          languages: <?php echo json_encode(locales() ?? [], 15, 512) ?>,
          
        },

        dialog: {
          show: false,
          index: null,
          type: 'add',
          form: {
            id: null,
            name: '',
            email: '',
            locale: <?php echo json_encode($admin_language['code'] ?? 'en', 15, 512) ?>,
            password: '',
            roles: [],
          },
        },

        rules: {
          name: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('common.name')])); ?>', trigger: 'blur'}, ],
          email: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('common.email')])); ?>', trigger: 'blur'}, ],
          password: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('shop/login.password')])); ?>', trigger: 'blur'}, ],
          roles: [{type: 'array', required: true, message: '<?php echo e(__('admin/admin_roles.error_roles')); ?>', trigger: 'blur'}],
        }
      },

      methods: {
        checkedCreate(type, index) {
          this.dialog.show = true
          this.dialog.type = type
          this.dialog.index = index

          if (type == 'edit') {
            let tax = this.admin_users[index];

            this.dialog.form = {
              id: tax.id,
              name: tax.name,
              email: tax.email,
              locale: tax.locale,
              roles: tax.roles.map(e => e.id),
            }
          }
        },

        addFormSubmit(form) {
          const self = this;
          const type = this.dialog.type == 'add' ? 'post' : 'put';
          const url = this.dialog.type == 'add' ? 'admin_users' : 'admin_users/' + this.dialog.form.id;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http[type](url, this.dialog.form).then((res) => {
              this.$message.success(res.message);
              if (this.dialog.type == 'add') {
                this.admin_users.push(res.data)
              } else {
                this.admin_users[this.dialog.index] = res.data
              }
              window.location.reload();
              this.dialog.show = false
            })
          });
        },

        deleteCustomer(id, index) {
          const self = this;
          this.$confirm('<?php echo e(__('common.confirm_delete')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
            cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
            type: 'warning'
          }).then(() => {
            $http.delete('admin_users/' + id).then((res) => {
              this.$message.success(res.message);
              self.admin_users.splice(index, 1)
            })
          }).catch(()=>{})
        },

        closeCustomersDialog(form) {
          this.$refs[form].resetFields();
          Object.keys(this.dialog.form).forEach(key => this.dialog.form[key] = '')
          this.dialog.form.roles = [];
          this.dialog.form.locale =  <?php echo json_encode($admin_language['code'] ?? 'en', 15, 512) ?>;
          this.dialog.show = false
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/admin_users/index.blade.php ENDPATH**/ ?>