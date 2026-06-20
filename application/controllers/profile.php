<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('logged_in'))
        {
            redirect('auth');
        }

        $this->load->model('user_model');
    }

    public function index()
    {
        $data['user'] =
            $this->user_model->getById(
                $this->session->userdata('id')
            );

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
    }

    public function changePassword()
    {
        $user = $this->user_model->getById(
        $this->session->userdata('id')
        );

        if($this->input->post())
        {
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            if($old_password != $user->password)
            {
                $this->session->set_flashdata(
                    'error',
                    'Password lama tidak sesuai!'
                );

                redirect('profile/changePassword');
            }

            if($new_password != $confirm_password)
            {
                $this->session->set_flashdata(
                    'error',
                    'Konfirmasi password tidak cocok!'
                );

                redirect('profile/changePassword');
            }

            $this->db->where('id', $user->id);

            $this->db->update('users', [
                'password' => $new_password
            ]);

            $this->session->set_flashdata(
                'success',
                'Password berhasil diubah!'
            );

            redirect('profile/changePassword');
        }

        $data['user'] = $user;

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('profile/change_password', $data);
        $this->load->view('templates/footer');
    }

    public function uploadPhoto()
    {
        $config['upload_path']   = './uploads/profile/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['file_name']     = 'user_'.$this->session->userdata('id').'_' . time();

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo'))
        {
            $this->session->set_flashdata(
                'error',
                $this->upload->display_errors('', '')
            );

            redirect('profile');
        }

        $uploadData = $this->upload->data();

        $fileName = $uploadData['file_name'];

        $this->db->where(
            'id',
            $this->session->userdata('id')
        );

        $this->db->update('users', [
            'photo' => $fileName
        ]);

        $this->session->set_userdata(
            'photo',
            $fileName
        );

        $this->session->set_flashdata(
            'success',
            'Foto profil berhasil diubah!'
        );

        redirect('profile');
    }
}