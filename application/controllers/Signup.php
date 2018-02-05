<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->curpage = "Signup"; 

        $this->load->model('Users_model');
    }

    public function index()
    {
        if ( empty($this->session->user_session) ) {
            $details = array (
            );

            $data['content']    =   $this->load->view('createaccountcontent', $details, TRUE);
            $data['curpage']    =   $this->curpage;
            $this->load->view('template', $data);
        } else {
            redirect('/');
        }
    }
}