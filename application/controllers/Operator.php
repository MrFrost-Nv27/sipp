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
        $data['user'] = $this->Operator_model->getDataOperator('login');
        $data['image'] = $data['user']['foto'];
        $data['header'] = $this->Menu_model->headerQuery();
        $data['page'] = $this->Menu_model->getMenuById(3);
        $data['keterangan'] = $this->Global_model->getKeteranganApp();

        $data['jumlahdaftar'] = $this->Santri_model->getDataSantri('jumlahlembaga', $data['user']['id_lembaga'], true);

        if ($this->uri->segment(3) == 'export') {
            $santri = $this->Santri_model->getDataSantri('setlembaga', $data['user']['id_lembaga'], true);
            $this->Operator_model->export($this->uri->segment(4), $santri);
        } else {
            $this->load->view('templates/dash-header', $data);
            $this->load->view('templates/dash-topbar', $data);
            $this->load->view('templates/dash-sidebar', $data);
            if ($aksi == 'detail') {
                $this->detail($this->uri->segment(4));
            } else {
                $this->load->view($data['page']['url'], $data);
            }
            $this->load->view('templates/dash-footer', $data);
            // $this->load->view('operator/ajax');
        }
    }

    public function datasantri()
    {

        $datasantri = $this->datamahasiswa_model->getdatamahasiswa();
        $no = 1;
        foreach ($datasantri as  $santri) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $santri['nama_mahasiswa'];
            $tbody[] = $santri['alamat'];
            $aksi = "<button class='btn btn-success ubah-mahasiswa' data-toggle='modal' data-id=" . $santri['id'] . ">Ubah</button>" . ' ' . "<button class='btn btn-danger hapus-mahasiswa' id='id' data-toggle='modal' data-id=" . $santri['id'] . ">Hapus</button>";
            $tbody[] = $aksi;
            $aktif = "is_active";
            $tbody[] = $aktif;
            $data[] = $tbody;
        }

        if ($datasantri) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
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
}
