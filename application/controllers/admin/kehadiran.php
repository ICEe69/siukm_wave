<?php

class Kehadiran extends CI_Controller{

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

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/kehadiran', $data);
        $this->load->view('templates_admin/footer');
    }

    public function input()
    {
        if ($this->input->post('submit', TRUE) == 'submit') {

            $post = $this->input->post();

            foreach ($post['tanggal'] as $key => $value) {
                if ($post['tanggal'][$key] != '' || $post['nim'][$key] != '') {
                    $simpan[] = array(
                        'tanggal'           => $post['tanggal'][$key],
                        'nim'               => $post['nim'][$key],
                        'nama_anggota'      => $post['nama_anggota'][$key],
                        'jenis_kelamin'     => $post['jenis_kelamin'][$key],
                        'nama_jabatan'      => $post['nama_jabatan'][$key],
                        'hadir'             => $post['hadir'][$key],
                        'sakit'             => $post['sakit'][$key],
                        'alpha'             => $post['alpha'][$key],
                    );
                }
            }
            

            $this->kehadiran_model->insert_batch('kehadiran', $simpan);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Kehadiran Berhasil Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('admin/kehadiran');
        }

        // Ambil data jabatan
        
        $data['jabatan'] = $this->kehadiran_model->tampil_data('jabatan')->result();

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

        $data = $this->user_model->ambil_data($this->session->userdata('username'));

        $data = array(
            'username' => $data->username,
            'nama_anggota' => $data->nama_anggota,
            'photo' => $data->photo,
            'hak_akses' => $data->hak_akses,

            'id_kehadiran'   => set_value('id_kehadiran'),
            'nim'            => set_value('nim'),
            'jenis_kelamin'  => set_value('jenis_kelamin'),
            'nama_jabatan'   => set_value('nama_jabatan'),
            'hadir'          => set_value('hadir'),
            'sakit'          => set_value('sakit'),
            'alpha'          => set_value('alpha'),
        );

        $data['input'] = $this->db->query("SELECT anggota.*, jabatan.nama_jabatan FROM anggota
            INNER JOIN jabatan ON anggota.nama_jabatan=jabatan.nama_jabatan
            WHERE NOT EXISTS (SELECT * FROM kehadiran WHERE tanggal='$tanggalbulantahun' AND anggota.nim=kehadiran.nim) 
            ORDER BY anggota.nama_anggota ASC")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/kehadiran_form', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetak_laporankehadiran()
    {
        $user_data = $this->user_model->ambil_data($this->session->userdata('username'));

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
            'username'  => $user_data->username,
            'hak_akses' => $user_data->hak_akses,
        );

        $data['cetak_laporankehadiran'] = $this->db->query("SELECT kehadiran.*, anggota.nama_anggota, anggota.jenis_kelamin, anggota.nama_jabatan 
                FROM kehadiran 
                INNER JOIN anggota ON kehadiran.nim=anggota.nim
                INNER JOIN jabatan ON anggota.nama_jabatan=jabatan.nama_jabatan
                WHERE kehadiran.tanggal= '$tanggalbulantahun'
                ORDER BY anggota.nama_anggota ASC")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('admin/cetak_laporankehadiran', $data);
    }
}
