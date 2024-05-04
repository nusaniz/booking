<?php
// Koneksi ke database
// $servername = "localhost";
// $username = "root"; // Ganti dengan username MySQL Anda
// $password = ""; // Ganti dengan password MySQL Anda
// $database = "db_booking"; // Ganti dengan nama database Anda

require "../conf/db_connection.php";

// Membuat koneksi
// $conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah ada parameter ID yang dikirimkan
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengeksekusi query untuk mendapatkan data berdasarkan ID
    $sql = "SELECT * FROM bookings WHERE id = $id";
    $result = $conn->query($sql);

    // Memeriksa apakah data ditemukan
    if ($result->num_rows > 0) {
        // Mendapatkan data dari hasil query
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $email = $row['email'];

        // Periksa apakah ada pesan dari halaman update
        // session_start();
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']); // Hapus pesan dari session setelah ditampilkan
        }
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
}

// Menutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Data</h2>
    <?php if(isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
