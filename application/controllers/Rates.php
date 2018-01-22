<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rates extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->curpage = "Rates"; 

        $this->load->model('Rates_model');
        $this->load->model('Reservation_model');
        $this->load->model('Users_model');
    }

    public function index()
    {
        $details = array (
            'get_all_rates' =>  $this->Rates_model->get_all_rates()
        );

        $data['content']    =   $this->load->view('user/ratescontent', $details, TRUE);
        $data['curpage']    =   $this->curpage;
        $this->load->view('template', $data); 
    }

    public function details($rates_name, $rates_no)
    {
        if ( !empty($rates_name) && !empty($rates_no) ) {
            $rates_details   =   $this->Rates_model->get_specific_rates_detail($rates_no);
            if ( !empty($rates_details) ) {
               $details = array (
                    'rates'  =>  $rates_details
                );

                $data['content']    =   $this->load->view('user/ratesdetailcontent', $details, TRUE);
                $data['curpage']    =   $this->curpage;
                $this->load->view('template', $data); 
            } else {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }

    public function reservation($rates_no, $encode_encrypt)
    {
        if ( !empty($rates_no) && !empty($encode_encrypt) ) {
            if ( !empty($this->session->user_session) ) {
                $user_info          =   $this->Users_model->get_information_by_no($this->session->user_session->USERS_NO);
                $reservation_string =   explode('|', hex2bin($encode_encrypt));
                $reservation_date   =   $reservation_string[0];
                $reservation_slot   =   $reservation_string[1];
                $rates_details   =   $this->Rates_model->get_specific_rates_detail($rates_no);

                if ( !empty($rates_details) ) {
                   $details = array (
                        'rates'             =>  $rates_details,
                        'reservation_date'  =>  $reservation_date,
                        'reservation_slot'  =>  $reservation_slot,
                        'user_info'         =>  $user_info
                    );

                    $data['content']    =   $this->load->view('user/reservationratescontent', $details, TRUE);
                    $data['curpage']    =   'Reservation Submittion';
                    $this->load->view('template', $data); 
                } else {
                    redirect('/');
                }
            } else {
                $reservation_link   =   base_url() . 'rates/reservation/' . $rates_no . '/' . $encode_encrypt;
                $this->session->set_userdata('reservation_link', $reservation_link);
                redirect('/login');
            }
        } else {
            redirect('/');
        }  
    }

    public function cottage($encode_encrypt)
    {
        if ( !empty($encode_encrypt) ) {
            $reservation_string             =   explode('|', hex2bin($encode_encrypt));
            $reservation_date               =   $reservation_string[0];
            $reservation_slot               =   $reservation_string[1];
            $reservation_rates_not_avail    =   array(0);
            $get_reservation                =   $this->Reservation_model->get_reservation_with_date_timeslot($reservation_date, $reservation_slot);
            $all_rates                      =   $this->Rates_model->get_all_rates();

            if ( !empty($get_reservation) ) {
                foreach ( $get_reservation as $reservation ) {
                    array_push($reservation_rates_not_avail, $reservation->RES_RATESNO);
                }
            }

            $available_rates                =   $this->Rates_model->get_available_rates($reservation_rates_not_avail);

            $details = array (
                'available_rates'   =>  $available_rates,
                'reservation_date'  =>  $reservation_date,
                'reservation_slot'  =>  $reservation_slot,
                'encode_encrypt'    =>  $encode_encrypt
            );

            $data['content']    =   $this->load->view('user/availableratescontent', $details, TRUE);
            $data['curpage']    =   $this->curpage;
            $this->load->view('template', $data); 

        } else {
            redirect('/');
        }
    }
}
