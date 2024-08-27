

<?php $__env->startSection('title', __('admin/order.list')); ?>

<?php $__env->startSection('content'); ?>
  <?php if($errors->has('error')): ?>
    <?php if (isset($component)) { $__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8 = $attributes; } ?>
<?php $component = Beike\Admin\View\Components\Alert::resolve(['type' => 'danger','msg' => ''.e($errors->first('error')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Beike\Admin\View\Components\Alert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8)): ?>
<?php $attributes = $__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8; ?>
<?php unset($__attributesOriginal18fd067f3cb26aee8acdd02921cdd9f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8)): ?>
<?php $component = $__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8; ?>
<?php unset($__componentOriginal18fd067f3cb26aee8acdd02921cdd9f8); ?>
<?php endif; ?>
  <?php endif; ?>

  <?php $__env->startSection('page-title-right'); ?>
    <button type="button" class="btn btn-outline-secondary btn-print" onclick="app.btnPrint()"><i class="bi bi-printer-fill"></i> <?php echo e(__('admin/order.btn_print')); ?></button>
  <?php $__env->stopSection(); ?>

  <div id="orders-app" class="card h-min-600">
    <div class="card-body">
      <div class="bg-light p-4 mb-3">
        <el-form :inline="true" ref="filterForm" :model="filter" class="demo-form-inline" label-width="100px">
          <div>
            <el-form-item label="<?php echo e(__('order.number')); ?>">
              <el-input @keyup.enter.native="search" v-model="filter.number" size="small" placeholder="<?php echo e(__('order.number')); ?>"></el-input>
            </el-form-item>
            <el-form-item label="<?php echo e(__('order.customer_name')); ?>">
              <el-input @keyup.enter.native="search" v-model="filter.customer_name" size="small" placeholder="<?php echo e(__('order.customer_name')); ?>">
              </el-input>
            </el-form-item>
            <el-form-item label="<?php echo e(__('order.email')); ?>">
              <el-input @keyup.enter.native="search" v-model="filter.email" size="small" placeholder="<?php echo e(__('order.email')); ?>"></el-input>
            </el-form-item>
            <el-form-item label="<?php echo e(__('common.status')); ?>" class="el-input--small">
              <select v-model="filter.status" class="form-select w-100 bg-white ">
                <option value=""><?php echo e(__('common.all')); ?></option>
                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($item['status']); ?>"><?php echo e($item['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </el-form-item>
          </div>
          <el-form-item label="<?php echo e(__('order.created_at')); ?>">
            <el-form-item class="mb-2">
              <el-date-picker format="yyyy-MM-dd" value-format="yyyy-MM-dd" type="date" size="default"
                placeholder="<?php echo e(__('common.pick_datetime')); ?>" @change="pickerDate(1)" v-model="filter.start" style="width: 100%;">
              </el-date-picker>
            </el-form-item>

            <el-form-item>
              <el-date-picker format="yyyy-MM-dd" value-format="yyyy-MM-dd" type="date" size="default"
                placeholder="<?php echo e(__('common.pick_datetime')); ?>" @change="pickerDate(0)" v-model="filter.end" style="width: 100%;">
              </el-date-picker>
            </el-form-item>
          </el-form-item>
        </el-form>

        <div class="row">
          <label class="wp-100"></label>
          <div class="col-auto">
            <button type="button" @click="search"
              class="btn btn-outline-primary btn-sm"><?php echo e(__('common.filter')); ?></button>
            <button type="button" @click="exportOrder"
              class="btn btn-outline-primary btn-sm ms-1"><?php echo e(__('common.export')); ?></button>
            <button type="button" @click="resetSearch"
              class="btn btn-outline-secondary btn-sm ms-1"><?php echo e(__('common.reset')); ?></button>
          </div>
        </div>
      </div>

      <?php if(count($orders)): ?>
        <div class="table-push overflow-auto">
          <table class="table w-100">
            <thead>
              <tr>
                <th><input type="checkbox" v-model="allSelected" /></th>
                <th><?php echo e(__('order.id')); ?></th>
                <th><?php echo e(__('order.number')); ?></th>
                <th><?php echo e(__('order.customer_name')); ?></th>
                <th><?php echo e(__('order.payment_method')); ?></th>
                <th><?php echo e(__('order.status')); ?></th>
                <th><?php echo e(__('order.total')); ?></th>
                <th><?php echo e(__('order.created_at')); ?></th>
                <th><?php echo e(__('order.updated_at')); ?></th>
                <th>Giờ nhận hàng</th>
                <th><?php echo e(__('common.action')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if(count($orders)): ?>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr data-hook-id=<?php echo e($order->id); ?>>
                    <td><input type="checkbox" :value="<?php echo e($order['id']); ?>" v-model="selectedIds" /></td>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->number); ?></td>
                    <td><?php echo e(sub_string($order->customer_name, 14)); ?></td>
                    <td><?php echo e($order->payment_method_name); ?></td>
                    <td><?php echo e($order->status_format); ?></td>
                    <td><?php echo e(currency_format($order->total, $order->currency_code, $order->currency_value)); ?></td>
                    <td><?php echo e($order->created_at); ?></td>
                    <td><?php echo e($order->updated_at); ?></td>
                    <td><?php echo e($order->receive_time); ?></td>
                    <td>
                      <?php if(!$order->deleted_at): ?>
                     <div class="d-flex gap-2 ">
                       <a href="<?php echo e(admin_route('orders.show', [$order->id])); ?>"
                       class="btn btn-primary btn-sm"><?php echo e(__('common.view')); ?>

                      </a>
                      <!-- CHECK editable ?????? -->
                      <a href="<?php echo e(admin_route('orders.show', [$order->id])); ?>"
                         class="btn btn-secondary btn-sm"> Sửa
                      </a>
                      <!--  -->
                       <button type="button"  data-id="<?php echo e($order->id); ?>" class="btn btn-outline-danger btn-sm delete-btn"><?php echo e(__('common.delete')); ?></button>
                     </div>
                      <?php else: ?>
                      <button type="button" data-id="<?php echo e($order->id); ?>" class="btn btn-outline-secondary btn-sm restore-btn"><?php echo e(__('common.restore')); ?></button>
                       <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.products.trashed.action",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                      <?php endif; ?>

                       <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.order.list.action",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
                <tr>
                  <td colspan="9" class="border-0">
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
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <?php echo e($orders->withQueryString()->links('admin::vendor/pagination/bootstrap-4')); ?>

      <?php else: ?>
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
      <?php endif; ?>
    </div>
  </div>

   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("admin.order.list.content.footer",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
  <script>
    let app = new Vue({
      el: '#orders-app',
      data: {
        url: '<?php echo e($type == 'trashed' ? admin_route("orders.trashed") : admin_route("orders.index")); ?>',
        exportUrl: <?php echo json_encode(admin_route('orders.export'), 15, 512) ?>,
        selectedIds: [],
        orderIds: <?php echo json_encode($orders->pluck('id'), 15, 512) ?>,
        btnPrintUrl: '',
        filter: {
          number: bk.getQueryString('number'),
          status: bk.getQueryString('status'),
          customer_name: bk.getQueryString('customer_name'),
          email: bk.getQueryString('email'),
          start: bk.getQueryString('start'),
          end: bk.getQueryString('end'),
        },
      },

      watch: {
        "filter.start": {
          handler(newVal,oldVal) {
            if(!newVal) {
              this.filter.start = ''
            }
          }
        },
        "filter.end": {
          handler(newVal,oldVal) {
            if(!newVal) {
              this.filter.end = ''
            }
          }
        },
        "selectedIds": {
          handler(newVal,oldVal) {
            this.btnPrintUrl = `<?php echo e(admin_route('orders.shipping.get')); ?>?selected=${newVal}`;
          }
        }
      },

      computed: {
        allSelected: {
          get(e) {
            return this.selectedIds.length == this.orderIds.length;
          },
          set(val) {
            val ? this.selectedIds = this.orderIds : this.selectedIds = [];
            this.btnPrintUrl = `<?php echo e(admin_route('orders.shipping.get')); ?>?selected=${this.selectedIds}`;
            return val;
          }
        }
      },

      created() {
        bk.addFilterCondition(this);
      },

      methods: {
        btnPrint() {
          if (!this.selectedIds.length) {
            return layer.msg('<?php echo e(__('admin/order.order_print_error')); ?>', ()=>{});
          }
          window.open(this.btnPrintUrl);
        },

        pickerDate(type) {
          if(this.filter.end && this.filter.start > this.filter.end) {
             if(type) {
              this.filter.start = ''
            } else {
              this.filter.end = ''
            }
          }
        },

        search() {
          location = bk.objectToUrlParams(this.filter, this.url)
        },

        resetSearch() {
          this.filter = bk.clearObjectValue(this.filter)
          location = bk.objectToUrlParams(this.filter, this.url)
        },

        exportOrder() {
          location = bk.objectToUrlParams(this.filter, this.exportUrl)
        },
      }
    });
  </script>

<script>
  $('.delete-btn').click(function(event) {
    console.log("click-delete")
    const id = $(this).data('id');
    const self = $(this);

    layer.confirm('<?php echo e(__('common.confirm_delete')); ?>', {
      title: "<?php echo e(__('common.text_hint')); ?>",
      btn: ['<?php echo e(__('common.cancel')); ?>', '<?php echo e(__('common.confirm')); ?>'],
      area: ['400px'],
      btn2: () => {
        $http.delete(`orders/${id}`).then((res) => {
          layer.msg(res.message);
          window.location.reload();
        })
      }
    })
  });

  $('.restore-btn').click(function(event) {
    const id = $(this).data('id');

    $http.put(`orders/restore/${id}`).then((res) => {
      window.location.reload();
    })
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\shop-freelance\resources\/beike/admin/views/pages/orders/index.blade.php ENDPATH**/ ?>