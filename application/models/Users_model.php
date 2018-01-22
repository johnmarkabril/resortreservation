<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public $users_no            =   "USERS_NO";
    public $users_emailaddress  =   "USERS_EMAILADDRESS";
    public $users_password      =   "USERS_PASSWORD";
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
                             ->where($this->users_deletion, 0)
                             ->limit(1)
                             ->get($this->table);

        return $row->row(); 
    }

    function get_information_by_no($users_no)
    {
        $row    =   $this->db->where($this->users_no, $users_no)
                             ->where($this->users_type, 1)                              //  CHECK IF THE ACCOUNT IS FOR USER 
                             ->where($this->users_deletion, 0)
                             ->limit(1)
                             ->get($this->table);

        return $row->row(); 
    }
}