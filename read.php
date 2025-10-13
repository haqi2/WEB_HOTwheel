<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// Ambil semua data dari tabel `koleksi`
$sql = "SELECT id, nama_mobil, seri, tahun FROM koleksi ORDER BY tahun DESC";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Koleksi – Hot Wheels Showcase</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
            background-color: #f9f9f9;
        }
        h1, h2 {
            color: #e74c3c;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }
        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn:hover {
            background: #c0392b;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .actions a {
            margin-right: 8px;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 3px;
            color: white;
            font-size: 0.9em;
        }
        .edit { background: #3498db; }
        .delete { background: #e74c3c; }
        .back-home {
            display: inline-block;
            margin-top: 10px;
            color: #3498db;
            text-decoration: none;
        }
        .empty {
            text-align: center;
            color: #7f8c8d;
            font-style: italic;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Hot Wheels Showcase — Kelola Koleksi</h2>
    <a href="logout.php" style="color: #e74c3c; text-decoration: none;">Logout</a>
</div>

<p>Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>!</p>

<a href="create.php" class="btn">+ Tambah Mobil Baru</a>

<h3>Daftar Koleksi Hot Wheels</h3>

<?php if ($result && $result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mobil</th>
                <th>Seri</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= (int)$row['id'] ?></td>
                <td><?= htmlspecialchars($row['nama_mobil']) ?></td>
                <td><?= htmlspecialchars($row['seri']) ?></td>
                <td><?= (int)$row['tahun'] ?></td>
                <td class="actions">
                    <a href="update.php?id=<?= urlencode($row['id']) ?>" class="edit">Edit</a>
                    <a href="delete.php?id=<?= urlencode($row['id']) ?>" class="delete" onclick="return confirm('Yakin ingin menghapus mobil ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="empty">Belum ada data koleksi. <a href="create.php">Tambahkan sekarang!</a></div>
<?php endif; ?>

<br>
<a href="index.php" class="back-home">← Kembali ke Menu Utama</a>

</body>
</html>