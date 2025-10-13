<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
$status = $_GET['status'] ?? '';
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hot Wheels Showcase — Home</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .menu {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin: 20px 0;
        }
        .btn {
            padding: 12px 20px;
            text-decoration: none;
            color: white;
            border-radius: 6px;
            font-weight: bold;
            text-align: center;
            min-width: 180px;
        }
        .btn-collection { background: #3498db; }
        .btn-iconic { background: #9b59b6; }
        .btn-fav { background: #2ecc71; }
        .btn-crud { background: #e74c3c; }
        .header { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; }
        .logout { color: #e74c3c; text-decoration: none; font-weight: bold; }
        .welcome { 
            background: #f8f9fa; 
            padding: 15px; 
            margin: 20px 0; 
            border-left: 4px solid #3498db; 
            border-radius: 0 6px 6px 0;
        }
        .status {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            text-align: center;
            font-weight: bold;
        }
        .status-success { background: #d4edda; color: #155724; }
        .status-logout { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Hot Wheels Showcase</h2>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <?php if ($status === 'loggedout'): ?>
        <div class="status status-logout">Anda telah logout.</div>
    <?php elseif ($status === 'success'): ?>
        <div class="status status-success">Login berhasil!</div>
    <?php endif; ?>

    <div class="welcome">
        <p>Welcome to Hot Wheels Showcase Site ! </p>
    </div>

    <div class="menu">
        <a href="collection.php" class="btn btn-collection">Favorite & Gallery</a>
        <a href="iconic.php" class="btn btn-iconic">Iconic Car</a>
        <a href="Favorite.php" class="btn btn-fav">Favorit HotWheel</a>
        <a href="dashboard.php" class="btn btn-crud"> CRUD </a>
    </div>

    <hr>    
    <h3>ℹ️ Source</h3>
    <ul>
        <li>
            Dari <strong>Hot Wheels Wiki</strong>: 
            <em>36.051.633 pengguna terdaftar, 652.925 suntingan, 9.726 artikel, dan 138.129 gambar sejak 16 Maret 2006</em>.
            <br>
            <a href="https://hotwheels.fandom.com/wiki/Hot_Wheels" target="_blank">hotwheels.fandom.com</a>
        </li>
        <li>
            Dari <strong>FastestHotWheels.com</strong>: 
            <em>Semua mobil diuji dalam kondisi <strong>stock (tanpa modifikasi)</strong>, 
            menggunakan <strong>Hot Wheels Super 6 Lane Raceway</strong>.</em>
            <br>
            <a href="https://fastesthotwheels.com/" target="_blank">fastesthotwheels.com</a>
        </li>
    </ul>

    <footer>
        <p>&copy; 2025 Hot Wheels Showcase. Tidak berafiliasi dengan Mattel atau Hot Wheels.</p>
    </footer>
</body>
</html>