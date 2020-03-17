<?php
Class Siswa Extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
		$this->load->model('M_siswa');
	}

	public function index()
	{
		$data['user'] =$this->db->GET_WHERE('pegawai',['username' => $this->session->userdata('username')])->row_array();
		$data['siswa'] = $this->M_siswa->tampil();
		$this->template->utama('siswa/data_siswa',$data);
	}

	public function tambah_data()
	{
		$no_anggota = $this->input->post('no_anggota');
		$nama_siswa = $this->input->post('nama_siswa');
		$no_hp = $this->input->post('no_hp');
		$password = $this->input->post('password');
		$username = $this->input->post('username');
		$pass = password_hash($password, PASSWORD_DEFAULT);

		$data = array(
			'no_anggota' => $no_anggota,
			'nama_siswa' => $nama_siswa,
			'no_hp' => $no_hp,
			'password' => $pass,
			'username' => $username
		);
		$this->M_siswa->tambah($data);

		redirect('Siswa/index');
	}

	public function hapus($id)
	{
		$this->M_siswa->hapus_siswa($id);
		redirect('Siswa/index');
	}

	public function edit()
	{
		$id = $this->input->post('no_anggota');
		echo json_encode($this->M_siswa->edit_siswa($id));
	}

	public function simpan_edit()
	{
		$no_anggota = $this->input->post('no_anggota');
		$nama_siswa = $this->input->post('nama_siswa');
		$no_hp = $this->input->post('no_hp');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass = password_hash($password, PASSWORD_DEFAULT);

		$data = array(
			'no_anggota' => $no_anggota,
			'nama_siswa' => $nama_siswa,
			'no_hp' => $no_hp,
			'password' => $pass,
			'username' => $username

		);
		$where = array(
			'no_anggota' => $no_anggota,);
		$this->M_siswa->simpanEdit($data,$where);

		redirect('Siswa/index');
	}
}