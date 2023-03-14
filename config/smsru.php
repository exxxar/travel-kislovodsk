<?php

return [
    'api_key' => env("SMSRU_API_KEY", ''),
    'count_repeat' => env("SMSRU_COUNT_REPEAT", 5),
    'domain' => env("SMSRU_DOMAIN", 'sms.ru'),
    'protocol' => env("SMSRU_PROTOCOL", 'https'),
    'is_test' => env("SMSRU_IS_TEST", 1),
];
