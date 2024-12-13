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
            'username'          => $data->username,
            'nama_anggota'      => $data->nama_anggota,
            'photo'             => $data->photo,
            'hak_akses'         => $data->hak_akses,
            'id_kegiatan'       => set_value('id_kegiatan'),
            'nama_kegiatan'     => set_value('nama_kegiatan'),
            'tanggal_kegiatan'  => set_value('tanggal_kegiatan'),
            'lokasi'            => set_value('lokasi'),
            'penyelenggara'     => set_value('penyelenggara'),
            'kuota'             => set_value('kuota'),
            'link'              => set_value('link'),
            'status'            => set_value('status'),
            'deskripsi'         => set_value('deskripsi'),
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
        $poster = $_FILES['poster']['name'];
        if ($poster != '') {
            // Pengaturan upload file
            $config['upload_path'] = './assets/poster';  // Folder tempat menyimpan foto
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';  // Format foto yang diterima
            $config['max_size'] = 2048;  // Maksimum ukuran file (dalam KB)

            // Load library upload
            $this->load->library('upload', $config);

            // Proses upload
            if (!$this->upload->do_upload('poster')) {
                echo "poster gagal diupload!";
                // Tampilkan error upload jika gagal
                print_r($this->upload->display_errors());
                return;  // Jangan lanjutkan proses jika upload gagal
            } else {
                // Ambil nama file yang diupload
                $poster = $this->upload->data('file_name');
            }
        } else {
            // Jika tidak ada foto yang diupload, gunakan nilai default
            $poster = 'default.jpg';  // Atau biarkan kosong jika diinginkan
        }

            $data = array(
                'nama_kegiatan'     => $this->input->post('nama_kegiatan', TRUE),
                'tanggal_kegiatan'  => $this->input->post('tanggal_kegiatan, TRUE'),
                'lokasi'            => $this->input->post('lokasi', TRUE),
                'penyelenggara'     => $this->input->post('penyelenggara', TRUE),
                'kuota'             => $this->input->post('kuota', TRUE),
                'link'              => $this->input->post('link', TRUE),
                'status'            => $this->input->post('status', TRUE),
                'deskripsi'         => $this->input->post('deskripsi', TRUE),
                'poster'            => $poster
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
        $this->form_validation->set_rules('tanggal_kegiatan','tanggal_kegiatan','required',['required' => 'Tanggal kegiatan wajib diisi!']);
        $this->form_validation->set_rules('lokasi','lokasi','required',['required' => 'Lokasi kegiatan wajib diisi!']);
        $this->form_validation->set_rules('penyelenggara','penyelenggara','required',['required' => 'penyelenggara wajib diisi!']);
        $this->form_validation->set_rules('kuota','kuota','required',['required' => 'Kuota wajib diisi!']);
        $this->form_validation->set_rules('link','link','required',['required' => 'Link wajib diisi!']);
        $this->form_validation->set_rules('status','status','required',['required' => 'Status wajib diisi!']);
        $this->form_validation->set_rules('deskripsi','deskripsi','required',['required' => 'Deskripsi wajib diisi!']);
        
    }

    public function update($id)
    {
         $data = $this->user_model->ambil_data($this->session->userdata['username']);

        $data = array(
            'username'          => $data->username,
            'hak_akses'         => $data->hak_akses,
            'nama_anggota'      => $data->nama_anggota,
            'photo'             => $data->photo,
            'kegiatan'          => $this->kegiatan_model->tampil_data()->result()
        );
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
        $tanggal_kegiatan = $this->input->post('tanggal_kegiatan');
        $lokasi = $this->input->post('lokasi');
        $penyelenggara = $this->input->post('penyelenggara');
        $kuota = $this->input->post('kuota');
        $link = $this->input->post('link');
        $status = $this->input->post('status');
        $deskripsi = $this->input->post('deskripsi');
        $poster = $_FILES['poster']['name'];
        if ($poster != '') {
            // Proses upload jika ada file baru
            $config['upload_path'] = './assets/poster';  
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';  
            $config['max_size'] = 2048;  

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('poster')) {
                echo "poster gagal diupload!";
            } else {
                $poster = $this->upload->data('file_name');
            }
        } else {
            // Gunakan foto lama jika tidak ada yang diupload
            $poster = $this->input->post('existing_poster');
        }

        $data = array(
            'nama_kegiatan'         => $nama_kegiatan,
            'tanggal_kegiatan'      => $tanggal_kegiatan,
            'lokasi'                => $lokasi,
            'penyelenggara'         => $penyelenggara,
            'kuota'                 => $kuota,
            'link'                  => $link,
            'status'                => $status,
            'deskripsi'             => $deskripsi,
            'poster'                => $poster,
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