<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rates_model extends CI_Model
{

    public $rates_no            =   "RATES_NO";
    public $rates_name          =   "RATES_NAME";
    public $rates_best          =   "RATES_BEST";
    public $rates_deletion      =   "RATES_DELETION";
    public $table               =   "rates";

    function __construct()
    {
        parent::__construct();
    }

    function get_all_rates()
    {
        $row    =   $this->db->where($this->rates_deletion, 0)
                             ->order_by($this->rates_name, 'ASC')
                             // ->select('RATES_NO')
                             ->get($this->table);

        return $row->result();
    }

    function get_specific_rates_detail($rates_no)
    {
        $row    =   $this->db->where($this->rates_no, $rates_no)
                             ->where($this->rates_deletion, 0)
                             ->limit(1)
                             ->get($this->table);

        return $row->row();
    }

    function get_rates_best()
    {
        $row    =   $this->db->where($this->rates_deletion, 0)
                             ->order_by($this->rates_best, 'ASC')
                             ->limit(3)
                             ->get($this->table);

        return $row->result(); 
    }

    function get_available_rates($rates_no_array)
    {
        $row    =   $this->db->where_not_in($this->rates_no, $rates_no_array)
                             ->where($this->rates_deletion, 0)
                             ->order_by($this->rates_name, 'ASC')
                             // ->select('RATES_NO')
                             ->get($this->table);

        return $row->result();  
    }
}