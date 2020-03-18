<?php
Class M_kepsek Extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('kepsek',$data);
    }

    public function tampil()
    {
        return $this->db->get_where('kepsek')->result();
    
    } 
    
    public function hapus_kepsek($id)
    {
        $this->db->where('id_kepsek',$id)->delete('kepsek');
    }

    public function edit_kepsek($id) //Untuk mengambil data data ditampilkan kedalalma modal bootstrap
    {
       return $this->db->query("SELECT * FROM kepsek WHERE id_kepsek='$id'")->result();
    }

    public function simpanEdit($data,$where)
    {
        $this->db->where($where)->update('kepsek',$data);
    } 
}