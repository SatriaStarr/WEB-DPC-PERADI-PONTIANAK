<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- CSS UTAMA -->
    <link rel="stylesheet" href="dashboard.css">

    <!-- CSS VIEWER (PAKAI YANG SAMA DENGAN PERATURAN) -->
    <link rel="stylesheet" href="assets/css/viewer.css">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .thumb {
            width: 90px;
            height: 65px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            border: 1px solid #e5e7eb;
        }

        .thumb:hover {
            transform: scale(1.05);
        }

        .action-links {
            display: flex;
            gap: 10px;
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
                    if (mysqli_num_rows($query) > 0):
                        while ($row = mysqli_fetch_assoc($query)):
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($row['judul']); ?></td>

                                <td>
                                    <?php if (!empty($row['foto']) && file_exists("../uploads/galeri/" . $row['foto'])): ?>
                                        <img src="../uploads/galeri/<?= $row['foto']; ?>"
                                            class="thumb"
                                            onclick="openImageViewer(
                                     '<?= htmlspecialchars($row['judul'], ENT_QUOTES); ?>',
                                     '../uploads/galeri/<?= $row['foto']; ?>'
                                 )">
                                    <?php else: ?>
                                        <span style="color:#9ca3af;">Tidak ada</span>
                                    <?php endif; ?>
                                </td>

                                <td class="action-links">

                                    <!-- LIHAT -->
                                    <a href="#"
                                        onclick="openViewer(
           '<?= htmlspecialchars($row['judul'], ENT_QUOTES); ?>',
           '../uploads/galeri/<?= $row['foto']; ?>'
       )"
                                        title="Lihat">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <!-- EDIT -->
                                    <a href="edit_galeri.php?id=<?= $row['id']; ?>" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#"
                                        class="btn-delete"
                                        onclick="openDeleteModal(<?= $row['id']; ?>)"
                                        title="Hapus Foto">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile;
                    else: ?>
                        <tr>
                            <td colspan="4" align="center" style="padding:30px;">
                                Belum ada foto galeri.
                            </td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- VIEWER MODAL (STRUKTUR SAMA DENGAN PERATURAN) -->
    <div class="viewer-overlay" id="imageViewer">
        <div class="viewer-container">
            <div class="viewer-header">
                <h3 id="viewerTitle">Foto</h3>
                <span class="viewer-close" onclick="closeImageViewer()">
                    <i class="fa-solid fa-xmark"></i>
                </span>
            </div>
            <div class="viewer-body" style="text-align:center;">
                <img id="viewerImage" style="max-width:100%; max-height:80vh;">
            </div>
        </div>
    </div>

    <script>
        function openImageViewer(title, imageUrl) {
            document.getElementById('viewerTitle').innerText = title;
            document.getElementById('viewerImage').src = imageUrl;
            document.getElementById('imageViewer').style.display = 'flex';
        }

        function closeImageViewer() {
            document.getElementById('viewerImage').src = '';
            document.getElementById('imageViewer').style.display = 'none';
        }
    </script>

    <!-- DELETE MODAL (SAMA PERSIS DENGAN PERATURAN) -->
    <?php include 'partials/confirm_delete_modal.php'; ?>

    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById('confirmDeleteModal');
            const yesBtn = document.getElementById('confirmDeleteYes');

            yesBtn.href = 'hapus_galeri.php?id=' + id;
            modal.style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('confirmDeleteModal').style.display = 'none';
        }
    </script>

</body>

</html>