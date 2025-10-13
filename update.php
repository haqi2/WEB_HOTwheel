<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// Validasi ID: pastikan integer
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id <= 0) {
    die("ID tidak valid.");
}

// Ambil data mobil
$sql = "SELECT * FROM koleksi WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Data tidak ditemukan.");
}

$mobil = $result->fetch_assoc();

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama_mobil'] ?? '');
    $seri = trim($_POST['seri'] ?? '');
    $tahun = filter_input(INPUT_POST, 'tahun', FILTER_VALIDATE_INT);
    $keterangan = trim($_POST['keterangan'] ?? '');

    // Validasi dasar
    if (empty($nama) || !$tahun || $tahun < 1968 || $tahun > 2025) {
        $error = "Nama mobil dan tahun (1968–2025) wajib diisi dengan benar.";
    } else {
        // Gunakan prepared statement untuk update
        $sql = "UPDATE koleksi SET 
                nama_mobil = ?, 
                seri = ?, 
                tahun = ?, 
                keterangan = ? 
                WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssis", $nama, $seri, $tahun, $keterangan, $id);

        if ($stmt->execute()) {
            header("Location: dashboard.php?status=updated");
            exit();
        } else {
            $error = "Gagal memperbarui data: " . $conn->error;
        }
    }
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Edit Mobil - Hot Wheels Showcase</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #3498db; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input, textarea { 
            width: 100%; 
            padding: 10px; 
            margin-top: 5px; 
            box-sizing: border-box; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
        }
        button { 
            padding: 12px 24px; 
            background: #3498db; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            margin-top: 20px; 
        }
        button:hover { background: #2980b9; }
        .back { 
            display: inline-block; 
            margin-top: 15px; 
            color: #3498db; 
            text-decoration: none; 
        }
        .error { color: red; background: #ffeaea; padding: 10px; border-radius: 4px; margin: 10px 0; }
    </style>
</head>
<body>
    <h2>Edit Mobil: <?= htmlspecialchars($mobil['nama_mobil']) ?></h2>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <label for="nama_mobil">Nama Mobil:</label>
        <input type="text" name="nama_mobil" id="nama_mobil" value="<?= htmlspecialchars($mobil['nama_mobil']) ?>" required>

        <label for="seri">Seri:</label>
        <input type="text" name="seri" id="seri" value="<?= htmlspecialchars($mobil['seri']) ?>">

        <label for="tahun">Tahun:</label>
        <input type="number" name="tahun" id="tahun" value="<?= (int)$mobil['tahun'] ?>" min="1968" max="2025" required>

        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan" id="keterangan" rows="4"><?= htmlspecialchars($mobil['keterangan']) ?></textarea>

        <button type="submit">Update Mobil</button>
    </form>

    <br>
    <a href="dashboard.php" class="back">← Kembali ke Daftar Koleksi</a>
</body>
</html>