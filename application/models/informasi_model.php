<?php

class Informasi_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('informasi');
    }
    public function input_data($data)
    {
        $this->db->insert('informasi',$data);
    }
    public function edit_data($where)
    {
        return $this->db->get_where('informasi',$where);
    }

    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    
}