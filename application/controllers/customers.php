<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Cek login
        if (!$this->session->userdata('logged_in'))
        {
            redirect('auth');
        }

        // Cek role, hanya Admin yang boleh akses Customers
        if ($this->session->userdata('role_id') != 1)
        {
            redirect('dashboard');
        }

        $this->load->model('customer_model');
    }

    public function index()
    {
        $data['customers'] = $this->customer_model->getAll();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('customers/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        if ($this->input->post())
        {
            $data = [
                'customer_name' => $this->input->post('customer_name'),
                'address'       => $this->input->post('address'),
                'phone'         => $this->input->post('phone'),
                'created_at'    => date('Y-m-d H:i:s')
            ];

            $this->customer_model->insert($data);

            $this->session->set_flashdata(
                'success',
                'Customer added successfully!'
            );

            redirect('customers');
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('customers/add');
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $customer = $this->customer_model->getById($id);

        if (!$customer)
        {
            show_404();
        }

        if ($this->input->post())
        {
            $data = [
                'customer_name' => $this->input->post('customer_name'),
                'address'       => $this->input->post('address'),
                'phone'         => $this->input->post('phone')
            ];

            $this->customer_model->update($id, $data);

            $this->session->set_flashdata(
                'success',
                'Customer updated successfully!'
            );

            redirect('customers');
        }

        $data['customer'] = $customer;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('customers/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $customer = $this->customer_model->getById($id);

        if (!$customer)
        {
            show_404();
        }

        $this->customer_model->delete($id);

        $this->session->set_flashdata(
            'success',
            'Customer deleted successfully!'
        );

        redirect('customers');
    }
}