<?php
Class M_kunjungan Extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('kunjungan',$data);
    }

    public function tampil()
    {
        return $this->db->get_where('kunjungan')->result();
    
    }
    
    public function hapus_kunjungan($id)
    {
        $this->db->where('no_anggota',$id)->delete('kunjungan');
    }

    public function edit_kunjungan($id) //Untuk mengambil data data ditampilkan kedalalma modal bootstrap
    {
       return $this->db->query("SELECT * FROM kunjungan WHERE tgl_kunjungan='$id'")->result();
    }

    public function simpanEdit($data,$where)
    {
        $this->db->where($where)->update('kunjungan',$data);
    } 
}