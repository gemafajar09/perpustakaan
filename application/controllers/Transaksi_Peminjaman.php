<?php
Class Transaksi_Peminjaman Extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('template');
		$this->load->model('M_transaksi_peminjaman');
	}
 
	public function index()
	{
		$data['user'] =$this->db->GET_WHERE('pegawai',['username' => $this->session->userdata('username')])->row_array();
		$data['transaksi_peminjaman'] = $this->M_transaksi_peminjaman->tampil();
		$this->template->utama('transaksiPinjam/data_transaksi_Peminjaman',$data);
	}

	public function tambah_data()
	{
		$ta = $_POST['ta'];
		$no_anggota = $_POST['no_anggota'];
		$no_buku = $_POST['no_buku'];
		$tgl_pj = $_POST['tgl_pj'];
		$id_pegawai = $_POST['id_pegawai'];
		$data = array(
			'ta' => $ta,
			'no_anggota' => $no_anggota,
			'no_buku' => $no_buku,
			'tgl_pj' => $tgl_pj,
			'id_pegawai' => $id_pegawai
		);
		$this->M_transaksi_peminjaman->tambah($data);

		redirect('Transaksi_Peminjaman/index');
	}

	public function hapus($id)
	{
		$this->M_transaksi_peminjaman->hapus_transaksi_peminjaman($id);
		redirect('Transaksi_Peminjaman/index');
	}

	public function cariSiswa()
	{
		$no = $_POST['no_anggota'];
		echo json_encode($this->M_transaksi_peminjaman->cariSiswa($no));
	}

	public function edit()
	{
		$id = $this->input->post('id_transaksi');
		echo json_encode($this->M_transaksi_peminjaman->edit_transaksi_peminjaman($id));
	}

	public function simpan_edit()
	{
		$id_transaksi = $this->input->post('id_transaksi');
		$ta = $this->input->post('ta');
		$no_anggota = $this->input->post('no_anggota');
		$no_buku = $this->input->post('no_buku');
		$tgl_pj = $this->input->post('tgl_pj');
		$id_pegawai = $this->input->post('id_pegawai');
		$data = array(
			'ta' => $ta,
			'no_anggota' => $no_anggota,
			'no_buku' => $no_buku,
			'tgl_pj' => $tgl_pj,
			'id_pegawai' => $id_pegawai
		);
		$where = array(
			'id_transaksi' => $id_transaksi,);
		$this->M_transaksi_peminjaman->simpanEdit($data,$where);

		redirect('Transaksi_Peminjaman/index');
	}
}