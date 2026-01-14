<?php
session_start();
include 'koneksi.php';

// 1. Cek Login
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

// 2. Ambil Data Galeri
$query = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- CSS UTAMA -->
    <link rel="stylesheet" href="dashboard.css">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .thumb {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
        }
        .thumb:hover {
            transform: scale(1.1);
        }

        .img-modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.7);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .img-modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
        }

        .close-img {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 30px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>

<?php include __DIR__ . '/partials/sidebar.php'; ?>

<div class="main-content">

    <div class="page-header">
        <div>
            <h1>Galeri</h1>
            <p>Kelola galeri foto kegiatan.</p>
        </div>
        <a href="tambah_galeri.php" class="btn-add">
            <i class="fa-solid fa-plus"></i> Tambah Galeri
        </a>
    </div>

    <div class="recent-section">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $no = 1;
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['judul']); ?></td>
                    <td>
                        <?php if (!empty($row['foto'])) : ?>
                            <img src="../uploads/galeri/<?= $row['foto']; ?>"
                                 class="thumb"
                                 onclick="openImg(this.src)">
                        <?php else : ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="hapus_galeri.php?id=<?= $row['id']; ?>"
                           onclick="return confirm('Hapus foto ini?')"
                           style="color:red;">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='4' align='center' style='padding:30px;'>Belum ada foto.</td></tr>";
            }
            ?>

            </tbody>
        </table>
    </div>

</div>

<!-- MODAL IMAGE -->
<div class="img-modal" id="imgModal">
    <span class="close-img" onclick="closeImg()">×</span>
    <img id="imgPreview">
</div>

<script>
function openImg(src) {
    document.getElementById('imgPreview').src = src;
    document.getElementById('imgModal').style.display = 'flex';
}

function closeImg() {
    document.getElementById('imgModal').style.display = 'none';
    document.getElementById('imgPreview').src = '';
}
</script>

</body>
</html>
