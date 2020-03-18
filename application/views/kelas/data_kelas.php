<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<center>
		<h3>Data Kelas</h3>
			</center>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button>	
			</div>
			<div class="card-body">
				<table class="table" id="dataTable">
					<thead>
						<tr>
							<td>No</td>
							<td>No Anggota</td>
							<td>Tahun Ajaran</td>
							<td>Kelas</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($kelas as $i => $data): ?>
						<tr>
							<td><?= $i+1 ?></td>
							<td><?= $data->no_anggota ?></td>
							<td><?= $data->ta ?></td>
							<td><?= $data->kelas ?></td>
							<td>
								<button type="button" class="btn btn-primary" onclick="edit('<?= $data->no_anggota ?>')">Edit</button>
								<a href="<?= base_url('Kelas/hapus/'.$data->no_anggota) ?>" class="btn btn-danger">hapus</a>
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
        <form action="<?= base_url('Kelas/tambah_data') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">No Anggota</label>
                <input type="text" name="no_anggota" class="form-control" placeholder="No Anggota">
            </div>
            <div class="form-group">
                <label for="">Tahun Ajaran</label>
                <input type="text" name="ta" class="form-control" placeholder="Tahun Ajaran">
            </div>
            <div class="form-group">
                <label for="">Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="Kelas">
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
        <form action="<?= base_url('Kelas/simpan_edit') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">No Anggota</label>
                <input type="text" id="no_anggota" name="no_anggota" class="form-control" placeholder="No Anggota">
            </div>
            <div class="form-group">
                <label for="">Tahun Ajaran</label>
                <input type="text" id="ta" name="ta" class="form-control" placeholder="Tahun Ajaran">
            </div>
            <div class="form-group">
                <label for="">Kelas</label>
                <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas">
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
			url:'<?= base_url('Kelas/edit') ?>',
			type: 'POST',
			data: {'no_anggota': id},
			dataType: 'JSON',
			success: function(data)
			{
				document.getElementById('no_anggota').value = data[0].no_anggota;
				document.getElementById('ta').value = data[0].ta;
				document.getElementById('kelas').value = data[0].kelas;
				$('#editModal').modal();
			}
		})
	}
</script>