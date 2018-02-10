<?php

class DashboardController extends MY_Controller{
    function __construct(){
        parent::__construct();

        $this->load->module('Auth');
        $this->auth->check_login();
    }
}