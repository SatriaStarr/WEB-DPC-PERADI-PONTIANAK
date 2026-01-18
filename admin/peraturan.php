<?php
session_start();
include 'koneksi.php';

// 1. Cek Login
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

// 2. Ambil Data Peraturan
$query = mysqli_query($conn, "SELECT * FROM peraturan ORDER BY created_at DESC");
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

    <!-- ✅ CSS VIEWER (TAMBAHKAN DI SINI) -->
    <link rel="stylesheet" href="assets/css/viewer.css">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* HEADER */
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
            text-decoration: none;
        }

        .btn-add:hover {
            background: #27ae60;
            transform: translateY(-2px);
        }

        /* AKSI */
        .action-links {
            display: flex;
            gap: 10px;
        }

        .action-links a {
            font-size: 1.1rem;
            transition: 0.2s;
        }

        .btn-detail {
            color: #3b82f6;
        }

        .btn-detail:hover {
            transform: scale(1.2);
        }

        .pdf-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
        }

        .pdf-content {
            width: 90%;
            height: 90%;
            background: #fff;
            margin: 3% auto;
            border-radius: 12px;
            position: relative;
            overflow: hidden;
        }

        .pdf-content iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .close-btn {
            position: absolute;
            top: 12px;
            right: 18px;
            font-size: 28px;
            cursor: pointer;
            color: #333;
        }
    </style>
</head>

<!-- PDF MODAL -->
<div id="pdfModal" class="pdf-modal">
    <div class="pdf-content">
        <span class="close-btn" onclick="closePdf()">×</span>
        <iframe id="pdfFrame"></iframe>
    </div>
</div>

<script>
    function openPdf(url) {
        document.getElementById("pdfFrame").src = url;
        document.getElementById("pdfModal").style.display = "block";
    }

    function closePdf() {
        document.getElementById("pdfFrame").src = "";
        document.getElementById("pdfModal").style.display = "none";
    }
</script>

<body>

    <?php include __DIR__ . '/partials/sidebar.php'; ?>

    <div class="main-content">

        <div class="page-header">
            <div>
                <h1>Peraturan</h1>
                <p>Kelola peraturan resmi PERADI.</p>
            </div>
            <a href="tambah_peraturan.php" class="btn-add">
                <i class="fa-solid fa-plus"></i> Tambah Peraturan
            </a>
        </div>

        <div class="recent-section">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>File PDF</th>
                        <th>Tanggal</th>
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
                                    <?php if (!empty($row['file_pdf'])) : ?>
                                        <i class="fa-solid fa-file-pdf" style="color:red;"></i>
                                        <?= htmlspecialchars($row['file_pdf']); ?>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td><?= date('d M Y', strtotime($row['created_at'])); ?></td>
                                <td class="action-links">

                                    <!-- Lihat PDF -->
                                    <?php if (!empty($row['file_pdf'])) : ?>
                                        <a href="javascript:void(0)"
                                            onclick="openViewer(
               '../uploads/peraturan/<?= $row['file_pdf']; ?>',
               '<?= htmlspecialchars($row['judul'], ENT_QUOTES); ?>'
           )"
                                            class="btn-detail"
                                            title="Lihat Peraturan">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    <?php endif; ?>

                                    <!-- Edit -->
                                    <a href="edit_peraturan.php?id=<?= $row['id']; ?>"
                                        class="btn-edit"
                                        title="Edit Peraturan">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Hapus -->
                                    <a href="#"
                                        class="btn-delete"
                                        onclick="openDeleteModal(<?= $row['id']; ?>)"
                                        title="Hapus Peraturan">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>


                                </td>


                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='5' align='center' style='padding:30px;'>Belum ada peraturan.</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>

    <!-- PDF VIEWER MODAL -->
    <div class="viewer-overlay" id="pdfViewer">
        <div class="viewer-container">
            <div class="viewer-header">
                <h3 id="viewerTitle">Dokumen</h3>
                <span class="viewer-close" onclick="closeViewer()">
                    <i class="fa-solid fa-xmark"></i>
                </span>
            </div>
            <div class="viewer-body">
                <iframe id="viewerFrame"></iframe>
            </div>
        </div>
    </div>
    <script>
        function openViewer(title, fileUrl) {
            document.getElementById('viewerTitle').innerText = title;
            document.getElementById('viewerFrame').src = fileUrl;
            document.getElementById('pdfViewer').style.display = 'flex';
        }

        function closeViewer() {
            document.getElementById('viewerFrame').src = '';
            document.getElementById('pdfViewer').style.display = 'none';
        }
    </script>

    <!-- JS VIEWER -->
    <script src="assets/js/viewer.js" defer></script>

    <?php include 'partials/confirm_delete_modal.php'; ?>

    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById('confirmDeleteModal');
            const yesBtn = document.getElementById('confirmDeleteYes');

            if (!modal || !yesBtn) {
                console.error('Modal delete tidak ditemukan di DOM');
                return;
            }

            yesBtn.href = 'hapus_peraturan.php?id=' + id;
            modal.style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('confirmDeleteModal').style.display = 'none';
        }
    </script>

</body>

</html>