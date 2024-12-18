<?php


class Keuangan_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('keuangan');
    }
    public function input_data($data)
    {
        $this->db->insert('keuangan',$data);
    }

    public function edit_data($where,$table)
    {
        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update('keuangan',$data);
    }

    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete('keuangan');
    }

    public function insert_batch($table = null, $data = array())
    {
        $jumlah = count($data);
        if($jumlah > 0)
        {
            $this->db->insert_batch($table,$data);
        }
    }
}