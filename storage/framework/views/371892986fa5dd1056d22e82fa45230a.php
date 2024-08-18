

<?php $__env->startSection('title', __('admin/common.language')); ?>

<?php $__env->startSection('content'); ?>
  <div id="tax-classes-app" class="card" v-cloak>
    <div class="card-body h-min-600">
      
        
      
      <div class="mb-3 alert alert-info"><?php echo e(__('admin/language.help_install')); ?></div>
      <table class="table">
        <thead>
          <tr>
            <th><?php echo e(__('common.name')); ?></th>

            
            <th><?php echo e(__('common.sort_order')); ?></th>
            <th class="text-end"><?php echo e(__('common.action')); ?></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="language, index in languages" :key="index">
            <td>
              {{ language.name }}
              <span class="badge bg-success" v-if="settingLocale == language.code"><?php echo e(__('common.default')); ?></span>
            </td>

            
            <td>{{ language.sort_order }}</td>
            <td class="text-end">
              <div v-if="language.id">
                <button class="btn btn-outline-secondary btn-sm" @click="checkedCreate('edit', index)"><?php echo e(__('common.edit')); ?></button>
                <button :disabled="settingLocale == language.code" class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteItem(language.id, index)"><?php echo e(__('admin/common.uninstall')); ?></button>
              </div>
              <div v-else>
                <button class="btn btn-outline-success btn-sm" @click="install(language.code, language.name, index)"><?php echo e(__('admin/common.install')); ?></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <el-dialog title="<?php echo e(__('admin/common.language')); ?>" :visible.sync="dialog.show" width="500px"
      @close="closeCustomersDialog('form')" :close-on-click-modal="false">

      <el-form ref="form" :rules="rules" :model="dialog.form" label-width="100px">
        <el-form-item label="<?php echo e(__('common.name')); ?>">
          <el-input v-model="dialog.form.name" :disabled="true" placeholder="<?php echo e(__('common.name')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('currency.code')); ?>">
          <el-input v-model="dialog.form.code" :disabled="true" placeholder="<?php echo e(__('currency.code')); ?>"></el-input>
        </el-form-item>

        

        <el-form-item label="<?php echo e(__('common.sort_order')); ?>">
          <el-input v-model="dialog.form.sort_order" placeholder="<?php echo e(__('common.sort_order')); ?>"></el-input>
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
  <?php echo $__env->make('admin::shared.vue-image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <script>
    new Vue({
      el: '#tax-classes-app',

      data: {
        languages: <?php echo json_encode($languages ?? [], 15, 512) ?>,
        settingLocale: <?php echo json_encode(system_setting('base.locale') ?? 'zh_cn', 15, 512) ?>,

        dialog: {
          show: false,
          index: null,
          type: 'add',
          form: {
            name: '',
            code: '',
            // image: '',
            sort_order: '',
          },
        },

        rules: {
          // name: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('common.name')])); ?>',trigger: 'blur'}, ],
          // code: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('currency.code')])); ?>',trigger: 'blur'}, ],
          // image: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('currency.icon')])); ?>',trigger: 'blur'}, ],
        }
      },

      methods: {
        checkedCreate(type, index) {
          this.dialog.show = true
          this.dialog.type = type
          this.dialog.index = index

          if (type == 'edit') {
            this.dialog.form = JSON.parse(JSON.stringify(this.languages[index]));
          }
        },

        addFormSubmit(form) {
          const self = this;
          const type = this.dialog.type == 'add' ? 'post' : 'put';
          const url = this.dialog.type == 'add' ? 'languages' : 'languages/' + this.dialog.form.id;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http[type](url, this.dialog.form).then((res) => {
              this.$message.success(res.message);
              if (this.dialog.type == 'add') {
                this.languages.push(res.data)
              } else {
                this.languages[this.dialog.index] = res.data
              }

              this.dialog.show = false
            })
          });
        },

        install(code, name, index) {
          $http.post('languages', {name, code}).then((res) => {
            this.languages[index] = res.data;
            this.$message.success(res.message);
            this.$forceUpdate();
          })
        },

        deleteItem(id, index) {
          $http.delete('languages/' + id).then((res) => {
            this.$message.success(res.message);
            this.languages[index].id = 0;
            this.$forceUpdate();
          })
        },

        closeCustomersDialog(form) {
          this.$refs[form].resetFields();
          Object.keys(this.dialog.form).forEach(key => this.dialog.form[key] = '')
          this.dialog.show = false
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/languages/index.blade.php ENDPATH**/ ?>