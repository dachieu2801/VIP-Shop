<?php


namespace Beike\AdminAPI\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AdminAPIServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (is_installer()) {
            return;
        }
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->registerGuard();
    }

    /**
     * 注册后台用户 guard
     */
    protected function registerGuard(): void
    {
        Config::set('auth.guards.api_customer', [
            'driver'   => 'jwt',
            'provider' => 'shop_customer',
        ]);
    }
}
