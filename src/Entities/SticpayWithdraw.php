<?php


namespace Vikramwps\Sticpay\Entities;


/**
 * Class User
 * @package Vikramwps\Sticpay\Entities
 */
class SticpayWithdraw
{
    protected $key;
	protected $merchant_email;
	protected $customer_email;
	protected $amount;
	protected $currency_code;
	protected $order_id;
	protected $interface_version;
	protected $sign_type;
	protected $sign;
    protected $product_code;
    protected $client_id;
	
	public function __constructor($key, $merchant_email, $customer_email, $amount, $currency_code, $order_id, $interface_version, $sign_type, $sign, $product_code, $client_id) {

		$this->key = $key;
		$this->merchant_email = $merchant_email;
		$this->customer_email = $customer_email;
		$this->amount = $amount;
		$this->currency_code = $currency_code;
		$this->order_id = $order_id;
		$this->interface_version = $interface_version;
		$this->sign_type = $sign_type;
		$this->sign = $sign;
		$this->product_code = $product_code;
		$this->client_id = $client_id;
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

	public function getCustomerEmail() {
		return $this->customer_email;
	}

	public function setCustomerEmail($value) {
		$this->customer_email = $value;
	}

	public function getAmount() {
		return $this->amount;
	}

	public function setAmount($value) {
		$this->amount = $value;
	}

	public function getCurrencyCode() {
		return $this->currency_code;
	}

	public function setCurrencyCode($value) {
		$this->currency_code = $value;
	}

	public function getOrderId() {
		return $this->order_id;
	}

	public function setOrderId($value) {
		$this->order_id = $value;
	}

	public function getInterfaceVersion() {
		return $this->interface_version;
	}

	public function setInterfaceVersion($value) {
		$this->interface_version = $value;
	}

	public function getSignType() {
		return $this->sign_type;
	}

	public function setSignType($value) {
		$this->sign_type = $value;
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

	public function getClientId() {
		return $this->client_id;
	}

	public function setClientId($value) {
		$this->client_id = $value;
	}

	public function jsonSerialize()
    {
        return [
            'merchant' => $this->merchant_email,
            'customer' => $this->customer_email,
            'amount' => $this->amount,
            'currency_code' => $this->currency_code,
            'order_id' => $this->order_id,
            'interface_version' => $this->interface_version,
            'sign' => $this->sign
        ];
    }
}