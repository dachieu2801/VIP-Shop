

<?php $__env->startSection('title', __('admin/common.rma_reasons_index')); ?>

<?php $__env->startSection('content'); ?>
  <div id="tax-classes-app" class="card" v-cloak>
    <div class="card-body h-min-600">
      <div class="d-flex justify-content-between mb-4">
        <button type="button" class="btn btn-primary" @click="checkedCreate('add', null)"><?php echo e(__('common.add')); ?></button>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th><?php echo e(__('common.name')); ?></th>
            <th class="text-end"><?php echo e(__('common.action')); ?></th>
          </tr>
        </thead>
        <tbody v-if="rmaReasons.length">
          <tr v-for="language, index in rmaReasons" :key="index">
            <td>{{ language.id }}</td>
            <td><span class="text-hidden">{{ language.name }}</span></td>
            <td class="text-end">
              <button class="btn btn-outline-secondary btn-sm mb-1" @click="checkedCreate('edit', index)"><?php echo e(__('common.edit')); ?></button>
              <button class="btn btn-outline-danger mb-1 btn-sm ml-1" type="button" @click="deleteCustomer(language.id, index)"><?php echo e(__('common.delete')); ?></button>
            </td>
          </tr>
        </tbody>
        <tbody v-else><tr><td colspan="3" class="border-0"><?php if (isset($component)) { $__componentOriginal5e41293ba75edb5b6791bae671134304 = $component; } ?>
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

    <el-dialog title="<?php echo e(__('admin/common.rma_reasons_index')); ?>" :visible.sync="dialog.show" width="500px"
      @close="closeCustomersDialog('form')" :close-on-click-modal="false">

      <el-form ref="form" :rules="rules" :model="dialog.form" label-width="100px">
        <el-form-item label="<?php echo e(__('common.name')); ?>" required class="language-inputs">
          <el-form-item  :prop="'name.' + lang.code" :inline-message="true"  v-for="lang, lang_i in source.languages" :key="lang_i"
            :rules="[
              { required: true, message: '<?php echo e(__('common.error_input_required')); ?>', trigger: 'blur' },
            ]"
          >
            <el-input size="mini" v-model="dialog.form.name[lang.code]" placeholder="<?php echo e(__('common.name')); ?>"><template slot="prepend">{{lang.name}}</template></el-input>
          </el-form-item>
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
        rmaReasons: <?php echo json_encode($rmaReasons ?? [], 15, 512) ?>,

        dialog: {
          show: false,
          index: null,
          type: 'add',
          form: {
            id: null,
            name: {},
          },
        },

        rules: {
          name: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('common.name')])); ?>',trigger: 'blur'}, ],
        },

        source: {
          languages: <?php echo json_encode($languages ?? [], 15, 512) ?>,
        },
      },

      methods: {
        checkedCreate(type, index) {
          this.dialog.show = true
          this.dialog.type = type
          this.dialog.index = index

          if (type == 'edit') {
            let tax = JSON.parse(JSON.stringify(this.rmaReasons[index]));

            this.dialog.form = {
              id: tax.id,
              name: tax.names,
            }
          }
        },

        loadData() {
          $http.get(`rma_reasons?page=${this.page}`).then((res) => {
            this.rmaReasons = res.data.rmaReasons;
          })
        },

        statusChange(e, index) {
          const id = this.rmaReasons[index].id;

          // $http.put(`rmaReasons/${id}`).then((res) => {
          //   layer.msg(res.message);
          // })
        },

        addFormSubmit(form) {
          const self = this;
          const type = this.dialog.type == 'add' ? 'post' : 'put';
          const url = this.dialog.type == 'add' ? 'rma_reasons' : 'rma_reasons/' + this.dialog.form.id;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http[type](url, this.dialog.form).then((res) => {
              this.$message.success(res.message);
              this.loadData();

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
            $http.delete('rma_reasons/' + id).then((res) => {
              this.$message.success(res.message);
              self.rmaReasons.splice(index, 1)
            })
          }).catch(()=>{})
        },

        closeCustomersDialog(form) {
          this.$refs[form].resetFields();
          Object.keys(this.dialog.form).forEach(key => this.dialog.form[key] = '')
          this.dialog.form.name = {};
          this.dialog.show = false
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/rma_reasons/index.blade.php ENDPATH**/ ?>