<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('user/login');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array('username' => $username, 'password' => $password);

        $user = $this->db->get_where('user', $where)->row_array();
        if ($user) {
            $data = [
                'fname' => $user['fname'],
                'role' => $user['role'],
                'login_succ' => true,
                'id' => $user['id']
            ];
            $this->session->set_userdata($data);
            redirect('article');
        } else {
            $this->session->set_flashdata('message', '<div style="color: red; padding-left:15px;">Username atau password salah!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $haspus_data = array('fname', 'role', 'login_succ');
        $this->session->unset_userdata($haspus_data);
        $this->session->set_flashdata('message', '<div style="color: green; padding-left:15px;">Logout berhasil!</div>');
        redirect('auth');
    }
}
