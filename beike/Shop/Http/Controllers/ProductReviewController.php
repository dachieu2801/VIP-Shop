<?php

namespace Beike\Shop\Http\Controllers;

use Beike\Repositories\OrderProductRepo;
use Beike\Repositories\ProductReviewsRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductReviewController extends Controller
{
    public static function index($productId, $orderProductId)
    {
        $data = [
            'product_id'       => $productId,
            'order_product_id' => $orderProductId,
        ];

        return view('product/review', $data);
    }

    public function createProductReview(Request $request)
    {

        $validatedData = $request->validate([
            'content'          => 'required',
            'star_rating'      => 'required|integer|min:1|max:5',
            'product_id'       => 'required|integer',
            'order_product_id' => 'required|integer',
        ]);
        $validatedData['customer_id']       = current_customer()['id'];
        $validatedData['customer_name']     = current_customer()['name'];
        $validatedData['customer_avatar']   = current_customer()['avatar'];
        $validatedData['title']             = $request->input('title');
        $validatedData['image_url']         = $request->input('image_url');
        $validatedData['video_url']         = $request->input('video_url');
        $validatedData['rating_service']    = $request->input('rating_service');

        $orderProduct                     = OrderProductRepo::find($validatedData['order_product_id']);
        if ($orderProduct['product_id'] != $validatedData['product_id']) {
            return response()->json(['message' => 'Product not found in order'], 404);
        }
        if ($orderProduct['reviewed'] == 'reviewed') {
            return response()->json(['message' => 'You have already reviewed this product'], 400);
        }

        try {
            DB::beginTransaction();
            $productReview                    = ProductReviewsRepo::createReview($validatedData);
            $orderProduct->update([
                'reviewed'  => 'reviewed',
                'review_id' => $productReview->id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Failed to create review'], 500);
        }

        return response()->json(['message' => 'Reviewed'], 201);
    }
}
