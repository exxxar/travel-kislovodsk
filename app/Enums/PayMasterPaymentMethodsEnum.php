<?php

namespace App\Enums;

enum PayMasterPaymentMethodsEnum: string
{
    case BANKCARD = 'bankcard';
    case SBP = 'sbp';
    case QIWI = 'qiwi';
}
