<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        cek_mt();
        is_logged_in();
    }

    public function index()
    {
        echo 'Tentang Aplikasi';
    }
}
