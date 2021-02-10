<?php

class Admin_model extends CI_Model
{
    private function queryAdmin()
    {
        return "user.id AS login_id, 
        user.userid AS login_userid, 
        user.username AS login_username,
        user.email,
        user.date_created,
        admin.*,
        user_role.role";
    }

    public function getDataAdmin($settype)
    {
        $query = $this->queryAdmin();
        $this->db->select($query);
        $this->db->from('user');
        $this->db->join('admin', 'admin.id_user = user.id');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        $this->db->distinct();

        $type = $settype;
        // Type 1 all (Default)
        // Type 2 login
        if ($type == 'login') {
            $id_user = $this->session->userdata('sipp_userid');
            $this->db->where('user.id =', $id_user);
            return $this->db->get()->row_array();
        } else {
            return $this->db->get()->result_array();
        }
    }
}
