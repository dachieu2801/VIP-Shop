
<?php $__env->startSection('body-class', 'page-categories'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Nhập mã đơn hàng để kiểm tra</h1>
            <form class="d-flex">
                <input type="text" class="form-control me-2" id="inputField" placeholder="Nhập mã đơn hàng">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\team-free-lance\shop-freelance\themes\default/order_tracking.blade.php ENDPATH**/ ?>