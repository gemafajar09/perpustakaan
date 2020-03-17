<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<center>
		<h3>Data Sangsi</h3>
			</center>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button>
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<td>No</td>
							<td>ID Pelanggaran</td>
							<td>Sangsi</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($sangsi as $i => $data): ?>
						<tr>
							<td><?= $i+1 ?></td>
							<td><?= $data->id_pelanggaran ?></td>
							<td><?= $data->sangsi ?></td>
							<td>
								<a href="<?= base_url('Sangsi/hapus/'.$data->id_pelanggaran) ?>" class="btn btn-danger">hapus</a>
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
        <form action="<?= base_url('Sangsi/tambah_data') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">ID Pelanggaran</label>
                <input type="text" name="id_pelanggaran" class="form-control" placeholder="ID Pelanggaran">
            </div>
            <div class="form-group">
                <label for="">Sangsi</label>
                <input type="text" name="sangsi" class="form-control" placeholder="Sangsi">
            </div>
                <button class="btn btn-primary btn-block">Simpan</button>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>