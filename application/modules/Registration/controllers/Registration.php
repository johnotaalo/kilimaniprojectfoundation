<?php

class Registration extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Mpesa');
		$this->load->library('Mail');
		$this->load->library('Pdf');
		$this->load->library('Attachment');
	}

	function index(){
		$this->assets
				->addJs('vendor/jquery.validation/jquery.validation.min.js');

		$this->assets->setJavascript('Registration/registration_js');
		$this->template
				->setPartial('Registration/index_v')
				->membership();
	}
	function add_code(){
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('individual_member', ['first_time_code'=>$this->input->post('code')]);

		$this->db->where('id', $this->input->post('id'));
		$member = $this->db->get('individual_member')->row();

		$v_data['firstname'] = $member->firstname;
		$v_data['lastname'] = $member->lastname;
		$v_data['member_no'] = $member->membership_no;
		$v_data['date_joined'] = $member->created_at;
		$v_data['member_photo'] = $member->photo;

		$message = $this->load->view('Template/emails/welcome_individual', $v_data, true);
		$content = $this->load->view('Template/pdf/member', $v_data, true);
		$member_pdf = $this->pdf->generate($content, 'L', 'S');

		$recepient = new StdClass;

		$recepient->email = $member->email;
		$recepient->name = "{$member->firstname} {$member->lastname}";

		$attachment = new Attachment();
		$attachment->file = $member_pdf;
		$attachment->file_type = 'content';
		$attachment->is_path = false;
		$attachment->file_name = "{$v_data['firstname']} {$v_data['lastname']}.pdf";
		$attachment->mime_type = 'application/pdf';

		$attachments[] = $attachment;

		$this->mail->send("Kilimani Welcomes You!", $recepient, $message, $attachments);

		$this->cart->destroy();
	}

	function individual(){
		$error = "";
		if ($this->input->post()) {
			$member = new StdClass;

			if(isset($_FILES['myfile']['tmp_name'])){
				$passport_data = $this->upload_passport();

				if($passport_data['type'] === true){
					$member->photo = $passport_data['path'];
				}else{
					$error = $passport_data['errors'];
					$this->session->set_flashdata('data', $this->input->post());
				}
			}

			if(!$error){
				$member->firstname = $this->input->post('first_name');
				$member->lastname = $this->input->post('last_name');
				$member->email = $this->input->post('email_address');
				$member->phone = $this->format_phone_number($this->input->post('phone_number'));
				$member->profession = $this->input->post('profession');
				$member->company = $this->input->post('company');
				$member->volunteering = ($this->input->post('volunteering') == "no") ? 0 : 1;
				$member->activities = $this->input->post('activities');
				$member->membership_no = $this->generate_membership_no();

				$this->db->insert('individual_member', $member);
				$this->session->set_flashdata('success', "Successfully registered you as user. Please follow the instructions below to complete regisration");

				$cart_data = [
					'id'		=>	$this->db->insert_id(),
					'qty'		=>	1,
					'price'		=>	4000,
					'name'		=>	$member->firstname . " " . $member->lastname,
					'options'	=>	[
						'type'	=>	'Individual Member Registration',
						'for'	=>	'First Time Registration'
					]
				];

				$this->cart->insert($cart_data);

				redirect('Registration/payment/individual/');
			}		
		}else{
			$error = "Please try again";
		}
		$this->session->set_flashdata('error', $error);
		redirect('Registration');
	}
	
	function success($type){
		$data = [];
		$data['type'] = $type;
		$this->template
				->setPartial('Registration/success_v', $data)
				->membership();
	}

	function payment($type){
		$data = [];
		if(!in_array($type, ['individual', 'corporate'])){
			show_404();
		}
		$data['type'] = $type;
		$cart = $this->cart->contents();
		$cart_content = end($cart);
		$id = $cart_content['id'];
		$this->db->where('id', $id);
		$data['member'] = $this->db->get('individual_member')->row();
		$js_data['type'] = $type;
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
		// echo ROOT_DIR;die;
		$data['root'] = str_replace('\\', '/', ROOT_DIR);

		$member = $this->db->get_where('individual_member', ['id'	=> 1])->row();
		$data['firstname'] = $member->firstname;
		$data['lastname'] = $member->lastname;
		$data['member_no'] = $member->membership_no;
		$data['date_joined'] = $member->created_at;
		$data['member_photo'] = $member->photo;


		$content = $this->load->view('Template/pdf/member', $data, true);
		$sample_pdf = $this->pdf->generate($content, 'L');
		die;

		$message = $this->load->view('Template/emails/welcome_corporate', $data, true);
		// // die;

		$recepient = new StdClass;

		$recepient->email = "c.otaalo@gmail.com";
		$recepient->name = "Chrispine Otaalo";

		$attachment = new Attachment();
		$attachment->file = $sample_pdf;
		$attachment->file_type = 'content';
		$attachment->is_path = false;
		$attachment->file_name = "{$data['firstname']} {$data['lastname']}.pdf";
		$attachment->mime_type = 'application/pdf';

		$attachments[] = $attachment;

		$this->mail->send("Sample", $recepient, $message, $attachments);
	}

	function getToken(){

	}

	function callback(){
		try{
			$dataPOST = trim(file_get_contents('php://input'));
			$data = json_decode($dataPOST);
			$data = $data->Body->stkCallback;

			$status = new StdClass;

			$status->merchant_request_id = $data->MerchantRequestID;
			$status->checkout_request_id = $data->CheckoutRequestID;
			$status->result_code = $data->ResultCode;
			$status->result_description = $data->ResultDesc;
			if(isset($data->CallbackMetadata)){
				$status->callback_metadata = json_encode($data->CallbackMetadata);
			}

			$this->db->insert('transaction_status', $status);

			$sql = "SELECT m.* FROM individual_member m
			JOIN individual_member_payment p ON p.member_id = m.id AND p.checkout_request_id = '{$status->checkout_request_id}'";

			$member = $this->db->query($sql)->row();

			if ($member && $status->result_code == 0) {
				$v_data['firstname'] = $member->firstname;
				$v_data['lastname'] = $member->lastname;

				$message = $this->load->view('Template/emails/welcome_individual', $v_data, true);
				// die;

				$recepient = new StdClass;

				$recepient->email = $member->email;
				$recepient->name = "{$member->firstname} {$member->lastname}";
				$this->mpesa->consumecallback($this->mail->send("Kilimani Welcomes You!", $recepient, $message));
				$this->cart->destroy();
			}

			// Send Email and generate
		}catch(Exception $ex){
			$this->mpesa->consumecallback($ex->getMessage());
		}
	}

	function corporate(){}

	function generateToken(){
		$token = $this->mpesa->generate_token();
	}

	function member($member_no){
		$data = [];
		$this->db->where('membership_no', $member_no);
		$member = $this->db->get('individual_member')->row();
		$data['root'] = str_replace('\\', '/', ROOT_DIR);

		if($member){
			$data['member'] = $member;
			$this->load->view('Template/member/member_v', $data);
		}else{
			show_error('This member does not exist!', 404, 'Member not found');
		}
	}
}