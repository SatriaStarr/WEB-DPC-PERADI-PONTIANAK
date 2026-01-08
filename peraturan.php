<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peraturan - DPC PERADI Pontianak</title>
    
    <style>
        /* --- CSS KHUSUS HALAMAN PERATURAN --- */
        /* (CSS Navbar & Footer sudah dihapus dari sini) */

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f4f6f9; color: #333; overflow-x: hidden; }

        /* HEADER PAGE */
        .page-header {
            position: relative; width: 100%; height: 50vh;
            background-image: url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2072&auto=format&fit=crop');
            background-size: cover; background-position: center;
            display: flex; align-items: center; justify-content: center; text-align: center;
            
            /* Margin 0 karena Navbar di header.php sudah Relative */
            margin-top: 0; 
        }
        .page-header::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(30, 58, 138, 0.7); z-index: 1; }
        .header-content { position: relative; z-index: 2; color: white; margin-top: 20px; }
        .header-title { font-size: 3rem; font-weight: 800; text-transform: uppercase; margin-bottom: 10px; }
        .header-subtitle { font-size: 1rem; color: #dea057; letter-spacing: 3px; font-weight: 700; text-transform: uppercase; }

        /* KONTEN TABEL */
        .container { max-width: 1000px; margin: 60px auto; padding: 0 20px; }
        .section-title { text-align: center; margin-bottom: 40px; }
        .section-title h2 { font-size: 2.2rem; font-weight: 800; color: #1e3a8a; margin-bottom: 15px; text-transform: uppercase; }
        .section-title .line { width: 80px; height: 4px; background: #dea057; margin: 0 auto; }

        .law-table {
            width: 100%; border-collapse: collapse; background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); border-radius: 4px; overflow: hidden;
        }
        .law-table thead { background: #1e3a8a; color: white; }
        .law-table th, .law-table td { padding: 15px 20px; text-align: left; }
        .law-table th { font-weight: 700; text-transform: uppercase; font-size: 0.9rem; }
        .law-table td { border-bottom: 1px solid #eee; font-size: 0.95rem; }

        /* Hover Effect Hanya pada Baris Isi */
        .law-table tbody tr:hover { background: #f8fafc; }

        .btn-download {
            color: #1e3a8a; font-weight: 700; text-decoration: none;
            border: 1px solid #1e3a8a; padding: 5px 15px; border-radius: 4px;
            transition: 0.3s; font-size: 0.8rem;
        }
        .btn-download:hover { background: #1e3a8a; color: white; }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

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

    <?php include 'footer.php'; ?>

</body>
</html>