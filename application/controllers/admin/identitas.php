<?php

class Identitas extends CI_Controller{

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
            'identitas'         => $this->identitas_model->tampil_data()->result()
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/identitas',$data);
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
            'identitas'         => $this->identitas_model->tampil_data()->result()
        );
        $where = array('id_identitas' => $id);
        $data['identitas'] = $this->identitas_model->edit_data($where,'identitas')->result(); 

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/identitas_update',$data);
        $this->load->view('templates_admin/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_identitas');
        $nama_website = $this->input->post('nama_website');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');

        $data = array(
            'nama_website' => $nama_website,
            'alamat'       => $alamat,
            'email'        => $email,
            'telp'         => $telp,
        );

        $where = array(
            'id_identitas' => $id
        );

        $this->identitas_model->update_data($where,$data,'identitas');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data identitas Berhasil di Update!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/identitas');
    }
}