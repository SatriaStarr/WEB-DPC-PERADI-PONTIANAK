<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPC PERADI Pontianak - Home</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* --- 1. RESET & DASAR --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            background-color: #f8f9fa;
            color: #333;
        }

        /* --- 2. NAVBAR (MENU ATAS) --- */
        nav {
            position: absolute; top: 0; left: 0; width: 100%;
            padding: 20px 50px; display: flex; justify-content: space-between; align-items: center;
            z-index: 999;
            background: linear-gradient(to bottom, rgba(0,0,0,0.8), transparent);
        }

        /* Logo Area */
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
        .nav-links a:hover, .nav-links a.active { color: #dea057; } /* Warna Emas */
        
        /* Dropdown */
        .dropdown-content {
            display: none; position: absolute; top: 100%; left: 0;
            background-color: rgba(0, 0, 0, 0.9); min-width: 250px;
            padding-top: 10px; border-top: 3px solid #dea057; border-radius: 0 0 5px 5px;
        }
        .dropdown:hover .dropdown-content { display: block; animation: fadeIn 0.3s; }
        .dropdown-content a { display: block; padding: 12px 20px; color: white; text-transform: none; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .dropdown-content a:hover { background-color: #333; color: #dea057; }

        /* --- 3. HERO SECTION --- */
        .hero {
            position: relative; width: 100%; height: 100vh;
            background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop');
            background-size: cover; background-position: center; background-attachment: fixed;
            display: flex; align-items: center; justify-content: center; text-align: center;
        }
        .hero::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; }
        .hero-content { position: relative; z-index: 2; color: white; animation: moveUp 1s ease-out; padding: 0 20px; }
        .hero-subtitle { font-size: 1.1rem; color: #dea057; font-weight: 700; letter-spacing: 4px; margin-bottom: 10px; text-transform: uppercase; }
        .hero-title { font-size: 3.5rem; font-weight: 800; line-height: 1.1; text-transform: uppercase; margin-bottom: 20px; text-shadow: 2px 2px 20px rgba(0,0,0,0.8); }
        .hero-desc { font-size: 1.1rem; font-weight: 300; max-width: 700px; margin: 0 auto 30px auto; color: #e0e0e0; }
        .btn-cta { padding: 12px 30px; border: 2px solid white; color: white; text-decoration: none; font-weight: bold; text-transform: uppercase; transition: 0.3s; display: inline-block; }
        .btn-cta:hover { background: #dea057; border-color: #dea057; color: white; }

        /* --- 4. VISI MISI --- */
        .section-visi { padding: 80px 20px; background-color: white; }
        .section-container { max-width: 1100px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center; }
        .visi-text h2 { font-size: 2.5rem; margin-bottom: 20px; text-transform: uppercase; color: #1a1a1a; }
        .visi-text h2 span { color: #dea057; }
        .visi-text p { line-height: 1.8; color: #555; margin-bottom: 15px; font-size: 0.95rem; }
        .visi-img img { width: 100%; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }

        /* --- 5. GALERI --- */
        .section-gallery { padding: 80px 20px; background-color: #1a1a1a; color: white; text-align: center; }
        .gallery-title { font-size: 2.5rem; margin-bottom: 10px; text-transform: uppercase; }
        .gallery-subtitle { color: #dea057; letter-spacing: 2px; margin-bottom: 40px; display: block; font-weight: 600; }
        .gallery-grid { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px; }
        .gallery-item { position: relative; height: 250px; overflow: hidden; border-radius: 5px; cursor: pointer; }
        .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: 0.4s; }
        .gallery-item:hover img { transform: scale(1.1); }
        .gallery-overlay { position: absolute; bottom: 0; left: 0; width: 100%; padding: 15px; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); transform: translateY(100%); transition: 0.3s; }
        .gallery-item:hover .gallery-overlay { transform: translateY(0); }

        /* --- 6. FOOTER --- */
        footer { background-color: #111; padding: 40px 20px; text-align: center; color: #888; border-top: 3px solid #dea057; }
        .footer-logo { width: 40px; margin-bottom: 15px; filter: grayscale(100%); opacity: 0.5; }
        .footer-text { font-size: 0.9rem; margin-bottom: 10px; }
        .copyright { font-size: 0.8rem; margin-top: 20px; border-top: 1px solid #333; padding-top: 20px; }

        /* --- ANIMASI & RESPONSIVE --- */
        @keyframes moveUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

        @media (max-width: 768px) {
            nav { flex-direction: column; padding: 20px; background: #1a1a1a; }
            .nav-links { flex-direction: column; width: 100%; margin-top: 15px; gap: 15px; }
            .section-container { grid-template-columns: 1fr; text-align: center; }
            .hero-title { font-size: 2.2rem; }
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
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="data_advokat.php">Data Advokat</a></li>
            <li><a href="perantara.php">Perantara</a></li>
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

    <div class="hero">
        <div class="hero-content">
            <p class="hero-subtitle">Sistem Informasi Manajemen</p>
            <h1 class="hero-title">
                DPC PERADI<br>PONTIANAK
            </h1>
            <p class="hero-desc">
                Wadah tunggal profesi Advokat yang bebas dan mandiri demi tegaknya hukum dan keadilan, serta menjunjung tinggi kode etik profesi.
            </p>
            <a href="#visi" class="btn-cta">Tentang Kami ↓</a>
        </div>
    </div>

    <section id="visi" class="section-visi">
        <div class="section-container">
            <div class="visi-text">
                <h2>Visi & <span>Misi</span></h2>
                <p><strong>VISI:</strong><br>Menjadi organ negara yang bebas dan mandiri dalam melaksanakan fungsi negara dibidang penegakan hukum.</p>
                <p><strong>MISI:</strong><br>1. Mengangkat Advokat dan melakukan pengawasan.<br>2. Menyelenggarakan pendidikan khusus profesi Advokat.<br>3. Menegakkan kode etik profesi Advokat Indonesia.</p>
                <br>
                <a href="struktur.php" style="color: #dea057; font-weight: bold; text-decoration: none;">Lihat Struktur Pengurus →</a>
            </div>
            <div class="visi-img">
                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1932&auto=format&fit=crop" alt="Meeting Peradi">
            </div>
        </div>
    </section>

    <section class="section-gallery">
        <h2 class="gallery-title">Galeri Kegiatan</h2>
        <span class="gallery-subtitle">Dokumentasi Terbaru DPC PERADI Pontianak</span>
        
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2072&auto=format&fit=crop" alt="Foto 1">
                <div class="gallery-overlay">Sidang Terbuka</div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=1974&auto=format&fit=crop" alt="Foto 2">
                <div class="gallery-overlay">Rapat Kerja 2025</div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?q=80&w=2064&auto=format&fit=crop" alt="Foto 3">
                <div class="gallery-overlay">Pelantikan Anggota</div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1555374018-13a8994ab246?q=80&w=1915&auto=format&fit=crop" alt="Foto 4">
                <div class="gallery-overlay">Sosialisasi Hukum</div>
            </div>
        </div>
        
        <br><br>
        <a href="galeri.php" class="btn-cta">Lihat Semua Galeri</a>
    </section>

    <footer>
        <img src="https://img.icons8.com/ios-filled/100/FFFFFF/law.png" alt="Logo" class="footer-logo">
        <h3 style="color: white; margin-bottom: 10px;">DPC PERADI PONTIANAK</h3>
        <p class="footer-text">Jl. Jenderal Ahmad Yani No. 123, Pontianak, Kalimantan Barat</p>
        <p class="footer-text">Email: sekretariat@peradipontianak.or.id | Telp: (0561) 123456</p>
        <div class="copyright">
            &copy; 2025 DPC PERADI Pontianak. All Rights Reserved. <br>
            Developed by <strong>Tim IT Mahasiswa Polnep</strong>
        </div>
    </footer>

</body>
</html>