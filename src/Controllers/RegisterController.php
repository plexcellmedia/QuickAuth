<?php

namespace App\Http\Controllers\QuickAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Plexcellmedia\QuickAuth\Facades\QuickAuth;

class RegisterController extends Controller
{
    
    public function showRegister()
    {
        $title = __('quickauth::titles.register');
        return QuickAuth::showRegister(['title' => $title]);
    }

    public function doRegister(Request $request)
    {
        return QuickAuth::doRegister($request);
    }
}
