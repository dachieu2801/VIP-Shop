<?php


namespace Beike\Models;

class PageCategoryDescription extends Base
{
    protected $table = 'page_category_descriptions';

    protected $fillable = [
        'page_category_id', 'locale', 'title', 'summary', 'meta_title', 'meta_description', 'meta_keywords',
    ];
}
