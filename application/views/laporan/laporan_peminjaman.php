<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Laporan Peminjaman</h3>
            </div>
            <div class="card-body">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Anggota</th>
                            <th>Nama Anggota</th>
                            <th>No Buku</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Sangsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($laporan->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->no_anggota ?></td>
                                <td><?= $data->nama_siswa ?></td>
                                <td><?= $data->no_buku ?></td>
                                <td><?= $data->judul_buku ?></td>
                                <td><?= $data->tgl_pj ?></td>
                                <td><?= $data->tgl_pg ?></td>
                                <td><?= $data->denda ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>