<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public $table = 'm_pnbp';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all dash
    function get_all_dash()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        $this->db->select('*');
        $this->db->from('m_pnbp');
        $this->db->where('id', '1');
        $query = $this->db->get();
        return $query->result();
    }
}
