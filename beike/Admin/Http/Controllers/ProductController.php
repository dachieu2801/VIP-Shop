<?php

namespace Beike\Admin\Http\Controllers;

use Beike\Admin\Http\Resources\ProductAttributeResource;
use Beike\Admin\Http\Resources\ProductResource;
use Beike\Admin\Http\Resources\ProductSimple;
use Beike\Admin\Repositories\TaxClassRepo;
use Beike\Admin\Services\ProductService;
use Beike\Libraries\Weight;
use Beike\Models\Product;
use Beike\Repositories\CategoryRepo;
use Beike\Repositories\FlattenCategoryRepo;
use Beike\Repositories\LanguageRepo;
use Beike\Repositories\ProductRepo;
use Beike\Repositories\ProductReviewsRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
class ProductController extends Controller
{
    protected string $defaultRoute = 'products.index';

    public function index(Request $request)
    {
        $requestData    = $request->all();
        if (! isset($requestData['sort'])) {
            $requestData['sort']  = 'products.updated_at';
            $requestData['order'] = 'desc';
        }
        $productList    = ProductRepo::list($requestData);
        $products       = ProductResource::collection($productList);
        $productsFormat =  $products->jsonSerialize();

        session(['page' => $request->get('page', 1)]);

        $data = [
            'categories'      => CategoryRepo::flatten(locale()),
            'products_format' => $productsFormat,
            'products'        => $products,
            'type'            => 'products',
        ];

        Log::info('asdasd',['data'=>$data]);

        $data = hook_filter('admin.product.index.data', $data);

        if ($request->expectsJson()) {
            return $productsFormat;
        }

        return view('admin::pages.products.index', $data);
    }

    public function trashed(Request $request)
    {
        $requestData            = $request->all();
        $requestData['trashed'] = true;
        $productList            = ProductRepo::list($requestData);
        $products               = ProductResource::collection($productList);
        $productsFormat         =  $products->jsonSerialize();

        $data = [
            'categories'      => CategoryRepo::flatten(locale()),
            'products_format' => $productsFormat,
            'products'        => $products,
            'type'            => 'trashed',
        ];

        $data = hook_filter('admin.product.trashed.data', $data);

        if ($request->expectsJson()) {
            return $products;
        }

        return view('admin::pages.products.index', $data);
    }

    public function create(Request $request)
    {
        return $this->form($request, new Product);
    }

    public function store(Request $request)
    {
        try {
            $requestData = $request->all();
            $actionType  = $requestData['action_type'] ?? '';
            $product     = (new ProductService)->create($requestData);

            $data = [
                'request_data' => $requestData,
                'product'      => $product,
            ];

            hook_action('admin.product.store.after', $data);

            return redirect()->to($actionType == 'stay' ? admin_route('products.create') : admin_route('products.index'))->with('success', trans('common.created_success'));
        } catch (\Exception $e) {
            return redirect(admin_route('products.create'))
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storeMultiple(Request $request)
    {
        $rules = [
            'products'                                   => 'required|array',
            'products.*.descriptions'                    => 'required|array',
            'products.*.descriptions.zh_cn'              => 'required|array',
            'products.*.descriptions.zh_cn.name'         => 'required|string',
            'products.*.descriptions.en'                 => 'required|array',
            'products.*.descriptions.en.name'            => 'required|string',
            'products.*.images'                          => 'nullable|array',
            'products.*.images.*'                        => 'nullable|string',
            'products.*.video'                           => 'nullable|string',
            'products.*.position'                        => 'nullable|integer',
            'products.*.weight'                          => 'nullable|numeric',
            'products.*.weight_class'                    => 'nullable|string',
            'products.*.brand_name'                      => 'nullable|string',
            'products.*.brand_id'                        => 'nullable|string',
            'products.*.tax_class_id'                    => 'nullable|integer',
            'products.*.shipping'                        => 'nullable',
            'products.*.categories'                      => 'nullable|array',
            'products.*.categories.*'                    => 'nullable|string',
            'products.*.active'                          => 'nullable',
            'products.*.variables'                       => 'nullable|array',
            'products.*.variables.*.name'                => 'required|array',
            'products.*.variables.*.name.zh_cn'          => 'required|string',
            'products.*.variables.*.name.en'             => 'required|string',
            'products.*.variables.*.values'              => 'nullable|array',
            'products.*.variables.*.values.*.name'       => 'required|array',
            'products.*.variables.*.values.*.name.zh_cn' => 'required|string',
            'products.*.variables.*.values.*.name.en'    => 'required|string',
            'products.*.variables.*.values.*.image'      => 'nullable|string',
            'products.*.variables.*.isImage'             => 'required|boolean',
            'products.*.skus'                            => 'required|array',
            'products.*.skus.*.images'                   => 'nullable|array',
            'products.*.skus.*.images.*'                 => 'nullable|string',
            'products.*.skus.*.is_default'               => 'nullable',
            'products.*.skus.*.variants'                 => 'nullable|array',
            'products.*.skus.*.variants.*'               => 'nullable|integer',
            'products.*.skus.*.model'                    => 'required|string',
            'products.*.skus.*.sku'                      => 'required|string',
            'products.*.skus.*.price'                    => 'required|numeric',
            'products.*.skus.*.origin_price'             => 'required|numeric',
            'products.*.skus.*.cost_price'               => 'required|numeric',
            'products.*.skus.*.quantity'                 => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }
        $productsData      = $request->input('products');
        $processedProducts = [];
        $failedProducts    = [];

        foreach ($productsData as $index => $productData) {
            try {
                $product             = (new ProductService)->create($productData, true);
                $processedProducts[] = $product;
            } catch (\Exception $e) {
                $failedProducts[$index] = [
                    'product' => $productData,
                    'error'   => $e->getMessage(),
                ];
            }
        }

        // Trả về phản hồi JSON với thông báo thành công và thông tin về các sản phẩm không hợp lệ
        return response()->json([
            'message'            => 'Products processed',
            'processed_products' => $processedProducts,
            'failed_products'    => $failedProducts,
        ]);
    }

    public function getProducts(Request $request)
    {
        return Product::with(['descriptions', 'skus', 'categories', 'relations'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function edit(Request $request, Product $product)
    {
        return $this->form($request, $product);
    }

    public function update(Request $request, Product $product)
    {
        try {
            $requestData = $request->all();
            $actionType  = $requestData['action_type'] ?? '';
            $product     = (new ProductService)->update($product, $requestData);

            $data = [
                'request_data' => $requestData,
                'product'      => $product,
            ];
            hook_action('admin.product.update.after', $data);
            $page = session('page', 1);

            return redirect()->to($actionType == 'stay' ? admin_route('products.edit', [$product->id]) : admin_route('products.index', ['page' => $page]))->with('success', trans('common.updated_success'));
        } catch (\Exception $e) {
            return redirect(admin_route('products.edit', $product))->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        hook_action('admin.product.destroy.after', $product);

        return json_success(trans('common.deleted_success'));
    }

    public function restore(Request $request)
    {
        $productId = $request->id ?? 0;
        Product::withTrashed()->find($productId)->restore();

        hook_action('admin.product.restore.after', $productId);

        return ['success' => true];
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return mixed
     * @throws \Exception
     */
    protected function form(Request $request, Product $product)
    {
        if ($product->id) {
            $descriptions = $product->descriptions->keyBy('locale');
            $categoryIds  = $product->categories->pluck('id')->toArray();
            $product->load('brand', 'attributes');
        }

        $product    = hook_filter('admin.product.form.product', $product);
        $taxClasses = TaxClassRepo::getList();
        array_unshift($taxClasses, ['title' => trans('admin/builder.text_no'), 'id' => 0]);

        $data = [
            'product'               => $product,
            'descriptions'          => $descriptions ?? [],
            'category_ids'          => $categoryIds  ?? [],
            'product_attributes'    => ProductAttributeResource::collection($product->attributes),
            'relations'             => ProductResource::collection($product->relations)->resource,
            'languages'             => LanguageRepo::all(),
            'tax_classes'           => $taxClasses,
            'weight_classes'        => Weight::getWeightUnits(),
            'source'                => [
                'flatten_categories' => FlattenCategoryRepo::getCategoryList(),
                'categories'         => CategoryRepo::flatten(locale(), false),
            ],
            '_redirect'          => $this->getRedirect(),
        ];

        $data = hook_filter('admin.product.form.data', $data);

        return view('admin::pages.products.form.form', $data);
    }

    public function name(int $id)
    {
        $name = ProductRepo::getName($id);

        return json_success(trans('common.get_success'), $name);
    }

    /**
     * 根据商品ID批量获取商品名称
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getNames(Request $request): JsonResponse
    {
        $productIds = explode(',', $request->get('product_ids'));
        $name       = ProductRepo::getNames($productIds);

        return json_success(trans('common.get_success'), $name);
    }

    public function autocomplete(Request $request)
    {
        $products = ProductRepo::autocomplete($request->get('name') ?? '');

        return json_success(trans('common.get_success'), $products);
    }

    /**
     * @throws \Exception
     */
    public function latest(Request $request): JsonResponse
    {
        $limit          = $request->get('limit', 10);
        $productList    = ProductRepo::getBuilder(['active' => 1, 'sort' => 'id'])->limit($limit)->get();
        $products       = ProductSimple::collection($productList)->jsonSerialize();

        return json_success(trans('common.get_success'), $products);
    }

    public function updateStatus(Request $request)
    {
        ProductRepo::updateStatusByIds($request->get('ids'), $request->get('status'));

        return json_success(trans('common.updated_success'), []);
    }

    public function destroyByIds(Request $request)
    {
        $productIds = $request->get('ids');
        ProductRepo::DeleteByIds($productIds);

        hook_action('admin.product.destroy_by_ids.after', $productIds);

        return json_success(trans('common.deleted_success'), []);
    }

    public function trashedClear()
    {
        ProductRepo::forceDeleteTrashed();
    }

    public function reviews(Request $request)
    {
        $product_id       = $request->input('product_id');
        $perPage          = $request->input('per_page', 10);
        $star             = $request->input('star', 0);
        $reviews          = ProductReviewsRepo::getPaging($product_id, $perPage, $star);

        return view('admin::pages.products.reviews', ['reviews' => $reviews, 'product_id' => $product_id]);
    }

    public function destroyReviewByIds(Request $request)
    {
        $reviewIds = $request->input('ids');
        ProductReviewsRepo::destroyReviewByIds($reviewIds);

        return json_success(trans('common.deleted_success'), []);
    }
}
