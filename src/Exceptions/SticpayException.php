<?php

namespace Vikramwps\Sticpay\Exceptions;

use Exception;

class SticpayException extends Exception
{
    /**
     * SticpayException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Exception|null $previous
     */
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Report or log the exception.
     *
     * @return void
     */
    public function report()
    {
        // You can add custom logging or reporting logic here
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request)
    {
        return response()->json(['error' => $this->getMessage()], 500);
    }
}
