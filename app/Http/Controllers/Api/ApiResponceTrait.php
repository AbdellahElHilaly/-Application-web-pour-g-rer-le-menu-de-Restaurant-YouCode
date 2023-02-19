<?php

namespace App\Http\Controllers\Api;

use Hamcrest\Arrays\IsArray;

trait ApiResponceTrait
{
    public function apiResponse($data , $status = 200 , $message = "ok")
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
        return response($response);
    }





}
