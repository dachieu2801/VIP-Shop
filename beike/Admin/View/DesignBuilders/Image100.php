<?php

namespace Beike\Admin\View\DesignBuilders;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image100 extends Component
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
            'code' => 'image100',
            'sort' => 0,
            'name' => trans('admin/design_builder.module_banner'),
            'icon' => '&#xe663;',
        ];

        return view('admin::pages.design.module.image100', $data);
    }
}
