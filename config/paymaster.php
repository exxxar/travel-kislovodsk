<?php

return [
    'vat_type' => env("PAYMASTER_VAT_TYPE", 'None'),
    'payment_subject' => env("PAYMASTER_PAYMENT_SUBJECT", 'Payment'),
    'payment_method' => env("PAYMASTER_PAYMENT_METHOD", 'FullPayment'),
    'url' => env("PAYMASTER_URL", 'https://paymaster.ru'),
    'token' => env("PAYMASTER_TOKEN", ''),
    'merchant_id' => env("PAYMASTER_MERCHANT_ID", ''),
    'return_url' => env("PAYMASTER_RETURN_URL", ''),
    'callback_url' => env("PAYMASTER_CALLBACK_URL", ''),
];
