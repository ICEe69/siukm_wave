<?php

class Kegiatan extends CI_Controller{

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
            'hak_akses' => $data->hak_akses,
            'nama_anggota' => $data->nama_anggota,
            'photo' => $data->photo,
            'kegiatan' => $this->kegiatan_model->tampil_data()->result()
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/kegiatan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function input()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        

        $data = array(
            'username' => $data->username,
            'id_kegiatan'=> set_value('id_kegiatan'),
            'nama_kegiatan'=> set_value('nama_kegiatan'),
            'penyelenggara'=> set_value('penyelenggara'),
            'kuota'=> set_value('kuota'),
            'status'=> set_value('status')
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/kegiatan_form', $data); // Pastikan nama file view benar
        $this->load->view('templates_admin/footer');
    }

    public function input_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->input();
        }else{
            $data = array(
                'nama_kegiatan' => $this->input->post('nama_kegiatan', TRUE),
                'penyelenggara' => $this->input->post('penyelenggara', TRUE),
                'kuota' => $this->input->post('kuota', TRUE),
                'status' => $this->input->post('status', TRUE),
            );

            $this->kegiatan_model->input_data($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data kegiatan Berhasil di Tambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('admin/kegiatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kegiatan','nama_kegiatan','required',['required' => 'Nama kegiatan wajib diisi!']);
        $this->form_validation->set_rules('penyelenggara','penyelenggara','required',['required' => 'penyelenggara wajib diisi!']);
        $this->form_validation->set_rules('kuota','kuota','required',['required' => 'Tanggal Masuk wajib diisi!']);
        $this->form_validation->set_rules('status','status','required',['required' => 'Status wajib diisi!']);
    }

    public function update($id)
    {
        $where = array('id_kegiatan' => $id);
        $data['kegiatan'] = $this->kegiatan_model->edit_data($where,'kegiatan')->result(); 

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/kegiatan_update',$data);
        $this->load->view('templates_admin/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_kegiatan');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $penyelenggara = $this->input->post('penyelenggara');
        $kuota = $this->input->post('kuota');
        $status = $this->input->post('status');

        $data = array(
            'nama_kegiatan' => $nama_kegiatan,
            'penyelenggara' => $penyelenggara,
            'kuota' => $kuota,
            'status' => $status,
        );

        $where = array(
            'id_kegiatan' => $id
        );

        $this->kegiatan_model->update_data($where,$data,'kegiatan');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data kegiatan Berhasil di Update!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/kegiatan');
    }

    public function delete($id)
    {
        $where = array('id_kegiatan' => $id);
        $this->kegiatan_model->hapus_data($where, 'kegiatan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data kegiatan Berhasil di Hapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/kegiatan');
    }
}