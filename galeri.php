<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - DPC PERADI Pontianak</title>
    
    <style>
        /* --- CSS KHUSUS HALAMAN GALERI --- */
        /* (CSS Navbar & Footer sudah dihapus dari sini karena dipanggil lewat PHP) */

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f4f4f4; color: #333; }
        
        /* HEADER PAGE (Gambar Judul Halaman) */
        .page-header { 
            position: relative; width: 100%; height: 50vh; 
            background-image: url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=2070&auto=format&fit=crop'); 
            background-size: cover; background-position: center; 
            display: flex; align-items: center; justify-content: center; text-align: center; 
            
            /* Margin 0 karena Navbar di header.php posisinya Relative (tidak menumpuk) */
            margin-top: 0; 
        }
        .page-header::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(30, 58, 138, 0.7); z-index: 1; }
        .header-content { position: relative; z-index: 2; color: white; margin-top: 20px; }
        .header-title { font-size: 3rem; font-weight: 800; text-transform: uppercase; }

        /* GALERI GRID */
        .container { max-width: 1200px; margin: 50px auto; padding: 0 20px; }
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 15px; }
        .gallery-item { position: relative; overflow: hidden; height: 250px; border-radius: 5px; cursor: pointer; }
        .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; }
        .gallery-item:hover img { transform: scale(1.1); }
        
        /* Overlay Teks pada Foto */
        .overlay { 
            position: absolute; bottom: 0; left: 0; width: 100%; 
            background: rgba(30, 58, 138, 0.9); /* Biru Transparan */
            color: white; padding: 15px; 
            transform: translateY(100%); transition: 0.3s; 
            font-weight: 700; text-transform: uppercase; font-size: 0.9rem; text-align: center;
        }
        .gallery-item:hover .overlay { transform: translateY(0); }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>


    <header class="page-header">
        <div class="header-content">
            <h1 class="header-title">Galeri Kegiatan</h1>
            <p style="color: #dea057; letter-spacing: 2px; font-weight: 600;">DOKUMENTASI DPC PERADI PONTIANAK</p>
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
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73" alt="Foto 5">
                <div class="overlay">Sidang Terbuka</div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40" alt="Foto 6">
                <div class="overlay">Diskusi Hukum</div>
            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>

</body>
</html>