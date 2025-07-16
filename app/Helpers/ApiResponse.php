<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($message = 'Success', $data = [], $status = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    public static function error($message = 'Something went wrong.', $errors = [], $status = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], $status);
    }
}
