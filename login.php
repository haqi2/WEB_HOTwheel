<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($username === 'haci' && $password === '1') {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php?status=success");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Hot Wheels Showcase</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <h1 class="logo-text">Hot Wheels Showcase</h1>
            <div class="logo-icon"></div>
        </div>
    </header>

    <main>
        <section>
            <h2>Login</h2>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required><br><br>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required><br><br>

                <button type="submit">Login</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Hot Wheels Showcase</p>
    </footer>
</body>
</html>