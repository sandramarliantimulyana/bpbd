<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <!-- <div class="header">
                <a href="<?= base_url('dashboard/i_sumber') ?>" class="btn btn-primary"> <i class="mdi mdi-plus"></i> Tambah Sumber Dana </a>
            </div> -->
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover tabel_basic dataTable">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td><?= $tampil['nama']; ?></td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td><?= $tampil['jabatan']; ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?= $tampil['username']; ?></td>
                            </tr>
                            <!-- <th>Email</th> -->
                            </tr>

                            <tr>

                                <!-- <td><?= $tampil['nama']; ?></td>
                                <td><?= $tampil['jabatan']; ?></td>
                                <td><?= $tampil['username']; ?></td> -->
                                <td>
                                    <!-- <a href="<?= base_url('dashboard/hapus_sumber/' . $tampil['id_sumber']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            <i class="material-icons">delete</i>
                                        </a> -->
                                    <a href="<?= base_url('dashboard/edit_profil/' . $tampil['id_user']) ?>" class="btn btn-success btn-sm m-t-20 waves-effect">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                </td>
                            </tr>

                            <!-- <button type="submit" class="btn btn-primary m-t-15 waves-effect">SIMPAN</button> -->

                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>