<?php

namespace App\Console\Commands;

use App\Events\SMSNotificationEvent;
use App\Mail\NotifyMail;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TourNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tour:notify {-force?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Автоматическое напоминание по турам';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //проверить есть ли оповещение у тура
        //проверка есть ли оповещение у пользователя
        //

        $force = !is_null($this->argument('-force')) ? true : false;

        $bookings = Booking::query()
            ->with(["tour", "user", "schedule"])
            ->whereHas("tour", function ($q) {
                $q->where("need_email_notification", true)
                    ->orWhere("need_sms_notification", true);
            })
            ->whereHas("user", function ($q) {
                $q->where("email_notification", true)
                    ->orWhere("sms_notification", true);
            })
            ->whereHas("schedule", function ($q) {
                $q->where("start_at", ">", Carbon::now()->format('Y-m-d H:m'));
            })
            ->get();


        foreach ($bookings as $booking) {
            $message = "Оповещение о начале " . ($booking->tour->title ?? 'Не указано') . " тура!";

            if ($booking->tour->need_email_notification &&
                $booking->user->email_notification
            ) {
                Mail::to($booking->user->email)->send(new NotifyMail($message));
            }

            if ($booking->tour->need_sms_notification &&
                $booking->user->sms_notification
            ) {
                event(new SMSNotificationEvent($booking->user->phone, $message));

            }

            if ($force) {
                Mail::to($booking->user->email)->send(new NotifyMail($message));
                event(new SMSNotificationEvent($booking->user->phone, $message));
            }
        }

        return Command::SUCCESS;
    }
}
