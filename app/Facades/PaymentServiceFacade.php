<?php

namespace App\Facades;

use App\Classes\PayMaster\PayMaster;
use Illuminate\Support\Facades\Facade;

/**
 * @method static PayMaster payment()
 * @see \Illuminate\Log\Logger
 */
class PaymentServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'payment.service';
    }
}
