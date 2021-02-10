<?php
require(APPPATH . 'third_party/phpoffice/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;

class Operator_model extends CI_Model
{
    private function queryOperator()
    {
        return "user.id AS login_id, 
        user.userid AS login_userid, 
        user.username AS login_username,
        user.email,
        user.date_created,
        operator.*,
        lembaga.nama AS nama_lembaga,
        lembaga.kode AS kode_lembaga,
        lembaga.kuotadaftar,
        user_role.role";
    }

    public function getDataOperator($settype = null)
    {
        $querynya = $this->queryOperator();
        $this->db->select($querynya);
        $this->db->from('user');
        $this->db->join('operator', 'operator.id_user = user.userid');
        $this->db->join('lembaga', 'lembaga.id = operator.id_lembaga');
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

    public function changepass()
    {
        $current_password = $this->input->post('pass0');
        $new_password = $this->input->post('pass1');
        $user = $this->db->get_where('user', ['id' => $this->session->userdata('sipp_userid')])->row_array();
        if (!password_verify($current_password, $user['password'])) {
            $this->Global_model->gagalNotify('Password yang kamu masukkan salah !');
            redirect('user/akunadmin');
        } else {
            if ($current_password == $new_password) {
                $this->Global_model->gagalNotify('Password yang baru tidak boleh sama dengan password yang sebelumnya !');
                redirect('user/akunadmin');
            } else {
                // Password sudah siap diubah
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('id', $user['id']);
                $this->db->update('user');

                $this->Global_model->berhasilNotify('Password berhasil diubah !');
                redirect('user/akunadmin');
            }
        }
    }

    public function changeinfo()
    {
        $user = $this->getDataOperator('login');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');

        $this->db->set('username', $username);
        $this->db->set('email', $email);
        $this->db->where('id', $user['login_id']);
        $this->db->update('user');

        $this->db->set('nama', $nama);
        $this->db->where('id', $user['id']);
        $this->db->update('operator');

        $this->Global_model->berhasilNotify('Info akun berhasil diubah !');
        redirect('user/akunadmin');
    }

    public function export($format = null, $data = [])
    {
        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Tanggal Pendaftaran')
            ->setCellValue('C1', 'Nomor Pendaftaran')
            ->setCellValue('D1', 'Jenis Pendaftaran')
            ->setCellValue('E1', 'Nama')
            ->setCellValue('F1', 'Jenis Kelamin')
            ->setCellValue('G1', 'Tempat dan Tanggal Lahir')
            ->setCellValue('H1', 'Agama')
            ->setCellValue('I1', 'Hobi')
            ->setCellValue('J1', 'Alamat')
            ->setCellValue('K1', 'Nomor KIP')
            ->setCellValue('L1', 'Nama Ayah')
            ->setCellValue('M1', 'Nomor Hp Ayah')
            ->setCellValue('N1', 'Pekerjaan Ayah')
            ->setCellValue('O1', 'Nama Ibu')
            ->setCellValue('P1', 'Nomor Hp Ibu')
            ->setCellValue('Q1', 'Pekerjaan Ibu')
            ->setCellValue('R1', 'Avg Penghasilan Ortu')
            ->setCellValue('S1', 'Jumlah Saudara Kandung')
            ->setCellValue('T1', 'Sekolah Asal')
            ->setCellValue('U1', 'NISN')
            ->setCellValue('V1', 'Daftar Sekolah')
            ->setCellValue('W1', 'Jurusan')
            ->setCellValue('X1', 'Nomor Hp')
            ->setCellValue('Y1', 'Email');

        $kolom = 2;
        $nomor = 1;
        foreach ($data as $santri) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, date("d-F-Y", $santri['date_created']))
                ->setCellValue('C' . $kolom, $santri['nomor_daftar'])
                ->setCellValue('D' . $kolom, $santri['jenis_daftar'])
                ->setCellValue('E' . $kolom, $santri['nama'])
                ->setCellValue('F' . $kolom, $santri['jnskelamin'])
                ->setCellValue('G' . $kolom, $santri['tempat_lahir'] . ',' . $santri['tgl_lahir'])
                ->setCellValue('H' . $kolom, $santri['agama'])
                ->setCellValue('I' . $kolom, $santri['hobby'])
                ->setCellValue('J' . $kolom, 'Jl. ' . $santri['alamat_jl'] . ' Rt/Rw '
                    . $santri['alamat_rt'] . '/' . $santri['alamat_rw'] . ' No. '
                    . $santri['alamat_no'] . ' Dk. ' . $santri['alamat_dk'] . ' Desa ' . $santri['alamat_ds'] . ' Kec. '
                    . $santri['alamat_kec'] . ' Kab. ' . $santri['alamat_kab'])
                ->setCellValue('K' . $kolom, $santri['no_kip'])
                ->setCellValue('L' . $kolom, $santri['ayah_nama'])
                ->setCellValue('M' . $kolom, $santri['ayah_nohp'])
                ->setCellValue('N' . $kolom, $santri['ayah_kerja'])
                ->setCellValue('O' . $kolom, $santri['ibu_nama'])
                ->setCellValue('P' . $kolom, $santri['ibu_nohp'])
                ->setCellValue('Q' . $kolom, $santri['ibu_kerja'])
                ->setCellValue('R' . $kolom, $santri['avgpenghasilan'])
                ->setCellValue('S' . $kolom, $santri['sdrkandung'])
                ->setCellValue('T' . $kolom, $santri['sekolahasal'])
                ->setCellValue('U' . $kolom, $santri['nisn'])
                ->setCellValue('V' . $kolom, $santri['nama_lembaga'])
                ->setCellValue('W' . $kolom, $santri['jurusan'])
                ->setCellValue('X' . $kolom, $santri['no_hp'])
                ->setCellValue('Y' . $kolom, $santri['email']);

            $kolom++;
            $nomor++;
        }

        if ($format == 'xlsx') {
            $writer = new Xlsx($spreadsheet);
            $namafile = 'Data PPDB ' . $data[0]['nama_lembaga'] . ' Tahun ' . date('Y') . '.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename= ' . $namafile);
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        } elseif ($format == 'pdf') {
            $spreadsheet->getActiveSheet()->getPageSetup()
                ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            $spreadsheet->getActiveSheet()->getPageSetup()
                ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            $writer = new Mpdf($spreadsheet);
            $namafile = 'Data PPDB ' . $data[0]['nama_lembaga'] . ' Tahun ' . date('Y') . '.pdf';
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment;filename= ' . $namafile);
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
        }
    }
}
