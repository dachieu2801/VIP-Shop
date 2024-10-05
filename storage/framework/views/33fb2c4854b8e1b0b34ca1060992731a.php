

<?php $__env->startSection('title', __('admin/common.zone')); ?>

<?php $__env->startSection('content'); ?>
  <div id="tax-classes-app" class="card" v-cloak>
    <div class="card-body h-min-600">
      <div class="bg-light p-4 mb-2">
        <div class="row">
          <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
            <label class="filter-title"><?php echo e(__('product.name')); ?></label>
            <input @keyup.enter="search" type="text" v-model="filter.name" class="form-control" placeholder="<?php echo e(__('product.name')); ?>">
          </div>

          <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
            <label class="filter-title"><?php echo e(__('currency.code')); ?></label>
            <input @keyup.enter="search" type="text" v-model="filter.code" class="form-control" placeholder="<?php echo e(__('currency.code')); ?>">
          </div>

          <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
            <label class="filter-title"><?php echo e(__('common.status')); ?></label>
            <select v-model="filter.status" class="form-select">
              <option value=""><?php echo e(__('common.all')); ?></option>
              <option value="1"><?php echo e(__('common.enable')); ?></option>
              <option value="0"><?php echo e(__('common.disable')); ?></option>
            </select>
          </div>

          <div class="col-xxl-20 col-xl-3 col-lg-4 col-md-4 d-flex align-items-center mb-3">
            <label class="filter-title"><?php echo e(__('admin/zone.country_of_origin')); ?></label>
            <select v-model="filter.country_id" class="form-select">
              <option value=""><?php echo e(__('common.all')); ?></option>
              <option v-for="item in countries" :value="item.id">{{ item.name }}</option>
            </select>
          </div>
        </div>

        <div class="row">
          <label class="filter-title"></label>
          <div class="col-auto">
            <button type="button" @click="search" class="btn btn-outline-primary btn-sm"><?php echo e(__('common.filter')); ?></button>
            <button type="button" @click="resetSearch" class="btn btn-outline-secondary btn-sm"><?php echo e(__('common.reset')); ?></button>
          </div>
        </div>
      </div>
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
              <th><?php echo e(__('admin/zone.country_of_origin')); ?></th>
              <th><?php echo e(__('common.created_at')); ?></th>
              <th><?php echo e(__('common.updated_at')); ?></th>
              <th><?php echo e(__('common.sort_order')); ?></th>
              <th><?php echo e(__('common.status')); ?></th>
              <th class="text-end"><?php echo e(__('common.action')); ?></th>
            </tr>
          </thead>
          <tbody v-if="zones.data.length">
            <tr v-for="zone, index in zones.data" :key="index">
              <td>{{ zone.id }}</td>
              <td>{{ zone.name }}</td>
              <td>{{ zone.code }}</td>
              <td>{{ zone.country.name }}</td>
              <td>{{ zone.created_at }}</td>
              <td>{{ zone.updated_at }}</td>
              <td>{{ zone.sort_order }}</td>
              <td>
                <span v-if="zone.status" class="text-success"><?php echo e(__('common.enable')); ?></span>
                <span v-else class="text-secondary"><?php echo e(__('common.disable')); ?></span>
              </td>
              <td class="text-end">
                <button class="btn btn-outline-secondary btn-sm" @click="checkedCreate('edit', index)"><?php echo e(__('common.edit')); ?></button>
                <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteCustomer(zone.id, index)"><?php echo e(__('common.delete')); ?></button>
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

      <el-pagination v-if="zones.data.length" :pager-count="5" layout="total, prev, pager, next" background :page-size="zones.per_page" :current-page.sync="page"
        :total="zones.total"></el-pagination>
    </div>

    <el-dialog title="<?php echo e(__('admin/common.zone')); ?>" :visible.sync="dialog.show" width="620px"
      @close="closeCustomersDialog('form')" :close-on-click-modal="false">

      <el-form ref="form" :rules="rules" :model="dialog.form" label-width="148px">
        <el-form-item label="<?php echo e(__('admin/zone.zone_name')); ?>" prop="name">
          <el-input v-model="dialog.form.name" placeholder="<?php echo e(__('admin/zone.zone_name')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('currency.code')); ?>">
          <el-input v-model="dialog.form.code" placeholder="<?php echo e(__('currency.code')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/zone.country_of_origin')); ?>" prop="country_id">
          <el-select v-model="dialog.form.country_id" placeholder="<?php echo e(__('admin/zone.country_of_origin')); ?>">
            <el-option
              v-for="item in countries"
              :key="item.id"
              :label="item.name"
              :value="item.id">
            </el-option>
          </el-select>
        </el-form-item>

        <el-form-item label="<?php echo e(__('common.sort_order')); ?>">
          <el-input v-model="dialog.form.sort_order" placeholder="<?php echo e(__('common.sort_order')); ?>"></el-input>
        </el-form-item>


        <el-form-item label="<?php echo e(__('common.status')); ?>">
          <el-switch v-model="dialog.form.status" :active-value="1" :inactive-value="0"></el-switch>
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
        countries: <?php echo json_encode($countries ?? [], 15, 512) ?>,
        zones: <?php echo json_encode($zones ?? [], 15, 512) ?>,

        page: 1,

        dialog: {
          show: false,
          index: null,
          type: 'add',
          form: {
            id: null,
            name: '',
            code: '',
            country_id: '',
            sort_order: '',
            status: 1,
          },
        },

        rules: {
          name: [{required: true, message: '<?php echo e(__('common.error_required', ['name' => __('admin/zone.zone_name')])); ?>', trigger: 'blur'}, ],
          country_id: [{required: true, message: '<?php echo e(__('admin/zone.error_country')); ?>', trigger: 'blur'}, ],
        },

        filter: {
          name: bk.getQueryString('name'),
          code: bk.getQueryString('code'),
          status: bk.getQueryString('status'),
          country_id: bk.getQueryString('country_id'),
        },

        url: '<?php echo e(admin_route("zones.index")); ?>',
      },

      watch: {
        page: function() {
          this.loadData();
        },
      },

      methods: {
        loadData() {
          $http.get(`zones?page=${this.page}`).then((res) => {
            this.zones = res.data.zones;
          })
        },

        checkedCreate(type, index) {
          this.dialog.show = true
          this.dialog.type = type
          this.dialog.index = index

          if (type == 'edit') {
            this.dialog.form = JSON.parse(JSON.stringify(this.zones.data[index]));
          }
        },

        statusChange(e, index) {
          const id = this.zones.data[index].id;

          // $http.put(`languages/${id}`).then((res) => {
          //   layer.msg(res.message);
          // })
        },

        search() {
          location = bk.objectToUrlParams(this.filter, this.url)
        },

        resetSearch() {
          this.filter = bk.clearObjectValue(this.filter)
          location = bk.objectToUrlParams(this.filter, this.url)
        },

        addFormSubmit(form) {
          const self = this;
          const type = this.dialog.type == 'add' ? 'post' : 'put';
          const url = this.dialog.type == 'add' ? 'zones' : 'zones/' + this.dialog.form.id;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http[type](url, this.dialog.form).then((res) => {
              this.$message.success(res.message);
              if (this.dialog.type == 'add') {
                // this.zones.data.push(res.data)
                this.loadData();
              } else {
                this.zones.data[this.dialog.index] = res.data
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
            $http.delete('zones/' + id).then((res) => {
              this.$message.success(res.message);
              this.loadData();
              // self.country.data.splice(index, 1)
            })
          }).catch(()=>{})
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

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/zones/index.blade.php ENDPATH**/ ?>