<?php

namespace App\Http\Controllers\QuickAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Plexcellmedia\QuickAuth\Facades\QuickAuth;

class ForgotController extends Controller
{
    public function showForgot()
    {
        $title = __('quickauth::titles.forgot');
        return QuickAuth::showForgotPassword(['title' => $title]);
    }

    public function doForgot(Request $request)
    {
        return QuickAuth::doForgotPassword($request);
    }

    public function verifyForgot($email, $code)
    {
        return QuickAuth::verifyForgotPassword($email, $code);
    }
}
