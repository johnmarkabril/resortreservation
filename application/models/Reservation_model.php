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

    public function get_reservation_for_calendar()
    {
        $row    =   $this->db->where($this->res_deletion, 0)
                             ->join('users', 'users.USERS_NO = ' . $this->res_usersno)
                             ->join('rates', 'rates.RATES_NO = ' . $this->res_ratesno)
                             ->get($this->table);

        return $row->result();
    }

    public function get_reservation_with_date_timeslot($res_dateto)
    {
        $row    =   $this->db->where($this->res_dateto, $res_dateto)
                             ->where($this->res_deletion, 0)
                             ->get($this->table);

        return $row->result();
    }

    public function get_reservation_of_user($res_usersno)
    {
        $row    =   $this->db->where($this->res_usersno, $res_usersno)
                             ->join('users', 'users.USERS_NO = ' . $this->res_usersno)
                             ->join('rates', 'rates.RATES_NO = ' . $this->res_ratesno)
                             ->where($this->res_deletion, 0)
                             ->get($this->table);

        return $row->result();
    }

    public function get_reservation_by_no($res_no)
    {
        $row    =   $this->db->where($this->res_no, $res_no)
                             ->join('users', 'users.USERS_NO = ' . $this->res_usersno)
                             ->join('rates', 'rates.RATES_NO = ' . $this->res_ratesno)
                             ->where($this->res_deletion, 0)
                             ->get($this->table);

        return $row->row();
    }

    public function insert($params)
    {
        $row    =   $this->db->insert($this->table, $params);
    }
    
}