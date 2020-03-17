<?php
Class Sangsi Extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
		$this->load->model('M_sangsi');
	}

	public function index()
	{
		//$data['user'] =$this->db->GET_WHERE('sangsi',['username' => $this->session->userdata('username')])->row_array();
		$data['sangsi'] = $this->M_sangsi->tampil();
		$this->template->utama('sangsi/data_sangsi',$data);
	}

	public function tambah_data()
	{
		$id_pelanggaran = $this->input->post('id_pelanggaran');
		$sangsi = $this->input->post('sangsi');
		$data = array(
			'id_pelanggaran' => $id_pelanggaran,
			'sangsi' => $sangsi
		);
		$this->M_sangsi->tambah($data);

		redirect('Sangsi/index');
	}

	public function hapus($id)
	{
		$this->M_sangsi->hapus_sangsi($id);
		redirect('Sangsi/index');
	}

	public function edit()
	{
		$id = $this->input->post('id_pelanggaran');
		echo json_encode($this->M_kelas->edit_sangsi($id));
	}

	public function simpan_edit()
	{
		$id_pelanggaran = $this->input->post('id_pelanggaran');
		$sangsi = $this->input->post('sangsi');
		$data = array(
			'id_pelanggaran' => $id_pelanggaran,
			'sangsi' => $sangsi
		);
		$where = array(
			'id_pelanggaran' => $id_pelanggaran,);
		$this->M_sangsi->simpanEdit($data,$where);

		redirect('Sangsi/index');
	}
}