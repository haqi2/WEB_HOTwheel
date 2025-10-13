<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hot Wheels Collection</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        nav a { margin-right: 15px; text-decoration: none; color: #3498db; }
        nav a:hover { text-decoration: underline; }
        .logout { color: #e74c3c; }
    </style>
</head>
<body>
    <h1>Hot Wheels Showcase</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="collection.php">Collection</a>
        <a href="iconic.php">Iconic Hot Wheels</a>
        <a href="Favorite.php">Favorite Hot Wheels</a>
        <a href="dashboard.php">Kelola Koleksi</a>
        <a href="logout.php" class="logout">Logout< /a>
    </nav>

    <main>
        <h2>Hot Wheel Collection</h2>
        <p>Welcome to my collection place.</p>

        <h3>By Series</h3>
        <ul>
            <li><strong>Mainline 2025</strong> – Koleksi terbaru tahun ini</li>
            <li><strong>Treasure Hunt</strong> – Mobil limited edition ini, berwarna emas dan sangat berkharisma</li>
            <li><strong>Super Treasure Hunt</strong> – Common cuy, cuma 1 per box</li>
            <li><strong>Color Shifters</strong> – Versi ini mobilnya bisa berubah warna tergantung sudut pandang</li>
        </ul>

        <h3>By Theme</h3>
        <ul>
            <li><strong>Classic Muscle Cars</strong> – Mustang, Camaro, Corvette</li>
            <li><strong>Exotic & Supercars</strong> – Lamborghini, Ferrari, McLaren</li>
            <li><strong>Monster Trucks</strong> – Ni gelo nih, cocok untuk lintasan nguwawur!</li>
        </ul>
    </main>

    <footer>
        <p>&copy; 2025 Hot Wheels Showcase. Terinspirasi dari 
            <a href="https://hotwheels.fandom.com/wiki/Hot_Wheels">Hot Wheels Wiki</a>.
        </p>
    </footer>
</body>
</html>