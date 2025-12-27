<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumpah Advokat - DPC PERADI Pontianak</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- STYLE DASAR (KONSISTEN) --- */
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

        /* HEADER PAGE (Gambar Upacara/Formal) */
        .page-header {
            position: relative; width: 100%; height: 50vh;
            background-image: url('https://images.unsplash.com/photo-1555374018-13a8994ab246?q=80&w=1930&auto=format&fit=crop'); /* Gambar Toga/Hakim */
            background-size: cover; background-position: center;
            display: flex; align-items: center; justify-content: center; text-align: center;
        }
        .page-header::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(0,0,0,0.6)); }
        .header-content { position: relative; z-index: 2; color: white; margin-top: 50px; }
        .header-title { font-size: 3rem; font-weight: 800; color: #dea057; text-transform: uppercase; letter-spacing: 2px; }
        .header-subtitle { font-size: 1.2rem; color: white; font-weight: 300; letter-spacing: 4px; margin-top: 10px; text-transform: uppercase; }

        /* KONTEN UTAMA */
        .content-section { padding: 80px 5%; max-width: 1200px; margin: 0 auto; }
        .section-title { font-size: 1.8rem; color: #1a1a1a; margin-bottom: 20px; border-left: 5px solid #dea057; padding-left: 15px; font-weight: 700; text-transform: uppercase; }
        .text-content { font-size: 1rem; line-height: 1.8; color: #555; text-align: justify; margin-bottom: 40px; }

        /* --- VISUALISASI ALUR (TIMELINE) --- */
        .alur-box { display: flex; justify-content: space-between; gap: 20px; margin-bottom: 60px; flex-wrap: wrap; }
        .alur-step { flex: 1; background: white; padding: 30px 20px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-radius: 8px; border-bottom: 4px solid #ddd; transition: 0.3s; }
        .alur-step:hover { transform: translateY(-5px); border-bottom-color: #dea057; }
        .step-number { font-size: 2.5rem; font-weight: 800; color: #f0f0f0; margin-bottom: 10px; }
        .step-icon { color: #dea057; font-size: 2rem; margin-bottom: 15px; }
        .alur-step h4 { margin-bottom: 10px; font-size: 1.1rem; }
        .alur-step p { font-size: 0.85rem; color: #666; }

        /* --- SYARAT LIST (Dua Kolom) --- */
        .syarat-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px; }
        .syarat-col h3 { font-size: 1.3rem; margin-bottom: 20px; color: #1a1a1a; border-bottom: 2px solid #dea057; padding-bottom: 10px; display: inline-block; }
        .check-list { list-style: none; }
        .check-list li { margin-bottom: 15px; display: flex; align-items: flex-start; gap: 12px; color: #555; font-size: 0.95rem; }
        .check-list i { color: #dea057; font-size: 1.1rem; margin-top: 3px; }

        /* --- DOWNLOAD AREA --- */
        .download-area { background: #1a1a1a; color: white; padding: 50px; border-radius: 10px; margin-top: 60px; text-align: center; background-image: url('https://www.transparenttextures.com/patterns/dark-matter.png'); }
        .download-area h2 { color: #dea057; margin-bottom: 15px; text-transform: uppercase; }
        .download-area p { margin-bottom: 30px; color: #ccc; max-width: 700px; margin-left: auto; margin-right: auto; }
        
        .btn-group { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }
        .btn-download { background: transparent; border: 2px solid #dea057; color: #dea057; padding: 12px 25px; text-decoration: none; font-weight: 600; transition: 0.3s; display: flex; align-items: center; gap: 10px; }
        .btn-download:hover { background: #dea057; color: #1a1a1a; }
        .btn-download i { font-size: 1.2rem; }

        /* FOOTER */
        footer { background: #111; color: white; padding: 30px; text-align: center; border-top: 4px solid #dea057; margin-top: 50px; }

        @media (max-width: 768px) {
            .alur-box { flex-direction: column; }
        }
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
                    <a href="pkpa.php">PKPA</a>
                    <a href="upa.php">UPA / Konsultasi</a>
                    <a href="sumpah.php" style="color:#dea057;">Pengangkatan & Sumpah</a>
                </div>
            </li>
            <li><a href="galeri.php">Galeri</a></li>
        </ul>
    </nav>

    <header class="page-header">
        <div class="header-content">
            <h1 class="header-title">PENGANGKATAN & SUMPAH</h1>
            <p class="header-subtitle">Langkah Terakhir Menjadi Officium Nobile</p>
        </div>
    </header>

    <div class="content-section">
        
        <h2 class="section-title">Proses Pelantikan</h2>
        <p class="text-content">
            Berdasarkan UU No. 18 Tahun 2003 tentang Advokat, seseorang yang telah memenuhi persyaratan dapat diangkat sebagai Advokat oleh Organisasi Advokat dan selanjutnya wajib bersumpah di hadapan Sidang Terbuka Pengadilan Tinggi di wilayah domisili hukumnya sebelum menjalankan profesi.
        </p>

        <div class="alur-box">
            <div class="alur-step">
                <div class="step-number">01</div>
                <div class="step-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <h4>Lulus UPA</h4>
                <p>Memiliki sertifikat kelulusan Ujian Profesi Advokat yang sah.</p>
            </div>
            <div class="alur-step">
                <div class="step-number">02</div>
                <div class="step-icon"><i class="fa-solid fa-briefcase"></i></div>
                <h4>Magang 2 Tahun</h4>
                <p>Magang terus-menerus di kantor advokat minimal 2 tahun.</p>
            </div>
            <div class="alur-step">
                <div class="step-number">03</div>
                <div class="step-icon"><i class="fa-solid fa-file-contract"></i></div>
                <h4>Verifikasi Berkas</h4>
                <p>Pengumpulan berkas ke DPC untuk diverifikasi DPN PERADI.</p>
            </div>
            <div class="alur-step">
                <div class="step-number">04</div>
                <div class="step-icon"><i class="fa-solid fa-gavel"></i></div>
                <h4>Sumpah PT</h4>
                <p>Pengambilan sumpah di Pengadilan Tinggi Pontianak.</p>
            </div>
        </div>

        <div class="syarat-container">
            <div class="syarat-col">
                <h3><i class="fa-solid fa-user-check"></i> Syarat Umum</h3>
                <ul class="check-list">
                    <li><i class="fa-solid fa-check"></i> Warga Negara Indonesia (WNI).</li>
                    <li><i class="fa-solid fa-check"></i> Bertempat tinggal di Indonesia.</li>
                    <li><i class="fa-solid fa-check"></i> Tidak berstatus sebagai Pegawai Negeri Sipil atau Pejabat Negara.</li>
                    <li><i class="fa-solid fa-check"></i> Berusia sekurang-kurangnya 25 (dua puluh lima) tahun.</li>
                    <li><i class="fa-solid fa-check"></i> Berijazah Sarjana Hukum (S.H).</li>
                </ul>
            </div>
            
            <div class="syarat-col">
                <h3><i class="fa-solid fa-folder-open"></i> Syarat Administrasi</h3>
                <ul class="check-list">
                    <li><i class="fa-solid fa-check"></i> Fotokopi KTP & Kartu Keluarga (Legalisir).</li>
                    <li><i class="fa-solid fa-check"></i> Fotokopi Ijazah S1 Hukum (Legalisir Basah).</li>
                    <li><i class="fa-solid fa-check"></i> Sertifikat PKPA & UPA (Asli & Fotokopi).</li>
                    <li><i class="fa-solid fa-check"></i> Surat Keterangan Magang dari Kantor Advokat.</li>
                    <li><i class="fa-solid fa-check"></i> SKCK Asli (Keperluan: Pengangkatan Advokat).</li>
                    <li><i class="fa-solid fa-check"></i> Surat Pernyataan Tidak Pernah Dipidana (Materai).</li>
                </ul>
            </div>
        </div>

        <div class="download-area">
            <h2><i class="fa-solid fa-cloud-arrow-down"></i> Pusat Unduhan</h2>
            <p>Silakan unduh formulir kelengkapan berkas di bawah ini. Pastikan mengisi data dengan benar menggunakan tinta hitam dan huruf kapital.</p>
            
            <div class="btn-group">
                <a href="#" class="btn-download">
                    <i class="fa-regular fa-file-pdf"></i> Formulir Pengangkatan
                </a>
                <a href="#" class="btn-download">
                    <i class="fa-regular fa-file-word"></i> Draft Surat Pernyataan
                </a>
                <a href="#" class="btn-download">
                    <i class="fa-solid fa-book"></i> Buku Panduan Magang
                </a>
            </div>
        </div>

    </div>

    <footer>
        <p>&copy; 2025 DPC PERADI Pontianak. All Rights Reserved.</p>
    </footer>

</body>
</html>