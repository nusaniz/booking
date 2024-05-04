<?php
session_start();
include 'db_connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa keberadaan user di database
    $sql = "SELECT * FROM tb_users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Jika user ditemukan, buat session dan redirect ke halaman dashboard
        $_SESSION['username'] = $username;
        header("Location: ../app/index.php");
    } else {
        // Jika user tidak ditemukan, tampilkan pesan error
        // echo "Username atau password salah";
        header("Location: index.php");
    }
}
?>
