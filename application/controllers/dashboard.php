<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer');
    }

}