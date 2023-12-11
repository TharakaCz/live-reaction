<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendResponse($response = false, $code = 404, $message = null, $data = []) {
        return response()->json([
            "status" => $response,
            "message" => $message,
            "data" => $data,
        ], $code);
    }
}
