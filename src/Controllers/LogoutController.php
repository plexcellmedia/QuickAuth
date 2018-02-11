<?php

namespace App\Http\Controllers\QuickAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Plexcellmedia\QuickAuth\Facades\QuickAuth;

class LogoutController extends Controller
{
    public function doLogout()
    {
        return QuickAuth::doLogout();
    }
}
