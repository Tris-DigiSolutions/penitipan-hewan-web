<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Selamat Datang di Web Hewan';
        $this->load->view('templates/header_auth', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer_auth', $data);
    }
}
