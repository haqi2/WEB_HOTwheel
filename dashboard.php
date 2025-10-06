<?php
session_start();

// Keamanan: redirect ke login jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=unauthorized");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
$success = isset($_GET['status']) && $_GET['status'] === 'success';
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Hot Wheels Showcase</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .welcome-box {
            background: #e3f2fd;
            padding: 15px;
            border-left: 4px solid #2196f3;
            margin: 20px 0;
            border-radius: 4px;
        }
        .info-card {
            background: #f5f5f5;
            padding: 15px;
            margin: 15px 0;
            border-radius: 6px;
            border: 1px solid #ddd;
        }
        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            <h1 class="logo-text">Hot Wheels Showcase</h1>
            <div class="logo-icon"></div>
        </div>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="collection.php">Collection</a>
        <a href="iconic.php">Iconic Hot Wheels</a>
        <a href="Favorite.php">Favorite Hot Wheels</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </nav>

    <main>
        <section>
            <h2>Dashboard Eksklusif</h2>
            
            <div class="welcome-box">
                <p>Halo, <strong><?= $username ?></strong>! 🏁</p>
                <p>Selamat datang di area eksklusif Hot Wheels Showcase.</p>
                <?php if ($success): ?>
                    <p class="success">✔ Login berhasil!</p>
                <?php endif; ?>
            </div>
        </section>

        <section>
            <h3>📊 Statistik dari Hot Wheels Wiki</h3>
            <div class="info-card">
                <p>Sejak 16 Maret 2006:</p>
                <ul>
                    <li><strong>36.051.633</strong> pengguna terdaftar</li>
                    <li><strong>652.925</strong> suntingan dilakukan</li>
                    <li><strong>9.726</strong> artikel dibuat</li>
                    <li><strong>138.129</strong> gambar diunggah</li>
                </ul>
                <p>Sumber: <a href="https://hotwheels.fandom.com/wiki/Hot_Wheels" target="_blank">Hot Wheels Wiki</a></p>
            </div>
        </section>

        <section>
            <h3>🏎️ Fakta dari FastestHotWheels.com</h3>
            <div class="info-card">
                <p>Tim FastestHotWheels.com menguji mobil Hot Wheels secara objektif:</p>
                <ul>
                    <li>Semua mobil diuji dalam kondisi <strong>stock (tanpa modifikasi)</strong></li>
                    <li>Uji coba dilakukan di <strong>Hot Wheels Super 6 Lane Raceway</strong></li>
                    <li>Hanya mobil dengan <strong>putaran roda lancar</strong> dan <strong>poros sempurna</strong> yang bisa menang</li>
                </ul>
                <p>Sumber: <a href="https://fastesthotwheels.com/" target="_blank">FastestHotWheels.com</a></p>
            </div>
        </section>

        <section>
            <h3>Fitur Eksklusif (Coming Soon)</h3>
            <ul>
                <li>Simpan mobil favorit ke koleksi pribadi</li>
                <li>Bandingkan kecepatan mobil Hot Wheels</li>
                <li>Akses daftar Treasure Hunt terbaru</li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Hot Wheels Showcase. Data dari 
            <a href="https://hotwheels.fandom.com/wiki/Hot_Wheels">Hot Wheels Wiki</a> dan 
            <a href="https://fastesthotwheels.com/">FastestHotWheels.com</a>.
        </p>
    </footer>

    <script src="script.js"></script>
</body>
</html>