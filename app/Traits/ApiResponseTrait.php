<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    protected function successReponse($data = null, string $message = 'Success', int $status = 200) : JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    protected function errorResponse(string $message = 'Error', int $status = 400, $errors = null) : JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }

    // protected function unauthorizedResponse(string $message = 'Unauthorized') : JsonResponse
    // {
    //     return $this->errorResponse($message, 401);
    // }

    protected function validationErrorResponse($errors): JsonResponse
    {
        return $this->errorResponse('Validation error', 422, $errors);
    }
}
