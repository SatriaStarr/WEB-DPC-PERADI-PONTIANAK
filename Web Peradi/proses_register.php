<?php
include 'koneksi.php';

// Ambil data dari form register
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];

// 1. Cek apakah username sudah ada di database?
$cek_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
if (mysqli_num_rows($cek_user) > 0) {
    // Jika username sudah ada, gagalkan
    header("Location: register.php?status=failed");
    exit;
}

// 2. Hash Password (Keamanan)
$password_hash = password_hash($password, PASSWORD_DEFAULT); 

// 3. Masukkan ke Database dengan status 'pending'
$query = "INSERT INTO users (nama_lengkap, username, password, role, status) 
          VALUES ('$nama_lengkap', '$username', '$password_hash', 'admin', 'pending')";

if (mysqli_query($conn, $query)) {
    // Berhasil
    header("Location: register.php?status=success");
} else {
    // Gagal koneksi/query
    header("Location: register.php?status=failed");
}
?>