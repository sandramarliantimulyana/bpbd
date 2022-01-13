<div class="body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($tampil as $t) : ?>
                    <tr>
                        <td><?= $t['nama_barang']; ?></td>
                        <td><?= $t['satuan']; ?></td>
                        <td><?= $t['jml']; ?></td>
                        <!-- <td>
                                        <a href="<?= base_url('dashboard/hapus_keluar/' . $t['id_keluar']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            Hapus
                                        </a>
                                        <a href="<?= base_url('dashboard/edit_keluar/' . $t['id_keluar']) ?>" class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                    </td> -->
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