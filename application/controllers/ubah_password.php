<?php

class Ubah_password extends CI_Controller
{
    public function index()
    {
        // Validasi session
        if (!$this->session->userdata('username')) {
            redirect('auth'); // Redirect ke halaman login jika session tidak ada
        }

        // Ambil data user berdasarkan session
        $data = $this->user_model->ambil_data($this->session->userdata('username'));

        if ($data) {
            // Tentukan hak akses
            $hak_akses = $data->hak_akses == '1' ? "admin" : "anggota";

            // Persiapkan data untuk dikirim ke view
            $data = array(
                'username'   => $data->username,
                'nama_anggota' => $data->nama_anggota,
                'photo'      => $data->photo,
                'hak_akses'  => $hak_akses
            );

            // Load views
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('form_ubahpassword', $data);
            $this->load->view('templates_admin/footer');
        } 
    }

    public function ubah_passwordaksi()
    {
        $pass_baru = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru','password baru','required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass','ulangi password','required');


        if($this->form_validation->run() != FALSE){
            
            $data = array('password' => md5($pass_baru));
            $id = array('id_anggota' => $this->session->userdata('id_anggota'));

            $this->jabatan_model->update_data($id,$data,'anggota');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Password berhasil diubah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>');
            redirect('welcome');
        }else{
            if (!$this->session->userdata('username')) {
            redirect('auth'); // Redirect ke halaman login jika session tidak ada
        }

        // Ambil data user berdasarkan session
        $data = $this->user_model->ambil_data($this->session->userdata('username'));

        if ($data) {
            // Tentukan hak akses
            $hak_akses = $data->hak_akses == '1' ? "admin" : "anggota";

            // Persiapkan data untuk dikirim ke view
            $data = array(
                'username'   => $data->username,
                'nama_anggota' => $data->nama_anggota,
                'photo'      => $data->photo,
                'hak_akses'  => $hak_akses
            );

            // Load views
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('form_ubahpassword', $data);
            $this->load->view('templates_admin/footer');
            }
        }
    }
}
