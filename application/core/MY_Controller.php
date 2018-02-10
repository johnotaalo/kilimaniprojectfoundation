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

	function generate_membership_no(){
		$this->db->select_max('membership_no');
		$member = $this->db->get('individual_member')->row();

		// echo "<pre>";print_r($member);die;

		if ($member->membership_no == NULL) {
			return "KPF_01000";
		}else{
			$numberFrags = explode("_", $member->membership_no);
			$number = $numberFrags[1] + 1;
			return "KPF_" . str_pad($number, 5, "0", STR_PAD_LEFT);
		}
	}

	function upload_passport(){
		$config['upload_path']			= './uploads/';
		$config['allowed_types']		= 'gif|jpg|png';
		$config['encrypt_name']			= true;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('passport_photo')){
			return [
				'type'		=>	false,
				'errors'	=>	$this->upload->display_errors()
			];
		}else{
			return [
				'type'		=>	true,
				'path'		=>	$this->upload->data('full_path')
			];
		}
	}
}