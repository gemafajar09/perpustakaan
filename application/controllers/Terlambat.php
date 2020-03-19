<?php
class Terlambat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
		$this->load->model('M_terlambat');
	}

	public function index()
	{
		$data['user'] = $this->db->GET_WHERE('pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->template->utama('terlambat/data_terlambat', $data);
	}

	public function tambah_data()
	{
		$id_terlambat = $this->input->post('id_terlambat');
		$no_anggota = $this->input->post('no_anggota');
		$tgl_pj = $this->input->post('tgl_pj');
		$no_buku = $this->input->post('no_buku');
		$tgl_pg = $this->input->post('tgl_pg');
		$id_pelanggaran = $this->input->post('id_pelanggaran');
		$id_pegawai = $this->input->post('id_pegawai');
		$data = array(
			'id_terlambat' => $id_terlambat,
			'no_anggota' => $no_anggota,
			'tgl_pj' => $tgl_pj,
			'no_buku' => $no_buku,
			'tgl_pg' => $tgl_pg,
			'id_pelanggaran' => $id_pelanggaran,
			'id_pegawai' => $id_pegawai
		);
		$this->M_terlambat->tambah($data);

		redirect('Terlambat/index');
	}

	public function hapus($id)
	{
		$this->M_terlambat->hapus_terlambat($id);
		redirect('Terlambat/index');
	}

	public function edit()
	{
		$id = $this->input->post('id_terlambat');
		echo json_encode($this->M_terlambat->edit_terlambat($id));
	}

	public function simpan_edit()
	{
		$id_terlambat = $this->input->post('id_terlambat');
		$no_anggota = $this->input->post('no_anggota');
		$tgl_pj = $this->input->post('tgl_pj');
		$no_buku = $this->input->post('no_buku');
		$tgl_pg = $this->input->post('tgl_pg');
		$id_pelanggaran = $this->input->post('id_pelanggaran');
		$id_pegawai = $this->input->post('id_pegawai');
		$data = array(
			'no_anggota' => $no_anggota,
			'tgl_pj' => $tgl_pj,
			'no_buku' => $no_buku,
			'tgl_pg' => $tgl_pg,
			'id_pelanggaran' => $id_pelanggaran,
			'id_pegawai' => $id_pegawai
		);
		$where = array(
			'id_terlambat' => $id_terlambat,
		);
		$this->M_terlambat->simpanEdit($data, $where);

		redirect('Terlambat/index');
	}

	public function dataTerlambat()
	{
		$jenis = $_POST['jenis'];
		$data = $this->db->query("SELECT * FROM transaksi_peminjaman a LEFT JOIN buku b ON a.no_buku=b.no_buku WHERE b.kategori='$jenis'")->result();
		foreach ($data as $i => $data) {
			if ($data->kategori == 'Buku Pelajaran Umum') {
				$tanggal = explode('-', $data->tgl_pj);
				$tanggalSekarang = date('Y-m-d');
				$tahunP = $tanggal[0];
				$bulanP = $tanggal[1];
				$hariP = $tanggal[2];
				// ==============
				$tahunS = $tanggalSekarang[0];
				$bulanS = $tanggalSekarang[1];
				$hariS = $tanggalSekarang[2];
				$hasilTahun = $tahunS - $tahunP;
				$hasilBulan = $bulanS - $bulanP;
				$hasilHari = $hariS - $hariP;
				if ($hasilTahun > 0) {
					$jumlahTahun = $hasilTahun * 365;
				} else {
					$jumlahTahun = 0;
				}
				// ==============
				if ($hasilBulan > 0) {
					$jumlahBulan = $hasilBulan * 30;
				} else {
					$jumlahBulan = 0;
				}
				$hariPinjam = $jumlahTahun + $jumlahBulan + $hasilHari;
				if ($hariPinjam >= 14) {
					echo "
					<tr>
						<td>" . $data->no_anggota . "</td>
						<td>" . $data->tgl_pj . "</td>
						<td>" . $data->no_buku . "</td>
						<td>" . $data->id_pegawai . "</td>
						<td>
							<button type='button' class='btn btn-primary' onclick='edit('" . $data->id_transaksi . "')'>Edit</button>
							<a href='" . base_url('Terlambat/hapus/' . $data->id_transaksi) . "' class='btn btn-danger'>hapus</a>
						</td>
					</tr>
					";
				} else {
				}
			} elseif ($data->kategori == 'Buku Mata Pelajaran') {
				$tanggal = explode('-', $data->tgl_pj);
				$tanggalSekarang = date('Y-m-d');
				$tahunP = $tanggal[0];
				$bulanP = $tanggal[1];
				$hariP = $tanggal[2];
				// ==============
				$tahunS = $tanggalSekarang[0];
				$bulanS = $tanggalSekarang[1];
				$hariS = $tanggalSekarang[2];
				$hasilTahun = $tahunS - $tahunP;
				$hasilBulan = $bulanS - $bulanP;
				$hasilHari = $hariS - $hariP;
				if ($hasilTahun > 0) {
					$jumlahTahun = $hasilTahun * 365;
				} else {
					$jumlahTahun = 0;
				}
				// ==============
				if ($hasilBulan > 0) {
					$jumlahBulan = $hasilBulan * 30;
				} else {
					$jumlahBulan = 0;
				}
				$hariPinjam = $jumlahTahun + $jumlahBulan + $hasilHari;
				if ($hariPinjam >= 150) {
					echo "
					<tr>
						<td>" . $data->no_anggota . "</td>
						<td>" . $data->tgl_pj . "</td>
						<td>" . $data->no_buku . "</td>
						<td>" . $data->id_pegawai . "</td>
						<td>
							<button type='button' class='btn btn-primary' onclick='edit('" . $data->id_transaksi . "')'>Edit</button>
							<a href='" . base_url('Terlambat/hapus/' . $data->id_transaksi) . "' class='btn btn-danger'>hapus</a>
						</td>
					</tr>
					";
				} else {
				}
			}
		}
	}
}
