<?php
session_start();
include '../koneksi.php';

// 1. Cek: Kalau BELUM LOGIN sama sekali -> Tendang ke Login
if (!isset($_SESSION['status_login'])) {
    header("Location: login.php");
    exit;
}

// 2. Cek: Kalau SUDAH LOGIN tapi BUKAN Super Admin -> Tendang ke Dashboard + Pesan Marah
if ($_SESSION['role'] != 'super_admin') {
    // Mundur (../) ke dashboard karena file ini ada di dalam folder auth
    header("Location: ../dashboard.php?pesan=no_access");
    exit;
}

// --- LOGIKA UTAMA (Hanya jalan kalau lolos pengecekan di atas) ---
$id = $_GET['id'];
$aksi = $_GET['aksi'];

if ($aksi == 'terima') {
    $query = "UPDATE users SET status = 'active' WHERE id_user = '$id'";
    mysqli_query($conn, $query);
    header("Location: ../verifikasi_admin.php?notif=sukses_terima");

} else if ($aksi == 'tolak') {
    $query = "DELETE FROM users WHERE id_user = '$id'";
    mysqli_query($conn, $query);
    header("Location: ../verifikasi_admin.php?notif=sukses_tolak");
}
?>