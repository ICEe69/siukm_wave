<?php
class Profile extends CI_Controller{

    function __construct() {
        parent::__construct();

    if (!isset($this->session->userdata['username'])){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('welcome');
        }
    }
    public function index()
    {
        
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        

        $data = array(
            'id' => $data->id,
            'username' => $data->username,
            'email' => $data->email,
            'level' => $data->level
        );
        $this->load->view('templates_strator/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/profile',$data);
        $this->load->view('templates_admin/footer');
    }
}