<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_mt();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'judul' => 'SIPP | Ppdb',
            'santri' => $this->Santri_model->loginppdb(),
            'agama' => $this->Global_model->getListAgama(),
            'penghasilan' => $this->Global_model->getListPenghasilan()
        ];
        $this->load->view('santri/startup', $data);
        $this->load->view('script/ppdb');
    }

    public function inputdata()
    {
        $santri = $this->Santri_model->loginppdb();
        $data = [
            'no_hp' => $this->input->post('nohp'),
            'nik' => $this->input->post('nik'),
            'tempat_lahir' => ucwords(strtolower(((htmlspecialchars($this->input->post('tmplahir')))))),
            'tgl_lahir' => $this->input->post('tgllahir'),
            'agama' => $this->input->post('agama'),
            'hobby' => ucwords(strtolower(((htmlspecialchars($this->input->post('hobby')))))),
            'alamat_jl' => ucwords(strtolower(((htmlspecialchars($this->input->post('jl')))))),
            'alamat_rt' => $this->input->post('rt'),
            'alamat_rw' => $this->input->post('rw'),
            'alamat_no' => $this->input->post('no'),
            'alamat_dk' => ucwords(strtolower(((htmlspecialchars($this->input->post('dk')))))),
            'alamat_ds' => ucwords(strtolower(((htmlspecialchars($this->input->post('ds')))))),
            'alamat_kec' => ucwords(strtolower(((htmlspecialchars($this->input->post('kec')))))),
            'alamat_kab' => ucwords(strtolower(((htmlspecialchars($this->input->post('kab')))))),
            'ayah_nama' => ucwords(strtolower(((htmlspecialchars($this->input->post('ayah_nama')))))),
            'ayah_nohp' => $this->input->post('ayah_nohp'),
            'ayah_kerja' => ucwords(strtolower(((htmlspecialchars($this->input->post('ayah_kerja')))))),
            'ibu_nama' => ucwords(strtolower(((htmlspecialchars($this->input->post('ibu_nama')))))),
            'ibu_nohp' => $this->input->post('ibu_nohp'),
            'ibu_kerja' => ucwords(strtolower(((htmlspecialchars($this->input->post('ibu_kerja')))))),
            'sdrkandung' => $this->input->post('sdrkandung'),
            'avgpenghasilan' => $this->input->post('avghasil'),
            'is_terdaftar' => 2
        ];
        $ubahdata = $this->Santri_model->ubahdatasantri($data, $santri['id']);
        echo json_encode($ubahdata);
    }

    public function formeditbiodata()
    {
        $id = $this->input->post('id');

        $data = [
            'santri' => $this->Santri_model->loginppdb(),
            'jk' => $this->Global_model->getListJenisKelamin(),
            'agama' => $this->Global_model->getListAgama(),
            'penghasilan' => $this->Global_model->getListPenghasilan()
        ];
        $this->load->view('santri/formeditbiodata', $data);
    }

    public function editbiodata()
    {
        $nohp_ayah = htmlspecialchars($this->input->post('ayahnohp', true));
        if (substr($nohp_ayah, 0, 1) == 0) {
            $nohp_ayah = substr($nohp_ayah, 1);
            $fix_noayah = 62 . $nohp_ayah;
        } elseif (substr($nohp_ayah, 0, 2) == 62) {
            $fix_noayah = $nohp_ayah;
        } else {
            $fix_noayah = $nohp_ayah;
        }

        $nohp_ibu = htmlspecialchars($this->input->post('ibunohp', true));
        if (substr($nohp_ibu, 0, 1) == 0) {
            $nohp_ibu = substr($nohp_ibu, 1);
            $fix_noibu = 62 . $nohp_ibu;
        } elseif (substr($nohp_ibu, 0, 2) == 62) {
            $fix_noibu = $nohp_ibu;
        } else {
            $fix_noibu = $nohp_ibu;
        }


        $santri = $this->Santri_model->loginppdb();
        $data = [
            'nama' => ucwords(strtolower(((htmlspecialchars($this->input->post('nama')))))),
            'no_hp' => htmlspecialchars($this->input->post('nohp')),
            'nik' => htmlspecialchars($this->input->post('nik')),
            'tempat_lahir' => ucwords(strtolower(((htmlspecialchars($this->input->post('tmplahir')))))),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgllahir')),
            'jnskelamin' => htmlspecialchars($this->input->post('jeniskelamin')),
            'agama' => htmlspecialchars($this->input->post('agama')),
            'hobby' => ucwords(strtolower(((htmlspecialchars($this->input->post('hobi')))))),
            'alamat_jl' => ucwords(strtolower(((htmlspecialchars($this->input->post('jalan')))))),
            'alamat_rt' => htmlspecialchars($this->input->post('rt')),
            'alamat_rw' => htmlspecialchars($this->input->post('rw')),
            'alamat_no' => htmlspecialchars($this->input->post('no')),
            'alamat_dk' => ucwords(strtolower(((htmlspecialchars($this->input->post('dukuh')))))),
            'alamat_ds' => ucwords(strtolower(((htmlspecialchars($this->input->post('desa')))))),
            'alamat_kec' => ucwords(strtolower(((htmlspecialchars($this->input->post('kec')))))),
            'alamat_kab' => ucwords(strtolower(((htmlspecialchars($this->input->post('kab')))))),
            'ayah_nama' => ucwords(strtolower(((htmlspecialchars($this->input->post('ayahnama')))))),
            'ayah_nohp' => $fix_noayah,
            'ayah_kerja' => ucwords(strtolower(((htmlspecialchars($this->input->post('ayahkerja')))))),
            'ibu_nama' => ucwords(strtolower(((htmlspecialchars($this->input->post('ibunama')))))),
            'ibu_nohp' => $fix_noibu,
            'ibu_kerja' => ucwords(strtolower(((htmlspecialchars($this->input->post('ibukerja')))))),
            'sdrkandung' => htmlspecialchars($this->input->post('sdrkandung')),
            'avgpenghasilan' => htmlspecialchars($this->input->post('avghasil'))
        ];
        $ubahdata = $this->Santri_model->ubahdatasantri($data, $santri['id']);
        echo json_encode($ubahdata);
    }

    public function laju()
    {
        $idsantri = $this->input->post('idsantri');
        $data = [
            'tanggal_daftar_pesantren' => "",
            'id_pesantren' => 0,
            'status_pesantren' => 1
        ];
        $data2 = [
            'is_pesantren' => 0
        ];

        $this->Santri_model->ubahdatasantri($data2, $idsantri);
        $ubah = $this->Santri_model->ubahdatapesantren($data, $idsantri);
        echo json_encode($ubah);
    }

    public function editpesantren()
    {
        $santri = $this->Santri_model->loginppdb();
        $data = [
            'is_pesantren' => 1
        ];
        $data2 = [
            'tanggal_daftar_pesantren' => time(),
            'id_pesantren' => $this->input->post('pesantren'),
            'status_pesantren' => 2
        ];

        $this->Santri_model->ubahdatasantri($data, $santri['id']);
        $ubah = $this->Santri_model->ubahdatapesantren($data2, $santri['id']);
        echo json_encode($ubah);
    }

    public function editsekolah()
    {
        $id = $this->input->post('id');
        $data = [
            'is_takhasus' => 0
        ];
        $data2 = [
            'tanggal_daftar_sekolah' => time(),
            'id_sekolah' => $this->input->post('sekolah'),
            'jenis_daftar' => $this->input->post('jd'),
            'sekolahasal' => $this->input->post('asalsekolah'),
            'nisn' => $this->input->post('nisn'),
            'id_jurusan' => $this->input->post('jurusan'),
            'status_sekolah' => 2
        ];

        $this->Santri_model->ubahdatasantri($data, $id);
        $ubah = $this->Santri_model->ubahdatasekolah($data2, $id);
        echo json_encode($ubah);
    }

    public function jurusan($idsend = '')
    {
        $id = $this->input->post('sekolah');
        $data = [
            'jurusan' => $this->Sekolah_model->getListJurusanByLembaga($id)
        ];
        $this->load->view('santri/jurusan', $data);
    }

    public function jurusanl()
    {
        $id = $this->input->post('sekolah');
        $inc_jurusan = $this->input->post('inc_jurusan');
        if ($inc_jurusan == 1) {
            $this->jurusan($id);
        } else {
            $this->load->view('santri/jurusanl');
        }
    }

    public function takhasus()
    {
        $id = $this->input->post('id');
        $data = [
            'is_pesantren' => 1,
            'is_takhasus' => 1
        ];
        $data2 = [
            'tanggal_daftar_pesantren' => time(),
            'id_pesantren' => 2,
            'status_pesantren' => 2
        ];
        $data3 = [
            'tanggal_daftar_sekolah' => '',
            'id_sekolah' => 0,
            'jenis_daftar' => '',
            'id_jurusan' => 0,
            'status_sekolah' => 1
        ];

        $this->Santri_model->ubahdatasantri($data, $id);
        $this->Santri_model->ubahdatapesantren($data2, $id);
        $ubah = $this->Santri_model->ubahdatasekolah($data3, $id);
        echo json_encode($ubah);
    }

    public function hapusakun()
    {
        $idsantri = $this->input->post('idsantri');
        $iduser = $this->input->post('iduser');

        $this->session->unset_userdata('sipp_userid');
        $this->session->unset_userdata('sipp_role_id');
        $this->session->unset_userdata('sipp_username');
        $hapus = $this->Santri_model->hapusDataSantri($iduser, $idsantri);
        echo json_encode($hapus);
    }
}
