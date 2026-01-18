<?php
// Pastikan path koneksi benar
include '../koneksi.php'; 

$nama = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
$user = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

// 1. Cek Username Kembar
$cek = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
if(mysqli_num_rows($cek) > 0){
    echo "<script>alert('Username sudah terpakai!'); window.location='register.php';</script>";
    exit;
}

// 2. Enkripsi Password (WAJIB)
$pass_hash = password_hash($pass, PASSWORD_DEFAULT);

// 3. Masukkan ke Database (Default role: admin, status: pending)
$query = "INSERT INTO users (username, password, nama_lengkap, role, status) 
          VALUES ('$user', '$pass_hash', '$nama', 'admin', 'pending')";

if(mysqli_query($conn, $query)){
    // Sukses -> Lempar ke login
    header("Location: login.php?pesan=sukses_regis");
} else {
    echo "Gagal Register: " . mysqli_error($conn);
}
?>