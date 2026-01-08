<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKPA - DPC PERADI Pontianak</title>
    
    <style>
        /* --- CSS KHUSUS HALAMAN PKPA --- */
        /* (CSS Navbar, Footer, & Reset Dasar sudah dihapus karena dipanggil dari header.php) */

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f8f9fa; color: #333; }

        /* HEADER PAGE (Gambar Kampus/Belajar) */
        .page-header {
            position: relative; width: 100%; height: 50vh;
            background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop');
            background-size: cover; background-position: center;
            display: flex; align-items: center; justify-content: center; text-align: center;
            
            /* Margin 0 karena Navbar di header.php sudah Relative */
            margin-top: 0; 
        }
        .page-header::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(30, 58, 138, 0.8), rgba(30, 58, 138, 0.5)); z-index: 1; }
        .header-content { position: relative; z-index: 2; color: white; margin-top: 20px; }
        .header-title { font-size: 3rem; font-weight: 800; color: #dea057; text-transform: uppercase; letter-spacing: 2px; text-shadow: 2px 2px 10px rgba(0,0,0,0.3); }
        .header-subtitle { font-size: 1.2rem; color: white; font-weight: 300; letter-spacing: 4px; margin-top: 10px; text-transform: uppercase; }

        /* KONTEN UTAMA */
        .content-section { padding: 80px 5%; max-width: 1200px; margin: 0 auto; }
        
        .section-title { font-size: 1.8rem; color: #1e3a8a; margin-bottom: 20px; border-left: 5px solid #dea057; padding-left: 15px; font-weight: 700; text-transform: uppercase; }
        .text-content { font-size: 1rem; line-height: 1.8; color: #555; text-align: justify; margin-bottom: 40px; }

        /* TABEL PENYELENGGARA */
        .table-container { margin-top: 40px; overflow-x: auto; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-radius: 8px; }
        .pkpa-table { width: 100%; border-collapse: collapse; background: white; min-width: 800px; }
        .pkpa-table thead { background: #1e3a8a; color: white; }
        .pkpa-table th, .pkpa-table td { padding: 15px 20px; text-align: left; font-size: 0.9rem; }
        .pkpa-table th { text-transform: uppercase; font-weight: 700; letter-spacing: 1px; }
        .pkpa-table td { border-bottom: 1px solid #eee; color: #444; }
        .pkpa-table tr:hover { background-color: #f9f9f9; }
        
        /* Status Badges */
        .badge { padding: 5px 10px; border-radius: 4px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; display: inline-block; }
        .badge-negeri { background: #e8f5e9; color: #2e7d32; border: 1px solid #2e7d32; }
        .badge-swasta { background: #fff3e0; color: #ef6c00; border: 1px solid #ef6c00; }

        /* SYARAT BOX */
        .syarat-box { background: white; padding: 30px; border-left: 4px solid #dea057; box-shadow: 0 5px 15px rgba(0,0,0,0.05); margin-top: 30px; border-radius: 4px; }
        .syarat-list li { margin-bottom: 10px; list-style: none; display: flex; align-items: center; gap: 10px; font-size: 0.95rem; }
        .syarat-list i { color: #dea057; font-size: 1.1rem; }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

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
            <h3 style="margin-bottom: 15px; color:#1e3a8a; font-weight: 700;">Persyaratan Peserta PKPA</h3>
            <ul class="syarat-list">
                <li><i class="fa-solid fa-check-circle"></i> Fotokopi Ijazah S1 Hukum yang telah dilegalisir (basah) sebanyak 3 lembar.</li>
                <li><i class="fa-solid fa-check-circle"></i> Fotokopi KTP yang masih berlaku sebanyak 3 lembar.</li>
                <li><i class="fa-solid fa-check-circle"></i> Pas Foto berwarna latar merah ukuran 4x6 (4 lembar) dan 3x4 (4 lembar).</li>
                <li><i class="fa-solid fa-check-circle"></i> Membayar biaya pendaftaran dan biaya pendidikan sesuai ketentuan mitra penyelenggara.</li>
            </ul>
        </div>

    </div>

    <?php include 'footer.php'; ?>

</body>
</html>