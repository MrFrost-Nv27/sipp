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

    public function changepass()
    {
        $current_password = $this->input->post('pass0');
        $new_password = $this->input->post('pass1');
        $user = $this->db->get_where('user', ['id' => $this->session->userdata('sipp_userid')])->row_array();
        if (!password_verify($current_password, $user['password'])) {
            $this->Global_model->gagalNotify('Password yang kamu masukkan salah !');
            redirect('super/akunsuper');
        } else {
            if ($current_password == $new_password) {
                $this->Global_model->gagalNotify('Password yang baru tidak boleh sama dengan password yang sebelumnya !');
                redirect('super/akunsuper');
            } else {
                // Password sudah siap diubah
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('id', $user['id']);
                $this->db->update('user');

                $this->Global_model->berhasilNotify('Password berhasil diubah !');
                redirect('super/akunsuper');
            }
        }
    }

    public function changeinfo()
    {
        $user = $this->getDataAdmin('login');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');

        $this->db->set('username', $username);
        $this->db->set('email', $email);
        $this->db->where('id', $user['login_id']);
        $this->db->update('user');

        $this->db->set('nama', $nama);
        $this->db->where('id', $user['id']);
        $this->db->update('admin');

        $this->Global_model->berhasilNotify('Info akun berhasil diubah !');
        redirect('super/akunsuper');
    }
}
