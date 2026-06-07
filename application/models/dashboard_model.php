<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function countProducts()
    {
        return $this->db->count_all('products');
    }

    public function countCustomers()
    {
        return $this->db->count_all('customers');
    }

    public function countOrders()
    {
        return $this->db->count_all('orders');
    }

    public function countSales()
    {
        $this->db->where('role_id', 2);

        return $this->db->count_all_results('users');
    }
}