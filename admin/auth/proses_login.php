<?php
session_start();
include '../koneksi.php';

// 1. Tangkap Input & Bersihkan dari Spasi (Trim)
$username = mysqli_real_escape_string($conn, trim($_POST['username']));
$password = mysqli_real_escape_string($conn, trim($_POST['password']));

// 2. Cek Username di Database
$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);

    // 3. LOGIKA HYBRID (Bisa Password Biasa ATAU Password Hash)
    // Ini yang bikin akun lama (admin12345) dan akun baru (hash) BISA LOGIN DUA-DUANYA.
    if ($password == $data['password'] || password_verify($password, $data['password'])) {
        
        // Cek Status Akun
        if ($data['status'] == 'pending') {
            header("Location: login.php?pesan=pending");
        } else if ($data['status'] == 'banned') {
            header("Location: login.php?pesan=banned");
        } else {
            // --- LOGIN SUKSES ---
            // Set Session Lengkap
            $_SESSION['id_user']      = isset($data['id_user']) ? $data['id_user'] : $data['id']; // Jaga-jaga nama kolom beda
            $_SESSION['username']     = $username;
            $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
            $_SESSION['role']         = $data['role']; 
            $_SESSION['status_login'] = true;

            // Logika Cookie (Ingat Saya)
            if (isset($_POST['ingat_aku'])) {
                setcookie('ingat_username', $username, time() + (86400 * 30), "/");
                setcookie('ingat_password', $password, time() + (86400 * 30), "/");
            } else {
                // Hapus cookie kalau tidak dicentang
                if (isset($_COOKIE['ingat_username'])) {
                    setcookie('ingat_username', '', time() - 3600, "/");
                    setcookie('ingat_password', '', time() - 3600, "/");
                }
            }

            // REDIRECT KE DASHBOARD (Mundur satu folder)
            header("Location: ../dashboard.php");
        }

    } else {
        // Password Salah
        header("Location: login.php?pesan=gagal");
    }

} else {
    // Username Tidak Ditemukan
    header("Location: login.php?pesan=notfound");
}
exit;
?>