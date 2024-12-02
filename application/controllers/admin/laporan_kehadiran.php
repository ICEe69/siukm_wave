<?php

class Laporan_kehadiran extends CI_Controller{

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
            'hak_akses' => $data->hak_akses,
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/laporan_kehadiran',$data);
        $this->load->view('templates_admin/footer');
    }

}