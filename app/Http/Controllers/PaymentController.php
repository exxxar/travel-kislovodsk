<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    //

    public function callback(Request $request)
    {
        Log::info("test callback".print_r($request->toArray()));
        return "ok";
    }


    public function notification(Request $request)
    {
        Log::info("test notification".print_r($request->toArray()));
        return "ok";
    }

    public function invoice(Request $request)
    {
        Log::info("test invoice".print_r($request->toArray()));
        return "ok";
    }

    public function success(Request $request)
    {
        Log::info("test success".print_r($request->toArray()));
        return "ok";
    }

    public function failure(Request $request)
    {
        Log::info("test failure".print_r($request->toArray()));
        return "ok";
    }


}
