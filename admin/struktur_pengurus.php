<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: index.php?pesan=belum_login");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM struktur_pengurus ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="dashboard.css">
<link rel="stylesheet" href="assets/css/viewer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
.thumb {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 8px;
    cursor: pointer;
}
.action-links {
    display: flex;
    gap: 10px;
}
</style>
</head>

<body>

<?php include __DIR__ . '/partials/sidebar.php'; ?>

<div class="main-content">

<div class="page-header">
    <div>
        <h1>Struktur Pengurus</h1>
        <p>Kelola struktur organisasi.</p>
    </div>
    <a href="tambah_struktur.php" class="btn-add">
        <i class="fa-solid fa-plus"></i> Tambah Pengurus
    </a>
</div>

<div class="recent-section">
<table>
<thead>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Foto</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php
$no = 1;
if (mysqli_num_rows($query) > 0):
while ($row = mysqli_fetch_assoc($query)):
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= htmlspecialchars($row['nama']); ?></td>
    <td><?= htmlspecialchars($row['jabatan']); ?></td>
    <td>
        <?php if ($row['foto']): ?>
        <img src="../uploads/struktur/<?= $row['foto']; ?>"
             class="thumb"
             onclick="openImageViewer(
                '<?= htmlspecialchars($row['nama'], ENT_QUOTES); ?>',
                '../uploads/struktur/<?= $row['foto']; ?>'
             )">
        <?php else: ?>
            -
        <?php endif; ?>
    </td>
    <td class="action-links">
        <a href="edit_struktur.php?id=<?= $row['id']; ?>" title="Edit">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="#" onclick="openDeleteModal(<?= $row['id']; ?>)" title="Hapus">
            <i class="fa-solid fa-trash-can" style="color:#dc2626"></i>
        </a>
    </td>
</tr>
<?php endwhile; else: ?>
<tr>
<td colspan="5" align="center" style="padding:30px;">Belum ada data.</td>
</tr>
<?php endif; ?>

</tbody>
</table>
</div>
</div>

<!-- IMAGE VIEWER -->
<div class="viewer-overlay" id="imageViewer">
<div class="viewer-container">
<div class="viewer-header">
<h3 id="viewerTitle"></h3>
<span class="viewer-close" onclick="closeImageViewer()">
<i class="fa-solid fa-xmark"></i>
</span>
</div>
<div class="viewer-body" style="text-align:center;">
<img id="viewerImage" style="max-width:100%; max-height:80vh;">
</div>
</div>
</div>

<script>
function openImageViewer(title, url) {
    document.getElementById('viewerTitle').innerText = title;
    document.getElementById('viewerImage').src = url;
    document.getElementById('imageViewer').style.display = 'flex';
}
function closeImageViewer() {
    document.getElementById('imageViewer').style.display = 'none';
}
</script>

<?php include 'partials/confirm_delete_modal.php'; ?>

<script>
function openDeleteModal(id) {
    document.getElementById('confirmDeleteYes').href =
        'hapus_struktur.php?id=' + id;
    document.getElementById('confirmDeleteModal').style.display = 'flex';
}
function closeDeleteModal() {
    document.getElementById('confirmDeleteModal').style.display = 'none';
}
</script>

</body>
</html>
