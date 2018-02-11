<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->curpage = "Dashboard"; 

        $this->load->model('Reservation_model');
        $this->load->model('Users_model');
    }

    public function index()
    {            
        if ( $this->session->user_session->USERS_TYPE == 2 ) {
            $scheduleCalendar     =   $this->convert_data_for_calendar($this->Reservation_model->get_reservation_for_calendar());

            $details = array (
                'schedule_calendar'     =>  json_encode($scheduleCalendar)
            );

            $data['content']    =   $this->load->view('admin/dashboardcontent', $details, TRUE);
            $data['curpage']    =   $this->curpage;
            $this->load->view('template_admin', $data);
        } else {
            redirect('/');
        } 
    }

    public function convert_data_for_calendar($object)
    {
        $array_object   =   array();
        if ( !empty($object) ) {
            foreach ( $object as $obj ) {
                $date = date("Y-m-d", strtotime($obj->RES_DATETO));
                $arr = array (
                    'title'         =>  $obj->RATES_NAME,
                    'start'         =>  $date,
                    'color'         =>  '#FFAB40',
                    'reserve_no'    =>  $obj->RES_NO
                );

                array_push($array_object, $arr);
            }
        }
        return $array_object;
    }

    public function clicked_schedule()
    {
        $reserve_no     =   $this->input->post('reserve_no');
        $data           =   $this->Reservation_model->get_reservation_by_no($reserve_no);

        $template       =   '
            <div class="modal-header">
                <div class="w-100">' . $data->RATES_NAME . '</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-responsive w-100" src="' . base_url() . 'public/img/' . $data->RATES_IMAGE . '" />
                <div>Client Name:<span  class="reservation-paid"> ' . $data->USERS_FIRSTNAME . ' ' . $data->USERS_LASTNAME . '</span></div>
                <div>Paid:<span  class="reservation-paid"> ₱' . $data->RES_TOTALPRICE . '</span></div>
                <div>Date:<span  class="reservation-paid"> ' . $data->RES_DATETO . '</span></div>
                <div class="modal-description">' . $data->RATES_DESCRIPTION . '</div>
            </div>
        ';

        echo $template;
    }
}