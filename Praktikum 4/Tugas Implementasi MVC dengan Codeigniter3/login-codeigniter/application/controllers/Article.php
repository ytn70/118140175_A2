<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
    }


    public function index()
    {
        $data['article'] = $this->article_model->get_article();
        $data['title'] = 'Artikel';
        $this->load->view('templates/header', $data);
        $this->load->view('article/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        if (!$this->session->userdata('login_succ')) {
            redirect(site_url('user/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Membuat Artikel Baru';

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('article/create');
            $this->load->view('templates/footer');
        } else {
            $this->article_model->set_article();
        }
    }

    public function edit()
    {
        if (!$this->session->userdata('login_succ')) {
            redirect(site_url('user/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Mengedit Artikel';
        $data['news_item'] = $this->article_model->get_article_by_id($id);
        $user = $this->session->userdata();

        if ($user['id'] == 1 || $user['id'] != 1 && $data['news_item']['owned']) {

            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('isi', 'Isi', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('article/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $this->article_model->set_article($id);
                $this->session->set_flashdata('message', '<div style="color: green; padding-left:15px;">Data berhasil diupdate!</div>');
                redirect(site_url('article'));
            }
        }
    }

    public function delete()
    {
        if (!$this->session->userdata('login_succ')) {
            redirect(site_url('user/login'));
        }

        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $news_item = $this->article_model->get_article_by_id($id);
        $user = $this->session->userdata();

        if ($user['id'] == 1 || $user['id'] != 1 && $news_item['owned']) {
            $this->article_model->delete_article($id);
            $this->session->set_flashdata('message', '<div style="color: red; padding-left:15px;">Data berhasil dihapus!</div>');
            redirect(base_url('article'));
        }
    }
}
