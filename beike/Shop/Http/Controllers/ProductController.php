<?php

namespace Beike\Shop\Http\Controllers;

use Beike\Models\Product;
use Beike\Repositories\ProductRepo;
use Beike\Repositories\ProductReviewsRepo;
use Beike\Shop\Http\Resources\ProductDetail;
use Beike\Shop\Http\Resources\ProductSimple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function show(Request $request, Product $product)
    {
        $relationIds        = $product->relations->pluck('id')->toArray();
        $product            = ProductRepo::getProductDetail($product);
        $productDetail      = $product->jsonSerialize();
        ProductRepo::viewAdd($product);
        $reviews              = ProductReviewsRepo::getReviews($product->id);
        $countReview          = $reviews->count();
        $averageRating        = collect($reviews)->avg('star_rating');
        $roundedRating        = round($averageRating, 1);
        $discount             = 0;
        if ($productDetail['master_sku']['origin_price'] > 0) {
            $discount       = round(($productDetail['master_sku']['origin_price'] - $productDetail['master_sku']['price']) / $productDetail['master_sku']['origin_price'] * 100);
        }
        $data                 = [
            'product'              => (new ProductDetail($product))->jsonSerialize(),
            'relations'            => ProductRepo::getProductsByIds($relationIds)->jsonSerialize(),
            'reviews'              => $reviews->jsonSerialize(),
            'countReview'          => $countReview,
            'starReview'           => $roundedRating,
            'discount'             => $discount,
        ];

        $data = hook_filter('product.show.data', $data);

        return view('product/product', $data);
    }

    public function search(Request $request)
    {
        $keyword  = $request->get('keyword');
        $products = ProductRepo::getBuilder(['keyword' => $keyword])
            ->where('active', true)
            ->paginate(perPage())
            ->withQueryString();

        $data = [
            'products' => $products,
            'items'    => ProductSimple::collection($products)->jsonSerialize(),
        ];

        $data = hook_filter('product.search.data', $data);

        return view('search', $data);
    }
}
