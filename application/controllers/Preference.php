<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Preference extends CI_Controller
{
    public function ubahpassword()
    {
        $role_id = $this->session->userdata('sipp_role_id');
        if ($this->form_validation->run() == false) {
            if ($role_id == 2) {
                redirect('user/akunadmin');
            }
        } else {
            redirect('user/akunadmin');
        }
    }
}
