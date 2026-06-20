<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getByUsername($username)
    {
        return $this->db
                    ->where('username', $username)
                    ->get('users')
                    ->row();
    }

    public function getById($id)
    {
        return $this->db
            ->get_where('users', ['id' => $id])
            ->row();
    }

}