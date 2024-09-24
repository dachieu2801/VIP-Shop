<?php
/**
 * VNPayService.php
 *

 * @created    2023-08-22 11:49:51
 * @modified   2023-08-22 11:49:51
 */

namespace Plugin\VnPay\Services;

use Beike\Shop\Services\PaymentService;
use GuzzleHttp\Client;

class VNPayService extends PaymentService
{
    protected $client;

    protected $apiKey;

    protected $apiSecret;

    protected $merchantId;

    protected $baseUri;

    public function __construct()
    {
        $this->client     = new Client;
        $this->apiKey     = env('PAYPAY_API_KEY');
        $this->apiSecret  = env('PAYPAY_API_SECRET');
        $this->merchantId = env('PAYPAY_MERCHANT_ID');
        $this->baseUri    = env('PAYPAY_BASE_URI', 'https://api.paypay.ne.jp');
    }

    public function createPayment($amount, $userId, $orderId)
    {
        $url       = $this->baseUri . '/v2/payments';
        $timestamp = time();

        $body = [
            'merchantPaymentId' => $orderId,
            'amount'            => [
                'amount'   => $amount,
                'currency' => 'JPY',
            ],
            'userAuthorizationId' => $userId,
            'requestedAt'         => $timestamp,
            'redirectUrl'         => env('APP_URL') . '/vn-pay/capture',
            'redirectType'        => 'WEB_LINK',
        ];

        $headers = [
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type'  => 'application/json',
            'X-API-KEY'     => $this->apiSecret,
        ];

        $response = $this->client->post($url, [
            'headers' => $headers,
            'json'    => $body,
        ]);

        return json_decode($response->getBody(), true);
    }

    //    public function createOrder(): mixed
    //    {
    //        $this->initPaypal();
    //        $order = $this->order;
    //        $total = round($order->total, 2);
    //
    //        return $this->paypalClient->createOrder([
    //            'intent'         => 'CAPTURE',
    //            'purchase_units' => [
    //                [
    //                    'amount' => [
    //                        'currency_code' => $order->currency_code,
    //                        'value'         => $total,
    //                    ],
    //                    'description' => 'test',
    //                ],
    //            ],
    //        ]);
    //    }
}
