<!-- Vertical Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Barang Keluar
                </h2>
            </div>
            <div class="body">
                <form method="post" action="<?= base_url('dashboard/i_keluar') ?>">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($tampil as $t) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $t['nama_barang']; ?></td>
                                        <td><?= $t['stok']; ?></td>
                                        <td><?= $t['satuan']; ?></td>
                                    </tr>
                                <?php $no++;
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
                    <label for="tgl_keluar">Tanggal Keluar</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="date" id="tgl_keluar" class="form-control" placeholder="Tanggal Barang Keluar">
                        </div>
                    </div>
                    <label for="tujuan">Posko / Tujuan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="tujuan" class="form-control" placeholder="Tujuan Barang Keluar">
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>