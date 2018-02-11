<?php

namespace App\Http\Controllers\QuickAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Plexcellmedia\QuickAuth\Facades\QuickAuth;

class ActivateController extends Controller
{
    public function doActivate($userId, $code)
    {
        return QuickAuth::doActivate($userId, $code);
    }
}
