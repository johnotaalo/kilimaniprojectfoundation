<?php

class Registration extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Mpesa');
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
				$member->phone = $this->format_phone_number($this->input->post('phone_number'));
				$member->profession = $this->input->post('profession');
				$member->company = $this->input->post('company');
				$member->volunteering = ($this->input->post('volunteering') == "no") ? 0 : 1;
				$member->activities = $this->input->post('activities');
				$member->photo = $passport_data['path'];
				$member->membership_no = $this->generate_membership_no();

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
		$this->db->where('id', $id);
		$data['member'] = $this->db->get('individual_member')->row();
		$js_data['member'] = $data['member'];
		$this->assets->setJavascript('Registration/registration_js', $js_data);
		$this->template
				->setPartial('Registration/payment_v', $data)
				->membership();
	}

	function makeIndividualPayment($id, $type){
		$this->db->where('id', $id);
		$member = $this->db->get('individual_member')->row();

		$response = $this->mpesa->sendRequest($member->phone, 10, $member->membership_no);

		$response_Array = json_decode($response);

		$payment = new StdClass;

		$payment->member_id = $member->id;
		$payment->payment_type = $type;
		$payment->merchant_id = (isset($response_Array->MerchantRequestID)) ? $response_Array->MerchantRequestID : $response_Array->requestId;
		if(!isset($response_Array->errorCode)){
			$payment->checkout_request_id = $response_Array->CheckoutRequestID;
			$payment->response_code = $response_Array->ResponseCode;
			$payment->response_description = $response_Array->ResponseDescription;
			$payment->customer_message = $response_Array->CustomerMessage;
		}else{
			$payment->error_code = $response_Array->errorCode;
			$payment->error_message = $response_Array->errorMessage;
		}

		$this->db->insert('individual_member_payment', $payment);

		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($payment));
	}

	function test($transaction_code = null){
		// $this->mpesa->generate_token();
		echo $this->mpesa->sendRequest("254725160399", 1000, "123");
	}

	function callback(){
		try{
			$dataPOST = trim(file_get_contents('php://input'));
			$data = json_decode($dataPOST);
			$data = $data->Body->stkCallback;

			// $status = new StdClass;

			$status->merchant_request_id = $data->MerchantRequestID;
			$status->checkout_request_id = $data->CheckoutRequestID;
			$status->result_code = $data->ResultCode;
			$status->result_description = $data->ResultDesc;
			if(isset($data->CallbackMetadata)){
				$status->callback_metadata = json_encode($data->CallbackMetadata);
			}

			$this->db->insert('transaction_status', $status);

			// Send Email and generate
			$this->mpesa->consumecallback($output);
		}catch(Exception $ex){
			$this->mpesa->consumecallback($ex->getMessage());
		}
	}

	function corporate(){}

	function generate_membership_no(){
		// $unique_id = substr(uniqid(), -3) . substr(uniqid(), -2);
		// return strtoupper($unique_id);
		$this->db->select_max('membership_no');
		$member = $this->db->get('individual_member')->row();

		if ($member->membership_no == NULL) {
			return "KPF_01000";
		}else{
			$number = (int)substr($member->membership_no, strpos($member->membership_no, "_") + 1);
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

	function generateToken(){
		$token = $this->mpesa->generate_token();
	}
}