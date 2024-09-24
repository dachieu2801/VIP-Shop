<?php

namespace Beike\Shop\Http\Controllers\Account;

use Beike\Models\Customer;
use Beike\Repositories\CartRepo;
use Beike\Shop\Http\Controllers\Controller;
use Beike\Shop\Http\Requests\RegisterRequest;
use Beike\Shop\Services\AccountService;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $customer               = AccountService::register($credentials);
        $guestCartProduct       = CartRepo::allCartProducts(0);
        auth(Customer::AUTH_GUARD)->attempt($credentials);
        CartRepo::mergeGuestCart($customer, $guestCartProduct);

        if ($customer->status == 'approved') {
            Customer::query()->where('id', $customer->id)->update(['login_at' => Carbon::now()]);

            return json_success(trans('shop/login.register_success'));
        }

        return json_fail(trans('shop/login.should_be_approved'));

    }
}
