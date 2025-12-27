<?php
session_start();
include 'koneksi.php';

// --- TAMBAHAN BARU: ANTI CACHE (Supaya tombol Back tidak berfungsi) ---
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
// ---------------------------------------------------------------------

// Cek Login
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}
// 2. HITUNG DATA REALTIME DARI DATABASE
// Hitung jumlah admin yang masih pending (butuh verifikasi)
$query_pending = mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE status='pending'");
$data_pending = mysqli_fetch_assoc($query_pending);
$jumlah_pending = $data_pending['total'];

// Hitung total advokat (Kita anggap tabel data_advokat sudah ada/nanti dibuat)
// Pakai error handling biar gak error kalau tabel belum ada
$jumlah_advokat = 0;
$cek_tabel = mysqli_query($conn, "SHOW TABLES LIKE 'data_advokat'");
if(mysqli_num_rows($cek_tabel) > 0){
    $query_advokat = mysqli_query($conn, "SELECT COUNT(*) as total FROM data_advokat");
    $data_advokat = mysqli_fetch_assoc($query_advokat);
    $jumlah_advokat = $data_advokat['total'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PERADI Data Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dashboard.css">
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
                <a href="verifikasi_admin.php" class="menu-verifikasi">
                    <i class="fa-solid fa-user-shield"></i>
                    <span>Verifikasi Admin</span>
                    <?php if($jumlah_pending > 0): ?>
                        <span class="badge"><?php echo $jumlah_pending; ?></span>
                    <?php endif; ?>
                </a>
            </li>
        </ul>

        <div class="logout-section">
            <a href="logout.php" id="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <div class="main-content">
        <header>
            <div class="header-title">
                <h1>Overview</h1>
                <p>Selamat Datang, <b><?php echo $_SESSION['username']; ?></b></p>
            </div>
            <div class="user-profile">
                <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['username']; ?>&background=0D8ABC&color=fff" alt="Profile">
            </div>
        </header>

        <div class="cards-grid">
            <div class="card">
                <div class="card-info">
                    <h3>Total Advokat</h3>
                    <h1><?php echo $jumlah_advokat; ?></h1>
                    <small>Terdaftar Aktif</small>
                </div>
                <div class="card-icon blue">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>

            <div class="card">
                <div class="card-info">
                    <h3>Verifikasi Tertunda</h3>
                    <h1><?php echo $jumlah_pending; ?></h1>
                    <small>Admin Baru</small>
                </div>
                <div class="card-icon orange">
                    <i class="fa-solid fa-user-clock"></i>
                </div>
            </div>

            <div class="card">
                <div class="card-info">
                    <h3>Status Server</h3>
                    <h1 style="color: #2ecc71; font-size: 1.5rem;">Online</h1>
                    <small>Database Terhubung</small>
                </div>
                <div class="card-icon green">
                    <i class="fa-solid fa-server"></i>
                </div>
            </div>
        </div>

        <div class="recent-section">
            <div class="section-header">
                <h3>Permintaan Akses Terbaru</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Status</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Ambil 5 user terbaru yang pending
                    $query_recent = mysqli_query($conn, "SELECT * FROM users WHERE status='pending' ORDER BY created_at DESC LIMIT 5");
                    
                    if(mysqli_num_rows($query_recent) > 0) {
                        while($row = mysqli_fetch_assoc($query_recent)) {
                            echo "<tr>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['nama_lengkap'] . "</td>";
                            echo "<td><span class='status pending'>Pending</span></td>";
                            echo "<td>" . $row['created_at'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' align='center'>Tidak ada permintaan baru.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('btn-logout').addEventListener('click', function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin keluar?',
                text: "Sesi Anda akan berakhir.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';
                }
            })
        });
    </script>
</body>
</html>