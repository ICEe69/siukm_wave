<?php

class Kehadiran extends CI_Controller{

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
        // Ambil data user dari session
        $data = $this->user_model->ambil_data($this->session->userdata('username'));

        if ((isset($_GET['tanggal']) && $_GET['tanggal'] != '') && 
            (isset($_GET['bulan']) && $_GET['bulan'] != '') && 
            (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $tanggal = $_GET['tanggal'];
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $tanggalbulantahun = $tanggal . $bulan . $tahun;
        } else {
            $tanggal = date('d');
            $bulan = date('m');
            $tahun = date('Y');
            $tanggalbulantahun = $tanggal . $bulan . $tahun;
        }

        $data = array(
            'username'      => $data->username,
            'nama_anggota'  => $data->nama_anggota,
            'photo'         => $data->photo,
            'hak_akses'     => $data->hak_akses,
        );

        $data['kehadiran'] = $this->db->query("SELECT kehadiran.*, anggota.nama_anggota, anggota.jenis_kelamin, anggota.nama_jabatan 
                FROM kehadiran 
                INNER JOIN anggota ON kehadiran.nim=anggota.nim
                INNER JOIN jabatan ON anggota.nama_jabatan=jabatan.nama_jabatan
                WHERE kehadiran.tanggal= '$tanggalbulantahun'
                ORDER BY anggota.nama_anggota ASC")->result();

        $this->load->view('templates_anggota/header');
        $this->load->view('templates_anggota/sidebar', $data);
        $this->load->view('anggota/kehadiran', $data);
        $this->load->view('templates_anggota/footer');
    }
}
