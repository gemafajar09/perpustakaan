<?php
Class Pegawai Extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
		$this->load->model('M_pegawai');
	}

	public function index()
	{
		$data['user'] =$this->db->GET_WHERE('pegawai',['username' => $this->session->userdata('username')])->row_array();
		$data['pegawaii'] = $this->M_pegawai->tampil();
		$this->template->utama('pegawaii/data_pegawai',$data);
	}

	public function tambah_data()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_pegawai = $this->input->post('nama_pegawai');
		$jabatan = $this->input->post('jabatan');
		$username = $this->input->post('username');
		$data = array(
			'id_pegawai' => $id_pegawai,
			'nama_pegawai' => $nama_pegawai,
			'jabatan' => $jabatan,
			'username' => $username
		);
		$this->M_pegawai->tambah($data);

		redirect('Pegawai/index');
	}

	public function hapus($id)
	{
		$this->M_pegawai->hapus_pegawai($id);
		redirect('Pegawai/index');
	}

	public function edit()
	{
		$id = $this->input->post('id_pegawai');
		echo json_encode($this->M_pegawai->edit_pegawai($id));
	}

	public function simpan_edit()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_pegawai = $this->input->post('nama_pegawai');
		$jabatan = $this->input->post('jabatan');
		$username = $this->input->post('username');
		$data = array(
			'nama_pegawai' => $nama_pegawai,
			'jabatan' => $jabatan,
			'username' => $username
		);
		$where = array(
			'id_pegawai' => $id_pegawai,);
		$this->M_pegawai->simpanEdit($data,$where);

		redirect('Pegawai/index');
	}
}