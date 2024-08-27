#  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; hệ thống thương mại điện tử 

## VIPShop
VIPShop là một hệ thống cửa hàng trực tuyến mã nguồn mở được phát triển dựa trên Laravel. 
Hệ thống này được thiết kế để phục vụ cho thương mại điện tử. VIPShop cung cấp nhiều chức năng hữu ích như quản lý sản phẩm, quản lý đơn hàng, quản lý thành viên, quản lý thanh toán, vận chuyển, và quản lý hệ thống
<br>


## Kiến trúc phần mềm
1. Require: PHP >= 8.1
2. Framwork: Laravel 10
3. view: Blade + Vue
4. DB: MySQL

## PHP ini
- BCMath PHP Extension
- Ctype PHP Extension
- cURL PHP Extension
- DOM PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension


## Hướng dẫn cài đặt

1.  `composer update` hoặc `composer update --ignore-platform-reqs`
2. Tạo file `.env` với nội dung ở trong file `.env.example`
3. `npm install`（cài đặt node 16+）,`npm run prod` biên dịch các tệp JavaScript và CSS
4. Đặt `public` trong thư mục dự án vào thư mục gốc của trang web
5. Truy cập trang web thông qua trình duyệt của bạn và làm theo lời nhắc để hoàn tất cài đặt.


## Hướng dẫn chạy ở local

1. Chạy lênh `php artisan serve` nếu sử dụng mySQL serve là DB
2. Nếu sử dụng xampp làm DB thì mở xampp rồi `start` mysql trong xampp rồi chạy lệnh `php artisan serve` ở terminal của dự án
