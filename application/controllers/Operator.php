<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sekolah_model');
        $this->load->model('Menu_model');
        $this->load->model('Operator_model');
        cek_mt();
        is_logged_in();
        cekAksesCtl();
    }

    public $konfig;
    public function index($aksi = null)
    {
        $data = [
            'jk' => $this->Global_model->getListJenisKelamin(),
            'user' => $this->Operator_model->getDataOperator('login'),
            'agama' => $this->Global_model->getListAgama(),
            'jenisDaftar' => $this->Sekolah_model->getListjenisDaftar(),
            'header' => $this->Menu_model->headerQuery(),
            'page' => $this->Menu_model->getMenuById(3),
            'keterangan' => $this->Global_model->getKeteranganApp()
        ];
        $data['image'] = $data['user']['foto'];
        $data['datasantri'] = $this->Santri_model->getDataSantri('setlembaga', $data['user']['id_lembaga'], true);

        $data['jumlahdaftar'] = $this->Santri_model->getDataSantri('jumlahlembaga', $data['user']['id_lembaga'], true);

        if ($this->uri->segment(3) == 'export') {
            $santri = $this->Santri_model->getDataSantri('setlembaga', $data['user']['id_lembaga'], true);
            $this->Operator_model->export($this->uri->segment(4), $santri);
        } else {
            $this->load->view('templates/dash-header', $data);
            $this->load->view('templates/dash-topbar');
            $this->load->view('templates/dash-sidebar');
            if ($aksi == 'detail') {
                $this->detail($this->uri->segment(4));
            } else {
                $this->load->view($data['page']['url']);
            }
            $this->load->view('templates/dash-footer');
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
            if ($santri['status_sekolah'] == 2) :
                $aksi .= "<a class='dropdown-item konfirmasi-santri' href='#' id='id' data-idsantri=" . $santri['id_santri'] . " data-iduser=" . $santri['login_id'] . " data-idlembaga=" . $user['id_lembaga'] . " data-toggle='modal' data-target='#konfirsantri'>Konfirmasi Akun</a>";
            endif;
            $aksi .= "<div class='dropdown-divider'></div><a class='dropdown-item hapus-santri' href='#' id='id' data-toggle='modal' data-idsantri=" . $santri['id_santri'] . " data-iduser=" . $santri['login_id'] . ">Hapus</a></div></div>";
            if ($santri['is_active'] == 0) :
                $aktif = "<div class='badge badge-pill badge-danger' data-toggle='tooltip' data-placement='top' title='Akun belum diaktivasi !'><i class='fa fa-w-20'></i></div>";
            elseif ($santri['is_active'] == 1) :
                if ($santri['status_sekolah'] == 0) :
                    $aktif = "<div class='badge badge-pill badge-secondary' data-toggle='tooltip' data-placement='top' title='Akun belum melanjutkan tahap pendaftaran, hubungi pemilik akun !'><i class='fa fa-exclamation fa-w-20'></i></div>";
                elseif ($santri['status_sekolah'] == 1) :
                    $aktif = "<div class='badge badge-pill badge-success' data-toggle='tooltip' data-placement='top' title='Akun Siap dimasukkan ke kelas'><i class='fa fa-check fa-w-20'></i></div>";
                elseif ($santri['status_sekolah'] == 2) :
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

    public function add()
    {
        $admin = [
            'email' => $this->Global_model->getAdminEmailAcc()
        ];
        $user['user'] = $this->Operator_model->getDataOperator('login');
        $jenisdaftar = $this->input->post('jenisdaftar');
        $asalsekolah = htmlspecialchars($this->input->post('asalsekolah'));
        $nisn = htmlspecialchars($this->input->post('nisn'));
        $nama = ucwords(strtolower(((htmlspecialchars($this->input->post('nama'))))));
        $tmplahir = htmlspecialchars($this->input->post('tmplahir'));
        $tgllahir = $this->input->post('tgllahir');
        $jeniskelamin = $this->input->post('jeniskelamin');
        $agama = htmlspecialchars($this->input->post('agama'));
        $desa = htmlspecialchars($this->input->post('desa'));
        $kec = htmlspecialchars($this->input->post('kec'));
        $kab = htmlspecialchars($this->input->post('kab'));
        $nohp = htmlspecialchars($this->input->post('nohp'));
        $email = htmlspecialchars($this->input->post('email'));
        $id_sekolah = $user['user']['id_lembaga'];

        $tambahsantri = array(
            'jenisdaftar' => $jenisdaftar,
            'asalsekolah' => $asalsekolah,
            'nisn' => $nisn,
            'nama' => $nama,
            'tmplahir' => $tmplahir,
            'tgllahir' => $tgllahir,
            'jeniskelamin' => $jeniskelamin,
            'agama' => $agama,
            'desa' => $desa,
            'kec' => $kec,
            'kab' => $kab,
            'nohp' => $nohp,
            'email' => $email,
            'id_sekolah' => $id_sekolah,
            'admin_email' => $admin['email']['username'],
            'admin_password' => $admin['email']['password'],
            'admin_smtp' => $admin['email']['smtp'],
            'admin_port' => $admin['email']['port']
        );

        $validasiemail = $this->Santri_model->getDataSantri('email', $email);

        if ($validasiemail) {
            echo json_encode('email!!!');
        } else {
            $data = $this->Santri_model->tambahDataSantri($tambahsantri);
            echo json_encode($data);
        }
    }

    public function actv()
    {
        // id yang telah diparsing pada ajax ajax.php data{id:id}
        $iduser = $this->input->post('iduser');

        $data = $this->Santri_model->aktivasiAkun($iduser);
        echo json_encode($data);
    }

    public function formkonfir()
    {
        $data = [
            'idsantri' => $this->input->post('idsantri'),
            'idlembaga' => $this->input->post('idlembaga')
        ];
        $this->load->view('operator/formkonfir', $data);
    }

    public function confirm()
    {
        // id yang telah diparsing pada ajax ajax.php data{id:id}
        $idsantri = $this->input->post('idsantri');
        $data = [
            'status_sekolah' => 1
        ];

        $res = $this->Santri_model->ubahdatasekolah($data, $idsantri);
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
