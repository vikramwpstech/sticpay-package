<?php

namespace Vikramwps\Sticpay\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Vikramwps\Sticpay\Entities\SticpayDeposit;
use Vikramwps\Sticpay\Exceptions\SticpayException;
use Vikramwps\Sticpay\Lib\SticpayRetCode;
use Vikramwps\Sticpay\Models\Sticpay as SticpayModel;

class SticpayController
{
    public function deposit($sticpay)
    {
        try{
            
            $sign = "merchant_email=".$sticpay->getMerchantEmail()."&order_no=".$sticpay->getOrderNo()."&order_time=".$sticpay->getOrderTime()."&order_amount=".$sticpay->getOrderAmount()."&order_currency=".$sticpay->getOrderCurrency()."&key=".$sticpay->getKey();

            $sticpay->setSign(MD5($sign));
            if($sticpay->getSignType() === 'SHA256'){
                $sticpay->setSign(hash("SHA256", $sign));
            }

            if (SELF::checkValidation($sticpay->getKey()) === false) {
                throw new SticpayException("Sticpay Key is required");
            }elseif (SELF::checkValidation($sticpay->getMerchantEmail()) === false) {
                throw new SticpayException("Merchant Email is required");
            }elseif (SELF::checkValidation($sticpay->getInterfaceVersion()) === false) {
                throw new SticpayException("Interface Version is required");
            }elseif (SELF::checkValidation($sticpay->getSignType()) === false) {
                throw new SticpayException("Sign Type is required");
            }elseif (SELF::checkValidation($sticpay->getOrderNo()) === false) {
                throw new SticpayException("Order No is required");
            }elseif (SELF::checkValidation($sticpay->getOrderTime()) === false) {
                throw new SticpayException("Invalid formate of Order Time");
            }elseif (!SELF::isValidDate($sticpay->getOrderTime())) {
                throw new SticpayException("Order Time is required");
            }elseif (SELF::checkValidation($sticpay->getOrderAmount()) === false) {
                throw new SticpayException("Order Amount is required");
            }elseif (SELF::checkValidation($sticpay->getOrderCurrency()) === false) {
                throw new SticpayException("Order Currency is required");
            }

            $product_info = [
                    'merchant_email '=> $sticpay->getMerchantEmail(),
                    'input_charset '=> $sticpay->getInputCharset(),
                    'sign_type '=> $sticpay->getSignType(),
                    'product_code '=> $sticpay->getProductCode(),
                    'product_name '=> $sticpay->getProductName(),
                    'product_quantity '=> $sticpay->getProductQuantity(),
                    'product_desc '=> $sticpay->getProductDesc(),
                    'full_name '=> $sticpay->getFullName(),
                    'extra_return_param '=> $sticpay->getExtraReturnParam(),
                    'registered_email '=> $sticpay->getRegisteredEmail()
                ];

            $product_info_json = json_encode($product_info);
            $aRow = SticpayModel::where("txn_id", $sticpay->getOrderNo())->doesntExist();
            if($aRow){
                $aData = [
                    'type'=> 0,
                    'client_id' => Auth::user()->client_id,
                    'txn_id' => $sticpay->getOrderNo(),
                    'amount' => $sticpay->getOrderAmount(),
                    'payment_currency' => $sticpay->getOrderCurrency(),
                    'ip_address' => $sticpay->getClientIp(),
                    'interface_version' => $sticpay->getInterfaceVersion(),
                    'product_info_json' => $product_info_json,
                    'status' => 0
                ];
                
                $res = SticpayModel::create($aData);
                
                if($res){
                    return view('sticpay::sticpay.form', compact('sticpay'));
                }
                
                throw new SticpayException("OOPS, Something went wrong!!");
            }
            
            throw new SticpayException("OOPS, Integrity constraint violation 1062 Duplicate entry '".$sticpay->getOrderNo()."'");
            
        }catch(Exception $exception){
            return response()->json(['success' => false, 'error' => $exception->getMessage()], 500);

        }
    }

    public static function success(Request $request)
    {
        try{
            //sticpay table update
            $aRes = $request->all();
            $aStatus = [0 => "Pending", 1 => "Processing", 2 => "Success", 3 => "Failed", 4 => "Cancelled"];
            $decodeRes = json_decode($aRes["callback"]);
            $getParameter = json_decode($decodeRes->parameters);
            $aCheck = SticpayModel::with("Client")->where("txn_id", $getParameter->order_no)->first();
            if(!is_null($aCheck)){
                $aCheck->update([
                    'status' => 2, 
                    'response_json' => $aRes,
                ]);
                
                $res = SticpayRetCode::GetError(SticpayRetCode::SP_RET_OK);

                return view('sticpay::sticpay.response', compact('aCheck', 'res', 'aStatus'));

            }
            
            throw new SticpayException("OOPS, Invalid Attempt!!");

        }catch(Exception $exception){
            return response()->json(['success' => false, 'error' => $exception->getMessage()], 500);
        }
    }

    public static function failed(Request $request)
    {
        try{
            //sticpay table update
            $aRes = $request->all();
            $aStatus = [0 => "Pending", 1 => "Processing", 2 => "Success", 3 => "Failed", 4 => "Cancelled"];
            $decodeRes = json_decode($aRes["callback"]);
            $getParameter = json_decode($decodeRes->parameters);
            $aCheck = SticpayModel::with("Client")->where("txn_id", $getParameter->order_no)->first();
            if(!is_null($aCheck)){
                $aCheck->update([
                    'status' => 3, 
                    'response_json' => $aRes,
                ]);
                
                $res = SticpayRetCode::GetError(SticpayRetCode::SP_RET_USER_CANCELLED);

                return view('sticpay::sticpay.response', compact('aCheck', 'res', 'aStatus'));

            }
            
            throw new SticpayException("OOPS, Invalid Attempt!!");

        }catch(Exception $exception){
            return response()->json(['success' => false, 'error' => $exception->getMessage()], 500);
        }
    }

    public static function referrer(Request $request)
    {
        try{
            //sticpay table update
            $aRes = $request->all();
            $aStatus = [0 => "Pending", 1 => "Processing", 2 => "Success", 3 => "Failed", 4 => "Cancelled"];
            $decodeRes = json_decode($aRes["callback"]);
            $getParameter = json_decode($decodeRes->parameters);
            $aCheck = SticpayModel::with("Client")->where("txn_id", $getParameter->order_no)->first();
            if(!is_null($aCheck)){
                $aCheck->update([
                    'status' => 4, 
                    'response_json' => $aRes,
                ]);
                
                $res = SticpayRetCode::GetError(SticpayRetCode::SP_RET_USER_CANCELLED);

                return view('sticpay::sticpay.response', compact('aCheck', 'res', 'aStatus'));

            }
            
            throw new SticpayException("OOPS, Invalid Attempt!!");

        }catch(Exception $exception){
            return response()->json(['success' => false, 'error' => $exception->getMessage()], 500);
        }
    }

    public static function payment_callback(Request $request)
    {
        //sticpay table update
        dd($request->all());
    }

    public static function withdraw($sticpay)
    {
        try{
            
            $sign = "merchant=".$sticpay->getMerchantEmail()."&customer=".$sticpay->getCustomerEmail()."&amount=".$sticpay->getAmount()."&currency_code=".$sticpay->getCurrencyCode()."&order_id=".$sticpay->getOrderId()."&interface_version=".$sticpay->getInterfaceVersion()."&key=".$sticpay->getKey();

            $sticpay->setSign(MD5($sign));
            if($sticpay->getSignType() === 'SHA256'){
                $sticpay->setSign(hash("SHA256", $sign));
            }
            
            if (SELF::checkValidation($sticpay->getKey()) === false) {
                throw new SticpayException("Sticpay Key is required");
            }elseif (SELF::checkValidation($sticpay->getMerchantEmail()) === false) {
                throw new SticpayException("Merchant Email is required");
            }elseif (SELF::checkValidation($sticpay->getInterfaceVersion()) === false) {
                throw new SticpayException("Interface Version is required");
            }elseif (SELF::checkValidation($sticpay->getSignType()) === false) {
                throw new SticpayException("Sign Type is required");
            }elseif (SELF::checkValidation($sticpay->getOrderId()) === false) {
                throw new SticpayException("Order ID is required");
            }elseif (SELF::checkValidation($sticpay->getAmount()) === false) {
                throw new SticpayException("Order Amount is required");
            }elseif (SELF::checkValidation($sticpay->getCurrencyCode()) === false) {
                throw new SticpayException("Currency Code is required");
            }
            
            $product_info = [
                'merchant_email '=> $sticpay->getMerchantEmail(),
                'customer_email '=> $sticpay->getCustomerEmail(),
                'order_id '=> $sticpay->getOrderId(),
                'sign_type '=> $sticpay->getSignType(),
            ];

            $product_info_json = json_encode($product_info);
            $aRow = SticpayModel::where("txn_id", $sticpay->getOrderId())->doesntExist();
            if($aRow){
                $aData = [
                    'type'=> 1,
                    'client_id' => Auth::user()->client_id,
                    'txn_id' => $sticpay->getOrderId(),
                    'amount' => $sticpay->getAmount(),
                    'payment_currency' => $sticpay->getCurrencyCode(),
                    'ip_address' => $_SERVER['REMOTE_ADDR'] ? $_SERVER['REMOTE_ADDR'] : request()->ip(),
                    'interface_version' => $sticpay->getInterfaceVersion(),
                    'product_info_json' => $product_info_json,
                    'status' => 0
                ];
                
                $res = SticpayModel::create($aData);
                
                if($res){

                    $params = $sticpay->jsonSerialize();
                    $url = 'https://api.sticpay.com/rest_withdraw/withdraw';

                    $client = new Client();

                    $response = $client->post($url, ['form_params' => $params]);
                    $data = $response->getBody()->getContents();
                    $responseData = json_decode($data, true);

                    if($responseData){
                        $res->update([
                            'status' => (($responseData["success"] == true) ? 2 : 4), 
                            'response_json' => $data,
                        ]);
                    }

                    return $res;
                }
                
                throw new SticpayException("OOPS, Something went wrong!!");
            }
            
            throw new SticpayException("OOPS, Integrity constraint violation 1062 Duplicate entry '".$sticpay->getOrderNo()."'");
            
        }catch(Exception $exception){
            throw $exception;
        }
    }

    public static function processView(View $view)
    {
        $viewData = $view->getData();
        return $view;
    }

    public static function checkValidation($param)
    {
        switch (true) {
            case empty($param):
                return false;
            default:
                return true;
        }
    }

    function isValidDate($dateString)
    {
        $dateFormat = 'Y-m-d H:i:s'; // Adjust the format based on your requirements

        $date = \DateTime::createFromFormat($dateFormat, $dateString);

        return $date && $date->format($dateFormat) === $dateString;
    }
}
