<?php

class Admin extends DashboardController{
    function __construct(){
        parent::__construct();
        $this->load->library('Mail');
    }

    function index(){
        $data['header'] = 'Dashboard';
        $data['members'] = $this->db->get('individual_member')->num_rows();

        $this->db->where('first_time_code IS NOT NULL', NULL, false);
        $data['confirmed'] = $this->db->get('individual_member')->num_rows();
        $this->template
                    ->setPartial('Admin/dashboard_v', $data)
                    ->admin();
    }

    function members(){
        $data = [];

        $this->assets
                ->addCss('//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css', true)
                ->addCss('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css', true);
        $this->assets
                ->addJs('//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js', true)
                ->addJs('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js', true)
                ->addJs('https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js', true);
        $this->assets->setJavascript('Admin/registration/index_js');

        $this->db->order_by('id', 'DESC');
        $data['members'] = $this->db->get('individual_member')->result();
        $data['header'] = "Members";
        $this->template
                ->setPartial('Admin/registration/index_v', $data)
                ->admin(); 
    }

    function addTransactionCode(){
        $member = new StdClass;

        $member->first_time_code = $this->input->post('value');

        $this->db->where('id', $this->input->post('pk'));
        $this->db->update('individual_member', $member);

        $this->db->where('id', $this->input->post('pk'));
        $member = $this->db->get('individual_member')->row();

        $v_data['firstname'] = $member->firstname;
		$v_data['lastname'] = $member->lastname;

		$message = $this->load->view('Template/emails/welcome_individual', $v_data, true);

		$recepient = new StdClass;

		$recepient->email = $member->email;
		$recepient->name = "{$member->firstname} {$member->lastname}";
		$this->mail->send("Kilimani Welcomes You!", $recepient, $message);
    }

    function addmember(){
        $data = [];

        $this->assets->setJavascript('Admin/registration/registration_js');
        $data['header'] = 'Add Member';
        $this->template->setPartial('Admin/registration/add', $data)->admin();
    }

    function registermember(){
        $response = [];
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
                $member->dob = $this->input->post('dob');

                $this->db->insert('individual_member', $member);
                $response['member'] = $member;
			}		
		}else{
			$error = "Please try again";
        }
        
        if($error){
            $this->output->set_status_header(500);
            $response['message'] = $error;
        }
        else{
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}