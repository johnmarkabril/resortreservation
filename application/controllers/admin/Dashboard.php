<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->curpage = "Dashboard"; 

        $this->load->model('Users_model');
    }

    public function index()
    {            
        if ( $this->session->user_session->USERS_TYPE == 2 ) {
            $details = array (
            );

            $data['content']    =   $this->load->view('admin/dashboardcontent', $details, TRUE);
            $data['curpage']    =   $this->curpage;
            $this->load->view('template_admin', $data);
        } else {
            redirect('/');
        } 
    }
}