<?php

namespace App\Exceptions;

use Exception;

class ExceptionAPI extends Exception
{


    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            "errors" => json_decode($this->message)
        ], $this->code);
    }
}
