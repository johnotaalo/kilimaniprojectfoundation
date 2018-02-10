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

			$cart_data = [
				'id'		=>	$donation->donation_no,
				'qty'		=>	1,
				'price'		=>	0,
				'name'		=>	$firstname . " " . $lastname,
				'options'	=>	[
					'type'	=>	'Donation'
				]
			];

			$this->cart->insert($cart_data);
			redirect('donations/completedonation/');
		}
	}

	function completedonation(){
		$data = [];
		$cart = $this->cart->contents();
		$cart_content = end($cart);
		$data['donation_no'] = $cart_content['id'];
		$this->template
			->setPartial('Donations/complete_v', $data)
			->membership();
	}
}