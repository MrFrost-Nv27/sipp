<?php

class Sekolah_model extends CI_Model
{
    public function getListjenisDaftar()
    {
        return $this->db->get_where('myconfig', ['ckey' => 'jenis daftar'])->result_array();
    }

    public function getListSekolah()
    {
        return $this->db->get_where('lembaga')->result_array();
    }

    public function generateIdSantri()
    {
        $jumlah = $this->db->get('peoples')->num_rows();
        return $jumlah++;
    }

    public function getLembagaOpt($id)
    {
        return $this->db->get_where('lembaga', ['id' => $id])->row_array();
    }

    public function jumlahSiswa($id)
    {
        return $this->db->get_where('santri', ['id_sekolah' => $id])->num_rows();
    }

    public function getAllSantriBySekolahId($id)
    {
        return $this->db->get_where('santri', ['id_sekolah' => $id])->result_array();
    }
}
