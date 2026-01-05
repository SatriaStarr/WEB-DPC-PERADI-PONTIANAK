<?php
session_start();
if (isset($_SESSION['status_login']) && $_SESSION['status_login'] == true) {
    header("Location: dashboard.php");
    exit;
}

// --- LOGIKA BACA COOKIE (BIAR PASSWORD KEISI SENDIRI) ---
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
            background-color: #f4f6f9;
            /* BACKGROUND IMAGE YANG LAMA */
            background-image: linear-gradient(rgba(30, 58, 138, 0.8), rgba(30, 58, 138, 0.9)), url('image/peradi-tower.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: white;
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            text-align: center;
            border-top: 5px solid #dea057; /* Aksen Emas di Atas */
        }

        .logo-area { margin-bottom: 20px; color: #1e3a8a; }
        .logo-area i { font-size: 3rem; margin-bottom: 10px; }
        .logo-area h2 { font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin: 0; }
        .logo-area span { font-size: 0.8rem; letter-spacing: 2px; color: #dea057; }

        .form-group { margin-bottom: 20px; text-align: left; }
        .form-group label { display: block; font-size: 0.85rem; font-weight: 600; color: #555; margin-bottom: 8px; }
        .form-group input {
            width: 100%; padding: 12px 15px; border: 1px solid #ddd;
            border-radius: 5px; font-size: 0.95rem; outline: none; transition: 0.3s;
        }
        .form-group input:focus { border-color: #1e3a8a; box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1); }

        /* Style Checkbox Ingat Saya */
        .remember-me {
            display: flex; align-items: center; gap: 8px; margin-bottom: 20px; font-size: 0.85rem; color: #666;
        }
        .remember-me input { cursor: pointer; accent-color: #1e3a8a; }

        .btn-login {
            width: 100%; padding: 12px; background: #1e3a8a; color: white;
            border: none; border-radius: 5px; font-weight: 700; font-size: 1rem;
            cursor: pointer; transition: 0.3s; text-transform: uppercase; letter-spacing: 1px;
        }
        .btn-login:hover { background: #152c69; }

        .alert {
            background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 5px;
            font-size: 0.85rem; margin-bottom: 20px; border: 1px solid #fecaca;
        }
        
        .footer-link { margin-top: 20px; font-size: 0.85rem; color: #666; }
        .footer-link a { color: #1e3a8a; text-decoration: none; font-weight: 600; }
        .footer-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="logo-area">
            <i class="fa-solid fa-scale-balanced"></i>
            <div>
                <h2>PERADI</h2>
                <span>Data Center</span>
            </div>
        </div>

        <h3 style="margin-bottom: 20px; font-weight: 600; color: #333;">Login Administrator</h3>

        <?php if(isset($_GET['pesan'])): ?>
            <?php if($_GET['pesan'] == "gagal"): ?>
                <div class="alert"><i class="fa-solid fa-circle-exclamation"></i> Username atau Password salah!</div>
            <?php elseif($_GET['pesan'] == "logout"): ?>
                <div class="alert" style="background:#dcfce7; color:#166534; border-color:#bbf7d0;">
                    <i class="fa-solid fa-check"></i> Anda berhasil logout.
                </div>
            <?php elseif($_GET['pesan'] == "belum_login"): ?>
                <div class="alert" style="background:#fff7ed; color:#c2410c; border-color:#ffedd5;">
                    <i class="fa-solid fa-lock"></i> Silakan login dulu.
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <form action="proses_login.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" value="<?php echo $cookie_username; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" value="<?php echo $cookie_password; ?>" required>
            </div>

            <div class="remember-me">
                <input type="checkbox" name="ingat_aku" id="ingat_aku" <?php if($cookie_username != "") echo "checked"; ?>>
                <label for="ingat_aku">Ingat password saya</label>
            </div>

            <button type="submit" class="btn-login">Masuk Sistem</button>
        </form>
        
        <div class="footer-link">
            <a href="../index.php">← Kembali ke Halaman Depan</a>
        </div>
    </div>

</body>
</html>