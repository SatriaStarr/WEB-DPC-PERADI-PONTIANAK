<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if ($foto) {
        move_uploaded_file($tmp, "../uploads/struktur/" . $foto);
    }

    mysqli_query($conn, "INSERT INTO struktur_pengurus (nama, jabatan, foto)
        VALUES ('$nama', '$jabatan', '$foto')");

    header("Location: struktur_pengurus.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengurus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

<?php include __DIR__ . '/partials/sidebar.php'; ?>

<div class="main-content">
    <div class="page-header">
        <div>
            <h1>Tambah Pengurus</h1>
            <p>Masukkan data pengurus organisasi.</p>
        </div>
    </div>

    <div class="recent-section">
        <form method="post" enctype="multipart/form-data">

            <div class="input-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" required>
            </div>

            <div class="input-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" required>
            </div>

            <div class="input-group">
                <label>Foto</label>
                <input type="file" name="foto" accept="image/*">
            </div>

            <button type="submit" name="simpan" class="btn-add">
                <i class="fa-solid fa-save"></i> Simpan
            </button>

        </form>
    </div>
</div>

</body>
</html>
