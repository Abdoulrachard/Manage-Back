<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * BaseResponse
 */
trait BaseResponse
{
    public static function success(mixed $data = [], int $status = 200): JsonResponse
    {
        $response = [
            'data' => $data,
            'status' => $status,
            'message' => "All Post retrieved successfully"
        ];

        return response()->json($response);
    }

    public static function fail(array $data = [], int $status = 400): JsonResponse
    {
        $response = [
            'data' => $data,
            'status' => $status,
            'message' => "fail to retrieve Posts"
        ];

        return response()->json($response);
    }
}
