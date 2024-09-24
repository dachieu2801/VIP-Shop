<?php


namespace Beike\Admin\View\DesignBuilders;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image300 extends Component
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
            'code' => 'image300',
            'sort' => 0,
            'name' => trans('admin/builder.modules_image_300'),
            'icon' => '&#xe663;',
        ];

        return view('admin::pages.design.module.image300', $data);
    }
}
