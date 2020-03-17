<?php
Class M_kelas Extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('kelas_siswa',$data);
    }

    public function tampil()
    {
        return $this->db->get_where('kelas_siswa')->result();
    
    }
    
    public function hapus_kelas($id)
    {
        $this->db->where('no_anggota',$id)->delete('kelas_siswa');
    }

    public function edit_kelas($id) //Untuk mengambil data data ditampilkan kedalalma modal bootstrap
    {
       return $this->db->query("SELECT * FROM kelas_siswa WHERE no_anggota='$id'")->result();
    }

    public function simpanEdit($data,$where)
    {
        $this->db->where($where)->update('kelas_siswa',$data);
    } 
}