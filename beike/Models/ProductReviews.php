<?php

namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductReviews extends Base
{
    use HasFactory;

    protected $fillable = ['product_id', 'customer_id', 'star_rating', 'title', 'helpful_count', 'content', 'image_url', 'video_url', 'customer_name', 'customer_avatar', 'rating_service'];
}
