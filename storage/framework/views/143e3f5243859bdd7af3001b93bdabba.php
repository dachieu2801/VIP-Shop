

<?php $__env->startSection('body-class', 'page-account'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginalaaf2a10efb487c03115f53565e62c23d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaaf2a10efb487c03115f53565e62c23d = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Breadcrumb::resolve(['type' => 'static','value' => 'account.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <?php if(\Session::has('success')): ?>
          <div class="alert alert-success">
            <ul>
              <li><?php echo \Session::get('success'); ?></li>
            </ul>
          </div>
        <?php endif; ?>

        <div class="card account-card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title"><?php echo e(__('shop/account.my_order')); ?></h5>
            <a href="<?php echo e(shop_route('account.order.index')); ?>" class="text-muted"><?php echo e(__('shop/account.orders')); ?></a>
          </div>
          <div class="card-body p-0">
            <div class="d-flex flex-nowrap card-items mb-4 py-3">
              <a href="<?php echo e(shop_route('account.order.index', ['status' => 'unpaid'])); ?>" class="d-flex flex-column align-items-center"><i class="iconfont">&#xf12f;</i><span
                  class="text-muted text-center"><?php echo e(__('order.unpaid')); ?></span></a>
              <a href="<?php echo e(shop_route('account.order.index', ['status' => 'paid'])); ?>" class="d-flex flex-column align-items-center"><i class="iconfont">&#xf130;</i><span
                  class="text-muted text-center"><?php echo e(__('shop/account.pending_send')); ?></span></a>
              <a href="<?php echo e(shop_route('account.order.index', ['status' => 'shipped'])); ?>" class="d-flex flex-column align-items-center"><i class="iconfont">&#xf131;</i><span
                  class="text-muted text-center"><?php echo e(__('shop/account.pending_receipt')); ?></span></a>
              <a href="<?php echo e(shop_route('account.rma.index')); ?>" class="d-flex flex-column align-items-center"><i class="iconfont">&#xf132;</i><span
                  class="text-muted text-center"><?php echo e(__('shop/account.after_sales')); ?></span></a>
            </div>
            <div class="order-wrap">
              <?php if(!count($latest_orders)): ?>
                <div class="no-order d-flex flex-column align-items-center">
                  <div class="icon mb-2"><i class="iconfont">&#xe60b;</i></div>
                  <div class="text mb-3 text-muted"><?php echo e(__('shop/account.no_order')); ?><a href=""><?php echo e(__('shop/account.to_buy')); ?></a></div>
                </div>
              <?php else: ?>
                
                <ul class="list-unstyled orders-list table-responsive d-none d-lg-block">
                  <table class="table table-hover p-0">
                    <tbody>
                      <?php $__currentLoopData = $latest_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr class="align-middle bg-white">
                        <td style="width: 100px; height: 100px">
                          <div class="img border">
                            <img src="<?php echo e($order->orderProducts[0]->image ?? ''); ?>" class="img-fluid">
                          </div>
                        </td>
                        <td>
                          <div class="mb-2 text-nowrap"><?php echo e(__('shop/account.order_number')); ?>：<span style="width: 110px;display: inline-block;"><?php echo e($order->number); ?></span></div>
                          <p class="pt-2"><?php echo e(__('shop/account.all')); ?> <?php echo e(count($order->orderProducts)); ?> <?php echo e(__('shop/account.items')); ?></p>
                          <div class="text-muted"><?php echo e(__('shop/account.order_time')); ?>：<?php echo e($order->created_at); ?></div>
                        </td>

                        <td>
                          <div class="h-100 d-flex align-items-center">
                          <p class=" text-center text-nowrap mb-0 d-inline-block <?php if($order->status == 'unpaid'): ?> unpaid-status-text <?php elseif($order->status == 'completed'): ?> completed-status-text <?php elseif($order->status=='paid'): ?> paid-status-text <?php elseif($order->status=='shipped'): ?> shipped-status-text <?php elseif($order->status=='cancelled'): ?> cancelled-status-text <?php endif; ?>"><?php echo e($order->status_format); ?></p>
                          </div>
                        </td>
                        <td>
                          <span class="ms-0 ms-lg-3 text-nowrap d-inline-block"><?php echo e(__('shop/account.amount')); ?>：<?php echo e(currency_format($order->total, $order->currency_code, $order->currency_value)); ?></span>
                        </td>

                        <td>
                          <a href="<?php echo e(shop_route('account.order.show', ['number' => $order->number])); ?>"
                            class="btn btn-outline-secondary text-nowrap btn-sm"><?php echo e(__('shop/account.check_details')); ?></a>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </ul>
                <div class="flex flex-column d-lg-none d-block">

                    <?php $__currentLoopData = $latest_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="bg-white p-2 mb-3 rounde">
                        <div class="d-flex justify-content-between align-items-start">
                          <img src="<?php echo e($order->orderProducts[0]->image ?? ''); ?>" class="img-fluid" width="100px">
                          <p class=" text-center text-nowrap py-1 px-2 <?php if($order->status == 'unpaid'): ?> unpaid-status-text <?php elseif($order->status == 'completed'): ?> completed-status-text <?php elseif($order->status=='paid'): ?> paid-status-text <?php elseif($order->status=='shipped'): ?> shipped-status-text <?php elseif($order->status=='cancelled'): ?> cancelled-status-text <?php endif; ?>"><?php echo e($order->status_format); ?></p>
                        </div>
                        <div class="mt-2">
                          <div class="mb-2 text-nowrap fw-semibold"><?php echo e(__('shop/account.order_number')); ?>：<span style="width: 110px;display: inline-block;"><?php echo e($order->number); ?></span></div>
                          <p><?php echo e(__('shop/account.all')); ?> <?php echo e(count($order->orderProducts)); ?> <?php echo e(__('shop/account.items')); ?></p>
                          <div class="text-muted"><?php echo e(__('shop/account.order_time')); ?>：<?php echo e($order->created_at); ?></div>
                        </div>
                        <div>
                          <span class="fw-semibold ms-0 ms-lg-3 text-nowrap d-inline-block"><?php echo e(__('shop/account.amount')); ?>：<?php echo e(currency_format($order->total, $order->currency_code, $order->currency_value)); ?></span>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\team-free-lance\shop-freelance\themes\default/account/account.blade.php ENDPATH**/ ?>