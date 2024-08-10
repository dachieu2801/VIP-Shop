

<?php $__env->startSection('title', __('admin/region.index')); ?>

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
            <th><?php echo e(__('admin/region.name')); ?></th>
            <th><?php echo e(__('admin/region.describe')); ?></th>
            <th><?php echo e(__('common.created_at')); ?></th>
            <th><?php echo e(__('common.updated_at')); ?></th>
            <th class="text-end"><?php echo e(__('common.action')); ?></th>
          </tr>
        </thead>
        <tbody v-if="regions.length">
          <tr v-for="tax, index in regions" :key="index">
            <td>{{ tax.id }}</td>
            <td>{{ tax.name }}</td>
            <td :title="tax.description">{{ stringLengthInte(tax.description) }}</td>
            <td>{{ tax.created_at }}</td>
            <td>{{ tax.updated_at }}</td>
            <td class="text-end">
              <button class="btn btn-outline-secondary btn-sm" @click="checkedCreate('edit', index)"><?php echo e(__('common.edit')); ?></button>
              <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteCustomer(tax.id, index)"><?php echo e(__('common.delete')); ?></button>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr>
            <td colspan="6" class="border-0">
              <?php if (isset($component)) { $__componentOriginal5e41293ba75edb5b6791bae671134304 = $component; } ?>
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
<?php endif; ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <el-dialog title="<?php echo e(__('admin/region.regions_create')); ?>" :visible.sync="dialog.show" width="700px"
    @close="closeCustomersDialog('form')" :close-on-click-modal="false" @open="openDialog">

    <el-form ref="form" :rules="rules" :model="dialog.form" label-width="120px">
      <el-form-item label="<?php echo e(__('common.name')); ?>" prop="name">
        <el-input v-model="dialog.form.name" placeholder="<?php echo e(__('common.name')); ?>"></el-input>
      </el-form-item>

      <el-form-item label="<?php echo e(__('admin/region.describe')); ?>" prop="description">
        <el-input v-model="dialog.form.description" placeholder="<?php echo e(__('admin/region.describe')); ?>"></el-input>
      </el-form-item>

      <el-form-item label="<?php echo e(__('admin/region.index')); ?>">
        <table class="table table-bordered" style="line-height: 1.6;">
          <thead>
            <tr>
              <th><?php echo e(__('admin/region.country')); ?></th>
              <th><?php echo e(__('admin/region.zone')); ?></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="rule, index in dialog.form.region_zones" :key="index">
              <td>
                <el-select v-model="rule.country_id" size="mini" filterable
                  placeholder="<?php echo e(__('admin/customer.choose_country')); ?>" @change="(e) => {countryChange(e, index)}">
                  <el-option v-for="item, option_index in source.countries" :key="index + '-' + option_index" :label="item.name" :value="item.id">
                  </el-option>
                </el-select>
              </td>
              <td>
                <el-select v-model="rule.zone_id" size="mini" filterable
                  placeholder="<?php echo e(__('admin/customer.choose_zones')); ?>">
                  <el-option v-for="item, option_index in rule.zones" :key="index + '-' + option_index" :label="item.name" :value="item.id">
                  </el-option>
                </el-select>
              </td>
              <td>
                <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteRates(index)"><?php echo e(__('common.delete')); ?></button>
              </td>
            </tr>
          </tbody>
        </table>
        <el-button type="primary" icon="el-icon-plus" size="small" plain @click="addRates"><?php echo e(__('common.add')); ?>

        </el-button>
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
        regions: <?php echo json_encode($regions ?? [], 15, 512) ?>,

        source: {
          all_tax_rates: <?php echo json_encode($all_tax_rates ?? [], 15, 512) ?>,
          bases: <?php echo json_encode($bases ?? [], 15, 512) ?>,
          countries: <?php echo json_encode($countries ?? [], 15, 512) ?>,
          country_id: <?php echo json_encode((int)system_setting('base.country_id'), 15, 512) ?>,
        },

        dialog: {
          show: false,
          index: null,
          type: 'add',
          zones: [],
          form: {
            id: null,
            name: '',
            description: '',
            region_zones: [],
          },
        },

        rules: {
          name: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('common.name')])); ?>',trigger: 'blur'}, ],
          description: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('admin/region.describe')])); ?>',trigger: 'blur'}, ],
        }
      },

      // 在挂载开始之前被调用:相关的 render 函数首次被调用
      beforeMount() {
        $http.get(`countries/${this.source.country_id}/zones`).then((res) => {
          this.dialog.zones = [
            {name: '<?php echo e(__('common.please_choose')); ?>', id: 0},
            ...res.data.zones
          ]
        })
      },

      methods: {
        checkedCreate(type, index) {
          this.dialog.show = true
          this.dialog.type = type
          this.dialog.index = index
        },

        openDialog() {
          if (this.dialog.type == 'edit') {
            let tax = this.regions[this.dialog.index];

            tax.region_zones.forEach(e => {
              $http.get(`countries/${e.country_id}/zones`).then((res) => {
                let zones = [{name: '<?php echo e(__('common.please_choose')); ?>', id: 0}, ...res.data.zones]
                this.$set(e, 'zones', zones)
              })
            })

            this.dialog.form = {
              id: tax.id,
              name: tax.name,
              description: tax.description,
              region_zones: tax.region_zones,
            }
          }
        },

        addRates() {
          const tax_rate_id = this.source.all_tax_rates[0]?.id || 0;
          const based = this.source.bases[0] || '';

          this.dialog.form.region_zones.push({
            country_id: this.source.country_id,
            zone_id: 0,
            zones: this.dialog.zones,
          })
        },

        deleteRates(index) {
          this.dialog.form.region_zones.splice(index, 1)
        },

        addFormSubmit(form) {
          const self = this;
          const type = this.dialog.type == 'add' ? 'post' : 'put';
          const url = this.dialog.type == 'add' ? 'regions' : 'regions/' + this.dialog.form.id;
          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http[type](url, this.dialog.form).then((res) => {
              this.$message.success(res.message);
              if (this.dialog.type == 'add') {
                this.regions.push(res.data)
              } else {
                this.regions[this.dialog.index] = res.data
              }
              this.dialog.show = false
            })
          });
        },

        countryChange(e, index) {
          $http.get(`countries/${e}/zones`).then((res) => {
            this.dialog.form.region_zones[index].zones = [
              {name: '<?php echo e(__('common.please_choose')); ?>', id: 0},
              ...res.data.zones
            ]
            this.dialog.form.region_zones[index].zone_id = 0
          })
        },

        deleteCustomer(id, index) {
          const self = this;
          this.$confirm('<?php echo e(__('common.confirm_delete')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
            cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
            type: 'warning'
          }).then(() => {
            $http.delete('regions/' + id).then((res) => {
              this.$message.success(res.message);
              self.regions.splice(index, 1)
            })
          }).catch(()=>{})
        },

        closeCustomersDialog(form) {
          Object.keys(this.dialog.form).forEach(key => this.dialog.form[key] = '')
          this.dialog.form.region_zones = []
          this.dialog.show = false
        }
      }
    })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/regions/index.blade.php ENDPATH**/ ?>