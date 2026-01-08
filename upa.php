<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPA & Konsultasi - DPC PERADI Pontianak</title>
    
    <style>
        /* --- CSS KHUSUS HALAMAN UPA --- */
        /* (CSS Navbar, Footer, & Reset Dasar sudah dihapus karena dipanggil dari header.php) */

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f8f9fa; color: #333; }

        /* HEADER PAGE KHUSUS UPA (Gambar Ujian/Menulis) */
        .page-header {
            position: relative; width: 100%; height: 50vh;
            background-image: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=2070&auto=format&fit=crop');
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

        /* FITUR KHUSUS UPA: MATERI CARDS */
        .materi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; margin-bottom: 60px; }
        .materi-card {
            background: white; padding: 30px; border-top: 4px solid #1e3a8a;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: 0.3s; position: relative; overflow: hidden; border-radius: 4px;
        }
        .materi-card:hover { transform: translateY(-10px); border-top-color: #dea057; }
        .materi-icon { font-size: 2.5rem; color: #dea057; margin-bottom: 20px; }
        .materi-card h3 { font-size: 1.2rem; margin-bottom: 15px; color: #1e3a8a; font-weight: 700; }
        .materi-card ul { padding-left: 20px; color: #666; font-size: 0.9rem; line-height: 1.6; }

        /* INFO JADWAL BOX */
        .jadwal-box {
            background: #1e3a8a; color: white; padding: 40px; border-radius: 10px;
            display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 20px;
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
        }
        .jadwal-text h3 { font-size: 1.5rem; color: #dea057; margin-bottom: 10px; font-weight: 700; }
        .jadwal-text p { opacity: 0.9; font-weight: 300; }
        
        .btn-daftar { 
            padding: 15px 35px; background: #dea057; color: #1e3a8a; text-decoration: none; 
            font-weight: 700; text-transform: uppercase; letter-spacing: 1px; transition: 0.3s; border-radius: 4px;
        }
        .btn-daftar:hover { background: white; color: #1e3a8a; }

        /* KONSULTASI SECTION */
        .konsultasi-area { background: white; padding: 50px; border-radius: 10px; margin-top: 60px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); display: flex; gap: 40px; align-items: center; }
        .konsul-img { width: 40%; border-radius: 10px; overflow: hidden; }
        .konsul-img img { width: 100%; height: auto; object-fit: cover; }
        .konsul-info { width: 60%; }

        @media (max-width: 768px) {
            .konsultasi-area { flex-direction: column; }
            .konsul-img, .konsul-info { width: 100%; }
            .jadwal-box { text-align: center; justify-content: center; }
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

    <header class="page-header">
        <div class="header-content">
            <h1 class="header-title">UPA & KONSULTASI</h1>
            <p class="header-subtitle">Ujian Profesi Advokat Indonesia</p>
        </div>
    </header>

    <div class="content-section">
        
        <h2 class="section-title">Tentang UPA</h2>
        <p class="text-content">
            Ujian Profesi Advokat (UPA) adalah ujian yang diselenggarakan oleh Organisasi Advokat PERADI bagi para calon advokat yang telah mengikuti Pendidikan Khusus Profesi Advokat (PKPA). 
            Lulus UPA adalah syarat mutlak untuk dapat dilantik dan disumpah menjadi Advokat. Standar kelulusan yang tinggi (Passing Grade) diterapkan demi menjaga kualitas Advokat Indonesia.
        </p>

        <h2 class="section-title">Materi Ujian</h2>
        <p class="text-content">Berikut adalah cakupan materi hukum yang akan diujikan dalam UPA, baik dalam bentuk Pilihan Ganda maupun Essay:</p>
        
        <div class="materi-grid">
            <div class="materi-card">
                <div class="materi-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                <h3>Hukum Acara (Litigasi)</h3>
                <ul>
                    <li>Hukum Acara Perdata</li>
                    <li>Hukum Acara Pidana</li>
                    <li>Hukum Acara Peradilan Agama</li>
                    <li>Hukum Acara PTUN</li>
                    <li>Hukum Acara Mahkamah Konstitusi</li>
                </ul>
            </div>
            
            <div class="materi-card">
                <div class="materi-icon"><i class="fa-solid fa-book-open"></i></div>
                <h3>Materi Non-Litigasi</h3>
                <ul>
                    <li>Hukum Perdata & Pidana (Materiil)</li>
                    <li>Undang-Undang Advokat</li>
                    <li>Kode Etik Profesi Advokat</li>
                    <li>Hukum Perburuhan</li>
                    <li>Hukum Persaingan Usaha</li>
                </ul>
            </div>

            <div class="materi-card">
                <div class="materi-icon"><i class="fa-solid fa-pen-nib"></i></div>
                <h3>Essay (Hukum Acara)</h3>
                <p style="font-size: 0.9rem; color: #666; line-height: 1.6;">
                    Peserta wajib membuat Surat Kuasa dan Surat Gugatan berdasarkan kasus posisi yang diberikan. Ini adalah poin krusial dalam penilaian kelulusan.
                </p>
            </div>
        </div>

        <div class="jadwal-box">
            <div class="jadwal-text">
                <h3><i class="fa-solid fa-calendar-check"></i> Jadwal UPA Gelombang I 2025</h3>
                <p>Pendaftaran dibuka mulai <strong>1 Januari - 28 Februari 2025</strong>. Jangan lewatkan kesempatan ini.</p>
            </div>
            <a href="#" class="btn-daftar">Daftar Ujian Sekarang</a>
        </div>

        <div class="konsultasi-area">
            <div class="konsul-img">
                <img src="https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?q=80&w=1932&auto=format&fit=crop" alt="Bimbingan Belajar">
            </div>
            <div class="konsul-info">
                <h2 class="section-title" style="border:none; padding:0; margin-bottom:15px;">Layanan Konsultasi & Bimbingan</h2>
                <p style="color:#555; margin-bottom:20px;">
                    Merasa belum siap menghadapi UPA? DPC PERADI Pontianak menyediakan program <strong>Try Out & Bedah Soal</strong> intensif. 
                    Dibimbing langsung oleh Advokat senior yang berpengalaman.
                </p>
                <ul style="list-style:none; margin-bottom:30px;">
                    <li style="margin-bottom:10px;"><i class="fa-solid fa-check" style="color:#dea057; margin-right:10px;"></i> Bedah Soal Essay (Gugatan & Kuasa)</li>
                    <li style="margin-bottom:10px;"><i class="fa-solid fa-check" style="color:#dea057; margin-right:10px;"></i> Tips & Trik Menjawab Pilihan Ganda</li>
                    <li style="margin-bottom:10px;"><i class="fa-solid fa-check" style="color:#dea057; margin-right:10px;"></i> Simulasi Ujian Realtime</li>
                </ul>
                <a href="#" style="color:#dea057; font-weight:700; text-decoration:none; border-bottom:2px solid #dea057;">Hubungi Panitia Bimbingan <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>

</body>
</html>