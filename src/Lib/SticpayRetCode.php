<?php
namespace Vikramwps\Sticpay\Lib;

class SticpayRetCode
{
    const SP_RET_OK_PROCESSING = -1; //Processing
    const SP_RET_OK = 0; // PAY request was successful.
    const SP_RET_USER_CANCELLED = 1; // PAY request was canceled by the user.
    const SP_RET_PAYMENT_EXPIRED = 100; // Payment request expired
    const SP_RET_CUSTOMER_NOT_FOUND = 200; // Customer not found
    const SP_RET_MERCHANT_NOT_FOUND = 300; // Merchant not found
    const SP_RET_ILLEGAL_TRANSFER = 400; // Illegal Transfer, a merchant cannot be the sender
    const SP_RET_TRA_AMT_LOWER_MIN_ALLOWED = 410; // Transaction amount is lower than the minimum allowed
    const SP_RET_TRA_AMT_HIGHER_MAX_ALLOWED = 411; // Transaction amount is higher than the maximum allowed
    const SP_RET_USER_DAILY_AMOUNT_LIMIT_REACHED = 412; // User reached its daily transaction amount limit
    const SP_RET_USER_MONTHLY_AMOUNT_LIMIT_REACHED = 413; // User reached its monthly transaction amount limit
    const SP_RET_USER_YEARLY_AMOUNT_LIMIT_REACHED = 414; // User reached its yearly transaction amount limit
    const SP_RET_TRANSACTION_BREAKS_USER_LIMIT = 415; // The transaction breaks the user's limits
    const SP_RET_THIS_TYPE_OF_TRANSFER_NOT_ALLOWED = 416; // This type of transfer is not allowed
    const SP_RET_RECIPIENT_NOT_VERIFIED_YET = 417; // The receipts is not verified yet, and the transaction exceeds allowed limits
    const SP_RET_CUSTOMER_WALLET_NOT_FOUND= 500; // Customer Wallet Not Found
    const SP_RET_MERCHANT_WALLET_NOT_FOUND = 501; // Merchant Wallet Not Found
    const SP_RET_DATABASE_ERROR = 600; // Database error. Could not execute the transfer
    const SP_RET_INSUFFICIENT_CUSTOMER_BALANCE = 700; // Insufficient Customer Balance
    const SP_RET_MERCHANT_INSUFFICIENT_FUNDS = 701; // Merchant Insufficient Funds
    const SP_RET_INVALID_PARAMETER = 800; // Invalid parameter
    const SP_RET_PARAMETER_X_MUST_BE_INTEGER = 801; // Parameter X must be an integer
    const SP_RET_PARAMETER_X_MUST_BE_STRING = 802; // Parameter X must be a string
    const SP_RET_PARAMETER_X_MUST_BE_FLOAT = 803; // Parameter X must be a float
    const SP_RET_PARAMETER_X_MUST_BE_DATE= 804; // Parameter X must be a date
    const SP_RET_PARAMETER_X_MUST_BE_EMAIL = 805; // Parameter X must be an email
    const SP_RET_PARAMETER_X_MUST_BE_IP_ADDRESS = 806; // Parameter X must be an ip address
    const SP_RET_PARAMETER_X_MUST_BE_SUPPORTED_CURRENCY = 807; // Parameter X must be a supported currency
    const SP_RET_PARAMETER_X_MUST_BE_URL = 808; // Parameter X must be a url
    const SP_RET_MERCHANT_SIGNATURE_INVALID= 809; // Merchant signature is invalid
    const SP_RET_PARAMETER_X_REQUIRED = 850; // Parameter X is required
    const SP_RET_COULD_NOT_PROCESS_PAYMENT_WITH_SUPPLIED_PARAMTER = 900; // Could not process the payment with the supplied parameter
    const SP_RET_MERCHANT_API_DISABLED = 1000; // Merchant API is disabled
    const SP_RET_MERCHANT_CALLBACK_URL_NOT_FOUND = 1100; // Could not find Merchant 'callback_url' in the payment request, neither in merchant api settings
    const SP_RET_API_CALL_COMING_FROM_WHITELISTED_IP_ADDRESS = 1200; // The rest API call should be coming from whitelisted IP addresses
    const SP_RET_ORDER_NO_ALREADY_USED_BY_MERCHANT = 1300; // The order_no is already used by the merchant
    const SP_RET_TRANSACTION_ID_NOT_FOUND = 1400; // Transaction ID/No was not found
    const SP_RET_ORDER_ID_NOT_FOUND = 1401; // Order ID/No was not found
    const SP_RET_TRANSACTION_NOT_REFUNDABLE = 1402; // The transaction is not refundable
    const SP_RET_REGISTERED_EMAIL_NOT_MATCH_WITH_USER_EMAIL = 1500; // User registered email does not match with Sticpay user email
    

    /**
     * Get error string by code
     * @static
     * @param SticpayRetCode $error_code
     * @return string error
     */
    public static function GetError($error_code)
    {
        switch ($error_code) {
            case SticpayRetCode::SP_RET_OK_PROCESSING                    :
                return 'Request processed';
            case SticpayRetCode::SP_RET_OK               :
                return 'PAY request was successful';
            case SticpayRetCode::SP_RET_USER_CANCELLED               :
                return 'PAY request was canceled by the user';
            case SticpayRetCode::SP_RET_PAYMENT_EXPIRED               :
                return 'Payment request expired';
            case SticpayRetCode::SP_RET_CUSTOMER_NOT_FOUND               :
                return 'Customer Not found';
            case SticpayRetCode::SP_RET_MERCHANT_NOT_FOUND               :
                return 'Merchant Not found';
            case SticpayRetCode::SP_RET_ILLEGAL_TRANSFER               :
                return 'Illegal Transfer, a merchant cannot be the sender';
            case SticpayRetCode::SP_RET_TRA_AMT_LOWER_MIN_ALLOWED               :
                return 'Transaction amount is lower than the minimum allowed';
            case SticpayRetCode::SP_RET_TRA_AMT_HIGHER_MAX_ALLOWED               :
                return 'Transaction amount is higher than the maximum allowed';
            case SticpayRetCode::SP_RET_USER_DAILY_AMOUNT_LIMIT_REACHED               :
                return 'User reached its daily transaction amount limit';
            case SticpayRetCode::SP_RET_USER_MONTHLY_AMOUNT_LIMIT_REACHED               :
                return 'User reached its monthly transaction amount limit';
            case SticpayRetCode::SP_RET_USER_YEARLY_AMOUNT_LIMIT_REACHED               :
                return 'User reached its yearly transaction amount limit';
            case SticpayRetCode::SP_RET_TRANSACTION_BREAKS_USER_LIMIT               :
                return 'The transaction breaks the user\'s limits';
            case SticpayRetCode::SP_RET_THIS_TYPE_OF_TRANSFER_NOT_ALLOWED               :
                return 'This type of transfer is not allowed';
            case SticpayRetCode::SP_RET_RECIPIENT_NOT_VERIFIED_YET               :
                return 'The receipts is not verified yet, and the transaction exceeds allowed limits';
            case SticpayRetCode::SP_RET_CUSTOMER_WALLET_NOT_FOUND               :
                return 'Customer Wallet Not Found';
            case SticpayRetCode::SP_RET_MERCHANT_WALLET_NOT_FOUND               :
                return 'Merchant Wallet Not Found';
            case SticpayRetCode::SP_RET_DATABASE_ERROR               :
                return 'Database error. Could not execute the transfer';
            case SticpayRetCode::SP_RET_INSUFFICIENT_CUSTOMER_BALANCE               :
                return 'Insufficient Customer Balance';
            case SticpayRetCode::SP_RET_MERCHANT_INSUFFICIENT_FUNDS               :
                return 'Merchant Insufficient Funds';
            case SticpayRetCode::SP_RET_INVALID_PARAMETER               :
                return 'Invalid parameter';
            case SticpayRetCode::SP_RET_PARAMETER_X_MUST_BE_INTEGER               :
                return 'Parameter X must be an integer';
            case SticpayRetCode::SP_RET_PARAMETER_X_MUST_BE_STRING               :
                return 'Parameter X must be a string';
            case SticpayRetCode::SP_RET_PARAMETER_X_MUST_BE_FLOAT               :
                return 'Parameter X must be a float';
            case SticpayRetCode::SP_RET_PARAMETER_X_MUST_BE_DATE               :
                return 'Parameter X must be a date';
            case SticpayRetCode::SP_RET_PARAMETER_X_MUST_BE_EMAIL               :
                return 'Parameter X must be an email';
            case SticpayRetCode::SP_RET_PARAMETER_X_MUST_BE_IP_ADDRESS               :
                return 'Parameter X must be an ip address';
            case SticpayRetCode::SP_RET_PARAMETER_X_MUST_BE_SUPPORTED_CURRENCY               :
                return 'Parameter X must be a supported currency';
            case SticpayRetCode::SP_RET_PARAMETER_X_MUST_BE_URL               :
                return 'Parameter X must be a url';
            case SticpayRetCode::SP_RET_MERCHANT_SIGNATURE_INVALID               :
                return 'Merchant signature is invalid';
            case SticpayRetCode::SP_RET_PARAMETER_X_REQUIRED               :
                return 'Parameter X is required';
            case SticpayRetCode::SP_RET_COULD_NOT_PROCESS_PAYMENT_WITH_SUPPLIED_PARAMTER               :
                return 'Could not process the payment with the supplied parameter';
            case SticpayRetCode::SP_RET_MERCHANT_API_DISABLED               :
                return 'Merchant API is disabled';
            case SticpayRetCode::SP_RET_MERCHANT_CALLBACK_URL_NOT_FOUND               :
                return 'Could not find Merchant \'callback_url\' in the payment request, neither in merchant api settings';
            case SticpayRetCode::SP_RET_API_CALL_COMING_FROM_WHITELISTED_IP_ADDRESS               :
                return 'The rest API call should be coming from whitelisted IP addresses';
            case SticpayRetCode::SP_RET_ORDER_NO_ALREADY_USED_BY_MERCHANT               :
                return 'The order_no is already used by the merchant';
            case SticpayRetCode::SP_RET_TRANSACTION_ID_NOT_FOUND               :
                return 'Transaction ID/No was not found';
            case SticpayRetCode::SP_RET_ORDER_ID_NOT_FOUND               :
                return 'Order ID/No was not found';
            case SticpayRetCode::SP_RET_TRANSACTION_NOT_REFUNDABLE               :
                return 'The transaction is not refundable';
            case SticpayRetCode::SP_RET_REGISTERED_EMAIL_NOT_MATCH_WITH_USER_EMAIL               :
                return 'User registered email does not match with Sticpay user email';
        }
        return "unknown error";
    }
}

?>
