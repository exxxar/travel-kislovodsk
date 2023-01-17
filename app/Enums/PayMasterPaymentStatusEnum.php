<?php

namespace App\Enums;

enum PayMasterPaymentStatusEnum: string
{
    case AUTHORIZED = 'Authorized';
    case SETTLED = 'Settled';
    case CANCELLED = 'Cancelled';
    case REJECTED = 'Rejected';
    case CONFIRMATION = 'Confirmation';
    case PENDING = 'Pending';

}
