<?php
session_start();
include 'koneksi.php';

// 1. Cek Login & Role
if (!isset($_SESSION['status_login']) || $_SESSION['role'] != 'super_admin') {
    header("Location: dashboard.php");
    exit;
}

// 2. LOGIKA HITUNG BADGE (Wajib ada biar badge merah muncul)
$query_pending = mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE status='pending'");
$data_pending = mysqli_fetch_assoc($query_pending);
$jumlah_pending = $data_pending['total'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Admin - PERADI</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <style>
        .btn-action {
            padding: 8px 15px;
            border-radius: 5px;
            color: white;
            font-size: 0.8rem;
            margin-right: 5px;
            transition: 0.3s;
        }

        .btn-approve {
            background: #2ecc71;
        }

        .btn-approve:hover {
            background: #27ae60;
        }

        .btn-reject {
            background: #e74c3c;
        }

        .btn-reject:hover {
            background: #c0392b;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/partials/sidebar.php'; ?>
    <div class="main-content">
        <header>
            <h1>Verifikasi Pendaftaran</h1>
            <p>Kelola permintaan akses admin baru.</p>
        </header>

        <div class="recent-section">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM users WHERE status='pending' ORDER BY created_at DESC");

                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nama_lengkap']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <a href="proses_verifikasi.php?id=<?php echo $row['id_user']; ?>&aksi=terima"
                                        class="btn-action btn-approve"
                                        onclick="return confirm('Terima user ini?')">
                                        <i class="fa-solid fa-check"></i> Terima
                                    </a>
                                    <a href="proses_verifikasi.php?id=<?php echo $row['id_user']; ?>&aksi=tolak"
                                        class="btn-action btn-reject"
                                        onclick="return confirm('Tolak user ini?')">
                                        <i class="fa-solid fa-xmark"></i> Tolak
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='5' align='center'>Tidak ada permintaan baru saat ini.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>