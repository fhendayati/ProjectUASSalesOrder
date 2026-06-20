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

                    $this->db->where('id', $user->id);
                    $this->db->update('users', [
                        'last_login' => date('Y-m-d H:i:s')
                    ]);

                    $data_session = array(
                        'id'         => $user->id,
                        'name'       => $user->name,
                        'username'   => $user->username,
                        'role_id'    => $user->role_id,
                        'photo'      => $user->photo,
                        'last_login' => date('Y-m-d H:i:s'),
                        'logged_in'  => TRUE
                    );

                    $this->session->set_userdata($data_session);

                    $this->session->set_flashdata(
                        'login_success',
                        'Welcome, '.$user->name.'!'
                    );

                    redirect('dashboard');
                    
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'The password you entered is incorrect!'
                    );

                    redirect('auth');

                }
            } else {
                    $this->session->set_flashdata(
                        'error',
                        'Username not found!'
                    );

                redirect('auth');
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