<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Admin Baru</title>
    <link rel="stylesheet" href="style.css"> <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container">
        <div class="left-section" style="background: url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1000') no-repeat center center/cover;">
            <div class="content-overlay">
                <h2>Join the Team</h2>
                <p>Bergabunglah untuk mengelola Data Center.</p>
            </div>
        </div>

        <div class="right-section">
            <div class="login-box">
                <div class="header">
                    <h3>Daftar Akun Baru</h3>
                    <p>Isi data diri Anda untuk mengajukan akses.</p>
                </div>

                <form action="proses_register.php" method="POST">
                    <div class="input-group">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Buat username unik" required>
                    </div>

                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Minimal 6 karakter" required>
                    </div>
                    
                    <button type="submit" class="btn-login">Ajukan Registrasi</button>

                    <div class="actions" style="justify-content: center; margin-top: 20px;">
                        <span>Sudah punya akun? <a href="index.php">Login di sini</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['status'])): ?>
    <script>
        const status = "<?php echo $_GET['status']; ?>";
        if (status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Registrasi Terkirim!',
                text: 'Mohon tunggu persetujuan dari Super Admin.',
                confirmButtonText: 'Oke, kembali ke Login'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            });
        } else if (status === 'failed') {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Username mungkin sudah terpakai.',
            });
        }
    </script>
    <?php endif; ?>

</body>
</html>