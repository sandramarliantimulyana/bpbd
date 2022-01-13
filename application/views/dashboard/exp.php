<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Expired
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Tanggal Expired</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($tampil as $t) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $t['nama_barang']; ?></td>
                                    <td><?= $t['jml_barang']; ?></td>
                                    <td><?= $t['satuan']; ?></td>
                                    <td><?= $t['tgl_exp']; ?></td>
                                    <!-- <td> <?php if ($t['tgl_exp'] > date('Y-m-d')) {
                                                    echo 'Berlaku';
                                                } else {
                                                    echo 'Expired';
                                                } ?></td> -->

                                    <!-- <td>
                                        <a href="<?= base_url('dashboard/hapus_masuk/' . $t['id_masuk']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            Hapus
                                        </a>
                                        <a href="<?= base_url('dashboard/edit_masuk/' . $t['id_masuk']) ?>" class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                    </td> -->
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>