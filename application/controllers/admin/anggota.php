<?php

class Anggota extends CI_Controller{

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
            'anggota' => $this->anggota_model->tampil_data()->result()
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/anggota',$data);
        $this->load->view('templates_admin/footer');
    }

    public function input()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);

        $data = array(
            'nama_anggota' => $data->nama_anggota,
            'photo' => $data->photo,
            'username' => $data->username,
            'id_anggota'=> set_value('id_anggota'),
            'nim'=> set_value('nim'),
            'nama_anggota'=> set_value('nama_anggota'),
            'jenis_kelamin'=> set_value('jenis_kelamin'),
            'nama_jabatan'=> set_value('nama_jabatan'),
            'tanggal_masuk'=> set_value('tanggal_masuk'),
            'status'=> set_value('status'),
            'photo'=> set_value('photo'),
            'hak_akses'=> set_value('hak_akses'),
            'username'=> set_value('username'),
            'password'=> set_value('password'),
        );
        $data['jabatan'] = $this->anggota_model->tampil_data('jabatan')->result();
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/anggota_form', $data); // Pastikan nama file view benar
        $this->load->view('templates_admin/footer');
    }

    public function input_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->input();
        }else{
        $photo = $_FILES['photo']['name'];
        if ($photo != '') {
            // Pengaturan upload file
            $config['upload_path'] = './assets/photo';  // Folder tempat menyimpan foto
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';  // Format foto yang diterima
            $config['max_size'] = 2048;  // Maksimum ukuran file (dalam KB)

            // Load library upload
            $this->load->library('upload', $config);

            // Proses upload
            if (!$this->upload->do_upload('photo')) {
                echo "Photo gagal diupload!";
                // Tampilkan error upload jika gagal
                print_r($this->upload->display_errors());
                return;  // Jangan lanjutkan proses jika upload gagal
            } else {
                // Ambil nama file yang diupload
                $photo = $this->upload->data('file_name');
            }
        } else {
            // Jika tidak ada foto yang diupload, gunakan nilai default
            $photo = 'default.jpg';  // Atau biarkan kosong jika diinginkan
        }
            $data = array(
                'nim' => $this->input->post('nim', TRUE),
                'nama_anggota' => $this->input->post('nama_anggota', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'nama_jabatan' => $this->input->post('nama_jabatan', TRUE),
                'tanggal_masuk' => $this->input->post('tanggal_masuk', TRUE),
                'status' => $this->input->post('status', TRUE),
                'hak_akses' => $this->input->post('hak_akses', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'photo' => $photo
            );

            $this->anggota_model->input_data($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data anggota Berhasil di Tambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
            redirect('admin/anggota');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nim','nim','required',['required' => 'Nim wajib diisi!']);
        $this->form_validation->set_rules('nama_anggota','nama_anggota','required',['required' => 'Nama anggota wajib diisi!']);
        $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required',['required' => 'Jenis Kelamin wajib diisi!']);
        $this->form_validation->set_rules('nama_jabatan','nama_jabatan','required',['required' => 'Jabatan wajib diisi!']);
        $this->form_validation->set_rules('tanggal_masuk','tanggal_masuk','required',['required' => 'Tanggal Masuk wajib diisi!']);
        $this->form_validation->set_rules('status','status','required',['required' => 'Status wajib diisi!']);
        $this->form_validation->set_rules('hak_akses','hak_akses','required',['required' => 'Hak Akses wajib diisi!']);
        $this->form_validation->set_rules('username','username','required',['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password','password','required',['required' => 'Password wajib diisi!']);

// Jika foto tidak wajib, hapus atau sesuaikan validasinya
// $this->form_validation->set_rules('photo','photo','required',['required' => 'Photo wajib diisi!']);

    }

    public function update($id)
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);

        $data = array(
            'nama_anggota' => $data->nama_anggota,
            'photo' => $data->photo,
            'username' => $data->username,
        );
        $where = array('id_anggota' => $id);
        $data['jabatan'] = $this->jabatan_model->tampil_data()->result();
        $data['anggota'] = $this->anggota_model->edit_data($where,'anggota')->result(); 

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/anggota_update',$data);
        $this->load->view('templates_admin/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_anggota');
        $nim = $this->input->post('nim');
        $nama_anggota = $this->input->post('nama_anggota');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $nama_jabatan = $this->input->post('nama_jabatan');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $status = $this->input->post('status');
        $hak_akses = $this->input->post('hak_akses');
        $username = $this->input->post('username');
        
        $existing_data = $this->anggota_model->edit_data(['id_anggota' => $id], 'anggota')->row();

        
        $password_input = $this->input->post('password');
        if (!empty($password_input)) {
            
            $password = md5($password_input);
        } else {
           
            $password = $existing_data->password;
        }


        // Ambil foto baru jika ada
        $photo = $_FILES['photo']['name'];
        if ($photo != '') {
            // Proses upload jika ada file baru
            $config['upload_path'] = './assets/photo';  
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';  
            $config['max_size'] = 2048;  

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                echo "Photo gagal diupload!";
            } else {
                $photo = $this->upload->data('file_name');
            }
        } else {
            // Gunakan foto lama jika tidak ada yang diupload
            $photo = $this->input->post('existing_photo');
        }

        $data = array(
            'nim' => $nim,
            'nama_anggota' => $nama_anggota,
            'jenis_kelamin' => $jenis_kelamin,
            'nama_jabatan' => $nama_jabatan,
            'tanggal_masuk' => $tanggal_masuk,
            'status' => $status,
            'hak_akses' => $hak_akses,
            'username' => $username,
            'photo' => $photo  // Menyimpan nama file foto
        );

        $where = array(
            'id_anggota' => $id
        );

        // Update data anggota ke database
        $this->anggota_model->update_data($where, $data, 'anggota');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data anggota Berhasil di Update!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/anggota');
    }


    public function delete($id)
    {
        $where = array('id_anggota' => $id);
        $this->anggota_model->hapus_data($where, 'anggota');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data anggota Berhasil di Hapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
        redirect('admin/anggota');
    }
}