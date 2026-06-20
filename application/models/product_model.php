<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product_model extends CI_Model
{
    private $table = 'products';

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getById($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->get($this->table)
                    ->row();
    }

    public function update($id, $data)
    {
        return $this->db
                    ->where('id', $id)
                    ->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->delete($this->table);
    }

    public function updateStock($id, $stock)
    {
        $this->db->where('id', $id);

        return $this->db->update(
            'products',
            ['stock' => $stock]
        );
    }
}