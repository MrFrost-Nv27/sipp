<?php

class Menu_model extends CI_Model
{
    public function headerQuery()
    {
        $role_id = $this->session->userdata('sipp_role_id');
        $data['santri'] = $this->Santri_model->loginppdb();

        $this->db->select('user_menu_heading.id,judul');
        $this->db->from('user_menu_heading');
        $this->db->join('user_menu_query', 'user_menu_heading.id = user_menu_query.heading_id');
        $this->db->distinct();
        $this->db->where('role_id = ', $role_id);
        $this->db->order_by('user_menu_heading.indeks', 'ASC');
        if ($role_id == 7) {
            if ($data['santri']['is_terdaftar'] == 0) {
                $this->db->where('user_menu_heading.id = 4');
                return $this->db->get()->result_array();
            } else {
                $this->db->where('user_menu_heading.id != 4');
                return $this->db->get()->result_array();
            }
        } else {
            return $this->db->get()->result_array();
        }
    }

    public function menuQueryByHeader($header_id)
    {
        // mengambil query menu sesuai role id
        $role_id = $this->session->userdata('sipp_role_id');
        $queryMenu = "SELECT user_menu.* 
                      FROM user_menu 
                      JOIN user_menu_query 
                      ON user_menu.id = user_menu_query.menu_id
                      WHERE role_id = $role_id 
                      AND user_menu.heading_id = $header_id
                      AND is_submenu != 2
                      AND is_active = 1
                      ORDER BY user_menu.heading_id ASC, user_menu.indeks ASC
                      ";
        return $this->db->query($queryMenu)->result_array();
    }

    public function menuPpdbQueryByHeader($header_id)
    {
        // mengambil query menu sesuai role id
        $queryMenu = "SELECT * 
                      FROM user_menu_ppdb
                      WHERE heading_id = $header_id
                      AND is_submenu != 2
                      AND is_active = 1
                      ORDER BY heading_id ASC, indeks ASC
                      ";
        return $this->db->query($queryMenu)->result_array();
    }

    public function subMenuQueryByMenu($header_id, $subhead)
    {
        // mengambil query menu sesuai role id
        $role_id = $this->session->userdata('sipp_role_id');
        $querySubMenu = "SELECT user_menu.* 
        FROM user_menu 
        JOIN user_menu_query 
        ON user_menu.id = user_menu_query.menu_id
        WHERE role_id = $role_id 
        AND user_menu.heading_id = $header_id
        AND is_submenu = 2
        AND submenu_of = $subhead
        AND is_active = 1
        ORDER BY user_menu.heading_id ASC, user_menu.indeks ASC
        ";
        return $this->db->query($querySubMenu)->result_array();
    }

    public function subMenuPpdbQueryByMenu($header_id, $subhead)
    {
        $querySubMenu = "SELECT* 
        FROM user_menu_ppdb
        WHERE heading_id = $header_id
        AND is_submenu = 2
        AND submenu_of = $subhead
        AND is_active = 1
        ORDER BY heading_id ASC, indeks ASC
        ";
        return $this->db->query($querySubMenu)->result_array();
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function getPpdbMenuById($id)
    {
        return $this->db->get_where('user_menu_ppdb', ['id' => $id])->row_array();
    }
}
