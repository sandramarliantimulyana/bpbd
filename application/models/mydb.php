<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mydb extends CI_Model
{
    //INPUT, UPDATE, EDIT
    public function input_dt($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_dt($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function del($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}