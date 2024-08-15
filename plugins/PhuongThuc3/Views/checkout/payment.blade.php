
<div>
  <div class="d-flex">
    <p class="me-2" style="width: 20px;
    height: 20px;
    background: #ccc;
    text-align: center;
    border-radius: 50%;">1</p>
    <p style="width: 100%;">{{ $payment_setting['step_1'] }}</p>
  </div>
  <div class="d-flex" style="margin-bottom: 1rem">
    <p class="me-2" style="width: 20px;
    height: 20px;
    background: #ccc;
    text-align: center;
    border-radius: 50%;">2</p>
    <div  style="width: 100%;">
      <p>{{ $payment_setting['step_2'] }}</p>
      <div style="margin-bottom:4px"><strong> {{ $payment_setting['label_bank_name'] }}: </strong><span> {{ $payment_setting['bank_name'] }}</span></div>
      <div style="margin-bottom:4px"><strong>{{ $payment_setting['label_account_number'] }}: </strong><span> {{ $payment_setting['account_number'] }}</span></div>
      <div style="margin-bottom:4px"><strong> {{ $payment_setting['label_account_holder_name'] }}: </strong><span> {{ $payment_setting['account_holder_name'] }}</span></div>
      <div style="margin-bottom:4px"><strong>{{ $payment_setting['label_amount'] }}: </strong><span> {{ $order['total_format'] }}</span></div>
      <div style="margin-bottom:4px"><strong>{{ $payment_setting['label_number'] }}: </strong><span> {{ $order['number'] }}</span></div>
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
      <p>{{ $payment_setting['step_3'] }}</p>
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
      {{__('BankTransfer::setting.button_text')}}
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
