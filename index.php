<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPC PERADI Pontianak - Official Web</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
            position: fixed; /* Fixed agar ikut saat scroll */
            top: 0; left: 0; width: 100%;
            padding: 15px 50px;
            display: flex; justify-content: space-between; align-items: center;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.9); /* Hitam Transparan */
            backdrop-filter: blur(10px);
            transition: 0.3s;
        }

        /* Logo Area */
        .logo-container { display: flex; align-items: center; gap: 15px; text-decoration: none; }
        .logo-img { width: 45px; height: auto; }
        .logo-text { color: white; display: flex; flex-direction: column; }
        .logo-text h3 { font-size: 1.2rem; font-weight: 800; line-height: 1; letter-spacing: 1px; }
        .logo-text span { font-size: 0.7rem; font-weight: 300; letter-spacing: 2px; color: #dea057; }

        /* Menu Links */
        .nav-links { list-style: none; display: flex; gap: 30px; align-items: center; }
        .nav-links li { position: relative; }
        .nav-links a {
            text-decoration: none; color: white;
            font-size: 0.85rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 1px;
            transition: 0.3s ease;
        }
        .nav-links a:hover, .nav-links a.active { color: #dea057; }

        /* --- 3. DROPDOWN MENU (LAYANAN) --- */
        .dropdown { position: relative; }
        .dropdown-content {
            display: none; position: absolute; top: 100%; left: 0;
            background-color: #1a1a1a; min-width: 250px;
            padding-top: 10px; border-top: 3px solid #dea057;
            box-shadow: 0px 10px 30px rgba(0,0,0,0.5);
        }
        .dropdown:hover .dropdown-content { display: block; animation: fadeIn 0.3s ease; }
        .dropdown-content a {
            display: block; padding: 12px 20px; color: #ccc;
            text-transform: none; /* Huruf normal */
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .dropdown-content a:hover { background-color: #333; color: #dea057; padding-left: 25px; }

        /* Tombol Login Admin */
        .btn-login-nav {
            padding: 8px 20px; border: 1px solid #dea057; color: #dea057 !important;
            border-radius: 30px; transition: 0.3s;
        }
        .btn-login-nav:hover { background: #dea057; color: black !important; }

        /* --- 4. HERO SECTION (GAMBAR UTAMA) --- */
        .hero {
            position: relative; width: 100%; height: 100vh;
            /* Ganti gambar di sini */
            background-image: url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2072&auto=format&fit=crop'); 
            background-size: cover; background-position: center; background-attachment: fixed;
            display: flex; align-items: center; justify-content: center; text-align: center;
        }
        /* Overlay Hitam */
        .hero::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); z-index: 1; }
        
        .hero-content { position: relative; z-index: 2; color: white; padding: 0 20px; animation: moveUp 1s ease-out; }
        .hero-subtitle { font-size: 1.1rem; color: #dea057; font-weight: 700; letter-spacing: 4px; margin-bottom: 10px; text-transform: uppercase; }
        .hero-title { font-size: 3.5rem; font-weight: 800; line-height: 1.1; text-transform: uppercase; margin-bottom: 20px; text-shadow: 2px 2px 20px rgba(0, 0, 0, 0.8); }
        .hero-desc { font-size: 1.1rem; font-weight: 300; max-width: 700px; margin: 0 auto 30px auto; color: #e0e0e0; }
        
        .btn-cta {
            display: inline-block; padding: 12px 35px; background: #dea057; color: #1a1a1a;
            text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
            border-radius: 5px; transition: 0.3s;
        }
        .btn-cta:hover { background: white; color: #1a1a1a; transform: translateY(-3px); }

        /* --- 5. VISI MISI --- */
        .section-visi { padding: 100px 5%; background-color: white; }
        .section-container { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
        .visi-text h2 { font-size: 2.5rem; margin-bottom: 25px; text-transform: uppercase; color: #1a1a1a; font-weight: 800; border-left: 5px solid #dea057; padding-left: 20px; }
        .visi-text p { line-height: 1.8; color: #555; margin-bottom: 15px; font-size: 1rem; text-align: justify; }
        .visi-img img { width: 100%; border-radius: 10px; box-shadow: 0 15px 40px rgba(0,0,0,0.15); }

        /* --- 6. GALERI --- */
        .section-gallery { padding: 80px 20px; background-color: #1a1a1a; color: white; text-align: center; }
        .gallery-title { font-size: 2.5rem; margin-bottom: 10px; text-transform: uppercase; color: white; }
        .gallery-subtitle { color: #dea057; letter-spacing: 2px; margin-bottom: 50px; display: block; font-weight: 600; text-transform: uppercase; }
        .gallery-grid { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        
        .gallery-item { position: relative; height: 250px; overflow: hidden; border-radius: 8px; cursor: pointer; }
        .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .gallery-item:hover img { transform: scale(1.1); }
        .gallery-overlay {
            position: absolute; bottom: 0; left: 0; width: 100%; padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
            transform: translateY(100%); transition: 0.3s;
            color: #dea057; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
        }
        .gallery-item:hover .gallery-overlay { transform: translateY(0); }

        /* --- 7. FOOTER --- */
        footer { background-color: #111; padding: 50px 20px; text-align: center; color: #888; border-top: 5px solid #dea057; }
        .footer-logo { width: 50px; margin-bottom: 15px; opacity: 0.8; }
        .footer-text { font-size: 0.9rem; margin-bottom: 10px; }
        .copyright { font-size: 0.8rem; margin-top: 30px; border-top: 1px solid #333; padding-top: 20px; }

        /* ANIMASI */
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes moveUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            nav { padding: 15px 20px; background: #1a1a1a; }
            .nav-links { display: none; } /* Mobile Menu belum dibuat, hide dulu agar rapi */
            .section-container { grid-template-columns: 1fr; }
            .hero-title { font-size: 2.5rem; }
        }
    </style>
</head>

<body>

    <nav>
        <a href="index.php" class="logo-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Logo_Peradi.png" alt="Logo PERADI" class="logo-img">
            <div class="logo-text">
                <h3>PERADI</h3>
                <span>Data Center</span>
            </div>
        </a>

        <ul class="nav-links">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="perantara.php">Perantara</a></li>
            <li><a href="struktur.php">Struktur</a></li>
            
            <li class="dropdown">
                <a href="#">Layanan <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                <div class="dropdown-content">
                    <a href="pkpa.php">PKPA</a>
                    <a href="upa.php">UPA / Konsultasi</a>
                    <a href="sumpah.php">Pengangkatan & Sumpah</a>
                </div>
            </li>

            <li><a href="galeri.php">Galeri</a></li>
            
            <li><a href="login.php" class="btn-login-nav"><i class="fa-solid fa-lock"></i> Admin</a></li>
        </ul>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <p class="hero-subtitle">Sistem Informasi Manajemen</p>
            <h1 class="hero-title">DPC PERADI<br>PONTIANAK</h1>
            <p class="hero-desc">
                Wadah tunggal profesi Advokat yang bebas dan mandiri demi tegaknya hukum dan keadilan, serta menjunjung tinggi kode etik profesi.
            </p>
            <a href="#visi" class="btn-cta">Tentang Kami</a>
        </div>
    </section>

    <section id="visi" class="section-visi">
        <div class="section-container">
            <div class="visi-text">
                <h2>Visi & <span>Misi</span></h2>
                <p><strong>VISI:</strong><br>Menjadi organ negara yang bebas dan mandiri dalam melaksanakan fungsi negara dibidang penegakan hukum.</p>
                <p><strong>MISI:</strong><br>
                    1. Mengangkat Advokat dan melakukan pengawasan.<br>
                    2. Menyelenggarakan pendidikan khusus profesi Advokat.<br>
                    3. Menegakkan kode etik profesi Advokat Indonesia.
                </p>
                <br>
                <a href="struktur.php" style="color: #dea057; font-weight: bold; text-decoration: none; border-bottom: 2px solid #dea057;">Lihat Struktur Pengurus →</a>
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
        <a href="galeri.php" style="color:white; text-decoration: underline;">Lihat Semua Galeri</a>
    </section>

    <footer>
        <h3 style="color: white; margin-bottom: 10px;">DPC PERADI PONTIANAK</h3>
        <p class="footer-text">Jl. Jenderal Ahmad Yani No. 123, Pontianak, Kalimantan Barat</p>
        <p class="footer-text">Email: sekretariat@peradipontianak.or.id | Telp: (0561) 123456</p>
        <div class="copyright">
            &copy; 2025 DPC PERADI Pontianak. All Rights Reserved. <br>
            Developed by <strong>Tim IT Magang</strong>
        </div>
    </footer>

</body>
</html>