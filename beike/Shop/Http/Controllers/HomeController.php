<?php

namespace Beike\Shop\Http\Controllers;

use Beike\Models\Product;
use Beike\Repositories\CategoryRepo;
use Beike\Services\DesignService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * 通过page builder 显示首页
     *
     * @return View
     * @throws \Exception
     */
    public function index(): View
    {
        $designSettings = system_setting('base.design_setting');
        $modules        = $designSettings['modules'] ?? [];

        $moduleItems = [];
        foreach ($modules as $module) {
            $code       = $module['code'];
            $moduleId   = $module['module_id'] ?? '';
            $content    = $module['content'];
            $viewPath   = $module['view_path'] ?? '';

            if (empty($viewPath)) {
                $viewPath = "design.{$code}";
            }

            $paths = explode('::', $viewPath);
            if (count($paths) == 2) {
                $pluginCode = $paths[0];
                if (! app('plugin')->checkActive($pluginCode)) {
                    continue;
                }
            }

            if (view()->exists($viewPath) && $moduleId) {
                $moduleItems[] = [
                    'code'      => $code,
                    'module_id' => $moduleId,
                    'view_path' => $viewPath,
                    'content'   => DesignService::handleModuleContent($code, $content),
                ];
            }
        }

        $data = ['modules' => $moduleItems];

        $data = hook_filter('home.index.data', $data);

        $categories = CategoryRepo::getAdminList()->jsonSerialize();

        $filteredCategories = [];

        foreach ($categories as &$category) {
            // Lấy ID của danh mục cha và các danh mục con
            $categoryIds = array_merge(
                [$category['id']],
                array_column($category['children'], 'id')
            );

            // Lấy 8 sản phẩm có position lớn nhất và sắp xếp từ mới đến cũ cho danh mục cha và các danh mục con của nó
            $categoryProducts = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
                ->whereIn('product_categories.category_id', $categoryIds)
                ->orderBy('products.position', 'desc')
                ->orderBy('products.created_at', 'desc')
                ->select('products.*')
                ->take(8)
                ->get();

            $category['products'] = $categoryProducts->jsonSerialize();

            $filteredChildren = [];

            foreach ($category['children'] as &$childCategory) {
                $childProducts = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
                    ->where('product_categories.category_id', $childCategory['id'])
                    ->orderBy('products.position', 'desc')
                    ->orderBy('products.created_at', 'desc')
                    ->select('products.*')
                    ->take(8)
                    ->get();

                if ($childProducts->isNotEmpty()) {
                    $childCategory['products'] = $childProducts->jsonSerialize();
                    $filteredChildren[]        = $childCategory;
                }
            }

            $category['children'] = $filteredChildren;

            if ($categoryProducts->isNotEmpty() || ! empty($filteredChildren)) {
                $filteredCategories[] = $category;
            }

        }
        Log::info('product', ['asd' => $filteredCategories]);


        return view('home', ['data'=>$data,'filteredCategories'=> $filteredCategories]);
    }
}
