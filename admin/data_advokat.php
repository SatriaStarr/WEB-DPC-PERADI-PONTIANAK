<?php
session_start();
include 'koneksi.php';

// 1. Cek Keamanan (Wajib Login)
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

// 2. Logika Badge Sidebar (Biar Notifikasi Tetap Muncul)
$query_pending = mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE status='pending'");
$data_pending = mysqli_fetch_assoc($query_pending);
$jumlah_pending = $data_pending['total'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS UTAMA -->
    <link rel="stylesheet" href="dashboard.css">

    <!-- ✅ CSS VIEWER (TAMBAHKAN DI SINI) -->
    <link rel="stylesheet" href="assets/css/viewer.css">
    <style>
        /* Header Action (Tombol Tambah & Search) */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .btn-add {
            background: #2ecc71;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-add:hover {
            background: #27ae60;
            transform: translateY(-2px);
        }

        /* Badge Status Advokat */
        .badge-status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .bg-aktif {
            background: #dcfce7;
            color: #16a34a;
        }

        .bg-cuti {
            background: #fef9c3;
            color: #ca8a04;
        }

        .bg-non_aktif {
            background: #fee2e2;
            color: #dc2626;
        }

        .bg-meninggal {
            background: #f3f4f6;
            color: #4b5563;
        }

        /* Tombol Aksi (Detail/Edit/Hapus) */
        .action-links {
            display: flex;
            gap: 10px;
        }

        /* Jaga jarak antar tombol */
        .action-links a {
            font-size: 1.1rem;
            transition: 0.2s;
        }

        .btn-detail {
            color: #3b82f6;
        }

        /* Biru */
        .btn-edit {
            color: #f59e0b;
        }

        /* Kuning */
        .btn-delete {
            color: #ef4444;
        }

        /* Merah */

        .btn-detail:hover,
        .btn-edit:hover,
        .btn-delete:hover {
            transform: scale(1.2);
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/partials/sidebar.php'; ?>
    <div class="main-content">
        <div class="page-header">
            <div>
                <h1>Data Advokat</h1>
                <p>Kelola data anggota PERADI.</p>
            </div>
            <a href="tambah_advokat.php" class="btn-add">
                <i class="fa-solid fa-plus"></i> Tambah Anggota
            </a>
        </div>

        <div class="recent-section">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIA</th>
                        <th>Nama Lengkap</th>
                        <th>Kantor Hukum</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // Ambil semua data advokat urut dari yang terbaru
                    $query = mysqli_query($conn, "SELECT * FROM data_advokat ORDER BY created_at ASC");

                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            // Tentukan Warna Status
                            $status_class = '';
                            if ($row['status_keanggotaan'] == 'aktif') $status_class = 'bg-aktif';
                            else if ($row['status_keanggotaan'] == 'cuti') $status_class = 'bg-cuti';
                            else if ($row['status_keanggotaan'] == 'non_aktif') $status_class = 'bg-non_aktif';
                            else $status_class = 'bg-meninggal';
                    ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><b><?php echo $row['nia']; ?></b></td>
                                <td>
                                    <?php echo $row['nama_lengkap']; ?><br>
                                    <small style="color:#888;"><?php echo $row['no_hp']; ?></small>
                                </td>
                                <td><?php echo $row['nama_kantor_hukum']; ?></td>
                                <td>
                                    <span class="badge-status <?php echo $status_class; ?>">
                                        <?php echo ucfirst($row['status_keanggotaan']); ?>
                                    </span>
                                </td>

                                <td class="action-links">
                                    <a href="detail_advokat.php?id=<?php echo $row['id_advokat']; ?>" class="btn-detail" title="Lihat Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="edit_advokat.php?id=<?php echo $row['id_advokat']; ?>" class="btn-edit" title="Edit Data">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <a href="hapus_advokat.php?id=<?php echo $row['id_advokat']; ?>" class="btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus data <?php echo $row['nama_lengkap']; ?>?')" title="Hapus Data">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='6' align='center' style='padding:30px;'>Belum ada data advokat. Silakan tambah data baru.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- 🔔 REALTIME LISTENER -->
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
    <script>
        const socket = io("http://80.80.80.135:3000");

        socket.on("data-updated", () => {
            location.reload();
        });
    </script>
    
<!-- JS VIEWER -->
<script src="assets/js/viewer.js" defer></script>

</body>

</html>