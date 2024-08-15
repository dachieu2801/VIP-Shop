<?php

namespace Beike\Shop\Http\Controllers;

use Beike\Models\CustomerWishlist;
use Beike\Models\Product;
use Beike\Repositories\CategoryRepo;
use Beike\Services\DesignService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
            $code     = $module['code'];
            $moduleId = $module['module_id'] ?? '';
            $content  = $module['content'];
            $viewPath = $module['view_path'] ?? '';

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

        $categories = CategoryRepo::getAdminList()->jsonSerialize();

        //danh mục
        $cate = [
            'code'      => 'icons',
            'module_id' => 'Lasd2131234223iaGC9madadsadadanz1',
            'view_path' => 'design.icons',
            'content'   => [
                'style' => [
                    'background_color' => '',
                ],
                'title' => 'Danh mục',
                'floor' => [
                    'zh_cn' => '',
                    'en'    => '',
                ],
                'images'      => [],
                'module_code' => 'icons',
            ],
        ];
        foreach ($categories as $a) {
            $cate['content']['images'][] = [
                'image' => $a['image'] ? url($a['image']) : '' ,
                'link'  => [
                    'type'  => 'category',
                    'value' => $a['id'],
                    'link'  => '',
                ],
                'text'     => $a['description']['name'],
                'sub_text' => '',
                'url'      => url('/categories/' . $a['id']),
            ];
        }
        $moduleItems[] = $cate;

        $filteredCategories = [];

        foreach ($categories as $category) {
            // Lấy ID của danh mục cha và các danh mục con
            $categoryIds = array_merge(
                [$category['id']],
                array_column($category['children'], 'id')
            );
            $categoryProducts = Product::with(['descriptions', 'skus'])
                ->join('product_categories', 'products.id', '=', 'product_categories.product_id')
                ->whereIn('product_categories.category_id', $categoryIds)
                ->orderBy('products.position', 'desc')
                ->orderBy('products.created_at', 'desc')
                ->distinct()
                ->get();

            $category['products'] = $categoryProducts->jsonSerialize();

            $filteredChildren = [];

            foreach ($category['children'] as $childCategory) {
                $childProducts = Product::with(['descriptions', 'skus'])
                    ->join('product_categories', 'products.id', '=', 'product_categories.product_id')
                    ->where('product_categories.category_id', $childCategory['id'])
                    ->orderBy('products.position', 'desc')
                    ->orderBy('products.created_at', 'desc')
                    ->distinct()
                    ->get();

                if ($childProducts->isNotEmpty()) {
                    $childCategory['products'] = $childProducts;
                    $filteredChildren[]        = $childCategory;
                }
            }

            $category['children'] = $filteredChildren;

            if ($categoryProducts->isNotEmpty() || ! empty($filteredChildren)) {
                $filteredCategories[] = $category;
            }

        }

        //cho sản phẩm theo danh mục
        foreach ($filteredCategories as $a) {
            $module = [
                'code'      => 'tab_product',
                'module_id' => Str::random(12),
                'view_path' => 'design.tab_product',
                'content'   => [
                    'style' => [
                        'background_color' => '',
                    ],
                    'editableTabsValue' => '0',
                    'floor'             => [
                        'zh_cn' => '',
                    ],
                    'title'       => $a['description']['name'],
                    'module_code' => 'tab_product',
                    'tabs'        => [],
                ],
                'url'      => url('/categories/' . $a['id']),
            ];
            $module['content']['tabs'][] = [
                'title'    => 'Tất cả',
                'products' => [],
            ];
            $maxProducts = 8;
            $count = 0;

            foreach ($a['products'] as $product) {
                if ($count >= $maxProducts) {
                    break; // Dừng vòng lặp khi đã đạt số lượng tối đa
                }

                if (!empty($product['skus'])) {
                    $countWishlist = CustomerWishlist::where('product_id', $product['id'])->count();

                    $module['content']['tabs'][0]['products'][] = [
                        'id'                   => $product['id'],
                        'sku_id'               => $product['skus'][0]['id'] ?? null,
                        'name'                 => $product['descriptions'][0]['name'] ?? null,
                        'name_format'          => $product['descriptions'][0]['name'] ?? null,
                        'url'                  => url('/products/' . $product['id']),
                        'price'                => $product['skus'][0]['price'],
                        'origin_price'         => $product['skus'][0]['origin_price'],
                        'price_format'         => currency_format($product['skus'][0]['price']),
                        'origin_price_format'  => currency_format($product['skus'][0]['origin_price']),
                        'category_id'          => $a['id'],
                        'in_wishlist'          => $countWishlist ?? 0,
                        'discount'             => round((1 - floatval($product['skus'][0]['price']) / floatval($product['skus'][0]['origin_price'])) * 100),
                        'quantity_sold'        => $product['skus'][0]['quantity_sold'],
                        'quantity_sold_format' => $this->format_sold_quantity($product['skus'][0]['quantity_sold'] ?? 0),
                        'images'               => $product['images'],
                    ];

                    $count++; // Tăng biến đếm sau khi thêm sản phẩm
                }
            }

            if (! empty($module['content']['tabs'][0]['products'])) {

                foreach ($a['children'] as $category) {
                    $tab = [
                        'title'    => $category['description']['name'],
                        'products' => [],
                    ];
                    $products = $category['products']->jsonSerialize();

                    $maxProducts = 8;
                    $count       = 0;
                    foreach ($products as $product) {
                        if ($count >= $maxProducts) {
                            break;
                        }
                        if (! empty($product['skus'])) {
                            $countWishlist     = CustomerWishlist::where('product_id', $product['id'])->count();
                            $tab['products'][] = [
                                'id'                   => $product['id'],
                                'sku_id'               => $product['skus'][0]['id']           ?? null,
                                'name'                 => $product['descriptions'][0]['name'] ?? null,
                                'name_format'          => $product['descriptions'][0]['name'] ?? null,
                                'url'                  => url('/products/' . $product['id']),
                                'price'                => $product['skus'][0]['price'],
                                'origin_price'         => $product['skus'][0]['origin_price'],
                                'price_format'         => currency_format($product['skus'][0]['price']),
                                'origin_price_format'  => currency_format($product['skus'][0]['origin_price']),
                                'category_id'          => $a['id'],
                                'in_wishlist'          => $countWishlist ?? 0,
                                'discount'             => round((1 - floatval($product['skus'][0]['price']) / floatval($product['skus'][0]['origin_price'])) * 100),
                                'quantity_sold'        => $product['skus'][0]['quantity_sold'],
                                'quantity_sold_format' => $this->format_sold_quantity($product['skus'][0]['quantity_sold'] ?? 0),
                                'images'               => $product['images'],
                            ];
                            $count++;
                        }
                    }
                    $module['content']['tabs'][] = $tab;
                }

                $moduleItems[] = $module;
            }

        }

        $data          = ['modules' => $moduleItems];

        $data = hook_filter('home.index.data', $data);

        return view('home', $data);
    }

    public function format_sold_quantity($quantity)
    {
        if ($quantity >= 1000000000) {
            return number_format($quantity / 1000000000, 1) . 'b';
        } elseif ($quantity >= 1000000) {
            return number_format($quantity / 1000000, 1) . 'm';
        } elseif ($quantity >= 1000) {
            return number_format($quantity / 1000, 1) . 'k';
        }

        return $quantity;
    }
}
