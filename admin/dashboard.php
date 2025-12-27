<?php
session_start();
include 'koneksi.php';

// Cek Login
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

// Hitung Data (Opsional, biar admin tetap tau info sekilas)
$q_advokat = mysqli_query($conn, "SELECT COUNT(*) as total FROM data_advokat");
$d_advokat = mysqli_fetch_assoc($q_advokat);
$total_advokat = $d_advokat['total'];

$q_pending = mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE status='pending'");
$d_pending = mysqli_fetch_assoc($q_pending);
$total_pending = $d_pending['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERADI Data Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* RESET DASAR */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        
        body {
            /* Ganti URL ini dengan foto gedung PERADI kamu */
            background-image: url('../image/peradi-tower.jpg'); 
            /* Atau gunakan path lokal jika ada: background-image: url('image/gedung_peradi.jpg'); */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            overflow: hidden; /* Supaya tidak ada scroll */
        }

        /* OVERLAY GELAP (Biar tulisan putih terbaca jelas) */
        .overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6); /* Gelap 60% */
            z-index: 1;
        }

        /* NAVBAR TRANSPARAN (Menu Atas) */
        .navbar {
            position: relative;
            z-index: 10;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 50px;
            width: 100%;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
        }
        .logo-area img { height: 50px; } /* Sesuaikan tinggi logo */
        .logo-text h2 { font-size: 1.2rem; font-weight: 700; letter-spacing: 1px; }
        .logo-text span { font-size: 0.8rem; letter-spacing: 2px; text-transform: uppercase; display: block; }

        /* MENU NAVIGASI (TEXT ONLY - SEPERTI PERMINTAANMU) */
        .nav-menu {
            display: flex;
            gap: 30px;
        }

        .nav-menu a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
            position: relative;
        }

        /* Efek Garis Bawah saat Hover */
        .nav-menu a::after {
            content: '';
            position: absolute;
            width: 0; height: 2px;
            bottom: -5px; left: 0;
            background-color: #f59e0b; /* Warna Kuning Emas */
            transition: 0.3s;
        }
        .nav-menu a:hover { color: white; }
        .nav-menu a:hover::after { width: 100%; }
        
        /* Badge Notifikasi Merah Kecil */
        .badge-dot {
            width: 8px; height: 8px; background: #ef4444; border-radius: 50%;
            display: inline-block; position: absolute; top: -2px; right: -8px;
        }

        /* KONTEN TENGAH (JUDUL BESAR) */
        .hero-content {
            position: relative;
            z-index: 5;
            height: 80vh; /* Sisa tinggi layar */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: #f59e0b; /* Kuning Emas */
            margin-bottom: 10px;
            font-weight: 600;
        }

        .hero-title {
            font-size: 4rem; /* Tulisan Super Besar */
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 20px;
            text-transform: uppercase;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
        }

        .stats-row {
            display: flex;
            gap: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.3);
            padding-top: 30px;
        }
        .stat-item h3 { font-size: 2.5rem; font-weight: 700; margin-bottom: 0; }
        .stat-item p { font-size: 0.9rem; opacity: 0.8; text-transform: uppercase; letter-spacing: 1px; }

    </style>
</head>
<body>

    <div class="overlay"></div>

    <nav class="navbar">
        <div class="logo-area">
            <i class="fa-solid fa-scale-balanced fa-2x"></i> 
            <div class="logo-text">
                <h2>PERADI</h2>
                <span>Data Center</span>
            </div>
        </div>

        <div class="nav-menu">
            
            
            <a href="verifikasi_admin.php">
                Verifikasi Admin
                <?php if($total_pending > 0): ?>
                    <span class="badge-dot"></span>
                <?php endif; ?>
            </a>
            
            <a href="#" style="cursor: default; opacity: 0.5;">|</a> <a href="#" style="cursor: default;">Hi, <?php echo $_SESSION['username']; ?></a>
            <a href="logout.php" onclick="return confirm('Keluar dari sistem?')" style="color: #ef4444;">Logout</a>
        </div>
    </nav>

    <div class="hero-content">
        <div class="hero-subtitle">Sistem Informasi Manajemen</div>
        <div class="hero-title">
            DPC PERADI<br>PONTIANAK
        </div>

        <div class="stats-row">
            <div class="stat-item">
                <h3><?php echo $total_advokat; ?></h3>
                <p>Advokat Terdaftar</p>
            </div>
            <div class="stat-item">
                <h3>Active</h3>
                <p>Status Server</p>
            </div>
        </div>
    </div>

</body>
</html>