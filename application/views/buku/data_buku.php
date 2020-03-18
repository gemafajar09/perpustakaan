<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<center>
		<h3>Data Buku</h3>
			</center>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button>		
			</div>
			<div class="card-body">
				<table class="table" id="dataTable">
					<thead>
						<tr>
							<td>No</td>
							<td>No Buku</td>
							<td>Judul Buku</td>
							<td>Pengarang</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($buku as $i => $data): ?>
						<tr>
							<td><?= $i+1 ?></td>
							<td><?= $data->no_buku ?></td>
							<td><?= $data->judul_buku ?></td>
							<td><?= $data->pengarang ?></td>
							<td>
								<button type="button" class="btn btn-primary" onclick="edit('<?= $data->no_buku ?>')">Edit</button>
								<a href="<?= base_url('Buku/hapus/'.$data->no_buku) ?>" class="btn btn-danger">hapus</a>
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
        <form action="<?= base_url('Buku/tambah_data') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">No Buku</label>
                <input type="text" name="no_buku" class="form-control" placeholder="No Buku">
            </div>
            <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku">
            </div>
            <div class="form-group">
                <label for="">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" placeholder="Pengarang">
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
				<select name="kategori" class="form-control">
				<option value="">-PILIH KATEGORI-</option>
				<option value="Buku Mata Pelajaran">Buku Mata Pelajaran</option>
				<option value="Buku Pelajaran Umum">Buku Pelajaran Umum</option>
				</select>
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
        <form action="<?= base_url('Buku/simpan_edit') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">No Buku</label>
                <input type="text" id="no_buku" name="no_buku" class="form-control" placeholder="No Buku">
            </div>
            <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" id="judul_buku" name="judul_buku" class="form-control" placeholder="Judul Buku">
            </div>
            <div class="form-group">
                <label for="">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" class="form-control" placeholder="Pengarang">
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
				<select id="kategori" name="kategori" class="form-control">
				<option value="">-PILIH KATEGORI-</option>
				<option value="Buku Mata Pelajaran">Buku Mata Pelajaran</option>
				<option value="Buku Pelajaran Umum">Buku Pelajaran Umum</option>
				</select>
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
			url:'<?= base_url('Buku/edit') ?>',
			type: 'POST',
			data: {'no_buku': id},
			dataType: 'JSON',
			success: function(data)
			{
				document.getElementById('no_buku').value = data[0].no_buku;
				document.getElementById('judul_buku').value = data[0].judul_buku;
				document.getElementById('pengarang').value = data[0].pengarang;
				document.getElementById('kategori').value = data[0].kategori;
				$('#editModal').modal();
			}
		})
	}
</script>