<?php
/**
 * LogoutController.php
 *

 * @created    2022-06-23 20:22:54
 * @modified   2022-06-23 20:22:54
 */

namespace Beike\Shop\Http\Controllers\Account;

use Beike\Models\Customer;
use Beike\Shop\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index(Request $request)
    {

        hook_action('shop.account.logout.before', current_customer());

        Auth::guard(Customer::AUTH_GUARD)->logout();

        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return redirect(shop_route('login.index'));
    }
}
