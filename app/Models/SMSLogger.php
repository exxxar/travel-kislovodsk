<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMSLogger extends Model
{
    use HasFactory;

    protected $fillable = [
        "text",
        "phone",
        "is_test",
        "status",
        "sms_id",
        "balance",
        "status_code",
        "status_text"
    ];
}
