<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller{

    public function index()
    {
        $data['identitas'] = $this->identitas_model->tampil_data('identitas')->result();
        $data['tentang_ukm'] = $this->tentangukm_model->tampil_data('tentang_ukm')->result();
        $data['ketua'] = $this->anggota_model->get_jabatan('Ketua');
        $data['wakil_ketua'] = $this->anggota_model->get_jabatan('Wakil Ketua');
        $data['sekretaris'] = $this->anggota_model->get_jabatan('Sekretaris');
        $data['bendahara'] = $this->anggota_model->get_jabatan('Bendahara');
        $data['humas'] = $this->anggota_model->get_jabatan('Humas');

        $this->load->view('templates_admin/header');
        $this->load->view('landing_page',$data);
        $this->load->view('templates_admin/footer');
    }
    public function logout()
    {
        // Hapus semua session
        $this->session->sess_destroy();
        redirect('welcome');
    }
}