<?php
Class Transaksi_Pengembalian Extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
		
		$this->load->model('M_transaksi_peminjaman','kembali');
	}

	public function index()
	{
		$data['user'] =$this->db->GET_WHERE('pegawai',['username' => $this->session->userdata('username')])->row_array();
		$data['transaksi_pengembalian'] = $this->kembali->tampilK();
		$this->template->utama('transaksi_pengembalian/data_transaksi_pengembalian',$data);
	}

	public function tambah_data()
	{
		$ta = $this->input->post('ta');
		$no_anggota = $this->input->post('no_anggota');
		$no_buku = $this->input->post('no_buku');
		$tgl_pg = $this->input->post('tgl_pg');
		$id_pegawai = $this->input->post('id_pegawai');
		$data = array(
			'ta' => $ta,
			'no_anggota' => $no_anggota,
			'no_buku' => $no_buku,
			'tgl_pg' => $tgl_pg,
			'id_pegawai' => $id_pegawai
		);
		$this->kembali->tambahK($data);

		redirect('Transaksi_Pengembalian/index');
	}

	public function hapus($id)
	{
		$this->kembali->hapus_transaksi_pengembalian($id);
		redirect('Transaksi_Pengembalian/index');
	}

	public function edit()
	{
		$id = $this->input->post('id_transaksi');
		echo json_encode($this->kembali->edit_transaksi_pengembalian($id));
	}

	public function simpan_edit()
	{
		$id_transaksi = $this->input->post('id_transaksi');
		$ta = $this->input->post('ta');
		$no_anggota = $this->input->post('no_anggota');
		$no_buku = $this->input->post('no_buku');
		$tgl_pg = $this->input->post('tgl_pg');
		$id_pegawai = $this->input->post('id_pegawai');
		$data = array(
			'ta' => $ta,
			'no_anggota' => $no_anggota,
			'no_buku' => $no_buku,
			'tgl_pg' => $tgl_pg,
			'id_pegawai' => $id_pegawai
		);
		$where = array(
			'id_transaksi' => $id_transaksi,);
		$this->kembali->simpanEditK($data,$where);

		redirect('Transaksi_Pengembalian/index');
	}

	public function cariAnggota()
	{
		$id_pinjam = $_POST['id_pinjam'];
		echo json_encode($this->kembali->cariAnggota($id_pinjam));
	}
}