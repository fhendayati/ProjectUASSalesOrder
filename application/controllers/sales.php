<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sales extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('logged_in'))
        {
            redirect('auth');
        }

        if($this->session->userdata('role_id') != 1)
        {
            redirect('dashboard');
        }

        $this->load->model('sales_model');
    }

    public function index()
    {
        $data['sales'] =
            $this->sales_model->getAllSales();

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sales/index', $data);
        $this->load->view('templates/footer');
    }
}