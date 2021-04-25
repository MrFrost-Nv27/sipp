<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sekolah_model');
		$this->load->model('Daftar_model');
	}

	public function index()
	{
		// Check Login
		cek_mt();
		$this->Global_model->login_cek();

		$data['judul'] = 'Masuk';
		$data['keterangan'] = $this->Global_model->getKeteranganApp();
		$this->load->view('templates/masuk-header', $data);
		$this->load->view('masuk/index');
		$this->load->view('templates/masuk-footer', $data);
		$this->load->view('script/masuk');
	}

	public function daftar()
	{
		// Check Login
		cek_mt();
		$this->Global_model->login_cek();

		$data['judul'] = 'Daftar';
		$data['keterangan'] = $this->Global_model->getKeteranganApp();
		$data['jk'] = $this->Global_model->getListJenisKelamin();
		$this->load->view('templates/masuk-header', $data);
		$this->load->view('masuk/daftar');
		$this->load->view('templates/masuk-footer', $data);
		$this->load->view('script/masuk');
	}

	public function logindong()
	{
		if ($this->input->post('username')) {
			$data = [
				'userid' => $this->input->post('username'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			];

			$user = $this->db->get_where('user', ['userid' => $data['userid']])->row_array();

			// Jika usernya ada
			if ($user) {
				// Cek Password
				if (password_verify($data['password'], $user['password'])) {
					// if ($password == $user['password']) {
					$data = [
						'sipp_userid' => $user['id'],
						'sipp_username' => $user['username'],
						'sipp_role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					// redirect('login_gate');
					$res = [
						'status' => 'logindone',
						'csrf' => $this->security->get_csrf_hash()
					];
					echo json_encode($res);
				} else {
					// $this->Global_model->gagalNotify('Password yang kamu masukkan salah !');
					$res = [
						'status' => 'password!!!',
						'csrf' => $this->security->get_csrf_hash()
					];
					echo json_encode($res);
				}
			} else {
				$user = $this->db->get_where('user', ['username' => $data['username']])->row_array();
				if ($user) {
					// Cek Password
					if (password_verify($data['password'], $user['password'])) {
						// if ($password == $user['password']) {
						$data = [
							'sipp_userid' => $user['id'],
							'sipp_username' => $user['username'],
							'sipp_role_id' => $user['role_id']
						];
						$this->session->set_userdata($data);
						// $this->Global_model->login_gate();
						$res = [
							'status' => 'logindone',
							'csrf' => $this->security->get_csrf_hash()
						];
						echo json_encode($res);
					} else {
						// $this->Global_model->gagalNotify('Password yang kamu masukkan salah !');
						$res = [
							'status' => 'password!!!',
							'csrf' => $this->security->get_csrf_hash()
						];
						echo json_encode($res);
					}
				} else {
					// Tidak ada user yang valid
					// return $this->Global_model->gagalNotify('ID Pengguna tidak ditemukan !');
					$res = [
						'status' => 'akun!!!',
						'csrf' => $this->security->get_csrf_hash()
					];
					echo json_encode($res);
				}
			}
		} else {
			echo 'Hayo mau ngapain :v';
		}
	}

	public function daftardong()
	{
		if ($this->input->post('nama')) {
			$useridacak = random_string('numeric', 10);
			$id = $this->db->get('santri')->num_rows();
			if ($id == 0) {
				$id = 1;
			} else {
				$this->db->select_max('id');
				$id = $this->db->get('santri')->row_array();
				$id = $id['id'];
				$id++;
			}
			$idppdb = 'ppdb' . 2021 . $id;

			$nohp = htmlspecialchars($this->input->post('nohp', true));
			if (substr($nohp, 0, 1) == 0) {
				$nohp = substr($nohp, 1);
			}
			$nohpfixed = 62 . $nohp;

			$password = htmlspecialchars($this->input->post('password', true));
			$password = password_hash($password, PASSWORD_DEFAULT);

			$datatoken = $this->Global_model->genToken();

			// Data santri
			$data = [
				'userid' => $useridacak,
				'id_santri' => $id,
				'idppdb' => $idppdb,
				'nama' => ucwords(strtolower(((htmlspecialchars($this->input->post('nama', true)))))),
				'password' => $password,
				'nohp' => $nohpfixed,
				'email' => htmlspecialchars($this->input->post('email', true)),
				'jk' => $this->input->post('jk', true),
				'role_id' => 7,
				'token' => $datatoken['token'],
				'kode' => $datatoken['kode'],
				'date_created' => time()
			];

			$cekuser = [
				'nohp' => $this->db->get_where('santri', ['no_hp' => $data['nohp']])->row_array(),
				'email' => $this->db->get_where('user', ['email' => $data['email']])->row_array()
			];

			$wa = $this->Global_model->getRapiwhaApikey();
			$res = [
				'csrf' => $this->security->get_csrf_hash(),
				'apikey' => $wa['rapiwha_apikey'],
				'nohp' => $nohpfixed,
				'message' => $this->Email_model->daftarWA($data)
			];

			if ($cekuser['nohp']) {
				$res['status'] = 'nohp!!!';
				echo json_encode($res);
			} else if ($cekuser['email']) {
				$res['status'] = 'email!!!';
				echo json_encode($res);
			} else {
				// Kirim Email
				$mailing = [
					'email_to' => htmlspecialchars($this->input->post('email', true)),
					'email_subjek' => "Registrasi Santri",
					'email_body' => $this->Email_model->daftar($data)
				];

				$this->Global_model->sendEmail($mailing);
				$tambahuser = [
					'userid' => $data['userid'],
					'username' => $data['idppdb'],
					'email' => $data['email'],
					'password' => $data['password'],
					'role_id' => $data['role_id'],
					'date_created' => time()
				];

				$tambahsantri = [
					'id' => $data['id_santri'],
					'nama' => $data['nama'],
					'jnskelamin' => $data['jk'],
					'no_hp' => $data['nohp'],
					'nomor_daftar' => $data['idppdb'],
					'pasfoto' => "7_" . $data['jk'] . ".png"
				];

				$tambahsantriakademik = [
					'id_santri' => $data['id_santri']
				];

				$tambahtoken = [
					'email' => $data['email'],
					'nohp' => $data['nohp'],
					'token' => $data['token'],
					'kode' => $data['kode'],
					'date_created' => time()
				];

				$tableuser = $this->User_model->tambahDataUser($tambahuser);
				$this->Santri_model->tambahDataSantri($tambahsantri, $tambahsantriakademik);
				$this->Global_model->insertToken($tambahtoken);


				if ($tableuser == true) {
					$user = $this->db->get_where('user', ['username' => $data['idppdb']])->row_array();
					$tambahsession = [
						'sipp_userid' => $user['id'],
						'sipp_username' => $data['idppdb'],
						'sipp_role_id' => $data['role_id']
					];
					$this->session->set_userdata($tambahsession);
				}

				echo json_encode($res);
			}
		} else {
			echo 'Hayo mau ngapain :v Nakal yah';
		}
	}

	public function lupapw()
	{
		cek_mt();
		// Check Login
		$this->Global_model->login_cek();

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Lupa Password';
			$data['keterangan'] = $this->Global_model->getKeteranganApp();
			$this->load->view('templates/masuk-header', $data);
			$this->load->view('masuk/lupa-pw');
			$this->load->view('templates/masuk-footer', $data);
			$this->load->view('script/masuk');
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
		cek_mt();
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

	public function pageactv()
	{
		cek_mt();

		if ($this->session->userdata('sipp_userid')) {
			$user = $this->db->get_where('user', ['id' => $this->session->userdata('sipp_userid')])->row_array();

			if ($user['is_active'] == 0) {
				$data = [
					'judul' => 'Aktivasi Akun',
					'keterangan' => $this->Global_model->getKeteranganApp(),
					'user' => $this->User_model->getDataUser('email', $user['email'])
				];
				$this->load->view('templates/masuk-header', $data);
				$this->load->view('masuk/aktivasi');
				$this->load->view('templates/masuk-footer');
				$this->load->view('script/masuk');
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	}

	public function actvcode()
	{
		$user = $this->db->get_where('user', ['id' => $this->session->userdata('sipp_userid')])->row_array();

		$token = $this->input->post('kode');
		$user_token = $this->db->get_where('user_token', ['email' => $user['email']])->row_array();

		if ($user_token['kode'] == $token) {
			$this->User_model->aktivasiAkun($user['id']);
			$this->db->delete('user_token', ['email' => $user_token['email']]);

			$res = [
				'csrf' => $this->security->get_csrf_hash(),
				'status' => 'pada'
			];

			echo json_encode($res);
		} else {
			$res = [
				'csrf' => $this->security->get_csrf_hash(),
				'status' => 'sejen!!!'
			];

			echo json_encode($res);
		}
	}

	public function pagesignin()
	{
		$data['judul'] = 'Masuk';
		$this->load->view('masuk/index', $data);
		$this->load->view('script/masuk');
	}

	public function pagesignup()
	{
		$data['jk'] = $this->Global_model->getListJenisKelamin();
		$data['judul'] = 'Daftar';
		$this->load->view('masuk/daftar', $data);
		$this->load->view('script/masuk');
	}

	public function pageforget()
	{
		// id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
		$id = $this->input->post('id');

		$data['datapermahasiswa'] = $this->datamahasiswa_model->datamahasiswaedit($id);
		$this->load->view('formeditmhs', $data);
	}
}
