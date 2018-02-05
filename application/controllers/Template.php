<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->curpage = "Template"; 

        $this->load->model('Rates_model');
        $this->load->library('mailgun');
        include_once'./vendor/autoload.php';
    }

    public function index()
    {
        $details = array (
            'get_rates_best' =>  $this->Rates_model->get_rates_best()
        );

        $data['content']    =   $this->load->view('user/homecontent', $details, TRUE);
        $data['curpage']    =   $this->curpage;
        $this->load->view('template', $data);
    }

    public function encryption_method()
    {
        $encode_encrypt     =   $this->input->post('encode_encrypt');

        if ( !empty($encode_encrypt) ) {
            echo bin2hex($encode_encrypt);
        } else {
            redirect('/');
        }
    }
}
