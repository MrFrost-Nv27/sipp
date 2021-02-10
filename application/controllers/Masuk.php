<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Global_model');
		$this->load->model('Sekolah_model');
		$this->load->model('Daftar_model');
		$this->load->model('Santri_model');
	}

	public function index()
	{
		// Check Login
		$this->Global_model->login_cek();

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Masuk';
			$data['keterangan'] = $this->Global_model->getKeteranganApp();
			$this->load->view('templates/masuk-header', $data);
			$this->load->view('masuk/index');
			$this->load->view('templates/masuk-footer', $data);
		} else {
			// Validasinya sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$userid = $this->input->post('idpengguna');
		$username = $this->input->post('idpengguna');
		$password = $this->input->post('pass');

		$user = $this->db->get_where('user', ['userid' => $userid])->row_array();

		// Jika usernya ada
		if ($user) {
			// Jika usernya aktif
			if ($user['is_active'] == 1) {
				// Cek Password
				if (password_verify($password, $user['password'])) {
					// if ($password == $user['password']) {
					$data = [
						'sipp_userid' => $user['id'],
						'sipp_username' => $user['username'],
						'sipp_role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					redirect('login_gate');
				} else {
					$this->Global_model->gagalNotify('Password yang kamu masukkan salah !');
					redirect('masuk');
				}
			} else {
				$this->Global_model->gagalNotify('ID Penggunamu belum diaktivasi !');
				redirect('masuk');
			}
		} else {
			$user = $this->db->get_where('user', ['username' => $username])->row_array();
			if ($user) {
				// Jika usernya aktif
				if ($user['is_active'] == 1) {
					// Cek Password
					if (password_verify($password, $user['password'])) {
						// if ($password == $user['password']) {
						$data = [
							'sipp_userid' => $user['id'],
							'sipp_username' => $user['username'],
							'sipp_role_id' => $user['role_id']
						];
						$this->session->set_userdata($data);
						$this->Global_model->login_gate();
					} else {
						$this->Global_model->gagalNotify('Password yang kamu masukkan salah !');
						redirect('masuk');
					}
				} else {
					$this->Global_model->gagalNotify('ID Penggunamu belum diaktivasi !');
					redirect('masuk');
				}
			} else {
				// Tidak ada user yang valid
				$this->Global_model->gagalNotify('ID Pengguna tidak ditemukan !');
				redirect('masuk');
			}
		}
	}

	public function daftar()
	{
		// Check Login
		$this->Global_model->login_cek();

		if ($this->form_validation->run() == false) {
			$data['jk'] = $this->Global_model->getListJenisKelamin();
			$data['agama'] = $this->Global_model->getListAgama();
			$data['jenisDaftar'] = $this->Sekolah_model->getListjenisDaftar();
			$data['daftarSekolah'] = $this->Sekolah_model->getListSekolah();
			$data['judul'] = 'Daftar';
			$data['keterangan'] = $this->Global_model->getKeteranganApp();
			$this->load->view('templates/masuk-header', $data);
			$this->load->view('masuk/daftar', $data);
			$this->load->view('templates/masuk-footer', $data);
		} else {

			$status = $this->Daftar_model->captchaVerify();
			if ($status['success']) {
				$this->Daftar_model->santriDaftar();
				$this->Global_model->berhasilNotify('Selamat ! anda berhasil mendaftar. kami telah mengirimi pesan yang berisi tautan ke email anda untuk aktivasi akun. silahkan aktivasi terlebih dahulu agar bisa masuk dan melanjutkan ke tahap berikutnya.');
				redirect('masuk');
			} else {
				$this->Global_model->gagalNotify('Anda belum menyelesaikan captcha !');
				redirect('masuk/daftar');
			}
		}
	}

	public function lupapw()
	{
		// Check Login
		$this->Global_model->login_cek();

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Lupa Password';
			$data['keterangan'] = $this->Global_model->getKeteranganApp();
			$this->load->view('templates/masuk-header', $data);
			$this->load->view('masuk/lupa-pw');
			$this->load->view('templates/masuk-footer', $data);
		} else {
			$this->Global_model->gagalNotify('Email tidak terdaftar !');
			redirect('masuk/lupapw');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('sipp_userid');
		$this->session->unset_userdata('sipp_role_id');
		$this->session->unset_userdata('sipp_username');
		$this->Global_model->berhasilNotify('Kamu berhasil keluar');
		redirect('masuk');
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		// Validasi Email
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->Global_model->berhasilNotify('Akun telah diaktivasi, Silahkan masuk !');
					redirect('masuk');
				} else {

					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->Global_model->gagalNotify('Aktivasi akun gagal ! Token kadaluarsa');
					redirect('masuk');
				}
			} else {
				$this->Global_model->gagalNotify('Aktivasi akun gagal ! Token tidak valid');
				redirect('masuk');
			}
		} else {
			$this->Global_model->gagalNotify('Aktivasi akun gagal ! email tidak terdaftar');
			redirect('masuk');
		}
	}
}
