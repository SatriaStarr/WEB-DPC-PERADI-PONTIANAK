<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Pengurus - DPC PERADI Pontianak</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* CSS DASAR */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f9f9f9; color: #333; }

        /* NAVBAR */
        nav {
            position: absolute; top: 0; left: 0; width: 100%;
            padding: 20px 50px; display: flex; justify-content: space-between; align-items: center;
            z-index: 100; background: rgba(0,0,0,0.8);
        }
        .logo-container { display: flex; align-items: center; gap: 15px; text-decoration: none; }
        .logo-img { width: 45px; height: auto; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3)); }
        .logo-text { color: white; display: flex; flex-direction: column; }
        .logo-text h3 { font-size: 1.2rem; font-weight: 800; line-height: 1; }
        .logo-text span { font-size: 0.8rem; font-weight: 300; letter-spacing: 1px; }
        
        .nav-links { list-style: none; display: flex; gap: 30px; align-items: center; }
        .nav-links li { position: relative; }
        .nav-links a { text-decoration: none; color: white; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; transition: 0.3s; padding-bottom: 5px; }
        .nav-links a:hover, .nav-links a.active { color: #dea057; }
        
        /* DROPDOWN */
        .dropdown-content { display: none; position: absolute; top: 100%; left: 0; background: rgba(0,0,0,0.9); min-width: 250px; padding-top: 10px; border-top: 3px solid #dea057; border-radius: 0 0 5px 5px; }
        .dropdown:hover .dropdown-content { display: block; animation: fadeIn 0.3s; }
        .dropdown-content a { display: block; padding: 12px 20px; color: white; text-transform: none; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .dropdown-content a:hover { background-color: #333; color: #dea057; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

        /* HERO HEADER */
        .page-header {
            position: relative; width: 100%; height: 50vh;
            background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=2084&auto=format&fit=crop');
            background-size: cover; background-position: center;
            display: flex; align-items: center; justify-content: center; text-align: center;
        }
        .page-header::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); z-index: 1; }
        .header-content { position: relative; z-index: 2; color: white; margin-top: 40px; }
        .header-title { font-size: 3rem; font-weight: 800; text-transform: uppercase; }

        /* STRUKTUR CONTENT */
        .container { max-width: 1000px; margin: 50px auto; padding: 0 20px; text-align: center; }
        .pengurus-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; margin-top: 40px; }
        .pengurus-card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: 0.3s; }
        .pengurus-card:hover { transform: translateY(-10px); }
        .foto-profil { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin-bottom: 20px; border: 4px solid #dea057; }
        .nama { font-weight: 700; font-size: 1.1rem; margin-bottom: 5px; }
        .jabatan { color: #dea057; font-weight: 600; font-size: 0.9rem; text-transform: uppercase; }
        
        .ketua-section { margin-bottom: 50px; }
        .ketua-card { max-width: 350px; margin: 0 auto; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); }
    </style>
</head>
<body>

    <nav>
        <a href="index.php" class="logo-container">
            <img src="https://img.icons8.com/ios-filled/100/FFFFFF/law.png" alt="Logo PERADI" class="logo-img">
            <div class="logo-text">
                <h3>PERADI</h3>
                <span>Data Center</span>
            </div>
        </a>

        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="data_advokat.php">Data Advokat</a></li>
            <li><a href="perantara.php">Perantara</a></li>
            <li><a href="struktur.php" class="active">Struktur</a></li>
            
            <li class="dropdown">
                <a href="#">Layanan ▼</a>
                <ul class="dropdown-content">
                    <li><a href="layanan.php#pkpa">PKPA</a></li>
                    <li><a href="layanan.php#upa">UPA / Konsultasi</a></li>
                    <li><a href="layanan.php#sumpah">Pengangkatan & Sumpah</a></li>
                </ul>
            </li>

            <li><a href="galeri.php">Galeri</a></li>
        </ul>
    </nav>

    <header class="page-header">
        <div class="header-content">
            <h1 class="header-title">Struktur Organisasi</h1>
            <p style="color: #dea057; letter-spacing: 2px; font-weight:600;">Periode 2025 - 2030</p>
        </div>
    </header>

    <div class="container">
        <div class="ketua-section">
            <div class="ketua-card">
                <img src="https://via.placeholder.com/150" alt="Ketua" class="foto-profil">
                <h3 class="nama">Nama Ketua DPC</h3>
                <p class="jabatan">Ketua DPC</p>
            </div>
        </div>

        <div class="pengurus-grid">
            <div class="pengurus-card">
                <img src="https://via.placeholder.com/150" alt="Sekretaris" class="foto-profil">
                <h3 class="nama">Nama Sekretaris</h3>
                <p class="jabatan">Sekretaris</p>
            </div>
            <div class="pengurus-card">
                <img src="https://via.placeholder.com/150" alt="Bendahara" class="foto-profil">
                <h3 class="nama">Nama Bendahara</h3>
                <p class="jabatan">Bendahara</p>
            </div>
            <div class="pengurus-card">
                <img src="https://via.placeholder.com/150" alt="Bidang" class="foto-profil">
                <h3 class="nama">Nama Kabid</h3>
                <p class="jabatan">Ketua Bidang Pendidikan</p>
            </div>
        </div>
    </div>

</body>
</html>