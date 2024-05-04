<?php
session_start();
// Memeriksa apakah user sudah login atau belum
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Jika user sudah login, tampilkan halaman dashboard
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Ini adalah halaman dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
