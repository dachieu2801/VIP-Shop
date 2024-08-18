

<?php $__env->startSection('title', __('admin/common.customer_groups_index')); ?>

<?php $__env->startSection('content'); ?>
  <div id="customer-app" class="card h-min-600" v-cloak>
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <button type="button" class="btn btn-primary" @click="checkedCustomersCreate('add', null)"><?php echo e(__('admin/customer_group.customer_groups_create')); ?></button>
      </div>
      <div class="table-push overflow-auto">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th><?php echo e(__('common.name')); ?></th>
              <th><?php echo e(__('admin/region.describe')); ?></th>
              
              <th><?php echo e(__('common.created_at')); ?></th>
              <th width="130px"><?php echo e(__('common.action')); ?></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="group, index in customer_groups" :key="index">
              <td>{{ group.id }}</td>
              <td>{{ group.description?.name || '' }}</td>
              <td>
                <div :title="group.description?.description || ''" class="w-max-500">
                  {{ stringLengthInte(group.description?.description || '') }}</div>
              </td>
              
              <td>{{ group.created_at }}</td>
              <td>
              <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-outline-secondary btn-sm" @click="checkedCustomersCreate('edit', index)"><?php echo e(__('common.edit')); ?></button>
                <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteCustomer(group.id, index)" v-if="customer_groups.length > 1"><?php echo e(__('common.delete')); ?></button>
              </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      
    </div>

    <el-dialog title="<?php echo e(__('admin/common.customer_groups_index')); ?>" :visible.sync="dialog.show" width="670px"
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
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/region.describe')); ?>" class="language-inputs">
          <el-form-item v-for="lang, lang_i in source.languages" :key="lang_i">
            <el-input size="mini" v-model="dialog.form.description[lang.code]" placeholder="<?php echo e(__('admin/region.describe')); ?>"><template slot="prepend">{{lang.name}}</template></el-input>
          </el-form-item>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/customer_group.discount_rate')); ?>">
          <el-input class="mb-0" type="number" v-model="dialog.form.discount_factor" placeholder="<?php echo e(__('admin/customer_group.discount_rate')); ?>">
            <template slot="append">%</template>
          </el-input>
        </el-form-item>

        <?php if(0): ?>
        <el-form-item label="<?php echo e(__('customer_group.level')); ?>">
          <el-input class="mb-0" v-model="dialog.form.level" placeholder="<?php echo e(__('customer_group.level')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/customer_group.consumption_limit')); ?>">
          <el-input class="mb-0" type="number" v-model="dialog.form.total" placeholder="<?php echo e(__('admin/customer_group.consumption_limit')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/customer_group.discount_rate')); ?>">
          <el-input class="mb-0" type="number" v-model="dialog.form.discount_factor" placeholder="<?php echo e(__('admin/customer_group.discount_rate')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/customer_group.reward_points_factor')); ?>">
          <el-input class="mb-0" type="number" v-model="dialog.form.reward_point_factor" placeholder="<?php echo e(__('admin/customer_group.reward_points_factor')); ?>"></el-input>
        </el-form-item>

        <el-form-item label="<?php echo e(__('admin/customer_group.integral_factor')); ?>">
          <el-input class="mb-0" type="number" v-model="dialog.form.use_point_factor" placeholder="<?php echo e(__('admin/customer_group.integral_factor')); ?>"></el-input>
        </el-form-item>
        <?php endif; ?>

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
    new Vue({
      el: '#customer-app',

      data: {
        customer_groups: <?php echo json_encode($customer_groups ?? [], 15, 512) ?>,

        source: {
          // languages: ['zh-ck','en-gb']
          languages: <?php echo json_encode($languages ?? [], 15, 512) ?>,
        },

        dialog: {
          show: false,
          index: null,
          type: 'add',
          form: {
            id: null,
            name: {},
            description: {},
            total: '', //消费额度
            level: '1',
            discount_factor: '', // 折扣率
            reward_point_factor: '', // 奖励积分系数使用积分系数
            use_point_factor: '', // 使用积分系数
          },
        },

        rules: {
          // password: [{required: true,message: '请输入密码',trigger: 'blur'}, ],
        }
      },

      beforeMount() {
        // this.source.languages.forEach(e => {
        //   this.$set(this.dialog.form.name, e.code, '')
        //   this.$set(this.dialog.form.description, e.code, '')
        // })
      },

      methods: {
        checkedCustomersCreate(type, index) {
          this.dialog.show = true
          this.dialog.type = type
          this.dialog.index = index

          if (type == 'edit') {
            let group = this.customer_groups[index];

            this.dialog.form = {
              id: group.id,
              name: {},
              description: {},
              total: group.total, //消费额度
              level: group.level, //消费额度
              discount_factor: group.discount_factor, // 折扣率
              reward_point_factor: group.reward_point_factor, // 奖励积分系数使用积分系数
              use_point_factor: group.use_point_factor, // 使用积分系数
              status: 1,
            }

            group.descriptions.forEach((e, index) => {
              this.$set(this.dialog.form.name, e.locale, e.name)
              this.$set(this.dialog.form.description, e.locale, e.description)
              // this.dialog.form.name[e.locale] = e.name
              // this.dialog.form.description[e.locale] = e.description
            })
          }
        },

        addCustomersFormSubmit(form) {
          const self = this;
          const type = this.dialog.type == 'add' ? 'post' : 'put';
          const url = this.dialog.type == 'add' ? 'customer_groups' : 'customer_groups/' + this.dialog.form.id;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http[type](url, this.dialog.form).then((res) => {
              this.$message.success(res.message);
              if (this.dialog.type == 'add') {
                this.customer_groups.push(res.data)
              } else {
                this.customer_groups[this.dialog.index] = res.data
              }
              this.dialog.show = false;
              this.dialog.form.level = 1
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
            $http.delete('customer_groups/' + id).then((res) => {
              this.$message.success(res.message);
              self.customer_groups.splice(index, 1)
            })
          }).catch(()=>{})
        },

        closeCustomersDialog(form) {
          this.$refs[form].resetFields();
          Object.keys(this.dialog.form).forEach(key => this.dialog.form[key] = '')
          this.dialog.form.name = {};
          this.dialog.form.description = {};
          this.dialog.show = false;
          this.dialog.form.level = 1
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/customer_groups/index.blade.php ENDPATH**/ ?>