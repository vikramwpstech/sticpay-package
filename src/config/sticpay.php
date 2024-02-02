<?php

return [
    'STICPAY_KEY' => env('STICPAY_KEY', null),
    'STICPAY_MERCHANT_EMAIL' => env('STICPAY_MERCHANT_EMAIL', 'test-merchant206@sticpay.com'),
    'STICPAY_INTERFACE_VERSION' => env('STICPAY_INTERFACE_VERSION', 'sandbox'), //sandbox or live
    'STICPAY_SIGN_TYPE' => env('STICPAY_SIGN_TYPE', 'MD5'), //MD5 or SHA256
];
