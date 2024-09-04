

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
<div id="app"> 
   <div class="card mb-4">
  
    <div class="card-header mb-3">
        <h6 class="card-title">Phương thức thanh toán</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            
            <select class="form-control custom-select" id="paymentMethod" style="width: 50%;">
              <option><?php echo e($order['payment_method_name']); ?></option>
              <?php $__currentLoopData = $paymentMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($method['name'] != $order['payment_method_name']): ?> 
                <option><?php echo e($method['name']); ?></option>
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
    <div class="card-header"><h6 class="card-title">Thông tin đơn hàng</h6></div>
    <div class="card-body">
        <div class="table-push">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo e(__('order.product_name')); ?></th>
                        <th class=""><?php echo e(__('order.product_sku')); ?></th>
                        <th><?php echo e(__('order.product_price')); ?></th>
                        <th class=""><?php echo e(__('order.product_quantity')); ?></th>
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
        <td class="">
            <input type="text" class="form-control" v-model="product.product_sku" name="product_sku[]">
        </td>
        <td>
            <input type="text" class="form-control" v-model="product.price" name="product_price[]">
        </td>
        <td class="">
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
      <div>{{ subTotal }}</div>
    </td>
  </tr>
  <tr v-if="orderTotals['tax']">
    <td colspan="4" class="text-end">{{ orderTotals['tax'].title }}</td>
    <td class="text-end">
      <input type="text" class="form-control text-end" v-model="orderTotals['tax'].value">
    </td>
  </tr>
  <tr v-if="orderTotals['shipping']">
    <td colspan="4" class="text-end">{{ orderTotals['shipping'].title }}</td>
    <td class="text-end">
      <input type="text" class="form-control text-end" v-model="orderTotals['shipping'].value">
    </td>
  </tr>
  <tr v-if="orderTotals['customer_discount']">
    <td colspan="4" class="text-end">{{ orderTotals['customer_discount'].title }}</td>
    <td class="text-end">
      <input type="text" class="form-control text-end" v-model="orderTotals['customer_discount'].value">
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
  },
  computed: {
    subTotal() {
      return this.products.reduce((total, product) => {
        return total + (product.price * product.quantity);
      }, 0);
    },
    orderTotal() {
      let total = this.subTotal;
      if (this.orderTotals['tax']) {
        total += parseFloat(this.orderTotals['tax'].value);
      }
      if (this.orderTotals['shipping']) {
        total += parseFloat(this.orderTotals['shipping'].value);
      }
      if (this.orderTotals['customer_discount']) {
        total -= parseFloat(this.orderTotals['customer_discount'].value);
      }
      if(total < 0){
        total = 0;
      }
      return total;
    }
  },
  methods: {
    submitOrder() {
      // Collecting data from the form inputs and products
      const orderData = {
        id: this.orderId,
        paymentMethod: document.getElementById('paymentMethod').value,
        products: this.products.map(product => ({
       
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
          customer_discount: this.orderTotals['customer_discount'] ? this.orderTotals['customer_discount'].value : 0
        },  
       
      };
      layer.confirm('Bạn có chắc muốn chỉnh sửa đơn ?', {
        title: "<?php echo e(__('common.text_hint')); ?>",
        btn: ['<?php echo e(__('common.cancel')); ?>', '<?php echo e(__('common.confirm')); ?>'],
        area: ['400px'],
        btn2: () => {
        console.log(orderData);

         // Sending the collected data via a POST request
      // $http.post('/your-endpoint-url', orderData)
      //   .then(response => {
      //     // Handle successful response
      //     alert('Order updated successfully');
      //   })
      //   .catch(error => {
      //     // Handle error response
      //     console.error('Error updating order:', error);
      //   });
        
      }
    })

     
    }
  }
});
  </script>
  <?php endif; ?>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/orders/edit.blade.php ENDPATH**/ ?>