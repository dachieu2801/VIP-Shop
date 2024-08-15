<?php if($paginator->hasPages()): ?>
  <?php if(is_mobile()): ?>
    <div class="mobile-paginator">
      <a class="btn bg-white <?php echo e(!$paginator->previousPageUrl() ? 'disabled' : ''); ?>" href="<?php echo e($paginator->previousPageUrl() ?? 'javascript:void(0)'); ?>"><i class="bi bi-chevron-left"></i> <?php echo app('translator')->get('pagination.previous'); ?></a>
      <div class="input-group">
        <input type="text" class="form-control" id="mb-page-input" onkeyup="this.value=this.value.replace(/\D/g,'')" value="<?php echo e($paginator->currentPage()); ?>">
        <span class="input-group-text"><?php echo e($paginator->lastPage()); ?></span>
      </div>
      <a class="btn bg-white <?php echo e(!$paginator->nextPageUrl() ? 'disabled' : ''); ?>" href="<?php echo e($paginator->nextPageUrl() ?? 'javascript:void(0)'); ?>"><?php echo app('translator')->get('pagination.next'); ?> <i class="bi bi-chevron-right"></i></a>
    </div>

    <script>
      $('#mb-page-input').on('change', function() {
        let page = $(this).val();
        let lastPage = <?php echo json_encode($paginator->lastPage(), 15, 512) ?>;
        let url = <?php echo json_encode($paginator->url(0), 15, 512) ?>;
        url = url.replace(/&amp;/g, '&');
        if (page > lastPage) {
          $(this).val(lastPage);
          page = lastPage;
        }

        if (page) {
          url = bk.updateQueryStringParameter(url, 'page', page)
          window.location.href = url;
        }
      })
    </script>
  <?php else: ?>
    <nav class="d-flex justify-content-center">
      <ul class="pagination">
        
        <?php if($paginator->onFirstPage()): ?>
        <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
          <span class="page-link" aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
        </li>
        <?php else: ?>
        <li class="page-item">
          <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>"><i class="bi bi-chevron-left"></i></a>
        </li>
        <?php endif; ?>
        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php if(is_string($element)): ?>
        <li class="page-item disabled" aria-disabled="true"><span class="page-link"><?php echo e($element); ?></span></li>
        <?php endif; ?>
        
        <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($page == $paginator->currentPage()): ?>
        <li class="page-item active" aria-current="page"><span class="page-link"><?php echo e($page); ?></span></li>
        <?php else: ?>
        <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($paginator->hasMorePages()): ?>
        <li class="page-item">
          <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>"><i class="bi bi-chevron-right"></i></a>
        </li>
        <?php else: ?>
        <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
          <span class="page-link" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
  <?php endif; ?>
<?php endif; ?>
<?php /**PATH G:\workspace\shop-freelance\themes\default/shared/pagination/bootstrap-4.blade.php ENDPATH**/ ?>