<?php

namespace Beike\Models;

class PageDescription extends Base
{
    protected $fillable = [
        'page_id', 'locale', 'title', 'content', 'summary', 'meta_title', 'meta_description', 'meta_keywords',
    ];
}
