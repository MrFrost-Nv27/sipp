<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('sipp_userid')) {
        redirect('masuk');
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
