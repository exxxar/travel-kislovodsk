<?php

namespace App\Enums;

enum VerificationTypeEnum: string
{
    case TOUR = 'tour';
    case PROFILE = 'profile';
    case DOCUMENT = 'document';
}
