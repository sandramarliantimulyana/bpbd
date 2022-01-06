<!-- Vertical Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Barang Masuk
                </h2>
            </div>
            <div class="body">
                <form method="post" action="<?= base_url('dashboard/edit/' . $col['id_masuk']) ?>">
                    <label for="tgl_masuk">Tanggal Masuk</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" placeholder="Tanggal Barang Masuk" value="<?= $col['tgl_masuk'] ?>">
                        </div>
                    </div>
                    <label for="nama_sumber">Sumber</label>
                    <?php $data = $this->db->get_where('sumber', ['id_sumber' => $col['id_sumber']])->row_array(); ?>
                    <div class="form-group">
                        <div class="form-line">
                            <select class="form-control" name="sumber" id="sumber">
                                <option hidden value="<?= $col['id_sumber'] ?>"> <?= $data['nama_sumber'] ?></option>
                                <?php $sumber = $this->db->get('sumber')->result_array();
                                foreach ($sumber as $dt) { ?>
                                    <option value="<?= $dt['id_sumber'] ?>"><?= $dt['nama_sumber'] ?></option>

                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <label for="nama_barang">Nama Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= $col['nama_barang'] ?>">
                        </div>
                    </div>
                    <label for="jml_barangmasuk">Jumlah</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="jml_barangmasuk" name="jml_barangmasuk" class="form-control" placeholder="Jumlah Barang Masuk" value="<?= $col['jml_barangmasuk'] ?>">
                        </div>
                    </div>
                    <label for="satuan">Satuan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="satuan" name="satuan" class="form-control" placeholder="Satuan Barang" value="<?= $col['satuan'] ?>">
                        </div>
                    </div>
                    <label for="nama_kategori">Kategori</label>
                    <?php $data = $this->db->get_where('kategori', ['id_kategori' => $col['id_kategori']])->row_array(); ?>
                    <div class="form-group">
                        <div class="form-line">
                            <select class="form-control" name="kategori" id="kategori">
                                <option hidden value="<?= $col['id_kategori'] ?>"> <?= $data['nama_kategori'] ?></option>
                                <?php $kategori = $this->db->get('kategori')->result_array();
                                foreach ($kategori as $dt) { ?>
                                    <option value="<?= $dt['id_kategori'] ?>"><?= $dt['nama_kategori'] ?></option>

                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <label for="tgl_exp">Tanggal Expired</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="date" id="tgl_exp" name="tgl_exp" class="form-control" placeholder="Tanggal Expired Barang" value="<?= $col['tgl_exp'] ?>">
                        </div>
                    </div>
                    <!-- <input type=" checkbox" id="remember_me" class="filled-in"> -->
                    <!-- <label for="remember_me">Remember Me</label> -->
                    <!-- <br> -->
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>