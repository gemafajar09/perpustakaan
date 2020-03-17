<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      <center>
    <h3>Data Siswa</h3>
      </center>
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <td>No</td>
              <td>No Anggota</td>
              <td>Nama Siswa</td>
              <td>No HP</td>
              <td>Username</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
          <?php foreach($siswa as $i => $data): ?>
            <tr>
              <td><?= $i+1 ?></td>
              <td><?= $data->no_anggota ?></td>
              <td><?= $data->nama_siswa ?></td>
              <td><?= $data->no_hp ?></td>
              <td><?= $data->username ?></td>
              <td>
                <button type="button" class="btn btn-primary" onclick="edit('<?= $data->no_anggota ?>')">Edit</button>
                <a href="<?= base_url('Siswa/hapus/'.$data->no_anggota) ?>" class="btn btn-danger">hapus</a>
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
        <form action="<?= base_url('Siswa/tambah_data') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">No Anggota</label>
                <input type="text" name="no_anggota" class="form-control" placeholder="No Anggota">
            </div>
            <div class="form-group">
                <label for="">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa">
            </div>
            <div class="form-group">
                <label for="">No HP</label>
                <input type="text" name="no_hp" class="form-control" placeholder="No HP">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
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
        <form action="<?= base_url('Siswa/simpan_edit') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">No Anggota</label>
                <input type="text" id="no_anggota" readonly name="no_anggota" class="form-control" placeholder="No Anggota">
            </div>
            <div class="form-group">
                <label for="">Nama Siswa</label>
                <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" placeholder="Nama Siswa">
            </div>
            <div class="form-group">
                <label for="">No HP</label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="No HP">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password Baru">
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
      url:'<?= base_url('Siswa/edit') ?>',
      type: 'POST',
      data: {'no_anggota': id},
      dataType: 'JSON',
      success: function(data)
      {
        document.getElementById('no_anggota').value = data[0].no_anggota;
        document.getElementById('nama_siswa').value = data[0].nama_siswa;
        document.getElementById('no_hp').value = data[0].no_hp;
        document.getElementById('username').value = data[0].username;
        // document.getElementById('password').value = data[0].password;
        $('#editModal').modal();
      }
    })
  }
</script>