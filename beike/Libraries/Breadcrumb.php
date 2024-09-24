<?php


namespace Beike\Libraries;

use Illuminate\Contracts\View\View;

class Breadcrumb
{
    public array $breadcrumbs;

    /**
     * Create a new component instance.
     *
     * @return void
     * @throws \Exception
     */
    public function __construct()
    {
        $this->breadcrumbs[] = [
            'title' => trans('shop/common.home'),
            'url'   => shop_route('home.index'),
        ];
    }

    /**
     * 获取 Breadcrumb 实例
     * @return Breadcrumb
     */
    public static function getInstance(): self
    {
        return new self;
    }

    /**
     * 添加面包屑节点链接
     *
     * @param $url
     * @param $text
     * @return Breadcrumb
     */
    public function addLink($url, $text): self
    {
        $this->breadcrumbs[] = [
            'url'   => $url,
            'title' => $text,
        ];

        return $this;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|
     */
    public function render(): View
    {
        return view('components.breadcrumbs', ['breadcrumbs' => collect($this->breadcrumbs)]);
    }
}
