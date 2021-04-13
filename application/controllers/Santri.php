<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        is_logged_in();
        cekAksesCtl();
    }

    public function index()
    {
        $data['user'] = $this->Santri_model->getDataSantri('login');
        $data['image'] = $data['user']['pasfoto'];

        $data['header'] = $this->Menu_model->headerQuery();
        $data['page'] = $this->Menu_model->getMenuById();
        $data['keterangan'] = $this->Global_model->getKeteranganApp();
        $this->load->view('templates/dash-header', $data);
        $this->load->view('templates/dash-topbar', $data);
        $this->load->view('templates/dash-sidebar', $data);
        $this->load->view($data['page']['url'], $data);
        $this->load->view('templates/dash-footer', $data);
    }

    public function ppdb()
    {
        $data['user'] = $this->Santri_model->getDataSantri('login');
        $data['image'] = $data['user']['pasfoto'];

        $data['header'] = $this->Menu_model->headerQuery();
        $data['page'] = $this->Menu_model->getMenuById(15);
        $data['keterangan'] = $this->Global_model->getKeteranganApp();
        $this->load->view('templates/dash-header', $data);
        $this->load->view('templates/dash-topbar', $data);
        $this->load->view('templates/dash-sidebar', $data);
        $this->load->view($data['page']['url'], $data);
        $this->load->view('templates/dash-footer', $data);
    }
}
