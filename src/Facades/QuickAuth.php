<?php

namespace Plexcellmedia\QuickAuth\Facades;

use Illuminate\Support\Facades\Facade;

class QuickAuth extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'quickauth';
    }
}
