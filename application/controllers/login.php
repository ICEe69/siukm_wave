<?php
class Login extends CI_Controller {

    public function index()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates_admin/header');
            $this->load->view('form_login');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $cek = $this->login_model->cek_login($username, $password);

            if($cek == FALSE)
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>');
                redirect('login');
            }else{
                // Set session data
                $session_data = array(
                    'username'   => $cek->username,
                    'hak_akses'  => $cek->hak_akses,
                    'id_anggota' => $cek->id_anggota,
                    'logged_in'  => TRUE
                );
                $this->session->set_userdata($session_data);

                // Redirect berdasarkan hak akses
                switch ($cek->hak_akses){
                    case 1 : redirect('admin/dashboard');
                             break;

                    case 2 : redirect('anggota/dashboard');
                             break;

                    default:
                             break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
    }
}
