<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM struktur_pengurus ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struktur Pengurus - PERADI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONT & ICON -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS UTAMA -->
    <link rel="stylesheet" href="dashboard.css">

    <!-- VIEWER -->
    <link rel="stylesheet" href="assets/css/viewer.css">
    <script src="assets/js/viewer.js" defer></script>
</head>

<body>

<?php include __DIR__ . '/partials/sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <div>
            <h1>Struktur Pengurus</h1>
            <p>Kelola data pengurus organisasi.</p>
        </div>

        <a href="tambah_pengurus.php" class="btn-add">
            <i class="fa-solid fa-plus"></i> Tambah Pengurus
        </a>
    </div>

    <div class="recent-section">
        <!-- tabel struktur pengurus -->
    </div>
</div>


    <div class="recent-section">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['jabatan']); ?></td>
                    <td>
                        <?php if ($row['foto']) { ?>
                            <img src="../uploads/struktur/<?= $row['foto']; ?>"
                                 style="width:40px;height:40px;object-fit:cover;border-radius:6px;">
                        <?php } else { echo '-'; } ?>
                    </td>
                    <td class="action-links">
                        <?php if ($row['foto']) { ?>
                            <a href="javascript:void(0)"
                               onclick="openImage(
                                   '../uploads/struktur/<?= $row['foto']; ?>',
                                   '<?= htmlspecialchars($row['nama']); ?>'
                               )"
                               title="Lihat Foto">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/partials/viewer_modal.php'; ?>

</body>
</html>
