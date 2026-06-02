<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        if ($this->input->post()) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->user_model->getByUsername($username);

            echo '<pre>';

            if ($user) {
                if ($password == $user->password) {
                    $data_session = array(
                        'id'       => $user->id,
                        'name'     => $user->name,
                        'username' => $user->username,
                        'role_id'  => $user->role_id,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data_session);
                    redirect('dashboard');
                } else {
                    echo "Password Salah!";
                }
            } else {
                echo "User tidak ditemukan!";
            }
            
            return;
        }

        $this->load->view('auth/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

}