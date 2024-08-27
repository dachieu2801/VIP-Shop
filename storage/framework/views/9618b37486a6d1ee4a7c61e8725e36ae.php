

<?php $__env->startSection('title', 'Chỉnh sửa đơn hàng'); ?>

<?php $__env->startSection('page-bottom-btns'); ?>
 <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("order.detail.title.right",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
   <?php
                    $__hook_name="admin.order.form.base";
                    ob_start();
                ?>
  <!-- THONG TIN CHUNG VE KHACH HANG -->
   <div><?php echo e(json_encode($paymentMethod)); ?></div>
  <div class="card mb-4 ">
    <div class="card-header mb-5"><h6 class="card-title">Phương thức thanh toán</h6></div>
    <select>
      <option><?php echo e($order->payment_method_name); ?></option>
    </select>
  </div>
   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>

   <?php
                    $__hook_name="admin.order.form.address";
                    ob_start();
                ?>
  <!-- THONG TIN VE DIA -->

   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>

  <?php $__currentLoopData = $html_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $item; ?>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders_update_status')): ?>
   <?php
                    $__hook_name="admin.order.form.status";
                    ob_start();
                ?>

   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>
  <?php endif; ?>

   <?php
                    $__hook_name="admin.order.form.products";
                    ob_start();
                ?>
  <div class="card mb-4">
    <div class="card-header"><h6 class="card-title"><?php echo e(__('order.product_info')); ?></h6></div>
    <div class="card-body">
      <div class="table-push">
        <table class="table ">
          <thead class="">
            <tr>
              <th>ID</th>
              <th><?php echo e(__('order.product_name')); ?></th>
              <th class=""><?php echo e(__('order.product_sku')); ?></th>
              <th><?php echo e(__('order.product_price')); ?></th>
              <th class=""><?php echo e(__('order.product_quantity')); ?></th>
              <th class="text-end"><?php echo e(__('order.product_sub_price')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $order->orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($product->product_id); ?></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="wh-60 me-2"><img src="<?php echo e(image_resize($product->image)); ?>" class="img-fluid max-h-100"></div><?php echo e($product->name); ?>

                </div>
              </td>
              <td class=""><?php echo e($product->product_sku); ?></td>
              <td><?php echo e(currency_format($product->price, $order->currency_code, $order->currency_value)); ?></td>
              <td class=""><?php echo e($product->quantity); ?></td>
              <td class="text-end"><?php echo e(currency_format($product->price * $product->quantity, $order->currency_code, $order->currency_value)); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <tfoot>
            <?php $__currentLoopData = $order->orderTotals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderTotal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td colspan="5" class="text-end"><?php echo e($orderTotal->title); ?></td>
                <td class="text-end"><span class="fw-bold"><?php echo e(currency_format($orderTotal->value, $order->currency_code, $order->currency_value)); ?></span></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders_update_status')): ?>
    <script>
      $('.edit-shipment').click(function() {
        $(this).siblings('.shipment-tool').removeClass('d-none');
        $(this).addClass('d-none');

        $(this).parents('tr').find('.edit-show').addClass('d-none');
        $(this).parents('tr').find('.edit-form').removeClass('d-none');
        <?php if(!$expressCompanies): ?>
        $(this).parents('tr').find('.express-company').removeClass('d-none');
        <?php endif; ?>
      });

      $('.shipment-tool .btn-outline-secondary').click(function() {
        $(this).parent().siblings('.edit-shipment').removeClass('d-none');
        $(this).parent().addClass('d-none');

        $(this).parents('tr').find('.edit-show').removeClass('d-none');
        $(this).parents('tr').find('.edit-form').addClass('d-none');
      });

      $('.shipment-tool .btn-primary').click(function() {
        const id = $(this).parents('tr').data('id');
        const express_code = $(this).parents('tr').find('.express-code').val();
        const express_name = $(this).parents('tr').find('.express-code option:selected').text();
        const express_number = $(this).parents('tr').find('.express-number').val();

        $(this).parent().siblings('.edit-shipment').removeClass('d-none');
        $(this).parent().addClass('d-none');

        $(this).parents('tr').find('.edit-show').removeClass('d-none');
        $(this).parents('tr').find('.edit-form').addClass('d-none');

        $http.put(`/orders/<?php echo e($order->id); ?>/shipments/${id}`, {express_code,express_name,express_number}).then((res) => {
          layer.msg(res.message);
          window.location.reload();
        })
      });

    new Vue({
      el: '#app',

      data: {
        // statuses: [{"value":"pending","label":"待处理"},{"value":"rejected","label":"已拒绝"},{"value":"approved","label":"已批准（待顾客寄回商品）"},{"value":"shipped","label":"已发货（寄回商品）"},{"value":"completed","label":"已完成"}],
        statuses: <?php echo json_encode($statuses ?? [], 15, 512) ?>,
        form: {
          status: "",
          express_number: '',
          express_code: '',
          notify: 0,
          comment: '',
        },

        source: {
          express_company: <?php echo json_encode(system_setting('base.express_company', []), 512) ?>,
        },

        rules: {
          status: [{required: true, message: '<?php echo e(__('admin/order.error_status')); ?>', trigger: 'blur'}, ],
          express_code: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('order.express_company')])); ?>',trigger: 'blur'}, ],
          express_number: [{required: true,message: '<?php echo e(__('common.error_required', ['name' => __('order.express_number')])); ?>',trigger: 'blur'}, ],
        }
      },

      // beforeMount() {
      //   let statuses = <?php echo json_encode($statuses ?? [], 15, 512) ?>;
      //   this.statuses = Object.keys(statuses).map(key => {
      //     return {
      //       value: key,
      //       label: statuses[name]
      //     }
      //   });
      // },

      methods: {
        submitForm(form) {
          this.$refs[form].validate((valid) => {
            if (!valid) {
              layer.msg('<?php echo e(__('common.error_form')); ?>',()=>{});
              return;
            }

            $http.put(`/orders/<?php echo e($order->id); ?>/status`,this.form).then((res) => {
              layer.msg(res.message);
              window.location.reload();
            })
          });
        }
      }
    })
  </script>
  <?php endif; ?>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/orders/edit.blade.php ENDPATH**/ ?>