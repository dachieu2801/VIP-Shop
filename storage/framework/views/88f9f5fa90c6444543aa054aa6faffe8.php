

<?php $__env->startSection('title', __('admin/tax_rate.index')); ?>

<?php $__env->startSection('page-bottom-btns'); ?>
  <a href="<?php echo e(admin_route('settings.index')); ?>?tab=tab-checkout&line=tax_address" class="btn w-min-100 btn-outline-info" target="_blank"><?php echo e(__('admin/setting.tax_address')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <ul class="nav-bordered nav nav-tabs mb-3">
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="<?php echo e(admin_route('tax_classes.index')); ?>"><?php echo e(__('admin/tax_rate.tax_classes_index')); ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="<?php echo e(admin_route('tax_rates.index')); ?>"><?php echo e(__('admin/tax_rate.index')); ?></a>
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
              <th><?php echo e(__('admin/tax_rate.tax')); ?></th>
              <th><?php echo e(__('admin/tax_rate.tax_rate')); ?></th>
              <th><?php echo e(__('admin/tax_rate.type')); ?></th>
              <th><?php echo e(__('admin/tax_rate.area')); ?></th>
              <th><?php echo e(__('common.created_at')); ?></th>
              <th><?php echo e(__('common.updated_at')); ?></th>
              <th class="text-end"><?php echo e(__('common.action')); ?></th>
            </tr>
          </thead>
          <tbody v-if="tax_rates.length">
            <tr v-for="tax, index in tax_rates" :key="index">
              <td>{{ tax.id }}</td>
              <td>{{ tax.name }}</td>
              <td>{{ tax.rate }}</td>
              <td>{{ tax.type }}</td>
              <td>{{ tax.region ? tax.region.name : '' }}</td>
              <td>{{ tax.created_at }}</td>
              <td>{{ tax.updated_at }}</td>
              <td class="text-end">
                <button class="btn btn-outline-secondary btn-sm" @click="checkedCreate('edit', index)"><?php echo e(__('common.edit')); ?></button>
                <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteCustomer(tax.id, index)"><?php echo e(__('common.delete')); ?></button>
              </td>
            </tr>
          </tbody>
          <tbody v-else><tr><td colspan="7" class="border-0"><?php if (isset($component)) { $__componentOriginal5e41293ba75edb5b6791bae671134304 = $component; } ?>
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

    <el-dialog title="<?php echo e(__('admin/tax_rate.tax_rate')); ?>" :visible.sync="dialog.show" width="500px"
      @close="closeCustomersDialog('form')" :close-on-click-modal="false">

      <el-form ref="form" :rules="rules" :model="dialog.form" label-width="100px">
        <el-form-item label="<?php echo e(__('admin/tax_rate.tax')); ?>" prop="name">
          <el-input v-model="dialog.form.name" placeholder="<?php echo e(__('admin/tax_rate.tax')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/tax_rate.tax_rate')); ?>" prop="rate">
          <el-input v-model="dialog.form.rate" placeholder="<?php echo e(__('admin/tax_rate.tax_rate')); ?>">
            <template slot="append" v-if="dialog.form.type == 'percent'">%</template>
          </el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/tax_rate.type')); ?>">
          <el-select v-model="dialog.form.type" size="small" placeholder="<?php echo e(__('common.please_choose')); ?>">
            <el-option v-for="type in source.types" :key="type.value" :label="type.name" :value="type.value"></el-option>
          </el-select>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/tax_rate.area')); ?>">
          <el-select v-model="dialog.form.region_id" size="small" placeholder="<?php echo e(__('common.please_choose')); ?>">
            <el-option v-for="region in source.regions" :key="region.value" :label="region.name" :value="region.id"></el-option>
          </el-select>
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
        tax_rates: <?php echo json_encode($tax_rates ?? [], 15, 512) ?>,

        source: {
          all_tax_rates: <?php echo json_encode($all_tax_rates ?? [], 15, 512) ?>,
          regions: <?php echo json_encode($regions ?? [], 15, 512) ?>,
          types: [{value:'percent', name: '<?php echo e(__('admin/tax_rate.percentage')); ?>'}, {value:'flat', name: '<?php echo e(__('admin/tax_rate.fixed_tax_rate')); ?>'}]
        },

        dialog: {
          show: false,
          index: null,
          type: 'add',
          form: {
            id: null,
            name: '',
            rate: '',
            type: 'percent',
            region_id: '',
          },
        },

        rules: {
          name: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('admin/tax_rate.tax')])); ?>',trigger: 'blur'}, ],
          rate: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('admin/tax_rate.tax_rate')])); ?>',trigger: 'blur'}, ],
        }
      },

      methods: {
        checkedCreate(type, index) {
          this.dialog.show = true
          this.dialog.type = type
          this.dialog.index = index
          this.dialog.form.region_id = this.source.regions.length ? this.source.regions[0].id : 0

          if (type == 'edit') {
            let tax = this.tax_rates[index];

            this.dialog.form = {
              id: tax.id,
              name: tax.name,
              rate: tax.rate,
              type: tax.type,
              region_id: tax.region_id,
            }
          }
        },

        deleteRates(index) {
          this.dialog.form.tax_rules.splice(index, 1)
        },

        addFormSubmit(form) {
          const self = this;
          const type = this.dialog.type == 'add' ? 'post' : 'put';
          const url = this.dialog.type == 'add' ? 'tax_rates' : 'tax_rates/' + this.dialog.form.id;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http[type](url, this.dialog.form).then((res) => {
              this.$message.success(res.message);
              if (this.dialog.type == 'add') {
                this.tax_rates.push(res.data)
              } else {
                this.tax_rates[this.dialog.index] = res.data
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
            $http.delete('tax_rates/' + id).then((res) => {
              this.$message.success(res.message);
              self.tax_rates.splice(index, 1)
            })
          }).catch(()=>{})
        },

        closeCustomersDialog(form) {
          this.$refs[form].resetFields();
          Object.keys(this.dialog.form).forEach(key => this.dialog.form[key] = '')
          this.dialog.form.type = 'percent';
          this.dialog.show = false
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/tax_rates/index.blade.php ENDPATH**/ ?>