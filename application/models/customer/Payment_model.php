<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_payment($data)
    {
        return $this->db->insert('payments', $data);
    }
}
