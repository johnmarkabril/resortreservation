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

    public function generate_random()
    {
        $rand       =   str_pad(rand(0, 99999999), 8, "0", STR_PAD_LEFT);
        return $rand;
    }

    public function check_exist_email()
    {
        $txt_fname                  =   $this->input->post('txt_fname');
        $txt_lname                  =   $this->input->post('txt_lname');
        $txt_pword                  =   $this->input->post('txt_pword');
        $txt_contact                =   $this->input->post('txt_contact');
        $txt_address                =   $this->input->post('txt_address');
        $txt_email                  =   $this->input->post('txt_email');
        $generate_random            =   $this->generate_random();
        $get_information_by_email   =   $this->Users_model->get_information_by_email($txt_email);
        $flag                       =   0;

        if ( !empty($get_information_by_email) ) {
            $flag   =   1;
        }  else {
            $params     =   array (
                'USERS_NO'                  =>  '',
                'USERS_EMAILADDRESS'        =>  $txt_email,
                'USERS_PASSWORD'            =>  md5($txt_pword),
                'USERS_FIRSTNAME'           =>  $txt_fname,
                'USERS_MIDDLEINITIAL'       =>  '',
                'USERS_LASTNAME'            =>  $txt_lname,
                'USERS_CONTACT'             =>  $txt_contact,
                'USERS_ADDRESS'             =>  $txt_address,
                'USERS_TYPE'                =>  'User',
                'USERS_VERIFIED'            =>  'No',
                'USERS_VERIFICATION'        =>  $generate_random,
                'USERS_TIMESTAMP_CREATED'   =>  strtotime(current_date . ' ' . current_time),
                'USERS_TIMESTAMP_UPDATED'   =>  '',
                'USERS_DELETION'            =>  0
            );

            $this->Users_model->insert($params);
        }

        echo $flag;
    }

    public function check_verification()
    {
        $txt_email              =   $this->input->post('txt_email');
        $txt_verification       =   $this->input->post('txt_verification');
        $check_verification     =   $this->Users_model->check_verification($txt_email, $txt_verification);
        $flag                   =   0;

        if ( !empty($check_verification) ) {
            $flag   =   1;
        } else {
            $params     =   array(
                'USERS_VERIFIED'        =>  'Yes',
                'USERS_VERIFICATION'    =>  ''
            );

            $this->Users_model->update_email($txt_email, $params);
        }

        echo $flag;
    }
}