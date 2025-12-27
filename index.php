<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPC PERADI Pontianak - Home</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* --- 1. RESET & DASAR --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            background-color: #1a1a1a;
        }

        /* --- 2. HEADER & NAVBAR --- */
        nav {
            position: absolute; /* Agar menumpuk di atas gambar */
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100; /* Pastikan di paling atas */
        }

        /* Logo Area */
        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
        }

        .logo-img {
            width: 50px; /* Sesuaikan ukuran logo */
            height: auto;
            filter: drop-shadow(0 0 5px rgba(0,0,0,0.5));
        }

        .logo-text {
            color: white;
            display: flex;
            flex-direction: column;
        }

        .logo-text h3 {
            font-size: 1.2rem;
            font-weight: 800;
            line-height: 1;
        }

        .logo-text span {
            font-size: 0.8rem;
            font-weight: 300;
            opacity: 0.9;
        }

        /* Menu Links */
        .nav-links {
            list-style: none;
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s ease;
            padding: 5px 0;
        }

        /* Efek Hover & Active */
        .nav-links a:hover, 
        .nav-links a.active {
            color: #dea057; /* Warna Emas/Oranye */
        }
        
        /* Garis bawah pada menu aktif */
        .nav-links a.active {
            border-bottom: 2px solid #dea057;
        }

        /* --- 3. DROPDOWN MENU (LAYANAN) --- */
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: rgba(0, 0, 0, 0.9); /* Hitam transparan */
            min-width: 250px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.3);
            z-index: 1;
            padding-top: 10px;
            border-top: 3px solid #dea057;
            border-radius: 0 0 5px 5px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        .dropdown-content li {
            width: 100%;
        }

        .dropdown-content a {
            display: block;
            padding: 12px 20px;
            color: #fff;
            text-transform: none; /* Huruf normal */
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .dropdown-content a:hover {
            background-color: #333;
            color: #dea057;
            padding-left: 25px; /* Efek geser dikit saat hover */
        }

        /* --- 4. HERO SECTION (GAMBAR UTAMA) --- */
        .hero {
            position: relative;
            width: 100%;
            height: 100vh; /* Tinggi memenuhi layar */
            
            /* --- GANTI GAMBAR BACKGROUND DI SINI --- */
            /* Saya pakai gambar gedung random dari Unsplash sebagai contoh */
            background-image: url('admin/image/peradi-tower.jpg');
            
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* Overlay Hitam Transparan */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6); /* Gelap 60% agar tulisan terbaca */
            z-index: 1;
        }

        /* Konten Teks */
        .hero-content {
            position: relative;
            z-index: 2;
            padding: 0 20px;
            color: white;
            animation: moveUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: #dea057; /* Warna Oranye */
            font-weight: 700;
            letter-spacing: 4px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .hero-title {
            font-size: 4rem; /* Ukuran Besar */
            font-weight: 800;
            line-height: 1.1;
            text-transform: uppercase;
            margin-bottom: 20px;
            text-shadow: 2px 2px 20px rgba(0,0,0,0.8);
        }

        .hero-desc {
            font-size: 1.2rem;
            font-weight: 300;
            max-width: 600px;
            margin: 0 auto 30px auto;
            color: #e0e0e0;
        }

        /* Tombol Login (Opsional, agar mudah masuk admin) */
        .btn-login {
            display: inline-block;
            padding: 10px 30px;
            border: 2px solid white;
            color: white;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.3s;
            margin-top: 20px;
        }

        .btn-login:hover {
            background-color: #dea057;
            border-color: #dea057;
            color: white;
        }

        /* --- 5. ANIMASI & RESPONSIVE --- */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes moveUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Tampilan HP */
        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                padding: 20px;
                background: rgba(0,0,0,0.9); /* Header jadi hitam pekat di HP */
            }
            .nav-links {
                flex-direction: column;
                margin-top: 20px;
                gap: 15px;
                width: 100%;
            }
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-subtitle {
                font-size: 0.9rem;
            }
            .dropdown-content {
                position: relative;
                background: transparent;
                box-shadow: none;
                text-align: center;
                border-top: none;
            }
        }
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
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="#">Perantara</a></li>
            <li><a href="#">Struktur Pengurus</a></li>
            
            <li class="dropdown">
                <a href="#">Layanan ▼</a>
                <ul class="dropdown-content">
                    <li><a href="#">PKPA</a></li>
                    <li><a href="#">UPA / Konsultasi</a></li>
                    <li><a href="#">Pengangkatan & Sumpah</a></li>
                </ul>
            </li>

            <li><a href="#">Galeri</a></li>
        </ul>
    </nav>

    <div class="hero">
        <div class="hero-content">
            <p class="hero-subtitle">Sistem Informasi Manajemen</p>
            <h1 class="hero-title">
                DPC PERADI<br>
                PONTIANAK
            </h1>
            <p class="hero-desc">
                Wadah tunggal profesi Advokat yang bebas dan mandiri demi tegaknya hukum dan keadilan.
            </p>
            
            </div>
    </div>

</body>
</html>