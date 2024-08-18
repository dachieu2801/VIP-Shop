

<?php $__env->startSection('title', __('admin/common.customer')); ?>

<?php $__env->startSection('content'); ?>
  <div id="customer-app" class="card h-min-600" v-cloak>
    <div class="card-body">
      <div class="bg-light p-4 mb-3">
        <el-form :inline="false" :model="filter" class="demo-form-inline" label-width="auto">
          <div class="row">
            <div class="col-12 col-xl-6">
              <el-form-item class="w-100" label="<?php echo e(__('customer.name')); ?>">
                <el-input @keyup.enter.native="search" v-model="filter.name" size="small" placeholder="<?php echo e(__('customer.name')); ?>"></el-input>
              </el-form-item>
            </div>
            <div class="col-12 col-xl-6">
              <el-form-item class="w-100"  label="<?php echo e(__('customer.email')); ?>">
                <el-input @keyup.enter.native="search" v-model="filter.email" size="small" placeholder="<?php echo e(__('customer.email')); ?>"></el-input>
              </el-form-item>
            </div>
            <div class="col-12 col-xl-6">
              <el-form-item class="w-100"  label="<?php echo e(__('customer.customer_group')); ?>">
                <el-select class="w-100" size="small" v-model="filter.customer_group_id" placeholder="<?php echo e(__('common.please_choose')); ?>">
                  <el-option v-for="item in source.customer_group" :key="item.id" :label="item.name"
                             :value="item.id + ''">
                  </el-option>
                </el-select>
              </el-form-item>
            </div>
            <div class="col-12 col-xl-6">
              <el-form-item class="w-100"  label="<?php echo e(__('common.status')); ?>">
                <el-select class="w-100" size="small" v-model="filter.status" placeholder="<?php echo e(__('common.please_choose')); ?>">
                  <el-option label="<?php echo e(__('common.all')); ?>" value=""></el-option>
                  <el-option label="<?php echo e(__('common.enabled')); ?>" value="1"></el-option>
                  <el-option label="<?php echo e(__('common.disabled')); ?>" value="0"></el-option>
                </el-select>
              </el-form-item>
            </div>

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.customer.list.filter",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
          </div>
        </el-form>

        <div class="row">
          <label style="width: 70px"></label>
          <div class="col-auto">
            <button type="button" @click="search" class="btn btn-outline-primary btn-sm"><?php echo e(__('common.filter')); ?></button>
            <button type="button" @click="resetSearch" class="btn btn-outline-secondary btn-sm ms-1"><?php echo e(__('common.reset')); ?></button>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-between mb-4">
        <?php if($type != 'trashed'): ?>
          <button type="button" class="btn btn-primary" @click="checkedCustomersCreate"><?php echo e(__('admin/customer.customers_create')); ?></button>
        <?php else: ?>
          <button type="button" class="btn btn-primary" @click="checkedCustomerSclearRestore"><?php echo e(__('admin/product.clear_restore')); ?></button>
        <?php endif; ?>
      </div>

      <?php if($customers->total()): ?>
        <div class="table-push overflow-auto">
          <table class="table">
            <thead>
              <tr>
                <th><?php echo e(__('common.id')); ?></th>
                <th><?php echo e(__('customer.email')); ?></th>
                <th><?php echo e(__('customer.name')); ?></th>
                <th><?php echo e(__('customer.from')); ?></th>
                <th><?php echo e(__('customer.customer_group')); ?></th>
                <?php if($type != 'trashed'): ?>
                <th><?php echo e(__('common.status')); ?></th>
                <th><?php echo e(__('common.examine')); ?></th>
                <?php endif; ?>
                <th><?php echo e(__('common.created_at')); ?></th>
                <th><?php echo e(__('common.login_at')); ?></th>
                 <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.customer.list.column",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                <th><?php echo e(__('common.action')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr data-item='<?php echo json_encode($customer, 15, 512) ?>'>
                <td><?php echo e($customer['id']); ?></td>
                <td><?php echo e($customer['email']); ?></td>
                <td>
                  <div class="d-flex align-items-center">
                    <div><?php echo e($customer['name']); ?></div>
                  </div>
                </td>
                <td><?php echo e($customer['from']); ?></td>
                <td><?php echo e($customer->customerGroup->description->name ?? ''); ?></td>
                <?php if($type != 'trashed'): ?>
                <td>
                  <div class="form-check form-switch">
                    <input class="form-check-input cursor-pointer" type="checkbox" role="switch" data-active="<?php echo e($customer['active'] ? 1 : 0); ?>" data-id="<?php echo e($customer['id']); ?>" @change="turnOnOff($event)" <?php echo e($customer['active'] ? 'checked' : ''); ?>>
                  </div>
                </td>
                <td>
                  <select class="form-select customer-status form-select-sm" data-id="<?php echo e($customer['id']); ?>" style="min-width: 100px;max-width: 130px">
                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($status['code']); ?>" <?php echo e($status['code'] == $customer['status'] ? 'selected' : ''); ?>>
                        <?php echo e($status['label']); ?>

                      </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </td>
                <?php endif; ?>
                <td><?php echo e($customer['created_at']); ?></td>
                 <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.customer.list.column_value",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                <td><?php echo e($customer['login_at'] ?? "TK chưa đăng nhập"); ?></td>
                 <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.customer.list.column_value",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                <td>
                  <?php if($type != 'trashed'): ?>
                   <div class="d-flex gap-2 flex-wrap">
                     <a class="text-nowrap btn btn-outline-secondary btn-sm" href="<?php echo e(admin_route('customers.edit', [$customer->id])); ?>"><?php echo e(__('common.edit')); ?></a>
                     <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteCustomer(<?php echo e($customer['id']); ?>)"><?php echo e(__('common.delete')); ?></button>
                   </div>
                     <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.customer.list.action",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                  <?php else: ?>
                    <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm"
                    @click.prevent="restore(<?php echo e($customer['id']); ?>)"><?php echo e(__('common.restore')); ?></a>
                    <button class="btn btn-outline-danger btn-sm ml-1" type="button" @click="deleteTrashedCustomer(<?php echo e($customer['id']); ?>)"><?php echo e(__('common.delete')); ?></button>
                     <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.customer.trashed.action",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <?php echo e($customers->withQueryString()->links('admin::vendor/pagination/bootstrap-4')); ?>

      <?php else: ?>
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
      <?php endif; ?>
    </div>

    <el-dialog title="<?php echo e(__('admin/customer.customers_create')); ?>" :visible.sync="dialogCustomers.show" width="670px"
      @close="closeCustomersDialog('form')" :close-on-click-modal="false">
      <el-form ref="form" :rules="rules" :model="dialogCustomers.form" label-width="120px">
        <el-form-item label="<?php echo e(__('admin/customer.user_name')); ?>" prop="name">
          <el-input v-model="dialogCustomers.form.name" placeholder="<?php echo e(__('admin/customer.user_name')); ?>"></el-input>
        </el-form-item>
        <el-form-item label="<?php echo e(__('customer.email')); ?>" prop="email">
          <el-input v-model="dialogCustomers.form.email" placeholder="<?php echo e(__('customer.email')); ?>"></el-input>
        </el-form-item>
        <el-form-item label="<?php echo e(__('shop/login.password')); ?>" prop="password">
          <el-input v-model="dialogCustomers.form.password" placeholder="<?php echo e(__('shop/login.password')); ?>"></el-input>
        </el-form-item>
        <el-form-item label="<?php echo e(__('customer.customer_group')); ?>">
          <el-select v-model="dialogCustomers.form.customer_group_id" placeholder="">
            <el-option v-for="item in source.customer_group" :key="item.id" :label="item.name"
              :value="item.id">
            </el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="<?php echo e(__('common.status')); ?>" prop="status">
          <el-switch v-model="dialogCustomers.form.status" :active-value="1" :inactive-value="0"></el-switch>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="addCustomersFormSubmit('form')"><?php echo e(__('common.save')); ?></el-button>
          <el-button @click="closeCustomersDialog('form')"><?php echo e(__('common.cancel')); ?></el-button>
        </el-form-item>
      </el-form>
    </el-dialog>
  </div>

   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.customer.list.content.footer",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    new Vue({
      el: '#customer-app',

      data: {
        source: {
          customer_group: <?php echo json_encode($customer_groups ?? [], 15, 512) ?>,
        },

        dialogCustomers: {
          show: false,
          form: {
            id: null,
            name: '',
            email: '',
            password: '',
            customer_group_id: <?php echo json_encode($customer_groups[0]['id'] ?? '', 15, 512) ?>,
            status: 1,
          },
        },

        rules: {
          name: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('admin/customer.user_name')] )); ?>', trigger: 'blur'}, ],
          email: [
            {required: true, message: '<?php echo e(__('common.error_required', ['name' => __('common.email')] )); ?>', trigger: 'blur'},
            {type: 'email', message: '<?php echo e(__('admin/customer.error_email')); ?>' ,trigger: 'blur'},
          ],
          password: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('shop/login.password')] )); ?>',trigger: 'blur'}, ],
        },

        url: '<?php echo e($type == 'trashed' ? admin_route('customers.trashed') : admin_route('customers.index')); ?>',

        filter: {
          page: bk.getQueryString('page'),
          email: bk.getQueryString('email'),
          name: bk.getQueryString('name'),
          customer_group_id: bk.getQueryString('customer_group_id'),
          status: bk.getQueryString('status'),
        },

        customerIds: <?php echo json_encode($customers->pluck('id'), 15, 512) ?>,
      },

      created() {
        bk.addFilterCondition(this);
      },

      methods: {
        turnOnOff() {
          let id = event.currentTarget.getAttribute("data-id");
          let checked = event.currentTarget.getAttribute("data-active");
          let type = 1;
          if (checked * 1) {
            type = 0;
          }
          $http.put(`customers/${id}/update_active`, {active: type}).then((res) => {
            layer.msg(res.message)
            location.reload();
          })
        },

        checkedCustomersCreate() {
          this.dialogCustomers.show = true
        },

        deleteTrashedCustomer(id) {
          this.$confirm('<?php echo e(__('common.confirm_delete')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
            cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
            type: 'warning'
          }).then(() => {
            $http.delete('customers/' + id + '/force').then((res) => {
              this.$message.success(res.message);
              window.location.reload();
            })
          }).catch(()=>{})
        },

        // 清空回收站
        checkedCustomerSclearRestore() {
          this.$confirm('<?php echo e(__('admin/product.confirm_delete_restore')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
            cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
            type: 'warning'
          }).then(() => {
            $http.post('<?php echo e(admin_route('customers.force_delete_all')); ?>').then((res) => {
              this.$message.success(res.message);
              window.location.reload();
            })
          }).catch(()=>{})
        },

        restore(id, index) {
          $http.delete('customers/' + id + '/restore').then((res) => {
            this.$message.success(res.message);
            window.location.reload();
          })
        },

        addCustomersFormSubmit(form) {
          const self = this;

          this.$refs[form].validate((valid) => {
            if (!valid) {
              this.$message.error('<?php echo e(__('common.error_form')); ?>');
              return;
            }

            $http.post('customers', this.dialogCustomers.form).then((res) => {
              this.$message.success(res.message);
              window.location.reload();
              this.dialogCustomers.show = false
            })
          });
        },

        deleteCustomer(id) {
          const self = this;
          this.$confirm('<?php echo e(__('common.confirm_delete')); ?>', '<?php echo e(__('common.text_hint')); ?>', {
            confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
            cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
            type: 'warning'
          }).then(() => {
            $http.delete(`customers/${id}`).then((res) => {
              self.$message.success(res.message);
              window.location.reload();
            })
          }).catch(()=>{})
        },

        closeCustomersDialog(form) {
          this.$refs[form].resetFields();
          this.dialogCustomers.show = false
        },

        search() {
          location = bk.objectToUrlParams(this.filter, this.url)
        },

        resetSearch() {
          this.filter = bk.clearObjectValue(this.filter)
          location = bk.objectToUrlParams(this.filter, this.url)
        },
      }
    })

    $('.customer-status').change(function(event) {
    const id = $(this).data('id');
    const status = $(this).val();
    const self = $(this);
    $http.put(`customers/${id}/update_status`, {status: status}).then((res) => {
      layer.msg('修改状态成功');
    })
  });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/customers/index.blade.php ENDPATH**/ ?>