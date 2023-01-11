<?php

namespace App\Enums;

enum PayMasterPaymentMethodsEnum: string
{
    case BANKCARD = 'BankCard';
    case SBP = 'sbp';
    case QIWI = 'qiwi';
}
