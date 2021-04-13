<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require(APPPATH . 'third_party/phpmailer/autoload.php');

class Santri_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
    }

    private function querySantri()
    {
        return "user.id AS login_id, 
        user.userid AS login_userid, 
        user.username AS login_username,
        user.email,
        user.date_created,
        user.is_active,
        santri.*, santri_daftar.*, santri_detail.*, santri_berkas.*, 
        santri_ortu.*, santri_sekolah.*, santri_pesantren.*,
        user_role.role, lembaga.nama AS nama_lembaga, lembaga_jurusan.*";
    }

    public function getDataSantri($settype, $setconfig = [null], $isppdb = false)
    {
        $query = $this->querySantri();
        $this->db->select($query);
        $this->db->from('user');
        $this->db->join('santri_daftar', 'user.username = santri_daftar.nomor_daftar');
        $this->db->join('santri', 'santri_daftar.id_santri = santri.id');
        $this->db->join('lembaga', 'lembaga.id = santri.id_sekolah');
        $this->db->join('santri_detail', 'santri.id = santri_detail.id_santri');
        $this->db->join('santri_berkas', 'santri_berkas.id_santri = santri.id');
        $this->db->join('santri_ortu', 'santri_ortu.id_santri = santri.id');
        $this->db->join('santri_sekolah', 'santri_sekolah.id_santri = santri.id');
        $this->db->join('santri_pesantren', 'santri_pesantren.id_santri = santri.id');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        $this->db->join('lembaga_jurusan', 'lembaga_jurusan.id = santri_sekolah.id_jurusan');
        $this->db->distinct();

        // Ambil Konfigurasi dari parameter
        $type = $settype;
        $config = $setconfig;

        // Jika hanya diambil data ppdb nya
        if ($isppdb == true) {
            $this->db->where('santri_daftar.is_terdaftar != 1');
        }

        if ($type == 'limit') {
            // $Config = [$limit, $start, $keyword];
            if ($config['lembaga']) {
                $this->db->where('santri.id_sekolah', $config['lembaga']);
            }
            if ($config['keyword']) {
                $this->db->like('santri.nama', $config['keyword']);
            }
            $this->db->limit($config['limit'], $config['start']);
            return $this->db->get()->result_array();
        } elseif ($type == 'login') {
            // mengambil data sesuai user id
            $id_user = $this->session->userdata('sipp_userid');
            $this->db->where('user.id =', $id_user);
            return $this->db->get()->row_array();
        } elseif ($type == 'email') {
            // $Config = [$email];
            $this->db->where('user.email =', $config);
            return $this->db->get()->row_array();
        } elseif ($type == 'setid') {
            // $Config = [$id_santri];
            $this->db->where('santri.id =', $config);
            return $this->db->get()->row_array();
        } elseif ($type == 'set_id_lembaga') {
            // $Config = [$id_santri];
            $this->db->where('santri.id =', $config['id_santri']);
            $this->db->where('santri.id_sekolah =', $config['id_sekolah']);
            return $this->db->get()->row_array();
        } elseif ($type == 'setlembaga') {
            // $Config = [$idlembaga];
            $this->db->where('santri.id_sekolah =', $config);
            return $this->db->get()->result_array();
        } elseif ($type == 'jumlahlembaga') {
            // $Config = [$idlembaga];
            $this->db->where('santri.id_sekolah =', $config);
            return $this->db->get()->num_rows();
        } elseif ($type == 'jumlahtotal') {
            return $this->db->get()->num_rows();
        } else {
            return $this->db->get()->result_array();
        }
    }

    public function tambahDataSantri($data)
    {
        // Data Untuk Tabel 'User'
        $useridacak = random_string('numeric', 10);
        $id = $this->db->get('santri')->num_rows();
        if ($id == 0) {
            $id = 1;
        } else {
            $this->db->select_max('id');
            $id = $this->db->get('santri')->row_array();
            $id = $id['id'];
            $id++;
        }
        $idppdb = 'ppdb' . 2021 . $id;
        $password = random_string('alnum', 16);
        $data['idppdb'] = $idppdb;
        $data['password'] = $password;
        $data1 = [
            "userid" => $useridacak, // Untuk menghilangkan fungsinya sementara
            "username" => $idppdb,
            "email" => $data['email'],
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "role_id" => 7,
            "is_active" => 1,
            "date_created" => time()
        ];
        $this->db->insert('user', $data1);

        // Data Untuk Tabel 'Santri_daftar'
        $data2 = [
            "id_santri" => $id,
            "nomor_daftar" => $idppdb,
            "jenis_daftar" => $data['jenisdaftar'],
            "is_terdaftar" => 0,
            "is_pesantren" => 0
        ];
        $this->db->insert('santri_daftar', $data2);

        // Data untuk tabel 'Santri'
        $data3 = [
            "id" => $id,
            "id_user" => 0,
            "nama" => $data['nama'],
            "id_sekolah" => $data['id_sekolah'],
            "id_pesantren" => 0
        ];
        $this->db->insert('santri', $data3);

        // Data untuk tabel 'Santri_detail'
        $data4 = [
            "id_santri" => $id,
            "tempat_lahir" => $data['tmplahir'],
            "tgl_lahir" => $data['tgllahir'],
            "jnskelamin" => $data['jeniskelamin'],
            "agama" => $data['agama'],
            "no_hp" => $data['nohp'],
            "alamat_ds" => $data['desa'],
            "alamat_kec" => $data['kec'],
            "alamat_kab" => $data['kab']
        ];
        $this->db->insert('santri_detail', $data4);

        // Data untuk tabel 'Santri_sekolah'
        $data5 = [
            "id_santri" => $id,
            "nis" => 0,
            "nisn" => $data['nisn'],
            "id_jurusan" => 0,
            "id_kelas" => 0,
            "sekolahasal" => $data['asalsekolah']
        ];
        $this->db->insert('santri_sekolah', $data5);

        // Data tabel lain
        $data6 = [
            "id_santri" => $id
        ];
        $this->db->insert('santri_ortu', $data6);
        $this->db->insert('santri_pesantren', $data6);

        // Data tabel berkas
        $foto = "7_" . $data['jeniskelamin'] . ".png";
        $data7 = [
            "id_santri" => $id,
            "pasfoto" => $foto
        ];
        $this->db->insert('santri_berkas', $data7);

        // Mengirim pesan ke akun email ke pendaftar
        $kirim = [
            'idppdb' => $idppdb,
            'password' => $password,
            'email' => $data['email'],
            'admin_akun' => $data['admin_email'],
            'admin_password' => $data['admin_password']
        ];
        $this->_sendEmail($kirim);

        return $data['nama'];
    }

    public function hapusDataSantri($iduser, $idsantri)
    {
        $this->hapusDataUser($iduser);
        $this->hapusDataSantriOnly($idsantri);
        $tables = array('santri_daftar', 'santri_berkas', 'santri_detail', 'santri_ortu', 'santri_sekolah', 'santri_pesantren');
        $this->db->where('id_santri', $idsantri);
        $this->db->delete($tables);
    }

    public function hapusDataUser($iduser)
    {
        $this->db->where('id', $iduser);
        $this->db->delete('user');
    }

    public function hapusDataSantriOnly($idsantri)
    {
        $this->db->where('id', $idsantri);
        $this->db->delete('santri');
    }

    public function aktivasiAkun($iduser)
    {
        $this->db->set('is_active', 1);
        $this->db->where('id', $iduser);
        return $this->db->update('user');
    }

    private function _sendEmail($data)
    {
        $mail = new PHPMailer(true);

        $auth = true;

        if ($auth) {
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "smtp.googlemail.com";
            $mail->Port = 465;
            $mail->Username = $data['admin_akun'];
            $mail->Password = $data['admin_password'];
        }

        $mail->AddAddress($data['email']);
        $mail->SetFrom($data['admin_akun'], "Al Hikmah 1 Customer Service");
        $mail->isHTML(true);

        $pesanVerify = '<html lang="en"><body><div style="text-align: center; padding-top: 2px; padding-bottom: 3px; background-color: rgba(80, 173, 80, 50%); border-radius: 20px;">';
        $pesanVerify .= '<h5><i>Sistem Informasi Pendidikan Pesantren Alhikmah 1</i></h5>';
        $pesanVerify .= '<h1>Terima kasih telah melakukan pendaftaran &#128521;</h1>';
        $pesanVerify .= '<p>Selamat ! kamu telah menyelesaikan tahap pertama pada sistem pendaftaran Lembaga Pendidikan Yayasan Pondok Pesantren Al Hikmah 1 &#128522;</p>';
        $pesanVerify .= '<p>ID Pengguna : <b>' . $data['idppdb'] . '</b><br>Kata Sandi : <b>' . $data['password'] . '</b></p>';
        $pesanVerify .= '<p>Silahkan klik link di bawah ini untuk mengaktivasi dan melanjutkan ke tahap selanjutnya</p>';
        $pesanVerify .= '<b><a
        href="https://sipp.alhikmah1.or.id"
        style="text-decoration: none; padding-bottom: 5px;">Login</a></b>';
        $pesanVerify .= '</div>' . '</body>' . '</html>';

        $mail->Subject = "Account Registration";
        $mail->Body = $pesanVerify;

        try {
            $mail->Send();
            return true;
        } catch (Exception $e) {
            echo $mail->ErrorInfo;
        }
    }
}
