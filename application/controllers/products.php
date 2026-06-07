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

        // Hanya Admin
        if($this->session->userdata('role_id') != 1)
        {
            redirect('dashboard');
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

    public function add()
    {
        if ($this->input->post())
        {
            $data = [
                'product_code' => $this->input->post('product_code'),
                'product_name' => $this->input->post('product_name'),
                'price'        => $this->input->post('price'),
                'stock'        => $this->input->post('stock'),
                'created_at'   => date('Y-m-d H:i:s')
            ];

            $this->product_model->insert($data);
            $this->session->set_flashdata(
                'success',
                'Product added successfully!'
            );

            redirect('products');
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('products/add');
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $product = $this->product_model->getById($id);

        if (!$product) {
            show_404();
        }

        if ($this->input->post())
        {
            $data = [
                'product_code' => $this->input->post('product_code'),
                'product_name' => $this->input->post('product_name'),
                'price'        => $this->input->post('price'),
                'stock'        => $this->input->post('stock')
            ];

            $this->product_model->update($id, $data);
            
            $this->session->set_flashdata(
                'success',
                'Product updated successfully!'
            );

            redirect('products');
        }

        $data['product'] = $product;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('products/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $product = $this->product_model->getById($id);

        if (!$product)
        {
            show_404();
        }

        $this->product_model->delete($id);

        $this->session->set_flashdata(
            'success',
            'Product deleted successfully!'
        );

        redirect('products');
    }
}