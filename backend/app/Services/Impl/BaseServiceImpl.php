<?php

namespace App\Services\Impl;

use Barryvdh\DomPDF\Facade\Pdf;

class BaseServiceImpl
{
    public function sendResponse($response = false, $code = 404, $message = null, $data = []) {
        return response()->json([
            "status" => $response,
            "message" => $message,
            "data" => $data,
        ], $code);
    }
    public function pdfGenerator($html = null, $paper_size = "a4", $orientation = "landscape", $warnings = false, $file_name = "temp", $format = "pdf"){
        return Pdf::loadHTML($html)->setPaper($paper_size, $orientation)->setWarnings($warnings)->save($file_name.'.'.$format);
    }
}
