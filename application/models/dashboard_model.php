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

    public function countMyOrders($user_id)
    {
        $this->db->where('user_id', $user_id);

        return $this->db->count_all_results('orders');
    }

    public function countSales()
    {
        $this->db->where('role_id', 2);

        return $this->db->count_all_results('users');
    }

    public function countMyStatus($user_id, $status)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('status', $status);

        return $this->db->count_all_results('orders');
    }

    public function countStatus($status)
    {
        $this->db->where('status', $status);

        return $this->db->count_all_results('orders');
    }

    public function getTotalSalesValue()
    {
        $this->db->select_sum('total_price');

        $this->db->where(
            'status',
            'selesai'
        );

        $result = $this->db->get('orders')->row();

        return $result->total_price ?? 0;
    }

    public function getRecentOrders()
    {
        $this->db->select('
            orders.*,
            customers.customer_name,
            users.name as sales_name
        ');

        $this->db->from('orders');

        $this->db->join(
            'customers',
            'customers.id = orders.customer_id'
        );

        $this->db->join(
            'users',
            'users.id = orders.user_id'
        );

        $this->db->order_by('orders.order_date', 'DESC');

        $this->db->limit(5);

        return $this->db->get()->result();
    }

    public function getLowStockProducts()
    {
        $this->db->where('stock <=', 10);

        $this->db->order_by('stock', 'ASC');

        return $this->db->get('products')->result();
    }

    public function getRecentOrdersBySales($user_id)
    {
        $this->db->select('
            orders.*,
            customers.customer_name
        ');

        $this->db->from('orders');

        $this->db->join(
            'customers',
            'customers.id = orders.customer_id'
        );

        $this->db->where(
            'orders.user_id',
            $user_id
        );

        $this->db->order_by('orders.order_date', 'DESC');

        $this->db->limit(5);

        return $this->db->get()->result();
    }

    public function getMonthlySales()
    {
        $this->db->select("
            MONTH(order_date) as month,
            SUM(total_price) as total_sales
        ");

        $this->db->from('orders');

        $this->db->where(
            'status',
            'selesai'
        );

        $this->db->group_by(
            'MONTH(order_date)'
        );

        $this->db->order_by(
            'MONTH(order_date)',
            'ASC'
        );

        return $this->db->get()->result();
    }

    public function getSalesPerformance()
    {
        $this->db->select("
            users.name,
            SUM(orders.total_price) as total_sales
        ");

        $this->db->from('orders');

        $this->db->join(
            'users',
            'users.id = orders.user_id'
        );

        $this->db->where(
            'orders.status',
            'selesai'
        );

        $this->db->group_by(
            'users.id'
        );

        $this->db->order_by(
            'total_sales',
            'DESC'
        );

        return $this->db->get()->result();
    }
}