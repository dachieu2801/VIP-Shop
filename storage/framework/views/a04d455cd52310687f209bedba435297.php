

<?php $__env->startSection('title', __('admin/tax_rate.tax_classes_index')); ?>

<?php $__env->startSection('page-bottom-btns'); ?>
  <a href="<?php echo e(admin_route('settings.index')); ?>?tab=tab-checkout&line=tax_address" class="btn w-min-100 btn-outline-info" target="_blank"><?php echo e(__('admin/setting.tax_address')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <ul class="nav-bordered nav nav-tabs mb-3">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="<?php echo e(admin_route('tax_classes.index')); ?>"><?php echo e(__('admin/tax_rate.tax_classes_index')); ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(admin_route('tax_rates.index')); ?>"><?php echo e(__('admin/tax_rate.index')); ?></a>
    </li>
  </ul>

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
              <th><?php echo e(__('admin/region.name')); ?></th>
              <th><?php echo e(__('admin/region.describe')); ?></th>
              <th><?php echo e(__('common.created_at')); ?></th>
              <th><?php echo e(__('common.updated_at')); ?></th>
              <th class="text-end"><?php echo e(__('common.action')); ?></th>
            </tr>
          </thead>
          <tbody v-if="tax_classes.length">
            <tr v-for="tax, index in tax_classes" :key="index">
              <td>{{ tax.id }}</td>
              <td>{{ tax.title }}</td>
              <td :title="tax.description">{{ stringLengthInte(tax.description) }}</td>
              <td>{{ tax.created_at }}</td>
              <td>{{ tax.updated_at }}</td>
              <td class="text-end">
                <button class="btn btn-outline-secondary btn-sm" @click="checkedCreate('edit', index)"><?php echo e(__('common.edit')); ?></button>
                <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteCustomer(tax.id, index)"><?php echo e(__('common.delete')); ?></button>
              </td>
            </tr>
          </tbody>
          <tbody v-else><tr><td colspan="5" class="border-0"><?php if (isset($component)) { $__componentOriginal5e41293ba75edb5b6791bae671134304 = $component; } ?>
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

    <el-dialog title="<?php echo e(__('admin/tax_class.tax_classes_create')); ?>" :visible.sync="dialog.show" width="700px"
      @close="closeCustomersDialog('form')" :close-on-click-modal="false">

      <el-form ref="form" :rules="rules" :model="dialog.form" label-width="100px">
        <el-form-item label="<?php echo e(__('admin/region.name')); ?>" prop="title">
          <el-input v-model="dialog.form.title" placeholder="<?php echo e(__('admin/region.name')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/region.describe')); ?>" prop="description">
          <el-input v-model="dialog.form.description" placeholder="<?php echo e(__('admin/region.describe')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/tax_class.rule')); ?>">
            <table class="table table-bordered" style="line-height: 1.6;">
              <thead>
                <tr>
                  <th><?php echo e(__('admin/tax_rate.tax_rate')); ?></th>
                  <th><?php echo e(__('admin/tax_class.based_on')); ?></th>
                  <th><?php echo e(__('admin/tax_class.priority')); ?></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="rule, index in dialog.form.tax_rules" :key="index">
                  <td>
                    <el-select v-model="rule.tax_rate_id" size="mini" placeholder="<?php echo e(__('common.please_choose')); ?>">
                      <el-option v-for="tax in source.all_tax_rates" :key="tax.id" :label="tax.name" :value="tax.id"></el-option>
                    </el-select>
                  </td>
                  <td>
                    <el-select v-model="rule.based" size="mini" placeholder="<?php echo e(__('common.please_choose')); ?>">
                      <el-option v-for="base in source.bases" :key="base" :label="base" :value="base"></el-option>
                    </el-select>
                  </td>
                  <td width="80px"><el-input v-model="rule.priority" size="mini" placeholder="<?php echo e(__('admin/tax_class.priority')); ?>"></el-input></td>
                  <td>
                    <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteRates(index)"><?php echo e(__('common.delete')); ?></button>
                  </td>
                </tr>
              </tbody>
            </table>
            <el-button type="primary" icon="el-icon-plus" size="small" plain @click="addRates"><?php echo e(__('common.add')); ?></el-button>
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
        tax_classes: <?php echo json_encode($tax_classes ?? [], 15, 512) ?>,

        source: {
          all_tax_rates: <?php echo json_encode($all_tax_rates ?? [], 15, 512) ?>,
          bases: <?php echo json_encode($bases ?? [], 15, 512) ?>,
        },

        dialog: {
          show: false,
          index: null,
          type: 'add',
          form: {
            id: null,
            title: '',
            description: '',
            tax_rules: [],
          },
        },

        rules: {
          title: [{required: true,message: "<?php echo e(__('common.error_required', ['name' => __('admin/region.name')])); ?>",trigger: 'blur'}, ],
          description: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('admin/region.describe')])); ?>',trigger: 'blur'}, ],
        }
      },

      beforeMount() {
        // this.source.languages.forEach(e => {
        //   this.$set(this.dialog.form.name, e.code, '')
        //   this.$set(this.dialog.form.description, e.code, '')
        // })
      },

      methods: {
        descriptionFormat(text) {
          return bk.stringLengthInte(text)
        },

        checkedCreate(type, index) {
          this.dialog.show = true
          this.dialog.type = type
          this.dialog.index = index

          if (type == 'edit') {
            let tax = this.tax_classes[index];

            this.dialog.form = {
              id: tax.id,
              title: tax.title,
              description: tax.description,
              tax_rules: tax.tax_rules,
            }
          }
        },

        addRates() {
          const tax_rate_id = this.source.all_tax_rates[0]?.id || 0;
          const based = this.source.bases[0] || '';

          this.dialog.form.tax_rules.push({tax_rate_id, based, priority: ''})
        },

        deleteRates(index) {
          this.dialog.form.tax_rules.splice(index, 1)
        },

        addFormSubmit(form) {
          const self = this;
          const type = this.dialog.type == 'add' ? 'post' : 'put';
          const url = this.dialog.type == 'add' ? 'tax_classes' : 'tax_classes/' + this.dialog.form.id;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http[type](url, this.dialog.form).then((res) => {
              this.$message.success(res.message);
              if (this.dialog.type == 'add') {
                this.tax_classes.push(res.data)
              } else {
                this.tax_classes[this.dialog.index] = res.data
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
            $http.delete('tax_classes/' + id).then((res) => {
              this.$message.success(res.message);
              self.tax_classes.splice(index, 1)
            })
          }).catch(()=>{})
        },

        closeCustomersDialog(form) {
          this.$refs[form].resetFields();
          Object.keys(this.dialog.form).forEach(key => this.dialog.form[key] = '')
          this.dialog.form.tax_rules = []
          this.dialog.show = false
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/tax_classes/index.blade.php ENDPATH**/ ?>