<?php

class Hubungi extends CI_Controller{

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

        $data = array(
            'username' => $data->username,
            'nama_anggota' => $data->nama_anggota,
            'photo' => $data->photo,
            'hak_akses' => $data->hak_akses,
            'hubungi' => $this->hubungi_model->tampil_data()->result()
        );

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/hubungi',$data);
        $this->load->view('templates_admin/footer');
    }
    public function kirim_email($id)
    {
        $user_data = $this->user_model->ambil_data($this->session->userdata['username']);
        $where = array('id_hubungi' => $id);

        $data = array(
            'username' => $user_data->username,
            'nama_anggota' => $user_data->nama_anggota,
            'photo' => $user_data->photo,
            'hak_akses' => $user_data->hak_akses,
            'hubungi' => $this->hubungi_model->kirim_data($where, 'hubungi')->result()
        );

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/form_kirim_email',$data);
        $this->load->view('templates_admin/footer');
    }
    public function kirim_email_aksi()
    {
        $to_email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('pesan');
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'aisyice69@gmail.com', 
            'smtp_pass' => 'a0i6s0y9',          
            'smtp_port' => 587,                 
            'crlf'      => "\r\n",
            'newline'   => "\r\n",
            'smtp_crypto' => 'tls',
        ];

        $this->load->library('email',$config);

        $this->email->from("Sistem Informasi Unit Kegiatan Mahasiswa");

        $this->email->to($to_email);

        $this->email->subject($subject);

        $this->email->message($message);

        if($this->email->send())
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Pesan Terkirim!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('admin/hubungi');
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Pesan Tidak Terkirim!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('admin/hubungi');
        }
    }
}