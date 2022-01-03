<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>

        <li>
            <a href="<?= base_url('dashboard') ?>">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('template/') ?>">
                <i class="material-icons">assignment</i>
                <span>Data Barang</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">swap_calls</i>
                <span>Barang</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="<?= base_url('dashboard/masuk') ?>">
                        <span>Barang Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard/keluar') ?>">
                        <span>Barang Keluar</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">widgets</i>
                <span>Inventorisasi</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="<?= base_url('dashboard/barang') ?>pages/ui/alerts.html">Stok Barang</a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard/exp') ?>pages/ui/animations.html">Barang Kadaluwarsa</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url('auth/logout') ?>">
                <i class="material-icons">exit_to_app</i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</div>