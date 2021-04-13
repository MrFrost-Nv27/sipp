<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require(APPPATH . 'third_party/phpmailer/autoload.php');

class Daftar_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
    }

    public function captchaVerify($data)
    {
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
        $userIp = $this->input->ip_address();
        $secret = $data['local_secret']; // ini adalah Secret key yang didapat dari google, silahkan disesuaikan
        $credential = array(
            'secret' => $secret,
            'response' => $recaptchaResponse
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status = json_decode($response, true);

        return $status;
    }

    public function genToken()
    {
        $data = [
            // 'token' => base64_encode(random_bytes(32)),
            'token' => random_string('alnum', 42),
            'kode' => random_string('numeric', 6)
        ];
        return $data;
    }

    public function santriDaftar($data)
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
            "is_active" => 0,
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

        // Siapkan Token
        $datatoken = $this->genToken();
        $user_token = [
            'email' => $data['email'],
            'token' => $datatoken['token'],
            'kode' => $datatoken['kode'],
            'date_created' => time()
        ];
        $this->db->insert('user_token', $user_token);

        // Mengirim pesan ke akun email ke pendaftar
        $kirim = [
            'idppdb' => $idppdb,
            'password' => $password,
            'email' => $data['email'],
            'admin_akun' => $data['admin_email'],
            'admin_password' => $data['admin_password'],
            'token' => $user_token['token'],
            'kode' => $user_token['kode']
        ];
        $this->_sendEmail($kirim, 'verify');
    }

    private function _sendEmail($data, $type)
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
        href="' . base_url() . 'masuk/verify?email=' . $data['email'] . '&token=' . urlencode($data['token']) . '"
        style="text-decoration: none; padding-bottom: 5px;">Aktivasi Akun</a></b>';
        $pesanVerify .= '</div>' . '</body>' . '</html>';

        if ($type == 'verify') {
            $mail->Subject = "Account Verification";
            $mail->Body = $pesanVerify;
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a
            href="' . base_url() . 'auth/resetpassword?email=' . $data['email'] . '&token=' . urlencode($data['token']) . '">Reset
            Password</a>');
        }

        try {
            $mail->Send();
            return true;
        } catch (Exception $e) {
            echo $mail->ErrorInfo;
        }
    }
}
