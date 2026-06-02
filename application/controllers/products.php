<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        $this->load->model('product_model');
    }

    public function index()
    {
        $data['products'] = $this->product_model->getAll();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('products/index', $data);
        $this->load->view('templates/footer');
    }
}