<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumpah Advokat - DPC PERADI Pontianak</title>
    
    <style>
        /* --- CSS KHUSUS HALAMAN SUMPAH --- */
        /* (CSS Navbar, Footer, & Reset Dasar sudah dihapus karena dipanggil dari header.php) */

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f8f9fa; color: #333; }

        /* HEADER PAGE (Gambar Upacara/Formal) */
        .page-header {
            position: relative; width: 100%; height: 50vh;
            background-image: url('https://images.unsplash.com/photo-1555374018-13a8994ab246?q=80&w=1930&auto=format&fit=crop'); /* Gambar Toga/Hakim */
            background-size: cover; background-position: center;
            display: flex; align-items: center; justify-content: center; text-align: center;
            
            /* Margin 0 karena Navbar di header.php sudah Relative */
            margin-top: 0; 
        }
        .page-header::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(30, 58, 138, 0.8), rgba(30, 58, 138, 0.6)); z-index: 1; }
        .header-content { position: relative; z-index: 2; color: white; margin-top: 20px; }
        .header-title { font-size: 3rem; font-weight: 800; color: #dea057; text-transform: uppercase; letter-spacing: 2px; text-shadow: 2px 2px 10px rgba(0,0,0,0.3); }
        .header-subtitle { font-size: 1.2rem; color: white; font-weight: 300; letter-spacing: 4px; margin-top: 10px; text-transform: uppercase; }

        /* KONTEN UTAMA */
        .content-section { padding: 80px 5%; max-width: 1200px; margin: 0 auto; }
        .section-title { font-size: 1.8rem; color: #1e3a8a; margin-bottom: 20px; border-left: 5px solid #dea057; padding-left: 15px; font-weight: 700; text-transform: uppercase; }
        .text-content { font-size: 1rem; line-height: 1.8; color: #555; text-align: justify; margin-bottom: 40px; }

        /* VISUALISASI ALUR (TIMELINE) */
        .alur-box { display: flex; justify-content: space-between; gap: 20px; margin-bottom: 60px; flex-wrap: wrap; }
        .alur-step { flex: 1; background: white; padding: 30px 20px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-radius: 8px; border-bottom: 4px solid #ddd; transition: 0.3s; }
        .alur-step:hover { transform: translateY(-5px); border-bottom-color: #dea057; }
        .step-number { font-size: 2.5rem; font-weight: 800; color: #f0f0f0; margin-bottom: 10px; }
        .step-icon { color: #dea057; font-size: 2rem; margin-bottom: 15px; }
        .alur-step h4 { margin-bottom: 10px; font-size: 1.1rem; color: #333; }
        .alur-step p { font-size: 0.85rem; color: #666; }

        /* SYARAT LIST (Dua Kolom) */
        .syarat-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px; }
        .syarat-col h3 { font-size: 1.3rem; margin-bottom: 20px; color: #1e3a8a; border-bottom: 2px solid #dea057; padding-bottom: 10px; display: inline-block; font-weight: 700; }
        .check-list { list-style: none; }
        .check-list li { margin-bottom: 15px; display: flex; align-items: flex-start; gap: 12px; color: #555; font-size: 0.95rem; }
        .check-list i { color: #dea057; font-size: 1.1rem; margin-top: 3px; }

        /* DOWNLOAD AREA */
        .download-area { background: #1e3a8a; color: white; padding: 50px; border-radius: 10px; margin-top: 60px; text-align: center; background-image: url('https://www.transparenttextures.com/patterns/dark-matter.png'); }
        .download-area h2 { color: #dea057; margin-bottom: 15px; text-transform: uppercase; font-weight: 700; }
        .download-area p { margin-bottom: 30px; color: #ccc; max-width: 700px; margin-left: auto; margin-right: auto; }
        
        .btn-group { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }
        .btn-download { background: transparent; border: 2px solid #dea057; color: #dea057; padding: 12px 25px; text-decoration: none; font-weight: 600; transition: 0.3s; display: flex; align-items: center; gap: 10px; border-radius: 4px; }
        .btn-download:hover { background: #dea057; color: #1e3a8a; }
        .btn-download i { font-size: 1.2rem; }

        @media (max-width: 768px) {
            .alur-box { flex-direction: column; }
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

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

    <?php include 'footer.php'; ?>

</body>
</html>