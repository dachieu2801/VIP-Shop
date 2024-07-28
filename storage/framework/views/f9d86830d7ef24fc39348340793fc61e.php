


<?php $__env->startSection('body-class', 'page-payment'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginalaaf2a10efb487c03115f53565e62c23d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaaf2a10efb487c03115f53565e62c23d = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Breadcrumb::resolve(['type' => 'static','value' => 'checkout.index','text' => [31231]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    <?php if(!is_mobile()): ?>
    <div class="row mt-5 mb-5 justify-content-center">
      <div class="col-12 col-md-9"><?php echo $__env->make('shared.steps', ['steps' => 3], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    </div>
    <?php endif; ?>

    <div class="col-12">
      <div class="card order-wrap">
        <div class="card-body main-body">
          <div class="order-top">

            <div class="right">
              <?php if($order['payment_method_code'] == 'cod'): ?>
                <h3 class="order-title mb-4"><?php echo e(__('shop/checkout.payment_success')); ?></h3>
              <?php else: ?>
                <h3 class="order-title mb-4"><?php echo e(__('shop/checkout.payment_please_pay')); ?></h3>
              <?php endif; ?>
              <div class="order-info mb-lg-4 mb-2">
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td><?php echo e(__('shop/checkout.payment_order_number')); ?>：<span class="text-order"><?php echo e($order['number']); ?></span></td>
                    </tr>
                    <tr>
                      <td><?php echo e(__('shop/checkout.payment_amounts_payable')); ?>：<span class="text-order"><?php echo e($order['total_format']); ?></span></td>
                    </tr>
                    <tr>
                      <td><?php echo e(__('shop/checkout.payment_payment_method')); ?>：<span class="text-order"><?php echo e($order['payment_method_name']); ?></span></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <?php echo $payment; ?>

            </div>
          </div>

           <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("payment.footer",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\team-free-lance\shop-freelance\themes\default/checkout/payment.blade.php ENDPATH**/ ?>