<?php

class Pesantren_model extends CI_Model
{
    private function queryOperator()
    {
        return "user.id AS login_id, 
        user.userid AS login_userid, 
        user.username AS login_username,
        user.email,
        user.date_created,
        operator.*,
        pesantren.nama AS nama_pesantren,
        pesantren.kode AS kode_pesantren,
        user_role.role";
    }

    public function getDataOperator($settype = null)
    {
        $querynya = $this->queryOperator();
        $this->db->select($querynya);
        $this->db->from('user');
        $this->db->join('operator', 'operator.id_user = user.userid');
        $this->db->join('pesantren', 'pesantren.id = operator.id_lembaga');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        $this->db->distinct();

        $type = $settype;
        // Type Default All
        // Type 1 login
        if ($type == 'login') {
            $id_user = $this->session->userdata('sipp_userid');
            $this->db->where('user.id = ', $id_user);
            return $this->db->get()->row_array();
        } else {
            return $this->db->get()->result_array();
        }
    }

    public function getListPesantren()
    {
        return $this->db->get_where('pesantren')->result_array();
    }

    public function getpesantrenById($id)
    {
        return $this->db->get_where('pesantren', ['id' => $id])->row_array();
    }
}
