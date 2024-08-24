

<?php $__env->startSection('body-class', 'page-account-order-list'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginalaaf2a10efb487c03115f53565e62c23d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaaf2a10efb487c03115f53565e62c23d = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Breadcrumb::resolve(['type' => 'static','value' => 'account.order.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('shop-breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Shop\View\Components\Breadcrumb::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaaf2a10efb487c03115f53565e62c23d)): ?>
<?php $attributes = $__attributesOriginalaaf2a10efb487c03115f53565e62c23d; ?>
<?php unset($__attributesOriginalaaf2a10efb487c03115f53565e62c23d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaaf2a10efb487c03115f53565e62c23d)): ?>
<?php $component = $__componentOriginalaaf2a10efb487c03115f53565e62c23d; ?>
<?php unset($__componentOriginalaaf2a10efb487c03115f53565e62c23d); ?>
<?php endif; ?>

  <div class="container">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo e(__('shop/account/order_info.confirm_cancellation')); ?></h1>
            <button type="button" class="btn-close cancel-action" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <textarea id="reason-input" class="w-100 p-4 form-control"  placeholder="<?php echo e(__('shop/account/order_info.reason')); ?>"></textarea>
          </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel-action" data-bs-dismiss="modal" ><?php echo e(__('shop/account/order_info.cancel')); ?></button>
            <button id="confirm-cancellation" type="button" class="btn btn-primary"><?php echo e(__('common.confirm')); ?></button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php if (isset($component)) { $__componentOriginala26eb845294ba79611443e3fb4307fd6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala26eb845294ba79611443e3fb4307fd6 = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\AccountSidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('shop-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Shop\View\Components\AccountSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala26eb845294ba79611443e3fb4307fd6)): ?>
<?php $attributes = $__attributesOriginala26eb845294ba79611443e3fb4307fd6; ?>
<?php unset($__attributesOriginala26eb845294ba79611443e3fb4307fd6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala26eb845294ba79611443e3fb4307fd6)): ?>
<?php $component = $__componentOriginala26eb845294ba79611443e3fb4307fd6; ?>
<?php unset($__componentOriginala26eb845294ba79611443e3fb4307fd6); ?>
<?php endif; ?>

      <div class="col-12 col-md-9">
        <?php if(!is_mobile()): ?>
        <div class="card mb-4 account-card order-wrap h-min-600">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title"><?php echo e(__('shop/account/order.index')); ?></h5>
          </div>
          <div class="card-body">

            <?php echo $__env->make('account.order_status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="table-responsive mt-3 ">
              <div class="">
               <table class="table">
                 <?php if(count($orders)): ?>
                   <?php if($review): ?>
                     <?php if(count($orderProducts)): ?>
                       <div class="content-wrapper mt-3 ">
                         <?php $__currentLoopData = $orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class=" d-flex justify-content-between align-items-center my-3 p-2 border">
                             <div class=" d-flex justify-content-between align-items-center pe-3 ">
                               <div class="img border d-flex align-items-center wh-60"><img src="<?php echo e($product->image); ?>" class="img-fluid"></div>
                               <div class="name ms-2">
                                 <div><?php echo e($product->name); ?></div>
                                 <div class="quantity mt-1 text-secondary">x <?php echo e($product->quantity); ?></div>
                               </div>
                             </div>
                             <div  style="min-width: 80px">
                               <a href="<?php echo e(shop_route('product.get_review', ['productId' => $product->product_id,'orderProductId'=>$product->id])); ?>" class="btn w-100 btn-primary btn-sm nowrap mb-2"><?php echo e(__('shop/account/order.review')); ?></a>
                             </div>
                           </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </div>
                       
                     <?php else: ?>
                       <tbody>
                       <tr><td colspan="4" class="border-0"><?php if (isset($component)) { $__componentOriginal73d47510345862f42a7c4fe129814e32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73d47510345862f42a7c4fe129814e32 = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\NoData::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('shop-no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Shop\View\Components\NoData::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73d47510345862f42a7c4fe129814e32)): ?>
<?php $attributes = $__attributesOriginal73d47510345862f42a7c4fe129814e32; ?>
<?php unset($__attributesOriginal73d47510345862f42a7c4fe129814e32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73d47510345862f42a7c4fe129814e32)): ?>
<?php $component = $__componentOriginal73d47510345862f42a7c4fe129814e32; ?>
<?php unset($__componentOriginal73d47510345862f42a7c4fe129814e32); ?>
<?php endif; ?></td></tr>
                       </tbody>
                     <?php endif; ?>
                   <?php else: ?>
                     <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tbody>
                       <tr class="sep-row"><td colspan="4"></td></tr>
                       <tr class="head-tr">
                         <td colspan="4">
                           <span class="order-created me-4"><?php echo e($order->created_at); ?></span>
                           <span
                             class="order-number"><?php echo e(__('shop/account/order.order_number')); ?>：<?php echo e($order->number); ?></span>
                         </td>
                       </tr>
                       <?php $__currentLoopData = $order->orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr class="<?php echo e($loop->first ? 'first-tr' : ''); ?>">
                           <td>
                             <div class="product-info">
                               <div class="img border d-flex justify-content-center align-items-center wh-60"><img src="<?php echo e(image_resize($product->image)); ?>" class="img-fluid"></div>
                               <div class="name">
                                 <a class="text-dark"
                                    href="<?php echo e(shop_route('products.show', ['product' => $product->product_id])); ?>"><?php echo e($product->name); ?></a>
                                 <div class="quantity mt-1 text-secondary">x <?php echo e($product->quantity); ?></div>
                               </div>
                             </div>
                           </td>
                           <?php if($loop->first): ?>
                             <td rowspan="<?php echo e($loop->count); ?>">
                               <p class="text-center fw-bold text-danger"><?php echo e(currency_format($order->total, $order->currency_code, $order->currency_value)); ?></p>
                               <p class="text-nowrap text-center <?php if($order->status == 'unpaid'): ?> unpaid-order-text <?php elseif($order->status == 'completed'): ?> completed-order-text <?php elseif($order->status=='paid'): ?> paid-order-text <?php elseif($order->status=='shipped'): ?> shipped-order-text <?php elseif($order->status=='cancelled'): ?> cancelled-order-text <?php endif; ?>"><?php echo e($order->status_format); ?></p>
                             </td>
                           <td><?php echo e($order->payment); ?></td>
                             <td rowspan="<?php echo e($loop->count); ?>" class="text-end">
                               <a href="<?php echo e(shop_route('account.order.show', ['number' => $order->number])); ?>" class="btn btn-outline-secondary btn-sm mb-2 w-100"><?php echo e(__('shop/account/order.check')); ?></a>
                               <?php if($order->status == 'unpaid'): ?>
                                 <?php if($order['payment_method_code']=="vn_pay"): ?> <a href="<?php echo e(shop_route('orders.pay', $order->number)); ?>" class="btn w-100 btn-primary btn-sm nowrap mb-2"><?php echo e(__('shop/account/order_info.to_pay')); ?></a> <?php endif; ?>

                                 <button type="button" class="btn  cancel-order w-100 btn-outline-danger btn-sm" data-number="<?php echo e($order->number); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                   <?php echo e(__('shop/account/order_info.cancel')); ?>

                                 </button>
                               <?php endif; ?>
                             </td>
                           <?php endif; ?>
                         </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </tbody>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                   <?php endif; ?>

                 <?php else: ?>
                   <tbody>
                   <tr><td colspan="4" class="border-0"><?php if (isset($component)) { $__componentOriginal73d47510345862f42a7c4fe129814e32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73d47510345862f42a7c4fe129814e32 = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\NoData::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('shop-no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Shop\View\Components\NoData::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73d47510345862f42a7c4fe129814e32)): ?>
<?php $attributes = $__attributesOriginal73d47510345862f42a7c4fe129814e32; ?>
<?php unset($__attributesOriginal73d47510345862f42a7c4fe129814e32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73d47510345862f42a7c4fe129814e32)): ?>
<?php $component = $__componentOriginal73d47510345862f42a7c4fe129814e32; ?>
<?php unset($__componentOriginal73d47510345862f42a7c4fe129814e32); ?>
<?php endif; ?></td></tr>
                   </tbody>
                 <?php endif; ?>

               </table>
             </div>










































































              <?php if(!$review): ?>
              <?php echo e($orders->links('shared/pagination/bootstrap-4')); ?>

              <?php endif; ?>
            </div>

          </div>
        </div>
        <?php else: ?>
          <div class="order-mb-wrap">
            <?php echo $__env->make('account.order_status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(count($orders)): ?>
              <?php if($review): ?>
                <?php if(count($orderProducts)): ?>
                  <div class="content-wrapper mt-3 ">
                    <?php $__currentLoopData = $orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="my-3 p-2 border">
                        <div class=" d-flex justify-content-between align-items-center">
                          <div class="img border d-flex align-items-center wh-60"><img src="<?php echo e($product->image); ?>" class="img-fluid"></div>
                          <div class="name ms-2">
                            <div style="white-space: nowrap;overflow: hidden;"><?php echo e($product->name); ?></div>
                            <div class="quantity mt-1 text-secondary">x <?php echo e($product->quantity); ?></div>
                          </div>
                        </div>
                        <div class="footer-wrapper">
                          <div style="min-width: 80px" class="footer-btns d-flex justify-content-end mt-2">
                            <a href="<?php echo e(shop_route('product.get_review', ['productId' => $product->product_id,'orderProductId'=>$product->id])); ?>" class="btn w-100 btn-primary btn-sm nowrap mb-2"><?php echo e(__('shop/account/order.review')); ?></a>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                <?php else: ?>
                  <tbody>
                  <tr><td colspan="4" class="border-0"><?php if (isset($component)) { $__componentOriginal73d47510345862f42a7c4fe129814e32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73d47510345862f42a7c4fe129814e32 = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\NoData::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('shop-no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Shop\View\Components\NoData::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73d47510345862f42a7c4fe129814e32)): ?>
<?php $attributes = $__attributesOriginal73d47510345862f42a7c4fe129814e32; ?>
<?php unset($__attributesOriginal73d47510345862f42a7c4fe129814e32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73d47510345862f42a7c4fe129814e32)): ?>
<?php $component = $__componentOriginal73d47510345862f42a7c4fe129814e32; ?>
<?php unset($__componentOriginal73d47510345862f42a7c4fe129814e32); ?>
<?php endif; ?></td></tr>
                  </tbody>
                <?php endif; ?>
              <?php else: ?>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="order-mb-list card mb-3">
                  <div class="card-body">
                    <div class="header-wrapper d-flex justify-content-between">
                      <div><?php echo e(__('shop/account/order.order_number')); ?>：<?php echo e($order->number); ?></div>
                      <div><?php echo e($order->status_format); ?></div>
                    </div>
                    <div class="content-wrapper">
                      <div class="order-product-wrap mb-2" onclick="window.location.href='<?php echo e(shop_route('account.order.show', ['number' => $order->number])); ?>'">
                        <?php $__currentLoopData = $order->orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-info d-flex mb-2">
                          <div class="img border d-flex justify-content-center align-items-center wh-60"><img src="<?php echo e($product->image); ?>" class="img-fluid"></div>
                          <div class="name ms-2">
                            <div><?php echo e($product->name); ?></div>
                            <div class="quantity mt-1 text-secondary">x <?php echo e($product->quantity); ?></div>
                          </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                    <div class="footer-wrapper">
                      <div class="d-flex justify-content-between">
                        <div class="text-secondary"><?php echo e($order->created_at); ?></div>
                        <div class="fw-bold"><?php echo e(__('admin/order.total')); ?>：<span class="amount text-primary"><?php echo e(currency_format($order->total, $order->currency_code, $order->currency_value)); ?></span></div>
                      </div>
                      <div class="footer-btns d-flex justify-content-end mt-2">
                        <?php if($order->status == 'unpaid'): ?>
                          <a href="<?php echo e(shop_route('orders.pay', $order->number)); ?>" class="btn btn-primary btn-sm nowrap"><?php echo e(__('shop/account/order_info.to_pay')); ?></a>

                          <button type="button" class="btn btn-outline-danger ms-2 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <?php echo e(__('shop/account/order_info.cancel')); ?>

                          </button>
                        <?php endif; ?>
                        <a href="<?php echo e(shop_route('account.order.show', ['number' => $order->number])); ?>"
                          class="btn btn-outline-secondary btn-sm ms-2"><?php echo e(__('shop/account/order.check')); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($orders->links('shared/pagination/bootstrap-4')); ?>

              <?php endif; ?>
            <?php else: ?>
              <?php if (isset($component)) { $__componentOriginal73d47510345862f42a7c4fe129814e32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73d47510345862f42a7c4fe129814e32 = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\NoData::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('shop-no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Shop\View\Components\NoData::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73d47510345862f42a7c4fe129814e32)): ?>
<?php $attributes = $__attributesOriginal73d47510345862f42a7c4fe129814e32; ?>
<?php unset($__attributesOriginal73d47510345862f42a7c4fe129814e32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73d47510345862f42a7c4fe129814e32)): ?>
<?php $component = $__componentOriginal73d47510345862f42a7c4fe129814e32; ?>
<?php unset($__componentOriginal73d47510345862f42a7c4fe129814e32); ?>
<?php endif; ?>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add-scripts'); ?>
<script>


  let orderNumber = null;

  $('.cancel-order').click(function (event){
    orderNumber = $(this).data('number');
    console.log(orderNumber);
  })

  $('.cancel-action').click(function (event){
    orderNumber=null;
    $('#reason-input').val("");
    console.log(orderNumber, $('reason-input').val());
  })

  $('#confirm-cancellation').click(function (event){
    if (orderNumber){
      console.log($('#reason-input').val(),orderNumber);
      $('#exampleModal').modal('hide');
      console.log(JSON.stringify({cancellation_reason: $('#reason-input').val() ? $('#reason-input').val() : ""}));
      $http.post(`orders/${orderNumber}/cancel`, {cancellation_reason: $('#reason-input').val() ? $('#reason-input').val() : ""}).then((res) => {
        layer.msg(res.message)
        window.location.reload();
      });


    }
  })


  // $('.cancel-order').click(function(event) {
  //   var number = $(this).data('number')
  //   $http.post(`orders/${number}/cancel`).then((res) => {
  //     layer.msg(res.message)
  //     window.location.reload()
  //   })
  // });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\themes\default/account/order.blade.php ENDPATH**/ ?>