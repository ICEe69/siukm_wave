<?php

class Landing_page extends CI_Controller{

    public function index()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);

        $data = array(
            'username' => $data->username,
            'nama_anggota' => $data->nama_anggota,
            'photo' => $data->photo,
        );
        $data['identitas'] = $this->identitas_model->tampil_data('identitas')->result();
        $data['tentang_ukm'] = $this->tentangukm_model->tampil_data('tentang_ukm')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('landing_page',$data);
        $this->load->view('templates_admin/footer');
    }
}