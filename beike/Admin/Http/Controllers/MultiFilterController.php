<?php


namespace Beike\Admin\Http\Controllers;

use Beike\Admin\Repositories\AttributeRepo;
use Beike\Repositories\SettingRepo;
use Illuminate\Http\Request;

class MultiFilterController extends Controller
{
    public function index()
    {
        $multiFilter              = system_setting('base.multi_filter') ?: [];
        $multiFilter['attribute'] = $multiFilter['attribute'] ?? [];

        if ($attributeIds = $multiFilter['attribute'] ?? []) {
            $multiFilter['attribute'] = AttributeRepo::getByIds($attributeIds);
        }

        $data = [
            'multi_filter'    => $multiFilter,
        ];

        return view('admin::pages.multi_filter.index', $data);
    }

    public function store(Request $request)
    {
        $settings = $request->all();
        foreach ($settings as $key => $value) {
            SettingRepo::storeValue($key, $value);
        }

        return redirect(admin_route('multi_filter.index'))->with('success', trans('common.updated_success'));
    }
}
