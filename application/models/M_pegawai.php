<?php
Class M_pegawai Extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('pegawai',$data);
    }

    public function tampil()
    {
        return $this->db->get_where('pegawai')->result();
    
    } 
    
    public function hapus_pegawai($id)
    {
        $this->db->where('id_pegawai',$id)->delete('pegawai');
    }

    public function edit_pegawai($id) //Untuk mengambil data data ditampilkan kedalalma modal bootstrap
    {
       return $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$id'")->result();
    }

    public function simpanEdit($data,$where)
    {
        $this->db->where($where)->update('pegawai',$data);
    } 
}