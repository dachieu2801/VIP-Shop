

<?php $__env->startSection('body-class', 'page-forgotten'); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/vue/2.7/vue' . (!config('app.debug') ? '.min' : '') . '.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/element-ui/index.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/element-ui/index.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginalaaf2a10efb487c03115f53565e62c23d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaaf2a10efb487c03115f53565e62c23d = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Breadcrumb::resolve(['type' => 'static','value' => 'forgotten.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

  <div class="container" id="page-forgotten" v-cloak>
    <div class="row my-5 justify-content-md-center">
      <div class="col-lg-5 col-xxl-4">
        <div class="card">
          <el-form ref="form" :model="form" :rules="rules">
            <div class="card-body p-0">
              <h4 class="fw-bold"><?php echo e(__('shop/forgotten.follow_prompt')); ?></h4>
              <p class="text-muted" v-if="!isCode"><?php echo e(__('shop/forgotten.email_forCode')); ?></p>
              <p class="text-muted" v-else><?php echo e(__('shop/forgotten.enter_password')); ?></p>

              <el-form-item label="<?php echo e(__('shop/forgotten.email')); ?>" prop="email" v-if="!isCode">
                <el-input v-model="form.email" placeholder="<?php echo e(__('shop/forgotten.email_address')); ?>"></el-input>
              </el-form-item>

              <el-form-item label="<?php echo e(__('shop/forgotten.verification_code')); ?>" prop="code" class="mb-3" v-if="isCode">
                <el-input  v-model="form.code" placeholder="<?php echo e(__('shop/forgotten.verification_code')); ?>"></el-input>
              </el-form-item>

              <el-form-item label="<?php echo e(__('shop/forgotten.password')); ?>" prop="password" class="mb-3" v-if="isCode">
                <el-input type="password" v-model="form.password" placeholder="<?php echo e(__('shop/forgotten.password')); ?>"></el-input>
              </el-form-item>

              <el-form-item label="<?php echo e(__('shop/forgotten.confirm_password')); ?>" prop="password_confirmation" v-if="isCode">
                <el-input type="password" v-model="form.password_confirmation" placeholder="<?php echo e(__('shop/forgotten.confirm_password')); ?>"></el-input>
              </el-form-item>

              <div class="mt-5 mb-3 d-flex justify-content-between">
                <button type="button" @click="submitForm('form')" class="btn w-50 btn-dark">
                  
                  <template v-if="!isCode"><?php echo e(__('shop/forgotten.send_code')); ?></template>
                  <template v-else><?php echo e(__('common.submit')); ?></template>
                </button>
              </div>
              <a href="javascript:void(0)" v-if="isCode" @click="isCode = false" class="text-muted"><?php echo e(__('shop/forgotten.to_back')); ?></a>
            </div>
          </el-form>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('add-scripts'); ?>
  <script>
    var validatePass = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('<?php echo e(__('shop/forgotten.enter_password')); ?>'));
      } else {
        if (value !== '') {
          app.$refs.form.validateField('password_confirmation');
        }
        callback();
      }
    };

    var validatePass2 = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('<?php echo e(__('shop/forgotten.please_confirm')); ?>'));
      } else if (value !== app.form.password) {
        callback(new Error('<?php echo e(__('shop/forgotten.password_err')); ?>'));
      } else {
        callback();
      }
    };

    let app = new Vue({
      el: '#page-forgotten',

      data: {
        form: {
          email: bk.getQueryString('email', ''),
          code: bk.getQueryString('code', ''),
          password: '',
          password_confirmation: '',
        },

        isCode: !!bk.getQueryString('code'),

        rules: {
          email: [
            {required: true, message: '<?php echo e(__('shop/forgotten.enter_email')); ?>', trigger: 'blur'},
            {type: 'email', message: '<?php echo e(__('shop/forgotten.email_err')); ?>', trigger: 'blur'},
          ],
          code: [
            {required: true, message: '<?php echo e(__('shop/forgotten.enter_code')); ?>', trigger: 'blur'}
          ],
          password: [
            {required: true, validator: validatePass, trigger: 'blur'}
          ],
          password_confirmation: [
            {required: true, validator: validatePass2, trigger: 'blur'}
          ]
        },
      },

      mounted () {
      },

      methods: {
        submitForm(form) {
          let _data = this.form, url = 'forgotten/password'

          if (!this.isCode) {
            url = 'forgotten/send_code'
          }

          this.$refs[form].validate((valid) => {
            if (!valid) {
              return;
            }

            $http.post(url, this.form).then((res) => {
              if (this.isCode) {
                layer.msg(res.message)
              } else {
                this.$alert(res.message, '<?php echo e(__('common.text_hint')); ?>');
              }

              this.$refs[form].clearValidate();

              if (this.isCode) {
                location = "<?php echo e(shop_route('login.index')); ?>"
              }
              this.isCode = true
            })
          });
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\themes\default/account/forgotten.blade.php ENDPATH**/ ?>