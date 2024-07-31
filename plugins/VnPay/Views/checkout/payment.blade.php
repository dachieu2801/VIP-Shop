
  <div class="text-center">
    <button id="button-vn-pay"
            style="
             width: 300px;
             height: 40px;
             font-size: 1rem;
             color: #fff;
             border: none;
             background-color: #ee4d2d;
             margin-top: 2rem;
             border-radius: 5px;
            "
    >
      {{__('VnPay::setting.button_text')}}
    </button>
  </div>
  <div id="content-vn_pay"></div>
{{--</div>--}}

<script>
  let data = {
    orderNumber: "{{$order->number}}",
    orderId: "{{$order->id}}",
    amount: "{{ $order['total'] }}",
    }
  $(document).ready(function(){
    $('#button-vn-pay').click(function(){

      const token = $('meta[name="csrf-token"]').attr('content')
      fetch('/vn-pay/create', {
        method: 'POST',
        headers: {
          'X-CSRF-Token': token,
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      }).then(function (res) {
        console.log(res)
        return res.json(); // Sử dụng phương thức json() để phân tích cú pháp dữ liệu JSON
      }).then(function (data) {
        console.log(data.url)
        window.location.href = (data.url)
      });
    });
  });

</script>











