<?php
Class M_admin Extends CI_Model
{
	public function daftar($a,$b,$c,$d,$e)
	{
		$this->db->query("INSERT INTO `pegawai`(`id_pegawai`, `nama_pegawai`, `jabatan`, `username`, `password`) VALUES ('$a','$b','$c','$d','$e')");
	}
}