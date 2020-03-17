<?php
Class Kunjungan Extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
		$this->load->model('M_kunjungan');
	}

	public function index()
	{
		$data['user'] =$this->db->GET_WHERE('Pegawai',['username' => $this->session->userdata('username')])->row_array();
		$data['kunjungan'] = $this->M_kunjungan->tampil();
		$this->template->utama('kunjungan/data_kunjungan',$data);
	}

	public function tambah_data()
	{
		$tgl_kunjungan = $this->input->post('tgl_kunjungan');
		$no_anggota = $this->input->post('no_anggota');
		$kelas = $this->input->post('kelas');
		$id_pegawai = $this->input->post('id_pegawai');
		$data = array(
			'tgl_kunjungan' => $tgl_kunjungan,
			'no_anggota' => $no_anggota,
			'kelas' => $kelas,
			'id_pegawai' => $id_pegawai
		);
		$this->M_kunjungan->tambah($data);

		redirect('Kunjungan/index');
	}

	public function hapus($id)
	{
		$this->M_kunjungan->hapus_kunjungan($id);
		redirect('Kunjungan/index');
	}
	public function edit()
	{
		$id = $this->input->post('no_anggota');
		echo json_encode($this->M_kunjungan->edit_kunjungan($id));
	}

	public function simpan_edit()
	{
		$tgl_kunjungan = $this->input->post('tgl_kunjungan');
		$no_anggota = $this->input->post('no_anggota');
		$kelas = $this->input->post('kelas');
		$id_pegawai= $this->input->post('id_pegawai');
		$data = array(
			'tgl_kunjungan' => $tgl_kunjungan,
			'no_anggota' => $no_anggota,
			'kelas' => $kelas,
			'id_pegawai' => $id_pegawai,
		);
		$where = array(
			'no_anggota' => $no_anggota,);
		$this->M_kunjungan->simpanEdit($data,$where);

		redirect('Kunjungan/index');
	}
}