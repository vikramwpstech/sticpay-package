<?php


namespace Vikramwps\Sticpay\Entities;


/**
 * Class User
 * @package Vikramwps\Sticpay\Entities
 */
class SticpayDeposit
{
    protected $key;
    protected $merchant_email;
    protected $interface_version;
    protected $input_charset;
    protected $sign_type;
    protected $order_no;
    protected $order_time;
    protected $order_amount;
    protected $order_currency;
    protected $sign;
    protected $product_code;
    protected $product_name;
    protected $product_quantity;
    protected $product_desc;
    protected $client_ip;
    protected $full_name;
    protected $extra_return_param;
    protected $registered_email;
    protected $success_url;
    protected $failure_url;
    protected $callback_url;
    protected $referrer_url;

	public function __constructor($key, $merchant_email, $interface_version, $input_charset, $sign_type, $order_no, $order_time, $order_amount, $order_currency, $sign, $product_code, $product_name, $product_quantity, $product_desc, $client_ip, $full_name, $extra_return_param, $registered_email, $success_url, $failure_url, $callback_url, $referrer_url) {

		$this->key = $key;
		$this->merchant_email = $merchant_email;
		$this->interface_version = $interface_version;
		$this->input_charset = $input_charset;
		$this->sign_type = $sign_type;
		$this->order_no = $order_no;
		$this->order_time = $order_time;
		$this->order_amount = $order_amount;
		$this->order_currency = $order_currency;
		$this->sign = $sign;
		$this->product_code = $product_code;
		$this->product_name = $product_name;
		$this->product_quantity = $product_quantity;
		$this->product_desc = $product_desc;
		$this->client_ip = $client_ip;
		$this->full_name = $full_name;
		$this->extra_return_param = $extra_return_param;
		$this->registered_email = $registered_email;
		$this->success_url = $success_url;
		$this->failure_url = $failure_url;
		$this->callback_url = $callback_url;
		$this->referrer_url = $referrer_url;
	}

	public function getKey() {
		return $this->key;
	}

	public function setKey($value) {
		$this->key = $value;
	}

	public function getMerchantEmail() {
		return $this->merchant_email;
	}

	public function setMerchantEmail($value) {
		$this->merchant_email = $value;
	}

	public function getInterfaceVersion() {
		return $this->interface_version;
	}

	public function setInterfaceVersion($value) {
		$this->interface_version = $value;
	}

	public function getInputCharset() {
		return $this->input_charset;
	}

	public function setInputCharset($value) {
		$this->input_charset = $value;
	}

	public function getSignType() {
		return $this->sign_type;
	}

	public function setSignType($value) {
		$this->sign_type = $value;
	}

	public function getOrderNo() {
		return $this->order_no;
	}

	public function setOrderNo($value) {
		$this->order_no = $value;
	}

	public function getOrderTime() {
		return $this->order_time;
	}

	public function setOrderTime($value) {
		$this->order_time = $value;
	}

	public function getOrderAmount() {
		return $this->order_amount;
	}

	public function setOrderAmount($value) {
		$this->order_amount = $value;
	}

	public function getOrderCurrency() {
		return $this->order_currency;
	}

	public function setOrderCurrency($value) {
		$this->order_currency = $value;
	}

	public function getSign() {
		return $this->sign;
	}

	public function setSign($value) {
		$this->sign = $value;
	}

	public function getProductCode() {
		return $this->product_code;
	}

	public function setProductCode($value) {
		$this->product_code = $value;
	}

	public function getProductName() {
		return $this->product_name;
	}

	public function setProductName($value) {
		$this->product_name = $value;
	}

	public function getProductQuantity() {
		return $this->product_quantity;
	}

	public function setProductQuantity($value) {
		$this->product_quantity = $value;
	}

	public function getProductDesc() {
		return $this->product_desc;
	}

	public function setProductDesc($value) {
		$this->product_desc = $value;
	}

	public function getClientIp() {
		return $this->client_ip;
	}

	public function setClientIp($value) {
		$this->client_ip = $value;
	}

	public function getFullName() {
		return $this->full_name;
	}

	public function setFullName($value) {
		$this->full_name = $value;
	}

	public function getExtraReturnParam() {
		return $this->extra_return_param;
	}

	public function setExtraReturnParam($value) {
		$this->extra_return_param = $value;
	}

	public function getRegisteredEmail() {
		return $this->registered_email;
	}

	public function setRegisteredEmail($value) {
		$this->registered_email = $value;
	}

	public function getSuccessUrl() {
		return $this->success_url;
	}

	public function setSuccessUrl($value) {
		$this->success_url = $value;
	}

	public function getFailureUrl() {
		return $this->failure_url;
	}

	public function setFailureUrl($value) {
		$this->failure_url = $value;
	}

	public function getCallbackUrl() {
		return $this->callback_url;
	}

	public function setCallbackUrl($value) {
		$this->callback_url = $value;
	}

	public function getReferrerUrl() {
		return $this->referrer_url;
	}

	public function setReferrerUrl($value) {
		$this->referrer_url = $value;
	}
}