<!DOCTYPE html>
<html dir="<?php echo e(current_language()); ?>" lang="<?php echo e(current_language()); ?>">
<head>
  <meta charset="UTF-8" />
  <title><?php echo e(__("admin/order.pick_list")); ?></title>
  <link href="<?php echo e(mix('/build/beike/admin/css/bootstrap.css')); ?>" rel="stylesheet">
</head>
<body>
<div class="container">
  <div id="print-button">
    <style media="print">.printer {display:none;} .btn {display:none;}</style>
    <p style="text-align: right;"><button class="btn btn-primary right" type="button" onclick="window.print()" class="printer"><?php echo e(__("admin/order.btn_print")); ?></button></p>
  </div>
  <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div style="page-break-after: always;">
    <h1 style="text-align: center;"><?php echo e($order['store_name']); ?> <?php echo e(__("admin/order.pick_list")); ?></h1>
    <table class="table">
      <tbody>
      <tr>
        <td>
          <b><?php echo e(__("admin/order.shipping_customer_name")); ?>: </b> <?php echo e($order['shipping_customer_name']); ?><br />
          <b><?php echo e(__("admin/order.telephone")); ?>: </b> <?php echo e($order['shipping_telephone']); ?><br/>
          <b><?php echo e(__("admin/order.email")); ?>: </b> <?php echo e($order['email']); ?><br/>
          <b><?php echo e(__("admin/order.shipping_address")); ?>: </b> <?php echo e($order['shipping_address_1']); ?>,<?php echo e($order['shipping_zone']); ?>,
          <?php echo e($order['shipping_country']); ?><br />
          <b>Địa chỉ chi tiết: </b> <?php echo e($order['shipping_address_2']); ?><br/>
          <b>Giờ nhận hàng: </b> <?php echo e($order['receive_time'] ?? ''); ?><br />
        </td>
        <td style="width: 50%;">
          <b><?php echo e(__("admin/order.order_number")); ?>: </b> <?php echo e($order['number']); ?><br />
          <b><?php echo e(__("admin/order.created_at")); ?>: </b> <?php echo e($order['created_at']); ?><br />
          
        </td>
      </tr> 
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
      <tr>
        <td><b><?php echo e(__("admin/order.index")); ?></b></td>
        <td><b><?php echo e(__("admin/order.image")); ?></b></td>
        <td><b><?php echo e(__("admin/order.product")); ?></b></td>
        <td><b><?php echo e(__("admin/order.sku")); ?></b></td>
        <td class="text-right"><b><?php echo e(__("admin/order.quantity")); ?></b></td>
        <td class="text-right"><b><?php echo e(__("admin/order.price")); ?></b></td>
        <td class="text-right"><b><?php echo e(__("admin/order.total")); ?></b></td>
      </tr>
      </thead>
      <tbody>
      <?php if($order['order_products']): ?>
      <?php $__currentLoopData = $order['order_products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><img class="img-thumbnail" src="<?php echo e($product['image']); ?>" alt=""></td>
        <td><?php echo e($product['name']); ?></td>
        <td><?php echo e($product['sku']); ?></td>
        <td class="text-right"><?php echo e($product['quantity']); ?></td>
        <td class="text-right"><?php echo e($product['price']); ?></td>
        <td class="text-right"><?php echo e($product['total_format']); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      </tbody>
    </table>
    <table class="table table-tdborder-no">
      <thead style="border-top: 1px solid #ddd;">
      <tr>
        <td><b><?php echo e(__("admin/order.product_total")); ?></b>: <?php echo e($order['product_total']); ?></td>
        <td></td>
        <td><b><?php echo e(__("admin/order.order_total")); ?></b>: <?php echo e($order['total']); ?></td>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td colspan="3">
          <b><?php echo e($order['store_name']); ?></b> <br />
          <b><?php echo e(__("admin/order.telephone")); ?>: </b> <?php echo e($order['shipping_telephone']); ?><br />
          <b><?php echo e(__("admin/order.email")); ?>: </b> <?php echo e($order['email']); ?><br />
          <b><?php echo e(__("admin/order.website")); ?>: </b> <a href="<?php echo e($order['website']); ?>"><?php echo e($order['website']); ?></a></td>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</body>
</html>
<?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/orders/shipping.blade.php ENDPATH**/ ?>