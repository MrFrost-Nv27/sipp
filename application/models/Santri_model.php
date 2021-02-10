<?php

class Santri_model extends CI_Model
{
    private function querySantri()
    {
        return "user.id AS login_id, 
        user.userid AS login_userid, 
        user.username AS login_username,
        user.email,
        user.date_created,
        user.is_active,
        santri.*, santri_daftar.*, santri_detail.*, santri_berkas.*, 
        santri_ortu.*, santri_sekolah.*, santri_pesantren.*,
        user_role.role, lembaga.nama AS nama_lembaga, lembaga_jurusan.*";
    }

    public function getDataSantri($settype, $setconfig = [null], $isppdb = false)
    {
        $query = $this->querySantri();
        $this->db->select($query);
        $this->db->from('user');
        $this->db->join('santri_daftar', 'user.username = santri_daftar.nomor_daftar');
        $this->db->join('santri', 'santri_daftar.id_santri = santri.id');
        $this->db->join('lembaga', 'lembaga.id = santri.id_sekolah');
        $this->db->join('santri_detail', 'santri.id = santri_detail.id_santri');
        $this->db->join('santri_berkas', 'santri_berkas.id_santri = santri.id');
        $this->db->join('santri_ortu', 'santri_ortu.id_santri = santri.id');
        $this->db->join('santri_sekolah', 'santri_sekolah.id_santri = santri.id');
        $this->db->join('santri_pesantren', 'santri_pesantren.id_santri = santri.id');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        $this->db->join('lembaga_jurusan', 'lembaga_jurusan.id = santri_sekolah.id_jurusan');
        $this->db->distinct();

        // Ambil Konfigurasi dari parameter
        $type = $settype;
        $config = $setconfig;

        // Jika hanya diambil data ppdb nya
        if ($isppdb == true) {
            $this->db->where('santri_daftar.is_terdaftar = 0');
        }

        if ($type == 'limit') {
            // $Config = [$limit, $start, $keyword];
            if ($config['lembaga']) {
                $this->db->where('santri.id_sekolah', $config['lembaga']);
            }
            if ($config['keyword']) {
                $this->db->like('santri.nama', $config['keyword']);
            }
            $this->db->limit($config['limit'], $config['start']);
            return $this->db->get()->result_array();
        } elseif ($type == 'login') {
            // mengambil data sesuai user id
            $id_user = $this->session->userdata('sipp_userid');
            $this->db->where('user.id =', $id_user);
            return $this->db->get()->row_array();
        } elseif ($type == 'setid') {
            // $Config = [$id_santri];
            $this->db->where('santri.id =', $config);
            return $this->db->get()->row_array();
        } elseif ($type == 'set_id_lembaga') {
            // $Config = [$id_santri];
            $this->db->where('santri.id =', $config['id_santri']);
            $this->db->where('santri.id_sekolah =', $config['id_sekolah']);
            return $this->db->get()->row_array();
        } elseif ($type == 'setlembaga') {
            // $Config = [$idlembaga];
            $this->db->where('santri.id_sekolah =', $config);
            return $this->db->get()->result_array();
        } elseif ($type == 'jumlahlembaga') {
            // $Config = [$idlembaga];
            $this->db->where('santri.id_sekolah =', $config);
            return $this->db->get()->num_rows();
        } elseif ($type == 'jumlahtotal') {
            return $this->db->get()->num_rows();
        } else {
            return $this->db->get()->result_array();
        }
    }
}
