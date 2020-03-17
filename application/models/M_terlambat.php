<?php
Class M_terlambat Extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('terlambat',$data);
    }

    public function tampil()
    {
        return $this->db->get_where('terlambat')->result();
    
    }
    
    public function hapus_terlambat($id)
    {
        $this->db->where('id_terlambat',$id)->delete('terlambat');
    }

    public function edit_terlambat($id) //Untuk mengambil data data ditampilkan kedalalma modal bootstrap
    {
       return $this->db->query("SELECT * FROM terlambat WHERE id_terlambat='$id'")->result();
    }

    public function simpanEdit($data,$where)
    {
        $this->db->where($where)->update('terlambat',$data);
    } 
} 