<?php
Class M_siswa Extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('siswa',$data);
    }

    public function tampil()
    {
        return $this->db->get_where('siswa')->result();
    
    }
    
    public function hapus_siswa($id)
    {
        $this->db->where('no_anggota',$id)->delete('siswa');
    }

    public function edit_siswa($id) //Untuk mengambil data data ditampilkan kedalalma modal bootstrap
    {
       return $this->db->query("SELECT * FROM siswa WHERE no_anggota='$id'")->result();
    }

    public function simpanEdit($data,$where)
    {
        $this->db->where($where)->update('siswa',$data);
    } 
}