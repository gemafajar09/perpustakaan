<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
            <center>
				<h3>Data Transaksi Peminjaman</h3>
            </center>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button>
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<td>No</td>
							<td>Tahun Ajaran</td>
                            <td>No Anggota</td>
                            <td>No Buku</td>
                            <td>Tanggal Peminjaman</td>
                            <td>ID Pegawai</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
                    <?php foreach($transaksi_peminjaman as $i => $data): ?>
						<tr>
							<td><?= $i+1 ?></td>
							<td><?= $data->ta ?></td>
							<td><?= $data->no_anggota ?></td>
							<td><?= $data->no_buku ?></td>
							<td><?= $data->tgl_pj ?></td>
							<td><?= $data->id_pegawai ?></td>
							<td>
								<button type="button" class="btn btn-primary" onclick="edit('<?= $data->id_transaksi ?>')">Edit</button>
								<a href="<?= base_url('Transaksi_Peminjaman/hapus/'.$data->id_transaksi) ?>" class="btn btn-danger">hapus</a>
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Transaksi_Peminjaman/tambah_data') ?>" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="">Tahun Ajaran</label>
                <input type="text" name="ta" class="form-control" placeholder="Tahun Ajaran">
            </div>
            <div class="form-group">
                <label for="">No Anggota</label>
                <input type="text" name="no_anggota" class="form-control" placeholder="No Anggota">
            </div>
            <div class="form-group">
                <label for="">No Buku</label>
                <input type="text" name="no_buku" class="form-control" placeholder="No Buku">
            </div>
            <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="date" name="tgl_pj" class="form-control" placeholder="Tanggal Peminjaman">
            </div>
            <div class="form-group">
                <label for="">ID Pegawai</label>
                <input type="text" name="id_pegawai" class="form-control" placeholder="ID Pegawai">
            </div>
            <div>
                <button class="btn btn-primary btn-block">Simpan</button>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Transaksi_Peminjaman/simpan_edit') ?>" method="post" enctype="multipart/form-data">
           
            <div class="form-group">
                <label for="">Tahun Ajaran</label>
                <input type="hidden" id="id_transaksi" name="id_transaksi" class="form-control" placeholder="ID Transaksi">
                <input type="text" id="ta" name="ta" class="form-control" placeholder="Tahun Ajaran">
            </div>
            <div class="form-group">
                <label for="">No Anggota</label>
                <input type="text" readonly id="no_anggota" name="no_anggota" class="form-control" placeholder="No Anggota">
            </div>
            <div class="form-group">
                <label for="">No Buku</label>
                <input type="text" id="no_buku" name="no_buku" class="form-control" placeholder="No Buku">
            </div>
            <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="date" id="tgl_pj" name="tgl_pj" class="form-control" placeholder="Tanggal Peminjaman">
            </div>
            <div class="form-group">
                <label for="">ID Pegawai</label>
                <input type="text"id="id_pegawai" readonly  name="id_pegawai" class="form-control" placeholder="ID Pegawai">
            </div>
            <div>
                <button class="btn btn-primary btn-block">Simpan</button>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>
<script src="<?= base_url('asset/vendor/jquery/jquery.min.js')?>"></script>
<script>
	function edit(id)
	{
		$.ajax({
			url:'<?= base_url('Transaksi_Peminjaman/edit') ?>',
			type: 'POST',
			data: {'id_transaksi': id},
			dataType: 'JSON',
			success: function(data)
			{
				document.getElementById('id_transaksi').value = data[0].id_transaksi;
				document.getElementById('ta').value = data[0].ta;
				document.getElementById('no_anggota').value = data[0].no_anggota;
				document.getElementById('no_buku').value = data[0].no_buku;
				document.getElementById('tgl_pj').value = data[0].tgl_pj;
				document.getElementById('id_pegawai').value = data[0].id_pegawai;
				$('#editModal').modal();
			}
		})
	}
</script>