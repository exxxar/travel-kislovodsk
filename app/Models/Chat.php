<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    protected $appends = ['title', 'message'];

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
            ->whereNot("user_id", Auth::user()->id)
            ->get();

        if (empty($users))
            return "UNKNOWN";


       // return ($users[0]->profile->tname ?? '') . " " . ($users[0]->profile->fname ?? '');

        $title = '';

         foreach ($users as $user){
             if (Auth::user()->id!==$user->id) {
                 $profile = $user->profile;
                 $title .= ($profile->tname??'-')." ".($profile->fname??'-').",";
             }

         }

         return $title;
    }

    public static function unreadChatsCount()
    {
        return Chat::getChats()
            ->whereNull("read_at")
            ->count() ?? 0;
    }

    public static function hasChat($userId1, $userId2)
    {
        $chats = DB::select(
            DB::raw("
            SELECT
*
FROM `chat_users` as t1
LEFT JOIN  `chat_users` AS t2
ON t1.`chat_id`=t2.`chat_id`
WHERE t1.user_id=$userId1 and t2.user_id=$userId2;
            ")
        );

        return count($chats) > 0 ? $chats[0]->chat_id : null;
    }

    public static function getChats(): \Illuminate\Database\Eloquent\Builder
    {
        return Chat::query()->whereHas("chatUsers", function ($q) {
            $q->where('user_id', Auth::user()->id);
        })->orderBy("last_message_at", "DESC");
    }

    public static function getChatMessagesByChatId($chatId): \Illuminate\Database\Eloquent\Builder
    {
        return Message::query()->where("chat_id", $chatId);
    }

    public static function getChatMessagesByUserId($userId): \Illuminate\Database\Eloquent\Builder
    {
        return Message::query()->where("user_id", $userId);
    }


    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function chatUsers()
    {
        return $this->belongsToMany(User::class, 'chat_users');
    }

    public static function startNewChat($message, $senderId, $recipientId)
    {
        $chatTmpId = Chat::hasChat($senderId, $recipientId);

        if (is_null($chatTmpId)) {
            $chat = Chat::query()->create([
                "description" => "Диалог общения пользователей",
                "last_message_at" => Carbon::now(),
            ]);

            $chat->chatUsers()->attach($senderId);
            $chat->chatUsers()->attach($recipientId);

            Message::query()->create([
                'message' => $message,
                'user_id' => $senderId,
                'chat_id' => $chat->id,
            ]);
        } else {
            $chat = Chat::query()->where("id", $chatTmpId)->first();

            $chat->last_message_at = Carbon::now();
            $chat->save();

            Message::query()->create([
                'message' => $message,
                'user_id' => $senderId,
                'chat_id' => $chatTmpId,
            ]);
        }

        return $chat;
    }
}
