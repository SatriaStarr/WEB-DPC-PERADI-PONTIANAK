<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - DPC PERADI Pontianak</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* STYLE SAMA */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f4f4f4; color: #333; }
        
        /* NAVBAR (TEMA BIRU) */
        nav {
            position: absolute; top: 0; left: 0; width: 100%;
            padding: 20px 50px; display: flex; justify-content: space-between; align-items: center;
            z-index: 100; background: rgba(30, 58, 138, 0.95); /* Biru Tua Solid */
            border-bottom: 3px solid #dea057;
        }
        .logo-container { display: flex; align-items: center; gap: 15px; text-decoration: none; }
        .logo-text { color: white; display: flex; flex-direction: column; }
        .logo-text h3 { font-size: 1.2rem; font-weight: 800; line-height: 1; }
        .logo-text span { font-size: 0.8rem; font-weight: 300; letter-spacing: 1px; color: #dea057; }
        
        .nav-links { list-style: none; display: flex; gap: 20px; align-items: center; }
        .nav-links li { position: relative; }
        .nav-links a { text-decoration: none; color: white; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; transition: 0.3s; padding-bottom: 5px; }
        .nav-links a:hover, .nav-links a.active { color: #dea057; }
        
        /* DROPDOWN */
        .dropdown { position: relative; }
        .dropdown-content { display: none; position: absolute; top: 100%; left: 0; background: #1e3a8a; min-width: 250px; padding-top: 10px; border-top: 3px solid #dea057; border-radius: 0 0 5px 5px; }
        .dropdown:hover .dropdown-content { display: block; animation: fadeIn 0.3s; }
        .dropdown-content a { display: block; padding: 12px 20px; color: white; text-transform: none; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .dropdown-content a:hover { background-color: #152c69; color: #dea057; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

        /* HEADER */
        .page-header { position: relative; width: 100%; height: 50vh; background-image: url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=2070&auto=format&fit=crop'); background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center; text-align: center; }
        .page-header::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(30, 58, 138, 0.7); z-index: 1; }
        .header-content { position: relative; z-index: 2; color: white; margin-top: 40px; }
        .header-title { font-size: 3rem; font-weight: 800; text-transform: uppercase; }

        /* GALERI GRID */
        .container { max-width: 1200px; margin: 50px auto; padding: 0 20px; }
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 15px; }
        .gallery-item { position: relative; overflow: hidden; height: 250px; border-radius: 5px; cursor: pointer; }
        .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; }
        .gallery-item:hover img { transform: scale(1.1); }
        .overlay { position: absolute; bottom: 0; left: 0; width: 100%; background: rgba(30, 58, 138, 0.8); color: white; padding: 10px; transform: translateY(100%); transition: 0.3s; }
        .gallery-item:hover .overlay { transform: translateY(0); }

        /* FOOTER (RATA TENGAH - SAMA DENGAN PERATURAN) */
        footer { background-color: #1e3a8a; padding: 60px 20px; text-align: center; color: white; border-top: 5px solid #dea057; margin-top: 80px; }
        .footer-text { margin-bottom: 10px; }
        .copyright { font-size: 0.85rem; margin-top: 40px; border-top: 1px solid rgba(255, 255, 255, 0.1); padding-top: 20px; color: #cbd5e1; }

        @media (max-width: 768px) {
            nav { flex-direction: column; padding: 20px; background: #1e3a8a; }
            .nav-links { flex-direction: column; width: 100%; text-align: center; margin-top: 20px; gap: 15px; }
        }
    </style>
</head>
<body>

    <nav>
        <a href="index.php" class="logo-container">
            <i class="fa-solid fa-scale-balanced fa-2x" style="color: white;"></i>
            <div class="logo-text">
                <h3>PERADI</h3>
                <span>Data Center</span>
            </div>
        </a>

        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="peraturan.php">Peraturan</a></li>
            <li><a href="struktur.php">Struktur</a></li>
            
            <li class="dropdown">
                <a href="#">Layanan <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                <ul class="dropdown-content">
                    <li><a href="layanan.php#pkpa">PKPA</a></li>
                    <li><a href="layanan.php#upa">UPA / Konsultasi</a></li>
                    <li><a href="layanan.php#sumpah">Pengangkatan & Sumpah</a></li>
                </ul>
            </li>

            <li><a href="galeri.php" class="active">Galeri</a></li>
            
            </ul>
    </nav>

    <header class="page-header">
        <div class="header-content">
            <h1 class="header-title">Galeri Kegiatan</h1>
            <p style="color: #dea057; letter-spacing: 2px;">Dokumentasi DPC PERADI Pontianak</p>
        </div>
    </header>

    <div class="container">
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7" alt="Foto 1">
                <div class="overlay">Musyawarah Cabang</div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1577962917302-cd874c4e31d2" alt="Foto 2">
                <div class="overlay">Pelantikan Anggota</div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952" alt="Foto 3">
                <div class="overlay">Rapat Kerja 2024</div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1575089976121-8ed7b2a54265" alt="Foto 4">
                <div class="overlay">Bakti Sosial</div>
            </div>
        </div>
    </div>

    <footer>
        <i class="fa-solid fa-scale-balanced fa-3x" style="color: white; margin-bottom: 20px;"></i>
        <h3 style="color: white; margin-bottom: 10px; font-weight:800; letter-spacing:1px;">DPC PERADI PONTIANAK</h3>
        <p class="footer-text">Jl. Jenderal Ahmad Yani No. 123, Pontianak, Kalimantan Barat</p>
        <p class="footer-text">Email: sekretariat@peradipontianak.or.id | Telp: (0561) 123456</p>
        
        <div class="copyright">
            &copy; 2025 DPC PERADI Pontianak. All Rights Reserved. <br>
            Developed by <strong>Tim IT Magang</strong>
        </div>
    </footer>

</body>
</html>