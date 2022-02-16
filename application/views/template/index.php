<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $judul ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('template/') ?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('template/') ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('template/') ?>plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?= base_url('template/') ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?= base_url('template/') ?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url('template/') ?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?= base_url('template/') ?>css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url('template/') ?>css/themes/all-themes.css" rel="stylesheet" />
    <!-- Jquery Core Js -->
    <script src="<?= base_url('template/') ?>plugins/jquery/jquery.min.js"></script>

    <!-- toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/toastr/build/toastr.min.css">
    <script src="<?= base_url() ?>vendor/toastr/build/toastr.min.js"></script>



</head>

<body class="theme-red">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?= base_url('template/') ?>index.html">SIM - Logistik BPBD Majalengka</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">

                <div class="image">
                    <img src="<?= base_url('gambar') ?>/logo.png" width="60" height="60" alt="User" />
                    <!-- </div> -->
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['username'] ?></div>
                        <!-- <div class="email"><?= $_SESSION['email'] ?></div> -->
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <?php $this->load->view('template/menu'); ?>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                    <!-- &copy; 2021 <a href="javascript:void(0);">BPBD Majalengka</a>. -->
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2><?= $judul ?></h2>
            </div>
            <!--  -->

            <?php $this->load->view($file) ?>


        </div>
    </section>


    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('template/') ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?= base_url('template/') ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?= base_url('template/') ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('template/') ?>plugins/node-waves/waves.js"></script>

    <script src="<?= base_url('template/') ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?= base_url('template/') ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?= base_url('template/') ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('template/') ?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?= base_url('template/') ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>

    <script src="<?= base_url('template/') ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?= base_url('template/') ?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?= base_url('template/') ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('template/') ?>js/admin.js"></script>
    <script>
        $(function() {
            $('.tabel_basic').DataTable({
                responsive: true
            });
            $('.js-basic-example').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });

            //Exportable table
            $('.js-exportable').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    <!-- Demo Js -->
    <script src="<?= base_url('template/') ?>js/demo.js"></script>

    <?php if (isset($_SESSION['notifikasi'])) { ?>
        <script type="text/javascript">
            toastr.options.closeButton = true;
            toastr.<?= $_SESSION['warna'] ?>('<?= $_SESSION['judul'] ?>',
                '<?= $_SESSION['pesan'] ?> ');
        </script>
    <?php } ?>
</body>

</html>