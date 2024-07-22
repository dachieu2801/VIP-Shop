<?php
/**
 * BankTransferController.php
 *
 * @copyright  2022 beikeshop.com - All Rights Reserved
 * @link       https://beikeshop.com
 * @author     Edward Yang <yangjin@guangda.work>
 * @created    2022-08-10 18:57:56
 * @modified   2022-08-10 18:57:56
 *
 * https://www.zongscan.com/demo333/1311.html
 * https://clickysoft.com/how-to-integrate-paypal-payment-gateway-in-laravel/
 * https://www.positronx.io/how-to-integrate-paypal-payment-gateway-in-laravel/
 */

namespace Plugin\Cod\Controllers;

use Beike\Repositories\OrderPaymentRepo;
use Beike\Repositories\OrderRepo;
use Beike\Services\StateMachineService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Plugin\Paypal\Services\PaypalService;
use Srmklive\PayPal\Services\PayPal;

class CODControllers
{

}
