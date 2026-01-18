<?php
session_start(); // Mulai sesi untuk bisa mengaksesnya
session_unset(); // Hapus semua variabel sesi
session_destroy(); // Hancurkan sesi sepenuhnya

// Lempar kembali ke halaman login dengan membawa pesan 'logout'
header("Location: login.php?pesan=logout");
exit;
?>