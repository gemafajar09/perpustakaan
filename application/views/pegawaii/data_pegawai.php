<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<center>
		<h3>Data Pegawai</h3>
			</center>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button>
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<td>No</td>
							<td>ID Pegawai</td>
							<td>Nama Pegawai</td>
							<td>Jabatan</td>
							<td>Username</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($pegawaii as $i => $data): ?>
						<tr>
							<td><?= $i+1 ?></td>
							<td><?= $data->id_pegawai ?></td>
							<td><?= $data->nama_pegawai ?></td>
							<td><?= $data->jabatan ?></td>
							<td><?= $data->username ?></td>
							<td>
								<button type="button" class="btn btn-primary" onclick="edit('<?= $data->id_pegawai ?>')">Edit</button>
								<a href="<?= base_url('Pegawai/hapus/'.$data->id_pegawai) ?>" class="btn btn-danger">hapus</a>
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
        <form action="<?= base_url('Pegawai/tambah_data') ?>" method="post" enctype="multipart/form-data"">
            <div class="form-group">
                <label for="">ID Pegawai</label>
                <input type="text" name="id_pegawai" class="form-control" placeholder="ID Pegawai">
            </div>
            <div class="form-group">
                <label for="">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai">
            </div>
            <div class="form-group">
                <label for="">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
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
        <form action="<?= base_url('Pegawai/simpan_edit') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">ID Pegawai</label>
                <input type="text" id="id_pegawai" name="id_pegawai" class="form-control" placeholder="ID Pegawai">
            </div>
            <div class="form-group">
                <label for="">Nama Pegawai</label>
                <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai">
            </div>
            <div class="form-group">
                <label for="">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
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
			url:'<?= base_url('Pegawai/edit') ?>',
			type: 'POST',
			data: {'id_pegawai': id},
			dataType: 'JSON',
			success: function(data)
			{
				document.getElementById('id_pegawai').value = data[0].id_pegawai;
				document.getElementById('nama_pegawai').value = data[0].nama_pegawai;
				document.getElementById('jabatan').value = data[0].jabatan;
				document.getElementById('username').value = data[0].username;
				$('#editModal').modal();
			}
		})
	}
</script>
