<?php

class Identitas_model extends CI_Model{
    
    public function tampil_data()
    {
        return $this->db->get('identitas');
    }
    public function edit_data($where,$table)
    {
        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function ambil_data($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('identitas')->row();
    }
    
}