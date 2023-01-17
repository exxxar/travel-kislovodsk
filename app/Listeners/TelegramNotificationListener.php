<?php

namespace App\Listeners;

use App\Enums\TelegramNotificationVerifiedType;
use App\Events\TelegramNotificationDocumentVerifiedEvent;
use App\Events\TelegramNotificationEvent;
use App\Events\TelegramNotificationProfileVerifiedEvent;
use App\Events\TelegramNotificationTourVerifiedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramNotificationListener
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
    public function handle($event)
    {
        if (is_null($event))
            return;


        $message = "Текст оповещения отсутствует!";

        $buttons = [];

        switch (get_class($event)) {
            case TelegramNotificationEvent::class:
                $message = $event->text;
                $this->sendMessage($message);
                break;

            case TelegramNotificationDocumentVerifiedEvent::class:
                $document = $event->object;

                $message = "Документ: " . $document->title . "\n";
                $message .= "Путь: " . config("app.url") . $document->path . "\n";
                $message .= "Размер: " . $document->size . "байт\n";

                $buttons = [
                    [
                        ["text" => "Подтвердить документ", "url" => config("app.url") . "/admin/accept-document/" . $document->id]
                    ],
                    [
                        ["text" => "Отклонить документ", "url" => config("app.url") . "/admin/decline-document/" . $document->id]
                    ]
                ];

                $this->sendMessage($message, $buttons);
                break;

            case  TelegramNotificationProfileVerifiedEvent::class:

                $company = $event->object;

                $message = "Название компании: " . $company->title . "\n";
                $message .= "Описание компании: " . $company->description . "\n";
                $message .= "Изображение: " . $company->photo . "\n";
                $message .= "ИНН: " . $company->inn . "\n";
                $message .= "ОГРН: " . $company->ogrn . "\n";
                $message .= "Юридический адрес: " . $company->law_address . "\n";

                $buttons = [
                    [
                        ["text" => "Подтвердить профиль", "url" => config("app.url") . "/admin/accept-profile/" . $company->id]
                    ],
                    [
                        ["text" => "Отклонить профиль", "url" => config("app.url") . "/admin/decline-profile/" . $company->id]
                    ]
                ];
                $this->sendMessage($message, $buttons);
                break;

            case TelegramNotificationTourVerifiedEvent::class:

                $tour = $event->object;

                $message = "№ тура: " . $tour->id . "\n";
                $message .= "Название тура: " . $tour->title . "\n";

                $buttons = [
                    [
                        ["text" => "Просмотреть тур через сайт", "url" => config("app.url") . "/tour/" . $tour->id]
                    ],
                    [
                        ["text" => "Подтвердить тур", "url" => config("app.url") . "/admin/accept-profile/" . $tour->id]
                    ],
                    [
                        ["text" => "Отклонить тур", "url" => config("app.url") . "/admin/decline-profile/" . $tour->id]
                    ]
                ];

                try {
                    $mpdf = new \Mpdf\Mpdf();
                    $mpdf->WriteHTML(
                        view("pdf.tour",
                            [
                                "tour" => (object)$tour,
                            ]
                        )
                    );
                }catch (\Exception $e){
                    dd($e->getMessage());
                }

                $data = $mpdf->Output("tour.pdf", "S");

                $this->sendDocument($message,
                    InputFile::createFromContents($data, "tour-#".$tour->id.".pdf"),
                    $buttons
                );
                break;

        }

    }

    private function sendMessage($message, $buttons = []){
        return Telegram::sendMessage([
            'chat_id' => env("ADMIN_TELEGRAM_CHANNEL"),
            'text' => $message,
            'parse_mode' => 'Html',
            'reply_markup' => json_encode([
                'inline_keyboard' => $buttons
            ])
        ]);
    }

    private function sendDocument($message, $document, $buttons = []){
        return Telegram::sendDocument([
            'chat_id' => env("ADMIN_TELEGRAM_CHANNEL"),
            "document" => $document,
            "caption" => $message,
            'parse_mode' => 'Html',
            'reply_markup' => json_encode([
                'inline_keyboard' => $buttons
            ])
        ]);
    }
}
