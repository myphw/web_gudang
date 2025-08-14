<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
	public function index()
	{
        if ($this->session->userdata('email')){
            redirect('user');
        }
        $this->form_validation->set_rules('email','Email','valid_email|trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run() == false){

            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');                 

        } else {

            $this->_login();
        
        }
        
	}

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        
        if($user){

            if($user['is_active'] == 1) {

                if(password_verify($password, $user['password'])){

                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1){
                        redirect('admin');
                    } else if($user['role_id'] == 2){
                        redirect('user');
                    } else if($user['role_id'] == 3){
                        redirect('form');
                    } else if($user['role_id'] == 4){
                        redirect('warehouse/index_checkin');
                    } else if($user['role_id'] == 5){
                        redirect('production/dept');
                    } else {
                        redirect('auth/blocked');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Silahkan Aktifkan Akun Anda
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email Belum Terdaftar, Silahkan Daftar
            </div>');
            redirect('auth');
        }
    }

    public function register()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[users.email]', [
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

        if( $this->form_validation->run() == false){
            $this->load->library('form_validation');
            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');                         
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun Sudah Berhasil Dibuat, Silahkan Login
            </div>');
            redirect('auth');
        }
        
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda Berhasil Logout
            </div>');
            redirect('landing_page');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
