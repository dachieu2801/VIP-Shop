

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
<!-- THÔNG TIN CHUNG VỀ KHÁCH HÀNG -->
<div id="app">
    <div class="card mb-4">
        <div class="card-header mb-3">
            <h6 class="card-title">Phương thức thanh toán</h6>
        </div>

        <div class="card-body">
            <div class="form-group">

                <select class="form-control custom-select" id="paymentMethod" style="width: 50%;">
                    <option value="<?php echo e($order['payment_method_code']); ?>" ><?php echo e($order['payment_method_name']); ?></option>
                    <?php $__currentLoopData = $paymentMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($method['name'] != $order['payment_method_name']): ?>
                    <option value="<?php echo e($method['code']); ?>"><?php echo e($method['name']); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
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
    <!-- THÔNG TIN VỀ ĐỊA CHỈ -->

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
        <div class="card-header">
            <h6 class="card-title">Thông tin đơn hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-push">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo e(__('order.product_name')); ?></th>
                            <th><?php echo e(__('order.product_sku')); ?></th>
                            <th><?php echo e(__('order.product_price')); ?></th>
                            <th><?php echo e(__('order.product_quantity')); ?></th>
                            <th class="text-end"><?php echo e(__('order.product_sub_price')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product, index) in products" :key="product.id">
                            <td>
                                <div class="d-flex align-items-center">
                                    <input type="text" class="form-control" v-model="product.name" name="product_name[]">
                                </div>
                            </td>
                            <td>
                                <input type="text" class="form-control" v-model="product.product_sku" name="product_sku[]">
                            </td>
                            <td>
                                <input type="text" class="form-control" v-model="product.price" name="product_price[]">
                            </td>
                            <td>
                                <input type="number" class="form-control" v-model="product.quantity" name="product_quantity[]" min="0">
                            </td>
                            <td class="text-end bg-light">
                                <div>{{ product.price * product.quantity }}</div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end">Tổng giá trị</td>
                            <td class="text-end bg-light">
                                <div>{{ subTotal.toFixed(2) }}</div>
                            </td>
                        </tr>
                        <tr v-for="(totalItem, key) in orderTotals" :key="key" v-if="key !== 'order_total' && key !== 'sub_total'">
                            <td colspan="4" class="text-end">{{ totalItem.title }}</td>
                            <td class="text-end">
                                <input type="number" step="0.01" class="form-control text-end" v-model.number="totalItem.value">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end">Tổng thanh toán</td>
                            <td class="text-end bg-light">
                                <div>{{ orderTotal }}</div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-primary btn-lg shadow" @click="submitOrder" style="padding: 15px 30px; font-weight: bold; font-size: 1.2rem;">
                Chỉnh sửa
            </button>
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
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders_update_status')): ?>

<?php
$products = $order->orderProducts->map(function ($product) {
    return [
        'id' => $product->id,
        'order_id' => $product->order_id,
        'product_id' => $product->product_id,
        'order_number' => $product->order_number,
        'product_sku' => $product->product_sku,
        'name' => $product->name,
        'image' => $product->image,
        'quantity' => $product->quantity,
        'price' => $product->price,
        'created_at' => $product->created_at,
        'updated_at' => $product->updated_at,
        'deleted_at' => $product->deleted_at,
        'reviewed' => $product->reviewed,
        'origin_price' => $product->origin_price,
        'review_id' => $product->review_id,
        'price_format' => $product->price_format,
    ];
});
?>
<script>
new Vue({
    el: '#app',
    data: {
        orderId: <?php echo json_encode($order['id'], 15, 512) ?>,
        products: <?php echo json_encode($products, 15, 512) ?>,
        orderTotals: <?php echo json_encode($order->orderTotals->keyBy('code'), 15, 512) ?>,
        paymentMethods: <?php echo json_encode($paymentMethod, 15, 512) ?>,
    },
    computed: {
        subTotal() {
return this.products.reduce((total, product) => {
                const price = parseFloat(product.price) || 0;
                const quantity = parseInt(product.quantity) || 0;
                return total + (price * quantity);
            }, 0);
        },
        orderTotal() {
            let total = this.subTotal;

            for (const [key, totalItem] of Object.entries(this.orderTotals)) {
                if (key === 'order_total' || key === 'sub_total') continue;

                const value = parseFloat(totalItem.value) || 0;

                if (key === 'customer_discount') {
                    total -= value;
                } else {
                    total += value;
                }
            }

            // Ensure total is not negative and round to two decimal places
            return total > 0 ? total.toFixed(2) : '0.00';
        }
    },
    methods: {
        submitOrder() {

            // Collecting data from the form inputs and products
            const orderData = {
                id: this.orderId,
                paymentMethod: this.paymentMethods.find(item=> item.code === document.getElementById('paymentMethod').value)  ,
                products: this.products.map(product => ({
                    id: product.id,
                    name: product.name,
                    sku: product.product_sku,
                    price: product.price,
                    quantity: product.quantity
                })),
                orderTotals: {
                    sub_total: this.subTotal,
                    order_total: this.orderTotal,
                    tax: this.orderTotals['tax'] ? this.orderTotals['tax'].value : 0,
                    shipping: this.orderTotals['shipping'] ? this.orderTotals['shipping'].value : 0,
                    customer_discount: this.orderTotals['customer_discount'] ? this.orderTotals['customer_discount'].value : 0,
                    paypay_fee: this.orderTotals['paypay_fee'] ? this.orderTotals['paypay_fee'].value : 0,
                    tax_fee: this.orderTotals['tax_fee'] ? this.orderTotals['tax_fee'].value : 0,
                },
            };

            layer.confirm('Bạn có chắc muốn chỉnh sửa đơn ?', {
                title: "<?php echo e(__('common.text_hint')); ?>",
                btn: ['<?php echo e(__('common.cancel')); ?>', '<?php echo e(__('common.confirm')); ?>'],
                area: ['400px'],
                btn2: () => {
                    // Sending the collected data via a put request
                    $http.put('/orders', orderData)
                      .then(response => {
                        alert('Order updated successfully');
                      })
                      .catch(error => {
                        console.error('Error updating order:', error);
                      });
                }
            });
        }
    },
    mounted(){
        console.log(this.products);
    }
});
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/orders/edit.blade.php ENDPATH**/ ?>