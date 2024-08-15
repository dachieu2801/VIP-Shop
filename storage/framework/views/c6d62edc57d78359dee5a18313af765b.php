
<?php $__env->startSection('body-class', 'page-categories'); ?>
<?php $__env->startSection('title', $category->description->meta_title ?: system_setting('base.meta_title', 'BeikeShop là một hệ thống thương mại điện tử xuyên biên giới mã nguồn mở và dễ sử dụng') .' - '. $category->description->name); ?>
<?php $__env->startSection('keywords', $category->description->meta_keywords ?: system_setting('base.meta_keyword')); ?>
<?php $__env->startSection('description', $category->description->meta_description ?: system_setting('base.meta_description')); ?>

<?php $__env->startPush('header'); ?>
  <script src="<?php echo e(asset('vendor/scrolltofixed/jquery-scrolltofixed-min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginalaaf2a10efb487c03115f53565e62c23d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaaf2a10efb487c03115f53565e62c23d = $attributes; } ?>
<?php $component = Beike\Shop\View\Components\Breadcrumb::resolve(['type' => 'category','value' => $category] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3 pe-lg-4 left-column d-none d-lg-block">
        <div class="x-fixed-top"><?php echo $__env->make('shared.filter_sidebar_block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
      </div>

      <div class="col-12 col-lg-9 right-column">
         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("category.products.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
        <div class="filter-value-wrap mb-2 d-none">
          <ul class="list-group list-group-horizontal">
            <?php $__currentLoopData = $filter_data['attr']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $attr['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($value['selected']): ?>
                <li class="list-group-item me-1 mb-1" data-attr="<?php echo e($index); ?>" data-attrval="<?php echo e($value_index); ?>">
                  <?php echo e($attr['name']); ?>: <?php echo e($value['name']); ?> <i class="bi bi-x-lg ms-1"></i>
                </li>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item me-1 mb-1 delete-all"><?php echo e(__('common.delete_all')); ?></li>
          </ul>
        </div>

        <?php if(count($products_format)): ?>
          <?php echo $__env->make('shared.filter_bar_block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>








          <div class="row <?php echo e(request('style_list') == 'list' ? 'product-list-wrap' : ''); ?>">
            <?php $__currentLoopData = $products_format; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="<?php echo e(!request('style_list') || request('style_list') == 'grid' ? 'product-grid col-6 col-md-4 mb-3' : 'col-12'); ?>">
                <?php echo $__env->make('shared.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <?php else: ?>
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
        <?php endif; ?>

        <?php echo e($products->links('shared/pagination/bootstrap-4')); ?>


         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("category.products.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('add-scripts'); ?>
<script>
  let filterAttr = <?php echo json_encode($filter_data['attr'] ?? [], 15, 512) ?>;

  $('.filter-value-wrap li').click(function(event) {
    let [attr, val] = [$(this).data('attr'),$(this).data('attrval')];
    if ($(this).hasClass('delete-all')) {
      return deleteFilterAll();
    }

    filterAttr[attr].values[val].selected = false;
    filterProductData();
  });

  if ($('.filter-value-wrap li').length > 1) {
    $('.filter-value-wrap').removeClass('d-none')
  }

  $('.child-category').each(function(index, el) {
    if ($(this).hasClass('active')) {
      $(this).parent('ul').addClass('show').siblings('button').removeClass('collapsed')
      $(this).parents('li').addClass('active')
    }
  });

  $('.attr-value-check').change(function(event) {
    let [attr, val] = [$(this).data('attr'),$(this).data('attrval')];
    filterAttr[attr].values[val].selected = $(this).is(":checked");
    filterProductData();
  });

  $('.form-select, input[name="style_list"]').change(function(event) {
    filterProductData();
  });

  function filterProductData() {
    let url = bk.removeURLParameters(window.location.href, 'attr', 'price', 'sort', 'order');
    let [psMin, psMax, pMin, pMax] = [$('.price-select-min').val(), $('.price-select-max').val(), $('.price-min').val(), $('.price-max').val()];
    let order = $('.order-select').val();
    let perpage = $('.perpage-select').val();
    let styleList = $('input[name="style_list"]:checked').val();

    layer.load(2, {shade: [0.3,'#fff'] })

    if (filterAttrChecked(filterAttr)) {
      url = bk.updateQueryStringParameter(url, 'attr', filterAttrChecked(filterAttr));
    }

    if ((psMin != pMin) || (psMax != pMax)) {
      url = bk.updateQueryStringParameter(url, 'price', `${psMin}-${psMax}`);
    }

    if (order) {
      let orderKeys = order.split('|');
      url = bk.updateQueryStringParameter(url, 'sort', orderKeys[0]);
      url = bk.updateQueryStringParameter(url, 'order', orderKeys[1]);
    }

    if (perpage) {
      url = bk.updateQueryStringParameter(url, 'per_page', perpage);
    }

    if (styleList) {
     url = bk.updateQueryStringParameter(url, 'style_list', styleList);
    }

    location = url;
  }

  function filterAttrChecked(data) {
    let filterAtKey = [];
    data.forEach((item) => {
      let checkedAtValues = [];
      item.values.forEach((val) => val.selected ? checkedAtValues.push(val.id) : '')
      if (checkedAtValues.length) {
        filterAtKey.push(`${item.id}:${checkedAtValues.join(',')}`)
      }
    })

    return filterAtKey.join('|')
  }

  function deleteFilterAll() {
    let url = bk.removeURLParameters(window.location.href, 'attr', 'price');
    location = url;
  }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\workspace\shop-freelance\themes\default/category.blade.php ENDPATH**/ ?>