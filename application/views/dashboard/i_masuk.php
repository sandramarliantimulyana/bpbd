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
                <form method="post" action="<?= base_url('dashboard/i_masuk') ?>">
                    <label for="tgl_masuk">Tanggal Masuk</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" placeholder="Tanggal Barang Masuk">
                        </div>
                    </div>
                    <label for="nama_sumber">Sumber</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select class="form-control" name="sumber" id="sumber">
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
                            <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang">
                        </div>
                    </div>
                    <label for="jml_barang">Jumlah</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="jml_barang" name="jml_barang" class="form-control" placeholder="Jumlah Barang Masuk">
                        </div>
                    </div>
                    <label for="satuan">Satuan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="satuan" name="satuan" class="form-control" placeholder="Satuan Barang">
                        </div>
                    </div>
                    <label for="kategori">Kategori</label>
                    <div class="form-group">
                        <select class="form-control  show-tick" name="kategori" id="kategori">
                            <?php $kategori = $this->db->get('kategori')->result_array();
                            foreach ($kategori as $dt) { ?>
                                <option value="<?= $dt['id_kategori'] ?>">
                                    <?= $dt['nama_kategori'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <label for="tgl_exp">Tanggal Expired</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="date" id="tgl_exp" name="tgl_exp" class="form-control" placeholder="Tanggal Expired Barang">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>