<?php

namespace App\Services;

use Midtrans\Config;

class MidtransConfig
{
    public static function setConfig()
    {
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;
    }
}
