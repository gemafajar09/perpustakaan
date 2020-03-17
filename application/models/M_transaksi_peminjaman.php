<?php
Class M_transaksi_peminjaman Extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('transaksi_peminjaman',$data);
    }

    public function tampil()
    {
        return $this->db->get_where('transaksi_peminjaman')->result();
    
    }
    
    public function hapus_transaksi_peminjaman($id)
    {
        $this->db->where('id_transaksi',$id)->delete('transaksi_peminjaman');
    }

    public function edit_transaksi_peminjaman($id) //Untuk mengambil data data ditampilkan kedalalma modal bootstrap
    {
       return $this->db->query("SELECT * FROM transaksi_peminjaman WHERE id_transaksi='$id'")->result();
    }

    public function simpanEdit($data,$where)
    {
        $this->db->where($where)->update('transaksi_peminjaman',$data);
    } 

    // kembali

    public function tambahK($data)
    {
        $this->db->insert('transaksi_pengembalian',$data);
    }

    public function tampilK()
    {
        return $this->db->get_where('transaksi_pengembalian')->result();
    
    }
     
    public function hapus_transaksi_pengembalian($id)
    {
        $this->db->where('id_transaksi',$id)->delete('transaksi_pengembalian');
    }

    public function edit_transaksi_pengembalian($id) //Untuk mengambil data data ditampilkan kedalalma modal bootstrap
    {
       return $this->db->query("SELECT * FROM transaksi_pengembalian WHERE id_transaksi='$id'")->result();
    }

    public function cariSiswa($id)
    {
        return $this->db->query("SELECT * FROM kelas_siswa WHERE no_anggota='$id'")->result();
    }


    public function simpanEditK($data,$where)
    {
        $this->db->where($where)->update('transaksi_pengembalian',$data);
    } 

    public function cariAnggota($id)
    {
        return $this->db->query("SELECT a.*, b.* FROM transaksi_peminjaman a LEFT JOIN buku b ON a.no_buku=b.no_buku WHERE a.no_anggota='$id'")->result();
    }
}