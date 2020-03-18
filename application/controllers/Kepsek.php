<?php
Class Kepsek Extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
		$this->load->model('M_kepsek');
	}

	public function index()
	{
		$data['user'] =$this->db->GET_WHERE('kepsek',['username' => $this->session->userdata('username')])->row_array();
		$data['kepsek'] = $this->M_kepsek->tampil();
		$this->template->utama('kepsek/data_kepsek',$data);
	}

		public function tambah_data()
	{
		$id_kepsek = $this->input->post('id_kepsek');
		$nama_kepsek = $this->input->post('nama_kepsek');
		$jabatan = $this->input->post('jabatan');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass = password_hash($password, PASSWORD_DEFAULT);

		$data = array(
			'id_kepsek' => $id_kepsek,
			'nama_kepsek' => $nama_kepsek,
			'jabatan' => $jabatan,
			'username' => $username,
			'password' => $pass
		);
		$this->M_kepsek->tambah($data);

		redirect('Kepsek/index');
	}

	public function hapus($id)
	{
		$this->M_kepsek->hapus_kepsek($id);
		redirect('Kepsek/index');
	}

	public function edit()
	{
		$id = $this->input->post('id_kepsek');
		echo json_encode($this->M_kepsek->edit_kepsek($id));
	}

	public function simpan_edit()
	{
		$id_kepsek = $this->input->post('id_kepsek');
		$nama_kepsek = $this->input->post('nama_kepsek');
		$jabatan = $this->input->post('jabatan');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass = password_hash($password, PASSWORD_DEFAULT);

		$data = array(
			'nama_kepsek' => $nama_kepsek,
			'jabatan' => $jabatan,
			'username' => $username,
			'password' => $pass
		);
		$where = array(
			'id_kepsek' => $id_kepsek,);
		$this->M_kepsek->simpanEdit($data,$where);

		redirect('Kepsek/index');
	}
} 