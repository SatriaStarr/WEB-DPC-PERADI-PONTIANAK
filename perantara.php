<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peraturan - DPC PERADI Pontianak</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- 1. RESET --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f4f6f9; color: #333; overflow-x: hidden; }

        /* --- 2. NAVBAR (SOLID) --- */
        nav {
            position: fixed; top: 0; left: 0; width: 100%;
            padding: 15px 50px; display: flex; justify-content: space-between; align-items: center;
            z-index: 1000; background-color: #1e3a8a; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-bottom: 3px solid #dea057;
        }
        .logo-container { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .logo-text { color: white; display: flex; flex-direction: column; }
        .logo-text h3 { font-size: 1.3rem; font-weight: 800; line-height: 1; letter-spacing: 0.5px; }
        .logo-text span { font-size: 0.75rem; font-weight: 400; letter-spacing: 2px; color: #dea057; }

        .nav-links { list-style: none; display: flex; gap: 30px; align-items: center; }
        .nav-links li { position: relative; }
        .nav-links a { text-decoration: none; color: white; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; transition: 0.3s; opacity: 0.9; }
        .nav-links a:hover, .nav-links a.active { color: #dea057; opacity: 1; }

        /* Dropdown */
        .dropdown { position: relative; }
        .dropdown-content { display: none; position: absolute; top: 100%; left: 0; background-color: #1e3a8a; min-width: 240px; padding-top: 10px; border-top: 2px solid #dea057; }
        .dropdown:hover .dropdown-content { display: block; animation: fadeIn 0.3s; }
        .dropdown-content a { display: block; padding: 12px 20px; color: white; text-transform: none; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .dropdown-content a:hover { background-color: #152c69; color: #dea057; padding-left: 25px; }

        /* --- 3. HERO HEADER --- */
        .page-header {
            position: relative; width: 100%; height: 50vh;
            background-image: url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2072&auto=format&fit=crop'); /* Gambar Palu Hakim */
            background-size: cover; background-position: center;
            display: flex; align-items: center; justify-content: center; text-align: center; margin-top: 60px;
        }
        .page-header::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(30, 58, 138, 0.7); z-index: 1; }
        .header-content { position: relative; z-index: 2; color: white; margin-top: 20px; }
        .header-title { font-size: 3rem; font-weight: 800; text-transform: uppercase; margin-bottom: 10px; }
        .header-subtitle { font-size: 1rem; color: #dea057; letter-spacing: 3px; font-weight: 700; text-transform: uppercase; }

        /* --- 4. KONTEN PERATURAN (Tabel) --- */
        .container { max-width: 1000px; margin: 60px auto; padding: 0 20px; }
        .section-title { text-align: center; margin-bottom: 40px; }
        .section-title h2 { font-size: 2.2rem; font-weight: 800; color: #1e3a8a; margin-bottom: 15px; text-transform: uppercase; }
        .section-title .line { width: 80px; height: 4px; background: #dea057; margin: 0 auto; }

        .law-table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-radius: 4px; overflow: hidden; }
        .law-table thead { background: #1e3a8a; color: white; }
        .law-table th, .law-table td { padding: 15px 20px; text-align: left; }
        .law-table th { font-weight: 700; text-transform: uppercase; font-size: 0.9rem; }
        .law-table td { border-bottom: 1px solid #eee; font-size: 0.95rem; }
        .law-table tr:hover { background: #f8fafc; }
        .btn-download { color: #1e3a8a; font-weight: 700; text-decoration: none; border: 1px solid #1e3a8a; padding: 5px 15px; border-radius: 4px; transition: 0.3s; font-size: 0.8rem; }
        .btn-download:hover { background: #1e3a8a; color: white; }

        /* --- 5. FOOTER --- */
        footer { background-color: #1e3a8a; padding: 60px 20px; text-align: center; color: white; border-top: 5px solid #dea057; margin-top: 80px; }
        .copyright { font-size: 0.85rem; margin-top: 40px; border-top: 1px solid rgba(255, 255, 255, 0.1); padding-top: 20px; color: #cbd5e1; }

        @media (max-width: 768px) { nav { padding: 15px 20px; } .nav-links { display: none; } .header-title { font-size: 2rem; } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
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
            <li><a href="peraturan.php" class="active">Peraturan</a></li>
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
        </ul>
    </nav>

    <header class="page-header">
        <div class="header-content">
            <div class="header-subtitle">Dasar Hukum & Etika</div>
            <h1 class="header-title">Peraturan & Kode Etik</h1>
        </div>
    </header>

    <div class="container">
        <div class="section-title">
            <h2>Produk Hukum & Regulasi</h2>
            <div class="line"></div>
        </div>

        <table class="law-table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="75%">Nama Peraturan / Dokumen</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><strong>Undang-Undang No. 18 Tahun 2003</strong> <br> <span style="font-size:0.85rem; color:#666;">Tentang Advokat</span></td>
                    <td><a href="#" class="btn-download"><i class="fa-solid fa-file-pdf"></i> Download</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><strong>Kode Etik Advokat Indonesia</strong> <br> <span style="font-size:0.85rem; color:#666;">Pedoman Perilaku Profesi</span></td>
                    <td><a href="#" class="btn-download"><i class="fa-solid fa-file-pdf"></i> Download</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><strong>Peraturan PERADI No. 1 Tahun 2006</strong> <br> <span style="font-size:0.85rem; color:#666;">Tentang Pelaksanaan Magang</span></td>
                    <td><a href="#" class="btn-download"><i class="fa-solid fa-file-pdf"></i> Download</a></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><strong>AD / ART PERADI</strong> <br> <span style="font-size:0.85rem; color:#666;">Anggaran Dasar & Anggaran Rumah Tangga</span></td>
                    <td><a href="#" class="btn-download"><i class="fa-solid fa-file-pdf"></i> Download</a></td>
                </tr>
            </tbody>
        </table>
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