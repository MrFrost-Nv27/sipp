<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Global_model');
        $this->load->model('Menu_model');
        $this->load->model('Admin_model');
        $this->load->model('Santri_model');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->Admin_model->getDataAdmin('login');
        $data['image'] = $data['user']['foto'];

        $data['header'] = $this->Menu_model->headerQuery();
        $data['page'] = $this->Menu_model->getMenuById(1);
        $data['keterangan'] = $this->Global_model->getKeteranganApp();

        $this->load->view('templates/dash-header', $data);
        $this->load->view('templates/dash-topbar', $data);
        $this->load->view('templates/dash-sidebar', $data);
        $this->load->view($data['page']['url'], $data);
        $this->load->view('templates/dash-footer', $data);
    }

    public function profilsuper()
    {

        $data['user'] = $this->Admin_model->getDataAdmin('login');
        $data['image'] = $data['user']['foto'];
        $data['header'] = $this->Menu_model->headerQuery();
        $data['page'] = $this->Menu_model->getMenuById(18);
        $data['keterangan'] = $this->Global_model->getKeteranganApp();

        $this->load->view('templates/dash-header', $data);
        $this->load->view('templates/dash-topbar', $data);
        $this->load->view('templates/dash-sidebar', $data);
        $this->load->view($data['page']['url'], $data);
        $this->load->view('templates/dash-footer', $data);
    }
}
