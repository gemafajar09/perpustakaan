<?php
Class Buku Extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
		$this->load->model('M_buku');
	}

	public function index()
	{
		$data['user'] = $this->db->GET_WHERE('pegawai',['username' => $this->session->userdata('username')])->row_array();
		$data['buku'] = $this->M_buku->tampil();
		$this->template->utama('buku/data_buku',$data);
	}

	public function tambah_data()
	{
		$no_buku = $this->input->post('no_buku');
		$judul_buku = $this->input->post('judul_buku');
		$pengarang = $this->input->post('pengarang');
		$kategori = $this->input->post('kategori');
		$data = array(
			'no_buku' => $no_buku,
			'judul_buku' => $judul_buku,
			'pengarang' => $pengarang,
			'kategori' => $kategori
		);
		$this->M_buku->tambah($data);

		redirect('Buku/index');

	}

	public function hapus($id)
	{
		$this->M_buku->hapus_buku($id);
		redirect('Buku/index');
	}

	public function edit()
	{
		$id = $this->input->post('no_buku');
		echo json_encode($this->M_buku->edit_buku($id));
	}

	public function simpan_edit()
	{
		$no_buku = $this->input->post('no_buku');
		$judul_buku = $this->input->post('judul_buku');
		$pengarang = $this->input->post('pengarang');
		$kategori = $this->input->post('kategori');
		$data = array(
			'judul_buku' => $judul_buku,
			'pengarang' => $pengarang,
			'kategori' => $kategori
		);
		$where = array(
			'no_buku' => $no_buku,);
		$this->M_buku->simpanEdit($data,$where);

		redirect('Buku/index');
	}
}