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
        // if ($this->session->userdata('role_id') == 3) {
        //     redirect('dashboard');
        // }

        $this->load->model('order_model');
        $this->load->model('customer_model');
        $this->load->model('product_model');
    }

    public function index()
    {
        $status = $this->input->get('status');

        $data['status'] = $status;

        $role_id = $this->session->userdata('role_id');

        if($role_id == 1)
        {
            // Admin
            $data['orders'] =
                $this->order_model->getAll($status);
        }
        elseif($role_id == 2)
        {
            // Sales
            $data['orders'] =
                $this->order_model->getByUser(
                    $this->session->userdata('id'),
                    $status
                );
        }
        else
        {
            // Manager
            $data['orders'] =
                $this->order_model->getAll($status);
        }

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('orders/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        if($this->session->userdata('role_id') != 2)
        {
            redirect('orders');
        }

        if($this->input->post())
        {
            $product_ids =
                $this->input->post('product_id');

            $qtys =
                $this->input->post('qty');

            $total_price = 0;

            // CEK STOCK DAN HITUNG TOTAL

            foreach($product_ids as $key => $product_id)
            {
                $product =
                    $this->product_model
                        ->getById($product_id);

                $qty =
                    $qtys[$key];

                if($qty > $product->stock)
                {
                    $this->session->set_flashdata(
                        'error',
                        'Insufficient stock for '.$product->product_name
                    );

                    redirect('orders/add');
                }

                $total_price +=
                    $product->price * $qty;
            }

            // SIMPAN ORDER

            $orderData = [

                'order_date'  =>
                    $this->input->post('order_date'),

                'customer_id' =>
                    $this->input->post('customer_id'),

                'user_id' =>
                    $this->session->userdata('id'),

                'total_price' =>
                    $total_price,

                'status' =>
                    'draft',

                'created_at' =>
                    date('Y-m-d H:i:s')
            ];

            $orderId =
                $this->order_model
                    ->insertOrder(
                        $orderData
                    );

            // SIMPAN DETAIL PRODUK

            foreach($product_ids as $key => $product_id)
            {
                $product =
                    $this->product_model
                        ->getById($product_id);

                $qty =
                    $qtys[$key];

                $subtotal =
                    $product->price * $qty;

                $detailData = [

                    'order_id'   => $orderId,

                    'product_id' => $product_id,

                    'qty'        => $qty,

                    'price'      => $product->price,

                    'subtotal'   => $subtotal
                ];

                $this->order_model
                    ->insertDetail(
                        $detailData
                    );
            }

            $this->session->set_flashdata(
                'success',
                'Order added successfully!'
            );

            redirect('orders');
        }

        $data['customers'] =
            $this->customer_model->getAll();

        $data['products'] =
            $this->product_model->getAll();

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('orders/add', $data);
        $this->load->view('templates/footer');
    }

    public function update_status($id, $status)
    {
        if($this->session->userdata('role_id') != 1)
        {
            redirect('orders');
        }
        
        // Jika status menjadi selesai
        if($status == 'selesai')
        {
            $details = $this->order_model->getOrderDetails($id);

            foreach($details as $detail)
            {
                $product = $this->product_model->getById(
                    $detail->product_id
                );

                $newStock =
                    $product->stock - $detail->qty;

                $this->product_model->updateStock(
                    $product->id,
                    $newStock
                );
            }
        }

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

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('orders/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        if($this->session->userdata('role_id') != 2)
        {
            redirect('orders');
        }

        $order = $this->order_model->getOrderById($id);

        if(
            $order->user_id !=
            $this->session->userdata('id')
        )
        {
            redirect('orders');
        }

        if(!$order || $order->status != 'draft')
        {
            redirect('orders');
        }

        if($this->input->post())
        {
            $product_ids = $this->input->post('product_id');
            $qtys        = $this->input->post('qty');

            $total = 0;

            foreach($product_ids as $key => $product_id)
            {
                $product = $this->product_model->getById(
                    $product_id
                );

                $subtotal =
                    $product->price * $qtys[$key];

                $total += $subtotal;
            }

            $this->order_model->updateOrder(
                $id,
                [
                    'order_date'  => $this->input->post('order_date'),
                    'customer_id' => $this->input->post('customer_id'),
                    'total_price' => $total
                ]
            );

            $this->order_model->deleteDetails($id);

            foreach($product_ids as $key => $product_id)
            {
                $product = $this->product_model->getById(
                    $product_id
                );

                $subtotal =
                    $product->price * $qtys[$key];

                $this->order_model->insertDetail([
                    'order_id'   => $id,
                    'product_id' => $product_id,
                    'qty'        => $qtys[$key],
                    'price'      => $product->price,
                    'subtotal'   => $subtotal
                ]);
            }

            $this->session->set_flashdata(
                'success',
                'Order updated successfully!'
            );

            redirect('orders');
        }

        $data['order'] = $order;

        $data['details'] =
            $this->order_model->getOrderDetails($id);

        $data['customers'] =
            $this->customer_model->getAll();

        $data['products'] =
            $this->product_model->getAll();

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('orders/edit', $data);
        $this->load->view('templates/footer');
    }
}
