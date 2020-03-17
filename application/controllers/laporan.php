<?php
Class laporan Extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
    }

    public function index()
    {
        $data['user'] =$this->db->GET_WHERE('pegawai',['username' => $this->session->userdata('username')])->row_array();
        $this->template->utama('laporan/laporan_peminjaman',$data);
    } 
}