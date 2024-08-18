

<?php $__env->startSection('title', __('admin/attribute_group.index')); ?>

<?php $__env->startSection('content'); ?>
  <div id="customer-app" class="card h-min-600" v-cloak>
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <button type="button" class="btn btn-primary" @click="checkedCustomersCreate('add', null)"><?php echo e(__('admin/attribute_group.create_at_groups')); ?></button>
      </div>
      <div class="table-push">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th><?php echo e(__('common.name')); ?></th>
              <th><?php echo e(__('common.created_at')); ?></th>
              <th width="130px"><?php echo e(__('common.action')); ?></th>
            </tr>
          </thead>
          <tbody v-if="attribute_groups.length">
            <tr v-for="group, index in attribute_groups" :key="index">
              <td>{{ group.id }}</td>
              <td>{{ group.description?.name || '' }}</td>
              <td>{{ group.created_at }}</td>
              <td>
                <div class="d-flex gap-2 flex-column">
                  <button class="btn btn-outline-secondary btn-sm" @click="checkedCustomersCreate('edit', index)"><?php echo e(__('common.edit')); ?></button>
                  <button class="btn btn-outline-danger btn-sm" type="button" @click="deleteCustomer(group.id, index)"><?php echo e(__('common.delete')); ?></button>
                </div>
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

    <el-dialog title="<?php echo e(__('admin/attribute_group.index')); ?>" :visible.sync="dialog.show" width="670px"
      @close="closeCustomersDialog('form')" :close-on-click-modal="false">

      <el-form ref="form" :rules="rules" :model="dialog.form" label-width="155px">
        <el-form-item label="<?php echo e(__('common.name')); ?>" required class="language-inputs">
          <el-form-item  :prop="'name.' + lang.code" :inline-message="true"  v-for="lang, lang_i in source.languages" :key="lang_i"
            :rules="[
              { required: true, message: '<?php echo e(__('common.error_required', ['name' => __('common.name')])); ?>', trigger: 'blur' },
            ]"
          >
            <el-input size="mini" v-model="dialog.form.name[lang.code]" placeholder="<?php echo e(__('common.name')); ?>"><template slot="prepend">{{lang.name}}</template></el-input>
          </el-form-item>

           <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.product.attributes.group.edit.dialog.name.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

        </el-form-item>

        <el-form-item label="<?php echo e(__('common.sort_order')); ?>" prop="sort_order">
          <el-input class="mb-0" v-model="dialog.form.sort_order" type="number" placeholder="<?php echo e(__('common.sort_order')); ?>"></el-input>
        </el-form-item>

        <el-form-item>
          <div class="d-flex d-lg-block">
            <el-button type="primary" @click="addCustomersFormSubmit('form')"><?php echo e(__('common.save')); ?></el-button>
            <el-button @click="closeCustomersDialog('form')"><?php echo e(__('common.cancel')); ?></el-button>
          </div>
        </el-form-item>
      </el-form>
    </el-dialog>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    let app = new Vue({
      el: '#customer-app',

      data: {
        attribute_groups: <?php echo json_encode($attribute_groups ?? [], 15, 512) ?>,

        source: {
          languages: <?php echo json_encode(locales(), 15, 512) ?>,
        },

        dialog: {
          show: false,
          index: null,
          type: 'add',
          form: {
            id: null,
            name: {},
            sort_order: 0,
          },
        },

        rules: {
          sort_order: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('common.sort_order')])); ?>',trigger: 'blur'}, ],
        }
      },

      methods: {
        checkedCustomersCreate(type, index) {
          this.dialog.show = true
          this.dialog.type = type
          this.dialog.index = index

          if (type == 'edit') {
            let group = this.attribute_groups[index];

            this.dialog.form = {
              id: group.id,
              name: {},
              sort_order: group.sort_order,
            }

            group.descriptions.forEach((e, index) => {
              this.$set(this.dialog.form.name, e.locale, e.name)
            })
          }
        },

        addCustomersFormSubmit(form) {
          const self = this;
          const type = this.dialog.type == 'add' ? 'post' : 'put';
          const url = this.dialog.type == 'add' ? 'attribute_groups' : 'attribute_groups/' + this.dialog.form.id;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http[type](url, this.dialog.form).then((res) => {
              this.$message.success(res.message);
              if (this.dialog.type == 'add') {
                this.attribute_groups.unshift(res.data)
              } else {
                this.attribute_groups[this.dialog.index] = res.data
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
            $http.delete('attribute_groups/' + id).then((res) => {
              if (res.status == 'fail') {
                layer.msg(res.message,()=>{})
                return;
              }

              layer.msg(res.message)
              self.attribute_groups.splice(index, 1)
            })
          }).catch(()=>{})
        },

        closeCustomersDialog(form) {
          this.$refs[form].resetFields();
          this.dialog.form.name = {};
          this.dialog.form.description = {};
          this.dialog.show = false
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/attribute_group/index.blade.php ENDPATH**/ ?>