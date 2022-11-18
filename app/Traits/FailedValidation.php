<?php

namespace App\Traits;

use App\Exceptions\ExceptionAPI;
use Illuminate\Contracts\Validation\Validator;

trait FailedValidation
{
    protected function failedAuthorization()
    {
        return throw new ExceptionAPI(json_encode([
            "auth_error"=>["Need authorization"]
        ]), 400);
    }

    protected function failedValidation(Validator $validator)
    {
        if ($validator->fails()) {
            $errors = json_encode($validator->getMessageBag()->getMessages());

            return throw new ExceptionAPI($errors, 400);
        }

    }
}
