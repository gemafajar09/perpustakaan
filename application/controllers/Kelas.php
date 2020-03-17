<?php
Class Kelas Extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
		$this->load->model('M_kelas');
	}

	public function index()
	{
		$data['user'] =$this->db->GET_WHERE('pegawai',['username' => $this->session->userdata('username')])->row_array();
		$data['kelas'] = $this->M_kelas->tampil();
		$this->template->utama('kelas/data_kelas',$data);
	}

	public function tambah_data()
	{
		$no_anggota = $this->input->post('no_anggota');
		$ta = $this->input->post('ta');
		$kelas = $this->input->post('kelas');
		$data = array(
			'no_anggota' => $no_anggota,
			'ta' => $ta,
			'kelas' => $kelas
		);
		$this->M_kelas->tambah($data);

		redirect('Kelas/index');
	}

	public function hapus($id)
	{
		$this->M_kelas->hapus_kelas($id);
		redirect('Kelas/index');
	}

	public function edit()
	{
		$id = $this->input->post('no_anggota');
		echo json_encode($this->M_kelas->edit_kelas($id));
	}

	public function simpan_edit()
	{
		$no_anggota = $this->input->post('no_anggota');
		$ta = $this->input->post('ta');
		$kelas = $this->input->post('kelas');
		$data = array(
			'no_anggota' => $no_anggota,
			'ta' => $ta,
			'kelas' => $kelas
		);
		$where = array(
			'no_anggota' => $no_anggota,);
		$this->M_kelas->simpanEdit($data,$where);

		redirect('Kelas/index');
	}
}