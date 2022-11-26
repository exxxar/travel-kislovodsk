<?php

namespace App\Models;

use App\Http\Resources\ChatsResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message',
        'content',
        'transaction_id',
        'user_id',
        'tour_id',
        'chat_id',
        'read_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'content' => 'array',
        'transaction_id' => 'integer',
        'tour_id' => 'integer',
        'user_id' => 'integer',
        'chat_id' => 'integer',
        'read_at' => 'timestamp',
    ];

    protected $appends = ['resource_url'];

    public static function getUserList()
    {

       return  Message::query()
            ->with(["sender.profile", "recipient.profile"])
            ->where("sender_id", Auth::user()->id)
            ->distinct()
            ->get("recipient_id");



    }

    public static function getMessagesByUserId($id): \Illuminate\Database\Eloquent\Builder
    {

        return Message::query()
            ->where(function ($q) use ($id) {
                $q->where("sender_id", Auth::user()->id);
                $q->where("recipient_id", $id);
            })
            ->orWhere(function ($q) use ($id) {
                $q->where("recipient_id", Auth::user()->id);
                $q->where("sender_id", $id);
            });


    }


    public static function sendMessage($message)
    {
        Message::query()->create([
            'content',
            'transaction_id',
            'user_id',
            'tour_guide_id',
            'read_at',
        ]);
    }

    public function getResourceUrlAttribute()
    {
        return url('/admin/messages/' . $this->getKey());
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }


    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
