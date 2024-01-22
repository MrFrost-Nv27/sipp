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
}
