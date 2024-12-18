<?php
class Dashboard extends CI_Controller {

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

    public function index() {
        
        $data = $this->user_model->ambil_data($this->session->userdata['username']);

        if ($data) {
            
            $hak_akses = $data->hak_akses == '1' ? "admin" : "anggota";

            $data = array(
                'username' => $data->username,
                'nama_anggota' => $data->nama_anggota,
                'photo' => $data->photo,
                'hak_akses' => $hak_akses
            );

            // Memuat tampilan
            $id = $this->session->userdata('id_anggota');
            $data['anggota'] = $this->db->query("SELECT * FROM anggota WHERE id_anggota='$id'")->result();
            $this->load->view('templates_anggota/header');
            $this->load->view('templates_anggota/sidebar', $data);
            $this->load->view('anggota/dashboard', $data);
            $this->load->view('templates_anggota/footer');
        } else {
            // Jika data pengguna tidak ditemukan, redirect ke halaman login
            redirect('login');
        }
    }
}
