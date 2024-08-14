

<?php $__env->startSection('title', __('admin/report_sale.text_report')); ?>

<?php $__env->startSection('body-class', 'page-pages-form'); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/chart/chart.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center gap-2">
      <div class="chart-title"><span><?php echo e(__('admin/report.all_product')); ?></span></div>
      <div class="orders-right">
        <div class="btn-group" role="group" aria-label="Basic outlined example">
          <button type="button" class="btn btn-sm btn-outline-info btn-info text-white" data-type="latest_month"><?php echo e(__('admin/dashboard.latest_month')); ?></button>
          <button type="button" class="btn btn-sm btn-outline-info" data-type="latest_week"><?php echo e(__('admin/dashboard.latest_week')); ?></button>
          <button type="button" class="btn btn-sm btn-outline-info" data-type="latest_year"><?php echo e(__('admin/dashboard.latest_year')); ?></button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="bg-light p-3 mb-2">
        <div class="input-group w-max-500">
          <input id="product-autocomplete" type="text" class="form-control" placeholder="<?php echo e(__('product.name')); ?>">
          <button type="button" class="btn btn-outline-secondary btn-sm btn-reset"><?php echo e(__('common.reset')); ?></button>
        </div>
      </div>

      <div><canvas id="orders-chart" height="400"></canvas></div>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div><?php echo e(__('admin/report.reports_view')); ?></div>
    </div>
    <div class="card-body">
      <table class="table table-hover table-ranking-list">
        <thead>
          <tr>
            <th width="54">ID</th>
            <th><?php echo e(__('admin/common.product')); ?></th>
            <th><?php echo e(__('admin/report.view_count')); ?></th>
            <th><?php echo e(__('common.created_at')); ?></th>
            <th><?php echo e(__('common.action')); ?></th>
          </tr>
        </thead>
        <tbody>

          <?php $__currentLoopData = $views; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($item->description->product_id); ?></td>
              <td class="product-name"><?php echo e($item->description->name); ?></td>
              <td><?php echo e($item->view_count); ?></td>
              <td><?php echo e($item->description->created_at); ?></td>
              <td><button type="button" class="btn btn-sm btn-outline-secondary view-product-chart" data-id="<?php echo e($item->description->product_id); ?>"><?php echo e(__('admin/report.view_product_chart')); ?></button></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
      </table>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
<script>
  let viewsTrends = <?php echo json_encode($views_trends ?? [], 15, 512) ?>;
  const orders = document.getElementById('orders-chart').getContext('2d');

  const orderGradient = orders.createLinearGradient(0, 0, 0, 380);
        orderGradient.addColorStop(0, 'rgba(180,223,253,1)');
        orderGradient.addColorStop(1, 'rgba(180,223,253,0)');

  const amountGradient = orders.createLinearGradient(0, 0, 0, 380);
        amountGradient.addColorStop(0, 'rgba(32,201,151,0.3)');
        amountGradient.addColorStop(1, 'rgba(32,201,151,0)');

  let latest_month = viewsTrends.latest_month;
  let latest_week = viewsTrends.latest_week;
  let latest_year = viewsTrends.latest_year;

  const ordersChart = new Chart(orders, {
    type: 'line',
    data: {
      labels: Object.keys(latest_month.pv_totals),
      datasets: [
        {
          label: ["<?php echo e(__('admin/report.pv_total')); ?>(PV)"],
          fill: true,
          backgroundColor : orderGradient,
          borderColor : "#4da4f9",
          borderWidth: 2,
          data: Object.values(latest_month.pv_totals),
          responsive: true,
          lineTension: 0.4,
          datasetStrokeWidth: 3,
          pointDotStrokeWidth: 4,
          pointHoverBorderWidth: 8,
          pointBackgroundColor: '#4da4f9',
        },
        {
          label: ["<?php echo e(__('admin/report.uv_total')); ?>(UV)"],
          fill: true,
          backgroundColor : amountGradient,
          borderColor : "#20c997",
          borderWidth: 2,
          data: Object.values(latest_month.uv_totals),
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
        // legend: false // Hide legend
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
    const labels = Object.keys(eval(day).pv_totals);
    const data = [Object.values(eval(day).pv_totals), Object.values(eval(day).uv_totals)];
    $(this).addClass('btn-info text-white').siblings().removeClass('btn-info text-white');
    upDate(ordersChart, labels, data);
  });

  $('.view-product-chart').on('click', function() {
    const id = $(this).data('id');
    const self = $(this);
    $('#product-autocomplete').val('');
    productFilterId = 0;

    getProducrReports(id, () => {
      $('.chart-title span').text(self.parents('tr').find('.product-name').text());
    });
  });

  $('.btn-reset').on('click', function() {
    location.reload();
  });

  function getProducrReports(id, callback) {
    $http.get(`reports/product_view/${id}`).then(function(res) {
      // 页面滚动到顶部
      $('#content').animate({scrollTop: 0}, 200);
      viewsTrends = res.data.views_trends;
      ordersChart.data.labels = Object.keys(viewsTrends.latest_month.pv_totals);
      ordersChart.data.datasets[0].data = viewsTrends.latest_month.pv_totals;
      ordersChart.data.datasets[1].data = viewsTrends.latest_month.uv_totals;
      // 同时更新  latest_month, latest_week, latest_year
      latest_month = viewsTrends.latest_month;
      latest_week = viewsTrends.latest_week;
      latest_year = viewsTrends.latest_year;
      // 更新按钮状态
      $('.orders-right .btn-group > .btn').removeClass('btn-info text-white');
      $('.orders-right .btn-group > .btn[data-type="latest_month"]').addClass('btn-info text-white');

      ordersChart.update();

      if (callback) {
        callback();
      }
    });
  }

  $(function ($) {
    $('#product-autocomplete').autocomplete({
      'source': function(request, response) {
        $http.get(`products/autocomplete?name=${encodeURIComponent(request)}`, null, {hload: true}).then((res) => {
          response($.map(res.data, function(item) {
            return {label: item['name'], value: item['id']}
          }));
        })
      },
      'select': function(item) {
        $(this).val(item['label']);
        getProducrReports(item['value'], () => {
          $('.chart-title span').text($('#product-autocomplete').val());
        });
      }
    });
  })
</script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/report/product_view.blade.php ENDPATH**/ ?>