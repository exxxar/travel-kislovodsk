<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "description",
        "settings",
        "last_message_id",
        "last_message_at",
        "read_at"

    ];

    protected $appends = ['title','message'];

    public function getMessageAttribute()
    {
        $message = Message::query()->where("id", $this->last_message_id)->first();

        if (is_null($message))
            return "-";

        return $message->message;
    }
    public function getTitleAttribute()
    {
        $users = $this->chatUsers()->with(["profile"])
            ->whereNot("user_id",Auth::user()->id)
            ->get();

        if (empty($users))
            return "UNKNOWN";

        return ($users[0]->profile->tname??'')." ".($users[0]->profile->fname??'');

       /* $title = '';

        foreach ($users as $user){
            $profile = $user->profile;
            $title .= ($profile->tname??'-')." ".($profile->fname??'-').",";
        }

        return $title;*/
    }

    public static function getChats(): \Illuminate\Database\Eloquent\Builder
    {
        return  Chat::query()->whereHas("chatUsers",function ($q){
            $q->where('user_id', Auth::user()->id);
        })->orderBy("last_message_at","DESC");
    }

    public static function getChatMessagesByChatId($chatId): \Illuminate\Database\Eloquent\Builder
    {
        return Message::query()->where("chat_id",$chatId);
    }

    public static function getChatMessagesByUserId($userId): \Illuminate\Database\Eloquent\Builder
    {
        return Message::query()->where("user_id",$userId);
    }


    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function chatUsers()
    {
        return $this->belongsToMany(User::class, 'chat_users');
    }
}
