<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->curpage = "Login"; 

        $this->load->model('Users_model');
    }

    public function index()
    {
        if ( empty($this->session->user_session) ) {
            $details = array (
            );

            $data['content']    =   $this->load->view('logincontent', $details, TRUE);
            $data['curpage']    =   $this->curpage;
            $this->load->view('template', $data);
        } else {
            redirect('/');
        }
    }

    public function process()
    {
        $txt_email      =   $this->input->post('txt_email');
        $txt_password   =   md5($this->input->post('txt_password'));
        $flag           =   0;
        $identify       =   1;

        if ( !empty($txt_email) && !empty($txt_password) ) {
            $info       =   $this->Users_model->get_information_by_emailpass($txt_email, $txt_password);

            if ( !empty($info) ) {

                $this->session->set_userdata('user_session',$info);


                if ( !empty($this->session->reservation_link) ) {
                    $flag = $info->USERS_TYPE . '|' . $this->session->reservation_link;
                    $this->session->unset_userdata('reservation_link');
                } else {
                    $flag = 1;
                }
                
            } else {
                $flag   =   101;
            }

            echo $flag;
        } else {
            redirect('/');
        }
    }

    public function add_in_csv($path, $line)
    {
        $handle = fopen($path, "a");
        fputcsv($handle, $line);
        fclose($handle);
    }
}
