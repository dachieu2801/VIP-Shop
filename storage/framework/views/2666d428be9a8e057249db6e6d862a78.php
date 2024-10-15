

<?php $__env->startSection('title', __('admin/plugin.plugin_list')); ?>

<?php $__env->startSection('page-title-right'); ?>
   <?php
                    $__hook_name="admin.plugin.marketing";
                    ob_start();
                ?>
  <a href="<?php echo e(admin_route('marketing.index', isset($type) ? ['type' => $type]: '')); ?>" class="btn btn-outline-info"><?php echo e(__('common.get_more')); ?></a>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div id="plugins-app" class="card" v-cloak>
    <div class="card-body h-min-600">
      <div class="mt-4 table-push" style="">
        <table class="table" v-if="plugins.length">
          <thead>
            <tr>
              <!-- <th><?php echo e(__('admin/plugin.plugin_code')); ?></th> -->
              <th class="d-none d-sm-table-cell"><?php echo e(__('admin/plugin.plugin_version')); ?></th>
              <th class="d-none d-sm-table-cell"><?php echo e(__('admin/plugin.plugin_type')); ?></th>
              <th width="50%"><?php echo e(__('admin/plugin.plugin_description')); ?></th>
              <th><?php echo e(__('admin/common.status')); ?></th>
              <th><?php echo e(__('admin/common.action')); ?></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="plugin, index in plugins" :key="index">
              <!-- <td>{{ plugin.code }}</td> -->
              <td class="d-none d-sm-table-cell">{{ plugin.version }}</td>
              <td class="d-none d-sm-table-cell">{{ plugin.type_format }}</td>
              <td>
                <div class="plugin-describe d-flex align-items-center">
                  <div class="me-2" style="flex: 0 0 50px;"><img :src="plugin.icon" class="img-fluid border"></div>
                  <div>
                    <h6>{{ plugin.name }}</h6>
                    <div class="" v-html="plugin.description"></div>
                  </div>
                </div>
              </td>
              <td>
                <el-switch :disabled="!plugin.installed" v-model="plugin.status" @change="(e) => {pluginStatusChange(e, plugin.code, index)}"></el-switch>
              </td>
              <td>
                <div v-if="plugin.installed">
                  <div class="d-flex gap-2 flex-wrap">
                    <span :style="!plugin.status ? 'cursor: not-allowed':''">
                    <a v-if="plugin.type != 'theme'" :class="['btn btn-outline-secondary btn-sm', !plugin.status ? 'disabled' : '' ]" :href="plugin.edit_url"><?php echo e(__('admin/common.edit')); ?></a>
                    <a v-else :class="['btn btn-outline-secondary btn-sm', !plugin.status ? 'disabled' : '' ]" href="<?php echo e(admin_route('theme.index')); ?>"><?php echo e(__('admin/plugin.to_enable')); ?></a>
                  </span>
                    <a class="btn btn-outline-danger btn-sm" @click="installedPlugin(plugin.code, 'uninstall', index)"><?php echo e(__('admin/common.uninstall')); ?></a>
                  </div>
                </div>
                <div v-else>
                  <a class="btn btn-outline-success btn-sm" @click="installedPlugin(plugin.code, 'install', index)"><?php echo e(__('admin/common.install')); ?></a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-else>
          <?php if (isset($component)) { $__componentOriginal5e41293ba75edb5b6791bae671134304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e41293ba75edb5b6791bae671134304 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\NoData::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\NoData::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('text', null, []); ?> 
              <?php echo e(__('common.no_data')); ?> <a href="<?php echo e(admin_route('marketing.index', isset($type) ? ['type' => $type]: '')); ?>" ><i class="bi bi-link-45deg"></i> <?php echo e(__('common.get_more')); ?></a>
             <?php $__env->endSlot(); ?>
           <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e41293ba75edb5b6791bae671134304)): ?>
<?php $attributes = $__attributesOriginal5e41293ba75edb5b6791bae671134304; ?>
<?php unset($__attributesOriginal5e41293ba75edb5b6791bae671134304); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e41293ba75edb5b6791bae671134304)): ?>
<?php $component = $__componentOriginal5e41293ba75edb5b6791bae671134304; ?>
<?php unset($__componentOriginal5e41293ba75edb5b6791bae671134304); ?>
<?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    new Vue({
      el: '#plugins-app',

      data: {
        plugins: <?php echo json_encode($plugins ?? [], 15, 512) ?>,
      },

      beforeMount() {

      },

      methods: {
        toBkTicketUrl(code) {
          return `${config.api_url}/account/plugin_tickets/create?domain=${location.host}&plugin=${code}`
        },

        pluginStatusChange(e, code, index) {
          const self = this;

          $http.put(`plugins/${code}/status`, {status: e * 1}).then((res) => {
            layer.msg(res.message)
          }).catch((res) => {
            this.plugins[index].status = !this.plugins[index].status;
          });
        },

        installedPlugin(code, type, index) {
          if (type == 'uninstall') {
            layer.confirm('<?php echo e(__('admin/plugin.uninstall_hint')); ?>', {
              title: "<?php echo e(__('common.text_hint')); ?>",
              btn: ['<?php echo e(__('common.cancel')); ?>', '<?php echo e(__('common.confirm')); ?>'],
              area: ['400px'],
              btn2: () => {
                this.installedPluginXhr(code, type, index);
              }
            })
            return;
          }

          this.installedPluginXhr(code, type, index);
        },

        installedPluginXhr(code, type, index) {
          $http.post(`plugins/${code}/${type}`).then((res) => {
            layer.msg(res.message)
            this.plugins[index].installed = type == 'install' ? true : false;
          })
        }
      }
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/plugins/index.blade.php ENDPATH**/ ?>