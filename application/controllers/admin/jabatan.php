<?php

class Jabatan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        
        // Cek apakah user sudah login
        if (!$this->session->userdata('logged_in')) {
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
            'jabatan' => $this->jabatan_model->tampil_data()->result()
        );

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/jabatan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function input()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);

        $data = array(
            'username' => $data->username,
            'id_jabatan'=> set_value('id_jabatan'),
            'nama_jabatan'=> set_value('nama_jabatan'),
            'deskripsi'=> set_value('deskripsi'),
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/jabatan_form', $data); // Pastikan nama file view benar
        $this->load->view('templates_admin/footer');
    }

    public function input_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->input();
        }else{
            $data = array(
                'nama_jabatan' => $this->input->post('nama_jabatan', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
            );

            $this->jabatan_model->input_data($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Jabatan Berhasil di Tambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('admin/jabatan');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan','nama_jabatan','required',['required' => 'Nama Program Studi wajib diisi!']);
        $this->form_validation->set_rules('deskripsi','deskripsi','required',['required' => 'Nama Jurusan wajib diisi!']);
    }

    public function update($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->jabatan_model->edit_data($where,'jabatan')->result(); 

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/jabatan_update',$data);
        $this->load->view('templates_admin/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_jabatan');
        $nama_jabatan = $this->input->post('nama_jabatan');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'nama_jabatan' => $nama_jabatan,
            'deskripsi' => $deskripsi
        );

        $where = array(
            'id_jabatan' => $id
        );

        $this->jabatan_model->update_data($where,$data,'jabatan');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data jabatan Berhasil di Update!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/jabatan');
    }

    public function delete($id)
    {
        $where = array('id_jabatan' => $id);
        $this->jabatan_model->hapus_data($where, 'jabatan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data jabatan Berhasil di Hapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/jabatan');
    }
}