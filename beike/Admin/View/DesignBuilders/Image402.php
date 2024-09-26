<?php


namespace Beike\Admin\View\DesignBuilders;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image402 extends Component
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
            'code' => 'image402',
            'sort' => 0,
            'name' => trans('admin/design_builder.module_image_402'),
            'icon' => asset('image/module/image_402.png'),
        ];

        return view('admin::pages.design.module.image402', $data);
    }
}
