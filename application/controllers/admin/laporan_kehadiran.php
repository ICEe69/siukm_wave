<?php

class Laporan_kehadiran extends CI_Controller{

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

        if((isset($_GET['tanggal']) && $_GET['tanggal']!='') && (isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                $tanggal = $_GET['tanggal'];
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $tanggalbulantahun = $tanggal.$bulan.$tahun;
                //echo    '<script> alert('.$tanggalbulantahun.');</script>';
            }else{
                $tanggal = date('d');
                $bulan = date('m');
                $tahun = date('Y');
                $tanggalbulantahun = $tanggal.$bulan.$tahun;
            }

        $data = array(
            'username' => $data->username,
            'nama_anggota' => $data->nama_anggota,
            'photo' => $data->photo,
            'hak_akses' => $data->hak_akses,
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/laporan_kehadiran',$data);
        $this->load->view('templates_admin/footer');
    }
    

}