<?php

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
            $this->login_gate();
        }
    }

    public function login_gate()
    {
        $user = $this->db->get_where('user', ['id' => $this->session->userdata('sipp_userid')])->row_array();
        $role_row = $this->db->get_where('user_role', ['id' => $user['role_id']])->row_array();
        if ($user['role_id'] == 7) {
            $santri = $this->Santri_model->getDataSantri('login');
            if ($santri['is_terdaftar'] == 0) {
                redirect('santri/ppdb');
            } else {
                redirect('santri/index');
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
        $data = [
            "username" => $username['cvalue'],
            "password" => $password['cvalue']
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
}
