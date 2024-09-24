<?php
/**
 * SocialController.php
 *

 * @created    2022-09-30 18:46:38
 * @modified   2022-09-30 18:46:38
 */

namespace Plugin\Social\Controllers;

use Beike\Admin\Http\Controllers\Controller;
use Beike\Repositories\SettingRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminSocialController extends Controller
{
    /**
     * @throws \Throwable
     */
    public function saveSetting(Request $request): JsonResponse
    {
        SettingRepo::storeValue('setting', $request->all(), 'social', 'plugin');

        return json_success('Đã lưu thành công');
    }
}
