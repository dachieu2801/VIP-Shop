<?php

namespace Beike\Repositories;

use Beike\Admin\Http\Resources\RmaReasonDetail;
use Beike\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

class SettingRepo
{
    public static function getGroupedSettings(): array
    {
        $settings = Setting::all(['type', 'space', 'name', 'value', 'json']);

        $result = [];
        foreach ($settings as $setting) {
            $type = $setting->type;
            if (! in_array($type, Setting::TYPES)) {
                continue;
            }

            $space = $setting->space;
            $name  = $setting->name;
            $value = $setting->value;
            if ($setting->json) {
                $result[$type][$space][$name] = json_decode($value, true);
            } else {
                $result[$type][$space][$name] = $value;
            }
        }

        return $result;
    }

    public static function getPluginStatusColumn(): array
    {
        return [
            'name'     => 'status',
            'label'    => trans('common.whether_open'),
            'type'     => 'bool',
            'required' => true,
        ];
    }

    public static function getPluginColumns($pluginCode)
    {
        return Setting::query()
            ->where('type', 'plugin')
            ->where('space', $pluginCode)
            ->get()
            ->keyBy('name');
    }

    public static function getValuePluginColumns($pluginCode, $name)
    {
        $setting = Setting::query()
            ->where('type', 'plugin')
            ->where('space', $pluginCode)
            ->where('name', $name)
            ->first();

        if ($setting) {
            $setting = $setting->jsonSerialize();

            return $setting['value'];
        }

        return null;
    }

    public static function getPluginStatus($pluginCode): bool
    {
        $status = plugin_setting("{$pluginCode}.status");

        return (bool) $status;
    }

    public static function update($type, $code, $fields)
    {
        $columns = array_keys($fields);
        Setting::query()
            ->where('type', $type)
            ->where('space', $code)
            ->whereIn('name', $columns)
            ->delete();

        $rows = [];
        foreach ($fields as $name => $value) {
            if (in_array($name, ['_method', '_token'])) {
                continue;
            }
            $rows[] = [
                'type'       => $type,
                'space'      => $code,
                'name'       => $name,
                'value'      => is_array($value) ? json_encode($value) : (string) $value,
                'json'       => is_array($value),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        Setting::query()->insert($rows);
        self::clearCache();
    }

    public static function storeValue($name, $value, string $space = 'base', string $type = 'system')
    {
        if (in_array($name, ['_method', '_token'])) {
            return;
        }

        $setting = Setting::query()
            ->where('type', $type)
            ->where('space', $space)
            ->where('name', $name)
            ->first();

        $settingData = [
            'type'  => $type,
            'space' => $space,
            'name'  => $name,
            'value' => is_array($value) ? json_encode($value) : $value,
            'json'  => is_array($value),
        ];

        if (empty($setting)) {
            $setting = new Setting($settingData);
            $setting->saveOrFail();
        } else {
            $setting->update($settingData);
        }
        self::clearCache();
    }
    public static function getSystemValue($name)
    {
        return Setting::query()
            ->where('type', 'system')
            ->where('space', 'base')
            ->where('name', $name)
            ->first();

    }

    public static function getMobileSetting()
    {
        $rmaReasonList = RmaReasonRepo::list();
        $rmaReasons    = RmaReasonDetail::collection($rmaReasonList)->jsonSerialize();

        return [
            'system' => [
                'country_id'             => system_setting('base.country_id'),
                'zone_id'                => system_setting('base.zone_id'),
                'currency'               => system_setting('base.currency'),
                'locale'                 => system_setting('base.locale'),
                'guest_checkout'         => system_setting('base.guest_checkout'),
                'show_price_after_login' => system_setting('base.show_price_after_login'),
            ],
            'rma_statuses' => RmaRepo::getStatuses(),
            'rma_types'    => RmaRepo::getTypes(),
            'rma_reasons'  => $rmaReasons,
            'locales'      => locales(),
            'currencies'   => currencies(),
        ];
    }

    public static function clearCache()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
    }
}
