<style>
    /* --- CSS KHUSUS FOOTER --- */
    footer {
        background-color: #1e3a8a; /* Biru Tua Solid */
        padding: 60px 20px;
        text-align: center;
        color: white;
        border-top: 5px solid #dea057; /* Garis Emas di atas */
        margin-top: auto; /* Agar footer selalu di bawah */
        font-family: 'Montserrat', sans-serif;
    }

    .footer-logo-container {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .footer-title {
        color: white;
        margin-top: 10px;
        margin-bottom: 5px;
        font-weight: 800;
        letter-spacing: 1px;
        font-size: 1.2rem;
        text-transform: uppercase;
    }

    .footer-text {
        font-size: 0.95rem;
        margin-bottom: 8px;
        color: #e2e8f0;
        font-weight: 300;
        line-height: 1.6;
    }

    .copyright {
        font-size: 0.85rem;
        margin-top: 40px;
        border-top: 1px solid rgba(255, 255, 255, 0.1); /* Garis tipis pemisah */
        padding-top: 20px;
        color: #cbd5e1;
    }

    .copyright strong {
        color: #dea057; /* Warna Emas untuk Tim IT */
        font-weight: 600;
    }

    /* Link Admin Tersembunyi tapi Ada */
    .admin-login-footer {
        margin-top: 15px;
    }
    .admin-login-footer a {
        color: #64748b; /* Abu-abu gelap (samar) */
        text-decoration: none;
        font-size: 0.8rem;
        transition: 0.3s;
    }
    .admin-login-footer a:hover {
        color: #dea057; /* Berubah emas saat di-hover */
    }
</style>

<footer>
    <div class="footer-logo-container">
        <i class="fa-solid fa-scale-balanced fa-3x" style="color: white;"></i>
        <h3 class="footer-title">DPC PERADI PONTIANAK</h3>
    </div>

    <p class="footer-text">Jl. Sultan Abdurrahman No. 12 D Akcaya, Pontianak, Kalimantan Barat</p>
    <p class="footer-text">Email: dpcperadipontianak@gmail.com | Telp: 0812-8570-1976</p>

    <div class="copyright">
        &copy; <?php echo date("Y"); ?> DPC PERADI Pontianak. All Rights Reserved. <br>
        Developed by <strong>Polnep Interns</strong>
    </div>
</footer>