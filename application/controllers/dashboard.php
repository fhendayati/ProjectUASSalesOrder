<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        $this->load->model('dashboard_model');
    }

    public function index()
    {
        $role_id = $this->session->userdata('role_id');

        // ADMIN
        if($role_id == 1)
        {
            $data['total_products'] =
                $this->dashboard_model->countProducts();

            $data['total_customers'] =
                $this->dashboard_model->countCustomers();

            $data['total_sales'] =
                $this->dashboard_model->countSales();

            $data['total_orders'] =
                $this->dashboard_model->countOrders();

            // Recent Orders
            $data['recent_orders'] =
                $this->dashboard_model->getRecentOrders();

            // Low Stock Product
            $data['low_stock'] =
                $this->dashboard_model->getLowStockProducts();

            // Status Order
            $data['draft'] =
                $this->dashboard_model->countStatus('draft');

            $data['dikirim'] =
                $this->dashboard_model->countStatus('dikirim');

            $data['selesai'] =
                $this->dashboard_model->countStatus('selesai');

            $data['dibatalkan'] =
                $this->dashboard_model->countStatus('dibatalkan');
        }

        // SALES
        elseif($role_id == 2)
        {
            $user_id = $this->session->userdata('id');

            $data['my_orders'] =
                $this->dashboard_model->countMyOrders($user_id);

            $data['draft'] =
                $this->dashboard_model->countMyStatus(
                    $user_id,
                    'draft'
                );

            $data['dikirim'] =
                $this->dashboard_model->countMyStatus(
                    $user_id,
                    'dikirim'
                );

            $data['selesai'] =
                $this->dashboard_model->countMyStatus(
                    $user_id,
                    'selesai'
                );

            $data['dibatalkan'] =
                $this->dashboard_model->countMyStatus(
                    $user_id,
                    'dibatalkan'
                );
            
            $data['recent_orders'] =
                $this->dashboard_model->getRecentOrdersBySales($user_id);
        }

        // MANAGER
        elseif($role_id == 3)
        {
            $data['total_orders'] = $this->dashboard_model->countOrders();

            $data['selesai'] = $this->dashboard_model->countStatus(
                'selesai'
            );

            $data['dibatalkan'] = $this->dashboard_model->countStatus(
                'dibatalkan'
            );

            $data['total_sales_value'] =
                $this->dashboard_model->getTotalSalesValue();

            $data['monthly_sales'] =
                $this->dashboard_model->getMonthlySales();

            $data['sales_performance'] =
                $this->dashboard_model->getSalesPerformance();
        }

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
    
}