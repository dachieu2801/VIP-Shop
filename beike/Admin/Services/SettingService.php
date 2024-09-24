<?php


namespace Beike\Admin\Services;

use Beike\Repositories\CurrencyRepo;
use Beike\Repositories\SettingRepo;
use Exception;

class SettingService
{
    /**
     * 保存系统设置
     * @param $settings
     * @return void
     * @throws \Throwable
     */
    public static function storeSettings($settings)
    {
        if (isset($settings['currency'])) {
            $currency = CurrencyRepo::findByCode($settings['currency']);
            if ($currency->value != 1) {
                throw new Exception('Tỷ giá hối đoái mặc định phải là 1');
            }
        }
        foreach ($settings as $key => $value) {
            SettingRepo::storeValue($key, $value);
        }
    }
}
