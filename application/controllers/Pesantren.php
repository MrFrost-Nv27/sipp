<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesantren extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('Operator_model');
        cek_mt();
        is_logged_in();
        cekAksesCtl();
    }

    public function index($aksi = null)
    {
        $data = [
            'user' => $this->Pesantren_model->getDataOperator('login'),
            'header' => $this->Menu_model->headerQuery(),
            'page' => $this->Menu_model->getMenuById(24),
            'keterangan' => $this->Global_model->getKeteranganApp()
        ];
        $data['jumlahdaftar'] = $this->Santri_model->getDataSantri('jumlahpesantren', $data['user']['id_lembaga'], true);
        $data['image'] = $data['user']['foto'];
        // $data['santri'] = $this->Santri_model->getDataSantri('setpesantren', $data['user']['id_lembaga'], true);
        $this->load->view('templates/dash-header', $data);
        $this->load->view('templates/dash-topbar');
        $this->load->view('templates/dash-sidebar');
        $this->load->view($data['page']['url']);
        $this->load->view('templates/dash-footer');
        $this->load->view('script/pesantren');
    }

    public function datasantri()
    {
        $user = $this->Operator_model->getDataOperator('login');
        $datasantri = $this->Santri_model->getDataSantri('setpesantren', $user['id_lembaga'], true);
        $no = 1;
        foreach ($datasantri as  $santri) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $santri['nama'];
            $tbody[] = date("d-F-Y", $santri['date_created']);
            $aksi = "<div class='dropdown'><a class='badge badge-pill badge-light' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'><i class='fa fa-ellipsis-v fa-w-20'></i></a><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'><a class='dropdown-item ubah-santri' href='#' data-toggle='modal' data-idsantri=" . $santri['id_santri'] . " data-iduser=" . $santri['login_id'] . ">Edit</a><a class='dropdown-item detail-santri' href='#' data-toggle='modal' data-idsantri=" . $santri['id_santri'] . " data-iduser=" . $santri['login_id'] . ">Detail</a>";
            if ($santri['is_active'] == 0) :
                $aksi .= "<a class='dropdown-item aktivasi-santri' href='#' id='id' data-toggle='modal' data-idsantri=" . $santri['id_santri'] . " data-iduser=" . $santri['login_id'] . ">Aktivasi Akun</a>";
            endif;
            if ($santri['status_pesantren'] == 2) :
                $aksi .= "<a class='dropdown-item konfirmasi-santri' href='#' id='id' data-toggle='modal' data-idsantri=" . $santri['id_santri'] . " data-iduser=" . $santri['login_id'] . ">Konfirmasi Akun</a>";
            endif;
            $aksi .= "<div class='dropdown-divider'></div><a class='dropdown-item hapus-santri' href='#' id='id' data-toggle='modal' data-idsantri=" . $santri['id_santri'] . " data-iduser=" . $santri['login_id'] . ">Hapus</a></div></div>";
            if ($santri['is_active'] == 0) :
                $aktif = "<div class='badge badge-pill badge-danger' data-toggle='tooltip' data-placement='top' title='Akun belum diaktivasi !'><i class='fa fa-w-20'></i></div>";
            elseif ($santri['is_active'] == 1) :
                if ($santri['is_terdaftar'] == 0) :
                    $aktif = "<div class='badge badge-pill badge-secondary' data-toggle='tooltip' data-placement='top' title='Akun belum melanjutkan tahap pendaftaran, hubungi pemilik akun !'><i class='fa fa-exclamation fa-w-20'></i></div>";
                elseif ($santri['status_pesantren'] == 1) :
                    $aktif = "<div class='badge badge-pill badge-success' data-toggle='tooltip' data-placement='top' title='Akun Siap dimasukkan ke kelas'><i class='fa fa-check fa-w-20'></i></div>";
                elseif ($santri['status_pesantren'] == 2) :
                    $aktif = "<div class='badge badge-pill badge-warning' data-toggle='tooltip' data-placement='top' title='Akun menunggu konfirmasi admin !'><i class='fa fa-exclamation fa-w-20'></i></div>";
                endif;
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

    public function actv()
    {
        // id yang telah diparsing pada ajax ajax.php data{id:id}
        $iduser = $this->input->post('iduser');

        $data = $this->Santri_model->aktivasiAkun($iduser);
        echo json_encode($data);
    }

    public function confirm()
    {
        // id yang telah diparsing pada ajax ajax.php data{id:id}
        $idsantri = $this->input->post('idsantri');
        $data = [
            'status_pesantren' => 1
        ];

        $res = $this->Santri_model->ubahdatapesantren($data, $idsantri);
        echo json_encode($res);
    }

    public function del()
    {
        // id yang telah diparsing pada ajax ajax.php data{id:id}
        $iduser = $this->input->post('iduser');
        $idsantri = $this->input->post('idsantri');

        $hapusdata = $this->Santri_model->hapusDataSantri($iduser, $idsantri);
        echo json_encode($hapusdata);
    }
}
