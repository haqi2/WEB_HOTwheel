<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$sql = "SELECT * FROM koleksi_hotwheels ORDER BY tahun DESC";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Hot Wheels CRUD Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #e74c3c; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 8px 12px; text-decoration: none; margin: 0 5px; border-radius: 4px; }
        .btn-add { background: #2ecc71; color: white; }
        .btn-edit { background: #3498db; color: white; }
        .btn-delete { background: #e74c3c; color: white; }
        .header { display: flex; justify-content: space-between; align-items: center; }
        .logout { color: #e74c3c; text-decoration: none; font-weight: bold; }
        .empty { color: #7f8c8d; font-style: italic; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Hot Wheels Showcase CRUD</h2>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <p>Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>!</p>

    <a href="create.php" class="btn btn-add">+ Tambah Mobil Baru</a>

    <h3>Daftar Koleksi Hot Wheels</h3>

    <?php if (!$result || $result->num_rows === 0): ?>
        <p class="empty">Belum ada data. Tambahkan mobil pertamamu!</p>
    <?php else: ?>
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
                <?php while ($mobil = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $mobil['id'] ?></td>
                    <td><?= htmlspecialchars($mobil['nama_mobil']) ?></td>
                    <td><?= htmlspecialchars($mobil['seri']) ?></td>
                    <td><?= $mobil['tahun'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $mobil['id'] ?>" class="btn btn-edit">Edit</a>
                        <a href="delete.php?id=<?= $mobil['id'] ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <p><a href="index.php">← Kembali ke Menu Utama</a></p>
</body>
</html>