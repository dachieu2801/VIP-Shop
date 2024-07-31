<?php
/**
 * shop.php
 *
 * @copyright  2022 beikeshop.com - All Rights Reserved
 * @link       https://beikeshop.com
 * @author     Edward Yang <yangjin@guangda.work>
 * @created    2022-08-12 10:33:13
 * @modified   2022-08-12 10:33:13
 */

use Illuminate\Support\Facades\Route;
use Plugin\VNPay\Controllers\VNPayController;

//
Route::group(['prefix' => 'vn-pay'], function () {
    Route::post('/create', [VNPayController::class, 'create']);
});
Route::get('vn-pay/capture', [VNPayController::class, 'capture']);
