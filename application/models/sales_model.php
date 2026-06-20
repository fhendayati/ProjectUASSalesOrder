<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sales_model extends CI_Model
{
    public function getAllSales()
    {
        $this->db->where('role_id', 2);

        return $this->db->get('users')->result();
    }
}