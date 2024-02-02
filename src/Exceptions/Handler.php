<?php

namespace Vikramwps\Sticpay\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\JsonResponse;
use Vikramwps\Sticpay\Exceptions\SticpayException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param Throwable               $exception
     *
     * @return JsonResponse
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof SticpayException) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }

        return parent::render($request, $exception);
    }
}
