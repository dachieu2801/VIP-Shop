

<?php $__env->startSection('title', __('admin/common.order')); ?>

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

<?php $__env->startSection('page-title-right'); ?>
<a href="<?php echo e(admin_route('orders.shipping.get')); ?>?order_id=<?php echo e($order->id); ?>" target="_blank"
    class="btn btn-outline-secondary"><i class="bi bi-printer-fill"></i> <?php echo e(__('admin/order.btn_print')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <?php
                    $__hook_name="admin.order.form.base";
                    ob_start();
                ?>
<div class="card mb-4">
    <div class="card-header">
        <h6 class="card-title"><?php echo e(__('admin/common.order')); ?></h6>
    </div>
    <div class="card-body order-top-info">
        <div class="row">
            <div class="col-lg-4 col-12">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td><?php echo e(__('order.number')); ?>：</td>
                            <td><?php echo e($order->number); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('order.payment_method')); ?>：</td>
                            <td><?php echo e($order->payment_method_name); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('admin/plugin.shipping')); ?>：</td>
                            <td><?php echo e($order->shipping_method_name); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 col-12">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td><?php echo e(__('order.total')); ?>：</td>
                            <td><?php echo e(currency_format($order->total, $order->currency_code, $order->currency_value)); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('order.customer_name')); ?>：</td>
                            <td><?php echo e($order->customer_name); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('common.email')); ?>：</td>
                            <td><?php echo e($order->email); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 col-12">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td><?php echo e(__('order.created_at')); ?>：</td>
                            <td><?php echo e($order->created_at); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('order.updated_at')); ?>：</td>
                            <td><?php echo e($order->updated_at); ?></td>
                        </tr>
                        <tr>
                            <td>Giờ nhận hàng：</td>
                            <td><?php echo e($order->receive_time ? $order->receive_time : $order->pick_up_time); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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

 <?php
                    $__hook_name="admin.order.form.address";
                    ob_start();
                ?>

<div class="card mb-4">
    <?php if($order->receiving_method == 'shipping'): ?>
    <div class="card-header">
        <h6 class="card-title"><?php echo e(__('order.address_info')); ?></h6>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="">
                <tr>
                    <?php if($order->shipping_country): ?>
                    <th><?php echo e(__('order.shipping_address')); ?></th>
                    <?php endif; ?>
                    <th><?php echo e(__('order.payment_address')); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php if($order->shipping_country): ?>
                    <td>
                        <div>
                            <?php echo e(__('address.name')); ?>：<?php echo e($order->shipping_customer_name); ?>

                            <?php if($order->shipping_telephone): ?>
                            (<?php echo e($order->shipping_telephone); ?>)
                            <?php endif; ?>
                        </div>
                        <div><?php echo e(__('address.address_2')); ?>： <?php echo e($order->shipping_address_2); ?></div>
                        <div>
                            <!-- <?php echo e(__('address.address')); ?>： -->
                            <?php echo e($order->shipping_address_1); ?>,
                            <!-- <?php echo e($order->shipping_address_2); ?> -->
                            <!-- <?php echo e($order->shipping_city); ?>, -->
                            <?php echo e($order->shipping_zone); ?>,
                            <?php echo e($order->shipping_country); ?>

                        </div>

                    </td>
                    <?php endif; ?>
                    <td>
                        <div>
                            <?php echo e(__('address.name')); ?>：<?php echo e($order->payment_customer_name); ?>

                            <?php if($order->payment_telephone): ?>
                            (<?php echo e($order->payment_telephone); ?>)
                            <?php endif; ?>
                        </div>
                        <div><?php echo e(__('address.address_2')); ?>：<?php echo e($order->payment_address_2); ?></div>
                        <div>
                            <!-- <?php echo e(__('address.address')); ?>： -->
                            <?php echo e($order->payment_address_1); ?>,
                            <!-- <?php echo e($order->payment_address_2); ?> -->
                            <!-- <?php echo e($order->payment_city); ?>, -->
                            <?php echo e($order->payment_zone); ?>,
                            <?php echo e($order->payment_country); ?>

                        </div>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
    <?php if($order->receiving_method == 'pick_up_items'): ?>
    <div>
        <div class="card-header">
            <h6 class="card-title">Nhận hàng tại shop</h6>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="">
                    <tr>
                        <th>Thông tin người đến lấy</th>
                        <th>Địa chỉ cửa hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>
                            <div>
                                <?php echo e(__('address.name')); ?>：<?php echo e($order->name); ?>


                            </div>
                            <div> Số điện thoại ： <?php echo e($order->phone); ?></div>
                        </td>

                        <td>
                            <div>
                                Địa chỉ：<?php echo e($order->pick_up_address); ?>

                            </div>
                            <div>
                                Giờ nhận：<?php echo e($order->pick_up_time); ?>

                            </div>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
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

<?php $__currentLoopData = $html_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo $item; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders_update_status')): ?>
 <?php
                    $__hook_name="admin.order.form.status";
                    ob_start();
                ?>
<div class="card mb-4">
    <div class="card-header">
        <h6 class="card-title"><?php echo e(__('order.order_status')); ?></h6>
    </div>
    <div class="card-body" id="app">
        <el-form ref="form" :model="form" :rules="rules" label-width="100px">
            <el-form-item label="<?php echo e(__('order.current_status')); ?>">
                <?php echo e($order->status_format); ?>

            </el-form-item>
            <?php if(count($statuses)): ?>
        
            <el-form-item label="<?php echo e(__('order.change_to_status')); ?>" prop="status">
                <el-select class="wp-200" size="small" v-model="form.status"
                    placeholder="<?php echo e(__('common.please_choose')); ?>">
                    <el-option v-for="item in statuses" :key="item.status" :label="item.name" :value="item.status">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="<?php echo e(__('order.express_company')); ?>" v-if="form.status == 'shipped'" prop="express_code">
                <el-select class="wp-200" size="small" v-model="form.express_code"
                    placeholder="<?php echo e(__('common.please_choose')); ?>">
                    <el-option v-for="item in source.express_company" :key="item.code" :label="item.name"
                        :value="item.code">
                    </el-option>
                </el-select>
                <a href="<?php echo e(admin_route('settings.index')); ?>?tab=tab-express-company" target="_blank"
                    class="ms-2"><?php echo e(__('common.to_setting')); ?></a>
            </el-form-item>
            <el-form-item label="<?php echo e(__('order.express_number')); ?>" v-if="form.status == 'shipped'"
                prop="express_number">
                <el-input class="w-max-500" v-model="form.express_number" size="small" v-if="form.status == 'shipped'"
                    placeholder="<?php echo e(__('order.express_number')); ?>"></el-input>
            </el-form-item>
            <el-form-item label="<?php echo e(__('admin/order.notify')); ?>">
                <el-checkbox :true-label="1" :false-label="0" v-model="form.notify"></el-checkbox>
            </el-form-item>
            <el-form-item label="<?php echo e(__('order.comment')); ?>">
                <textarea class="form-control w-max-500" v-model="form.comment"></textarea>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm('form')"><?php echo e(__('order.submit_status')); ?></el-button>
            </el-form-item>
            <?php endif; ?>
        </el-form>
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
<?php endif; ?>

 <?php
                    $__hook_name="admin.order.form.products";
                    ob_start();
                ?>
<div class="card mb-4">
    <div class="card-header">
        <h6 class="card-title"><?php echo e(__('order.product_info')); ?></h6>
    </div>
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
                                <div class="wh-60 me-2"><img src="<?php echo e(image_resize($product->image)); ?>"
                                        class="img-fluid max-h-100"></div><?php echo e($product->name); ?>

                            </div>
                        </td>
                        <td class=""><?php echo e($product->product_sku); ?></td>
                        <td><?php echo e(currency_format($product->price, $order->currency_code, $order->currency_value)); ?></td>
                        <td class=""><?php echo e($product->quantity); ?></td>
                        <td class="text-end">
                            <?php echo e(currency_format($product->price * $product->quantity, $order->currency_code, $order->currency_value)); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <?php $__currentLoopData = $order->orderTotals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderTotal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td colspan="5" class="text-end"><?php echo e($orderTotal->title); ?></td>
                        <td class="text-end"><span
                                class="fw-bold"><?php echo e(currency_format($orderTotal->value, $order->currency_code, $order->currency_value)); ?></span>
                        </td>
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

<?php if($order->comment): ?>
<div class="card mb-4">
    <div class="card-header">
        <h6 class="card-title"><?php echo e(__('order.order_comment')); ?></h6>
    </div>
    <div class="card-body"><?php echo e($order->comment); ?></div>
</div>
<?php endif; ?>

<?php if($order->orderPayments): ?>
 <?php
                    $__hook_name="admin.order.form.payments";
                    ob_start();
                ?>
<div class="card mb-4">
    <div class="card-header">
        <h6 class="card-title"><?php echo e(__('admin/order.payments_history')); ?></h6>
    </div>
    <div class="card-body">
        <div class="table-push">
            <table class="table ">
                <thead class="">
                    <tr>
                        <th><?php echo e(__('admin/order.order_id')); ?></th>
                        <th><?php echo e(__('admin/order.text_transaction_id')); ?></th>
                        <th><?php echo e(__('admin/order.text_request')); ?></th>
                        <th><?php echo e(__('admin/order.text_response')); ?></th>
                        <!-- <th><?php echo e(__('admin/order.text_callback')); ?></th>
                <th><?php echo e(__('admin/order.text_receipt')); ?></th> -->
                        <th><?php echo e(__('order.created_at')); ?></th>
                        <th><?php echo e(__('order.updated_at')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order->orderPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($payment->order_id); ?></td>
                        <td><?php echo e($payment->transaction_id); ?></td>
                        <td style="word-wrap: break-word;">
                            <!-- <?php echo e($payment->request); ?> -->
                            <?php
                            $request = json_decode($payment->request);
                            if ($request && isset($request->vnp_TxnRef) && isset($request->vnp_Amount)) {
                            echo "Mã đơn hàng: " . $request->vnp_TxnRef . "<br>";
                            echo "Tổng tiền: " . number_format(($request->vnp_Amount)/100, 0, ',', '.') . " đ";
                            } else {
                            echo "Không thể giải mã JSON.";
                            }
                            ?>
                        </td>
                        <td style="word-wrap: break-word;">
                            <!-- <?php echo e($payment->response); ?> -->
                            <?php
                            $response = json_decode($payment->response);
                            if ($response && isset($response->vnp_TxnRef) && isset($response->vnp_Amount)) {
                            echo "Mã đơn hàng: " . $response->vnp_TxnRef . "<br>";
                            echo "Tổng tiền: " . number_format(($response->vnp_Amount)/100, 0, ',', '.') . " đ";
                            } else {
                            echo "Không thể giải mã JSON.";
                            }
                            ?>
                        </td>
                        <!-- <td style="word-wrap: break-word;"><?php echo e($payment->callback); ?></td>
                <td>
                  <?php if($payment->receipt): ?>
                  <a href="<?php echo e(image_origin($payment->receipt)); ?>" target="_blank"><?php echo e(__('admin/order.text_click_view')); ?></a>
                  <?php endif; ?>
                </td> -->
                        <td><?php echo e($payment->created_at); ?></td>
                        <td><?php echo e($payment->updated_at); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
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
<?php endif; ?>

<?php if($order->orderShipments): ?>
 <?php
                    $__hook_name="admin.order.form.shipments";
                    ob_start();
                ?>
<div class="card mb-4">
    <div class="card-header">
        <h6 class="card-title"><?php echo e(__('order.order_shipments')); ?></h6>
    </div>
    <div class="card-body">
        <div class="table-push">
            <table class="table ">
                <thead class="">
                    <tr>
                        <th><?php echo e(__('order.express_company')); ?></th>
                        <th><?php echo e(__('order.express_number')); ?></th>
                        <th><?php echo e(__('order.updated_at')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order->orderShipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-id="<?php echo e($ship->id); ?>">
                        <td>
                            <div class="edit-show express-company"><?php echo e($ship->express_company); ?></div>
                            <?php if($expressCompanies): ?>
                            <select class="form-select edit-form express-code d-none"
                                aria-label="Default select example">
                                <?php $__currentLoopData = $expressCompanies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item['code']); ?>"
                                    <?php echo e($ship->express_code == $item['code'] ? 'selected' : ''); ?>><?php echo e($item['name']); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="edit-show"><?php echo e($ship->express_number); ?></div>
                            <input type="text" class="form-control edit-form express-number d-none"
                                placeholder="<?php echo e(__('order.express_number')); ?>" value="<?php echo e($ship->express_number); ?>">
                        </td>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <?php echo e($ship->created_at); ?>

                                <div class="btn btn-outline-primary btn-sm edit-shipment"><?php echo e(__('common.edit')); ?></div>
                                <div class="d-none shipment-tool">
                                    <div class="btn btn-primary btn-sm"><?php echo e(__('common.confirm')); ?></div>
                                    <div class="btn btn-outline-secondary btn-sm"><?php echo e(__('common.cancel')); ?></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
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
<?php endif; ?>

<div class="card mb-4">
    <div class="card-header">
        <h6 class="card-title"><?php echo e(__('order.action_history')); ?></h6>
    </div>
    <div class="card-body">
        <div class="table-push">
            <table class="table ">
                <thead class="">
                    <tr>
                        <th><?php echo e(__('order.history_status')); ?></th>
                        <th><?php echo e(__('order.history_comment')); ?></th>
                        <th><?php echo e(__('order.updated_at')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order->orderHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderHistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($orderHistory->status_format); ?></td>
                        <td><?php echo e($orderHistory->comment); ?></td>
                        <td><?php echo e($orderHistory->created_at); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
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

    $http.put(`/orders/<?php echo e($order->id); ?>/shipments/${id}`, {
        express_code,
        express_name,
        express_number
    }).then((res) => {
        layer.msg(res.message);
        window.location.reload();
    })
});

new Vue({
    el:"#app",
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
            status: [{
                required: true,
                message: '<?php echo e(__('admin / order.error_status ')); ?>',
                trigger: 'blur'
            }, ],
            express_code: [{
                required: true,
                message: '<?php echo e(__('common.error_required ', ['name ' => __('order.express_company ')])); ?>',
                trigger: 'blur'
            }, ],
            express_number: [{
                required: true,
                message: '<?php echo e(__('common.error_required ', ['name ' => __('order.express_number ')])); ?>',
                trigger: 'blur'
            }, ],
        }
    },

    beforeMount() {
        console.log("mounted")
    //   let statuses = <?php echo json_encode($statuses ?? [], 15, 512) ?>;
    //   this.statuses = Object.keys(statuses).map(key => {
    //     return {
    //       value: key,
    //       label: statuses[name]
    //     }
    //   });
    },

    methods: {
        submitForm(form) {
            this.$refs[form].validate((valid) => {
                if (!valid) {
                    layer.msg('<?php echo e(__('common.error_form ')); ?>', () => {});
                    return;
                }

                $http.put(`/orders/<?php echo e($order->id); ?>/status`, this.form).then((res) => {
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
<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/orders/form.blade.php ENDPATH**/ ?>