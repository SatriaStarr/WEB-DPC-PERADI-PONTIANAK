<?php
session_start();
include 'koneksi.php';

// 1. Cek Keamanan (Wajib Login)
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Advokat - Admin PERADI</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
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
            align-items: center;
            gap: 10px;
        }

        /* Search Box Custom */
        .search-box {
            position: relative;
        }
        .search-box input {
            padding-left: 35px;
            border-radius: 20px;
            border: 1px solid #ccc;
            width: 250px;
            transition: 0.3s;
        }
        .search-box input:focus {
            width: 300px; /* Efek melebar saat diketik */
            border-color: #1e3a8a;
            box-shadow: 0 0 5px rgba(30, 58, 138, 0.3);
        }
        .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
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

        <div class="recent-section">
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
                        // ORDER BY id_advokat ASC agar urutan sama persis dengan Excel Import
                        $query = mysqli_query($conn, "SELECT * FROM data_advokat ORDER BY id_advokat ASC");

                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                // Tentukan Warna Status
                                $status_class = 'bg-meninggal';
                                if ($row['status_keanggotaan'] == 'aktif') $status_class = 'bg-aktif';
                                else if ($row['status_keanggotaan'] == 'cuti') $status_class = 'bg-cuti';
                                else if ($row['status_keanggotaan'] == 'non_aktif') $status_class = 'bg-non_aktif';
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><b><?php echo htmlspecialchars($row['nia']); ?></b></td>
                                    <td>
                                        <?php echo htmlspecialchars($row['nama_lengkap']); ?><br>
                                        <small class="text-muted"><?php echo htmlspecialchars($row['no_hp']); ?></small>
                                    </td>
                                    <td><?php echo htmlspecialchars($row['nama_kantor_hukum']); ?></td>
                                    <td>
                                        <span class="badge-status <?php echo $status_class; ?>">
                                            <?php echo ucfirst($row['status_keanggotaan']); ?>
                                        </span>
                                    </td>
                                    <td class="action-links">
                                        <a href="detail_advokat.php?id=<?php echo $row['id_advokat']; ?>" class="btn-detail" title="Lihat Detail"><i class="fa-solid fa-eye"></i></a>
                                        <a href="edit_advokat.php?id=<?php echo $row['id_advokat']; ?>" class="btn-edit" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="hapus_advokat.php?id=<?php echo $row['id_advokat']; ?>" class="btn-delete" onclick="return confirm('Hapus data ini?')" title="Hapus"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center py-4'>Belum ada data advokat.</td></tr>";
                        }
                        ?>
                        <tr id="noResultRow" style="display: none;">
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="fa-solid fa-circle-exclamation fa-2x mb-2"></i><br>
                                Data tidak ditemukan.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="modalImportLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalImportLabel">Import Data Anggota (CSV)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="proses_import.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file_csv" class="form-label">Pilih File CSV</label>
                            <input type="file" class="form-control" id="file_csv" name="file_csv" accept=".csv" required>
                            <div class="form-text">Gunakan format file .csv dengan pemisah titik koma (;).</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="import" class="btn btn-primary">Upload & Proses</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            // 1. Ambil teks yang diketik user & ubah ke huruf kecil semua
            let filter = this.value.toLowerCase();
            
            // 2. Ambil semua baris di dalam tabel (kecuali header)
            let rows = document.querySelectorAll('#dataTable tbody tr:not(#noResultRow)');
            let hasResult = false;

            rows.forEach(row => {
                // 3. Ambil seluruh teks di baris tersebut
                let text = row.textContent.toLowerCase();
                
                // 4. Cek apakah teks baris mengandung kata kunci pencarian
                if (text.includes(filter)) {
                    row.style.display = ''; // Tampilkan
                    hasResult = true;
                } else {
                    row.style.display = 'none'; // Sembunyikan
                }
            });

            // 5. Tampilkan pesan jika tidak ada hasil
            document.getElementById('noResultRow').style.display = hasResult ? 'none' : '';
        });
    </script>

</body>
</html>