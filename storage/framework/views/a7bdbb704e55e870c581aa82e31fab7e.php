

<?php $__env->startSection('title', __('admin/rma.index')); ?>

<?php $__env->startSection('content'); ?>
  <div class="card mb-4">
    <div class="card-header"><h6 class="card-title"><?php echo e(__('admin/rma.rma_details')); ?></h6></div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-4 col-12 order-top-info">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td>ID：</td>
                <td><?php echo e($rma['id']); ?></td>
              </tr>
              <tr>
                  <td><?php echo e(__('admin/rma.customers_name')); ?>：</td>
                  <td><?php echo e($rma['name']); ?></td>
              </tr>
              <tr>
                  <td><?php echo e(__('common.phone')); ?>：</td>
                  <td><?php echo e($rma['telephone']); ?></td>
              </tr>
              <tr>
                  <td><?php echo e(__('admin/rma.service_type')); ?>：</td>
                  <td><?php echo e($rma['type_text']); ?></td>
              </tr>
              <tr>
                  <td><?php echo e(__('admin/rma.order_number')); ?>：</td>
                  <td><a href="<?php echo e(admin_route('orders.show', ['order' => $rma['order_id']])); ?>"><?php echo e($rma['order_number']); ?></a></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-lg-4 col-12 order-top-info">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td><?php echo e(__('admin/builder.modules_product')); ?>：</td>
                <td><?php echo e($rma['product_name']); ?></td>
              </tr>
              <tr>
                <td><?php echo e(__('product.sku')); ?>：</td>
                <td><?php echo e($rma['sku']); ?></td>
              </tr>
              <tr>
                <td><?php echo e(__('admin/rma.quantity')); ?>：</td>
                <td><?php echo e($rma['quantity']); ?></td>
              </tr>
              <tr>
                <td><?php echo e(__('admin/rma.reasons_return')); ?>：</td>
                <td><?php echo e($rma['reason']); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header"><h6 class="card-title"><?php echo e(__('common.status')); ?></h6></div>
    <div class="card-body" id="app">
      <el-form ref="form" :model="form" :rules="rules" label-width="140px">
        <el-form-item label="<?php echo e(__('admin/rma.current_state')); ?>">
          <?php echo e($rma['status']); ?>

        </el-form-item>
        <el-form-item label="<?php echo e(__('admin/rma.modify_status')); ?>" prop="status">
          <el-select size="small" v-model="form.status" placeholder="<?php echo e(__('common.please_choose')); ?>">
            <el-option
              v-for="item in statuses"
              :key="item.value"
              :label="item.label"
              :value="item.value">
            </el-option>
          </el-select>
        </el-form-item>
        
        <el-form-item label="<?php echo e(__('admin/rma.remarks')); ?>">
          <textarea class="form-control w-max-500" v-model="form.comment"></textarea>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="submitForm('form')"><?php echo e(__('admin/rma.update_status')); ?></el-button>
        </el-form-item>
      </el-form>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header"><h6 class="card-title"><?php echo e(__('admin/rma.operation_history')); ?></h6></div>
    <div class="card-body">
      <div class="table-push">
        <table class="table ">
          <thead class="">
            <tr>
              <th><?php echo e(__('order.history_status')); ?></th>
              <th width="60%"><?php echo e(__('order.history_comment')); ?></th>
              <th><?php echo e(__('order.history_created_at')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($history['status']); ?></td>
                <td><?php echo e($history['comment']); ?></td>
                <td><?php echo e($history['created_at']); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    new Vue({
      el: '#app',

      data: {
        statuses: [],
        rma: <?php echo json_encode($rma ?? [], 15, 512) ?>,
        form: {
          status: "",
          notify: false,
          comment: '',
        },

        rules: {
          status: [{required: true, message: '<?php echo e(__('common.error_required', ['name' => __('common.status')] )); ?>', trigger: 'blur'}, ],
        }
      },

      beforeMount() {
        let statuses = <?php echo json_encode($statuses ?? [], 15, 512) ?>;
        this.statuses = Object.keys(statuses).map(key => {
          return {
            value: key,
            label: statuses[key]
          }
        });
      },

      methods: {
        submitForm(form) {
          this.$refs[form].validate((valid) => {
            if (!valid) {
              layer.msg('<?php echo e(__('common.error_form')); ?>',()=>{});
              return;
            }

            $http.post(`rmas/history/${this.rma.id}`,this.form).then((res) => {
              layer.msg(res.message, {time: 1000}, ()=> {
                window.location.reload();
              });
            })
          });
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/rmas/info.blade.php ENDPATH**/ ?>