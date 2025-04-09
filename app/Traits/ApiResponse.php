<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    // Base response method
    private static function baseResponse(string $status, string $message,  $data = [], int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    // Success response
    public static function success($data = [], string $message = "Success", int $statusCode = 200): JsonResponse
    {
        return self::baseResponse('success', $message, $data, $statusCode);
    }

    // Error response
    public static function error(string $message = "Something went wrong", int $statusCode = 500,  $errors = []): JsonResponse
    {
        return self::baseResponse('error', $message, $errors, $statusCode);
    }

    // Unauthorized response
    public static function unauthorized(string $message = "Unauthorized"): JsonResponse
    {
        return self::error($message, 401);
    }

    // Forbidden response
    public static function forbidden(string $message = "Forbidden"): JsonResponse
    {
        return self::error($message, 403);
    }

    // Not found response
    public static function notFound(string $message = "Resource not found"): JsonResponse
    {
        return self::error($message, 404);
    }

    // Conflict response
    public static function conflict(string $message = "Conflict detected"): JsonResponse
    {
        return self::error($message, 409);
    }

    // Validation error response
    public static function validationError($errors = [], string $message = "Validation failed"): JsonResponse
    {
        return self::error($message, 422, $errors);
    }

    // Created response
    public static function created($data = [], string $message = "Created successfully", int $statusCode = 201): JsonResponse
    {
        return self::success($data, $message, $statusCode);
    }

    // Updated response
    public static function updated($data = [], string $message = "Updated successfully", int $statusCode = 200): JsonResponse
    {
        return self::success($data, $message, $statusCode);
    }

    // Deleted response
    public static function deleted(string $message = "Deleted successfully", int $statusCode = 200): JsonResponse
    {
        return self::success([], $message, $statusCode);
    }

    // Show response
    public static function show($data = [], string $message = "Success", int $statusCode = 200): JsonResponse
    {
        return self::success($data, $message, $statusCode);
    }
}
