<?php
session_start();
include 'koneksi.php';

// 1. Cek Login
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

// 2. Hitung Total Advokat
$q_adv = mysqli_query($conn, "SELECT COUNT(*) as total FROM data_advokat");
$total_advokat = ($q_adv) ? mysqli_fetch_assoc($q_adv)['total'] : 0;

// 3. Hitung Pending Verification
$q_pending = mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE status='pending'");
$total_pending = ($q_pending) ? mysqli_fetch_assoc($q_pending)['total'] : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PERADI</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* --- GLOBAL STYLE --- */
        body { font-family: 'Poppins', sans-serif; background-color: #f4f6f9; color: #333; }
        a { text-decoration: none; }

        /* --- SIDEBAR STYLE (Meniru style sidebar.php yg kamu kirim) --- */
        /* Note: Nanti sidebar ini akan kita load pakai PHP include, 
           tapi CSS-nya perlu disiapkan agar sinkron */

        /* --- MAIN CONTENT --- */
        .main-content {
            margin-left: 250px; /* Memberi ruang untuk sidebar */
            padding: 30px;
            transition: 0.3s;
        }

        /* --- PAGE HEADER (Style ala Data Advokat) --- */
        .page-header {
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            margin-bottom: 30px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .header-title h1 { font-size: 1.5rem; font-weight: 700; color: #1e3a8a; margin: 0; }
        .header-title p { color: #888; margin: 5px 0 0 0; font-size: 0.9rem; }
        .user-profile { display: flex; align-items: center; gap: 10px; }
        .user-avatar { width: 40px; height: 40px; background: #e0e7ff; color: #1e3a8a; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; }

        /* --- STAT CARDS --- */
        .cards-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            display: flex; justify-content: space-between; align-items: center;
            border-left: 5px solid #1e3a8a;
            transition: transform 0.3s;
        }
        .stat-card:hover { transform: translateY(-5px); }
        
        .stat-info h3 { font-size: 2.5rem; font-weight: 700; margin: 0; color: #333; }
        .stat-info p { margin: 5px 0 0 0; color: #666; font-size: 0.95rem; font-weight: 500; }
        
        .stat-icon {
            width: 60px; height: 60px;
            background: #f0f4ff; color: #1e3a8a;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
        }

        /* Warna Khusus Card */
        .stat-card.orange { border-left-color: #f59e0b; }
        .stat-card.orange .stat-icon { background: #fffbeb; color: #f59e0b; }
        
        .stat-card.green { border-left-color: #10b981; }
        .stat-card.green .stat-icon { background: #ecfdf5; color: #10b981; }

        /* --- CONTENT SECTION (GRAFIK/RECENT) --- */
        .content-section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            min-height: 300px;
        }
        .section-title { font-size: 1.1rem; font-weight: 700; color: #333; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #eee; }

        /* Responsif HP */
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>

    <?php include 'partials/sidebar.php'; ?> 
    <div class="main-content">
        
        <div class="page-header">
            <div class="header-title">
                <h1>Dashboard Overview</h1>
                <p>Selamat Datang kembali, <strong>Administrator</strong> 👋</p>
            </div>
            <div class="user-profile">
                <div class="text-end me-2 d-none d-sm-block">
                    <span style="display:block; font-weight:600; font-size:0.9rem; color:#333;">Admin Utama</span>
                    <span style="display:block; font-size:0.75rem; color:#888;">Online</span>
                </div>
                <div class="user-avatar">A</div>
            </div>
        </div>

        <div class="cards-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <h3><?php echo $total_advokat; ?></h3>
                    <p>Advokat Terdaftar</p>
                </div>
                <div class="stat-icon">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>

            <div class="stat-card orange">
                <div class="stat-info">
                    <h3><?php echo $total_pending; ?></h3>
                    <p>Verifikasi Tertunda</p>
                </div>
                <div class="stat-icon">
                    <i class="fa-solid fa-user-clock"></i>
                </div>
            </div>

            <div class="stat-card green">
                <div class="stat-info">
                    <h3 style="font-size: 1.8rem;">Stabil</h3>
                    <p>Status Sistem</p>
                </div>
                <div class="stat-icon">
                    <i class="fa-solid fa-server"></i>
                </div>
            </div>
        </div>

        <div class="content-section">
            <h4 class="section-title">Aktivitas Terbaru</h4>
            
            <div style="text-align:center; padding: 50px; color:#ccc; border: 2px dashed #eee; border-radius:8px;">
                <i class="fa-solid fa-chart-area fa-3x mb-3"></i>
                <p>Belum ada aktivitas terbaru hari ini.</p>
                <a href="data_advokat.php" class="btn btn-primary btn-sm mt-2">Kelola Data Advokat</a>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>