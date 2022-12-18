<?php

namespace App\Enums;

enum PayMasterPaymentMethods: string
{
    case BANKCARD = 'bankcard';
    case SBP = 'sbp';
    case QIWI = 'qiwi';
}
