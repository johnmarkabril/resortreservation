<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reservation_model extends CI_Model
{

    public $res_no              =   'RES_NO';
    public $res_usersno         =   'RES_USERSNO';
    public $res_ratesno         =   'RES_RATESNO';
    public $res_dateto          =   'RES_DATETO';
    public $res_timeslot        =   'RES_TIMESLOT';
    public $res_deletion        =   'RES_DELETION';
    public $table               =   "reservation";

    function __construct()
    {
        parent::__construct();
    }

    public function get_reservation_with_date_timeslot($res_dateto, $res_timeslot)
    {
        $row    =   $this->db->where($this->res_dateto, $res_dateto)
                             ->where($this->res_timeslot, $res_timeslot)
                             ->where($this->res_deletion, 0)
                             ->get($this->table);

        return $row->result();
    }
    
}