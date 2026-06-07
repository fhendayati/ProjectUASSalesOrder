<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        // Manager tidak boleh masuk Orders
        if ($this->session->userdata('role_id') == 3) {
            redirect('dashboard');
        }

        $this->load->model('order_model');
        $this->load->model('customer_model');
        $this->load->model('product_model');
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 1)
        {
            // Admin melihat semua order
            $data['orders'] = $this->order_model->getAll();
        }
        else
        {
            // Sales melihat order miliknya sendiri
            $data['orders'] = $this->order_model->getByUser(
                $this->session->userdata('id')
            );
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('orders/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        if ($this->input->post())
        {
            $product = $this->product_model->getById(
                $this->input->post('product_id')
            );

            $qty = $this->input->post('qty');

            if($qty > $product->stock)
            {
                $this->session->set_flashdata(
                    'error',
                    'Stock tidak mencukupi!'
                );

                redirect('orders/add');
            }

            $subtotal = $product->price * $qty;

            $orderData = [
                'order_date'  => $this->input->post('order_date'),
                'customer_id' => $this->input->post('customer_id'),
                'user_id'     => $this->session->userdata('id'),
                'total_price' => $subtotal,
                'status'      => 'draft',
                'created_at'  => date('Y-m-d H:i:s')
            ];

            $orderId = $this->order_model->insertOrder($orderData);

            $detailData = [
                'order_id'   => $orderId,
                'product_id' => $product->id,
                'qty'        => $qty,
                'price'      => $product->price,
                'subtotal'   => $subtotal
            ];

            $this->order_model->insertDetail($detailData);

            $newStock = $product->stock - $qty;

            $this->product_model->updateStock(
                $product->id,
                $newStock
            );

            $this->session->set_flashdata(
                'success',
                'Order added successfully!'
            );

            redirect('orders');
        }

        $data['customers'] = $this->customer_model->getAll();
        $data['products']  = $this->product_model->getAll();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('orders/add', $data);
        $this->load->view('templates/footer');
    }

    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('orders', [
            'status' => $status
        ]);

        $this->session->set_flashdata(
            'success',
            'Status updated successfully!'
        );

        redirect('orders');
    }

    public function detail($id)
    {
        $data['order'] = $this->order_model->getOrderById($id);

        $data['details'] = $this->order_model->getOrderDetails($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('orders/detail', $data);
        $this->load->view('templates/footer');
    }
}
