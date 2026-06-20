<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report_model extends CI_Model
{
    public function getReportByMonth($periode)
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

        $this->db->like(
            'orders.order_date',
            $periode,
            'after'
        );

        $this->db->where(
            'orders.status',
            'selesai'
        );

        return $this->db->get()->result();
    }

    public function getTotalSalesByMonth($periode)
    {
        $this->db->select_sum('total_price');

        $this->db->like(
            'order_date',
            $periode,
            'after'
        );

        $this->db->where(
            'status',
            'selesai'
        );

        $result = $this->db->get('orders')->row();

        return $result->total_price ?? 0;
    }

    public function getSalesReport($periode)
    {
        $this->db->select('
            users.name as sales_name,
            COUNT(orders.id) as total_order,
            SUM(orders.total_price) as total_penjualan
        ');

        $this->db->from('orders');

        $this->db->join(
            'users',
            'users.id = orders.user_id'
        );

        $this->db->where(
            'DATE_FORMAT(orders.order_date,"%Y-%m")',
            $periode
        );

        $this->db->where(
            'orders.status',
            'selesai'
        );

        $this->db->group_by(
            'orders.user_id'
        );

        return $this->db->get()->result();
    }

    public function getProductReport($periode)
    {
        $this->db->select(
            'products.product_code,
            products.product_name,
            SUM(order_details.qty) as total_qty,
            SUM(order_details.subtotal) as total_penjualan'
        );

        $this->db->from('order_details');

        $this->db->join(
            'orders',
            'orders.id = order_details.order_id'
        );

        $this->db->join(
            'products',
            'products.id = order_details.product_id'
        );

        $this->db->where(
            'DATE_FORMAT(orders.order_date,"%Y-%m")',
            $periode
        );

        $this->db->where(
            'orders.status',
            'selesai'
        );

        $this->db->group_by(
            'products.id'
        );

        return $this->db->get()->result();

    }

}