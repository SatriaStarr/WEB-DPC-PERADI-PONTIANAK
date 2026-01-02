<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peraturan</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="sidebar">
    <!-- sidebar kamu, copy dari data_advokat.php -->
</div>

<div class="main-content">
    <div class="page-header">
        <div>
            <h1>Tambah Peraturan</h1>
            <p>Tambahkan peraturan resmi PERADI.</p>
        </div>
    </div>

    <div class="recent-section">
        <form action="proses_tambah_peraturan.php" method="POST" enctype="multipart/form-data">

            <div style="margin-bottom:15px;">
                <label>Judul Peraturan</label><br>
                <input type="text" name="judul" required style="width:100%; padding:10px;">
            </div>

            <div style="margin-bottom:15px;">
                <label>Isi Peraturan</label><br>
                <textarea name="isi" rows="6" required style="width:100%; padding:10px;"></textarea>
            </div>

            <div style="margin-bottom:15px;">
                <label>File PDF</label><br>
                <input type="file" name="file_pdf" accept=".pdf" required>
            </div>

            <button type="submit" class="btn-add">
                <i class="fa-solid fa-save"></i> Simpan Peraturan
            </button>

        </form>
    </div>
</div>

</body>
</html>
