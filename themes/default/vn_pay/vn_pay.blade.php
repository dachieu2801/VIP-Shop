<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông báo thanh toán thành công</title>
  <link rel="shortcut icon" href="{{ asset('/image/favicon.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      text-align: center;
      position: relative;
    }

    .payment-success, .payment-failure, .error-message {
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .payment-success h1 {
      color: green;
      margin-bottom: 20px;
    }

    .payment-failure h1 {
      color: red;
      margin-bottom: 20px;
    }

    .error-message h1 {
      color: #eded20;
      margin-bottom: 20px;
    }

    .payment-success p {
      margin-bottom: 30px;
      font-family: "Gucci Sans Pro", Helvetica, Arial, sans-serif;
      font-weight: 400;
      font-size: 16px;
    }

    .payment-failure p {
      font-family: "Gucci Sans Pro", Helvetica, Arial, sans-serif;
      font-weight: 400;
      font-size: 16px;
    }

    .continue-shopping {
      display: inline-block;
      background-color: #fb5631;
      color: #fff;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
      margin: 10px;
    }

    .continue-shopping:hover {
      background-color: #cf482a;
    }

    
    .auto-back-home {
      margin-top: 20px;
      font-size: 16px;
      color: #888;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .countdown {
      font-size: 24px;
      color: #007bff;
      margin: 0 5px;
    }
  </style>
</head>
<body>
<div class="container">
    @if($message === 'success')
    
    <div class="payment-success">
      <h1>Thanh toán Thành công <i class="fa-regular fa-circle-check fa-xl"></i> !</h1>
      <p>Cảm ơn bạn đã thanh toán đơn hàng của tôi. Đơn hàng của bạn sẽ được xử lý và giao hàng trong thời gian sớm nhất.</p>
      <a href="{{ shop_route('account.order.index', ['status' => 'paid']) }}" class="continue-shopping">Lịch sử giao dịch</a>
      <a href="{{ shop_route('home.index') }}" class="continue-shopping">Tiếp tục mua sắm</a>
      <div class="auto-back-home">
        <span>Sau</span>
        <span id="countdown" class="countdown"></span>
        <span>giây trang sẽ tự động quay về trang chủ.</span> 
      </div>
    </div>
    @elseif($message === 'fail')
    
    <div class="payment-failure">
      <h1>Thanh toán Thất bại <i class="fa-regular fa-circle-xmark fa-xl"></i> !</h1>
      <p>Thanh toán của bạn không thành công.</p>
      <p>Vui lòng thử lại hoặc liên hệ với chúng tôi để được hỗ trợ theo số điện thoại 0123456789.</p>
      <a href="{{ shop_route('account.order.index', ['status' => 'paid']) }}" class="continue-shopping">Lịch sử giao dịch</a>
      <a href="{{ shop_route('home.index') }}" class="continue-shopping">Quay lại trang chủ</a>
      <div class="auto-back-home">
        <span>Sau</span>
        <span id="countdown" class="countdown"></span>
        <span>giây trang sẽ tự động quay về trang chủ.</span> 
      </div>
    </div>
    @else
    
    <div class="error-message">
      <h1>Thông báo lỗi <i class="fa-solid fa-circle-exclamation"></i></h1>
      <p>Có lỗi xảy ra trong quá trình xử lý thanh toán. Vui lòng thử lại sau !.</p>
      <a href="{{ shop_route('account.order.index', ['status' => 'paid']) }}" class="continue-shopping">Lịch sử giao dịch</a>
      <a href="{{ shop_route('home.index') }}" class="continue-shopping">Quay lại trang chủ</a>
      <div class="auto-back-home">
        <span>Sau</span>
        <span id="countdown" class="countdown"></span>
        <span>giây trang sẽ tự động quay về trang chủ.</span> 
      </div>
    </div>
    @endif
  </div>

  <script>
    function countdown(seconds) {
      var countdownElement = document.getElementById('countdown');
      countdownElement.textContent = seconds;

      var countdownInterval = setInterval(function() {
        seconds--;
        countdownElement.textContent = seconds;
        if (seconds <= 0) {
          clearInterval(countdownInterval);
          window.location.href = "{{ shop_route('home.index') }}";
        }
      }, 1000);
    }

    countdown(30);
  </script>
</body>
</html>
