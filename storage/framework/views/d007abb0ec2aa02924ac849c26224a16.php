

<?php $__env->startSection('title', __('admin/common.currency')); ?>

<?php $__env->startSection('page-bottom-btns'); ?>
  <a href="<?php echo e(admin_route('settings.index')); ?>?tab=tab-checkout&line=rate_api_key" class="btn w-min-100 btn-outline-info" target="_blank"><?php echo e(__('admin/setting.rate_api_key')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div id="tax-classes-app" class="card" v-cloak>
    <div class="card-body h-min-600">
      <div class="d-flex justify-content-between mb-4">
        <button type="button" class="btn btn-primary" @click="checkedCreate('add', null)"><?php echo e(__('common.add')); ?></button>
      </div>
      <div class="table-push">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th><?php echo e(__('common.name')); ?></th>
              <th><?php echo e(__('currency.code')); ?></th>
              <th><?php echo e(__('currency.symbol_left')); ?></th>
              <th><?php echo e(__('currency.symbol_right')); ?></th>
              <th><?php echo e(__('currency.decimal_place')); ?></th>
              <th><?php echo e(__('currency.value')); ?></th>
              <th><?php echo e(__('currency.latest_value')); ?></th>
              <th><?php echo e(__('common.status')); ?></th>
              <th class="text-end"><?php echo e(__('common.action')); ?></th>
            </tr>
          </thead>
          <tbody v-if="currencies.length">
            <tr v-for="language, index in currencies" :key="index">
              <td>{{ language.id }}</td>
              <td>{{ language.name }}</td>
              <td>{{ language.code }}</td>
              <td>{{ language.symbol_left }}</td>
              <td>{{ language.symbol_right }}</td>
              <td>{{ language.decimal_place }}</td>
              <td>{{ language.value }}</td>
              <td>{{ language.latest_value }}</td>
              <td>
                <span v-if="language.status" class="text-success"><?php echo e(__('common.enable')); ?></span>
                <span v-else class="text-secondary"><?php echo e(__('common.disable')); ?></span>
              </td>
              <td class="text-end">
                <button class="btn btn-outline-secondary btn-sm" @click="checkedCreate('edit', index)"><?php echo e(__('common.edit')); ?></button>
                <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteCustomer(language.id, index)"><?php echo e(__('common.delete')); ?></button>
              </td>
            </tr>
          </tbody>
          <tbody v-else><tr><td colspan="9" class="border-0"><?php if (isset($component)) { $__componentOriginal5e41293ba75edb5b6791bae671134304 = $component; } ?>
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
<?php endif; ?></td></tr></tbody>
        </table>
      </div>

    </div>

    <el-dialog title="<?php echo e(__('admin/common.currency')); ?>" :visible.sync="dialog.show" width="670px"
      @close="closeCustomersDialog('form')" :close-on-click-modal="false">

      <el-form ref="form" :rules="rules" :model="dialog.form" label-width="130px">
        <el-form-item label="<?php echo e(__('common.name')); ?>" prop="name">
          <el-input v-model="dialog.form.name" placeholder="code"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('currency.code')); ?>" prop="code">
          <el-input v-model="dialog.form.code" placeholder="<?php echo e(__('currency.code')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('currency.symbol_left')); ?>">
          <el-input v-model="dialog.form.symbol_left" placeholder="<?php echo e(__('currency.symbol_left')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('currency.symbol_right')); ?>">
          <el-input v-model="dialog.form.symbol_right" placeholder="<?php echo e(__('currency.symbol_right')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('currency.decimal_place')); ?>" prop="decimal_place">
          <el-input v-model="dialog.form.decimal_place" placeholder="<?php echo e(__('currency.decimal_place')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('currency.value')); ?>" prop="value">
          <el-input v-model="dialog.form.value" placeholder="<?php echo e(__('currency.value')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('common.status')); ?>">
          <el-switch v-model="dialog.form.status" :active-value="1" :inactive-value="0"></el-switch>
        </el-form-item>

        <el-form-item class="mt-5">
          <el-button type="primary" @click="addFormSubmit('form')"><?php echo e(__('common.save')); ?></el-button>
          <el-button @click="dialog.show = false"><?php echo e(__('common.cancel')); ?></el-button>
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
        currencies: <?php echo json_encode($currencies ?? [], 15, 512) ?>,

        dialog: {
          show: false,
          index: null,
          type: 'add',
          form: {
            id: null,
            name: '',
            code: '',
            symbol_left: '',
            symbol_right: '',
            decimal_place: '',
            value: '',
            status: 1,
          },
        },

        rules: {
          name: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('common.name')])); ?>', trigger: 'blur'}, ],
          code: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('currency.code')])); ?>', trigger: 'blur'}, ],
          value: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('currency.value')])); ?>',trigger: 'blur'}, ],
          decimal_place: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('currency.decimal_place')])); ?>',trigger: 'blur'}, ],
        }
      },

      methods: {
        checkedCreate(type, index) {
          this.dialog.show = true
          this.dialog.type = type
          this.dialog.index = index

          if (type == 'edit') {
            this.dialog.form = JSON.parse(JSON.stringify(this.currencies[index]))
          }
        },

        addFormSubmit(form) {
          const self = this;
          const type = this.dialog.type == 'add' ? 'post' : 'put';
          const url = this.dialog.type == 'add' ? 'currencies' : 'currencies/' + this.dialog.form.id;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http[type](url, this.dialog.form).then((res) => {
              this.$message.success(res.message);
              if (this.dialog.type == 'add') {
                this.currencies.push(res.data)
              } else {
                this.currencies[this.dialog.index] = res.data
              }

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
            $http.delete('currencies/' + id).then((res) => {
              if (res.status == 'fail') {
                layer.msg(res.message, () => {});
                return;
              }

              layer.msg(res.message);
              self.currencies.splice(index, 1)
            })
          }).catch(()=>{})
        },

        closeCustomersDialog(form) {
          this.$refs[form].resetFields();
          Object.keys(this.dialog.form).forEach(key => this.dialog.form[key] = '')
          // this.dialog.show = false
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/currencies/index.blade.php ENDPATH**/ ?>