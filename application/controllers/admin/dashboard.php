<?php
class Dashboard extends CI_Controller {

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

    public function index() {
        
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $admin = $this->db->where('hak_akses', '1')->count_all_results('anggota');

        if ($data) {
            
            $hak_akses = $data->hak_akses == '1' ? "admin" : "anggota";

            $data = array(
                'username' => $data->username,
                'nama_anggota' => $data->nama_anggota,
                'photo' => $data->photo,
                'hak_akses' => $hak_akses,
                'anggota' => count($this->anggota_model->tampil_data()->result()), // Menghitung jumlah anggota
                'kegiatan' => count($this->kegiatan_model->tampil_data()->result()), // Menghitung jumlah kegiatan
                'kehadiran' => count($this->kehadiran_model->tampil_data()->result()), // Menghitung jumlah kehadiran
                'admin' => $admin
            );

            // Memuat tampilan
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('templates_admin/footer');
        } else {
            // Jika data pengguna tidak ditemukan, redirect ke halaman login
            redirect('welcome');
        }
    }
}
