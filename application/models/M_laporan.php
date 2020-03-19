<?php
class M_laporan extends CI_Model
{
    public function tampil($id = NULL)
    {
        $this->db->from('transaksi_pengembalian');
        $this->db->join('siswa', 'siswa.no_anggota = transaksi_pengembalian.no_anggota');
        $this->db->join('buku', 'buku.no_buku = transaksi_pengembalian.no_buku');
        if ($id != null) {
            $this->db->where('id_transaksi', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function tampilLogin($id)
    {
        $this->db->from('transaksi_pengembalian');
        $this->db->join('siswa', 'siswa.no_anggota = transaksi_pengembalian.no_anggota');
        $this->db->join('buku', 'buku.no_buku = transaksi_pengembalian.no_buku');
        if ($id != null) {
            $this->db->where('transaksi_pengembalian.no_anggota', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
