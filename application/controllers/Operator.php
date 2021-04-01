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
        $data['datasantri'] = $this->Santri_model->getDataSantri('setlembaga', $data['user']['id_lembaga'], true);

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
            $this->load->view('operator/ajax');
        }
    }

    public function datasantri()
    {
        $user = $this->Operator_model->getDataOperator('login');
        $linkdetail = base_url('operator/index/detail/');
        $datasantri = $this->Santri_model->getDataSantri('setlembaga', $user['id_lembaga'], true);
        $no = 1;
        foreach ($datasantri as  $santri) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $santri['nama'];
            $tbody[] = date("d-F-Y", $santri['date_created']);
            $aksi = "<div class='dropdown'><a class='badge badge-pill badge-light' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'><i class='fa fa-ellipsis-v fa-w-20'></i></a><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'><a class='dropdown-item ubah-santri' href='#' data-toggle='modal' data-idsantri=" . $santri['id_santri'] . " data-iduser=" . $santri['login_id'] . ">Edit</a><a class='dropdown-item' href=" . $linkdetail . $santri['id_santri'] . ">Detail</a>";
            if ($santri['is_active'] == 0) :
                $aksi .= "<a class='dropdown-item aktivasi-santri' href='#' id='id' data-toggle='modal' data-idsantri=" . $santri['id_santri'] . " data-iduser=" . $santri['login_id'] . ">Aktivasi Akun</a>";
            endif;
            $aksi .= "<div class='dropdown-divider'></div><a class='dropdown-item hapus-santri' href='#' id='id' data-toggle='modal' data-idsantri=" . $santri['id_santri'] . " data-iduser=" . $santri['login_id'] . ">Hapus</a></div></div>";
            if ($santri['is_active'] == 0) :
                $aktif = "<div class='badge badge-pill badge-danger' data-toggle='tooltip' data-placement='top' title='Akun belum diaktivasi !'><i class='fa fa-w-20'></i></div>";
            elseif ($santri['is_active'] == 1) :
                $aktif = "<div class='badge badge-pill badge-success' data-toggle='tooltip' data-placement='top' title='Akun sudah diaktivasi'><i class='fa fa-check fa-w-20'></i></div>";
            endif;
            $tbody[] = $aksi;
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

    public function hapussantri()
    {
        // id yang telah diparsing pada ajax ajax.php data{id:id}
        $iduser = $this->input->post('iduser');
        $idsantri = $this->input->post('idsantri');

        $data = $this->Santri_model->hapusDataSantri($iduser, $idsantri);
        echo json_encode($data);
    }
}
