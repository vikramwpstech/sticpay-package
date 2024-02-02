<?php

use Vikramwps\Sticpay\Http\Controllers\SticpayController;

Route::group(['prefix' => 'sticpay'], function() {
    Route::get('/', [SticpayController::class, 'index'])->middleware('auth');
    Route::post('success', [SticpayController::class, 'success']);
    Route::post('failed', [SticpayController::class, 'failed']);
    Route::post('referrer', [SticpayController::class, 'referrer']);
    Route::get('payment_callback', [SticpayController::class, 'payment_callback']);
});