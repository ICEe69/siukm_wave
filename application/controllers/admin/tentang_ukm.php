<?php

class Tentang_ukm extends CI_Controller{

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('hak_akses') !='1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('welcome');
        }
    }
    public function index()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);

        $data = array(
            'username'          => $data->username,
            'hak_akses'         => $data->hak_akses,
            'nama_anggota'      => $data->nama_anggota,
            'photo'             => $data->photo,
            'tentang_ukm'         => $this->tentangukm_model->tampil_data()->result()
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/tentang_ukm',$data);
        $this->load->view('templates_admin/footer');
    }

    public function update($id)
    {
         $data = $this->user_model->ambil_data($this->session->userdata['username']);

        $data = array(
            'username'          => $data->username,
            'hak_akses'         => $data->hak_akses,
            'nama_anggota'      => $data->nama_anggota,
            'photo'             => $data->photo,
            'tentang_ukm'       => $this->tentangukm_model->tampil_data()->result()
        );
        $where = array('id' => $id);
        $data['tentang_ukm'] = $this->tentangukm_model->edit_data($where,'tentang_ukm')->result(); 

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/tentangukm_update',$data);
        $this->load->view('templates_admin/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id');
        $sejarah = $this->input->post('sejarah');
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');

        $data = array(
            'sejarah'       => $sejarah,
            'visi'          => $visi,
            'misi'          => $misi
        );

        $where = array(
            'id' => $id
        );

        $this->tentangukm_model->update_data($where,$data,'tentang_ukm');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data tentang UKM Berhasil di Update!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/tentang_ukm');
    }
}