<?php
Class M_buku Extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('buku',$data);
    }

    public function tampil()
    {
        return $this->db->get_where('buku')->result();
    
    }
    
    public function hapus_buku($id)
    {
        $this->db->where('no_buku',$id)->delete('buku');
    }

    public function edit_buku($id) //Untuk mengambil data data ditampilkan kedalalma modal bootstrap
    {
       return $this->db->query("SELECT * FROM buku WHERE no_buku='$id'")->result();
    }

    public function simpanEdit($data,$where)
    {
        $this->db->where($where)->update('buku',$data);
    } 
}