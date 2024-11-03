
<?php $__env->startSection('body-class', 'page-product'); ?>
<?php $__env->startSection('title', $product['meta_title'] ?: $product['name']); ?>
<?php $__env->startSection('keywords', $product['meta_keywords'] ?: system_setting('base.meta_keyword')); ?>
<?php $__env->startSection('description', $product['meta_description'] ?: system_setting('base.meta_description')); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/vue/2.7/vue' . (!config('app.debug') ? '.min' : '') . '.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/swiper/swiper-bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/zoom/jquery.zoom.min.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/swiper/swiper-bundle.min.css')); ?>">
  <?php if($product['video'] && strpos($product['video'], '<iframe') === false): ?>
  <script src="<?php echo e(asset('vendor/video/video.min.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/video/video-js.min.css')); ?>">
  <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php
  $iframeClass = request('iframe') ? 'd-none' : '';
?>

<?php $__env->startSection('content'); ?>
  <?php if(!request('iframe')): ?>
    <?php if (isset($component)) { $__componentOriginalaaf2a10efb487c03115f53565e62c23d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaaf2a10efb487c03115f53565e62c23d = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Breadcrumb::resolve(['type' => 'product','value' => $product['id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
  <?php endif; ?>

  <div class="" style="background-color: #f6f6f6">
    <div class="container <?php echo e(request('iframe') ? 'pt-4' : ''); ?>" id="product-app" v-cloak>
      <div class="row  mt-md-0 py-3 bg-white m-0" id="product-top">
        <div class="col-12 col-lg-6 mb-2">
          <div class="product-image d-flex align-items-start">
            <?php if(!is_mobile()): ?>
              <div class="left <?php echo e($iframeClass); ?>"  v-if="images.length">
                <div class="swiper" id="swiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide" :class="!index ? 'active' : ''" v-for="image, index in images" :key="index">
                      <a href="javascript:;" :data-image="image.preview" :data-zoom-image="image.popup">
                        <img :src="image.thumb" class="img-fluid">
                      </a>
                    </div>
                  </div>
                  <div class="swiper-pager">
                    <div class="swiper-button-next new-feature-slideshow-next"></div>
                    <div class="swiper-button-prev new-feature-slideshow-prev"></div>
                  </div>
                </div>
              </div>
              <div class="right" id="zoom">
                <?php echo $__env->make('product.product-video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="product-img"><img :src="images.length ? images[0].preview : '<?php echo e(asset('image/placeholder.png')); ?>'" class="img-fluid"></div>
              </div>
            <?php else: ?>
              <?php echo $__env->make('product.product-video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <div class="swiper" id="swiper-mobile">
                <div class="swiper-wrapper">
                  <div class="swiper-slide d-flex align-items-center justify-content-center" v-for="image, index in images" :key="index">
                    <img :src="image.preview" class="img-fluid">
                  </div>
                </div>
                <div class="swiper-pagination mobile-pagination"></div>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-12 col-lg-6">
          <div class="peoduct-info product-mb-block">
             <?php
                    $__hook_name="product.detail.name";
                    ob_start();
                ?>
            <h1 class=" product-name"><?php echo e($product['name']); ?></h1>
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
            <div class="rating-wrap d-lg-flex">
              <div class="rating">

                <?php if($starReview > 0): ?>
                  <span class="fs-3 me-2"><?php echo e($starReview); ?></span>
                  <?php
                    $fullStars = floor($starReview);
                    $halfStar = $starReview - $fullStars;
                  ?>
                  <?php for($i = 0; $i < $fullStars; $i++): ?>
                    <i class="bi bi-star-fill fs-3 review-product-star"></i>
                  <?php endfor; ?>

                  <?php if($fullStars!=5): ?>
                    <?php if($halfStar >= 0.75): ?>
                      <i class="bi bi-star-fill fs-3 review-product-star"></i>
                    <?php elseif($halfStar >= 0.25): ?>
                      <i class="bi bi-star-half fs-3 review-product-star"></i>
                    <?php else: ?>
                      <i class=" bi bi-star fs-3 review-product-star"></i>
                    <?php endif; ?>
                  <?php endif; ?>


                  <?php if($halfStar!=0): ?>
                    <?php for($i = 0; $i < 5 - ceil($starReview); $i++): ?>
                      <i style="color: #ee4d2d;" class=" bi bi-star fs-3 review-product-star"></i>
                    <?php endfor; ?>
                  <?php endif; ?>
                  <span class="review-left"><?php echo e($countReview); ?></span> <span class="review-right"> <?php echo e(__('product.reviews')); ?></span>
                <?php else: ?>
                  <span class="star-review"><?php echo e(__('product.no_reviews')); ?></span>
                <?php endif; ?>


                <?php if( $product['skus'][0]['quantity_sold_format'] >0): ?>
                  <span class="review-left"><?php echo e($product['skus'][0]['quantity_sold_format']); ?></span> <span class="review-right"> <?php echo e(__('product.quantity_sold')); ?></span>
                <?php endif; ?>
              </div>
            </div>
             <?php
                    $__hook_name="product.detail.price";
                    ob_start();
                ?>
            <?php if((system_setting('base.show_price_after_login') and current_customer()) or !system_setting('base.show_price_after_login')): ?>
              <div class=" rounded price-wrap d-flex align-items-end gap-4 bg-light flex-wrap py-4 px-2">

                <div class=" text-decoration-line-through old-price" v-if="+product.price < +product.origin_price">
                  {{ product.origin_price_format }}
                </div>
                <div class="lh-1 me-2 new-price">{{ product.price_format }}</div>
                <?php if($discount!=0): ?>
                  <div class="product-discount text-uppercase"><?php echo e($discount); ?>% <?php echo e(__('shop/products.discount')); ?></div>
                <?php endif; ?>
              </div>
            <?php else: ?>
              <div class="product-price">
                <div class="text-dark fs-6"><?php echo e(__('common.before')); ?> <a class="price-new fs-6 login-before-show-price" href="javascript:void(0);"><?php echo e(__('common.login')); ?></a> <?php echo e(__('common.show_price')); ?></div>
              </div>
            <?php endif; ?>

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("product.detail.price.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
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
            <div class="stock-and-sku mb-lg-4 mb-2 py-2">
               <?php
                    $__hook_name="product.detail.quantity";
                    ob_start();
                ?>
              <div class="d-md-none d-flex gap-2">
                <span class="title text-muted"><?php echo e(__('product.quantity')); ?>: </span>
                <span class="product.quantity > 0 ? 'text-success' : 'text-secondary'">
                <template v-if="product.quantity > 0">{{ product.quantity }}</template>
                <template v-else><?php echo e(__('shop/products.out_stock')); ?></template>
              </span>
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

              <?php if($product['brand_id']): ?>
                 <?php
                    $__hook_name="product.detail.brand";
                    ob_start();
                ?>
                <div class="d-lg-flex">
                  <span class="title text-muted"><?php echo e(__('product.brand')); ?>: </span>
                  <a href="<?php echo e(shop_route('brands.show', $product['brand_id'])); ?>"><?php echo e($product['brand_name']); ?></a>
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

               <?php
                    $__hook_name="product.detail.sku";
                    ob_start();
                ?>
              <div class="d-lg-flex"><span class="title text-muted">SKU: </span>{{ product.sku }}</div>
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
                    $__hook_name="product.detail.model";
                    ob_start();
                ?>
              <div class="d-lg-flex" v-if="product.model"><span class="title text-muted"><?php echo e(__('shop/products.model')); ?>: </span> {{ product.model }}</div>
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
              <!-- <div class="d-lg-flex"><span class="title text-muted"><?php echo e(__('shop/products.delivery')); ?>: </span> <?php echo e(__('shop/products.delivery_price')); ?></div> -->
            </div>

             <?php
                    $__hook_name="product.detail.variables";
                    ob_start();
                ?>
            <div class="variables-wrap mb-md-4" v-if="source.variables.length">
              <div class="variable-group" v-for="variable, variable_index in source.variables" :key="variable_index">
                <p class="mb-2 title">{{ variable.name }}:</p>
                <div class="variable-info">
                  <div
                    v-for="value, value_index in variable.values"
                    @click="checkedVariableValue(variable_index, value_index, value)"
                    :key="value_index"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    :title="value.image ? value.name : ''"
                    :class="[value.selected ? 'selected' : '', value.disabled ? 'disabled' : '', value.image ? 'is-v-image' : '']">
                    <span class="image" v-if="value.image"><img :src="value.image" class="img-fluid"></span>
                    <span v-else>{{ value.name }}</span>
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
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>
            <?php if($product['active']): ?>
              <div class="d-none d-md-block">
                <div class="d-flex flex-column gap-4">
                   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("product.detail.buy.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                   <?php
                    $__hook_name="product.detail.quantity.input";
                    ob_start();
                ?>
                  
                  <div class="d-flex gap-4 align-items-center">
                    <span><?php echo e(__('product.quantity')); ?></span>
                    <div class="quantity-wrap">
                      <input type="text" class="form-control text-center" :disabled="!product.quantity" onkeyup="this.value=this.value.replace(/\D/g,'')" v-model="quantity" name="quantity">
                      <div class="right">
                        <i class="bi bi-chevron-up"></i>
                        <i class="bi bi-chevron-down"></i>
                      </div>
                    </div>
                    <span>{{product.quantity}} <?php echo e(__('shop/products.quantity_stock')); ?></span>
                    <span></span>
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
                  <div class="d-flex gap-4 flex-wrap">
                     <?php
                    $__hook_name="product.detail.add_to_cart";
                    ob_start();
                ?>
                    <button
                      class="btn btn-outline-dark fw-bold"
                      :product-id="product.id"
                      :product-price="product.price"
                      :disabled="!product.quantity"
                      @click="addCart(false, this)"
                      style="
                        background: #ffeee8;
                        border: 1px solid #ee4d2d;
                        color: #ee4d2d;
                        padding-left: 20px;
                        padding-right: 20px;
                    "
                    ><i class="bi bi-cart-fill me-1"></i>
                    <?php echo e(__('shop/products.add_to_cart')); ?>

                    </button>
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
                    $__hook_name="product.detail.buy_now";
                    ob_start();
                ?>
                    <button
                      class="btn btn-dark ms-3 btn-buy-now px-5"
                      style="background-color: var(--main-orange-color);border:none"
                      :disabled="!product.quantity"
                      :product-id="product.id"
                      :product-price="product.price"
                      @click="addCart(true, this)"
                    ><i class="bi bi-bag-fill me-1"></i><?php echo e(__('shop/products.buy_now')); ?>

                    </button>
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
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("product.detail.buy.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                    <?php if(current_customer() || !request('iframe')): ?>
                       <?php
                    $__hook_name="product.detail.wishlist";
                    ob_start();
                ?>
                      <div class="add-wishlist">
                        <button class="btn btn-link ps-md-0 text-secondary" data-in-wishlist="<?php echo e($product['in_wishlist']); ?>" onclick="bk.addWishlist('<?php echo e($product['id']); ?>', this)">
                          <i style="color: var(--main-orange-color)" class="bi bi-heart<?php echo e($product['in_wishlist'] ? '-fill' : ''); ?> me-1"></i> <span><?php echo e(__('shop/products.add_to_favorites')); ?></span>
                        </button>
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
            <?php else: ?>
              <div class="text-danger"><i class="bi bi-exclamation-circle-fill"></i> <?php echo e(__('product.has_been_inactive')); ?></div>
            <?php endif; ?>

            <div class="product-btns d-md-none">
              <?php if($product['active']): ?>
                <div class="quantity-btns">
                   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("product.detail.buy.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                   <?php
                    $__hook_name="product.detail.quantity.input";
                    ob_start();
                ?>
                  
                  <div class="quantity-wrap">
                    <input type="text" class="form-control text-center" :disabled="!product.quantity" onkeyup="this.value=this.value.replace(/\D/g,'')" v-model="quantity" name="quantity">
                    <div class="right">
                      <i class="bi bi-chevron-up"></i>
                      <i class="bi bi-chevron-down"></i>
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
                    $__hook_name="product.detail.add_to_cart";
                    ob_start();
                ?>
                  <button
                    class="btn btn-outline-dark ms-md-3 fw-bold"
                    :product-id="product.id"
                    :product-price="product.price"
                    :disabled="!product.quantity"
                    @click="addCart(false, this)"
                    style="
                        background: #ffeee8;
                        border: 1px solid #ee4d2d;
                        color: #ee4d2d;
                        padding-left: 20px;
                        padding-right: 20px;
                    "
                  ><i class="bi bi-cart-fill me-1"></i><?php echo e(__('shop/products.add_to_cart')); ?>

                  </button>
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
                    $__hook_name="product.detail.buy_now";
                    ob_start();
                ?>
                  <button
                    class="btn btn-dark ms-3 btn-buy-now fw-bold"

                    :disabled="!product.quantity"
                    :product-id="product.id"
                    :product-price="product.price"
                    @click="addCart(true, this)"
                  ><i class="bi bi-bag-fill me-1"></i><?php echo e(__('shop/products.buy_now')); ?>

                  </button>
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
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("product.detail.buy.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                </div>


                <?php if(current_customer() || !request('iframe')): ?>
                   <?php
                    $__hook_name="product.detail.wishlist";
                    ob_start();
                ?>
                  <div class="add-wishlist">
                    <button class="btn btn-link ps-md-0 text-secondary" data-in-wishlist="<?php echo e($product['in_wishlist']); ?>" onclick="bk.addWishlist('<?php echo e($product['id']); ?>', this)">
                      <i style="color: var(--main-orange-color)"  class="bi bi-heart<?php echo e($product['in_wishlist'] ? '-fill' : ''); ?> me-1"></i> <span><?php echo e(__('shop/products.add_to_favorites')); ?></span>
                    </button>
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
              <?php else: ?>
                <div class="text-danger"><i class="bi bi-exclamation-circle-fill"></i> <?php echo e(__('product.has_been_inactive')); ?></div>
              <?php endif; ?>
            </div>

             <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("product.detail.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
          </div>
        </div>
      </div>

      <div class="bg-white ">
        <?php if($product['description']): ?>
          <div class="bg-white p-3">
            <h4 class="fw-medium bg-light text-uppercase p-3 mb-3 "><?php echo e(__('shop/products.product_details')); ?></h4>
            <div class="">
              <?php echo $product['description']; ?>

            </div>
          </div>
        <?php endif; ?>
        <?php if($product['attributes']): ?>
          <div class="p-3 mt-md-5">
            <h4 class="fw-medium bg-light text-uppercase p-3">
              <?php echo e(__('shop/products.product_description')); ?>

            </h4>
            <div class="mt-3">
              <table class="table table-bordered attribute-table">
                <?php $__currentLoopData = $product['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <thead class="table-light">
                  <tr><td colspan="2"><strong><?php echo e($group['attribute_group_name']); ?></strong></td></tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $group['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($item['attribute']); ?></td>
                      <td><?php echo e($item['attribute_value']); ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
            </div>
          </div>

        <?php endif; ?>
      </div>

      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    </div>
  </div>

  <?php if($reviews && !request('iframe')): ?>
    <div class="relations-wrap py-2 py-md-5 product-mb-block " style="background-color: #f6f6f6">
      <div class="container">
        <div class="bg-white">
          <div class="title-review pt-4 bg-white px-3">
            <h4 class="text-uppercase fw-medium title text-start" ><?php echo e(__('admin/product.product_reviews')); ?></h4>

            <div class="hook-review px-4 py-md-5 py-sm-3 mt-2">
              <div class="me-md-5 text-left" >
                <div class="mb-md-2 mb-sm-1">
                  <span class ="star-review"><?php echo e($starReview); ?></span>
                  <span style="font-size: 1.1rem;" class="review-left">(<?php echo e($countReview); ?></span> <span   style="font-size: 1.1rem;" class="review-right"> <?php echo e(__('product.reviews')); ?>)</span>
                </div>
                <div class="rating">
                  <?php if($starReview > 0): ?>
                    <?php
                      $fullStars = floor($starReview);
                      $halfStar = $starReview - $fullStars;
                    ?>
                    <?php for($i = 0; $i < $fullStars; $i++): ?>
                      <i class="bi bi-star-fill fs-3 review-product-star"></i>
                    <?php endfor; ?>
                    <?php if($fullStars!=5): ?>
                      <?php if($halfStar >= 0.75): ?>
                        <i class="bi bi-star-fill fs-3 review-product-star"></i>
                      <?php elseif($halfStar >= 0.25): ?>
                        <i class="bi bi-star-half fs-3 review-product-star"></i>
                      <?php else: ?>
                        <i class=" bi bi-star fs-3 review-product-star"></i>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php if($halfStar!=0): ?>
                      <?php for($i = 0; $i < 5 - ceil($starReview); $i++): ?>
                        <i class=" bi bi-star fs-3 review-product-star"></i>
                      <?php endfor; ?>
                    <?php endif; ?>
                  <?php else: ?>
                    <span class="star-review"><?php echo e(__('product.no_reviews')); ?></span>
                  <?php endif; ?>

                </div>
              </div>
              <div class='text-center category-review-wrap mt-sm-3'>
                <div class="category-review" id="all-star-1"><?php echo e(__('product.all_star')); ?></div>
                <div class="category-review" id="5-star-1"><?php echo e(__('product.5_star')); ?></div>
                <div class="category-review" id="4-star-1"><?php echo e(__('product.4_star')); ?></div>
                <div class="category-review" id="3-star-1"><?php echo e(__('product.3_star')); ?></div>
                <div class="category-review" id="2-star-1"><?php echo e(__('product.2_star')); ?></div>
                <div class="category-review" id="1-star-1"><?php echo e(__('product.1_star')); ?></div>
              </div>
            </div>
          </div>
          <div class="px-3">
            <div id="product-reviewsss"></div>
          </div>
          <div class=" mt-5 d-flex justify-content-center">
            <nav aria-label="Page navigation example">
              <ul class="pagination" id="pagination-review">
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if($relations && !request('iframe')): ?>
    <div class="relations-wrap pt-2 pt-md-5 product-mb-block">
      <div class="container position-relative">
        <div class="title text-center"><?php echo e(__('admin/product.product_relations')); ?></div>
        <div class="product swiper-style-plus">
          <div class="swiper relations-swiper">
            <div class="swiper-wrapper mb-3">
              <?php $__currentLoopData = $relations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="swiper-slide">
                <?php echo $__env->make('shared.product', ['product' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          <div class="swiper-pagination relations-pagination"></div>
          <div class="swiper-button-prev relations-swiper-prev"></div>
          <div class="swiper-button-next relations-swiper-next"></div>
        </div>
      </div>
    </div>
  <?php endif; ?>

   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("product.detail.footer",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add-scripts'); ?>
  <script>
    const visibleRange = 5;
    let currentPage = 1;

    const dataReviewwww =  <?php echo json_encode($reviews, 15, 512) ?>;
    let data = [...dataReviewwww]
    let totalPages = Math.ceil(data.length/8);

    function getDataFromStar(star){

      let element = document.getElementById(`${star}-star-1`);
        element.onclick = () => {
            let element_all_star = document.getElementById(`all-star-1`);
            element_all_star.classList.remove('active')
            let element_1_star = document.getElementById(`1-star-1`);
            element_1_star.classList.remove('active')
            let element_2_star = document.getElementById(`2-star-1`);
            element_2_star.classList.remove('active')
            let element_3_star = document.getElementById(`3-star-1`);
            element_3_star.classList.remove('active')
            let element_4_star = document.getElementById(`4-star-1`);
            element_4_star.classList.remove('active')
            let element_5_star = document.getElementById(`5-star-1`);
            element_5_star.classList.remove('active')

            element.classList.add('active')

            if(star =='all'){
              data = dataReviewwww
            }else{
              data = dataReviewwww.filter(function(item) {
                return item.star_rating == star;
              })
            }
          currentPage = 1
          totalPages = Math.ceil(data.length/8)
          getDataForPage(data, currentPage)
          createPagination()
        }
    }

    const itemsPerPage = 8;
    function getDataForPage(data,pageNumber) {

      let element = document.getElementById('product-reviewsss')

      const startIndex = (pageNumber - 1) * itemsPerPage;
      const endIndex = Math.min(startIndex + itemsPerPage, data.length);
      let dataReview = data.slice(startIndex, endIndex);
      console.log(data)

      let html = ``;
      if(!data || data.length == 0){
        html = `<div style="font-size:0.9rem"><?php echo e(__('product.no_reviews')); ?></div>`
      } else {
        dataReview.forEach((review) => {
          html += unitReview(review)
        });
      }
      element.innerHTML = html;

    }

    function createPagination() {
        const pagination = document.getElementById("pagination-review");
        pagination.innerHTML = "";

        // Nút "Trang trước"
        const prevButton = document.createElement("li");
        prevButton.classList.add("page-item");
        prevButton.innerHTML = `<a class="page-link" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
          </a>`;
        prevButton.onclick = () => {
          if (currentPage > 1) {
            currentPage--;
            createPagination();
            getDataForPage(data, currentPage)
          }
        };
        pagination.appendChild(prevButton);

        const startPage = Math.max(1, currentPage - Math.floor(visibleRange / 2));
        const endPage = Math.min(totalPages, startPage + visibleRange - 1);

        if (startPage > 1) {
          const firstPage = document.createElement("li");
          firstPage.classList.add("page-item");
          firstPage.innerHTML = `<a class="page-link">1</a>`;
          firstPage.onclick = () => {
            currentPage = 1;
            createPagination();
            getDataForPage(data, currentPage)
          };
          pagination.appendChild(firstPage);

          if (startPage > 2) {
            const ellipsis = document.createElement("li");
            ellipsis.innerText = "...";
            ellipsis.style.cursor = 'default';
            pagination.appendChild(ellipsis);
          }
        }

        for (let i = startPage; i <= endPage; i++) {
          const pageButton = document.createElement("li");
          pageButton.classList.add("page-item");
          pageButton.innerHTML = `<a class="page-link ${i === currentPage ? 'active' : ''}">${i}</a>`;
          pageButton.onclick = () => {
            currentPage = i;
            createPagination();
            getDataForPage(data, currentPage)
          };
          pagination.appendChild(pageButton);
        }

        if (endPage < totalPages) {
          if (endPage < totalPages - 1) {
            const ellipsis = document.createElement("li");
            ellipsis.innerText = "...";
            pagination.appendChild(ellipsis);
          }

          const lastPage = document.createElement("li");
          lastPage.classList.add("page-item");
          lastPage.innerHTML = `<a class="page-link ${totalPages === currentPage ? 'active' : ''}">${totalPages}</a>`;

          lastPage.onclick = () => {
            currentPage = totalPages;
            createPagination();
            getDataForPage(data, currentPage)
          };
          pagination.appendChild(lastPage);
        }

        const nextButton = document.createElement("li");
        nextButton.classList.add("page-item");
        nextButton.innerHTML = `<a class="page-link" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
        </a>`;
        nextButton.onclick = () => {
          if (currentPage < totalPages) {
            currentPage++;
            createPagination();
            getDataForPage(data, currentPage)
          }
        };
        pagination.appendChild(nextButton);

    }

    let fill_star = `<svg height="0.8rem" width="0.8rem" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 viewBox="0 0 47.94 47.94" xml:space="preserve">
                     <path style="fill:#ee4d2d;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
                      	c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
	                      c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
	                      c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
                      	c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
	                      C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                </svg>`
    let empty_star = `<svg  height="0.8rem" width="0.8rem" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 47.94 47.94" xml:space="preserve">
                    <path style="fill:#fff; stroke:#ee4d2d; stroke-width:2;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
                    	c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
                    	c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
                    	c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
                    	c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
                    	C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                 </svg>`

    function renderStarReview(starReview) {
      let html = '';
      for (let i = 1; i <= 5; i++) {
        if (i <= starReview) {
          html += fill_star;
        } else {
          html += empty_star;
        }
      }
      return html;
    }

    function getStar(start) {
      let html
      if(start){
        html =  `<img src="${start}" alt="Avatar" >`
      }else{
        html = ` <svg height="40px" width="40px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
           viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
           <g>
              <path d="M256,31C131.7,31,31,131.7,31,256s100.7,225,225,225s225-100.7,225-225S380.3,31,256,31z M256,118.1
		               c44.1,0,79.8,35.7,79.8,79.8s-35.7,79.8-79.8,79.8s-79.8-35.7-79.8-79.8S211.9,118.1,256,118.1z M256,430.2
		               c-53.3,0-101-24.1-132.9-61.9c17.1-32.1,50.4-54.3,89.4-54.3c2.2,0,4.4,0.4,6.4,1c11.8,3.8,24.1,6.3,37.1,6.3s25.4-2.4,37.1-6.3
		               c2.1-0.6,4.3-1,6.4-1c38.9,0,72.3,22.1,89.4,54.3C357,406.1,309.3,430.2,256,430.2z"/>
           </g>
          </svg>`
      }
      return html
    }
    function unitReview(review){

      let created_at = new Date(review['created_at']);

      const formattedDateTime = `${created_at.getFullYear()}-${String(created_at.getMonth() + 1).padStart(2, '0')}-${String(created_at.getDate()).padStart(2, '0')} ${String(created_at.getHours()).padStart(2, '0')}:${String(created_at.getMinutes()).padStart(2, '0')}`;

      let unitReview1 = `
      <div class="swiper-slide"  >
      <div  style="display: flex; margin-bottom: 20px; border-bottom: 1px solid #bdbdbd;padding-bottom: 4px">
      <div  style="margin-right: 10px;border-radius: 50%; width: 40px; height: 40px;">
        ${getStar(review['customer_avatar'])}
      </div>
      <div >
        <div style="margin-right: 10px;">${review['customer_name']}</div>
        <div style="margin-bottom: 4px" class="review-rating">
           ${renderStarReview(review['star_rating'])}
        </div>
        <div style="margin-bottom: 8px" >${formattedDateTime}
        </div>
        <div style="margin-bottom: 5px;">
          <p style="font-size: 16px; margin: 0;">${review['content']}</p>
        </div>
      </div>
      </div>
      </div>`
      return unitReview1
    }

    if(<?php echo e($countReview); ?>>0){
      getDataForPage(data, currentPage)
      createPagination();
      getDataFromStar( 1)
      getDataFromStar(2)
      getDataFromStar(3)
      getDataFromStar( 4)
      getDataFromStar( 5)
      getDataFromStar('all')
    }
    setTimeout(()=>{
      let element_all_star = document.getElementById(`all-star-1`);
      // element_all_star.classList.add('active')
    },0)



    let swiperMobile = null;
    const isIframe = bk.getQueryString('iframe', false);

    let app = new Vue({
      el: '#product-app',

      data: {
        selectedVariantsIndex: [], 
        images: [],
        product: {
          id: 0,
          images: "",
          model: "",
          origin_price: 0,
          origin_price_format: "",
          position: 0,
          price: 0,
          price_format: "",
          quantity: 0,
          sku: "",
        },
        quantity: 1,
        source: {
          skus: <?php echo json_encode($product['skus'], 15, 512) ?>,
          variables: <?php echo json_encode($product['variables'] ?? [], 15, 512) ?>,
        }
      },

      beforeMount () {
        const skus = JSON.parse(JSON.stringify(this.source.skus));
        const skuDefault = skus.find(e => e.is_default)
        this.selectedVariantsIndex = skuDefault.variants

        if (this.source.variables.length) {
          this.source.variables.forEach(variable => {
            variable.values.forEach(value => {
              this.$set(value, 'selected', false)
              this.$set(value, 'disabled', false)
            })
          })

          this.checkedVariants()
          this.getSelectedSku(false);
          this.updateSelectedVariantsStatus()
        } else {
          this.product = skus[0];
          this.images = <?php echo json_encode($product['images'] ?? [], 15, 512) ?>;
        }
      },

      methods: {
        checkedVariableValue(variable_index, value_index, value) {
          $('.product-image .swiper .swiper-slide').eq(0).addClass('active').siblings().removeClass('active');
          this.source.variables[variable_index].values.forEach((v, i) => {
            v.selected = i == value_index
          })

          this.updateSelectedVariantsIndex();
          this.getSelectedSku();
          this.updateSelectedVariantsStatus()
        },


        checkedVariants() {
          this.source.variables.forEach((variable, index) => {
            variable.values[this.selectedVariantsIndex[index]].selected = true
          })
        },

        getSelectedSku(reload = true) {
          const sku = this.source.skus.find(sku => sku.variants.toString() == this.selectedVariantsIndex.toString())
          this.images = <?php echo json_encode($product['images'] ?? [], 15, 512) ?>

          if (reload) {
            this.images.unshift(...sku.images)
          }

          this.product = sku;

          if (swiperMobile) {
            swiperMobile.slideTo(0, 0, false)
          }

          this.$nextTick(() => {
            $('#zoom img').attr('src', $('#swiper a').attr('data-image'));
            $('#zoom').trigger('zoom.destroy');
            $('#zoom').zoom({url: $('#swiper a').attr('data-zoom-image')});
          })

          closeVideo()
        },

        addCart(isBuyNow = false) {
          bk.addCart({sku_id: this.product.id, quantity: this.quantity, isBuyNow}, null, () => {
            if (isIframe) {
              let index = parent.layer.getFrameIndex(window.name);
              parent.bk.getCarts();

              setTimeout(() => {
                parent.layer.close(index);

                if (isBuyNow) {
                  parent.location.href = 'checkout'
                } else {
                  parent.$('.btn-right-cart')[0].click()
                }
              }, 400);
            } else {
              if (isBuyNow) {
                location.href = 'checkout'
              }
            }
          });
        },

        updateSelectedVariantsIndex() {

          this.source.variables.forEach((variable, index) => {
            variable.values.forEach((value, value_index) => {
              if (value.selected) {
                this.selectedVariantsIndex[index] = value_index
              }
            })
          })
        },

        updateSelectedVariantsStatus() {

          const skus = this.source.skus.filter(sku => sku.quantity > 0).map(sku => sku.variants);
          this.source.variables.forEach((variable, index) => {
            variable.values.forEach((value, value_index) => {
              const selectedVariantsIndex = this.selectedVariantsIndex.slice(0);

              selectedVariantsIndex[index] = value_index;
              const selectedSku = skus.find(sku => sku.toString() == selectedVariantsIndex.toString());
              if (selectedSku) {
                value.disabled = false;
              } else {
                value.disabled = true;
              }
            })
          });
        },
      }
    });

    $(document).on("mouseover", ".product-image #swiper .swiper-slide a", function() {
      $(this).parent().addClass('active').siblings().removeClass('active');
      $('#zoom').trigger('zoom.destroy');
      $('#zoom img').attr('src', $(this).attr('data-image'));
      $('#zoom').zoom({url: $(this).attr('data-zoom-image')});
      closeVideo()
    });

    var swiper = new Swiper("#swiper", {
      direction: "vertical",
      slidesPerView: 1,
      spaceBetween:3,
      breakpoints:{
        375:{
          slidesPerView: 3,
          spaceBetween:3,
        },
        480:{
          slidesPerView: 4,
          spaceBetween:27,
        },
        768:{
          slidesPerView: 6,
          spaceBetween:3,
        },
      },
      navigation: {
        nextEl: '.new-feature-slideshow-next',
        prevEl: '.new-feature-slideshow-prev',
      },
      observer: true,
      observeParents: true
    });

    var relationsSwiper = new Swiper ('.relations-swiper', {
      watchSlidesProgress: true,
      autoHeight: true,
      breakpoints:{
        320: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
      },
      spaceBetween: 30,
      // 如果需要前进后退按钮
      navigation: {
        nextEl: '.relations-swiper-next',
        prevEl: '.relations-swiper-prev',
      },

      // 如果需要分页器
      pagination: {
        el: '.relations-pagination',
        clickable: true,
      },
    })

    <?php if(is_mobile()): ?>
      swiperMobile = new Swiper("#swiper-mobile", {
        slidesPerView: 1,
        pagination: {
          el: ".mobile-pagination",
        },
        observer: true,
        observeParents: true
      });
    <?php endif; ?>

    $(document).ready(function () {
      $('#zoom').trigger('zoom.destroy');
      $('#zoom').zoom({url: $('#swiper a').attr('data-zoom-image')});
    });

    const selectedVariantsIndex = app.selectedVariantsIndex;
    const variables = app.source.variables;

    const selectedVariants = variables.map((variable, index) => {
      return variable.values[selectedVariantsIndex[index]]
    });

  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\themes\default/product/product.blade.php ENDPATH**/ ?>