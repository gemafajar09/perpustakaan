<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<center>
		<h3>Data Terlambat</h3>
			</center>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button>
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<td>No</td>
							<td>ID Terlambat</td>
							<td>No Anggota</td>
                            <td>Tanggal Pinjaman</td>
                            <td>No Buku</td>
                            <td>Tanggal Pengembalian</td>
                            <td>ID Pelanggaran</td>
                            <td>ID Pegawai</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
                    <?php foreach($terlambat as $i => $data): ?>
						<tr>
							<td><?= $i+1 ?></td>
							<td><?= $data->id_terlambat ?></td>
							<td><?= $data->no_anggota ?></td>
							<td><?= $data->tgl_pj ?></td>
							<td><?= $data->no_buku ?></td>
							<td><?= $data->tgl_pg ?></td>
							<td><?= $data->id_pelanggaran ?></td>
							<td><?= $data->id_pegawai ?></td>
							<td>
								<button type="button" class="btn btn-primary" onclick="edit('<?= $data->id_terlambat ?>')">Edit</button>
								<a href="<?= base_url('Terlambat/hapus/'.$data->id_terlambat) ?>" class="btn btn-danger">hapus</a>
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
        <form action="<?= base_url('Terlambat/tambah_data') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">ID Terlambat</label>
                <input type="text" name="id_terlambat" class="form-control" placeholder="ID Terlambat">
            </div>
            <div>
            <div class="form-group">
                <label for="">No Anggota</label>
                <input type="text" name="no_anggota" class="form-control" placeholder="No Anggota">
            </div>
            <div class="form-group">
                <label for="">Tanggal Pinjaman</label>
                <input type="date" name="tgl_pj" class="form-control" placeholder="Tanggal Pinjaman">
            </div>
            <div class="form-group">
                <label for="">No Buku</label>
                <input type="text" name="no_buku" class="form-control" placeholder="No Buku">
            </div>
            <div class="form-group">
                <label for="">Tanggal Pengembalian</label>
                <input type="date" name="tgl_pg" class="form-control" placeholder="Tanggal Pengembalian">
            </div>
            <div class="form-group">
                <label for="">ID Pelanggaran</label>
                <input type="text" name="id_pelanggaran" class="form-control" placeholder="ID Pelanggaran">
            </div>
            <div class="form-group">
                <label for="">ID Pegawai</label>
                <input type="text" name="id_pegawai" class="form-control" placeholder="ID Pegawai">
            </div>
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
        <form action="<?= base_url('Terlambat/simpan_edit') ?>" method="post" enctype="multipart/form-data">
          
            <div class="form-group">
                <label for="">No Anggota</label>
                <input type="hidden" id="id_terlambat" name="id_terlambat" class="form-control" placeholder="ID Terlambat">
                <input type="text" readonly id="no_anggota" name="no_anggota" class="form-control" placeholder="No Anggota">
            </div>
            <div class="form-group">
                <label for="">Tanggal Pinjaman</label>
                <input type="date" id="tgl_pj" name="tgl_pj" class="form-control" placeholder="Tanggal Pinjaman">
            </div>
            <div class="form-group">
                <label for="">No Buku</label>
                <input type="text" id="no_buku" name="no_buku" class="form-control" placeholder="No Buku">
            </div>
            <div class="form-group">
                <label for="">Tanggal Pengembalian</label>
                <input type="date" id="tgl_pg" name="tgl_pg" class="form-control" placeholder="Tanggal Pengembalian">
            </div>
            <div class="form-group">
                <label for="">ID Pelanggaran</label>
                <input type="text" id="id_pelanggaran" name="id_pelanggaran" class="form-control" placeholder="ID Pelanggaran">
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
	function edit(id)
	{
		$.ajax({
			url:'<?= base_url('Terlambat/edit') ?>',
			type: 'POST',
			data: {'id_terlambat': id},
			dataType: 'JSON',
			success: function(data)
			{
				document.getElementById('id_terlambat').value = data[0].id_terlambat;
				document.getElementById('no_anggota').value = data[0].no_anggota;
				document.getElementById('tgl_pj').value = data[0].tgl_pj;
				document.getElementById('no_buku').value = data[0].no_buku;
				document.getElementById('tgl_pg').value = data[0].tgl_pg;
				document.getElementById('id_pelanggaran').value = data[0].id_pelanggaran;
				document.getElementById('id_pegawai').value = data[0].id_pegawai;
				$('#editModal').modal();
			}
		})
	}
</script>