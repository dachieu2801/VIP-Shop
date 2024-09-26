<?php


namespace Beike\Installer\Controllers;

use Illuminate\Support\Facades\Redirect;

class WelcomeController extends BaseController
{
    private $languages = [
        'zh_cn' => 'Tiếng Việt',
    ];

    public function index()
    {
        $this->checkInstalled();
        $data['languages'] = $this->languages;
        $data['locale']    = 'zh_cn';
        $data['steps']     = 1;

        return view('installer::welcome', $data);
    }

    public function locale($lang)
    {
        setcookie('locale', $lang, 0, '/');

        return Redirect::back();
    }
}
