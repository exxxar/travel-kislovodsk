<?php

namespace App\Facades;

use App\Classes\PayMaster\PayMaster;
use App\Classes\SmsRU\SMSRU;
use Illuminate\Support\Facades\Facade;

/**
 * @method static SMSRU actions()
 * @see \Illuminate\Log\Logger
 */
class SmsServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sms.service';
    }
}
