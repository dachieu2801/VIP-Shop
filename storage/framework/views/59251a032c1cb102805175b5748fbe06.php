<ul class="nav nav-tabs overflow-x-auto d-flex flex-row flex-nowrap w-100 pb-4">
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap <?php echo e(!request('status') ? 'active' : ''); ?>" href="<?php echo e(shop_route('account.order.index')); ?>"><?php echo e(__('order.order_all')); ?></a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap <?php echo e(request('status') == 'unpaid' ? 'active' : ''); ?>" href="<?php echo e(shop_route('account.order.index', ['status' => 'unpaid'])); ?>"><?php echo e(__('order.unpaid')); ?></a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap <?php echo e(request('status') == 'paid' ? 'active' : ''); ?>" href="<?php echo e(shop_route('account.order.index', ['status' => 'paid'])); ?>"><?php echo e(__('shop/account.pending_send')); ?></a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap <?php echo e(request('status') == 'shipped' ? 'active' : ''); ?>" href="<?php echo e(shop_route('account.order.index', ['status' => 'shipped'])); ?>"><?php echo e(__('shop/account.pending_receipt')); ?></a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap <?php echo e(request('status') == 'completed' ? 'active' : ''); ?>" href="<?php echo e(shop_route('account.order.index', ['status' => 'completed'])); ?>"><?php echo e(__('order.completed')); ?></a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap <?php echo e(request('status') == 'cancelled' ? 'active' : ''); ?>" href="<?php echo e(shop_route('account.order.index', ['status' => 'cancelled'])); ?>"><?php echo e(__('order.cancelled')); ?></a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link px-2 text-nowrap <?php echo e(request('status') == 'not_yet_reviewed' ? 'active' : ''); ?>" href="<?php echo e(shop_route('account.order.index', ['status' => 'not_yet_reviewed'])); ?>"><?php echo e(__('order.not_yet_reviewed')); ?></a>
  </li>



</ul>
<?php /**PATH G:\workspace\new\themes\default/account/order_status.blade.php ENDPATH**/ ?>