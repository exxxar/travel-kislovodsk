<?php

namespace App\Classes\PayMaster;

use App\Enums\PayMasterPaymentMethodsEnum;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PayMaster
{

    public function payment()
    {
        return $this;
    }

    public function createInvoiceLink(float                       $value,
                                      int                         $transactionId = null,
                                      string                      $description = "Бронирование тура",
                                      PayMasterPaymentMethodsEnum $paymentMethod = PayMasterPaymentMethodsEnum::BANKCARD): object
    {
        $idempotencyKey = Str::uuid();

        $user = User::query()->find(Auth::user()->id);

        $url = config("paymaster.url");
        $token = config("paymaster.token");
        $merchantId = config("paymaster.merchant_id");
        $returnURL = config("paymaster.return_url");
        $callbackURL = config("paymaster.callback_url");


        $response = Http::withHeaders([
            'Authorization' => "Bearer $token",
            'Idempotency-Key' => $idempotencyKey->toString(),
            'Content-Type' => ' application/json',
            'Accept' => 'application/json',
        ])->post("$url/api/v2/invoices", [
            'merchantId' => $merchantId,
            'invoice' => [
                'description' => $description,
                'orderNo' => "$transactionId",

            ],
            'testMode' => env("APP_DEBUG"),
            'amount' => [
                'value' => $value,
                'currency' => "RUB"
            ],

            /*   "paymentData" => [
           "paymentMethod"=> "BankCard",
       "card"=>[
               "pan"=> "4111111111111111",
         "expiry"=> "12/24",
         "cvc"=> "123"
       ]
     ]*/
            "paymentMethod" => $paymentMethod->value,
            "protocol" => [
                "returnURL" => "$returnURL",
                "callbackURL" => "$callbackURL",
            ],
            'customer' => [
                'email' => $user->email,
                //'phone' => $user->phone,
                'account' => $user->name
            ],
            /*'receipt' => [
                'client' => [
                    'email' => $user->email,
                    //'phone' => $user->phone,
                ],
                'items' => [
                    [
                        "name" => 'Оплата услуг Агента бронирования тура',
                        "quantity" => 1,
                        "price" => $value,
                        "vatType" => config("paymaster.vat_type"),
                        "paymentSubject" => config("paymaster.payment_subject"),
                        "paymentMethod" => config("paymaster.payment_method"),
                    ]
                ]
            ]*/
        ]);


        return $response->object();
    }

}
