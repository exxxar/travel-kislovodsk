<?php

namespace App\Classes;

use App\Enums\PayMasterPaymentMethods;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PayMaster
{

    public static function createInvoiceLink(float $value,
                                             string $description,
                                             PayMasterPaymentMethods $paymentMethod): object
    {
        $idempotencyKey = Str::uuid();

        $url = config("paymaster.url");
        $token = config("paymaster.token");
        $merchantId = config("paymaster.merchant_id");

        $response = Http::withHeaders([
            'Authorization' => "Bearer $token",
            'Idempotency-Key' => $idempotencyKey,
            'Content-Type' => ' application/json',
            'Accept' => 'application/json',
        ])->post("$url/api/v2/invoices", [
            'merchantId' => $merchantId,
            'invoice' => [
                'description' => $description,
                'params' => [
                    "USER" => Auth::user()->id
                ]
            ],
            'amount' => [
                'value' => $value,
                'currency' => "RUB"
            ],
            "paymentMethod" => $paymentMethod->value,
            "protocol"=>[
                "returnURL"=>'',
                "callbackURL"=>'',

            ]
        ]);


        return $response->object();
    }

}
