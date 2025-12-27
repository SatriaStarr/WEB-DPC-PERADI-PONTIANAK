<?php
ob_start(); // <--- INI KUNCI PERBAIKANNYA (Wajib paling atas)
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cek User
$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
$cek_user = mysqli_num_rows($query);

if ($cek_user > 0) {
    $data = mysqli_fetch_assoc($query);

    if (password_verify($password, $data['password'])) {
        
        // Cek Status
        if ($data['status'] == 'pending') {
            header("Location: index.php?pesan=pending");
            exit;
        } else if ($data['status'] == 'banned') {
            header("Location: index.php?pesan=banned");
            exit;
        } else {
            // --- LOGIN SUKSES ---
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $data['role'];
            $_SESSION['status_login'] = true;

            // --- LOGIKA COOKIE (INGAT SAYA) ---
            if (isset($_POST['remember'])) {
                // Set Cookie selama 30 Hari
                // setcookie(Nama, Isi, Waktu Expired, Path)
                setcookie('peradi_user', $username, time() + (86400 * 30), "/");
            } else {
                // Jika tidak dicentang, hapus cookie lama (set waktu ke masa lalu)
                if (isset($_COOKIE['peradi_user'])) {
                    setcookie('peradi_user', '', time() - 3600, "/");
                }
            }

            header("Location: dashboard.php");
            exit;
        }

    } else {
        header("Location: index.php?pesan=wrongpass");
        exit;
    }

} else {
    header("Location: index.php?pesan=notfound");
    exit;
}
?>