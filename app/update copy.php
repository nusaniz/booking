<?php
require "../conf/db_connection.php";

// Koneksi ke database
// $servername = "localhost";
// $username = "root"; // Ganti dengan username MySQL Anda
// $password = ""; // Ganti dengan password MySQL Anda
// $database = "db_booking"; // Ganti dengan nama database Anda

// Membuat koneksi
// $conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    // Mengeksekusi query untuk memperbarui data berdasarkan ID
    $sql = "UPDATE bookings SET nama='$nama', alamat='$alamat', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Data berhasil diperbarui.";
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi database
$conn->close();

// Redirect kembali ke halaman edit_booking.php
// header("Location: edit_booking.php?id=".$id);
header("Location: index.php?page=edit_booking&&id=".$id);
exit();
?>
