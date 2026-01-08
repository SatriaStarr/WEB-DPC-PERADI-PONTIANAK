<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKPA - DPC PERADI Pontianak</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- STYLE DASAR (Konsisten dengan halaman lain) --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f8f9fa; color: #333; }

        /* NAVBAR */
        nav { position: fixed; top: 0; left: 0; width: 100%; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; z-index: 1000; background: rgba(0,0,0,0.9); backdrop-filter: blur(5px); }
        .logo-container { display: flex; align-items: center; gap: 15px; text-decoration: none; }
        .logo-img { width: 45px; height: auto; }
        .logo-text h3 { font-size: 1.1rem; font-weight: 800; color: white; letter-spacing: 1px; }
        .logo-text span { font-size: 0.7rem; font-weight: 300; color: #dea057; letter-spacing: 2px; }
        
        .nav-links { list-style: none; display: flex; gap: 30px; }
        .nav-links a { text-decoration: none; color: white; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; transition: 0.3s; letter-spacing: 1px; }
        .nav-links a:hover, .nav-links a.active { color: #dea057; }

        /* DROPDOWN */
        .dropdown { position: relative; }
        .dropdown-content { display: none; position: absolute; top: 100%; left: 0; background: #1a1a1a; min-width: 220px; padding-top: 10px; border-top: 3px solid #dea057; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        .dropdown:hover .dropdown-content { display: block; }
        .dropdown-content a { display: block; padding: 12px 20px; border-bottom: 1px solid #333; color: #ccc; text-transform: none; font-size: 0.9rem; }
        .dropdown-content a:hover { background: #222; color: #dea057; padding-left: 25px; }

        /* HEADER KHUSUS PKPA */
        .page-header {
            position: relative; width: 100%; height: 50vh;
            /* Foto Background Suasana Belajar/Kampus */
            background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop');
            background-size: cover; background-position: center;
            display: flex; align-items: center; justify-content: center; text-align: center;
        }
        .page-header::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(0,0,0,0.5)); }
        .header-content { position: relative; z-index: 2; color: white; margin-top: 50px; }
        .header-title { font-size: 3rem; font-weight: 800; color: #dea057; text-transform: uppercase; letter-spacing: 2px; }
        .header-subtitle { font-size: 1.2rem; color: white; font-weight: 300; letter-spacing: 4px; margin-top: 10px; text-transform: uppercase; }

        /* KONTEN UTAMA */
        .content-section { padding: 80px 5%; max-width: 1200px; margin: 0 auto; }
        
        .section-title { font-size: 1.8rem; color: #1a1a1a; margin-bottom: 20px; border-left: 5px solid #dea057; padding-left: 15px; font-weight: 700; text-transform: uppercase; }
        .text-content { font-size: 1rem; line-height: 1.8; color: #555; text-align: justify; margin-bottom: 40px; }

        /* TABEL PENYELENGGARA */
        .table-container { margin-top: 40px; overflow-x: auto; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-radius: 8px; }
        .pkpa-table { width: 100%; border-collapse: collapse; background: white; min-width: 800px; }
        .pkpa-table thead { background: #111; color: #dea057; }
        .pkpa-table th, .pkpa-table td { padding: 15px 20px; text-align: left; font-size: 0.9rem; }
        .pkpa-table th { text-transform: uppercase; font-weight: 700; letter-spacing: 1px; }
        .pkpa-table td { border-bottom: 1px solid #eee; color: #444; }
        .pkpa-table tr:hover { background-color: #f9f9f9; }
        
        /* Status Badges */
        .badge { padding: 5px 10px; border-radius: 4px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; display: inline-block; }
        .badge-negeri { background: #e8f5e9; color: #2e7d32; border: 1px solid #2e7d32; }
        .badge-swasta { background: #fff3e0; color: #ef6c00; border: 1px solid #ef6c00; }

        /* SYARAT BOX */
        .syarat-box { background: white; padding: 30px; border-left: 4px solid #dea057; box-shadow: 0 5px 15px rgba(0,0,0,0.05); margin-top: 30px; }
        .syarat-list li { margin-bottom: 10px; list-style: none; display: flex; align-items: center; gap: 10px; }
        .syarat-list i { color: #dea057; }

        /* FOOTER */
        footer { background: #111; color: white; padding: 30px; text-align: center; border-top: 4px solid #dea057; margin-top: 50px; }
    </style>
</head>
<body>

    <nav>
        <a href="index.php" class="logo-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Logo_Peradi.png" alt="Logo" class="logo-img">
            <div class="logo-text"><h3>PERADI</h3><span>Pontianak</span></div>
        </a>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="perantara.php">Perantara</a></li>
            <li><a href="struktur.php">Struktur Pengurus</a></li>
            <li class="dropdown">
                <a href="#" class="active">Layanan ▼</a>
                <div class="dropdown-content">
                    <a href="pkpa.php" style="color:#dea057;">PKPA</a>
                    <a href="upa.php">UPA</a>
                    <a href="sumpah.php">Pengangkatan & Sumpah</a>
                </div>
            </li>
            <li><a href="galeri.php">Galeri</a></li>
        </ul>
    </nav>

    <header class="page-header">
        <div class="header-content">
            <h1 class="header-title">P.K.P.A</h1>
            <p class="header-subtitle">Pendidikan Khusus Profesi Advokat</p>
        </div>
    </header>

    <div class="content-section">
        
        <h2 class="section-title">Deskripsi Program</h2>
        <p class="text-content">
            Pendidikan Khusus Profesi Advokat (PKPA) adalah pendidikan yang wajib diikuti oleh Sarjana Hukum yang ingin menjadi Advokat. 
            Sesuai dengan mandat Undang-Undang Advokat No. 18 Tahun 2003, PERADI bekerjasama dengan Perguruan Tinggi yang fakultas hukumnya minimal terakreditasi B 
            untuk menyelenggarakan pendidikan ini guna mencetak advokat yang profesional, berintegritas, dan berkualitas.
        </p>

        <h2 class="section-title">Daftar Mitra Penyelenggara</h2>
        <p class="text-content">Berikut adalah daftar Universitas dan Institusi di wilayah Kalimantan Barat yang telah bekerjasama resmi dengan DPC PERADI Pontianak untuk menyelenggarakan PKPA:</p>

        <div class="table-container">
            <table class="pkpa-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="35%">Nama Institusi</th>
                        <th width="35%">Alamat Kampus</th>
                        <th width="15%">Kontak</th>
                        <th width="10%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><strong>Universitas Tanjungpura (UNTAN)</strong></td>
                        <td>Jl. Jenderal Ahmad Yani, Pontianak Tenggara</td>
                        <td>(0561) 739630</td>
                        <td><span class="badge badge-negeri">Negeri</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><strong>Universitas Muhammadiyah Pontianak</strong></td>
                        <td>Jl. Jenderal Ahmad Yani No. 111</td>
                        <td>(0561) 764571</td>
                        <td><span class="badge badge-swasta">Swasta</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><strong>Universitas Panca Bhakti (UPB)</strong></td>
                        <td>Jl. Kom. Yos Sudarso, Pontianak Barat</td>
                        <td>(0561) 772627</td>
                        <td><span class="badge badge-swasta">Swasta</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><strong>IAIN Pontianak</strong></td>
                        <td>Jl. Letjend Suprapto No. 19</td>
                        <td>(0561) 734170</td>
                        <td><span class="badge badge-negeri">Negeri</span></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><strong>Universitas Kapuas Sintang</strong></td>
                        <td>Jl. Y.C. Oevang Oeray No. 92, Sintang</td>
                        <td>(0565) 21586</td>
                        <td><span class="badge badge-swasta">Swasta</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="syarat-box">
            <h3 style="margin-bottom: 15px; color:#1a1a1a;">Persyaratan Peserta PKPA</h3>
            <ul class="syarat-list">
                <li><i class="fa-solid fa-check"></i> Fotokopi Ijazah S1 Hukum yang telah dilegalisir (basah) sebanyak 3 lembar.</li>
                <li><i class="fa-solid fa-check"></i> Fotokopi KTP yang masih berlaku sebanyak 3 lembar.</li>
                <li><i class="fa-solid fa-check"></i> Pas Foto berwarna latar merah ukuran 4x6 (4 lembar) dan 3x4 (4 lembar).</li>
                <li><i class="fa-solid fa-check"></i> Membayar biaya pendaftaran dan biaya pendidikan sesuai ketentuan mitra penyelenggara.</li>
            </ul>
        </div>

    </div>

    <footer>
        <p>&copy; 2025 DPC PERADI Pontianak. All Rights Reserved.</p>
    </footer>

</body>
</html>