<?php

class Auth extends MY_Controller{
    function __construct(){
        parent::__construct();
    }

    function login(){
        $this->template
                ->setPartial('Auth/login_v')
                ->admin();
    }

    function authenticate(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->db->where(['email' => $email, 'is_active' => 1]);
        $user = $this->db->get('admin')->row();

        if(password_verify($password, $user->password)){
            $login_data = [
                'logged_in' => true,
                'user' => $user
            ];

            $access_log_data = [
                'admin_id' => $user->id
            ];

            $this->db->insert('admin_access_log', $access_log_data);

            $this->session->set_userdata($login_data);
            redirect('Admin');
        }else{
            $this->session->set_flashdata('error', 'There was an error logging you in');

            redirect('Auth/login');
        }
    }
    
    function signout(){
        $this->session->sess_destroy();
        redirect('Auth/login');
    }

    function create_sample(){
        $user = [
            'firstname' => 'Chrispine',
            'lastname'   => 'Otaalo',
            'email'      => 'c.otaalo@gmail.com',
            'password'   => password_hash('123456', PASSWORD_BCRYPT)
        ];

        // echo $this->db->insert('admin', $user);
    }

    function check_login(){
        if(!$this->session->userdata('logged_in')){
            redirect('Auth/login');
        }
    }
}