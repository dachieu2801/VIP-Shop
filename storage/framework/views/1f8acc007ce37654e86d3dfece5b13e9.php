

<?php $__env->startSection('body-class', 'page-cart'); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/vue/2.7/vue' . (!config('app.debug') ? '.min' : '') . '.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/element-ui/index.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/scrolltofixed/jquery-scrolltofixed-min.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/element-ui/index.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginalaaf2a10efb487c03115f53565e62c23d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaaf2a10efb487c03115f53565e62c23d = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Breadcrumb::resolve(['type' => 'static','value' => 'carts.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

  <div class="container" id="app-cart" v-cloak>
    <?php if($errors->has('error')): ?>
      <?php if (isset($component)) { $__componentOriginal4a083a84216392e1709d900c0845b944 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a083a84216392e1709d900c0845b944 = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Alert::resolve(['type' => 'danger','msg' => ''.e($errors->first('error')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    <?php endif; ?>

    <?php if(!is_mobile()): ?>
    <div class="row mt-1 justify-content-center mb-2">
      <div class="col-12 col-md-9"><?php echo $__env->make('shared.steps', ['steps' => 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    </div>

    <div class="row mt-5" v-if="products.length">
      <div class="col-12 col-md-9 left-column">
        <div class="card shadow-sm h-min-600">
          <div class="card-body p-lg-4">
            <div class="p-lg-0"><h4 class="mb-3"><?php echo e(__('shop/carts.commodity')); ?></h4></div>
            <div class="cart-products-wrap table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th width="130">
                      <input class="form-check-input" type="checkbox" value="" id="check-all" v-model="allSelected">
                      <label class="form-check-label ms-1" for="check-all">
                        <?php echo e(__('shop/carts.select_all')); ?>

                      </label>
                    </th>
                    <th width="40%"><?php echo e(__('shop/carts.commodity')); ?></th>
                    <th width="170"><?php echo e(__('shop/carts.quantity')); ?></th>
                    <th width="170"><?php echo e(__('shop/carts.subtotal')); ?></th>
                    <th width="100" class="text-end"><?php echo e(__('common.action')); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="product, index in products" :key="index" :class="product.selected ? 'active' : ''">
                    <td>
                      <div class="d-flex align-items-center p-image">
                        <input class="form-check-input" type="checkbox" @change="checkedCartTr(index)" v-model="product.selected">
                        <div class="border d-flex align-items-center justify-content-center wh-80 ms-3"><img :src="product.image_url" class="img-fluid"></div>
                      </div>
                    </td>
                    <td>
                      <a class="name text-truncate-2 mb-1 text-black fw-bold" :href="'products/' + product.product_id" v-text="product.name"></a>
                      <div class="text-size-min text-muted mb-1">{{ product.variant_labels }}</div>
                      <div class="price text-muted" v-html="product.price_format"></div>
                    </td>
                    <td>
                      <div class="quantity-wrap">
                        <input type="text" class="form-control" @input="quantityChange(product.quantity, product.cart_id, product.sku_id)" onkeyup="this.value=this.value.replace(/\D/g,'')" v-model.number="product.quantity" name="quantity" minimum="1">
                        <div class="right">
                          <i class="bi bi-chevron-up"></i>
                          <i class="bi bi-chevron-down"></i>
                        </div>
                      </div>
                    </td>
                    <td><div class="sub-total" v-html="product.subtotal_format"></div></td>
                    <td class="text-end">
                      <button type="button" class="btn text-danger btn-sm px-0" @click.stop="checkedBtnDelete(product.cart_id)">
                        <i class="bi bi-x-lg"></i> <?php echo e(__('common.delete')); ?>

                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("carts.products.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3 right-column">
        <div class="card shadow-sm x-fixed-top">
          <div class="card-body p-lg-4">
            <div class="card total-wrap">
              <div class="p-lg-0"><h4 class="mb-3"><?php echo e(__('shop/carts.product_total')); ?></h4></div>
              <div class="card-body p-lg-0">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><span><?php echo e(__('shop/carts.all')); ?></span><span>{{ allProduct }}</span></li>
                  <li class="list-group-item"><span><?php echo e(__('shop/carts.selected')); ?></span><span>{{ total_quantity }}</span></li>
                  <li class="list-group-item border-bottom-0"><span><?php echo e(__('shop/carts.product_total')); ?></span><span class="total-price">{{ amount_format }}</span></li>
                  <li class="list-group-item d-grid gap-2 mt-3 border-bottom-0">
                     <?php
                    $__hook_name="cart.confirm";
                    ob_start();
                ?>
                    <button type="button" class="btn btn-primary fs-5 fw-bold" @click="checkedBtnToCheckout"><?php echo e(__('shop/carts.to_checkout')); ?></button>
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
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else class="d-flex justify-content-center align-items-center flex-column">
      <div class="empty-cart-wrap text-center mt-5">
        <div class="empty-cart-icon mb-3">
          <i class="bi bi-cart fs-1"></i>
        </div>
        <div class="empty-cart-text mb-3">
          <h5><?php echo e(__('shop/carts.cart_empty')); ?></h5>
          <p class="text-muted"><?php echo e(__('shop/carts.go_buy')); ?></p>
        </div>
        <div class="empty-cart-action">
          <a href="<?php echo e(shop_route('home.index')); ?>" class="btn btn-primary"><?php echo e(__('shop/carts.go_shopping')); ?></a>
        </div>
      </div>
    </div>
    <?php else: ?>
      <?php echo $__env->make('cart.cart_mb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
  </div>

   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("carts.footer",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add-scripts'); ?>
  <script>
    var app = new Vue({
      el: "#app-cart",
      data: {
        products: <?php echo json_encode($carts, 15, 512) ?>,
        total_quantity: <?php echo json_encode($quantity, 15, 512) ?>,
        amount: <?php echo json_encode($amount, 15, 512) ?>,
        amount_format: <?php echo json_encode($amount_format, 15, 512) ?>,
      },

      computed: {
        allSelected: {
          get() {
            return !this.products.length ? false : this.products.every(s => s.selected)
          },
          set(val) {
            this.products.map(e => e.selected = val)
            this.allSelectedBtn()
          }
        },

        allProduct() {
          return this.products.map(e => e.quantity).reduce((n,m) => n + m);
        },
      },

      methods: {
        checkedBtnToCheckout() {
          if (!this.products.some(e => e.selected)) {
            layer.msg('<?php echo e(__('shop/carts.empty_selected_products')); ?>', ()=>{})
            return
          }

          location = '<?php echo e(shop_route("checkout.index")); ?>'
        },

        quantityChange(quantity, cart_id, sku_id) {
          const self = this;
          $http.put(`/carts/${cart_id}`, {quantity: quantity, sku_id}, {hload: true}).then((res) => {
            this.setUpdateData(res);
          })
        },

        checkedBtnDelete(cart_id) {
          const self = this;

          $http.delete(`/carts/${cart_id}`).then((res) => {
            this.setUpdateData(res);
          })
        },

        checkedCartTr(index) {
          const selected = this.products[index].selected;
          const cart_id = this.products[index].cart_id;
          $http.post(`/carts/${selected ? 'select' : 'unselect'}`, {cart_ids: [cart_id]}, {hload: true}).then((res) => {
            this.setUpdateData(res);
          })
        },

        allSelectedBtn() {
          const cart_ids = this.products.map(x => x.cart_id)

          $http.post(`/carts/${this.allSelected ? 'select' : 'unselect'}`, {cart_ids: cart_ids}, {hload: true}).then((res) => {
            this.setUpdateData(res);
          })
        },

        setUpdateData(res) {  
          if(res.status != 'success'){
            layer.msg(res.message)
          }            
          this.products = res.data.carts
          this.amount_format = res.data.amount_format
          this.total_quantity = res.data.quantity
          bk.getCarts()
        }
      },
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\themes\default/cart/cart.blade.php ENDPATH**/ ?>