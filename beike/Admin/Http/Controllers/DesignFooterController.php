<?php

namespace Beike\Admin\Http\Controllers;

use Beike\Repositories\CategoryRepo;
use Beike\Repositories\FooterRepo;
use Beike\Repositories\SettingRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class DesignFooterController extends Controller
{
    /**
     * 展示所有模块编辑器
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $data = [
            'design_settings' => system_setting('base.footer_setting'),
            //            'all_categories'  => CategoryRepo::getTwoLevelCategories(),
        ];
        $data = hook_filter('admin.design_footer.index.data', $data);

        //        Log::log('info', 'VNPayController capture', ['$inputData' => $data]);

        return view('admin::pages.design.builder.footer', $data);
    }

    /**
     * 预览模块显示结果
     *
     * @param Request $request
     * @return View
     * @throws \Exception
     */
    public function preview(Request $request): View
    {
        $content  = json_decode($request->getContent(), true);
        $viewPath = 'layout.footer';

        $viewData = [
            'view_path'       => $viewPath,
            'footer_content'  => FooterRepo::handleFooterData($content),
            'design'          => (bool) $request->get('design'),
            'all_categories'  => CategoryRepo::getTwoLevelCategories(),
        ];
        $viewData = hook_filter('admin.design_footer.index.data', $viewData);
        Log::log('info', 'VNPayController capture', ['$inputData' => $viewData]);

        return view($viewPath, $viewData);
    }

    /**
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function update(Request $request): JsonResponse
    {
        $content = json_decode($request->getContent(), true);

        SettingRepo::storeValue('footer_setting', $content);

        return json_success(trans('common.updated_success'));
    }
}
