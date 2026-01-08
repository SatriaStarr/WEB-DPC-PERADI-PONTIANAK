<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peraturan - DPC PERADI Pontianak</title>
    
    <style>
        /* --- CSS KHUSUS HALAMAN PERATURAN --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f8f9fa; color: #333; }

        /* --- 1. HEADER PAGE (Overlay Hitam Transparan) --- */
        .page-header {
            position: relative; width: 100%; height: 50vh;
            background-image: url('https://images.unsplash.com/photo-1589578527966-fdac0f44566c?q=80&w=2070&auto=format&fit=crop');
            background-size: cover; background-position: center;
            display: flex; align-items: center; justify-content: center; text-align: center;
            margin-top: 0;
        }
        
        .page-header::before { 
            content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(0, 0, 0, 0.6); /* Hitam 60% */
            z-index: 1; 
        }
        
        .header-content { position: relative; z-index: 2; color: white; margin-top: 20px; }
        
        .header-title { 
            font-size: 3rem; font-weight: 800; color: white; 
            text-transform: uppercase; letter-spacing: 2px; 
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5); margin-bottom: 10px;
        }
        .header-subtitle { 
            font-size: 1rem; color: #dea057; font-weight: 700; 
            letter-spacing: 4px; text-transform: uppercase; 
        }

        /* --- 2. LAYOUT KONTEN (SIDEBAR + ISI) --- */
        .layout-wrapper {
            display: none; /* Default Hidden */
            max-width: 1200px;
            margin: 50px auto; 
            min-height: 80vh;
            background: white;
            animation: fadeIn 0.8s;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            align-items: flex-start;
        }
        .layout-wrapper.active { display: flex; }

        /* SIDEBAR KIRI */
        .sidebar-nav {
            width: 280px;
            background: #f1f5f9;
            border-right: 1px solid #e2e8f0;
            flex-shrink: 0;
        }
        
        /* --- FIX SCROLLBAR SIDEBAR --- */
        .nav-list { 
            list-style: none; 
            padding: 0; 
            margin: 0; 
            position: sticky; 
            top: 100px; 
            max-height: 80vh; 
            overflow-y: auto; /* Scroll Vertikal jika panjang */
            overflow-x: hidden; /* HAPUS Scroll Samping yang jelek */
        }

        /* Styling Scrollbar biar Tipis & Elegan */
        .nav-list::-webkit-scrollbar { width: 5px; }
        .nav-list::-webkit-scrollbar-track { background: transparent; }
        .nav-list::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        .nav-list::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        /* Judul Dokumen di Sidebar */
        .nav-list li.main-link {
            background: #1e3a8a;
            color: white;
            padding: 15px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
            border-left: 5px solid #dea057;
        }

        /* Item Menu Sidebar */
        .nav-list li a {
            display: block;
            padding: 12px 20px;
            color: #64748b;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            border-bottom: 1px solid #e2e8f0;
            border-left: 4px solid transparent;
            transition: all 0.2s ease;
            background: #f8f9fa;
            text-align: center;
        }

        .nav-list li a:hover {
            background: white;
            color: #1e3a8a;
            border-left-color: #1e3a8a;
            margin-right: -1px;
            border-right: 1px solid white;
        }

        /* KONTEN KANAN */
        .content-area {
            flex: 1;
            padding: 50px;
            line-height: 1.8;
            font-size: 0.95rem;
            color: #334155;
        }
        
        .doc-header { text-align: center; margin-bottom: 40px; border-bottom: 2px solid #f1f5f9; padding-bottom: 20px; }
        .doc-title { font-size: 1.4rem; font-weight: 800; color: #1e3a8a; text-transform: uppercase; margin-bottom: 10px; }
        .doc-subtitle { font-size: 1rem; font-weight: 700; color: #333; margin-top: 0; }
        
        .bab-title { 
            font-size: 1.1rem; font-weight: 700; color: #1e3a8a; 
            margin-top: 40px; margin-bottom: 15px; 
            padding-left: 15px; border-left: 4px solid #dea057; 
        }
        
        .pasal-title { font-weight: 700; color: #333; margin-top: 20px; display: block; }
        .text-justify { text-align: justify; }
        .poin-list { padding-left: 20px; margin-top: 10px; }
        .pasal-group { scroll-margin-top: 100px; }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        /* Responsif */
        @media (max-width: 768px) {
            .page-header { height: 40vh; }
            .header-title { font-size: 2rem; }
            .layout-wrapper.active { flex-direction: column; }
            .sidebar-nav { width: 100%; border-right: none; border-bottom: 1px solid #eee; }
            .content-area { padding: 25px; }
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

    <?php 
        $dokumen = isset($_GET['doc']) ? $_GET['doc'] : 'uu18'; // Default: UU 18
    ?>

    <header class="page-header">
        <div class="header-content">
            <h1 class="header-title">PRODUK HUKUM & PERATURAN</h1>
            <p class="header-subtitle">Dasar Hukum, Kode Etik & Pedoman Organisasi</p>
        </div>
    </header>

    <div id="uu18" class="layout-wrapper <?php if($dokumen == 'uu18') echo 'active'; ?>">
        <div class="sidebar-nav">
            <ul class="nav-list">
                <li class="main-link">UU NO. 18 2003</li>
                <li><a href="#uu-judul">JUDUL</a></li>
                <li><a href="#uu-bab1">BAB I</a></li>
                <li><a href="#uu-bab2">BAB II</a></li>
                <li><a href="#uu-bab3">BAB III</a></li>
                <li><a href="#uu-bab4">BAB IV</a></li>
                <li><a href="#uu-bab5">BAB V</a></li>
                <li><a href="#uu-bab6">BAB VI</a></li>
                <li><a href="#uu-bab7">BAB VII</a></li>
                <li><a href="#uu-bab8">BAB VIII</a></li>
                <li><a href="#uu-bab9">BAB IX</a></li>
                <li><a href="#uu-bab10">BAB X</a></li>
                <li><a href="#uu-bab11">BAB XI</a></li>
                <li><a href="#uu-bab12">BAB XII</a></li>
                <li><a href="#uu-bab13">BAB XIII</a></li>
                <li><a href="#uu-penjelasan">PENJELASAN</a></li>
            </ul>
        </div>
        <div class="content-area">
            <div id="uu-judul" class="pasal-group">
                <div class="doc-header">
                    <h2 class="doc-title">UNDANG-UNDANG REPUBLIK INDONESIA<br>NOMOR 18 TAHUN 2003</h2>
                    <h3 class="doc-subtitle">TENTANG ADVOKAT</h3>
                </div>
                
                <p style="text-align:center; font-weight:700; margin-bottom:20px;">DENGAN RAHMAT TUHAN YANG MAHA ESA<br>PRESIDEN REPUBLIK INDONESIA,</p>
                
                <p><strong>Menimbang:</strong></p>
                <ol type="a" class="poin-list text-justify">
                    <li>Bahwa Negara Republik Indonesia, sebagai negara hukum berdasarkan Pancasila dan Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, bertujuan mewujudkan tata kehidupan bangsa yang sejahtera, aman, tenteram, tertib, dan berkeadilan;</li>
                    <li>Bahwa kekuasaan kehakiman yang bebas dari segala campur tangan dan pengaruh dari luar, memerlukan profesi Advokat yang bebas, mandiri, dan bertanggung jawab, untuk terselenggaranya suatu peradilan yang jujur, adil, dan memiliki kepastian hukum bagi semua pencari keadilan dalam menegakkan hukum, kebenaran, keadilan, dan hak asasi manusia;</li>
                    <li>Bahwa Advokat sebagai profesi yang bebas, mandiri, dan bertanggung jawab dalam menegakkan hukum, perlu dijamin dan dilindungi oleh undang-undang demi terselenggaranya upaya penegakan supremasi hukum;</li>
                    <li>Bahwa peraturan perundang-undangan yang mengatur tentang Advokat yang berlaku saat ini sudah tidak sesuai lagi dengan kebutuhan hukum masyarakat;</li>
                    <li>Bahwa berdasarkan pertimbangan sebagaimana dimaksud dalam huruf a, huruf b, huruf c, dan huruf d, perlu membentuk Undang-Undang tentang Advokat.</li>
                </ol>

                <br>
                <p><strong>Mengingat:</strong></p>
                <ol type="1" class="poin-list text-justify">
                    <li>Pasal 5 ayat (1) dan Pasal 20 Undang-Undang Dasar Negara Republik Indonesia Tahun 1945;</li>
                    <li>Undang-Undang Nomor 1/Drt/1951 tentang Tindakan-tindakan Sementara Untuk Menyelenggarakan Kesatuan Susunan, Kekuasaan, dan Acara Pengadilan-pengadilan Sipil (Lembaran Negara Tahun 1951 Nomor 9, Tambahan Lembaran Negara Nomor 81);</li>
                    <li>Undang-Undang Nomor 14 Tahun 1970 tentang Ketentuan-ketentuan Pokok Kekuasaaan Kehakiman (Lembaran Negara Republik Indonesia Tahun 1970 Nomor 74, Tambahan Lembaran Negara Republik Indonesia Nomor 2951) sebagaimana telah diubah dengan Undang-undang Nomor 35 Tahun 1999 tentang Perubahan Atas Undang-undang Nomor 14 Tahun 1970 tentang Ketentuan-ketentuan Pokok Kekuasaan Kehakiman (Lembaran Negara Republik Indonesia Tahun 1999 Nomor 147, Tambahan Lembaran Negara Republik Indonesia Nomor 3879);</li>
                </ol>

                <br>
                <p style="text-align:center; font-weight:700;">MEMUTUSKAN:</p>
                <p><strong>Menetapkan: UNDANG-UNDANG TENTANG ADVOKAT.</strong></p>
            </div>

            <div id="uu-bab1" class="pasal-group">
                <h3 class="bab-title">BAB I: KETENTUAN UMUM</h3>
                <span class="pasal-title">Pasal 1</span>
                <p class="text-justify">Dalam Undang-undang ini yang dimaksud dengan:</p>
                <ol class="poin-list">
                    <li><strong>Advokat</strong> adalah orang yang berprofesi memberi jasa hukum, baik di dalam maupun di luar pengadilan yang memenuhi persyaratan berdasarkan ketentuan Undang-Undang ini.</li>
                    <li><strong>Jasa Hukum</strong> adalah jasa yang diberikan Advokat berupa memberikan konsultasi hukum, bantuan hukum, menjalankan kuasa, mewakili, mendampingi, membela, dan melakukan tindakan hukum lain untuk kepentingan hukum klien.</li>
                    <li><strong>Klien</strong> adalah orang, badan hukum, atau lembaga lain yang menerima jasa hukum dari Advokat.</li>
                    <li><strong>Organisasi Advokat</strong> adalah organisasi profesi yang didirikan berdasarkan Undang-Undang ini.</li>
                </ol>
            </div>

            <div id="uu-bab2" class="pasal-group">
                <h3 class="bab-title">BAB II: PENGANGKATAN ADVOKAT</h3>
                <span class="pasal-title">Pasal 2</span>
                <ol class="poin-list">
                    <li>Yang dapat diangkat sebagai Advokat adalah sarjana yang berlatar belakang pendidikan tinggi hukum dan setelah mengikuti pendidikan khusus profesi Advokat yang dilaksanakan oleh Organisasi Advokat.</li>
                    <li>Pengangkatan Advokat dilakukan oleh Organisasi Advokat.</li>
                    <li>Salinan surat keputusan pengangkatan Advokat sebagaimana dimaksud pada ayat (2) disampaikan kepada Mahkamah Agung dan Menteri.</li>
                </ol>
                
                <span class="pasal-title">Pasal 3</span>
                <p class="text-justify">Untuk dapat diangkat menjadi Advokat harus memenuhi persyaratan sebagai berikut:</p>
                <ol type="a" class="poin-list">
                    <li>Warga Negara Republik Indonesia;</li>
                    <li>Bertempat tinggal di Indonesia;</li>
                    <li>Tidak berstatus sebagai pegawai negeri atau pejabat negara;</li>
                    <li>Berusia sekurang-kurangnya 25 (dua puluh lima) tahun;</li>
                    <li>Berijazah sarjana yang berlatar belakang pendidikan tinggi hukum sebagaimana dimaksud dalam Pasal 2 ayat (1);</li>
                    <li>Lulus ujian yang diadakan oleh Organisasi Advokat;</li>
                    <li>Magang sekurang-kurangnya 2 (dua) tahun terus menerus pada kantor Advokat;</li>
                    <li>Tidak pernah dipidana karena melakukan tindak pidana kejahatan yang diancam dengan pidana penjara 5 (lima) tahun atau lebih;</li>
                    <li>Berperilaku baik, jujur, bertanggung jawab, adil, dan mempunyai integritas yang tinggi.</li>
                </ol>
            </div>

            <div id="uu-bab3" class="pasal-group"><h3 class="bab-title">BAB III: PENGAWASAN</h3><p>[Isi BAB III...]</p></div>
            <div id="uu-bab4" class="pasal-group"><h3 class="bab-title">BAB IV: PENINDAKAN</h3><p>[Isi BAB IV...]</p></div>
        </div>
    </div>

    <div id="kodeetik" class="layout-wrapper <?php if($dokumen == 'kodeetik') echo 'active'; ?>">
        <div class="sidebar-nav">
            <ul class="nav-list">
                <li class="main-link">Kode Etik Advokat</li>
                <li><a href="#ke-pembukaan">Pembukaan</a></li>
                <li><a href="#ke-bab1">BAB I - Umum</a></li>
                <li><a href="#ke-bab2">BAB II - Kepribadian</a></li>
            </ul>
        </div>
        <div class="content-area">
            <div id="ke-pembukaan" class="pasal-group">
                <div class="doc-header">
                    <h2 class="doc-title">KODE ETIK ADVOKAT INDONESIA</h2>
                    <h3 class="doc-subtitle">KOMITE KERJA ADVOKAT INDONESIA</h3>
                </div>
                <p class="text-justify"><strong>PEMBUKAAN</strong></p>
                <p class="text-justify">
                    IKATAN ADVOKAT INDONESIA (IKADIN), ASOSIASI ADVOKAT INDONESIA (AAI), IKATAN PENASEHAT HUKUM INDONESIA (IPHI)... menyatakan menerima dan menjadikan KODE ETIK ADVOKAT INDONESIA ini sebagai satu-satunya Kode Etik...
                </p>
            </div>
        </div>
    </div>

    <div id="ad" class="layout-wrapper <?php if($dokumen == 'ad') echo 'active'; ?>">
        <div style="width: 100%; padding: 100px 20px; text-align: center;">
            <i class="fa-solid fa-book-journal-whills fa-4x" style="color: #cbd5e1; margin-bottom: 20px;"></i>
            <h3 style="color: #334155; font-weight:800;">ANGGARAN DASAR (AD)</h3>
            <p style="color: #64748b; margin-top:10px;">Dokumen ini hanya dapat diakses oleh Anggota Terdaftar.</p>
            <br>
            <a href="#" style="color:#1e3a8a; font-weight:700; text-decoration:none; border-bottom:2px solid #dea057;">Login Anggota <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>

    <div id="prt" class="layout-wrapper <?php if($dokumen == 'prt') echo 'active'; ?>">
        <div style="width: 100%; padding: 100px 20px; text-align: center;">
            <i class="fa-solid fa-house-lock fa-4x" style="color: #cbd5e1; margin-bottom: 20px;"></i>
            <h3 style="color: #334155; font-weight:800;">PERATURAN RUMAH TANGGA (PRT)</h3>
            <p style="color: #64748b; margin-top:10px;">Dokumen ini hanya dapat diakses oleh Anggota Terdaftar.</p>
            <br>
            <a href="#" style="color:#1e3a8a; font-weight:700; text-decoration:none; border-bottom:2px solid #dea057;">Login Anggota <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>

    <div id="magang" class="layout-wrapper <?php if($dokumen == 'magang') echo 'active'; ?>">
        <div class="sidebar-nav">
            <ul class="nav-list">
                <li class="main-link">Peraturan Magang</li>
                <li><a href="#pm-judul">Konsideran</a></li>
                <li><a href="#pm-pasal1">Pasal 1 - Definisi</a></li>
            </ul>
        </div>
        <div class="content-area">
            <div id="pm-judul" class="pasal-group">
                <div class="doc-header">
                    <h2 class="doc-title">PERATURAN PERHIMPUNAN ADVOKAT INDONESIA<br>NOMOR 1 TAHUN 2015</h2>
                    <h3 class="doc-subtitle">TENTANG PELAKSANAAN MAGANG</h3>
                </div>
                <p><strong>Menimbang:</strong></p>
                <ol type="a" class="poin-list">
                    <li>Bahwa salah satu persyaratan yang harus dipenuhi untuk dapat diangkat sebagai advokat adalah mengikuti magang...</li>
                </ol>
            </div>
        </div>
    </div>

    <div id="keanggotaan" class="layout-wrapper <?php if($dokumen == 'keanggotaan') echo 'active'; ?>">
        <div class="sidebar-nav">
            <ul class="nav-list">
                <li class="main-link">Peraturan Keanggotaan</li>
                <li><a href="#pk-judul">Konsideran</a></li>
                <li><a href="#pk-pasal">Ketentuan Umum</a></li>
            </ul>
        </div>
        <div class="content-area">
            <div id="pk-judul" class="pasal-group">
                <div class="doc-header">
                    <h2 class="doc-title">PERATURAN PERADI TENTANG KEANGGOTAAN</h2>
                    <h3 class="doc-subtitle">DAFTAR ULANG DAN KARTU TANDA PENGENAL</h3>
                </div>
                <p><strong>Menimbang:</strong></p>
                <p class="text-justify">Bahwa untuk tertib administrasi keanggotaan PERADI, dipandang perlu untuk mengatur ketentuan mengenai pendaftaran ulang...</p>
            </div>
        </div>
    </div>

    <div id="perpindahan" class="layout-wrapper <?php if($dokumen == 'perpindahan') echo 'active'; ?>">
        <div class="sidebar-nav">
            <ul class="nav-list">
                <li class="main-link">Perpindahan Domisili</li>
                <li><a href="#pd-judul">Konsideran</a></li>
                <li><a href="#pd-syarat">Syarat Perpindahan</a></li>
            </ul>
        </div>
        <div class="content-area">
            <div id="pd-judul" class="pasal-group">
                <div class="doc-header">
                    <h2 class="doc-title">PERATURAN PERADI NO. 1 TAHUN 2019</h2>
                    <h3 class="doc-subtitle">TATA CARA PERPINDAHAN DOMISILI ANGGOTA</h3>
                </div>
                <p class="text-justify">Peraturan ini mengatur tata cara dan persyaratan administrasi bagi anggota PERADI yang ingin mengajukan mutasi atau perpindahan domisili ke cabang lain.</p>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>