<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_mobil'];
    $seri = $_POST['seri'];
    $tahun = $_POST['tahun'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO koleksi_hotwheels (nama_mobil, seri, tahun, keterangan) 
            VALUES ('$nama', '$seri', '$tahun', '$keterangan')";

    if ($conn->query($sql)) {
        header("Location: dashboard.php?status=created");
        exit();
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tambah Mobil - Hot Wheels</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #2ecc71; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input, textarea { width: 100%; padding: 10px; margin-top: 5px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 12px 24px; background: #2ecc71; color: white; border: none; border-radius: 4px; cursor: pointer; margin-top: 20px; }
        .back { display: inline-block; margin-top: 15px; color: #3498db; text-decoration: none; }
    </style>
</head>
<body>
    <h2>Tambah Mobil Baru</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <label for="nama_mobil">Nama Mobil:</label>
        <input type="text" name="nama_mobil" id="nama_mobil" required>

        <label for="seri">Seri:</label>
        <input type="text" name="seri" id="seri">

        <label for="tahun">Tahun:</label>
        <input type="number" name="tahun" id="tahun" min="1968" max="2025" required>

        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan" id="keterangan" rows="4"></textarea>

        <button type="submit">Simpan Mobil</button>
    </form>

    <br>
    <a href="dashboard.php" class="back">← Kembali ke Daftar</a>
</body>
</html>