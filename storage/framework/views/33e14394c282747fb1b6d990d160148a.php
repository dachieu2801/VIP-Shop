

<?php $__env->startSection('body-class', 'page-login'); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/vue/2.7/vue' . (!config('app.debug') ? '.min' : '') . '.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/element-ui/index.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('vendor/element-ui/index.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <div class="pb-1">

    <?php if(!request('iframe')): ?>
      <?php if (isset($component)) { $__componentOriginalaaf2a10efb487c03115f53565e62c23d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaaf2a10efb487c03115f53565e62c23d = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Breadcrumb::resolve(['type' => 'static','value' => 'login.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

    <div class="<?php echo e(request('iframe') ? 'container-fluid form-iframe mt-5' : 'container'); ?>" id="page-login" v-cloak>
      
      
      

      <div class="login-wrap">
        <div class="card my-5" style="
        border: 1px solid rgb(200 196 196 / 90%);
        box-sizing: border-box;
        -webkit-box-shadow: 2px 4px 7px -1px rgba(184,173,184,1);
        -moz-box-shadow: 2px 4px 7px -1px rgba(184,173,184,1);
        box-shadow: 2px 4px 7px -1px rgba(184,173,184,1);
        ">
          <el-form ref="loginForm" :model="loginForm" :rules="loginRules" :inline-message="true">
            <div class="login-item-header card-header mt-3" style="background-color: #fff">
              <h6 class="text-uppercase mb-0" ><?php echo e(__('shop/login.login')); ?></h6>
            </div>
            <div class=" px-4 ">
               <?php
                    $__hook_name="account.login.email";
                    ob_start();
                ?>
              <el-form-item label="<?php echo e(__('shop/login.email')); ?>" prop="email">
                <el-input @keyup.enter.native="checkedBtnLogin('loginForm')" v-model="loginForm.email" placeholder="<?php echo e(__('shop/login.email_address')); ?>"></el-input>
              </el-form-item>
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
                    $__hook_name="account.login.password";
                    ob_start();
                ?>
              <el-form-item label="<?php echo e(__('shop/login.password')); ?>" prop="password">
                <el-input @keyup.enter.native="checkedBtnLogin('loginForm')" type="password" v-model="loginForm.password" placeholder="<?php echo e(__('shop/login.password')); ?>"></el-input>
              </el-form-item>
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
                
                $output = \Hook::getHook("account.login.password.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
              <div class="mt-4 mb-3">
                <button type="button" @click="checkedBtnLogin('loginForm')" class="btn btn-dark btn-lg w-100 fw-bold" style="background-color: #ee4d2d"><i class="bi bi-box-arrow-in-right"></i> <?php echo e(__('shop/login.login')); ?></button>
              </div>
            </div>
          </el-form>
          <?php if(!request('iframe')): ?>
            <a class="text-muted forgotten-link  px-4 pb-3 pt-2" href="<?php echo e(shop_route('forgotten.index')); ?>"><i class="bi bi-question-circle"></i> <?php echo e(__('shop/login.forget_password')); ?></a>
          <?php endif; ?>

          <?php if($social_buttons): ?>

            <div class="social-wrap px-4 mb-3">
              <div class="title mb-4 "><span><?php echo e(__('shop/login.third_party_logins')); ?></span></div>
              <?php $__currentLoopData = $social_buttons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $button; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
          <?php endif; ?>
        </div>

        <div class="d-flex vr-wrap d-none d-md-flex">
          <div class="vr bg-secondary"></div>
        </div>
        <div>

        </div>
        <div class="card my-5" style="
        border: 1px solid rgb(200 196 196 / 90%);
        box-sizing: border-box;
        -webkit-box-shadow: 2px 4px 7px -1px rgba(184,173,184,1);
        -moz-box-shadow: 2px 4px 7px -1px rgba(184,173,184,1);
        box-shadow: 2px 4px 7px -1px rgba(184,173,184,1);
        ">
          <div class="login-item-header card-header mt-3 " style="background-color: #fff">
            <h6 class="text-uppercase mb-0" ><?php echo e(__('shop/login.new')); ?></h6>
          </div>
          <div class=" px-4 mb-3">
            <el-form ref="registerForm" :model="registerForm" :rules="registeRules">
               <?php
                    $__hook_name="account.login.new.email";
                    ob_start();
                ?>
              <el-form-item label="<?php echo e(__('shop/login.email')); ?>" prop="email">
                <el-input @keyup.enter.native="checkedBtnLogin('registerForm')" v-model="registerForm.email" placeholder="<?php echo e(__('shop/login.email_address')); ?>"></el-input>
              </el-form-item>
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
                    $__hook_name="account.login.new.password";
                    ob_start();
                ?>
              <el-form-item label="<?php echo e(__('shop/login.password')); ?>" prop="password">
                <el-input @keyup.enter.native="checkedBtnLogin('registerForm')" type="password" v-model="registerForm.password" placeholder="<?php echo e(__('shop/login.password')); ?>"></el-input>
              </el-form-item>
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
                    $__hook_name="account.login.new.confirm_password";
                    ob_start();
                ?>
              <el-form-item label="<?php echo e(__('shop/login.confirm_password')); ?>" prop="password_confirmation">
                <el-input @keyup.enter.native="checkedBtnLogin('registerForm')" type="password" v-model="registerForm.password_confirmation" placeholder="<?php echo e(__('shop/login.confirm_password')); ?>"></el-input>
              </el-form-item>
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
                
                $output = \Hook::getHook("account.login.new.confirm_password.bottom",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

              <div class="mt-5 mb-3">
                <button type="button" @click="checkedBtnLogin('registerForm')" style="background-color: #ee4d2d" class="btn btn-dark btn-lg w-100 fw-bold"><i class="bi bi-person"></i> <?php echo e(__('shop/login.register')); ?></button>
              </div>
            </el-form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('add-scripts'); ?>
  <script>
    var validatePass = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('<?php echo e(__('shop/login.enter_password')); ?>'));
      } else {
        if (value !== '') {
          app.$refs.registerForm.validateField('password_confirmation');
        }
        callback();
      }
    };

    var validatePass2 = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('<?php echo e(__('shop/login.please_confirm')); ?>'));
      } else if (value !== app.registerForm.password) {
        callback(new Error('<?php echo e(__('shop/login.password_err')); ?>'));
      } else {
        callback();
      }
    };

    let app = new Vue({
      el: '#page-login',

      data: {
        loginForm: {
          email: '',
          password: '',
        },

        registerForm: {
          email: '',
          password: '',
          password_confirmation: '',
        },

        loginRules: {
          email: [
            {required: true, message: '<?php echo e(__('shop/login.enter_email')); ?>', trigger: 'change'},
            {type: 'email', message: '<?php echo e(__('shop/login.email_err')); ?>', trigger: 'change'},
          ],
          password: [
            {required: true, message: '<?php echo e(__('shop/login.enter_password')); ?>', trigger: 'change'}
          ]
        },

        registeRules: {
          email: [
            {required: true, message: '<?php echo e(__('shop/login.enter_email')); ?>', trigger: 'change'},
            {type: 'email', message: '<?php echo e(__('shop/login.email_err')); ?>', trigger: 'change'},
          ],
          password: [
            {required: true, message: '<?php echo e(__('shop/login.enter_password')); ?>', trigger: 'change'}
          ],
          password_confirmation: [
            {required: true, validator: validatePass2, trigger: 'change'}
          ]
        },
        <?php echo $__env->yieldPushContent('login.vue.data'); ?>
      },

      beforeMount () {
      },

      methods: {
        checkedBtnLogin(form) {
          let _data = this.loginForm, url = '/login'

          if (form == 'registerForm') {
            _data = this.registerForm, url = '/register'
          }

          this.$refs['loginForm'].clearValidate();
          this.$refs['registerForm'].clearValidate();

          this.$refs[form].validate((valid) => {
            if (!valid) {
              layer.msg('<?php echo e(__('shop/login.check_form')); ?>', () => {})
              return;
            }

            $http.post(url, _data, {hmsg: true}).then((res) => {
              layer.msg(res.message)
              <?php if(!request('iframe')): ?>
                location = "<?php echo e(shop_route('account.index')); ?>"
              <?php else: ?>
              var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
              setTimeout(() => {
                parent.layer.close(index); //再执行关闭
                parent.window.location.reload()
              }, 400);
              <?php endif; ?>
            }).catch((err) => {
              if (err.response.data.data && err.response.data.data.error == 'password') {
                layer.msg(err.response.data.message, ()=>{})
                return
              }

              layer.alert(err.response.data.message, {title: '<?php echo e(__('common.text_hint')); ?>', btn: ['<?php echo e(__('common.confirm')); ?>'], skin: 'login-alert'})
            })
          });
        },
        <?php echo $__env->yieldPushContent('login.vue.method'); ?>
      }
    })

     <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("account.login.form.js.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\team-free-lance\shop-freelance\themes\default/account/login.blade.php ENDPATH**/ ?>