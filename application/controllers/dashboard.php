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
        $data['total_products']  = $this->dashboard_model->countProducts();
        $data['total_customers'] = $this->dashboard_model->countCustomers();
        $data['total_orders']    = $this->dashboard_model->countOrders();
        $data['total_sales']     = $this->dashboard_model->countSales();

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}