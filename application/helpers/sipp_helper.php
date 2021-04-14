<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('sipp_userid')) {
        redirect('masuk');
    }
}

function cek_mt()
{
    $ci = get_instance();
    $status = $ci->db->get_where('myconfig', [
        'ckey' => 'maintenance',
        'cvalue' => 1
    ]);
    if ($status->num_rows() > 0) {
        redirect('maintenance');
    }
}

function cekAksesCtl()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('sipp_role_id');
    $gate = $ci->uri->segment(1);


    $userAccess = $ci->db->get_where('user_access_control', [
        'role_id' => $role_id,
        'controller' => $gate
    ]);

    if ($userAccess->num_rows() < 1) {
        redirect('masuk/blocked');
    }
}
