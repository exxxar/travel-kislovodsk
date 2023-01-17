<?php

namespace App\Http\Controllers;

use App\Enums\PayMasterPaymentStatusEnum;
use App\Events\TelegramNotificationEvent;
use App\Mail\NotifyMail;
use App\Mail\RegistrationMail;
use App\Models\Dictionary;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    //

    public function callback(Request $request)
    {
        return redirect()->route("page.user-cabinet");
    }


    public function notification(Request $request)
    {
        $obj = (object)$request->all();

        $transactionId = $obj->invoice["orderNo"] ?? null;


        if (!is_null($transactionId)) {
            $transaction = Transaction::query()
                ->with(["user"])
                ->find($transactionId);

            switch (PayMasterPaymentStatusEnum::from($obj->status)) {
                case PayMasterPaymentStatusEnum::CONFIRMATION:
                case PayMasterPaymentStatusEnum::SETTLED:
                    $status_text = "Успешно!";
                    $status_id = (Dictionary::getTransactionTypes()
                        ->where("slug", "transaction_payed_type")
                        ->first())
                        ->id;
                    break;
                case PayMasterPaymentStatusEnum::REJECTED:
                case PayMasterPaymentStatusEnum::CANCELLED:
                case PayMasterPaymentStatusEnum::AUTHORIZED:
                    $status_text = "Отклонено!";

                    $status_id = (Dictionary::getTransactionTypes()
                        ->where("slug", "transaction_discard_type")
                        ->first())
                        ->id;
                    break;

                case PayMasterPaymentStatusEnum::PENDING:
                    $status_text = "Ожидается оплата!";

                    $status_id = (Dictionary::getTransactionTypes()
                        ->where("slug", "transaction_in_progress_type")
                        ->first())
                        ->id;
                    break;
            }

            $transaction->status_type_id = $status_id;
            $transaction->payment_method = $obj->paymentData["paymentMethod"] ?? 'BankCard';
            $transaction->payment_instrument = $obj->paymentData["paymentInstrumentTitle"] ?? '-';
            $transaction->save();

            $text = "Ваша транзакция прошла со статусом '$status_text'. Спасибо что используете наш сервис.";

            $email = $transaction->user->email;
            $amount = $transaction->amount ?? 0;

            Mail::to($email)
                ->send(new NotifyMail($text));

            $text = "Транзакция пользователя $email в размере $amount руб проведена со статусом '$status_text'";
            event(new TelegramNotificationEvent($text));
        }


        return response()->noContent();
    }

    public function invoice(Request $request)
    {
        Log::info("test 1 invoice");
        Log::info("test 2 invoice" . print_r($request->json(), true));
        return "ok";
    }

    public function success(Request $request)
    {
        Log::info("test 1 success");
        Log::info("test 2 success" . print_r($request->json(), true));
        return "ok";
    }

    public function failure(Request $request)
    {
        Log::info("test 1 failure");
        Log::info("test 2 failure" . print_r($request->json(), true));
        return "ok";
    }


}
