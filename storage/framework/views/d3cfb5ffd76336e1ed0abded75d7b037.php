

<?php $__env->startSection('title', __('admin/attribute.index')); ?>

<?php $__env->startSection('content'); ?>
  <div id="app" class="card" v-cloak>
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <button type="button" class="btn btn-primary" @click="checkedCreate"><?php echo e(__('admin/attribute.create_at')); ?></button>
      </div>
      <div class="table-push h-min-500">
        <table class="table">
          <thead>
            <tr>
              <th><?php echo e(__('common.id')); ?></th>
              <th><?php echo e(__('common.name')); ?></th>
              <th><?php echo e(__('admin/attribute_group.index')); ?></th>
              <th><?php echo e(__('common.created_at')); ?></th>
              <th width="150px"><?php echo e(__('common.action')); ?></th>
            </tr>
          </thead>
          <tbody v-if="attributes.data.length">
            <tr v-for="item, index in attributes.data" :key="index">
              <td>{{ item.id }}</td>
              <td>{{ item.name }}</td>
              <td>{{ item.attribute_group_name }}</td>
              <td>{{ item.created_at }}</td>
              <td>
                <div class="d-flex gap-2 flex-wrap">
                  <a class="text-nowrap btn btn-outline-secondary btn-sm" :href="linkEdit(item.id)"><?php echo e(__('common.edit')); ?></a>
                  <button class="btn btn-outline-danger btn-sm" type="button" @click="deleteItem(item.id)"><?php echo e(__('common.delete')); ?></button>
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

      <el-pagination v-if="attributes.data.length" layout="prev, pager, next" background :page-size="attributes.per_page" :current-page.sync="page"
        :total="attributes.total"></el-pagination>
    </div>

    <el-dialog title="<?php echo e(__('admin/attribute.index')); ?>" :visible.sync="dialog.show" width="670px"
      @close="closeDialog('form')" :close-on-click-modal="false">

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
                
                $output = \Hook::getHook("admin.product.attributes.add.dialog.name.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/attribute_group.index')); ?>" required prop="attribute_group_id">
          <el-select v-model="dialog.form.attribute_group_id" placeholder="<?php echo e(__('common.please_choose')); ?>">
            <el-option
              v-for="item in source.attribute_group"
              :key="item.id"
              :label="item.description?.name || ''"
              :value="item.id">
            </el-option>
          </el-select>
        </el-form-item>

        <el-form-item label="<?php echo e(__('common.sort_order')); ?>" prop="sort_order">
          <el-input class="mb-0 wp-100" v-model="dialog.form.sort_order" type="number" placeholder="<?php echo e(__('common.sort_order')); ?>"></el-input>
        </el-form-item>

        <el-form-item>
          <div class="d-flex d-lg-block mt-4">
            <el-button type="primary" @click="formSubmit('form')"><?php echo e(__('common.save')); ?></el-button>
            <el-button @click="closeDialog('form')"><?php echo e(__('common.cancel')); ?></el-button>
          </div>
        </el-form-item>
      </el-form>
    </el-dialog>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
   let app = new Vue({
      el: '#app',

      data: {
        page: 1,
        attributes: <?php echo json_encode($attribute_list ?? [], 15, 512) ?>,

        source: {
          attribute_group: <?php echo json_encode($attribute_group ?? [], 15, 512) ?>,
          languages: <?php echo json_encode(locales(), 15, 512) ?>,
          locale: <?php echo json_encode(locale(), 15, 512) ?>,
        },

        dialog: {
          show: false,
          index: null,
          type: 'add',
          form: {
            id: null,
            name: {},
            sort_order: 0,
            attribute_group_id: '',
          },
        },

        rules: {
          attribute_group_id: [
            {required: true, message: '<?php echo e(__('common.error_required', ['name' => __('admin/attribute_group.index')] )); ?>', trigger: 'blur'},
          ],
          sort_order: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('common.sort_order')])); ?>',trigger: 'blur'}, ],
        },
      },

      watch: {
        page: function() {
          this.loadData();
        },
      },

      methods: {
        loadData() {
          $http.get(`attributes?page=${this.page}`).then((res) => {
            this.attributes = res.data.attribute_list;
          })
        },

        linkEdit(id) {
          return '<?php echo e(admin_route('attributes.index')); ?>' + `/${id}`
        },

        checkedCreate() {
          this.dialog.show = true
        },

        formSubmit(form) {
          const self = this;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http.post('attributes', this.dialog.form).then((res) => {
              this.loadData();
              setTimeout(() => this.dialog.show = false, 100)
              this.$confirm('<?php echo e(__('admin/attribute.to_info_values')); ?>', '<?php echo e(__('common.created_success')); ?>', {
                distinguishCancelAndClose: true,
                confirmButtonText: '<?php echo e(__('admin/attribute.btn_at')); ?>',
                cancelButtonText: '<?php echo e(__('admin/attribute.btn_later')); ?>',
              }).then(() => {
                location = this.linkEdit(res.data.id);
              }).catch(()=>{})
            })
          });
        },

        deleteItem(id) {
          const self = this;
          this.$confirm('<?php echo e(__('common.confirm_delete')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
            cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
            type: 'warning'
          }).then(() => {
            $http.delete(`attributes/${id}`).then((res) => {
              if (res.status == 'fail') {
                layer.msg(res.message,()=>{})
                return;
              }

              layer.msg(res.message)
              window.location.reload();
            })
          }).catch(()=>{})
        },

        closeDialog(form) {
          this.$refs[form].resetFields();
          this.dialog.show = false
        },
      }
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/attributes/index.blade.php ENDPATH**/ ?>