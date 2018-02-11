<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public $users_no            =   "USERS_NO";
    public $users_emailaddress  =   "USERS_EMAILADDRESS";
    public $users_password      =   "USERS_PASSWORD";
    public $users_verified      =   "USERS_VERIFIED";
    public $users_verification  =   "USERS_VERIFICATION";
    public $users_type          =   "USERS_TYPE";
    public $users_deletion      =   "USERS_DELETION";
    public $table               =   "users";

    function __construct()
    {
        parent::__construct();
    }

    // USERS_TYPE = 1 means "User"
    // USERS_TYPE = 2 means "Administrator"

    function get_information_by_emailpass($users_emailaddress, $users_password)
    {
        $row    =   $this->db->where($this->users_emailaddress, $users_emailaddress)
                             ->where($this->users_password, $users_password)
                             ->where($this->users_verified, 'Yes')
                             ->where($this->users_deletion, 0)
                             ->limit(1)
                             ->get($this->table);

        return $row->row(); 
    }

    function get_information_by_no($users_no)
    {
        $row    =   $this->db->where($this->users_no, $users_no)
                             ->where($this->users_deletion, 0)
                             ->limit(1)
                             ->get($this->table);

        return $row->row(); 
    }

    function get_information_by_email($users_emailaddress)
    {
        $row    =   $this->db->where($this->users_emailaddress, $users_emailaddress)
                             ->where($this->users_deletion, 0)
                             ->limit(1)
                             ->get($this->table);

        return $row->row(); 
    }

    function get_information_by_no_email($users_no, $users_emailaddress) 
    {
        $row    =   $this->db->where($this->users_no, $users_no)
                             ->where($this->users_emailaddress, $users_emailaddress)
                             ->where($this->users_deletion, 0)
                             ->limit(1)
                             ->get($this->table);

        return $row->row(); 
    }

    function check_verification($users_emailaddress, $users_verification)
    {
        $row    =   $this->db->where($this->users_emailaddress, $users_emailaddress)
                             ->where($this->users_verification, $users_verification)
                             ->where($this->users_deletion, 0)
                             ->limit(1)
                             ->get($this->table);

        return $row->row(); 
    }

    function insert($params)
    {
        $this->db->insert($this->table, $params);
    }

    function update_no($users_no, $params)
    {
            $this->db->where($this->users_no, $users_no)
                     ->update($this->table, $params);
    }

    function update_email($users_emailaddress, $params)
    {
            $this->db->where($this->users_emailaddress, $users_emailaddress)
                     ->update($this->table, $params);
    }
}