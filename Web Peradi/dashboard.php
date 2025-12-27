<?php
session_start();
include 'koneksi.php';

// Cek Login
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

// Hitung Data untuk Info
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
    <title>Dashboard Portal - PERADI</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* RESET & BASIC */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #f0f2f5; min-height: 100vh; display: flex; flex-direction: column; }

        /* NAVBAR ATAS */
        .navbar {
            background: #1e3a8a; /* Biru PERADI */
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand { display: flex; align-items: center; gap: 10px; font-weight: 700; font-size: 1.2rem; }
        .admin-profile { display: flex; align-items: center; gap: 10px; background: rgba(255,255,255,0.1); padding: 5px 15px; border-radius: 30px; }
        .admin-profile img { width: 30px; height: 30px; border-radius: 50%; background: white; }

        /* CONTAINER UTAMA */
        .container {
            flex: 1;
            padding: 40px 5%;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        /* BAGIAN WELCOME (HERO) */
        .hero-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.03);
            margin-bottom: 40px;
            background-image: url('https://img.freepik.com/free-vector/white-abstract-background-design_23-2148825582.jpg');
            background-size: cover;
        }
        .hero-section h1 { color: #1e3a8a; font-size: 2rem; margin-bottom: 10px; }
        .hero-section p { color: #64748b; font-size: 1.1rem; }

        /* GRID MENU LAYANAN (Ini Intinya!) */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Responsif */
            gap: 25px;
        }

        .menu-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-bottom: 5px solid transparent;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 200px; /* Tinggi seragam */
        }

        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: white;
        }

        .menu-title { font-size: 1.2rem; font-weight: 600; margin-bottom: 5px; }
        .menu-desc { font-size: 0.85rem; color: #888; }
        .notification-badge { background: #ef4444; color: white; padding: 2px 8px; border-radius: 10px; font-size: 0.8rem; margin-left: 5px; }

        /* WARNA-WARNI KARTU */
        .card-advokat .icon-box { background: linear-gradient(135deg, #3b82f6, #2563eb); box-shadow: 0 4px 10px rgba(59,130,246,0.3); }
        .card-advokat:hover { border-bottom-color: #2563eb; }

        .card-verifikasi .icon-box { background: linear-gradient(135deg, #f59e0b, #d97706); box-shadow: 0 4px 10px rgba(245,158,11,0.3); }
        .card-verifikasi:hover { border-bottom-color: #d97706; }

        .card-logout .icon-box { background: linear-gradient(135deg, #ef4444, #dc2626); box-shadow: 0 4px 10px rgba(239,68,68,0.3); }
        .card-logout:hover { border-bottom-color: #dc2626; }

        /* FOOTER */
        footer { text-align: center; padding: 20px; color: #94a3b8; font-size: 0.9rem; }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-brand">
            <i class="fa-solid fa-scale-balanced"></i> PERADI Data Center
        </div>
        <div class="admin-profile">
            <span>Hi, <b><?php echo $_SESSION['username']; ?></b></span>
            <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['username']; ?>&background=random" alt="Admin">
        </div>
    </nav>

    <div class="container">
        
        <div class="hero-section">
            <h1>Selamat Datang di Pusat Data</h1>
            <p>Silakan pilih menu layanan di bawah ini untuk mengelola data organisasi.</p>
        </div>

        <div class="menu-grid">
            
            <a href="data_advokat.php" class="menu-card card-advokat">
                <div class="icon-box">
                    <i class="fa-solid fa-gavel"></i>
                </div>
                <div class="menu-title">Data Advokat</div>
                <div class="menu-desc"><?php echo $total_advokat; ?> Anggota Terdaftar</div>
            </a>

            <a href="verifikasi_admin.php" class="menu-card card-verifikasi">
                <div class="icon-box">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <div class="menu-title">
                    Verifikasi Admin
                    <?php if($total_pending > 0): ?>
                        <span class="notification-badge"><?php echo $total_pending; ?></span>
                    <?php endif; ?>
                </div>
                <div class="menu-desc">Kelola akses pengguna</div>
            </a>

            <a href="logout.php" onclick="return confirm('Yakin ingin keluar?')" class="menu-card card-logout">
                <div class="icon-box">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </div>
                <div class="menu-title">Keluar Sistem</div>
                <div class="menu-desc">Akhiri sesi anda</div>
            </a>

        </div>
    </div>

    <footer>
        &copy; 2025 DPC PERADI Pontianak. All rights reserved.
    </footer>

</body>
</html>