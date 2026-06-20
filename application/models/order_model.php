<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order_model extends CI_Model
{
    private $table = 'orders';

    public function getAll()
    {
        $this->db->select('orders.*, customers.customer_name, users.name as sales_name');
        $this->db->from('orders');

        $this->db->join('customers', 'customers.id = orders.customer_id');
        $this->db->join('users', 'users.id = orders.user_id');

        $this->db->order_by('orders.order_date', 'ASC');

        return $this->db->get()->result();
    }
    
    public function getByUser($user_id)
    {
        $this->db->select('orders.*, customers.customer_name, users.name as sales_name');
        $this->db->from('orders');

        $this->db->join('customers', 'customers.id = orders.customer_id');
        $this->db->join('users', 'users.id = orders.user_id');

        $this->db->where('orders.user_id', $user_id);

        $this->db->order_by('orders.order_date', 'ASC');

        return $this->db->get()->result();
    }

    public function insertOrder($data)
    {
        $this->db->insert('orders', $data);

        return $this->db->insert_id();
    }

    public function insertDetail($data)
    {
        return $this->db->insert('order_details', $data);
    }

    public function getOrderById($id)
    {
        $this->db->select(
            'orders.*,
            customers.customer_name,
            users.name as sales_name'
        );

        $this->db->from('orders');

        $this->db->join(
            'customers',
            'customers.id = orders.customer_id'
        );

        $this->db->join(
            'users',
            'users.id = orders.user_id'
        );

        $this->db->where('orders.id', $id);

        return $this->db->get()->row();
    }

    public function getOrderDetails($order_id)
    {
        $this->db->select(
            'order_details.*,
            products.product_name'
        );

        $this->db->from('order_details');

        $this->db->join(
            'products',
            'products.id = order_details.product_id'
        );

        $this->db->where(
            'order_details.order_id',
            $order_id
        );

        return $this->db->get()->result();
    }

    public function updateOrder($id, $data)
    {
        $this->db->where('id', $id);

        return $this->db->update(
            'orders',
            $data
        );
    }

    public function deleteDetails($order_id)
    {
        $this->db->where(
            'order_id',
            $order_id
        );

        return $this->db->delete(
            'order_details'
        );
    }
}