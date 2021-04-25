<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require(APPPATH . 'third_party/phpmailer/autoload.php');

class User_model extends CI_Model
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
        user.is_active";
    }

    public function getDataUser($settype, $setconfig = [null])
    {
        $query = $this->querySantri();
        $this->db->select($query);
        $this->db->from('user');
        $this->db->distinct();

        // Ambil Konfigurasi dari parameter
        $type = $settype;
        $config = $setconfig;

        if ($type == 'email') {
            // $Config = [$email];
            $this->db->where('user.email =', $config);
            return $this->db->get()->row_array();
        } else {
            return $this->db->get()->result_array();
        }
    }

    public function tambahDataUser($data)
    {
        return $this->db->insert('user', $data);
    }

    public function hapusDataUser($iduser)
    {
        $response = [];
        $this->db->where('id', $iduser);
        $response = $this->db->delete('user');
        return $response;
    }

    public function aktivasiAkun($iduser)
    {
        $this->db->set('is_active', 1);
        $this->db->where('id', $iduser);
        return $this->db->update('user');
    }
}
