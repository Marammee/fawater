<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Traits\ApiResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    // use ApiResponse;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return ApiResponse::validationError($exception->errors(), $exception->getMessage());
        }

        if ($exception instanceof AuthenticationException) {
            return ApiResponse::unauthorized($exception->getMessage());
        }

        if ($exception instanceof NotFoundHttpException) {
            return ApiResponse::notFound('Resource not found');
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return ApiResponse::error('Method not allowed', 405);
        }

        return ApiResponse::error($exception->getMessage(), $exception->getCode() ?: 500);
    }
}

// namespace App\Exceptions;

// use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
// use Throwable;

// class Handler extends ExceptionHandler
// {
//     /**
//      * A list of exception types with their corresponding custom log levels.
//      *
//      * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
//      */
//     protected $levels = [
//         //
//     ];

//     /**
//      * A list of the exception types that are not reported.
//      *
//      * @var array<int, class-string<\Throwable>>
//      */
//     protected $dontReport = [
//         //
//     ];

//     /**
//      * A list of the inputs that are never flashed to the session on validation exceptions.
//      *
//      * @var array<int, string>
//      */
//     protected $dontFlash = [
//         'current_password',
//         'password',
//         'password_confirmation',
//     ];

//     /**
//      * Register the exception handling callbacks for the application.
//      */
//     public function register(): void
//     {
//         $this->reportable(function (Throwable $e) {
//             //
//         });
//     }
// }
