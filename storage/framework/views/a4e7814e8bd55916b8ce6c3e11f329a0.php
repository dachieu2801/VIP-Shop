

<?php $__env->startSection('title', __('admin/report_sale.text_report')); ?>

<?php $__env->startSection('body-class', 'page-pages-form'); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/chart/chart.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center gap-2">
      <div><?php echo e(__('admin/dashboard.order_report')); ?></div>
      <div class="orders-right">
        <div class="btn-group" role="group" aria-label="Basic outlined example">
          <button type="button" class="btn btn-sm btn-outline-info btn-info text-white" data-type="latest_month"><?php echo e(__('admin/dashboard.latest_month')); ?></button>
          <button type="button" class="btn btn-sm btn-outline-info" data-type="latest_year"><?php echo e(__('admin/dashboard.latest_year')); ?></button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="bg-light p-2 mb-3" id="app">
        <el-form :inline="true" ref="filterForm" :model="filter" class="demo-form-inline" label-width="100px">
          <el-form-item label="<?php echo e(__('common.status')); ?>" class="mb-0">
            <el-select v-model="filter.statuses" multiple placeholder="请选择" size="small" class="wp-400" @change="changeSearch" @visible-change="search">
              <el-option v-for="item in statuses" :key="item.status" :label="item.name" :value="item.status"></el-option>
            </el-select>
          </el-form-item>
        </el-form>
      </div>

      <div><canvas id="orders-chart" height="400"></canvas></div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div><?php echo e(__('admin/report_sale.quantity_by_products')); ?></div>
        </div>
        <div class="card-body">
          <table class="table table-hover table-ranking-list">
            <thead>
              <tr>
                <th class="text-center" width="74"><?php echo e(__('admin/report_sale.text_ranking')); ?></th>
                <th><?php echo e(__('admin/common.product')); ?></th>
                <th><?php echo e(__('common.sales')); ?></th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $quantity_by_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="text-center">
                  <?php if($loop->iteration <= 3): ?>
                    <img src="<?php echo e(asset('image/ranking/ranking_'.$loop->iteration.'.png')); ?>" class="img-fluid ranking-icon">
                  <?php else: ?>
                    <?php echo e($loop->iteration); ?>

                  <?php endif; ?>
                </td>
                <td><a target="_blank" href="<?php echo e(admin_route('products.edit', [$item['product_id']])); ?>" class="text-link"><?php echo e($item['product']['description']['name'] ?? 'NONE'); ?></a></td>
                <td><?php echo e($item['total_quantity']); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div><?php echo e(__('admin/report_sale.amount_by_products')); ?></div>
        </div>
        <div class="card-body">
          <table class="table table-hover table-ranking-list">
            <thead>
              <tr>
                <th class="text-center" width="74"><?php echo e(__('admin/report_sale.text_ranking')); ?></th>
                <th><?php echo e(__('admin/common.product')); ?></th>
                <th><?php echo e(__('shop/account.amount')); ?></th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $amount_by_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="text-center">
                  <?php if($loop->iteration <= 3): ?>
                    <img src="<?php echo e(asset('image/ranking/ranking_'.$loop->iteration.'.png')); ?>" class="img-fluid ranking-icon">
                  <?php else: ?>
                    <?php echo e($loop->iteration); ?>

                  <?php endif; ?>
                </td>
                <td><a target="_blank" href="<?php echo e(admin_route('products.edit', [$item['product_id']])); ?>" class="text-link"><?php echo e($item['product']['description']['name'] ?? 'NONE'); ?></a></td>
                <td><?php echo e($item['total_amount']); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div><?php echo e(__('admin/report_sale.amount_by_customers')); ?></div>
        </div>
        <div class="card-body">
          
          <table class="table table-hover table-ranking-list">
            <thead>
              <tr>
                <th class="text-center" width="74"><?php echo e(__('admin/report_sale.text_ranking')); ?></th>
                <th><?php echo e(__('admin/customer.user_name')); ?></th>
                <th><?php echo e(__('shop/account.amount')); ?></th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $amount_by_customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="text-center">
                  <?php if($loop->iteration <= 3): ?>
                    <img src="<?php echo e(asset('image/ranking/ranking_'.$loop->iteration.'.png')); ?>" class="img-fluid ranking-icon">
                  <?php else: ?>
                    <?php echo e($loop->iteration); ?>

                  <?php endif; ?>
                </td>
                <td><a target="_blank" href="<?php echo e(admin_route('customers.edit', [$item['customer']['id'] ?? 0])); ?>" class="text-link"><?php echo e($item['customer']['name'] ?? ''); ?></a></td>
                <td><?php echo e($item['order_amount']); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
<script>
  const orders = document.getElementById('orders-chart').getContext('2d');

  const orderGradient = orders.createLinearGradient(0, 0, 0, 380);
        orderGradient.addColorStop(0, 'rgba(180,223,253,1)');
        orderGradient.addColorStop(1, 'rgba(180,223,253,0)');

  const amountGradient = orders.createLinearGradient(0, 0, 0, 380);
        amountGradient.addColorStop(0, 'rgba(32,201,151,0.3)');
        amountGradient.addColorStop(1, 'rgba(32,201,151,0)');

  const latest_month = <?php echo json_encode($order_trends['latest_month'], 15, 512) ?>;
  const latest_year = <?php echo json_encode($order_trends['latest_year'], 15, 512) ?>;

  const ordersChart = new Chart(orders, {
    type: 'line',
    data: {
      // labels: Array.from({length: 30}, (v, k) => k + 1),
      labels: latest_month.period,
      datasets: [
        {
          label: ["<?php echo e(__('admin/order.order_quantity')); ?>"],
          fill: true,
          backgroundColor : orderGradient, // Put the gradient here as a fill color
          borderColor : "#4da4f9",
          borderWidth: 2,
          // data: Array.from({length: 30}, () => Math.floor(Math.random() * 23.7)),
          data: latest_month.totals,
          // borderDash: [],
          responsive: true,
          lineTension: 0.4,
          datasetStrokeWidth: 3,
          pointDotStrokeWidth: 4,
          // pointStyle: 'rect',
          pointHoverBorderWidth: 8,
          // pointBorderColor: [],
          pointBackgroundColor: '#4da4f9',
          // pointColor : "#fff",
          // pointStrokeColor : "#ff6c23",
          // pointHighlightFill: "#fff",
          // pointHighlightStroke: "#ff6c23",
          // pointRadius: 3,
        },
        {
          label: ["<?php echo e(__('admin/order.order_amount')); ?>"],
          fill: true,
          backgroundColor : amountGradient,
          borderColor : "#20c997",
          borderWidth: 2,
          data: latest_month.amounts,
          responsive: true,
          lineTension: 0.4,
          datasetStrokeWidth: 3,
          pointDotStrokeWidth: 4,
          pointHoverBorderWidth: 8,
          pointBackgroundColor: '#20c997',
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
          legend: false // Hide legend
      },
      interaction: {
        mode: 'index',
        // axis: 'x',
        intersect: false,
        // includeInvisible: true,
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            drawBorder: false,
            borderDash: [3],
          },
        },
        x: {
          beginAtZero: true,
          grid: {
            drawBorder: false,
            display: false
          },
        }
      },
    }
  });

  function upDate(chart, label, data) {
    chart.data.labels = label;
    data.forEach((e, i) => {
      chart.data.datasets[i].data = e;
    });
    chart.update();
  }

  $('.orders-right .btn-group > .btn').on('click', function() {
    const day = $(this).data('type'); // 天数
    const labels = eval(day).period;
    const data = [eval(day).totals, eval(day).amounts];
    $(this).addClass('btn-info text-white').siblings().removeClass('btn-info text-white');
    upDate(ordersChart, labels, data);
  });

  let app = new Vue({
    el: '#app',
    data: {
      url: '<?php echo e(admin_route("reports_sale.index")); ?>',
      statuses: <?php echo json_encode($statuses, 15, 512) ?>,
      isStatusOpen: false,
      filter: {
        statuses: <?php echo json_encode($statuses_selected ?? [], 15, 512) ?>,
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
      }
    },

    methods: {
      pickerDate(type) {
        if(this.filter.end && this.filter.start > this.filter.end) {
            if(type) {
            this.filter.start = ''
          } else {
            this.filter.end = ''
          }
        }
      },

      search(e) {
        this.isStatusOpen = e
        if (!e) {
          location = bk.objectToUrlParams(this.filter, this.url)
        }
      },

      changeSearch(e) {
        if (!this.isStatusOpen) {
          location = bk.objectToUrlParams(this.filter, this.url)
        }
      },

      resetSearch() {
        this.filter = bk.clearObjectValue(this.filter)
        location = bk.objectToUrlParams(this.filter, this.url)
      },
    }
  });
</script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/report/sale.blade.php ENDPATH**/ ?>