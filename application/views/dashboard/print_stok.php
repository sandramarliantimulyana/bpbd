<script>
    window.print();
</script>

<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="HMIF Management">
    <meta name="author" content="Radheya">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/uang">
    <title>
        <?= $judul ?>
    </title>

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url('template/') ?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?= base_url('template/') ?>css/style.css" rel="stylesheet">

    <!-- <link href="<?= base_url() ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?= base_url() ?>dist/css/style.min.css" rel="stylesheet"> -->
    <style>
        @media print {

            .no-print,
            .card-header {
                display: none !important;
            }

            .cnt {
                padding-top: 0px !important;
            }

            .cnt {
                margin-left: 0px !important;
            }

            @page {
                size: landscape;
            }
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-body">
            <h3 class="text-center" align="center">Laporan Stok Barang BPBD Majalengka <?= $this->uri->segment("3") ?></h3>
            <table class="table table-bordered table-hover" width="100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tampil as $data) {  ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $data['nama_barang']; ?></td>
                            <td><?= $data['stok']; ?></td>
                            <td><?= $data['satuan']; ?></td>
                        </tr>
                    <?php
                        $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>