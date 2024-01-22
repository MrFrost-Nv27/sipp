<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('Admin_model');
        $this->load->model('Sekolah_model');
    }

    public function index()
    {
        echo 'Test';
    }

    public function mailtest()
    {
        $param = htmlspecialchars($this->input->post('param', true));
        $nowa = htmlspecialchars($this->input->post('nowa', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $raphiwa = $this->Global_model->getRapiwhaApikey();

        $data = [
            'nama' => 'Ahmad Fulan Amaron',
            'idppdb' => 'Ppdb202127',
            'pass' => 'katasandiku123',
            'kode' => 123456
        ];

        if ($param == 'wa') {
            if (substr($nowa, 0, 1) == 0) {
                $nowa = substr($nowa, 1);
                $nowafixed = 62 . $nowa;
            } else {
                $nowafixed = $nowa;
            }
            $res = [
                'csrf' => $this->security->get_csrf_hash(),
                'apikey' => $raphiwa['rapiwha_apikey'],
                'nohp' => $nowafixed,
                'message' => $this->Email_model->daftarWA($data)
            ];
            echo json_encode($res);
        } elseif ($param == 'email') {
            $mailing = [
                'email_to' => $email,
                'email_subjek' => "Registrasi Santri",
                'email_body' => $this->Email_model->daftar($data)
            ];

            $this->Global_model->sendEmail($mailing);
            echo json_encode($email);
        } else {
            echo json_encode($param);
        }
    }
}
