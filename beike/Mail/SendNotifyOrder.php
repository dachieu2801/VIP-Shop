<?php

namespace Beike\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotifyOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        $orderId      = $this->details['tracking_number'];
        $orderDate    = $this->details['order_at'];
        $totalAmount  = $this->details['amount'];
        $customerName = $this->details['customer_name'];

        if ($this->details['isShop']) {
            return $this->subject('Đăt Hàng Thành Công')
                ->html("
                       <!DOCTYPE html>
            <html lang='en'>
              <head>
                <meta charset='UTF-8' />
                <meta name='viewport' content='width=device-width, initial-scale=1.0' />
                <title>Thông báo đặt đơn hàng thành công</title>
                <style>
                  body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                  }

                  .email-container {
                    background-color: #ffffff;
                    margin: 20px auto;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    max-width: 600px;
                  }

                  .header {
                    text-align: center;
                    padding: 20px;
                    background-color: #fd560f;
                    color: #ffffff;
                    border-radius: 8px 8px 0 0;
                  }

                  .header h1 {
                    margin: 0;
                  }

                  .content {
                    padding: 20px;
                  }

                  .content p {
                    line-height: 1.6;
                    margin-bottom: 20px;
                  }

                  .order-details {
                    border: 1px solid #e4e4e4;
                    padding: 10px;
                    border-radius: 8px;
                    background-color: #f9f9f9;
                  }

                  .order-details h2 {
                    margin: 0 0 10px 0;
                    font-size: 18px;
                    color: #333333;
                  }

                  .order-details p {
                    margin: 5px 0;
                    font-size: 16px;
                    color: #555555;
                  }

                  .footer {
                    text-align: center;
                    padding: 20px;
                    background-color: #f4f4f4;
                    border-radius: 0 0 8px 8px;
                    font-size: 14px;
                    color: #999999;
                  }

                  .footer p {
                    margin: 5px 0;
                  }

                  .footer a {
                    color: #fd560f;
                    text-decoration: none;
                  }
                </style>
              </head>

              <body>
                <div class='email-container'>
                  <div class='header'>
                    <h1>Cảm ơn bạn đã đặt hàng!</h1>
                  </div>
                  <div class='content'>
                    <p>Chào $customerName,</p>
                    <p>
                      Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi. Chúng tôi rất vui
                      mừng thông báo rằng đơn hàng của bạn đã được đặt thành công.
                    </p>

                    <div class='order-details'>
                      <h2>Chi tiết đơn hàng</h2>
                      <p>Mã đơn hàng: $orderId </p>
                      <p>Ngày đặt: $orderDate </p>
                      <p>Tổng giá trị: $totalAmount </p>
                    </div>

                    <p>
                      Bạn có thể theo dõi tình trạng đơn hàng của mình trong tài khoản của
                      bạn.
                    </p>
                    <p>
                      Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với đội ngũ hỗ trợ của
                      chúng tôi.
                    </p>
                  </div>
                  <div class='footer'>
                    <p>&copy; 2024 Cửa hàng của chúng tôi</p>
                    <p>Đơn hàng này được gửi từ hệ thống tự động. Vui lòng không trả lời email này.</p>
                  </div>
                </div>
              </body>
            </html>
             ");
        }  else{
            return $this->subject('Có Đơn Hàng Mới')
                ->html("
                     <!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Thông báo đơn hàng mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .header {
            text-align: center;
            padding: 20px;
            background-color: #fd560f;
            color: #ffffff;
            border-radius: 8px 8px 0 0;
        }

        .header h1 {
            margin: 0;
        }

        .content {
            padding: 20px;
        }

        .content p {
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .order-details {
            border: 1px solid #e4e4e4;
            padding: 10px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .order-details h2 {
            margin: 0 0 10px 0;
            font-size: 18px;
            color: #333333;
        }

        .order-details p {
            margin: 5px 0;
            font-size: 16px;
            color: #555555;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-details th, .order-details td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 0 0 8px 8px;
            font-size: 14px;
            color: #999999;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class='email-container'>
        <div class='header'>
            <h1>Có đơn hàng mới</h1>
        </div>
        <div class='content'>
            <p>Bạn vừa nhận được một đơn hàng mới từ $customerName.</p>

            <div class='order-details'>
                <h2>Chi tiết đơn hàng</h2>
                <p>Mã đơn hàng: $orderId</p>
                <p>Ngày đặt: $orderDate</p>
                <p>Tổng giá trị: $totalAmount</p>
            </div>
            <p>Vui lòng xử lý đơn hàng này sớm nhất có thể để đảm bảo sự hài lòng của khách hàng.</p>
        </div>
        <div class='footer'>
            <p>&copy; 2024 Hệ thống quản lý đơn hàng của bạn</p>
            <p>Đơn hàng này được gửi từ hệ thống tự động. Vui lòng không trả lời email này.</p>
        </div>
    </div>
</body>

</html>
             ");
        }

    }
}
