<?php

namespace Beike\Admin\View\DesignBuilders;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image200 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        $data['register'] = [
            'code' => 'image200',
            'sort' => 0,
            'name' => trans('admin/builder.modules_image_200'),
            'icon' => '&#xe663;',
        ];

        return view('admin::pages.design.module.image200', $data);
    }
}
