<?php


namespace Beike\Admin\Http\Controllers;

use Beike\Admin\Repositories\RegionRepo;
use Beike\Repositories\CountryRepo;
use Illuminate\Http\Request;

class RegionController
{
    public function index()
    {
        $data = [
            'regions'   => RegionRepo::getList(),
            'countries' => CountryRepo::all(),
        ];

        $data = hook_filter('admin.region.index.data', $data);

        return view('admin::pages.regions.index', $data);
    }

    public function store(Request $request)
    {
        $requestData = json_decode($request->getContent(), true);
        $region      = RegionRepo::createOrUpdate($requestData);

        return json_success(trans('common.created_success'), $region);
    }

    public function update(Request $request, int $regionId)
    {
        $requestData       = json_decode($request->getContent(), true);
        $requestData['id'] = $regionId;
        $region            = RegionRepo::createOrUpdate($requestData);

        return json_success(trans('common.updated_success'), $region);
    }

    public function destroy(Request $request, int $regionId)
    {
        RegionRepo::deleteById($regionId);

        return json_success(trans('common.deleted_success'));
    }
}
