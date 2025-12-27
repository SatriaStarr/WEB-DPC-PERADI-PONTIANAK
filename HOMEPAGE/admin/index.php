<?php
// Pastikan tidak ada spasi di atas tag PHP ini
$username_cookie = isset($_COOKIE['peradi_user']) ? $_COOKIE['peradi_user'] : '';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Data Center</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #666;
        }
        .register-link a {
            color: #4a90e2; /* Sesuaikan warna biru */
            font-weight: 600;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="left-section">
            <div class="content-overlay">
                <h2>Data Center</h2>
                <p>Kelola database dengan aman dan efisien.</p>
            </div>
        </div>

        <div class="right-section">
            <div class="login-box">
                <div class="header">
                    <h3>Welcome Back, Admin</h3>
                    <p>Silakan masuk untuk mengelola data.</p>
                </div>

                <form action="proses_login.php" method="POST">
                    <div class="input-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" 
                               value="<?php echo $username_cookie; ?>" 
                               placeholder="Masukkan username admin" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                            <i class="fa-solid fa-eye" id="togglePassword"></i>
                        </div>
                    </div>

                    <div class="actions">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember" <?php if($username_cookie != '') echo 'checked'; ?>>
                            <label for="remember">Ingat saya</label>
                        </div>
                        <a href="javascript:void(0);" onclick="lupaPassword()">Lupa password?</a>
                    </div>

                    <button type="submit" class="btn-login">Masuk ke Dashboard</button>

                    <div class="register-link">
                        <p>Belum punya akun? <a href="register.php">Daftar Admin Baru</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        function lupaPassword() {
            Swal.fire({
                icon: 'info',
                title: 'Lupa Password?',
                text: 'Hubungi Super Admin untuk mereset password Anda.',
                showCancelButton: true,
                confirmButtonText: '<i class="fa-brands fa-whatsapp"></i> Hubungi Admin',
                confirmButtonColor: '#25D366',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open('https://wa.me/6281234567890', '_blank');
                }
            });
        }
    </script>
</body>

<?php if (isset($_GET['pesan'])): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const pesan = "<?php echo $_GET['pesan']; ?>";
        if (pesan === 'notfound') {
            Swal.fire({
                icon: 'question',
                title: 'Akun Tidak Ditemukan',
                text: 'Username belum terdaftar. Mau daftar baru?',
                showCancelButton: true,
                confirmButtonText: 'Ya, Daftar',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) window.location.href = 'register.php';
            });
        } else if (pesan === 'wrongpass') {
            Swal.fire({ icon: 'error', title: 'Password Salah', text: 'Cek kembali password Anda.', timer: 2000, showConfirmButton: false });
        } else if (pesan === 'pending') {
            Swal.fire({ icon: 'info', title: 'Menunggu Persetujuan', text: 'Akun Anda sedang ditinjau Super Admin.' });
        } else if (pesan === 'banned') {
            Swal.fire({ icon: 'error', title: 'Akses Ditolak', text: 'Akun Anda dinonaktifkan.' });
        } else if (pesan === 'logout') {
            Swal.fire({ icon: 'success', title: 'Berhasil Logout', text: 'Sampai jumpa lagi!', timer: 1500, showConfirmButton: false });
        } else if (pesan === 'belum_login') {
            Swal.fire({ icon: 'warning', title: 'Akses Dibatasi', text: 'Silakan login terlebih dahulu.' });
        }
    </script>
<?php endif; ?>
</html>