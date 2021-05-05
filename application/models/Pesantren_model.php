<?php

class Pesantren_model extends CI_Model
{
    public function getListPesantren()
    {
        return $this->db->get_where('pesantren')->result_array();
    }

    public function getpesantrenById($id)
    {
        return $this->db->get_where('pesantren', ['id' => $id])->row_array();
    }
}
