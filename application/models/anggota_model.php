<?php

class Anggota_model extends CI_Model{
    
    public function tampil_data()
    {
        return $this->db->get('anggota');
    }

    public function input_data($data)
    {
        $this->db->insert('anggota',$data);
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

    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function ambil_data($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('anggota')->row();
    }
    public function get_jabatan($jabatan)
    {
        $this->db->where('nama_jabatan', $jabatan); 
        $query = $this->db->get('anggota');        
        return $query->row();                      
    }
}
