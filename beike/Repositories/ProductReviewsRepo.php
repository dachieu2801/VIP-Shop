<?php
/**
 * ProductRepo.php
 *

 * @created    2022-06-23 11:19:23
 * @modified   2022-06-23 11:19:23
 */

namespace Beike\Repositories;

use Beike\Models\ProductReviews;

class ProductReviewsRepo
{
    public static function getReviews($productId)
    {
        return ProductReviews::query()
            ->where('product_id', $productId)
            ->where('deleted_at', null)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function getPaging($product_id, $perPage, $star)
    {
        $reviews = ProductReviews::query()
            ->where('product_id', $product_id)
            ->where('deleted_at', null)
            ->orderBy('created_at', 'desc')
            ->when($star != 0, function ($query) use ($star) {
                return $query->where('star_rating', floatval($star));
            })
            ->paginate($perPage);
        return $reviews;
    }

    public static function createReview($request)
    {
        return ProductReviews::create([
            'product_id'      => $request['product_id'],
            'customer_id'     => $request['customer_id'],
            'star_rating'     => $request['star_rating'],
            'title'           => $request['title']         ?? '',
            'helpful_count'   => $request['helpful_count'] ?? 0,
            'content'         => $request['content'],
            'image_url'       => $request['image_url'] ?? null,
            'video_url'       => $request['video_url'] ?? null,
            'customer_name'   => $request['customer_name'],
            'customer_avatar' => $request['customer_avatar'] ?? '',
            'rating_service'  => $request['rating_service']  ?? '',
        ]);
    }
    public static function destroyReviewByIds($ids)
    {
        ProductReviews::query()->whereIn('id', $ids)->update(['deleted_at' => now()]);
    }
}
