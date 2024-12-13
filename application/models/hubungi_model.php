<?php

class Hubungi_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('hubungi');
    }
    public function input_data($data)
    {
        $this->db->insert('hubungi',$data);
    }
    public function kirim_data($where,$table)
    {
        return $this->db->get_where($table, $where);
    }

    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    
}