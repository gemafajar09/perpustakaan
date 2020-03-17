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

    public function simpanEditK($data,$where)
    {
        $this->db->where($where)->update('transaksi_pengembalian',$data);
    } 

    public function cariAnggota($id)
    {
        return $this->db->query("SELECT * FROM transaksi_peminjaman WHERE no_anggota='$id'")->result();
    }

    public function sangsiBuku($pinjam,$kembali,$buku,$id)
    {
        $data =  $this->db->query("SELECT * FROM transaksi_peminjaman WHERE id_transaksi='$id'")->result();
        $buku = $this->db->query("SELECT * FROM buku WHERE no_buku='$buku'")->result();
        $pinjam = explode('-',$pinjam);
        $tahun1 = $pinjam[0];
        $bulan1 = $pinjam[1];
        $hari1 = $pinjam[2];
        $kembali = new eplode('-',$kembali);
        $tahun2 = $kembali[0];
        $bulan2 = $kembali[1];
        $hari2 = $kembali[2];
        $hasilTahun = $tahun2 - $tahun1;
        $hasilBulan = $bulan2 - $bulan1;
        if($buku[0]->kategori != 'Buku Mata Pelajaran' )
        {
            if(isset($hasilTahun))
            {
                $tahun = $hasilTahun * 365;
            }
            if(isset($hasilBulan))
            {
                $bulan = $hasilBulan * 30;
            } 
            $hitungHari1 = $tahun + $bulan + $hari1;
            $hitungHari2 = $tahun + $bulan + $hari2;
            $hasilPenjumlahan = $hitungHari2 - $hitungHari1;
            if($hasilPenjumlahan >= 7)
            {
                return $denda = $hasilPenjumlahan * 500;
            }else{
                return $denda = 0;
            }
        }
    }
}