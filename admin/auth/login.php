<?php
session_start();
if (isset($_SESSION['status_login']) && $_SESSION['status_login'] == true) {
    header("Location: ../dashboard.php");
    exit;
}

// Logika Cookie
$cookie_username = "";
$cookie_password = "";
if (isset($_COOKIE['ingat_username']) && isset($_COOKIE['ingat_password'])) {
    $cookie_username = $_COOKIE['ingat_username'];
    $cookie_password = $_COOKIE['ingat_password'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PERADI Data Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', sans-serif; }
        
        body {
            height: 100vh;
            display: flex;
            background-color: #fff;
            overflow: hidden; /* Hilangkan scrollbar */
        }

        /* BAGIAN KIRI: GAMBAR TOWER */
        .left-side {
            flex: 1.2; /* Lebih lebar sedikit */
            background: linear-gradient(rgba(30, 58, 138, 0.6), rgba(30, 58, 138, 0.8)), url('../image/peradi-tower.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 40px;
        }

        .left-side h1 { font-size: 3rem; font-weight: 800; margin-bottom: 10px; letter-spacing: 2px; }
        .left-side p { font-size: 1.2rem; font-weight: 300; letter-spacing: 1px; }

        /* BAGIAN KANAN: FORM LOGIN */
        .right-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background: white;
            position: relative;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .logo-area { margin-bottom: 30px; color: #1e3a8a; }
        .logo-area i { font-size: 3.5rem; margin-bottom: 10px; }
        .logo-area h2 { font-weight: 800; text-transform: uppercase; letter-spacing: 1px; }
        
        .form-group { margin-bottom: 20px; text-align: left; }
        .form-group label { display: block; font-size: 0.9rem; font-weight: 600; color: #555; margin-bottom: 8px; }
        .form-group input {
            width: 100%; padding: 14px 15px; border: 1px solid #ddd; background: #f9f9f9;
            border-radius: 8px; font-size: 0.95rem; outline: none; transition: 0.3s;
        }
        .form-group input:focus { border-color: #1e3a8a; background: #fff; box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1); }

        .btn-login {
            width: 100%; padding: 14px; background: #1e3a8a; color: white;
            border: none; border-radius: 8px; font-weight: 700; font-size: 1rem;
            cursor: pointer; transition: 0.3s; margin-top: 10px;
        }
        .btn-login:hover { background: #152c69; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(30, 58, 138, 0.2); }

        .alert {
            background: #fee2e2; color: #b91c1c; padding: 12px; border-radius: 8px;
            font-size: 0.9rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;
        }

        .register-link { margin-top: 20px; font-size: 0.9rem; color: #666; }
        .register-link a { color: #dea057; font-weight: 700; text-decoration: none; }
        .register-link a:hover { text-decoration: underline; }

        .back-link {
            position: absolute; top: 20px; right: 20px; font-size: 0.85rem; color: #999; text-decoration: none;
        }
        .back-link:hover { color: #1e3a8a; }

        /* Responsive HP */
        @media (max-width: 768px) {
            body { flex-direction: column; height: auto; }
            .left-side { padding: 60px 20px; flex: none; height: 300px; }
            .right-side { padding: 40px 20px; }
        }
    </style>
</head>
<body>

    <div class="left-side">
        <h1>PERADI</h1>
        <p>Pontianak Data Center</p>
    </div>

    <div class="right-side">
        <a href="../../index.php" class="back-link">Kembali ke Web Utama</a>

        <div class="login-card">
            <div class="logo-area">
                <i class="fa-solid fa-scale-balanced"></i>
                <h2>Login Admin</h2>
            </div>

            <?php if(isset($_GET['pesan'])): ?>
                <?php if($_GET['pesan'] == "gagal"): ?>
                    <div class="alert"><i class="fa-solid fa-circle-exclamation"></i> Password salah!</div>
                <?php elseif($_GET['pesan'] == "notfound"): ?>
                    <div class="alert"><i class="fa-solid fa-user-slash"></i> Username tidak ditemukan!</div>
                <?php elseif($_GET['pesan'] == "pending"): ?>
                    <div class="alert" style="background:#fff7ed; color:#c2410c;"><i class="fa-solid fa-clock"></i> Akun menunggu verifikasi admin.</div>
                <?php elseif($_GET['pesan'] == "sukses_regis"): ?>
                    <div class="alert" style="background:#dcfce7; color:#166534;"><i class="fa-solid fa-check"></i> Registrasi berhasil! Tunggu verifikasi.</div>
                <?php endif; ?>
            <?php endif; ?>

            <form action="proses_login.php" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Username" value="<?php echo $cookie_username; ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" value="<?php echo $cookie_password; ?>" required>
                </div>

                <div style="text-align:left; margin-bottom:20px; display:flex; gap:8px; align-items:center; font-size:0.9rem; color:#666;">
                    <input type="checkbox" name="ingat_aku" id="ingat_aku" <?php if($cookie_username != "") echo "checked"; ?>>
                    <label for="ingat_aku" style="margin:0; font-weight:400; cursor:pointer;">Ingat Saya</label>
                </div>

                <button type="submit" class="btn-login">Masuk Sistem</button>
            </form>

            <div class="register-link">
                Belum punya akun admin? <br>
                <a href="register.php">Daftarkan Diri Disini</a>
            </div>
        </div>
    </div>

</body>
</html>