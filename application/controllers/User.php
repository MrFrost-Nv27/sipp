<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('Operator_model');
        cek_mt();
        is_logged_in();
    }

    public function index()
    {
        echo 'This is Profil/index Page';
    }

    public function profil()
    {
        echo 'This is Profile Page';
    }

    public function edit()
    {
        echo 'This is edit Page';
    }

    public function akunadmin($action = null)
    {

        $data['user'] = $this->Operator_model->getDataOperator('login');
        $data['image'] = $data['user']['foto'];
        $data['operator'] = $data['user'];
        $data['header'] = $this->Menu_model->headerQuery();
        $data['page'] = $this->Menu_model->getMenuById(14);
        $data['keterangan'] = $this->Global_model->getKeteranganApp();

        if ($action == 'pass') {
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/dash-header', $data);
                $this->load->view('templates/dash-topbar', $data);
                $this->load->view('templates/dash-sidebar', $data);
                $this->load->view($data['page']['url'], $data);
                $this->load->view('templates/dash-footer', $data);
            } else {
                $this->Operator_model->changepass();
            }
        } elseif ($action == 'info') {
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/dash-header', $data);
                $this->load->view('templates/dash-topbar', $data);
                $this->load->view('templates/dash-sidebar', $data);
                $this->load->view($data['page']['url'], $data);
                $this->load->view('templates/dash-footer', $data);
            } else {
                $this->Operator_model->changeinfo();
            }
        } else {
            $this->load->view('templates/dash-header', $data);
            $this->load->view('templates/dash-topbar', $data);
            $this->load->view('templates/dash-sidebar', $data);
            $this->load->view($data['page']['url'], $data);
            $this->load->view('templates/dash-footer', $data);
        }
    }

    public function profiladmin()
    {

        $data['user'] = $this->Operator_model->getDataOperator('login');
        $data['image'] = $data['user']['foto'];
        $data['operator'] = $data['user'];
        $data['header'] = $this->Menu_model->headerQuery();
        $data['page'] = $this->Menu_model->getMenuById(16);
        $data['keterangan'] = $this->Global_model->getKeteranganApp();

        $this->load->view('templates/dash-header', $data);
        $this->load->view('templates/dash-topbar', $data);
        $this->load->view('templates/dash-sidebar', $data);
        $this->load->view($data['page']['url'], $data);
        $this->load->view('templates/dash-footer', $data);
    }
}
