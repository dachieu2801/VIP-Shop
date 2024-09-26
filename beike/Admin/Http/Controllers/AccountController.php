<?php

namespace Beike\Admin\Http\Controllers;

use Beike\Admin\Repositories\AdminUserRepo;
use Beike\Repositories\AdminUserTokenRepo;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $user = current_user();
        $data = [
            'current_user' => $user,
            'tokens'       => AdminUserTokenRepo::getTokenByAdminUser($user)->pluck('token')->toArray(),
        ];

        return view('admin::pages.account.index', $data);
    }

    public function update(Request $request)
    {
        $user = current_user();

        $adminUserData = $request->all();
        AdminUserRepo::updateAdminUser($user->id, $adminUserData);

        return response()->redirectTo('admin/account')->with('success', trans('common.updated_success'));
    }
}
