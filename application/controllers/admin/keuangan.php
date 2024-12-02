<?php

class Keuangan extends CI_Controller{

    public function index()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);

        
        $data = array(
            'username' => $data->username,
            'hak_akses' => $data->hak_akses,
            'keuangan' => $this->keuangan_model->tampil_data()->result()
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/keuangan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function input()
    {
        if($this->input->post('submit', TRUE) == 'submit'){

            $post = $this->input->post();

            $this->keuangan_model->insert_batch('keuangan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Jabatan Berhasil di Tambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('admin/keuangan');
        }

        $data['jabatan'] = $this->keuangan_model->tampil_data('jabatan')->result();
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        

        $data = array(
            'username' => $data->username,
            'id_keuangan'=> set_value('id_keuangan'),
            'nim'=> set_value('nim'),
            'nama_anggota'=> set_value('nama_anggota'),
            'jenis_kelamin'=> set_value('jenis_kelamin'),
            'nama_jabatan'=> set_value('nama_jabatan'),
            'hadir'=> set_value('hadir'),
            'sakit'=> set_value('sakit'),
            'alpha'=> set_value('alpha')
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/keuangan_form', $data); // Pastikan nama file view benar
        $this->load->view('templates_admin/footer');
    }
}
