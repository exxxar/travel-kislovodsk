<?php

namespace App\Listeners;

use App\Events\ActionNotificationEvent;
use App\Events\ChatNotificationEvent;
use App\Models\User;
use Appy\FcmHttpV1\FcmNotification;
use Appy\FcmHttpV1\FcmTopicHelper;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class ActionNotificationListener
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
    public function handle(ActionNotificationEvent $event)
    {

        if (is_null($event))
            return;

        try {
            $token = User::find(Auth::user()->id)->device_key;

            FcmTopicHelper::subscribeToTopic([$token], "general");
            $notif = new FcmNotification;
            $notif->setTitle($event->type)
                ->setBody(json_encode($event->data ?? []))
                ->setTopic("general")->send();
        } catch (\Exception $e) {

        }

    }
}
