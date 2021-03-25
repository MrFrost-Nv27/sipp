<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Global_model');
        $this->load->model('Sekolah_model');
        $this->load->model('Menu_model');
        $this->load->model('Operator_model');
        $this->load->model('Santri_model');
        is_logged_in();
    }

    public $konfig;
    public function index($aksi = null)
    {
        $this->load->library('Pagination');

        // Ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('sipp_keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('sipp_keyword');
        }

        $data['user'] = $this->Operator_model->getDataOperator('login');
        $data['image'] = $data['user']['foto'];
        $data['header'] = $this->Menu_model->headerQuery();
        $data['page'] = $this->Menu_model->getMenuById(3);
        $data['keterangan'] = $this->Global_model->getKeteranganApp();

        // Pagination
        $this->db->like('nama', $data['keyword']);
        $this->db->from('santri');
        $this->db->join('santri_daftar', 'santri_daftar.id_santri = santri.id');
        $this->db->where('id_sekolah', $data['user']['id_lembaga']);
        $this->db->where('is_terdaftar = 0');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $data['jumlahdaftar'] = $this->Santri_model->getDataSantri('jumlahlembaga', $data['user']['id_lembaga'], true);

        // Initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['santri'] = $this->Santri_model->getDataSantri('limit', $konfig = [
            'limit' => $config['per_page'],
            // 'start' => $data['start'],
            'start' => $data['start'],
            'keyword' => $data['keyword'],
            'lembaga' => $data['user']['id_lembaga']
        ], true);

        if ($this->uri->segment(3) == 'export') {
            $santri = $this->Santri_model->getDataSantri('setlembaga', $data['user']['id_lembaga'], true);
            $this->Operator_model->export($this->uri->segment(4), $santri);
        } else {
            $this->load->view('templates/dash-header', $data);
            $this->load->view('templates/dash-topbar', $data);
            $this->load->view('templates/dash-sidebar', $data);
            if ($aksi == 'detail') {
                $this->detail($this->uri->segment(4));
            } else if ($aksi == 'aktivasi') {
                $this->aktivasi($this->uri->segment(4));
            } else if ($aksi == 'hapus') {
                $this->hapus($this->uri->segment(4));
            } else {
                $this->load->view($data['page']['url'], $data);
            }
            $this->load->view('templates/dash-footer', $data);
        }
    }

    public function detail($iddetail)
    {
        $data['user'] = $this->Operator_model->getDataOperator('login');
        $data['image'] = $data['user']['foto'];
        $data['header'] = $this->Menu_model->headerQuery();
        $data['page'] = $this->Menu_model->getMenuById(3);
        $data['keterangan'] = $this->Global_model->getKeteranganApp();

        $data['santri'] = $this->Santri_model->getDataSantri('set_id_lembaga', $konfig = [
            'id_santri' => $iddetail,
            'id_sekolah' => $data['user']['id_lembaga']
        ]);
        $this->load->view('operator/detail-santri', $data);
    }

    public function aktivasi($username)
    {
        $this->db->set('is_active', 1);
        $this->db->where('username', $username);
        $this->db->update('user');
        $this->Global_model->berhasilNotify('Akun Berhasil Diaktivasi !');
        redirect('operator/index');
    }

    public function hapus($id)
    {
    }
}
