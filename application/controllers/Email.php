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
			'kode' => 123456
		];
		$data['html'] = $this->Email_model->daftar($data);
		$this->load->view('email/index', $data);
	}
}
