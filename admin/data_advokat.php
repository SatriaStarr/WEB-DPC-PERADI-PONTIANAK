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
    
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="assets/css/viewer.css">

    <style>
        /* Styling Dashboard */
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f4; }
        a { text-decoration: none; }
        
        /* Header Styling */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            flex-wrap: wrap; /* Agar responsif di HP */
            gap: 15px;
        }

        /* Group Tombol & Search */
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
            width: 300px; /* Efek melebar saat diketik */
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

        /* Tombol Custom */
        .btn-custom-add {
            background: #2ecc71; color: white; border: none;
            padding: 8px 15px; border-radius: 8px; font-weight: 500; transition: 0.3s;
        }
        .btn-custom-add:hover { background: #27ae60; color: white; }

        .btn-custom-csv {
            background: #198754; color: white; border: none;
            padding: 8px 15px; border-radius: 8px; font-weight: 500; transition: 0.3s;
        }
        .btn-custom-csv:hover { background: #146c43; color: white; }

        /* Badge Status */
        .badge-status { padding: 5px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; }
        .bg-aktif { background: #dcfce7; color: #16a34a; }
        .bg-cuti { background: #fef9c3; color: #ca8a04; }
        .bg-non_aktif { background: #fee2e2; color: #dc2626; }
        .bg-meninggal { background: #f3f4f6; color: #4b5563; }

        /* Table Styling */
        .recent-section { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; font-weight: 600; color: #555; }
        
        /* Action Buttons */
        .action-links a { margin-right: 10px; font-size: 1.1rem; transition: 0.2s; }
        .btn-detail { color: #3b82f6; }
        .btn-edit { color: #f59e0b; }
        .btn-delete { color: #ef4444; }
        .action-links a:hover { transform: scale(1.2); }
    </style>
</head>

<body>

    <?php include __DIR__ . '/partials/sidebar.php'; ?>

    <div class="main-content" style="margin-left: 250px; padding: 20px;">
        
        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'import_selesai'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Import Selesai!</strong> 
                Sukses: <?php echo $_GET['sukses']; ?> data, 
                Gagal: <?php echo $_GET['gagal']; ?> data.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="page-header">
            <div>
                <h1 style="margin:0; font-size: 1.5rem;">Data Advokat</h1>
                <p style="margin:0; color:#888;">Kelola data anggota PERADI.</p>
            </div>
            
            <div class="header-actions">
                <div class="search-box">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari Nama, NIA, Kantor...">
                </div>

                <a href="tambah_advokat.php" class="btn-custom-add" title="Tambah Manual">
                    <i class="fa-solid fa-plus"></i> <span class="d-none d-md-inline">Baru</span>
                </a>
                
                <button type="button" class="btn-custom-csv" data-bs-toggle="modal" data-bs-target="#modalImport" title="Import Excel/CSV">
                    <i class="fa-solid fa-file-csv"></i> <span class="d-none d-md-inline">Import</span>
                </button>
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
            
            // 2. Ambil semua baris di dalam tabel (kecuali header)
            let rows = document.querySelectorAll('#dataTable tbody tr:not(#noResultRow)');
            let hasResult = false;
            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                
                // 4. Cek apakah teks baris mengandung kata kunci pencarian
                if (text.includes(filter)) {
                    row.style.display = ''; // Tampilkan
                    hasResult = true;
                } else {
                    row.style.display = 'none'; // Sembunyikan
                }
            });
            document.getElementById('noResultRow').style.display = hasResult ? 'none' : '';
        });
    </script>

</body>

</html>