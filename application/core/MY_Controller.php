<?php

class MY_Controller extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->module('Template');
	}

	public function format_phone_number($phone_number){
		$first_character = substr($phone_number, 0, 1);
		$formatted_phone_number = $phone_number;

		switch ($first_character) {
			case '0':
				$formatted_phone_number = '254' . substr($phone_number, 1);
				break;
			case '+':
				$formatted_phone_number = substr($phone_number, 1);
			default:
				$formatted_phone_number = $phone_number;
				break;
		}

		return $formatted_phone_number;
	}
}