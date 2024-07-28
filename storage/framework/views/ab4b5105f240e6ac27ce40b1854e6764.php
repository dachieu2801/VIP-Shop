<div class="mb-4 module-category-wrap">
  <h4 class="mb-3"><span><?php echo e(__('product.category')); ?></span></h4>
  <ul class="sidebar-widget mb-0" id="category-one">
    <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_a => $category_all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="<?php echo e($category_all['id'] == $category->id ? 'active' : ''); ?>">
      <a href="<?php echo e($category_all['url']); ?>" title="<?php echo e($category_all['name']); ?>" class="category-href"><?php echo e($category_all['name']); ?></a>
      <?php if($category_all['children']): ?>
        <button class="toggle-icon btn <?php echo e($category_all['id'] == $category->id ? '' : 'collapsed'); ?>" data-bs-toggle="collapse" href="#category-<?php echo e($key_a); ?>"><i class="bi bi-chevron-up"></i></button>
        <ul id="category-<?php echo e($key_a); ?>" class="accordion-collapse collapse <?php echo e($category_all['id'] == $category->id ? 'show' : ''); ?>" data-bs-parent="#category-one">
          <?php $__currentLoopData = $category_all['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_b => $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="<?php echo e($child['id'] == $category->id ? 'active' : ''); ?> child-category">
            <a href="<?php echo e($child['url']); ?>" title="<?php echo e($child['name']); ?>"><?php echo e($child['name']); ?></a>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      <?php endif; ?>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>

<div class="filter-box">
  <?php if($filter_data['price']['min'] != $filter_data['price']['max']): ?>
     <?php
                    $__hook_name="category.filter.sidebar.price";
                    ob_start();
                ?>
    <?php $__env->startPush('header'); ?>
      <script src="<?php echo e(asset('vendor/jquery/jquery-ui/jquery-ui.min.js')); ?>"></script>
      <link rel="stylesheet" href="<?php echo e(asset('vendor/jquery/jquery-ui/jquery-ui.min.css')); ?>">
    <?php $__env->stopPush(); ?>

    <?php if(system_setting('base.multi_filter.price_filter', 1)): ?>
      <div class="card">
        <div class="card-header p-0">
          <h4 class="mb-3"><?php echo e(__('product.price')); ?></h4>
        </div>
        <div class="card-body p-0">
          <div id="price-slider" class="mb-2"><div class="slider-bg"></div></div>
          <div class="text-secondary price-range d-flex justify-content-between">
            <div>
              <?php echo e(__('common.text_form')); ?>

              <span class="min"><?php echo e(currency_format($filter_data['price']['select_min'], current_currency_code())); ?></span>
            </div>
            <div>
              <?php echo e(__('common.text_to')); ?>

              <span class="max"><?php echo e(currency_format($filter_data['price']['select_max'], current_currency_code())); ?></span>
            </div>
          </div>
          <input value="<?php echo e($filter_data['price']['select_min']); ?>" class="price-select-min d-none">
          <input value="<?php echo e($filter_data['price']['select_max']); ?>" class="price-select-max d-none">
          <input value="<?php echo e($filter_data['price']['min']); ?>" class="price-min d-none">
          <input value="<?php echo e($filter_data['price']['max']); ?>" class="price-max d-none">
        </div>
      </div>
    <?php endif; ?>
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
                    $__hook_name="category.filter.sidebar.attr";
                    ob_start();
                ?>
  <?php $__currentLoopData = $filter_data['attr']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="card">
    <div class="card-header fw-bold p-0">
      <h4 class="mb-3"><?php echo e($attr['name']); ?></h4>
    </div>
    <ul class="list-group list-group-flush attribute-item" data-attribute-id="<?php echo e($attr['id']); ?>">
      <?php $__currentLoopData = $attr['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="list-group-item border-0 px-0">
        <label class="form-check-label d-block">
          <input class="form-check-input attr-value-check me-2" data-attr="<?php echo e($index); ?>" data-attrval="<?php echo e($value_index); ?>" <?php echo e($value['selected'] ? 'checked' : ''); ?> name="6" type="checkbox" value="<?php echo e($value['id']); ?>"><?php echo e($value['name']); ?>

        </label>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->startPush('add-scripts'); ?>
<script>
  const currencyRate = <?php echo e(current_currency_rate()); ?>;
  $(document).ready(function() {
    if (!$('#price-slider').length) {
      return;
    }

    $("#price-slider").slider({
      range: true,
      step: 0.01,
      min: <?php echo e($filter_data['price']['min'] ?? 0); ?>,
      max: <?php echo e($filter_data['price']['max'] ?? 0); ?>,
      values: [<?php echo e($filter_data['price']['select_min']); ?>, <?php echo e($filter_data['price']['select_max']); ?>],
      change: function(event, ui) {
        $('input.price-select-min').val(ui.values[0])
        $('input.price-select-max').val(ui.values[1])
        filterProductData();
      },
      slide: function(event, ui) {
        let min = $('.price-range .min').html();
        let max = $('.price-range .max').html();
        $('.price-range .min').html(min.replace(min.replace(/[^0-9.,]/g, ''), (ui.values[0] * currencyRate).toFixed(2)));
        $('.price-range .max').html(max.replace(max.replace(/[^0-9.,]/g, ''), (ui.values[1] * currencyRate).toFixed(2)));
      }
    });
  })
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\team-free-lance\shop-freelance\themes\default/shared/filter_sidebar_block.blade.php ENDPATH**/ ?>