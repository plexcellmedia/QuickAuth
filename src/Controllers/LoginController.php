<?php

namespace App\Http\Controllers\QuickAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Plexcellmedia\QuickAuth\Facades\QuickAuth;

class LoginController extends Controller
{
    public function showLogin()
    {
        $title = __('quickauth::titles.login');
        return QuickAuth::showLogin(['title' => $title]);
    }

    public function doLogin(Request $request)
    {
        return QuickAuth::doLogin($request, false);
    }
}
