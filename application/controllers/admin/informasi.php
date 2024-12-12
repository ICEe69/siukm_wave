<?php

class Informasi extends CI_Controller{

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
            'informasi' => $this->informasi_model->tampil_data()->result()
        );

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/informasi',$data);
        $this->load->view('templates_admin/footer');
    }

    public function input()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);

        $data = array(
            'username' => $data->username,
            'nama_anggota' => $data->nama_anggota,
            'photo' => $data->photo,
            'hak_akses' => $data->hak_akses,
            'id_informasi'=> set_value('id_informasi'),
            'icon'=> set_value('icon'),
            'judul_informasi'=> set_value('judul_informasi'),
            'isi_informasi'=> set_value('isi_informasi'),
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/informasi_form', $data); // Pastikan nama file view benar
        $this->load->view('templates_admin/footer');
    }

    public function input_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->input();
        }else{
            $data = array(
                'icon' => $this->input->post('icon', TRUE),
                'judul_informasi' => $this->input->post('judul_informasi', TRUE),
                'isi_informasi' => $this->input->post('isi_informasi', TRUE),
            );

            $this->informasi_model->input_data($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data informasi Berhasil di Tambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('admin/informasi');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('icon','icon','required',['required' => 'Icon wajib diisi!']);
        $this->form_validation->set_rules('judul_informasi','judul_informasi','required',['required' => 'judul Informasi wajib diisi!']);
        $this->form_validation->set_rules('isi_informasi','isi_informasi','required',['required' => 'Nama Jurusan wajib diisi!']);
    }

    public function update($id)
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        

        $data = array(
            'username' => $data->username,
            'nama_anggota' => $data->nama_anggota,
            'photo' => $data->photo,
            'hak_akses' => $data->hak_akses,
            'informasi' => $this->informasi_model->tampil_data()->result()
        );
        $where = array('id_informasi' => $id);
        $data['informasi'] = $this->informasi_model->edit_data($where,'informasi')->result(); 

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/informasi_update',$data);
        $this->load->view('templates_admin/footer');
        

    }

    public function update_aksi()
    {
        $id = $this->input->post('id_informasi');
        $icon = $this->input->post('icon');
        $judul_informasi = $this->input->post('judul_informasi');
        $isi_informasi = $this->input->post('isi_informasi');

        $data = array(
            'icon' => $icon,
            'judul_informasi' => $judul_informasi,
            'isi_informasi' => $isi_informasi
        );

        $where = array(
            'id_informasi' => $id
        );

        $this->informasi_model->update_data($where,$data,'informasi');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data informasi Berhasil di Update!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/informasi');
    }

    public function delete($id)
    {
        $where = array('id_informasi' => $id);
        $this->informasi_model->hapus_data($where, 'informasi');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data informasi Berhasil di Hapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/informasi');
    }
}