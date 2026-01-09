<style>
    /* Hilangkan scrollbar default tapi tetap bisa scroll */
    .sidebar::-webkit-scrollbar { width: 0px; background: transparent; }
    
    /* Styling Link Menu */
    .nav-links li a {
        display: flex; justify-content: space-between; align-items: center;
        padding: 12px 25px; color: rgba(255,255,255,0.8);
        text-decoration: none; font-size: 0.9rem; transition: 0.3s;
        border-left: 4px solid transparent; cursor: pointer;
    }
    .nav-links li a:hover, .nav-links li.active > a {
        background-color: #152c69; color: white; border-left-color: #dea057;
    }

    /* Icon panah dropdown */
    .arrow { transition: transform 0.3s; font-size: 0.8rem; }
    .rotate { transform: rotate(180deg); }

    /* Submenu (Level 1) */
    .submenu {
        list-style: none; padding: 0; display: none; /* Default Hidden */
        background-color: #15204a; /* Warna lebih gelap */
        max-height: 400px; /* Tinggi maksimal */
        overflow-y: auto; /* Scroll vertikal */
    }
    /* Scrollbar untuk submenu */
    .submenu::-webkit-scrollbar { width: 5px; }
    .submenu::-webkit-scrollbar-track { background: #0f1633; }
    .submenu::-webkit-scrollbar-thumb { background: #dea057; border-radius: 10px; }
    .submenu::-webkit-scrollbar-thumb:hover { background: #c88a3f; }
    
    .submenu li a {
        padding-left: 45px; /* Indentasi ke dalam */
        font-size: 0.85rem; border-left: none;
    }
    .submenu li a:hover { background-color: #1e2d63; border-left: 4px solid #dea057; }

    /* Sub-Submenu (Level 2 - Peraturan & Layanan) */
    .sub-submenu {
        list-style: none; padding: 0; display: none;
        background-color: #0f1633; /* Warna paling gelap */
    }
    .sub-submenu li a {
        padding-left: 65px; /* Indentasi lebih dalam lagi */
        font-size: 0.8rem; opacity: 0.7;
    }
    .sub-submenu li a:hover { opacity: 1; background-color: #15204a; }

    /* Class untuk menampilkan menu via JS */
    .show-menu { display: block !important; }
</style>

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
                <span><i class="fa-solid fa-arrow-left" style="width:20px"></i> Layanan Home</span>
            </a>
        </li>

        <li class="<?= basename($_SERVER['PHP_SELF'])=='dashboard.php'?'active':'' ?>">
            <a href="dashboard.php">
                <span><i class="fa-solid fa-chart-line" style="width:20px"></i> Dashboard</span>
            </a>
        </li>

        <hr style="border:0; border-top:1px solid rgba(255,255,255,0.1); margin: 10px 20px;">
        <li style="padding: 5px 25px; font-size: 0.65rem; color: #dea057; text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">
            Menu Utama
        </li>

        <li class="dropdown-item">
            <a onclick="toggleMenu('menu-halaman', this)">
                <span><i class="fa-solid fa-layer-group" style="width:20px"></i> Kelola Halaman</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            
            <ul id="menu-halaman" class="submenu">
                
                <li>
                    <a href="home_admin.php">
                        <span><i class="fa-solid fa-house" style="width:20px"></i> Home</span>
                    </a>
                </li>

                <li class="dropdown-item">
                    <a onclick="toggleMenu('menu-peraturan', this)">
                        <span><i class="fa-solid fa-book-open" style="width:20px"></i> Peraturan</span>
                        <i class="fa-solid fa-chevron-down arrow"></i>
                    </a>
                    <ul id="menu-peraturan" class="sub-submenu">
                        <li><a href="peraturan_admin.php?kategori=uu18">UU No. 18 Tahun 2003</a></li>
                        <li><a href="peraturan_admin.php?kategori=kodeetik">Kode Etik Advokat</a></li>
                        <li><a href="peraturan_admin.php?kategori=ad">Anggaran Dasar</a></li>
                        <li><a href="peraturan_admin.php?kategori=prt">Peraturan Rumah Tangga</a></li>
                        <li><a href="peraturan_admin.php?kategori=magang">Peraturan Magang</a></li>
                        <li><a href="peraturan_admin.php?kategori=keanggotaan">Peraturan Keanggotaan</a></li>
                        <li><a href="peraturan_admin.php?kategori=perpindahan">Peraturan Perpindahan</a></li>
                    </ul>
                </li>

                <li>
                    <a href="struktur_admin.php">
                        <span><i class="fa-solid fa-sitemap" style="width:20px"></i> Struktur</span>
                    </a>
                </li>

                <li class="dropdown-item">
                    <a onclick="toggleMenu('menu-layanan', this)">
                        <span><i class="fa-solid fa-hand-holding-heart" style="width:20px"></i> Layanan</span>
                        <i class="fa-solid fa-chevron-down arrow"></i>
                    </a>
                    <ul id="menu-layanan" class="sub-submenu">
                        <li><a href="layanan_admin.php?jenis=pkpa">PKPA</a></li>
                        <li><a href="layanan_admin.php?jenis=upa">UPA</a></li>
                        <li><a href="layanan_admin.php?jenis=sumpah">Pengangkatan & Sumpah</a></li>
                    </ul>
                </li>

                <li>
                    <a href="galeri_admin.php">
                        <span><i class="fa-solid fa-image" style="width:20px"></i> Galeri</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="<?= basename($_SERVER['PHP_SELF'])=='data_advokat.php'?'active':'' ?>">
            <a href="data_advokat.php">
                <span><i class="fa-solid fa-users-viewfinder" style="width:20px"></i> Kelola DB Advokat</span>
            </a>
        </li>

        <!-- ✅ RUNNING TEXT (GANTI PENGUMUMAN) -->
        <li class="<?= basename($_SERVER['PHP_SELF'])=='kelola_running_text.php'?'active':'' ?>">
            <a href="kelola_running_text.php">
                <span><i class="fa-solid fa-scroll" style="width:20px"></i> Running Text</span>
            </a>
        </li>
        
        <li class="<?= basename($_SERVER['PHP_SELF'])=='verifikasi_admin.php' ? 'active' : '' ?>">
            <a href="verifikasi_admin.php">
                <span><i class="fa-solid fa-user-shield" style="width:20px"></i> Verifikasi Admin</span>
                <?php if(isset($total_pending) && $total_pending > 0): ?>
                    <span class="badge" style="background:#ef4444; padding:2px 6px; border-radius:4px; font-size:0.6rem; margin-left:5px;"><?php echo $total_pending; ?></span>
                <?php endif; ?>
            </a>
        </li>

    </ul>

    <div class="logout-section">
        <a href="logout.php" onclick="return confirm('Yakin ingin keluar?')">
            <i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span>
        </a>
    </div>
</div>

<script>
    function toggleMenu(id, element) {
        // 1. Ambil elemen menu yang mau dibuka
        var menu = document.getElementById(id);
        
        // 2. Toggle class 'show-menu' (Buka/Tutup)
        menu.classList.toggle("show-menu");
        
        // 3. Putar icon panah
        var arrow = element.querySelector(".arrow");
        if(arrow) {
            arrow.classList.toggle("rotate");
        }
    }
</script>