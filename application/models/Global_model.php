<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require(APPPATH . 'third_party/phpmailer/autoload.php');

class Global_model extends CI_Model
{
    public function getTahunC()
    {
        if (date("Y") == 2021) {
            $tahunC = 2021;
        } else {
            $tahunC = 2021 . " - " . date("Y");
        }
        return $tahunC;
    }

    public function getVersion()
    {
        $version = $this->db->get_where('myconfig', ['ckey' => 'sipp version'])->row_array();
        return $version['cvalue'];
    }

    public function getAuthor()
    {
        $author = $this->db->get_where('myconfig', ['ckey' => 'sipp author'])->row_array();
        return $author['cvalue'];
    }

    public function getKeteranganApp()
    {
        $tahunC = $this->getTahunC();
        $version = $this->getVersion();
        $author = $this->getAuthor();
        $keterangan = [];
        return $keterangan[] = [$version, $author, $tahunC];
    }

    public function getListJenisKelamin()
    {
        return $this->db->get_where('myconfig', ['ckey' => 'jenis kelamin'])->result_array();
    }

    public function getListAgama()
    {
        return $this->db->get_where('myconfig', ['ckey' => 'agama'])->result_array();
    }

    public function getListPenghasilan()
    {
        return $this->db->get_where('myconfig', ['ckey' => 'penghasilan'])->result_array();
    }

    public function getRandomPass()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 16; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function gagalNotify($msg)
    {
        return $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $msg . '</div>');
    }

    public function berhasilNotify($msg)
    {
        return $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $msg . '</div>');
    }

    public function peringatanNotify($msg)
    {
        return $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">' . $msg . '</div>');
    }

    public function login_cek()
    {
        // Check Login
        if ($this->session->userdata('sipp_userid')) {
            $user = $this->db->get_where('user', ['id' => $this->session->userdata('sipp_userid')])->row_array();
            if ($user['is_active'] == 0) {
                redirect('masuk/pageactv');
            } else {
                $this->login_gate();
            }
        }
    }

    public function login_gate()
    {
        $user = $this->db->get_where('user', ['id' => $this->session->userdata('sipp_userid')])->row_array();
        $role_row = $this->db->get_where('user_role', ['id' => $user['role_id']])->row_array();
        if ($user['role_id'] == 7) {
            $santri = $this->Santri_model->loginppdb();
            if ($santri['is_terdaftar'] == 1) {
                redirect('santri/index');
            } else if ($santri['is_terdaftar'] == 0) {
                redirect('ppdb/index');
            } else {
                redirect('santri/ppdb');
            }
        } else {
            redirect($role_row['controller']);
        }
    }

    public function getUserLoginTabel()
    {
        $this->load->model('Admin_model');
        $this->load->model('Operator_model');
        $this->load->model('Santri_model');
        $user = $this->db->get_where('user', ['id' => $this->session->userdata('sipp_userid')])->row_array();
        if ($user['role_id'] == 1) {
            $this->Admin_model->getDataAdmin('login');
        } else if ($user['role_id'] == 2) {
            $this->Operator_model->getDataOperator('login');
        } else if ($user['role_id'] == 7) {
            $this->Santri_model->getDataSantri('login');
        }
    }

    public function getUserRole($role_id)
    {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    }

    public function getAdminEmailAcc()
    {
        $username = $this->db->get_where('myconfig', ['ckey' => 'admin-email address'])->row_array();
        $password = $this->db->get_where('myconfig', ['ckey' => 'admin-email password'])->row_array();
        $smtp = $this->db->get_where('myconfig', ['ckey' => 'admin-smtp host'])->row_array();
        $port = $this->db->get_where('myconfig', ['ckey' => 'admin-smtp port'])->row_array();
        $data = [
            "username" => $username['cvalue'],
            "password" => $password['cvalue'],
            "smtp" => $smtp['cvalue'],
            "port" => $port['cvalue']
        ];
        return $data;
    }

    public function getRapiwhaApikey()
    {
        $apikey = $this->db->get_where('myconfig', ['ckey' => 'rapiwha-apikey'])->row_array();
        $data = [
            "rapiwha_apikey" => $apikey['cvalue']
        ];
        return $data;
    }

    public function getCaptchaToken()
    {
        $local_secret = $this->db->get_where('myconfig', ['ckey' => 'captcha-local secret key'])->row_array();
        $local_site = $this->db->get_where('myconfig', ['ckey' => 'captcha-local site key'])->row_array();
        $sipp_secret = $this->db->get_where('myconfig', ['ckey' => 'captcha-sipp secret key'])->row_array();
        $sipp_site = $this->db->get_where('myconfig', ['ckey' => 'captcha-sipp site key'])->row_array();
        $data = [
            "local_secret" => $local_secret['cvalue'],
            "local_site" => $local_site['cvalue'],
            "sipp_secret" => $sipp_secret['cvalue'],
            "sipp_site" => $sipp_site['cvalue']
        ];
        return $data;
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

    public function sendEmail($data)
    {

        $mail = new PHPMailer(true);

        $auth = true;

        $admin =  $this->getAdminEmailAcc();

        if ($auth) {
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = $admin['smtp'];
            $mail->Port = $admin['port'];
            $mail->Username = $admin['username'];
            $mail->Password = $admin['password'];
        }

        $mail->AddAddress($data['email_to']);
        $mail->SetFrom($admin['username'], "Al Hikmah 1 Customer Service");
        $mail->isHTML(true);
        $mail->Subject = $data['email_subjek'];
        $mail->Body = $data['email_body'];

        try {
            $mail->Send();
            return true;
        } catch (Exception $e) {
            echo $mail->ErrorInfo;
        }
    }

    public function sendWA($data)
    {
        $api =  $this->getRapiwhaApikey();
        $api_url = "http://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=" . urlencode($api['rapiwha_apikey']);
        $api_url .= "&number=" . urlencode($data['nohp']);
        $api_url .= "&text=" . urlencode($data['message']);

        // Send Message
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function insertToken($data)
    {
        $this->db->insert('user_token', $data);
    }
}
