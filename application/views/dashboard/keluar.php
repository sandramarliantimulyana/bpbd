<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <a href="<?= base_url('dashboard/i_keluar') ?>" class="btn btn-primary"> Tambah Barang Keluar </a>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>

                                <th>Tanggal Keluar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Posko / Tujuan</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($tampil as $t) : ?>
                                <tr>

                                    <td><?= $t['tgl_keluar']; ?></td>
                                    <td><?= $t['id_keluar']; ?></td>
                                    <td><?= $t['id_masuk']; ?></td>
                                    <td><?= $t['jml_barang']; ?></td>
                                    <td><?= $t['tujuan']; ?></td>

                                    <td>
                                        <a href="<?= base_url('dashboard/hapus_keluar/' . $t['id_keluar']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            Hapus
                                        </a>
                                        <a href="<?= base_url('dashboard/edit_keluar/' . $t['id_keluar']) ?>" class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination float-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>