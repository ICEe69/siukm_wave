<?php

class Kegiatan extends CI_Controller{

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('hak_akses') !='2') {
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
            'username' => $data->username,
            'hak_akses' => $data->hak_akses,
            'nama_anggota' => $data->nama_anggota,
            'photo' => $data->photo,
            'kegiatan' => $this->kegiatan_model->tampil_data()->result()
        );
        $this->load->view('templates_anggota/header');
        $this->load->view('templates_anggota/sidebar',$data);
        $this->load->view('anggota/kegiatan',$data);
        $this->load->view('templates_anggota/footer');
    }
}