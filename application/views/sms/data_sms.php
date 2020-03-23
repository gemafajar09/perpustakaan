<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <center>
          <h3>Data SMS</h3>
        </center>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Kirim Pesan</button>
      </div>
      <div class="card-body">
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <td>No</td>
              <td>No Tujuan</td>
              <td> Isi SMS</td>
              <td>Tanggal</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sms as $i => $data) : ?>
              <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $data->sms_no ?></td>
                <td><?= $data->sms_isi ?></td>
                <td><?= $data->sms_tgl ?></td>
                <td>
                  <a href="<?= base_url('sms/hapus/' . $data->sms_id) ?>" class="btn btn-danger">hapus</a>
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
        <h4 class="modal-title">Kirim Pesan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('sms/tambah_data') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">No Tujuan</label>
            <input type="number" required name="no_tujuan" class="form-control" placeholder="No Tujuan">
          </div>
          <div class="form-group">
            <label for="">Isi Pesan</label><br>
            <textarea name="isi_pesan" id="" cols="56" rows="10"></textarea>
          </div>
          <button class="btn btn-primary btn-block">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>