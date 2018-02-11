<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->curpage = "Login"; 

        $this->load->model('Reservation_model');
        $this->load->model('Users_model');
    }

    public function profile($bin2hex_no_email)
    {
        if ( $this->session->user_session->USERS_TYPE == 1 ) {
            $hex2bin_no_email   =   hex2bin($bin2hex_no_email);
            $data               =   explode('|', $hex2bin_no_email);
            $users_no           =   $data[0];
            $users_emailaddress =   $data[1];

            $user_data          =   $this->Users_model->get_information_by_no_email($users_no, $users_emailaddress);

            if ( !empty($user_data) ) {
                $details = array (
                    'user_data'                 =>  $user_data,
                    'get_reservation_of_user'   =>  $this->Reservation_model->get_reservation_of_user($users_no),
                    'pword'                     =>  $user_data->USERS_PASSWORD
                );

                $data['content']    =   $this->load->view('user/profilecontent', $details, TRUE);
                $data['curpage']    =   'User Profile';
                $this->load->view('template', $data); 
            } else {
                redirect('/');
            }

        } else {
            redirect('/');
        }
    }

    public function change_password()
    {
        $txt_current_password   =   $this->input->post('txt_current_password');
        $txt_new_password       =   $this->input->post('txt_new_password');
        $txt_confirm_password   =   $this->input->post('txt_confirm_password');
        $flag                   =   0;

        $user_data              =   $this->Users_model->get_information_by_no($this->session->user_session->USERS_NO);

        if ( md5($txt_current_password) != $user_data->USERS_PASSWORD ) {
            $flag   =   1;
        } else {
            $params     =   array ( 
                'USERS_PASSWORD'    => md5($txt_new_password)
            );

            $this->Users_model->update_no($user_data->USERS_NO, $params);
        }

        echo $flag;
    }
}
