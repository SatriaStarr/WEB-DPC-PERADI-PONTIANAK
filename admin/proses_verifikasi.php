<?php
session_start();
include 'koneksi.php';

// Keamanan: Cek Login & Role
if (!isset($_SESSION['status_login']) || $_SESSION['role'] != 'super_admin') {
    header("Location: login.php");
    exit;
}

// Ambil ID dan Aksi dari URL
$id = $_GET['id'];
$aksi = $_GET['aksi'];

if ($aksi == 'terima') {
    // Ubah status jadi ACTIVE
    $query = "UPDATE users SET status = 'active' WHERE id_user = '$id'";
    mysqli_query($conn, $query);
    
    // (Opsional) Redirect dengan pesan sukses
    header("Location: dashboard.php?notif=sukses_terima");

} else if ($aksi == 'tolak') {
    // Opsi A: Hapus data selamanya (Delete)
    $query = "DELETE FROM users WHERE id_user = '$id'";
    
    // Opsi B: Ubah status jadi BANNED (Kalau mau simpan datanya)
    // $query = "UPDATE users SET status = 'banned' WHERE id_user = '$id'";
    
    mysqli_query($conn, $query);
    header("Location: dashboard.php?notif=sukses_tolak");
}
?>