<?php
session_start();
include 'koneksi.php';

// CEK LOGIN
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

$success = '';
$error   = '';

// =======================
// MODE EDIT
// =======================
$editData = null;
if (isset($_GET['edit'])) {
    $kategori = mysqli_real_escape_string($conn, $_GET['edit']);
    $q = mysqli_query($conn, "SELECT * FROM layanan WHERE kategori='$kategori' LIMIT 1");
    $editData = mysqli_fetch_assoc($q);
}

// =======================
// MODE HAPUS
// =======================
if (isset($_GET['hapus'])) {
    $kategori = mysqli_real_escape_string($conn, $_GET['hapus']);

    // ambil file lama
    $old = mysqli_query($conn, "SELECT file FROM layanan WHERE kategori='$kategori'");
    $oldData = mysqli_fetch_assoc($old);

    if (!empty($oldData['file']) && file_exists("../uploads/layanan/" . $oldData['file'])) {
        unlink("../uploads/layanan/" . $oldData['file']);
    }

    mysqli_query($conn, "DELETE FROM layanan WHERE kategori='$kategori'");
    header("Location: kelola_layanan.php");
    exit;
}

// =======================
// PROSES SIMPAN
// =======================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $kategori  = $_POST['kategori'];
    $judul     = trim($_POST['judul']);
    $deskripsi = trim($_POST['deskripsi']);

    if ($kategori && $judul && $deskripsi) {

        $file_name = null;

        if (!empty($_FILES['file']['name'])) {
            $file_name = time() . '_' . $_FILES['file']['name'];
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                '../uploads/layanan/' . $file_name
            );
        }

        $cek = mysqli_query($conn, "SELECT file FROM layanan WHERE kategori='$kategori' LIMIT 1");

        if (mysqli_num_rows($cek) > 0) {

            $old = mysqli_fetch_assoc($cek);
            if ($file_name && $old['file'] && file_exists("../uploads/layanan/" . $old['file'])) {
                unlink("../uploads/layanan/" . $old['file']);
            }

            $file_sql = $file_name ? ", file='$file_name'" : "";

            mysqli_query(
                $conn,
                "UPDATE layanan 
                 SET judul='$judul', deskripsi='$deskripsi' $file_sql
                 WHERE kategori='$kategori'"
            );
        } else {

            mysqli_query(
                $conn,
                "INSERT INTO layanan (kategori, judul, deskripsi, file)
                 VALUES ('$kategori', '$judul', '$deskripsi', '$file_name')"
            );
        }

        $success = "Data layanan berhasil disimpan.";
    } else {
        $error = "Semua field wajib diisi.";
    }
}

// =======================
// AMBIL DATA UNTUK TABEL
// =======================
$layanan = mysqli_query($conn, "SELECT * FROM layanan ORDER BY kategori ASC");
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Layanan</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            font-weight: 500;
            display: block;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-family: Poppins;
        }

        textarea {
            min-height: 120px;
        }

        .btn-save {
            background: #2ecc71;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
        }

        .alert-success {
            color: #16a34a;
            margin-bottom: 15px;
        }

        .alert-error {
            color: #dc2626;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <?php include __DIR__ . '/partials/sidebar.php'; ?>

    <div class="main-content">

        <div class="page-header">
            <div>
                <h1>Kelola Layanan</h1>
                <p>Tambah atau perbarui data layanan.</p>
            </div>
        </div>

        <div class="recent-section">
            <div class="content-box">

                <?php if ($success): ?>
                    <div class="alert-success"><?= $success; ?></div>
                <?php endif; ?>

                <?php if ($error): ?>
                    <div class="alert-error"><?= $error; ?></div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Kategori Layanan</label>
                        <select name="kategori" required <?= $editData ? 'disabled' : ''; ?>>
                            <?php if ($editData): ?>
                                <input type="hidden" name="kategori" value="<?= $editData['kategori']; ?>">
                            <?php endif; ?>

                            <option value="">-- Pilih Kategori --</option>
                            <option value="pkpa">PKPA</option>
                            <option value="upa">UPA</option>
                            <option value="sumpah">Pengangkatan & Sumpah</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul"
                            value="<?= htmlspecialchars($editData['judul'] ?? ''); ?>" required>

                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" required><?= htmlspecialchars($editData['deskripsi'] ?? ''); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>File (PDF / DOC)</label>
                        <input type="file" name="file">
                    </div>

                    <button class="btn-save">
                        <i class="fa-solid fa-save"></i> Simpan
                    </button>

                </form>

                <hr style="margin:30px 0;">

                <h3>Daftar Layanan</h3>

                <table style="width:100%; border-collapse:collapse; margin-top:15px;">
                    <tr style="background:#f3f4f6;">
                        <th style="padding:10px;">Kategori</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>

                    <?php while ($row = mysqli_fetch_assoc($layanan)) : ?>
                        <tr>
                            <td style="padding:10px; text-transform:uppercase;">
                                <?= htmlspecialchars($row['kategori']); ?>
                            </td>
                            <td><?= htmlspecialchars($row['judul']); ?></td>
                            <td>
                                <a href="kelola_layanan.php?edit=<?= $row['kategori']; ?>">Edit</a> |
                                <a href="#"
                                    onclick="openDeleteModal('<?= $row['kategori']; ?>')"
                                    style="color:red;">Hapus</a>

                            </td>
                        </tr>
                    <?php endwhile; ?>

                </table>

            </div>
        </div>

    </div>

    <?php include 'partials/confirm_delete_modal.php'; ?>


    <script>
        function openDeleteModal(kategori) {
            const modal = document.getElementById('confirmDeleteModal');
            const yesBtn = document.getElementById('confirmDeleteYes');

            yesBtn.href = 'kelola_layanan.php?hapus=' + kategori;
            modal.style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('confirmDeleteModal').style.display = 'none';
        }
    </script>

</body>

</html>