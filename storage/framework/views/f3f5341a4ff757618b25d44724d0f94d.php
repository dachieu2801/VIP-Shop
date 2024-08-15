<?php if($errors->any()): ?>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if (isset($component)) { $__componentOriginal4a083a84216392e1709d900c0845b944 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a083a84216392e1709d900c0845b944 = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Alert::resolve(['type' => 'danger','msg' => ''.e($error).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('shop-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Shop\View\Components\Alert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a083a84216392e1709d900c0845b944)): ?>
<?php $attributes = $__attributesOriginal4a083a84216392e1709d900c0845b944; ?>
<?php unset($__attributesOriginal4a083a84216392e1709d900c0845b944); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a083a84216392e1709d900c0845b944)): ?>
<?php $component = $__componentOriginal4a083a84216392e1709d900c0845b944; ?>
<?php unset($__componentOriginal4a083a84216392e1709d900c0845b944); ?>
<?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<style>
   .card-body {
    display: flex;
    flex-direction: column;
   }
   .delivery_address {
    width: 100%;
    height: auto;
   }
   .payment_address {
    width: 100%;
    height: auto;
   }

   .header_delivery_address, .header_payment_address {
    border-bottom: 1px solid #dbdbdb;
    font-family: "Helvetica Neue", Helvetica, Arial, 文泉驛正黑, "WenQuanYi Zen Hei", "Hiragino Sans GB", "儷黑 Pro", "LiHei Pro", "Heiti TC", 微軟正黑體, "Microsoft JhengHei UI", "Microsoft JhengHei", sans-serif;
    font-weight: 700;
    font-size: 13px;
    line-height: 19px;
    padding: 10px 10px;
   }

   .bodyDetails_delivery_address , .bodyDetails_payment_address {
    padding: 10px 10px;
    /* border-bottom: 1px solid #dbdbdb; */
   }
</style>


<div class="card mb-lg-4 mb-2 order-head">



  <div class="card-header d-flex align-items-center justify-content-between">
    <h6 class="card-title"><?php echo e(__('shop/account/order_info.order_details')); ?></h6>
    <div>
      <?php if($order->status == 'unpaid'): ?>
        <a href="<?php echo e(shop_route('orders.pay', $order->number)); ?>" class="btn btn-primary btn-sm nowrap"><?php echo e(__('shop/account/order_info.to_pay')); ?></a>
        <button class="btn btn-outline-secondary btn-sm cancel-order" type="button"><?php echo e(__('shop/account/order_info.cancel')); ?></button>
      <?php endif; ?>
      <?php if($order->status == 'shipped'): ?>
        <button class="btn btn-primary btn-sm shipped-ed" type="button"><?php echo e(__('shop/account/order_info.confirm_receipt')); ?></button>
      <?php endif; ?>
       <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("account.order.info.order_details.top.btns",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
    </div>
  </div>
  <div class="card-body">
    <div class="bg-light p-2 table-responsive">
      <?php if(!is_mobile()): ?>
        <table class="table table-borderless mb-0">
          <thead>
            <tr>
              <th class="nowrap"><?php echo e(__('shop/account/order_info.order_number')); ?></th>
              <th class="nowrap"><?php echo e(__('shop/account/order_info.order_date')); ?></th>
              <th class="nowrap"><?php echo e(__('shop/account/order_info.state')); ?></th>
              <th class="nowrap"><?php echo e(__('shop/account/order_info.order_amount')); ?></th>
              <th class="nowrap"><?php echo e(__('shop/checkout.payment_method')); ?></th>
              <th class="nowrap"><?php echo e(__('shop/checkout.delivery_method')); ?></th>
              <th class="nowrap">Giờ nhận hàng</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo e($order->number); ?></td>
              <td class="nowrap"><?php echo e($order->created_at); ?></td>
              <td class="nowrap"><?php echo e($order->status_format); ?></td>
              <td><?php echo e(currency_format($order->total, $order->currency_code, $order->currency_value)); ?></td>
              <td><?php echo e($order->payment_method_name); ?></td>
              <td><?php echo e($order->shipping_method_name); ?></td>
              <td><?php echo e($order->receive_time); ?></td>
            </tr>
          </tbody>
        </table>
      <?php else: ?>
        <div>
          <div class="d-flex justify-content-between mb-2">
            <div><?php echo e(__('shop/account/order_info.order_number')); ?></div>
            <div class="fw-bold"><?php echo e($order->number); ?></div>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <div><?php echo e(__('shop/account/order_info.order_date')); ?></div>
            <div class="fw-bold"><?php echo e($order->created_at); ?></div>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <div><?php echo e(__('shop/account/order_info.state')); ?></div>
            <div class="fw-bold"><?php echo e($order->status_format); ?></div>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <div><?php echo e(__('shop/account/order_info.order_amount')); ?></div>
            <div class="fw-bold"><?php echo e(currency_format($order->total, $order->currency_code, $order->currency_value)); ?></div>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <div><?php echo e(__('shop/checkout.payment_method')); ?></div>
            <div class="fw-bold"><?php echo e($order->payment_method_name); ?></div>
          </div>
          <div class="d-flex justify-content-between">
            <div><?php echo e(__('shop/checkout.delivery_method')); ?></div>
            <div class="fw-bold"><?php echo e($order->shipping_method_name); ?></div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="card mb-lg-4 mb-2 d-none d-lg-block">
  <div class="card-header"><h6 class="card-title"><?php echo e(__('order.address_info')); ?></h6></div>
  <div class="card-body">
    <table class="table ">
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
</div>

<div class="card mb-lg-4 mb-2 d-lg-none">
  <div class="card-header"><h6 class="card-title"><?php echo e(__('order.address_info')); ?></h6></div>
  <div class="card-body">
    <div class="delivery_address">
      <div class="header_delivery_address">Địa chỉ giao hàng</div>
      <div class="body_delivery_address">
        <div class="bodyDetails_delivery_address">
          <div>
            <?php echo e(__('address.name')); ?>：<?php echo e($order->shipping_customer_name); ?>

            <?php if($order->shipping_telephone): ?>
              (<?php echo e($order->shipping_telephone); ?>)
            <?php endif; ?>
          </div>
          <div>
            <?php echo e(__('address.address_2')); ?>： <?php echo e($order->shipping_address_2); ?>

          </div>
          <div>
            <!-- <?php echo e(__('address.address')); ?>： -->
            <?php echo e($order->shipping_address_1); ?>,
            <!-- <?php echo e($order->shipping_address_2); ?> -->
            <!-- <?php echo e($order->shipping_city); ?>, -->
            <?php echo e($order->shipping_zone); ?>,
            <?php echo e($order->shipping_country); ?>

          </div>  
        </div>   
      </div>
    </div>
    <div class="payment_address">
    <div class="header_payment_address">Địa chỉ thanh toán</div>
    <div class="body_payment_address">
      <div class="bodyDetails_payment_address">
        <div>
            <?php echo e(__('address.name')); ?>：<?php echo e($order->shipping_customer_name); ?>

            <?php if($order->shipping_telephone): ?>
              (<?php echo e($order->shipping_telephone); ?>)
            <?php endif; ?>
          </div>
          <div class="address" style="word-wrap: break-word;">
            <?php echo e(__('address.address_2')); ?>： <?php echo e($order->shipping_address_2); ?>

          </div>
          <div>
            <!-- <?php echo e(__('address.address')); ?>： -->
            <?php echo e($order->shipping_address_1); ?>,
            <!-- <?php echo e($order->shipping_address_2); ?> -->
            <!-- <?php echo e($order->shipping_city); ?>, -->
            <?php echo e($order->shipping_zone); ?>,
            <?php echo e($order->shipping_country); ?>

          </div>   
        </div>
      </div> 
    </div>
  </div>
</div>
<div class="card mb-lg-4 mb-2">
  <div class="card-header">
    <h6 class="card-title"><?php echo e(__('shop/account/order_info.order_items')); ?></h6>
  </div>
  <div class="card-body">
    <?php $__currentLoopData = $order->orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="product-list">
        <div class="d-flex">
          <div class="left border d-flex justify-content-center align-items-center wh-80"><img src="<?php echo e(image_resize($product->image)); ?>" class="img-fluid"></div>
          <div class="right">
            <div class="name">
            <a class="text-dark" href="<?php echo e(shop_route('products.show', ['product' => $product->product_id])); ?>"><?php echo e($product->name); ?></a>
            </div>
            <div class="price">
              <?php echo e(currency_format($product->price, $order->currency_code, $order->currency_value)); ?>

              x <?php echo e($product->quantity); ?>

              = <?php echo e(currency_format($product->price * $product->quantity, $order->currency_code, $order->currency_value)); ?>

            </div>
          </div>
        </div>
        <?php if($order->status == 'completed'): ?>
          <a href="<?php echo e(shop_route('account.rma.create', [$product->id])); ?>" style="white-space: nowrap;"
            class="btn btn-outline-primary btn-sm"><?php echo e(__('shop/account/order_info.apply_after_sales')); ?></a>
        <?php endif; ?>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>

<div class="card mb-lg-4 mb-2">
  <div class="card-header">
    <h6 class="card-title"><?php echo e(__('shop/account/order_info.order_total')); ?></h6>
  </div>
  <div class="card-body">
    <table class="table table-bordered border">
      <tbody>
        <?php $__currentLoopData = array_chunk($order->orderTotals->all(), 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <?php $__currentLoopData = $totals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <td class="bg-light wp-200"><?php echo e($total->title); ?></td>
              <td><strong><?php echo e(currency_format($total->value, $order->currency_code, $order->currency_value)); ?></strong></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>

<?php if($order->comment): ?>
  <div class="card mb-lg-4 mb-2">
    <div class="card-header">
      <h6 class="card-title"><?php echo e(__('order.comment')); ?></h6>
    </div>
    <div class="card-body">
      <?php echo e($order->comment); ?>

    </div>
  </div>
<?php endif; ?>

<?php $__currentLoopData = $html_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php echo $item; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("account.order_info.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

<?php if($order->orderShipments->count()): ?>
   <?php
                    $__hook_name="account.order_info.shipments";
                    ob_start();
                ?>
  <div class="card mb-lg-4 mb-2">
    <div class="card-header"><h6 class="card-title"><?php echo e(__('order.order_shipments')); ?></h6></div>
    <div class="card-body">
      <div class="table-push">
        <table class="table ">
          <thead class="">
            <tr>
              <th><?php echo e(__('order.express_company')); ?></th>
              <th><?php echo e(__('order.express_number')); ?></th>
              <th><?php echo e(__('order.history_created_at')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $order->orderShipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($ship->express_company); ?></td>
              <td><?php echo e($ship->express_number); ?></td>
              <td><?php echo e($ship->created_at); ?></td>
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

<?php if($order->orderHistories->count()): ?>
  <div class="card mb-lg-4 mb-2">
    <div class="card-header">
      <h6 class="card-title"><?php echo e(__('shop/account/order_info.order_status')); ?></h6>
    </div>
    <div class="card-body">
      <table class="table ">
        <thead class="">
          <tr>
            <th><?php echo e(__('shop/account/order_info.state')); ?></th>
            <th><?php echo e(__('shop/account/order_info.remark')); ?></th>
            <th><?php echo e(__('shop/account/order_info.update_time')); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $order->orderHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderHistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($orderHistory->status_format); ?></td>
              <td><span class="fw-bold"><?php echo e($orderHistory->comment); ?></span></td>
              <td><span class="fw-bold"><?php echo e($orderHistory->created_at); ?></span></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
<?php endif; ?>

<?php $__env->startPush('add-scripts'); ?>
  <script>
    $('.shipped-ed').click(function(event) {
      $http.post('orders/<?php echo e($order->number); ?>/complete').then((res) => {
        layer.msg(res.message)
        window.location.reload()
      })
    });

    $('.cancel-order').click(function(event) {
      $http.post('orders/<?php echo e($order->number); ?>/cancel').then((res) => {
        layer.msg(res.message)
        window.location.reload()
      })
    });


      $("#backButton").click(function() {
        window.history.back();
      });


  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\shop-freelance\themes\default/shared/order_info.blade.php ENDPATH**/ ?>