
<?php $__env->startSection('body-class', 'page-categories'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Nhập mã đơn hàng để kiểm tra</h1>
            <form id="orderTrackingForm" class="d-flex">
                <input type="text" class="form-control me-2" id="inputField" placeholder="Nhập mã đơn hàng" required>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div id="result" class="mt-4"></div>
        </div>
    </div>
</div>

<script>
document.getElementById('orderTrackingForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way
    const inputField = document.getElementById('inputField');
    const orderNumber = inputField.value;
    const baseUrl = '<?php echo e(config('app.url')); ?>';

    fetch(`${baseUrl}/order-tracking/${orderNumber}`)
        .then(response => response.json())
        .then(data => {
            renderResult(JSON.parse(data));
        })
        .catch(error => {
            console.error('Error fetching order data:', error);
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = `<div class="alert alert-danger" role="alert">There was an error fetching the order data.</div>`;
        });
});

function renderResult(data) {
    const resultDiv = document.getElementById('result');
    resultDiv.innerHTML = `
        <div class="card shadow rounded">
           <div class="card-body">
                <h5 class="card-title text-center">Order Number: ${data.number}</h5>
                <p class="card-text"><strong>Customer Name:</strong> ${data.customer_name}</p>
                <p class="card-text"><strong>Email:</strong> ${data.email}</p>
                <p class="card-text"><strong>Total:</strong> ${data.total_format}</p>
                <p class="card-text"><strong>Status:</strong> ${data.status_format}</p>
                <p class="card-text"><strong>Shipping Method:</strong> ${data.shipping_method_name}</p>
                <p class="card-text"><strong>Shipping Address:</strong> ${data.shipping_address_1}, ${data.shipping_city}, ${data.shipping_country}</p>
                <p class="card-text"><strong>Payment Method:</strong> ${data.payment_method_name}</p>
                <p class="card-text"><strong>Payment Address:</strong> ${data.payment_address_1}, ${data.payment_city}, ${data.payment_country}</p>
                <p class="card-text"><strong>Created At:</strong> ${data.created_at}</p>
            </div>
        </div>
    `;
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\team-free-lance\shop-freelance\themes\default/order_tracking.blade.php ENDPATH**/ ?>