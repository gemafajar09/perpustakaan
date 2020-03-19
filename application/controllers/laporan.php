<?php
class laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('template');
    $this->load->model('M_laporan');
  }

  public function index()
  {
    $data['user'] = $this->db->GET_WHERE('siswa', ['username' => $this->session->userdata('username')])->row_array();
    if ($this->session->userdata('level') == "super") {
      $data['laporan'] = $this->M_laporan->tampil();
    } else {
      $data['laporan'] = $this->M_laporan->tampilLogin($data['user']['no_anggota']);
    }

    $this->template->utama('laporan/laporan_peminjaman', $data);
  }
}
