<?php

namespace Beike\Admin\Http\Controllers;

use Beike\Admin\Http\Resources\ProductAttributeResource;
use Beike\Admin\Http\Resources\ProductResource;
use Beike\Admin\Http\Resources\ProductSimple;
use Beike\Admin\Repositories\TaxClassRepo;
use Beike\Admin\Services\ProductService;
use Beike\Libraries\Weight;
use Beike\Models\BestSeller;
use Beike\Models\Product;
use Beike\Models\ProductSku;
use Beike\Models\Setting;
use Beike\Models\TaxClass;
use Beike\Repositories\CategoryRepo;
use Beike\Repositories\FlattenCategoryRepo;
use Beike\Repositories\LanguageRepo;
use Beike\Repositories\ProductRepo;
use Beike\Repositories\ProductReviewsRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $productList = [];

        $sortQuantity = $requestData['sort_quantity'] ?? 0;
        $quantity     = 'asc';

        if ($sortQuantity == 0) {
            $productList       = ProductRepo::list($requestData);
        } else {
            $query = Product::with(['description', 'skus', 'masterSku', 'attributes', 'brand']);
            $query->join('product_skus', 'products.id', '=', 'product_skus.product_id')
                ->select('products.*')
                ->selectRaw('MIN(product_skus.quantity) as min_quantity')
                ->groupBy('products.id')
                ->orderBy('min_quantity', $quantity);
            $query->leftJoin('product_descriptions as pd', function ($build) {
                $build->whereColumn('pd.product_id', 'products.id')
                    ->where('locale', locale());
            });
            if (isset($requestData['category_id'])) {
                $query->whereHas('categories', function ($query1) use ($requestData) {
                    if (is_array($requestData['category_id'])) {
                        $query1->whereIn('category_id', $requestData['category_id']);
                    } else {
                        $query1->where('category_id', $requestData['category_id']);
                    }
                });
            }

            if (isset($requestData['sku']) || isset($requestData['model'])) {
                $query->whereHas('skus', function ($query1) use ($requestData) {
                    if (isset($requestData['sku'])) {
                        $query1->where('sku', 'like', "%{$requestData['sku']}%");
                    }
                    if (isset($requestData['model'])) {
                        $query1->where('model', 'like', "%{$requestData['model']}%");
                    }
                });
            }

            if (isset($requestData['name'])) {
                $query->where('pd.name', 'like', "%{$requestData['name']}%");
            }
            if (isset($requestData['active'])) {
                $query->where('active', (int) $requestData['active']);
            }
            $productList       =  $query->paginate(20);
        }

        $products       = ProductResource::collection($productList);
        $productsFormat =  $products->jsonSerialize();

        session(['page' => $request->get('page', 1)]);
        $data = [
            'categories'      => CategoryRepo::flatten(locale()),
            'products_format' => $productsFormat,
            'products'        => $products,
            'type'            => 'products',
        ];

        $data = hook_filter('admin.product.index.data', $data);

        if ($request->expectsJson()) {
            return $productsFormat;
        }

        return view('admin::pages.products.index', $data);
    }

    public function bestSelling(Request $request)
    {
        $records = BestSeller::pluck('product_id')->jsonSerialize();

        $products = Product::whereHas('masterSku')
            ->whereIn('id', $records)
            ->get();

        $allRecords =  \Beike\Shop\Http\Resources\ProductSimple::collection($products)->jsonSerialize();

        return view('admin::pages.bestSelling.index', ['allRecords' => $allRecords]);
    }

    public function updateBestSelling(Request $request)
    {
        $requestData = $request->all();

        $product_id  = $requestData['id'] ?? [];
        BestSeller::truncate();
        $data = array_map(function ($productId) {
            return ['product_id' => $productId];
        }, $product_id);
        BestSeller::insert($data);
        //test

        return json_success('Cập nhật thành công');
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
            $actionType  = $requestData['action_type']  ?? '';
            $taxClassId  = $requestData['tax_class_id'] ?? 1;
            $product     = $this->createOneProduct($requestData, $taxClassId);
            $data        = [
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

    public function createOneProduct($data, $taxClassId, $mul = false)
    {
        $taxRates = TaxClass::find($taxClassId)->taxRates->jsonSerialize();

        foreach ($data['skus'] as &$sku) {
            $costPrice = (float) $sku['cost_price'];
            $price     = $costPrice;

            foreach ($taxRates as $rate) {
                if ($rate['type'] === 'percent') {
                    $price += $costPrice * ($rate['rate'] / 100);
                } elseif ($rate['type'] === 'flat') {
                    $price += (float) $rate['rate'];
                }
            }

            $sku['price'] = round($price);
        }

        $product     = (new ProductService)->create($data, $mul);

        return $product;
    }

    public function storeMultiple(Request $request)
    {
        $rules = [
            'products'                                   => 'required|array',
            'products.*.descriptions'                    => 'required|array',
            'products.*.descriptions.zh_cn'              => 'required|array',
            'products.*.descriptions.zh_cn.name'         => 'required|string',
            'products.*.images'                          => 'nullable|array',
            'products.*.images.*'                        => 'nullable|string',
            'products.*.position'                        => 'nullable|integer',
            'products.*.tax_class_id'                    => 'nullable|integer',
            'products.*.categories'                      => 'nullable|array',
            'products.*.categories.*'                    => 'nullable|string',
            'products.*.active'                          => 'nullable',
            'products.*.variables'                       => 'nullable|array',
            'products.*.skus.*.images'                   => 'nullable|array',
            'products.*.skus.*.images.*'                 => 'nullable|string',
            'products.*.skus.*.is_default'               => 'nullable',
            'products.*.skus.*.variants'                 => 'nullable|array',
            'products.*.skus.*.variants.*'               => 'nullable|integer',
            'products.*.skus.*.model'                    => 'nullable|string',
            // 'products.*.skus.*.sku'                      => 'required|string',
            'products.*.skus.*.origin_price'             => 'required|numeric',
            'products.*.skus.*.cost_price'               => 'required|numeric',
            'products.*.skus.*.quantity'                 => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_fail('', $validator->errors());
        }
        $productsData      = $request->input('products');
        $processedProducts = [];
        $failedProducts    = [];

        foreach ($productsData as $index => $productData) {
            try {
                $product = $this->createOneProduct($productData, $productData['tax_class_id'] ?? 1, true);

                $processedProducts[] = $product;
            } catch (\Exception $e) {
                $failedProducts[$index] = [
                    'product' => $productData,
                    'error'   => $e->getMessage(),
                    'row'     => $index,
                ];
            }
        }

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

    public function productStorage(Request $request)
    {
        $sortQuantity = $request->get('sort_quantity', 'desc');
        $productName  = $request->get('product_name', null);
        $productId    = $request->get('product_id', null);

        $query = Product::with(['descriptions', 'skus']);
        $query->join('product_skus', 'products.id', '=', 'product_skus.product_id')
            ->orderBy('product_skus.quantity', $sortQuantity)
            ->select('products.*');

        if ($productName) {
            $query->where('products.name', 'like', '%' . $productName . '%');
        }

        if ($productId) {
            $query->where('products.id', $productId);
        }

        $products       =  $query->paginate(20);
        $productsFormat = $products->jsonSerialize();
        $data           = [
            'products_format' => $productsFormat,
            'products'        => $products,
        ];

        // $data = hook_filter('admin.product.productStorage.data', $data);

        return view('admin::pages.storage.index', $data);
    }

    public function updateStock(Request $request)
    {
        try {
            $requestData = $request->all();
            $skuId       = $requestData['id']       ?? '';
            $quantity    = $requestData['quantity'] ?? 0;

            ProductSku::where('id', $skuId)->update(['quantity' => $quantity]);

            return json_success(trans('common.update_success'));

        } catch (\Exception $e) {
            return json_fail('', $e->getMessage());
        }
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
            $taxClassId  = $requestData['tax_class_id'];

            if (round($taxClassId) <= 0) {
                return redirect(admin_route('products.create'))
                    ->withInput()
                    ->withErrors(['error' => 'Cần chọn 1 loại thuế']);
            }

            $taxRates = TaxClass::find($taxClassId)->taxRates->jsonSerialize();

            foreach ($requestData['skus'] as &$sku) {
                $costPrice = (float) $sku['cost_price'];
                $price     = $costPrice;

                foreach ($taxRates as $rate) {
                    if ($rate['type'] === 'percent') {
                        $price += $costPrice * ($rate['rate'] / 100);
                    } elseif ($rate['type'] === 'flat') {
                        $price += (float) $rate['rate'];
                    }
                }

                $sku['price'] = round($price); // Cập nhật giá mới vào SKU
            }
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

    protected function form(Request $request, Product $product)
    {
        if ($product->id) {
            $descriptions = $product->descriptions->keyBy('locale');
            $categoryIds  = $product->categories->pluck('id')->toArray();
            $product->load('brand', 'attributes');
        }

        $product    = hook_filter('admin.product.form.product', $product);
        $taxClasses = TaxClassRepo::getList();
        $showTax    = true;
        $tax        = Setting::query()
            ->where('type', 'system')
            ->where('space', 'base')
            ->where('name', 'tax')
            ->where('value', '1')
            ->first();
        if (! $tax) {
            $showTax = false;
        }
        $data = [
            'product'               => $product,
            'showTax'               => $showTax,
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
