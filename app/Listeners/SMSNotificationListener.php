<?php

namespace App\Listeners;

use App\Classes\SmsRU\SMSRU;
use App\Events\SMSNotificationEvent;
use App\Models\SMSLogger;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use stdClass;

class SMSNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(SMSNotificationEvent $event)
    {
        if (is_null($event))
            return;

        $smsru = new SMSRU(config("smsru.api_key")); // Ваш уникальный программный ключ, который можно получить на главной странице

        $data = new stdClass();
        $data->to = $event->phone;
        $data->text = $event->message; // Текст сообщения
        $data->test = (int)config("app.debug");
        $sms = $smsru->send_one($data);

        SMSLogger::query()->create([
            "text"=>$event->message,
            "phone"=>$event->phone,
            "is_test"=>config("app.debug"),
            "status"=>$sms->status,
            "sms_id"=>$sms->sms_id,
            "balance"=>$sms->balance,
            "status_code"=>$sms->status_code,
            "status_text"=>$sms->status_text
        ]);
    }
}
