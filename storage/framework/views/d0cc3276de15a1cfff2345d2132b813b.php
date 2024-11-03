

<?php $__env->startSection('body-class', 'page-checkout'); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/vue/2.7/vue' . (!config('app.debug') ? '.min' : '') . '.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/scrolltofixed/jquery-scrolltofixed-min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/element-ui/index.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/element-ui/index.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginalaaf2a10efb487c03115f53565e62c23d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaaf2a10efb487c03115f53565e62c23d = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Breadcrumb::resolve(['type' => 'static','value' => 'checkout.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
  <style>
     #checkoutTab .nav-link{
      color : white;
      background-color : #6c757d;
      margin : 0 10px;
      font-size : 16px;
    }
    #checkoutTab .nav-link.active{
      color: white!important;
      background-color : #fb5831!important;
    }
  </style>

  <div class="container ">
    <?php if(!is_mobile()): ?>
      <div class="row mt-1 justify-content-center">
        <div class="col-12 col-md-9"><?php echo $__env->make('shared.steps', ['steps' => 2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
      </div>
    <?php endif; ?>

    <div class="row <?php echo e(!is_mobile() ? 'mt-5' : ''); ?>">
      <div class="col-12 col-md-8 left-column">
        <?php if(!current_customer() && is_mobile()): ?>
          <div class="card total-wrap mb-4 p-lg-4 shadow-sm">
            <div class="card-header">
              <h5 class="mb-0"><?php echo e(__('shop/login.login_and_sign')); ?></h5>
            </div>
            <div class="card-body">
              <button class="btn btn-outline-dark guest-checkout-login"><i class="bi bi-box-arrow-in-right me-2"></i><?php echo e(__('shop/login.login_and_sign')); ?></button>
            </div>
          </div>
        <?php endif; ?>

        <div class="card shadow-sm">
          <div class="card-body p-lg-4">
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("checkout.body.header",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            <div>
     

  <ul class="nav nav-tabs" id="checkoutTab" role="tablist">
    <!-- Tab for Giao hàng tận nơi -->
    <?php if($address_status == '1'): ?>

    <li class="nav-item" role="presentation">
        <button
      class="nav-link <?php echo e(($current['receiving_method'] == 'shipping') ? 'active' : ''); ?> "
      id="home-delivery-tab"
      data-bs-toggle="tab"
      data-bs-target="#home-delivery"
      type="button"
      role="tab"
      aria-controls="home-delivery"
      aria-selected="true">
       Giao hàng tận nơi
        </button>
    </li>
    <?php endif; ?>
    <!-- Tab for Đến lấy hàng -->
     <?php if($store_address_status == '1'): ?>
    <li class="nav-item" role="presentation">
        <button
      class="nav-link <?php echo e(($current['receiving_method'] == 'pick_up_items' ) ? 'active' : ''); ?>"
      id="store-pickup-tab"
      data-bs-toggle="tab"
      data-bs-target="#store-pickup"
      type="button" role="tab"
      aria-controls="store-pickup"
      aria-selected="false">
      Đến lấy hàng
      </button>
    </li>
    <?php endif; ?>
  </ul>

  <div class="tab-content" id="checkoutTabContent">
    <!-- Giao hàng tận nơi content -->

    <div class="tab-pane fade <?php echo e(($current['receiving_method'] == 'pick_up_items' )  ? 'show active' : ''); ?> mt-5" id="store-pickup" role="tabpanel" aria-labelledby="store-pickup-tab">
      <div>
        <?php echo $__env->make('checkout._shop_address', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>


    <!-- Đến lấy hàng content -->

    <div class="tab-pane fade <?php echo e(($current['receiving_method'] == 'shipping' ) ? 'show active' : ''); ?> mt-5" id="home-delivery" role="tabpanel" aria-labelledby="home-delivery-tab">
      <div>
        <?php echo $__env->make('checkout._address', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h5 class="checkout-title">Thời gian nhận hàng :</h5>
        <div class="form-group">
          <select class="form-select" name="receive_time" required>
            <option value="" disabled selected>Vui lòng chọn thời gian</option>
            <option value="7h-12h">7h-12h</option>
            <option value="12h-14h">12h-14h</option>
            <option value="14h-16h">14h-16h</option>
            <option value="16h-18h">16h-18h</option>
            <option value="18h-after">18h trở đi</option>
          </select>
        </div>
      </div>
      <?php if($shipping_require): ?>
               <?php
                    $__hook_name="checkout.shipping_method";
                    ob_start();
                ?>
             
         
              <div class="checkout-black mt-5">
                <h5 class="checkout-title"><?php echo e(__('shop/checkout.delivery_method')); ?></h5>
                <div class="radio-line-wrap" id="shipping-methods-wrap">
                  <?php $__currentLoopData = $shipping_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $methods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $methods['quotes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="radio-line-item <?php echo e($shipping['code'] == $current['shipping_method_code'] ? 'active':''); ?>" data-key="shipping_method_code" data-value="<?php echo e($shipping['code']); ?>">
                        <div class="left">
                          <span class="radio"></span>
                          <img src="<?php echo e($shipping['icon']); ?>" class="img-fluid">
                        </div>
                        <div class="right ms-2">
                          <div class="title"><?php echo e($shipping['name']); ?></div>
                          <div class="sub-title"><?php echo $shipping['description']; ?></div>
                          <?php if(isset($shipping['html'])): ?>
                            <div class="mt-2"><?php echo $shipping['html']; ?></div>
                          <?php endif; ?>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    </div>

  </div>
</div>
         <?php if(!empty($vouchers)): ?>
               <div class=" mt-5 my-5"  id="vouchersssssss">
                  <h5 class="checkout-title">Mã giảm giá</h5>

                  <div class="radio-line-wrap" id="voucher-wrap">

                    <?php $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="radio-line-item <?php echo e($voucher['id'] == $current['voucher_id'] ? 'active' : ''); ?>" data-key="voucher_id" data-value="<?php echo e($voucher['id']); ?>">
                        <div class="left">
                          <span class="radio"></span>

                        </div>
                        <div class="right ">
                          <h5 class="font-weight-bold"><?php echo e($voucher['name']); ?></h5>
                          <div class="sub-title">Giảm <?php echo e($voucher['discount_type'] === 'percentage' ?   $voucher['discount_value'].'%'  : $voucher['value_format']); ?></div>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                  </div>
                </div>
                <?php endif; ?>
        
            <div class=" mt-5 mt-5">
              <h5 class="checkout-title"><?php echo e(__('shop/checkout.payment_method')); ?></h5>
              <div class="radio-line-wrap" id="payment-methods-wrap">
                <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="radio-line-item <?php echo e($payment['code'] == $current['payment_method_code'] ? 'active' : ''); ?>" data-key="payment_method_code" data-value="<?php echo e($payment['code']); ?>">
                    <div class="left">
                      <span class="radio"></span>
                      <img src="<?php echo e($payment['icon']); ?>" class="img-fluid">
                    </div>
                    <div class="right ms-2">
                      <div class="title"><?php echo e($payment['name']); ?></div>
                      <div class="sub-title"><?php echo $payment['description']; ?></div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>



            <div class=" mt-5">
              <h5 class="checkout-title"><?php echo e(__('shop/checkout.comment')); ?></h5>
              <div class="comment-wrap" id="comment-wrap">
                <textarea rows="5" type="text" class="form-control" name="comment" placeholder="<?php echo e(__('shop/checkout.comment')); ?>"><?php echo e(old('comment', $comment ?? '')); ?></textarea>
              </div>
            </div>


             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("checkout.bottom",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4 right-column">
        <div class="x-fixed-top">
          <?php if(!current_customer() && !is_mobile()): ?>
            <div class="card total-wrap mb-4 p-lg-4 shadow-sm">
              <div class="card-header">
                <h5 class="mb-0"><?php echo e(__('shop/login.login_and_sign')); ?></h5>
              </div>
              <div class="card-body">
                <button class="btn btn-outline-dark guest-checkout-login"><i class="bi bi-box-arrow-in-right me-2"></i><?php echo e(__('shop/login.login_and_sign')); ?></button>
              </div>
            </div>
          <?php endif; ?>


          <div class="card total-wrap p-lg-4 p-md-2 shadow-sm">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0"><?php echo e(__('shop/checkout.cart_totals')); ?></h5>
              <span class="rounded-circle bg-primary"><?php echo e($carts['quantity']); ?></span>
            </div>
            <div class="card-body">
               <?php
                    $__hook_name="checkout.products";
                    ob_start();
                ?>
              <div class="products-wrap">
                <?php $__currentLoopData = $carts['carts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item">
                    <div class="image">
                      <div class="img border d-flex align-items-center justify-content-center wh-50 me-2">
                        <img src="<?php echo e(image_resize($cart['image'], 100, 100)); ?>" class="img-fluid">
                      </div>
                      <div class="name">
                        <div title="<?php echo e($cart['name']); ?>" class="text-truncate-2"><?php echo e($cart['name']); ?></div>
                        <?php if($cart['variant_labels']): ?>
                          <div class="text-muted mt-1"><?php echo e($cart['variant_labels']); ?></div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="price text-end">
                      <div><?php echo $cart['price_format']; ?></div>
                      <div class="quantity">x <?php echo e($cart['quantity']); ?></div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
              <ul class="totals">
                <!-- <?php if($carts['amount'] < $carts['origin_amount']): ?>
                  <li><span><?php echo e(__('admin/dashboard.subtotal_origin')); ?></span><span><?php echo e($carts['origin_amount_format']); ?></span></li>
                <?php endif; ?>
                <?php if($carts['discount_amount'] > 0): ?>
                  <li><span><?php echo e(__('admin/dashboard.subtotal_discount')); ?></span><span>-<?php echo e($carts['discount_amount_format']); ?></span></li>
                <?php endif; ?> -->
                <?php $__currentLoopData = $totals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><span><?php echo e($total['title']); ?></span><span><?php echo e($total['amount_format']); ?></span></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </ul>
              <div class="d-grid gap-2 mt-3 submit-checkout-wrap">
                <?php if(is_mobile()): ?>
                  <div class="text-nowrap">
                    <span><?php echo e(__('common.text_total')); ?></span>: <span class="fw-bold text-total"><?php echo e($totals[count($totals) - 1]['amount_format']); ?></span>
                  </div>
                <?php endif; ?>

                 <?php
                    $__hook_name="checkout.confirm";
                    ob_start();
                ?>
                <button class="btn btn-primary fw-bold fs-5" type="button" id="submit-checkout"><?php echo e(__('shop/checkout.submit_order')); ?></button>
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

               <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("checkout.total.footer",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
            </div>
          </div>
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
                
                $output = \Hook::getHook("checkout.footer",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add-scripts'); ?>
<script>
  $(document).ready(function() {

    $(document).on('click', '.radio-line-item', function(event) {
      if ($(this).hasClass('active')) return;
      console.log($(this).data('key'), $(this).data('value'))
      updateCheckout($(this).data('key'), $(this).data('value'))
    });

    $('#submit-checkout').click(function(event) {
        const address = config.isLogin ? checkoutAddressApp.form.shipping_address_id : checkoutAddressApp.source.guest_shipping_address;
        const payment = config.isLogin ? checkoutAddressApp.form.payment_address_id : checkoutAddressApp.source.guest_payment_address;
        const voucherId = $('#voucher-wrap .radio-line-item.active').data('value');

        // if (checkoutAddressApp.shippingRequired && !address) {
        //     layer.msg('<?php echo e(__('shop/checkout.error_address')); ?>', ()=>{})
        //     return;
        // }

        // if (!payment) {
        //     layer.msg('<?php echo e(__('shop/checkout.error_payment_address')); ?>', ()=>{})
        //     return;
        // }

        let data = {
            receive_time: $('select[name=receive_time]').val(),
            comment: $('textarea[name=comment]').val(),
            voucher_id: voucherId // Add the voucher_id to the data
        }

        $http.post('/checkout/confirm', data).then((res) => {
            location = 'orders/' + res.number + '/pay?type=create'
        });
    });

    $('.guest-checkout-login').click(function(event) {
      bk.openLogin();
    });
    $('#home-delivery-tab').click(function(event) {
      updateReceiveMethod('shipping')
    });
    $('#store-pickup-tab').click(function(event) {
      updateReceiveMethod('pick_up_items')
    });
  });

  const updateReceiveMethod = ( value, callback) => {
    $http.put('/checkout', {receiving_method: value}).then((res) => {
      if (res.status == 'fail') {
        layer.msg(res.message, ()=>{})
        return;
      }
      if (typeof callback === 'function') {
        callback(res)
      }
    })
  }

  const updateCheckout = (key, value, callback) => {
    $http.put('/checkout', {[key]: value}).then((res) => {
      if (res.status == 'fail') {
        layer.msg(res.message, ()=>{})
        return;
      }

      updateTotal(res.totals)
      updateShippingMethods(res.shipping_methods, res.current.shipping_method_code)
      updatePaymentMethods(res.payment_methods, res.current.payment_method_code)
      updateVoucher(res.vouchers, res.current.voucher_id)

      if (typeof callback === 'function') {
        callback(res)
      }
    })
  }

  const updateTotal = (totals) => {
    $('ul.totals').html(totals.map((item) => `<li><span>${item.title}</span><span>${item.amount_format}</span></li>`).join(''));
  }

  const updateShippingMethods = (data, shipping_method_code) => {
    let html = '';

    data.forEach((methods) => {
      methods.quotes.forEach((quote) => {
        html += `<div class="radio-line-item d-flex align-items-center ${shipping_method_code == quote.code ? 'active' : ''}" data-key="shipping_method_code" data-value="${quote.code}">
          <div class="left">
            <span class="radio"></span>
            <img src="${quote.icon}" class="img-fluid">
          </div>
          <div class="right ms-2">
            <div class="title">${quote.name}</div>
            <div class="sub-title">${quote.description}</div>
            <div class="mt-2 ${!quote.html ? 'd-none' : ''}">${quote.html || ''}</div>
          </div>
        </div>`;
      })
    })

    $('#shipping-methods-wrap').replaceWith('<div class="radio-line-wrap" id="shipping-methods-wrap">' + html + '</div>');
  }

  const updatePaymentMethods = (data, payment_method_code) => {
    let html = '';

    data.forEach((item) => {
      html += `<div class="radio-line-item d-flex align-items-center ${payment_method_code == item.code ? 'active' : ''}" data-key="payment_method_code" data-value="${item.code}">
        <div class="left">
          <span class="radio"></span>
          <img src="${item.icon}" class="img-fluid">
        </div>
        <div class="right ms-2">
          <div class="title">${item.name}</div>
          <div class="sub-title">${item.description || ''}</div>
        </div>
      </div>`;
    })

    $('#payment-methods-wrap').replaceWith('<div class="radio-line-wrap" id="payment-methods-wrap">' + html + '</div>');
  }
  const updateVoucher = (data, voucher_id) => {
    let html = '';

    data.forEach((item) => {
      html += `<div class="radio-line-item d-flex align-items-center ${voucher_id == item.id ? 'active' : ''}" data-key="voucher_id" data-value="${item.id}">
        <div class="left">
          <span class="radio"></span>

        </div>
         <div class="right ">
                      <h5 class="font-weight-bold">${item.name}</h5>

                      <div class="sub-title">Giảm ${item.discount_type === 'percentage' ?   item.discount_value+'%'  : item.value_format}</div>
      </div>
      </div>`;
    })

    $('#voucher-wrap').replaceWith('<div class="radio-line-wrap" id="voucher-wrap">' + html + '</div>');
  }

</script>
<script>
  // Initialize Bootstrap's Tab functionality (Bootstrap 5+)
  var triggerTabList = [].slice.call(document.querySelectorAll('#checkoutTab button'))
  triggerTabList.forEach(function (triggerEl) {
    var tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', function (event) {
      event.preventDefault()
      tabTrigger.show()
    })
  })
</script>
<script></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\themes\default/checkout.blade.php ENDPATH**/ ?>