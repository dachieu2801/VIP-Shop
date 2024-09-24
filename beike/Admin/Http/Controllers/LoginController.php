<?php

namespace Beike\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Beike\Admin\Http\Requests\LoginRequest;
use Beike\Models\AdminUser;

class LoginController extends Controller
{
    public function show()
    {
        if (auth(AdminUser::AUTH_GUARD)->check()) {
            return redirect()->back();
        }

        return view('admin::pages.login.login', \request()->only('admin_email', 'admin_password'));
    }

    public function store(LoginRequest $loginRequest)
    {
        if (auth(AdminUser::AUTH_GUARD)->attempt($loginRequest->validated())) {
            return redirect(admin_route('home.index'));
        }

        return redirect()->back()->with(['error' => trans('auth.failed')])->withInput();
    }
}
