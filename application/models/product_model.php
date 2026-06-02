<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product_model extends CI_Model
{
    private $table = 'products';

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
}