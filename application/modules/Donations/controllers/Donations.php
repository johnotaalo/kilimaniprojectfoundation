<?php

class Donations extends MY_Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$data['header'] = true;
		$this->template
				->setPartial('Donations/index_v', $data)
				->membership();
	}

	function donate(){
		if ($this->input->post()) {
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$activities = $this->input->post('activities');
			$member = ($this->input->post('member') == "yes") ? 1 : 0;


			$donation = new StdClass;
			$donation->donation_no = strtoupper(substr(uniqid(), -8));
			$donation->firstname = $firstname;
			$donation->lastname = $lastname;
			$donation->email = $email;
			$donation->phone = $this->format_phone_number($phone);
			$donation->activities = $activities;
			$donation->member = $member;

			$this->db->insert('donations', $donation);
			$this->session->set_flashdata('success', 'Your donation has successfully been captured');
			redirect('donations/completedonation/' . $donation->donation_no);
		}
	}

	function completedonation($donation_no){
		$data = [];
		$data['donation_no'] = $donation_no;
		$this->template
			->setPartial('Donations/complete_v', $data)
			->membership();
	}
}