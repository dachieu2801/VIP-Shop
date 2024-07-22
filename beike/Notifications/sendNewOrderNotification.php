<?php

namespace Beike\Notifications;

use Illuminate\Support\Facades\Http;

class sendNewOrderNotification
{
    public static function handleSendOrder($data, $endpoint)
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'secret'       => 'tomiruHaDong',
                'clientid'     => 'hieu-dev.com',
            ])->post(env('API_SENDMAIL') . $endpoint, ['content' => $data]);
            \Log::debug('Response email: ' . $response);

            $statusCode = $response->status();
            if ($statusCode != 200) {
                \Log::error('Call to serve mail has Error: '. $response->body());
                return false;
            }
            \Log::debug('Call to serve mail success: ' . $response->body());

            return true;
        } catch (\Exception $e) {
            \Log::error('Error sending email: ' . $e->getMessage());
            return false;
        }

    }
}
