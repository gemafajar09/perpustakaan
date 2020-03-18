<div class="row">
	<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      Pengembalian Buku
    </div> 
    <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <table>
          <form action="<?= base_url('Transaksi_Pengembalian/tambah_data') ?>" method="POST">
          <thead>
            <tr>
              <td>No Anggota</td>
              <td>
                <input type="text" class="form-control" name="no_anggota" id="idAnggota" placeholder="no anggota">
                <input type="hidden" class="form-control" name="id" id="id">
              </td>
              <td>
                <button type="button" onclick="cariAnggota()" class="btn btn-success">Cari</button>
              </td>
              <td>No Buku</td>
              <td colspan="2">
                <input type="text" readonly id="no_buku" name="no_buku" class="form-control">
                <input type="hidden" readonly id="jenisBuku">
              </td>
            </tr>
            <tr>
              <td>Tahun Ajaran</td>
              <td colspan="2">
                <input type="text" name="ta" readonly id="ta" class="form-control">
              </td>
              <td>Tanggal Pengembalian</td>
              <td colspan="2">
                <input type="date" name="tgl_pg" id="tglPengembalian" class="form-control">
              </td>
            </tr>
            <tr>
              <td>ID Pegawai</td>
              <td colspan="2">
                <input type="number" readonly name="id_pegawai" id="idPegawaiPustaka" class="form-control">
              </td>
              <td>Denda</td>
              <td colspan="2">
                <input type="text" readonly name="denda" id="sangsi" class="form-control">
              </td>
            </tr>
            <tr>
              <td>Tanggal Pinjam</td>
              <td colspan="2"><input type="date" readonly name="tgl_pj" id="tglPinjamBuku" class="form-control"></td>
              <td></td>
              <td>
                <button type="submit" class="btn btn-primary btn-block">Success</button>
              </td>
            </tr>
          </thead>
          </form>
        </table>
      </div>
    </div>
    </div>
  </div>
		<div class="card">
			<div class="card-body">
				<table class="table" id="dataTable">
					<thead>
						<tr>
							<td>No</td>
							<td>Tahun Ajaran</td>
              <td>No Anggota</td>
              <td>No Buku</td>
              <td>Tanggal Pengembalian</td>
              <td>ID Pegawai</td>
              <td>Denda</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
          <?php foreach($transaksi_pengembalian as $i => $data): ?>
						<tr>
							<td><?= $i+1 ?></td>
							<td><?= $data->ta ?></td>
							<td><?= $data->no_anggota ?></td>
							<td><?= $data->no_buku ?></td>
							<td><?= $data->tgl_pg ?></td>
							<td><?= $data->id_pegawai ?></td>
              <td><?= $data->denda ?></td>
							<td>
								<button type="button" class="btn btn-primary" onclick="edit('<?= $data->id_transaksi ?>')">Edit</button>
								<a href="<?= base_url('Transaksi_Pengembalian/hapus/'.$data->id_transaksi) ?>" class="btn btn-danger">hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			</div>	
		</div>
	</div>
</div>

<!-- Modal -->
<div id="Modalsssss" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Transaksi_Pengembalian/simpan_edit') ?>" method="post" enctype="multipart/form-data">
           
            <div class="form-group">
                <label for="">Tahun Ajaran</label>
                <input type="text" id="ta" name="ta" class="form-control" placeholder="Tahun Ajaran">
                <input type="hidden" id="id_transaksi" name="id_transaksi" class="form-control" placeholder="ID Transaksi">
            </div>
            <div class="form-group">
                <label for="">No Anggota</label>
                <input type="text" readonly id="no_anggota" name="no_anggota" class="form-control" placeholder="No Buku">
            </div>
            <div class="form-group">
                <label for="">No Buku</label>
                <input type="text" id="no_buku" name="no_buku" class="form-control" placeholder="No Buku">
            </div>
            <div class="form-group">
                <label for="">Tanggal Pengembalian</label>
                <input type="date" id="tanggalPg" name="tgl_pg" class="form-control" placeholder="Tanggal Pengembalian">
            </div>
            <div class="form-group">
                <label for="">ID Pegawai</label>
                <input type="text" readonly id="id_pegawai" name="id_pegawai" class="form-control" placeholder="ID Pegawai">
            </div>
                <button class="btn btn-primary btn-block">Simpan</button>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>
<script src="<?= base_url('asset/vendor/jquery/jquery.min.js')?>"></script>
<script>
  function simpanData()
  {
    var ta = $('#ta').val();
    var no_anggota = $('#no_anggota').val();
    var no_buku = $('#no_buku').val();
    var id = $('#id').val();
    var tgl_pg = $('#tgl_pg').val();
    var id_pegawai = $('#id_pegawai').val();
    var denda = $('#sangsi').val();
    $.ajax({
      url:'<?= base_url('Transaksi_Pengembalian/tambah_data') ?>',
      type: 'POST',
      data: {
        'ta': ta,
        'no_anggota': no_anggota,
        'no_buku': no_buku,
        'id':id,
        'tgl_pg': tgl_pg,
        'id_pegawai': id_pegawai,
        'denda': denda
      },
      dataType: 'JSON',
      success: function(data)
      {
        console.log('SUCCESS')
      }
    })
  }

	function edit(id) 
	{
		$.ajax({
			url:'<?= base_url('Transaksi_Pengembalian/edit') ?>',
			type: 'POST',
			data: {'id_transaksi': id},
			dataType: 'JSON',
			success: function(data)
			{
				document.getElementById('id_transaksi').value = data[0].id_transaksi;
				document.getElementById('ta').value = data[0].ta;
				document.getElementById('no_anggota').value = data[0].no_anggota;
				document.getElementById('no_buku').value = data[0].no_buku;
				document.getElementById('tanggalPg').value = data[0].tgl_pg;
				document.getElementById('id_pegawai').value = data[0].id_pegawai;
				$('#Modalsssss').modal();
			}
		})
	}

  function cariAnggota()
  {
    var id = document.getElementById('idAnggota').value;
    $.ajax({
      url: '<?= base_url('Transaksi_Pengembalian/cariAnggota') ?>',
      type: 'POST',
      data: {'id_pinjam':id},
      dataType: 'JSON',
      success: function(data){
        console.log(data);
        document.getElementById('ta').value = data[0].ta;
				document.getElementById('no_buku').value = data[0].no_buku;
				document.getElementById('idPegawaiPustaka').value = data[0].id_pegawai;
        document.getElementById('id').value = data[0].id_transaksi;
        document.getElementById('jenisBuku').value = data[0].kategori ;
				document.getElementById('tglPinjamBuku').value = data[0].tgl_pj;
      }
    })
  }

  function HitungDenda()
  {
    var jenis_buku = document.getElementById("jenisBuku").value;
    var tgl_pinjam = new Date(document.getElementById("tglPinjamBuku").value).getTime();
    var tgl_kembali = new Date(document.getElementById("tglPengembalian").value).getTime();
    var selisih_hari = Math.floor((tgl_kembali - tgl_pinjam)/86400)/1000;
    var denda = 0;
    var batas_waktu_denda_minimal= 0;
    if(jenis_buku == "Buku Mata Pelajaran")
    {
      batas_waktu_denda_minimal = 150;
    }
    else if(jenis_buku == "Buku Umum")
    {
      batas_waktu_denda_minimal = 14;
    }
    if(selisih_hari > batas_waktu_denda_minimal)
    {
      denda = (selisih_hari - batas_waktu_denda_minimal) * 500;
    }

    document.getElementById("sangsi").value = denda;
  }

  document.getElementById("tglPengembalian").addEventListener("change", HitungDenda)

</script>
