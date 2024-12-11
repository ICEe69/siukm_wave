<?php

class Landing_page extends CI_Controller{

    public function index()
    {
        $data['identitas'] = $this->identitas_model->tampil_data('identitas')->result();
        $data['tentang_ukm'] = $this->tentangukm_model->tampil_data('tentang_ukm')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('landing_page',$data);
        $this->load->view('templates_admin/footer');
    }
}