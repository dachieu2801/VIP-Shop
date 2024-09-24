<?php
/**
 * shop.php
 *

 * @created    2022-09-30 18:52:54
 * @modified   2022-09-30 18:52:54
 */

use Illuminate\Support\Facades\Route;
use Plugin\Social\Controllers\ShopSocialController;

Route::get('/social/redirect/{provider}', [ShopSocialController::class, 'redirect'])->name('social.redirect');
Route::get('/social/callbacks/{provider}', [ShopSocialController::class, 'callback'])->name('social.callback');
