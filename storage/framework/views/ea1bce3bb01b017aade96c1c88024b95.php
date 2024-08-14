

<?php $__env->startSection('body-class', 'page-account-address'); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/vue/2.7/vue' . (!config('app.debug') ? '.min' : '') . '.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/element-ui/index.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/element-ui/index.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginalaaf2a10efb487c03115f53565e62c23d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaaf2a10efb487c03115f53565e62c23d = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Breadcrumb::resolve(['type' => 'static','value' => 'account.addresses.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

  <div class="container" id="address-app">
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
        <div class="card h-min-600">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title"><?php echo e(__('shop/account/addresses.index')); ?></h5>
            <button v-if="addresses.length" class="btn btn-primary btn-sm mb-3" @click="editAddress"><i class="bi bi-plus-square-dotted me-1"></i>
              <?php echo e(__('shop/account/addresses.add_address')); ?></button>
          </div>
          <div class="card-body h-600 pt-0">
            <div class="addresses-wrap" v-cloak>
              <div class="row" v-if="addresses.length">
                <div class="col-md-6 col-12" v-for="address, index in addresses" :key="index">
                  <div class="item">
                    <div class="name-wrap">
                      <span class="name">{{ address.name }}</span>
                      <span class="phone">| {{ address.phone }}</span>
                    </div>
                    <!-- <div class="zipcode">{{ address.zipcode }}</div> -->
                    <div class="address-info" style="height: auto; margin-bottom: 9px">{{ address.address_2 }}</div>
                    <div class="address-info" style="height: auto; margin-bottom: 9px">{{ address.address_1 }}, {{ address.zone }}, {{ address.country }}</div>
                    <div class="address-bottom">
                      <div><span class="badge bg-success"
                          v-if="address.default"><?php echo e(__('shop/account/addresses.default_address')); ?></span></div>
                      <div>
                        <button type="button" class="me-2 btn btn-outline-secondary btn-sm" @click.stop="deleteAddress(index)"><?php echo e(__('shop/account/addresses.delete')); ?></button>
                        <button type="button" href="javascript:void(0)" class="btn btn-outline-secondary btn-sm" @click.stop="editAddress(index)"><?php echo e(__('shop/account/addresses.edit')); ?></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div v-else class="text-center">
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
                <button class="btn btn-dark mb-3" @click="editAddress"><i class="bi bi-plus-square-dotted me-1"></i>
                  <?php echo e(__('shop/account/addresses.add_address')); ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <address-dialog ref="address-dialog" @change="onAddressDialogChange"></address-dialog>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add-scripts'); ?>
  <?php echo $__env->make('shared.address-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <script>
    new Vue({
      el: '#address-app',

      data: {
        editIndex: null,
        addresses: <?php echo json_encode($addresses ?? [], 15, 512) ?>,
      },

      mounted() {},

      methods: {
        editAddress(index) {
          let addresses = null

          if (typeof index == 'number') {
            this.editIndex = index;

            addresses = JSON.parse(JSON.stringify(this.addresses[index]))
          }

          this.$refs['address-dialog'].editAddress(addresses)
        },

        deleteAddress(index) {
          this.$confirm('<?php echo e(__('shop/account/addresses.confirm_delete')); ?>',
            '<?php echo e(__('shop/account/addresses.hint')); ?>', {
              confirmButtonText: '<?php echo e(__('common.confirm')); ?>',
              cancelButtonText: '<?php echo e(__('common.cancel')); ?>',
              type: 'warning'
            }).then(() => {
            $http.delete('/account/addresses/' + this.addresses[index].id).then((res) => {
              this.$message.success(res.message);
              this.addresses.splice(index, 1)
            })
          }).catch(() => {})
        },

        onAddressDialogChange(form) {
          const type = form.id ? 'put' : 'post';
          const url = `/account/addresses${type == 'put' ? '/' + form.id : ''}`;

          $http[type](url, form).then((res) => {
            if (res.data.default) {
              this.addresses.map(e => e.default = false)
            }

            if (this.addresses.find(e => e.id == res.data.id)) {
              this.addresses[this.editIndex] = res.data
            } else {
              this.addresses.push(res.data)
            }
            this.editIndex = null;
            this.$forceUpdate()
            this.$refs['address-dialog'].closeAddressDialog()
          })
        },
      }
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\themes\default/account/address.blade.php ENDPATH**/ ?>