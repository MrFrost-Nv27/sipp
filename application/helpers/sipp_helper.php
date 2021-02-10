<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('sipp_userid')) {
        redirect('masuk');
    } else {
        $role_id = $ci->session->userdata('sipp_role_id');
        $menu = $ci->uri->segment(1) . '/' . $ci->uri->segment(2);

        $queryMenu = $ci->db->get_where('user_menu', ['url' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('masuk/blocked');
        }
    }
}
