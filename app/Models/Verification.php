<?php

namespace App\Models;

use App\Enums\VerificationTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

    protected $fillable = [
        "message",
        "admin_id",
        "object_id",
        "status",
        'type',
    ];


    public function object()
    {
        switch (VerificationTypeEnum::from($this->type)) {
            case VerificationTypeEnum::PROFILE:
                return $this->belongsTo(Company::class);
            case VerificationTypeEnum::DOCUMENT:
                return $this->belongsTo(Document::class);
            case VerificationTypeEnum::TOUR:
                return $this->belongsTo(Tour::class);
        }
    }
}
