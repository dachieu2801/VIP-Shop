<?php
/**
 * shop.php
 *

 * @created    2022-08-04 16:17:44
 * @modified   2022-08-04 16:17:44
 */

use Illuminate\Support\Facades\Route;
use Plugin\LatestProducts\Controllers\MenusController;

Route::get('/latest_products', [MenusController::class, 'latestProducts'])->name('latest_products');
