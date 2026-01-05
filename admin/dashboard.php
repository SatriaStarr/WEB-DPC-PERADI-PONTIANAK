<?php
session_start();
include 'koneksi.php'; // ✅ SUDAH DIPERBAIKI (Satu folder dengan dashboard)

// Cek Login
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

// 1. Hitung Total Advokat
// (Menggunakan @ agar tidak error jika tabel kosong/belum ada)
$q_adv = mysqli_query($conn, "SELECT COUNT(*) as total FROM data_advokat");
$total_advokat = 0;
if ($q_adv) {
    $d_adv = mysqli_fetch_assoc($q_adv);
    $total_advokat = $d_adv['total'];
}

// 2. Hitung Pending Verification
$q_pending = mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE status='pending'");
$total_pending = 0;
if ($q_pending) {
    $d_pending = mysqli_fetch_assoc($q_pending);
    $total_pending = $d_pending['total'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PERADI</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', sans-serif; }
        body { background-color: #f4f6f9; display: flex; min-height: 100vh; }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 260px;
            background-color: #1e3a8a; /* Biru PERADI */
            color: white;
            display: flex; flex-direction: column;
            position: fixed; top: 0; left: 0; height: 100%;
            z-index: 100;
        }

        .logo-section {
            padding: 25px 20px;
            display: flex; align-items: center; gap: 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .logo-text h2 { font-size: 1.4rem; font-weight: 800; line-height: 1; }
        .logo-text span { font-size: 0.8rem; letter-spacing: 1px; color: #dea057; }

        .nav-links { list-style: none; padding: 10px 0; flex: 1; overflow-y: auto; }
        .nav-links li a {
            display: flex; align-items: center; gap: 15px;
            padding: 12px 25px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-size: 0.9rem;
            transition: 0.3s;
            border-left: 4px solid transparent;
        }
        .nav-links li a:hover, .nav-links li.active a {
            background-color: #152c69;
            color: white;
            border-left-color: #dea057;
        }
        
        /* Badge Notifikasi */
        .badge {
            background: #ef4444; color: white; padding: 2px 8px;
            border-radius: 10px; font-size: 0.7rem; margin-left: auto; font-weight: bold;
        }

        /* Tombol Logout di Bawah */
        .logout-link { padding: 20px; border-top: 1px solid rgba(255,255,255,0.1); }
        .logout-link a {
            color: #ef4444; text-decoration: none; font-weight: 600; 
            display: flex; align-items: center; gap: 10px;
        }
        .logout-link a:hover { color: #ffadad; }

        /* --- KONTEN KANAN --- */
        .main-content { margin-left: 260px; flex: 1; padding: 40px; }
        
        header { margin-bottom: 30px; }
        header h1 { font-size: 2rem; color: #1e3a8a; font-weight: 700; margin-bottom: 5px; }
        header p { color: #666; }

        /* Cards Overview */
        .cards-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; margin-bottom: 40px;
        }
        .card {
            background: white; padding: 25px; border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            display: flex; justify-content: space-between; align-items: center;
            border-left: 5px solid #1e3a8a;
        }
        .card-info h3 { font-size: 2.2rem; margin-bottom: 5px; color: #333; }
        .card-info p { font-size: 0.9rem; color: #666; }
        .card-icon {
            width: 50px; height: 50px; background: #e0e7ff; color: #1e3a8a;
            border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
        }
        
        .card.orange { border-left-color: #f59e0b; }
        .card.orange .card-icon { background: #fef3c7; color: #d97706; }

        .card.green { border-left-color: #10b981; }
        .card.green .card-icon { background: #d1fae5; color: #059669; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo-section">
            <i class="fa-solid fa-scale-balanced fa-2x"></i>
            <div class="logo-text">
                <h2>PERADI</h2>
                <span>Data Center</span>
            </div>
        </div>

        <ul class="nav-links">
            <li>
                <a href="../index.php">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Layanan Home</span>
                </a>
            </li>

            <hr style="border:0; border-top:1px solid rgba(255,255,255,0.1); margin: 5px 0;">

            <li class="active">
                <a href="dashboard.php">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="data_advokat.php">
                    <i class="fa-solid fa-gavel"></i>
                    <span>Data Advokat</span>
                </a>
            </li>

            <li>
                <a href="peraturan_admin.php">
                    <i class="fa-solid fa-scale-balanced"></i>
                    <span>Peraturan</span>
                </a>
            </li>

            <li>
                <a href="struktur_admin.php">
                    <i class="fa-solid fa-sitemap"></i>
                    <span>Struktur Pengurus</span>
                </a>
            </li>

            <li>
                <a href="layanan_admin.php">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    <span>Layanan</span>
                </a>
            </li>

            <li>
                <a href="galeri_admin.php">
                    <i class="fa-solid fa-image"></i>
                    <span>Galeri</span>
                </a>
            </li>

            <li>
                <a href="verifikasi_admin.php">
                    <i class="fa-solid fa-user-shield"></i>
                    <span>Verifikasi Admin</span>
                    <?php if(isset($total_pending) && $total_pending > 0): ?>
                        <span class="badge"><?php echo $total_pending; ?></span>
                    <?php endif; ?>
                </a>
            </li>
        </ul>

        <div class="logout-link">
            <a href="logout.php" onclick="return confirm('Yakin ingin keluar?')">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h1>Overview</h1>
            <p>Selamat Datang, <strong>Administrator</strong></p>
        </header>

        <div class="cards-grid">
            <div class="card">
                <div class="card-info">
                    <h3><?php echo $total_advokat; ?></h3>
                    <p>Advokat Terdaftar</p>
                </div>
                <div class="card-icon"><i class="fa-solid fa-users"></i></div>
            </div>

            <div class="card orange">
                <div class="card-info">
                    <h3><?php echo $total_pending; ?></h3>
                    <p>Verifikasi Tertunda</p>
                </div>
                <div class="card-icon"><i class="fa-solid fa-user-clock"></i></div>
            </div>

             <div class="card green">
                <div class="card-info">
                    <h3 style="font-size: 1.5rem; color:#059669;">Active</h3>
                    <p>Status Server</p>
                </div>
                <div class="card-icon"><i class="fa-solid fa-server"></i></div>
            </div>
        </div>

        <div style="background:white; height:300px; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#ccc; border:2px dashed #eee;">
            <p>Area Grafik / Aktivitas Terbaru</p>
        </div>
    </div>

</body>
</html>