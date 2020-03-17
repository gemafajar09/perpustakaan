<?php
Class M_sangsi Extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('sangsi',$data);
    }

    public function tampil()
    {
        return $this->db->get_where('sangsi')->result();
    
    }
    
    public function hapus_sangsi($id)
    {
        $this->db->where('id_pelanggaran',$id)->delete('sangsi');
    }

    public function edit_sangsi($id) //Untuk mengambil data data ditampilkan kedalalma modal bootstrap
    {
       return $this->db->query("SELECT * FROM sangsi WHERE id_pelanggaran='$id'")->result();
    }

    public function simpanEdit($data,$where)
    {
        $this->db->where($where)->update('sangsi',$data);
    } 
}