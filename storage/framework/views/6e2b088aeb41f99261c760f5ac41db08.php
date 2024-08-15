<div class="product-tool d-flex justify-content-between flex-column flex-md-row gap-3 align-items-center mt-2 mb-lg-4 mb-2">
  <?php if(!is_mobile()): ?>
    <div class="style-wrap d-flex align-items-center">
      <label class="<?php echo e(!request('style_list') || request('style_list') == 'grid' ? 'active' : ''); ?> grid"
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="<?php echo e(__('common.text_grid')); ?>"
        >
        <svg viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><rect width="5" height="5"></rect><rect x="7" width="5" height="5"></rect><rect x="14" width="5" height="5"></rect><rect y="7" width="5" height="5"></rect><rect x="7" y="7" width="5" height="5"></rect><rect x="14" y="7" width="5" height="5"></rect><rect y="14" width="5" height="5"></rect><rect x="7" y="14" width="5" height="5"></rect><rect x="14" y="14" width="5" height="5"></rect></svg>
        <input class="d-none" value="grid" type="radio" name="style_list">
      </label>
      <label class="ms-1 <?php echo e(request('style_list') == 'list' ? 'active' : ''); ?> list"
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="<?php echo e(__('common.text_list')); ?>"
        >
        <svg viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><rect width="5" height="5"></rect><rect x="7" height="5" width="12"></rect><rect y="7" width="5" height="5"></rect><rect x="7" y="7" height="5" width="12"></rect><rect y="14" width="5" height="5"></rect><rect x="7" y="14" height="5" width="12"></rect></svg>
        <input class="d-none" value="list" type="radio" name="style_list">
      </label>
    </div>
  <?php endif; ?>
  <div class="d-flex align-items-center right-per-page flex-column-reverse flex-md-row gap-3">
    <div class="text-nowrap text-secondary">
      <?php echo e(__('common.showing_page', ['per_page' => request('per_page'), 'total' => $products->total()])); ?>

    </div>

    <div class="d-flex align-items-center">
      <select class="form-select perpage-select ms-3">
        <?php $__currentLoopData = $per_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($val); ?>" <?php echo e(request('per_page') == $val ? 'selected' : ''); ?>><?php echo e($val); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>

      <select class="form-select order-select ms-2">
        <option value=""><?php echo e(__('common.default')); ?></option>
        <option value="products.sales|asc" <?php echo e(request('sort') == 'products.sales' && request('order') == 'asc' ? 'selected' : ''); ?>><?php echo e(__('common.sales')); ?> (<?php echo e(__('common.low') . '-' . __('common.high')); ?>)</option>
        <option value="products.sales|desc" <?php echo e(request('sort') == 'products.sales' && request('order') == 'desc' ? 'selected' : ''); ?>><?php echo e(__('common.sales')); ?> (<?php echo e(__('common.high') . '-' . __('common.low')); ?>)</option>
        <option value="pd.name|asc" <?php echo e(request('sort') == 'pd.name' && request('order') == 'asc' ? 'selected' : ''); ?>><?php echo e(__('common.name')); ?> (A - Z)</option>
        <option value="pd.name|desc" <?php echo e(request('sort') == 'pd.name' && request('order') == 'desc' ? 'selected' : ''); ?>><?php echo e(__('common.name')); ?> (Z - A)</option>
        <option value="product_skus.price|asc" <?php echo e(request('sort') == 'product_skus.price' && request('order') == 'asc' ? 'selected' : ''); ?>><?php echo e(__('product.price')); ?> (<?php echo e(__('common.low') . '-' . __('common.high')); ?>)</option>
        <option value="product_skus.price|desc" <?php echo e(request('sort') == 'product_skus.price' && request('order') == 'desc' ? 'selected' : ''); ?>><?php echo e(__('product.price')); ?> (<?php echo e(__('common.high') . '-' . __('common.low')); ?>)</option>
      </select>
    </div>
  </div>
</div>
<?php /**PATH G:\workspace\shop-freelance\themes\default/shared/filter_bar_block.blade.php ENDPATH**/ ?>