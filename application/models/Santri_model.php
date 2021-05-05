<?php

class Santri_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
    }

    private function querylogin()
    {
        return "user.id AS login_id, 
        user.userid AS login_userid, 
        user.username AS login_username,
        user.email,
        user.date_created,
        user.is_active,
        santri.*,santri_sekolah.*,santri_pesantren.*,
        user_role.role";
    }

    private function querySantri()
    {
        return "user.id AS login_id, 
        user.userid AS login_userid, 
        user.username AS login_username,
        user.email,
        user.date_created,
        user.is_active,
        santri.*, santri_sekolah.*, santri_pesantren.*,
        user_role.role, lembaga.nama AS nama_lembaga, lembaga_jurusan.*";
    }

    public function loginppdb()
    {
        $query = $this->querylogin();
        $this->db->select($query);
        $this->db->from('user');
        $this->db->join('santri', 'user.username = santri.nomor_daftar');
        $this->db->join('santri_sekolah', 'santri_sekolah.id_santri = santri.id');
        $this->db->join('santri_pesantren', 'santri_pesantren.id_santri = santri.id');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        $this->db->where('user.id =', $this->session->userdata('sipp_userid'));
        return $this->db->get()->row_array();
    }

    public function getDataSantri($settype, $setconfig = [null], $isppdb = false)
    {
        $query = $this->querySantri();
        $this->db->select($query);
        $this->db->from('user');
        $this->db->join('santri', 'user.username = santri.nomor_daftar');
        $this->db->join('santri_sekolah', 'santri_sekolah.id_santri = santri.id');
        $this->db->join('santri_pesantren', 'santri_pesantren.id_santri = santri.id');
        $this->db->join('lembaga', 'lembaga.id = santri_sekolah.id_sekolah');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        $this->db->join('lembaga_jurusan', 'lembaga_jurusan.id = santri_sekolah.id_jurusan');
        $this->db->distinct();

        // Ambil Konfigurasi dari parameter
        $type = $settype;
        $config = $setconfig;

        // Jika hanya diambil data ppdb nya
        if ($isppdb == true) {
            $this->db->where('santri.is_terdaftar != 1');
        }

        if ($type == 'limit') {
            // $Config = [$limit, $start, $keyword];
            if ($config['lembaga']) {
                $this->db->where('santri_sekolah.id_sekolah', $config['lembaga']);
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
        } elseif ($type == 'email') {
            // $Config = [$email];
            $this->db->where('user.email =', $config);
            return $this->db->get()->row_array();
        } elseif ($type == 'setid') {
            // $Config = [$id_santri];
            $this->db->where('santri.id =', $config);
            return $this->db->get()->row_array();
        } elseif ($type == 'set_id_lembaga') {
            // $Config = [$id_santri];
            $this->db->where('santri.id =', $config['id_santri']);
            $this->db->where('santri_sekolah.id_sekolah =', $config['id_sekolah']);
            return $this->db->get()->row_array();
        } elseif ($type == 'setlembaga') {
            // $Config = [$idlembaga];
            $this->db->where('santri_sekolah.id_sekolah =', $config);
            return $this->db->get()->result_array();
        } elseif ($type == 'jumlahlembaga') {
            // $Config = [$idlembaga];
            $this->db->where('santri_sekolah.id_sekolah =', $config);
            return $this->db->get()->num_rows();
        } elseif ($type == 'jumlahtotal') {
            return $this->db->get()->num_rows();
        } else {
            return $this->db->get()->result_array();
        }
    }

    public function tambahDataSantri($data, $data2)
    {
        $this->db->insert('santri_sekolah', $data2);
        $this->db->insert('santri_pesantren', $data2);
        return $this->db->insert('santri', $data);
    }

    public function ubahdatasantri($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('santri', $data);
    }

    public function ubahdatapesantren($data, $id)
    {
        $this->db->where('id_santri', $id);
        return $this->db->update('santri_pesantren', $data);
    }

    public function ubahdatasekolah($data, $id)
    {
        $this->db->where('id_santri', $id);
        return $this->db->update('santri_sekolah', $data);
    }

    public function hapusDataSantri($iduser, $idsantri)
    {
        $this->hapusDataUser($iduser);
        $this->hapusDataSantriOnly($idsantri);
        $tables = array('santri_sekolah', 'santri_pesantren');
        $this->db->where('id_santri', $idsantri);
        $this->db->delete($tables);
    }

    public function hapusDataUser($iduser)
    {
        $this->db->where('id', $iduser);
        $this->db->delete('user');
    }

    public function hapusDataSantriOnly($idsantri)
    {
        $this->db->where('id', $idsantri);
        $this->db->delete('santri');
    }

    public function aktivasiAkun($iduser)
    {
        $this->db->set('is_active', 1);
        $this->db->where('id', $iduser);
        return $this->db->update('user');
    }
}
