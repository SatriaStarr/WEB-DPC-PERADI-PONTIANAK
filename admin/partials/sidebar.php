<div class="sidebar">
    <div class="logo-section">
        <i class="fa-solid fa-scale-balanced fa-2x"></i>
        <div class="logo-text">
            <h2>PERADI</h2><span>Data Center</span>
        </div>
    </div>

    <ul class="nav-links">
        <li>
            <a href="../index.php">
                <i class="fa-solid fa-arrow-left"></i> <span>Layanan Home</span>
            </a>
        </li>

        <hr>

        <li class="<?= basename($_SERVER['PHP_SELF'])=='dashboard.php'?'active':'' ?>">
            <a href="dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
        </li>

        <li class="<?= basename($_SERVER['PHP_SELF'])=='data_advokat.php'?'active':'' ?>">
            <a href="data_advokat.php"><i class="fa-solid fa-gavel"></i> Data Advokat</a>
        </li>

        <li class="<?= basename($_SERVER['PHP_SELF'])=='peraturan.php'?'active':'' ?>">
            <a href="peraturan.php"><i class="fa-solid fa-scale-balanced"></i> Peraturan</a>
        </li>

        <li class="<?= basename($_SERVER['PHP_SELF'])=='struktur_pengurus.php'?'active':'' ?>">
            <a href="struktur_pengurus.php"><i class="fa-solid fa-sitemap"></i> Struktur Pengurus</a>
        </li>

        <li class="<?= basename($_SERVER['PHP_SELF'])=='layanan.php'?'active':'' ?>">
            <a href="layanan.php"><i class="fa-solid fa-handshake"></i> Layanan</a>
        </li>

        <li class="<?= basename($_SERVER['PHP_SELF'])=='galeri.php'?'active':'' ?>">
            <a href="galeri.php"><i class="fa-solid fa-image"></i> Galeri</a>
        </li>
        
        <li class="<?= basename($_SERVER['PHP_SELF'])=='verifikasi_admin.php' ? 'active' : '' ?>">
            <a href="verifikasi_admin.php"><i class="fa-solid fa-user-check"></i> Verifikasi Admin</a>
        </li>

    </ul>

    <div class="logout-section">
        <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
</div>
