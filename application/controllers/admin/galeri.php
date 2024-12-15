<?php

class galeri extends CI_Controller{

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
            'galeri' => $this->galeri_model->tampil_data()->result()
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/galeri',$data);
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
            'id_galeri'       => set_value('id_galeri'),
            'nama_kegiatan'     => set_value('nama_kegiatan'),
            'deskripsi'         => set_value('deskripsi'),
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/galeri_form', $data); // Pastikan nama file view benar
        $this->load->view('templates_admin/footer');
    }

    public function input_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->input();
        }else{
        $galeri = $_FILES['galeri']['name'];
        if ($galeri != '') {
            // Pengaturan upload file
            $config['upload_path'] = './assets/galeri';  // Folder tempat menyimpan foto
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';  // Format foto yang diterima
            $config['max_size'] = 2048;  // Maksimum ukuran file (dalam KB)

            // Load library upload
            $this->load->library('upload', $config);

            // Proses upload
            if (!$this->upload->do_upload('galeri')) {
                echo "galeri gagal diupload!";
                // Tampilkan error upload jika gagal
                print_r($this->upload->display_errors());
                return;  // Jangan lanjutkan proses jika upload gagal
            } else {
                // Ambil nama file yang diupload
                $galeri = $this->upload->data('file_name');
            }
        } else {
            // Jika tidak ada foto yang diupload, gunakan nilai default
            $galeri = 'default.jpg';  // Atau biarkan kosong jika diinginkan
        }

            $data = array(
                'nama_kegiatan'     => $this->input->post('nama_kegiatan', TRUE),
                'deskripsi'         => $this->input->post('deskripsi', TRUE),
                'galeri'            => $galeri
            );

            $this->galeri_model->input_data($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data galeri Berhasil di Tambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('admin/galeri');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kegiatan','nama_kegiatan','required',['required' => 'Nama galeri wajib diisi!']);
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
            'galeri'          => $this->galeri_model->tampil_data()->result()
        );
        $where = array('id_galeri' => $id);
        $data['galeri'] = $this->galeri_model->edit_data($where,'galeri')->result(); 
        $data['kegiatan'] = $this->kegiatan_model->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/galeri_update',$data);
        $this->load->view('templates_admin/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_galeri');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $deskripsi = $this->input->post('deskripsi');
        $galeri = $_FILES['galeri']['name'];
        if ($galeri != '') {
            // Proses upload jika ada file baru
            $config['upload_path'] = './assets/galeri';  
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';  
            $config['max_size'] = 2048;  

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('galeri')) {
                echo "galeri gagal diupload!";
            } else {
                $galeri = $this->upload->data('file_name');
            }
        } else {
            // Gunakan foto lama jika tidak ada yang diupload
            $galeri = $this->input->post('existing_galeri');
        }

        $data = array(
            'nama_kegiatan'         => $nama_kegiatan,
            'deskripsi'             => $deskripsi,
            'galeri'                => $galeri,
        );

        $where = array(
            'id_galeri' => $id
        );

        $this->galeri_model->update_data($where,$data,'galeri');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data galeri Berhasil di Update!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/galeri');
    }

    public function delete($id)
    {
        $where = array('id_galeri' => $id);
        $this->galeri_model->hapus_data($where, 'galeri');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data galeri Berhasil di Hapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/galeri');
    }
}