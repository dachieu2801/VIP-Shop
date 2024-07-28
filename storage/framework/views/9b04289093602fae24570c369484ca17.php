
<div>
  <p style="font-size: 1rem;" class="mt-2 mb-3">Internet Banking</p>
  <div class="d-flex">
    <p class="me-2" style="width: 20px;
    height: 20px;
    background: #ccc;
    text-align: center;
    border-radius: 50%;">1</p>
    <p style="width: 100%;"><?php echo e(__('BankTransfer::setting.step1')); ?></p>
  </div>
  <div class="d-flex" style="margin-bottom: 1rem">
    <p class="me-2" style="width: 20px;
    height: 20px;
    background: #ccc;
    text-align: center;
    border-radius: 50%;">2</p>
   <div  style="width: 100%;">
      <p><?php echo e(__('BankTransfer::setting.step2')); ?></p>
      <div style="margin-bottom:4px"><strong><?php echo e(__('BankTransfer::setting.bank_name')); ?>: </strong><span> <?php echo e($payment_setting['bank_name']); ?></span></div>
      <div style="margin-bottom:4px"><strong><?php echo e(__('BankTransfer::setting.account_no')); ?>: </strong><span> <?php echo e($payment_setting['account_number']); ?></span></div>
      <div style="margin-bottom:4px"><strong><?php echo e(__('BankTransfer::setting.account_name')); ?>: </strong><span> <?php echo e($payment_setting['account_holder_name']); ?></span></div>
      <div style="margin-bottom:4px"><strong><?php echo e(__('BankTransfer::setting.amount')); ?>: </strong><span> <?php echo e($order['total_format']); ?></span></div>
      <div style="margin-bottom:4px"><strong><?php echo e(__('BankTransfer::setting.content')); ?>: </strong><span> <?php echo e($order['number']); ?></span></div>
    </div>
  </div>
  <div class="d-flex">
    <div class="me-2"
         style="
       width: 20px;
       height: 20px;
       background: #ccc;
       text-align: center;
       border-radius: 50%;
      ">3</div>
    <div  style="width: 100%;">
      <div style="margin-bottom:4px;"><?php echo e(__('BankTransfer::setting.step3')); ?></div>
      <p><?php echo e(__('BankTransfer::setting.step3_detail')); ?></p>
    </div>
  </div>
  <div class="text-center">
    <button id="button-internet-banking"
            style="
             width: 300px;
             height: 40px;
             font-size: 1rem;
             color: #fff;
             border: none;
             background-color: #ee4d2d;
             margin-top: 2rem;
            "
    >
      <?php echo e(__('BankTransfer::setting.button_text')); ?>

    </button>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#button-internet-banking').click(function(){
      window.location.href = '/account/orders';
    });
  });
</script>
<?php /**PATH D:\team-free-lance\shop-freelance\plugins/BankTransfer/Views/checkout/payment.blade.php ENDPATH**/ ?>