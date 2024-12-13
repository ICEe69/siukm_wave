<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller{

    public function index()
    {
        $data['identitas'] = $this->identitas_model->tampil_data('identitas')->result();
        $data['tentang_ukm'] = $this->tentangukm_model->tampil_data('tentang_ukm')->result();
        $data['informasi'] = $this->informasi_model->tampil_data('informasi')->result();
        $data['hubungi'] = $this->hubungi_model->tampil_data('hubungi')->result();
        $data['ketua'] = $this->anggota_model->get_jabatan('Ketua');
        $data['wakil_ketua'] = $this->anggota_model->get_jabatan('Wakil Ketua');
        $data['sekretaris'] = $this->anggota_model->get_jabatan('Sekretaris');
        $data['bendahara'] = $this->anggota_model->get_jabatan('Bendahara');
        $data['humas'] = $this->anggota_model->get_jabatan('Humas');

        $this->load->view('templates_admin/header');
        $this->load->view('landing_page',$data);
        $this->load->view('templates_admin/footer');
    }
    public function kirim_pesan()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->index();
        }else{
            $id     = $this->input->post('id_hubungi');
            $nama   = $this->input->post('nama');
            $email  = $this->input->post('email');
            $pesan  = $this->input->post('pesan');

            $data = array(
                'nama'  => $nama,
                'email' => $email,
                'pesan' => $pesan,
            );

            $this->hubungi_model->input_data($data,'hubungi');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pesan Berhasil Dikirim!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('welcome/index');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nama','nama','required',['required' => 'nama wajib diisi!']);
        $this->form_validation->set_rules('email','email','required',['required' => 'judul Informasi wajib diisi!']);
        $this->form_validation->set_rules('pesan','pesan','required',['required' => 'pesan wajib diisi!']);
    }
    public function logout()
    {
        // Hapus semua session
        $this->session->sess_destroy();
        redirect('welcome');
    }

}