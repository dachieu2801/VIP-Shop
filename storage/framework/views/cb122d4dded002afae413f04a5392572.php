

<?php $__env->startSection('title', __('admin/common.brand')); ?>

<?php $__env->startSection('content'); ?>
  <div id="customer-app" class="card h-min-600" v-cloak>
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <button type="button" class="btn btn-primary" @click="checkedCreate('add', null)"><?php echo e(__('admin/brand.brands_create')); ?></button>
      </div>
      <div class="table-push">
        <table class="table">
          <thead>
            <tr>
              <th><?php echo e(__('common.id')); ?></th>
              <th><?php echo e(__('brand.name')); ?></th>
              <th><?php echo e(__('brand.icon')); ?></th>
              <th><?php echo e(__('common.sort_order')); ?></th>
              <th><?php echo e(__('brand.first_letter')); ?></th>
              <th><?php echo e(__('common.status')); ?></th>
              <th><?php echo e(__('common.action')); ?></th>
            </tr>
          </thead>
          <tbody v-if="brands.data.length">
            <tr v-for="brand, index in brands.data" :key="index">
              <td>{{ brand.id }}</td>
              <td>{{ brand.name }}</td>
              <td><div class="wh-50 border d-flex justify-content-center rounded-2 align-items-center"><img :src="thumbnail(brand.logo)" class="img-fluid rounded-2"></div></td>
              <td>{{ brand.sort_order }}</td>
              <td>{{ brand.first }}</td>
              <td>
                <span class="text-success" v-if="brand.status"><?php echo e(__('common.enabled')); ?></span>
                <span class="text-secondary" v-else><?php echo e(__('common.disabled')); ?></span>
              </td>
              <td>
                <button class="btn btn-outline-secondary btn-sm" @click="checkedCreate('edit', index)"><?php echo e(__('common.edit')); ?></button>
                <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteItem(brand.id, index)"><?php echo e(__('common.delete')); ?></button>
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

      <el-pagination v-if="brands.data.length" layout="prev, pager, next" background :page-size="brands.per_page" :current-page.sync="page"
        :total="brands.total" :current-page.sync="page"></el-pagination>
    </div>

    <el-dialog title="<?php echo e(__('admin/common.brand')); ?>" :visible.sync="dialog.show" width="600px"
      @close="closeDialog('form')" :close-on-click-modal="false">

      <el-form ref="form" :rules="rules" :model="dialog.form" label-width="100px">
         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.brand.form.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

        <el-form-item label="<?php echo e(__('brand.name')); ?>" prop="name">
          <el-input class="mb-0" v-model="dialog.form.name" placeholder="<?php echo e(__('brand.name')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('brand.icon')); ?>" prop="logo" required>
          <vue-image v-model="dialog.form.logo"></vue-image>
        </el-form-item>

        <el-form-item label="<?php echo e(__('brand.first_letter')); ?>" prop="first">
          <el-input class="mb-0" :maxlength="1" v-model="dialog.form.first" placeholder="<?php echo e(__('brand.first_letter')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('common.sort_order')); ?>">
          <el-input class="mb-0" type="number" v-model="dialog.form.sort_order" placeholder="<?php echo e(__('common.sort_order')); ?>"></el-input>
        </el-form-item>

         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.brand.form.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

        <el-form-item label="<?php echo e(__('common.status')); ?>">
          <el-switch v-model="dialog.form.status" :active-value="1" :inactive-value="0"></el-switch>
        </el-form-item>

        <el-form-item>
          <el-button type="primary" @click="submit('form')"><?php echo e(__('common.save')); ?></el-button>
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
      el: '#customer-app',

      data: {
        brands: <?php echo json_encode($brands ?? [], 15, 512) ?>,
        page: bk.getQueryString('page', 1) * 1,
        dialog: {
          show: false,
          index: null,
          type: 'add',
          form: {
            id: null,
            name: '',
            logo: '',
            first: '',
            sort_order: '',
            status: 1,
          },
        },

        rules: {
          name: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('common.name')])); ?>',trigger: 'blur'}, ],
          first: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('brand.first_letter')])); ?>',trigger: 'blur'}, ],
          logo: [{required: true,message: '<?php echo e(__('admin/brand.error_upload')); ?>',trigger: 'change'}, ],
        }
      },

      watch: {
        page: function() {
          this.loadData();
        },
        'dialog.form.logo': function(newVal, oldVal) {
          if( newVal?.charAt(0) === '/'){
            this.dialog.form.logo = newVal.slice(1);
          }
        },
      },

      mounted() {
        bk.ajaxPageReloadData(this)
      },

      computed: {
        url() {
          const url = <?php echo json_encode(admin_route('brands.index'), 15, 512) ?>;

          if (this.page) {
            return url + '?page=' + this.page;
          }

          return url;
        },
      },

      methods: {
        loadData() {
          window.history.pushState('', '', this.url);
          $http.get(`brands?page=${this.page}`).then((res) => {
            this.brands = res.data.brands;
          })
        },

        checkedCreate(type, index) {
          this.dialog.show = true
          this.dialog.type = type
          this.dialog.index = index
          if (type == 'edit') {
            let item = JSON.parse(JSON.stringify(this.brands.data[index]));
            item.status = Number(item.status)
            this.dialog.form = item
            if( this.dialog.form?.logo?.charAt(0) === '/'){
              this.dialog.form.logo = this.dialog.form.logo.slice(1)
            }
          }
        },

        submit(form) {
          const self = this;
          const type = this.dialog.type == 'add' ? 'post' : 'put';
          const url = this.dialog.type == 'add' ? 'brands' : 'brands/' + this.dialog.form.id;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }
            $http[type](url, this.dialog.form).then((res) => {
              this.$message.success(res.message);
              if (this.dialog.type == 'add') {
                this.brands.data.unshift(res.data)
              } else {
                this.brands.data[this.dialog.index] = res.data
              }
              this.dialog.show = false
            })
          });
        },

        deleteItem(id, index) {
          const self = this;
          this.$confirm('<?php echo e(__('common.confirm_delete')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
            cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
            type: 'warning'
          }).then(() => {
            $http.delete('brands/' + id).then((res) => {
              this.$message.success(res.message);
              self.brands.data.splice(index, 1)
            })
          }).catch(()=>{})
        },

        closeDialog(form) {
          this.$refs[form].resetFields();
          Object.keys(this.dialog.form).forEach(key => this.dialog.form[key] = '')
          this.dialog.form.status = 1
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/brands/index.blade.php ENDPATH**/ ?>