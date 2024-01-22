<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sekolah_model');
		$this->load->model('Daftar_model');
		cek_mt();
	}

	public function index()
	{
		$data = [
			'judul' => 'Email Verify',
			'nama' => 'Nova Adi Saputra',
			'idppdb' => 'ppdb20211',
			'kode' => 123456,
			'pass' => 'katasandi123'
		];
		$data['html'] = $this->Email_model->daftar($data);
		$this->load->view('email/index', $data);
	}

	public function wa()
	{
		$data = [
			'nama' => 'Nova Adi Saputra',
			'idppdb' => 'ppdb20211',
			'kode' => 123456,
			'pass' => 'katasandi123'
		];
		$data['html'] = $this->Email_model->daftarWA($data);
		$this->load->view('email/daftarwa', $data);
	}
}
