<?php

class Registration extends MY_Controller{
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->assets
				->addJs('vendor/jquery.validation/jquery.validation.min.js');

		$this->assets->setJavascript('Registration/registration_js');
		$this->template
				->setPartial('Registration/index_v')
				->membership();
	}

	function individual(){
		$error = "";
		if ($this->input->post()) {
			$member = new StdClass;

			$passport_data = $this->upload_passport();

			if($passport_data['type'] === true){
				$member->firstname = $this->input->post('first_name');
				$member->lastname = $this->input->post('last_name');
				$member->email = $this->input->post('email_address');
				$member->phone = $this->input->post('phone_number');
				$member->profession = $this->input->post('profession');
				$member->company = $this->input->post('company');
				$member->volunteering = ($this->input->post('volunteering') == "no") ? 0 : 1;
				$member->activities = $this->input->post('activities');
				$member->photo = $passport_data['path'];

				$this->db->insert('individual_member', $member);
				$this->session->set_flashdata('success', "Successfully registered you as user. Please follow the instructions below to complete regisration");
				redirect('Registration/payment/individual/' . $this->db->insert_id());
			}else{
				$error = $passport_data['errors'];
				$this->session->set_flashdata('data', $this->input->post());
			}			
		}else{
			$error = "Please try again";
		}
		$this->session->set_flashdata('error', $error);
		redirect('Registration');
	}

	function payment($type, $id){
		$data = [];
		if(!in_array($type, ['individual', 'corporate'])){
			show_404();
		}
		$data['type'] = $type;
		$this->template
				->setPartial('Registration/payment_v')
				->membership();
	}

	function corporate(){}

	function generate_membership_no(){}

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