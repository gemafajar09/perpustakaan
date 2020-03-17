<?php
Class Terlambat Extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
		$this->load->model('M_terlambat');
	}

	public function index()
	{
	//	$data['user'] =$this->db->GET_WHERE('pegawai',['username' => $this->session->userdata('username')])->row_array();
		$data['terlambat'] = $this->M_terlambat->tampil();
		$this->template->utama('terlambat/data_terlambat',$data);
	}

	public function tambah_data()
	{
		$id_terlambat = $this->input->post('id_terlambat');
		$no_anggota = $this->input->post('no_anggota');
		$tgl_pj = $this->input->post('tgl_pj');
		$no_buku = $this->input->post('no_buku');
		$tgl_pg = $this->input->post('tgl_pg');
		$id_pelanggaran = $this->input->post('id_pelanggaran');
		$id_pegawai = $this->input->post('id_pegawai');
		$data = array(
			'id_terlambat' => $id_terlambat,
			'no_anggota' => $no_anggota,
			'tgl_pj' => $tgl_pj,
			'no_buku' => $no_buku,
			'tgl_pg' => $tgl_pg,
			'id_pelanggaran' => $id_pelanggaran,
			'id_pegawai' => $id_pegawai
		);
		$this->M_terlambat->tambah($data);

		redirect('Terlambat/index');
	}

	public function hapus($id)
	{
		$this->M_terlambat->hapus_terlambat($id);
		redirect('Terlambat/index');
	}

	public function edit()
	{
		$id = $this->input->post('id_terlambat');
		echo json_encode($this->M_terlambat->edit_terlambat($id));
	}

	public function simpan_edit()
	{
		$id_terlambat = $this->input->post('id_terlambat');
		$no_anggota = $this->input->post('no_anggota');
		$tgl_pj = $this->input->post('tgl_pj');
		$no_buku = $this->input->post('no_buku');
		$tgl_pg = $this->input->post('tgl_pg');
		$id_pelanggaran = $this->input->post('id_pelanggaran');
		$id_pegawai = $this->input->post('id_pegawai');
		$data = array(
			'no_anggota' => $no_anggota,
			'tgl_pj' => $tgl_pj,
			'no_buku' => $no_buku,
			'tgl_pg' => $tgl_pg,
			'id_pelanggaran' => $id_pelanggaran,
			'id_pegawai' => $id_pegawai
		);
		$where = array(
			'id_terlambat' => $id_terlambat,);
		$this->M_terlambat->simpanEdit($data,$where);

		redirect('Terlambat/index');
	}
}