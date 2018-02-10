<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpesa{
	private $_CI;
	function __construct(){
		$this->_CI =& get_instance();
		$this->_CI->load->config('mpesa');
	}

	public function sendRequest($phone, $amount, $account){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->getConfigItem('endpoint'));
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generate_token()));
		$timestamp =date('YmdHis');
		$passkey = $this->getConfigItem('passkey');
		$short_code = $this->getConfigItem('short_code');
		$password = base64_encode($short_code . $passkey . $timestamp);
		$curl_post_data = [
			"BusinessShortCode" => $short_code,
			"Password" => $password,
			"Timestamp" => $timestamp,
			"TransactionType" => "CustomerPayBillOnline",
			"Amount" => $amount,
			"PartyA" => $phone,
			"PartyB" => $short_code,
			"PhoneNumber" => $phone,
			"CallBackURL" => "http://a768becf.ngrok.io/kilimani/registration/callback",
			"AccountReference" => $account,
			"TransactionDesc" => "Paybill Online"
		];

		$data_string = json_encode($curl_post_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

		$curl_response = curl_exec($curl);
		return $curl_response;
	}

	public function consumecallback($response){
		$myfile = fopen("cancelled.txt", "w");
		fwrite($myfile, $response);
		fclose($myfile);
	}

	public function generate_token()
	{
		$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);

		$app_consumer_key = $this->getConfigItem('consumer_key');
	    $app_consumer_secret = $this->getConfigItem('consumer_secret');
		$credentials = base64_encode($app_consumer_key.':'.$app_consumer_secret);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$curl_response = curl_exec($curl);

		return json_decode($curl_response, true)['access_token'];
	}

	private function getConfigItem($key){
		return $this->_CI->config->item($key);
	}
}