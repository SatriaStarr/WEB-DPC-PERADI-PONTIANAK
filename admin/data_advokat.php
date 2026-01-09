<?php
session_start();
include 'koneksi.php';

// 1. Cek Keamanan
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

// 2. Hitung Data Pending (Wajib ada biar notif sidebar muncul)
$q_pending = mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE status='pending'");
$total_pending = ($q_pending) ? mysqli_fetch_assoc($q_pending)['total'] : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Advokat - Admin PERADI</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* --- GLOBAL STYLE --- */
        body { font-family: 'Poppins', sans-serif; background-color: #f4f6f9; color: #333; margin: 0; padding: 0; }
        a { text-decoration: none; }

        /* ===== SIDEBAR STYLE (DITAMBAHKAN KEMBALI) ===== */
        .sidebar {
            width: 250px;
            background-color: #1e3a8a;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: 100;
            display: flex;
            flex-direction: column;
            transition: 0.3s;
        }

        .logo-section {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .logo-text h2 {
            font-size: 1.4rem;
            font-weight: 800;
            margin: 0;
            line-height: 1;
        }
        .logo-text span {
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: #dea057;
        }

        .nav-links {
            list-style: none;
            padding: 15px 0;
            margin: 0;
            flex: 1;
        }
        .nav-links li a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 25px;
            color: rgba(255,255,255,0.8);
            font-size: 0.9rem;
            font-weight: 500;
            transition: 0.3s;
            border-left: 4px solid transparent;
        }
        .nav-links li a:hover,
        .nav-links li.active a {
            background-color: #152c69;
            color: white;
            border-left-color: #dea057;
        }

        .logout-section {
            padding: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        .logout-section a {
            color: #ef4444;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }
        .logout-section a:hover {
            color: #ffadad;
        }

        /* Badge Notifikasi */
        .badge-notif {
            background: #ef4444;
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
            margin-left: auto;
        }

        /* --- MAIN CONTENT (KONTEN KANAN) --- */
        .main-content {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;
            transition: 0.3s;
        }

        /* --- HEADER AREA --- */
        .content-header {
            background: white;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        .header-title h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e3a8a;
            margin: 0;
        }
        .header-title p {
            color: #888;
            margin: 5px 0 0 0;
            font-size: 0.9rem;
        }

        /* --- SEARCH & ACTIONS --- */
        .header-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .search-box {
            position: relative;
        }
        .search-box input {
            padding: 10px 15px 10px 40px;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
            background: #f8f9fa;
            width: 250px;
            transition: 0.3s;
        }
        .search-box input:focus {
            background: white;
            border-color: #1e3a8a;
            width: 280px;
            outline: none;
        }
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        /* Tombol */
        .btn-custom {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
            border: none;
            transition: 0.3s;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-add {
            background: #10b981;
            color: white;
        }
        .btn-add:hover {
            background: #059669;
            color: white;
        }
        .btn-import {
            background: #1e3a8a;
            color: white;
        }
        .btn-import:hover {
            background: #152c69;
            color: white;
        }

        /* --- TABLE --- */
        .table-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }
        .table thead th {
            background-color: #f8f9fa;
            color: #64748b;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            border-bottom: 2px solid #e2e8f0;
            padding: 15px;
        }
        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
        }
        
        /* Badges */
        .badge-status {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .bg-aktif {
            background: #dcfce7;
            color: #166534;
        }
        .bg-cuti {
            background: #fef9c3;
            color: #854d0e;
        }
        .bg-non_aktif {
            background: #fee2e2;
            color: #991b1b;
        }
        .bg-meninggal {
            background: #f1f5f9;
            color: #475569;
        }

        /* Action Buttons */
        .action-btn {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            margin-right: 5px;
            color: white;
            font-size: 0.8rem;
            transition: 0.3s;
        }
        .btn-view {
            background: #3b82f6;
        }
        .btn-view:hover {
            background: #2563eb;
        }
        .btn-edit {
            background: #f59e0b;
        }
        .btn-edit:hover {
            background: #d97706;
        }
        .btn-del {
            background: #ef4444;
        }
        .btn-del:hover {
            background: #dc2626;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <?php include __DIR__ . '/partials/sidebar.php'; ?>

    <div class="main-content">
        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'import_selesai'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fa-solid fa-check-circle"></i> Import Selesai!</strong>
                Sukses: <?php echo $_GET['sukses']; ?>, Gagal: <?php echo $_GET['gagal']; ?>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="content-header">
            <div class="header-title">
                <h1>Data Advokat</h1>
                <p>Kelola data anggota PERADI.</p>
            </div>
            <div class="header-actions">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="searchInput" placeholder="Cari Nama / NIA...">
                </div>
                <a href="tambah_advokat.php" class="btn-custom btn-add"><i class="fa-solid fa-plus"></i> Baru</a>
                <button type="button" class="btn-custom btn-import" data-bs-toggle="modal" data-bs-target="#modalImport"><i class="fa-solid fa-file-csv"></i> Import</button>
            </div>
        </div>

        <div class="table-card">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIA</th>
                            <th>Nama Lengkap</th>
                            <th>Kantor Hukum</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($conn, "SELECT * FROM data_advokat ORDER BY id_advokat ASC");
                        while ($row = mysqli_fetch_assoc($query)) {
                            // Logic Warna
                            $s = $row['status_keanggotaan'];
                            $badge = ($s=='aktif')?'bg-aktif':(($s=='cuti')?'bg-cuti':(($s=='non_aktif')?'bg-non_aktif':'bg-meninggal'));
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><strong><?php echo $row['nia']; ?></strong></td>
                            <td>
                                <div><?php echo $row['nama_lengkap']; ?></div>
                                <small class="text-muted"><?php echo $row['no_hp']; ?></small>
                            </td>
                            <td><?php echo $row['nama_kantor_hukum']; ?></td>
                            <td><span class="badge-status <?php echo $badge; ?>"><?php echo ucfirst($s); ?></span></td>
                            <td>
                                <a href="detail_advokat.php?id=<?php echo $row['id_advokat']; ?>" class="action-btn btn-view"><i class="fa-solid fa-eye"></i></a>
                                <a href="edit_advokat.php?id=<?php echo $row['id_advokat']; ?>" class="action-btn btn-edit"><i class="fa-solid fa-pen"></i></a>
                                <a href="hapus_advokat.php?id=<?php echo $row['id_advokat']; ?>" class="action-btn btn-del" onclick="return confirm('Hapus?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr id="noResultRow" style="display: none;"><td colspan="6" class="text-center text-muted py-4">Data tidak ditemukan.</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalImport" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="proses_import.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header"><h5 class="modal-title">Import CSV</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                    <div class="modal-body">
                        <input type="file" name="file_csv" class="form-control" accept=".csv" required>
                    </div>
                    <div class="modal-footer"><button type="submit" name="import" class="btn btn-primary">Upload</button></div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#dataTable tbody tr:not(#noResultRow)');
            let hasResult = false;
            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                if (text.includes(filter)) { row.style.display = ''; hasResult = true; } else { row.style.display = 'none'; }
            });
            document.getElementById('noResultRow').style.display = hasResult ? 'none' : '';
        });
    </script>
</body>
</html>