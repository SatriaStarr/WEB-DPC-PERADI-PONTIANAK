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

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ========================================
           GLOBAL STYLES
        ======================================== */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        /* ========================================
           MAIN CONTENT AREA
        ======================================== */
        .main-content {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;
            transition: margin-left 0.3s;
        }

        /* ========================================
           ALERT NOTIFICATION
        ======================================== */
        .alert {
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            animation: slideDown 0.4s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-danger {
            background: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fca5a5;
        }

        .alert strong {
            font-weight: 600;
        }

        .btn-close {
            background: transparent;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0.6;
            margin-left: auto;
        }

        .btn-close:hover {
            opacity: 1;
        }

        /* ========================================
           PAGE HEADER
        ======================================== */
        .page-header {
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-title h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e3a8a;
            margin: 0;
        }

        .header-title p {
            color: #888;
            margin: 5px 0 0 0;
            font-size: 0.9rem;
        }

        .header-title strong {
            color: #1e3a8a;
        }

        /* ========================================
           USER PROFILE SECTION
        ======================================== */
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-profile .text-end {
            text-align: right;
        }

        .user-profile .text-end span:first-child {
            display: block;
            font-weight: 600;
            font-size: 0.9rem;
            color: #333;
        }

        .user-profile .text-end span:last-child {
            display: block;
            font-size: 0.75rem;
            color: #10b981;
            font-weight: 500;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
        }

        /* ========================================
           STAT CARDS GRID
        ======================================== */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 5px solid #1e3a8a;
            transition: all 0.3s ease;
            animation: slideUp 0.5s ease-out;
            animation-fill-mode: both;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stat-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stat-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-info h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            color: #333;
            line-height: 1;
        }

        .stat-info p {
            margin: 8px 0 0 0;
            color: #666;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .stat-icon {
            width: 65px;
            height: 65px;
            background: #f0f4ff;
            color: #1e3a8a;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            transition: all 0.3s;
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }

        /* ========================================
           STAT CARD COLOR VARIANTS
        ======================================== */
        .stat-card.orange {
            border-left-color: #f59e0b;
        }

        .stat-card.orange .stat-icon {
            background: #fffbeb;
            color: #f59e0b;
        }

        .stat-card.green {
            border-left-color: #10b981;
        }

        .stat-card.green .stat-icon {
            background: #ecfdf5;
            color: #10b981;
        }

        /* ========================================
           CONTENT SECTION
        ======================================== */
        .content-section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            min-height: 350px;
            animation: fadeIn 0.6s ease-out;
            animation-delay: 0.4s;
            animation-fill-mode: both;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f3f4f6;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: #1e3a8a;
        }

        /* ========================================
           EMPTY STATE
        ======================================== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #9ca3af;
            border: 2px dashed #e5e7eb;
            border-radius: 12px;
            background: #f9fafb;
            transition: all 0.3s;
        }

        .empty-state:hover {
            border-color: #cbd5e1;
            background: #f3f4f6;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.3;
            color: #6b7280;
        }

        .empty-state p {
            font-size: 1rem;
            margin: 10px 0;
            color: #6b7280;
        }

        .empty-state .btn {
            margin-top: 15px;
            padding: 10px 24px;
            background: #1e3a8a;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .empty-state .btn:hover {
            background: #152c69;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
        }

        /* ========================================
           RESPONSIVE DESIGN
        ======================================== */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 15px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .user-profile {
                width: 100%;
                justify-content: space-between;
            }

            .cards-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-info h3 {
                font-size: 2rem;
            }

            .stat-icon {
                width: 55px;
                height: 55px;
                font-size: 1.3rem;
            }

            .content-section {
                padding: 20px;
            }

            .empty-state {
                padding: 40px 15px;
            }

            .empty-state i {
                font-size: 3rem;
            }
        }

        /* ========================================
           UTILITY CLASSES
        ======================================== */
        .d-none {
            display: none;
        }

        .d-sm-block {
            display: none;
        }

        @media (min-width: 576px) {
            .d-sm-block {
                display: block;
            }
        }

        .text-end {
            text-align: right;
        }

        .me-2 {
            margin-right: 0.5rem;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>

    <?php include 'partials/sidebar.php'; ?>

    <div class="main-content">

        <!-- ALERT AKSES DITOLAK -->
        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "no_access"): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <strong>AKSES DITOLAK!</strong> Hanya Admin Utama yang bisa menerima dan menolak!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
            </div>
        <?php endif; ?>

        <!-- PAGE HEADER -->
        <div class="page-header">
            <div class="header-title">
                <h1>Dashboard Overview</h1>
                <p>Selamat Datang kembali, <strong>Administrator</strong> 👋</p>
            </div>
            <div class="user-profile">
                <div class="text-end me-2 d-none d-sm-block">
                    <span>Admin Utama</span>
                    <span>Online</span>
                </div>
                <div class="user-avatar">A</div>
            </div>
        </div>

        <!-- STAT CARDS -->
        <div class="cards-grid">
            <!-- Card 1: Total Advokat -->
            <div class="stat-card">
                <div class="stat-info">
                    <h3><?php echo $total_advokat; ?></h3>
                    <p>Advokat Terdaftar</p>
                </div>
                <div class="stat-icon">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>

            <!-- Card 2: Verifikasi Pending -->
            <div class="stat-card orange">
                <div class="stat-info">
                    <h3><?php echo $total_pending; ?></h3>
                    <p>Verifikasi Tertunda</p>
                </div>
                <div class="stat-icon">
                    <i class="fa-solid fa-user-clock"></i>
                </div>
            </div>

            <!-- Card 3: Status Sistem -->
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

        <!-- AKTIVITAS TERBARU SECTION -->
        <div class="content-section">
            <h4 class="section-title">
                <i class="fa-solid fa-chart-line"></i>
                Aktivitas Terbaru
            </h4>

            <div class="empty-state">
                <i class="fa-solid fa-chart-area"></i>
                <p style="font-weight: 600; font-size: 1.1rem; color: #374151;">Belum ada aktivitas terbaru hari ini</p>
                <p>Mulai kelola data advokat atau verifikasi admin baru untuk melihat aktivitas di sini.</p>
                <a href="data_advokat.php" class="btn">
                    <i class="fa-solid fa-users-gear"></i>
                    Kelola Data Advokat
                </a>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AUTO DISMISS ALERT -->
    <script>
        // Auto-dismiss alert setelah 5 detik
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.animation = 'slideDown 0.4s ease-out reverse';
                    setTimeout(() => {
                        alert.remove();
                    }, 400);
                }, 5000);
            });
        });
    </script>

</body>

</html>