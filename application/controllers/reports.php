<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in'))
        {
            redirect('auth');
        }

        // Hanya Manager
        if ($this->session->userdata('role_id') != 3)
        {
            redirect('dashboard');
        }

        $this->load->model('report_model');
    }

    public function index()
    {
        $data['reports'] = [];
        $data['total_sales'] = 0;

        if($this->input->get('periode'))
        {
            $periode = $this->input->get('periode');

            $data['reports'] = $this->report_model
                ->getReportByMonth($periode);

            $data['total_sales'] = $this->report_model
                ->getTotalSalesByMonth($periode);
        }

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('reports/index', $data);
        $this->load->view('templates/footer');
    }

    public function print()
    {
        $periode = $this->input->get('periode');

        $data['reports'] = $this->report_model
            ->getReportByMonth($periode);

        $data['total_sales'] = $this->report_model
            ->getTotalSalesByMonth($periode);

        $data['periode'] = $periode;

        $this->load->view(
            'reports/print_report',
            $data
        );
    }

    public function sales()
    {
        $data['reports'] = [];
        $data['total_sales'] = 0;

        if($this->input->get('periode'))
        {
            $periode = $this->input->get('periode');

            $data['reports'] =
                $this->report_model->getSalesReport(
                    $periode
                );

            foreach($data['reports'] as $row)
            {
                $data['total_sales'] +=
                    $row->total_penjualan;
            }
        }

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('reports/sales/index', $data);
        $this->load->view('templates/footer');
    }

    public function printSales()
    {
        $periode = $this->input->get('periode');

        $data['reports'] =
            $this->report_model->getSalesReport($periode);

        $data['periode'] = $periode;

        $data['total_sales'] = 0;

        foreach($data['reports'] as $row)
        {
            $data['total_sales'] +=
            $row->total_penjualan;
        }

        $this->load->view(
            'reports/print_sales',
            $data
        );

    }

    public function product()
    {
        $data['reports'] = [];
        $data['total_qty'] = 0;
        $data['total_sales'] = 0;

        if($this->input->get('periode'))
        {
            $periode = $this->input->get('periode');

            $data['reports'] =
                $this->report_model->getProductReport(
                    $periode
                );

            foreach($data['reports'] as $row)
            {
                $data['total_qty'] +=
                    $row->total_qty;

                $data['total_sales'] +=
                    $row->total_penjualan;
            }
        }

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('reports/product/index', $data);
        $this->load->view('templates/footer');
    }

    public function printProduct()
    {
        $periode = $this->input->get('periode');

        $data['reports'] =
            $this->report_model->getProductReport($periode);

        $data['periode'] = $periode;

        $data['total_qty'] = 0;
        $data['total_sales'] = 0;

        foreach($data['reports'] as $row)
        {
            $data['total_qty'] +=
                $row->total_qty;

            $data['total_sales'] +=
                $row->total_penjualan;
        }

        $this->load->view(
            'reports/print_product',
            $data
        );

    }

}