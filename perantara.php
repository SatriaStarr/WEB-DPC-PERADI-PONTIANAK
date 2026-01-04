<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perantara - DPC PERADI Pontianak</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* --- 1. RESET & UMUM --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f4f4f4; color: #333; }

        /* --- 2. NAVBAR (Sama persis CSS-nya agar tidak lompat-lompat) --- */
        nav {
            position: absolute; top: 0; left: 0; width: 100%;
            padding: 20px 50px; display: flex; justify-content: space-between; align-items: center;
            z-index: 100; background: rgba(0,0,0,0.8); /* Background gelap konsisten */
        }
        .logo-container { display: flex; align-items: center; gap: 15px; text-decoration: none; }
        .logo-img { width: 45px; height: auto; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3)); }
        .logo-text { color: white; display: flex; flex-direction: column; }
        .logo-text h3 { font-size: 1.2rem; font-weight: 800; line-height: 1; }
        .logo-text span { font-size: 0.8rem; font-weight: 300; letter-spacing: 1px; }

        /* Menu Links */
        .nav-links { list-style: none; display: flex; gap: 30px; align-items: center; }
        .nav-links li { position: relative; }
        .nav-links a {
            text-decoration: none; color: white; font-size: 0.85rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 1px; transition: 0.3s; padding-bottom: 5px;
        }
        .nav-links a:hover, .nav-links a.active { color: #dea057; }
        
        /* Dropdown */
        .dropdown-content {
            display: none; position: absolute; top: 100%; left: 0;
            background-color: rgba(0, 0, 0, 0.9); min-width: 250px;
            padding-top: 10px; border-top: 3px solid #dea057; border-radius: 0 0 5px 5px;
        }
        .dropdown:hover .dropdown-content { display: block; animation: fadeIn 0.3s; }
        .dropdown-content a { display: block; padding: 12px 20px; color: white; text-transform: none; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .dropdown-content a:hover { background-color: #333; color: #dea057; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }


        /* --- 3. HERO HEADER (Bagian Atas) --- */
        .page-header {
            position: relative; width: 100%; height: 60vh; /* Setengah layar saja */
            background-image: url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2072&auto=format&fit=crop');
            background-size: cover; background-position: center;
            display: flex; align-items: center; justify-content: center; text-align: center;
        }
        .page-header::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); z-index: 1; }
        .header-content { position: relative; z-index: 2; color: white; margin-top: 50px; }
        .header-title { font-size: 3rem; font-weight: 800; text-transform: uppercase; margin-bottom: 10px; }
        .header-subtitle { font-size: 1rem; color: #dea057; letter-spacing: 2px; font-weight: 600; text-transform: uppercase; }

        /* --- 4. KONTEN PERANTARA (Bagian Bawah) --- */
        .container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
        
        .section-title { text-align: center; margin-bottom: 40px; }
        .section-title h2 { font-size: 2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 10px; }
        .section-title .line { width: 80px; height: 4px; background: #dea057; margin: 0 auto; }

        /* Grid Layout untuk Card */
        .cards-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .card { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: 0.3s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.15); }
        .card-img { width: 100%; height: 200px; object-fit: cover; }
        .card-body { padding: 25px; }
        .card-title { font-size: 1.2rem; font-weight: 700; margin-bottom: 10px; color: #333; }
        .card-desc { font-size: 0.9rem; color: #666; line-height: 1.6; margin-bottom: 20px; }
        .btn-read { display: inline-block; padding: 8px 20px; background: #1a1a1a; color: white; text-decoration: none; font-size: 0.8rem; font-weight: 600; border-radius: 4px; transition: 0.3s; }
        .btn-read:hover { background: #dea057; color: white; }

        /* Responsive HP */
        @media (max-width: 768px) {
            nav { flex-direction: column; padding: 20px; background: #1a1a1a; }
            .nav-links { flex-direction: column; width: 100%; text-align: center; margin-top: 20px; gap: 15px; }
            .header-title { font-size: 2rem; }
            .page-header { height: 50vh; }
        }
    </style>
</head>
<body>

    <nav>
        <a href="index.php" class="logo-container">
            <img src="https://img.icons8.com/ios-filled/100/FFFFFF/law.png" alt="Logo PERADI" class="logo-img">
            <div class="logo-text">
                <h3>PERADI</h3>
                <span>Data Center</span>
            </div>
        </a>

        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="perantara.php" class="active">Perantara</a></li>
            <li><a href="struktur.php">Struktur</a></li>
            
            <li class="dropdown">
                <a href="#">Layanan ▼</a>
                <ul class="dropdown-content">
                    <li><a href="layanan.php#pkpa">PKPA</a></li>
                    <li><a href="layanan.php#upa">UPA / Konsultasi</a></li>
                    <li><a href="layanan.php#sumpah">Pengangkatan & Sumpah</a></li>
                </ul>
            </li>

            <li><a href="galeri.php">Galeri</a></li>
        </ul>
    </nav>

    <header class="page-header">
        <div class="header-content">
            <div class="header-subtitle">Informasi Publik</div>
            <h1 class="header-title">Perantara & Media</h1>
        </div>
    </header>

    <div class="container">
        <div class="section-title">
            <h2>Berita & Informasi Terkini</h2>
            <div class="line"></div>
        </div>

        <div class="cards-grid">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1505664194779-8beaceb93744?q=80&w=2070&auto=format&fit=crop" class="card-img" alt="Berita 1">
                <div class="card-body">
                    <h3 class="card-title">Sosialisasi Hukum 2025</h3>
                    <p class="card-desc">Kegiatan sosialisasi hukum terbaru yang diadakan oleh DPC PERADI Pontianak untuk masyarakat umum.</p>
                    <a href="#" class="btn-read">Baca Selengkapnya →</a>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=2070&auto=format&fit=crop" class="card-img" alt="Berita 2">
                <div class="card-body">
                    <h3 class="card-title">Kerjasama Lembaga</h3>
                    <p class="card-desc">Penandatanganan MoU antara PERADI dan Universitas di Kalimantan Barat untuk pendidikan advokat.</p>
                    <a href="#" class="btn-read">Baca Selengkapnya →</a>
                </div>
            </div>

            <div class="card">
                <img src="https://images.unsplash.com/photo-1557426272-fc759fdf7a8d?q=80&w=2070&auto=format&fit=crop" class="card-img" alt="Berita 3">
                <div class="card-body">
                    <h3 class="card-title">Jadwal Sidang Terbuka</h3>
                    <p class="card-desc">Informasi mengenai jadwal sidang terbuka dan tata cara mengikutinya bagi anggota baru.</p>
                    <a href="#" class="btn-read">Baca Selengkapnya →</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>