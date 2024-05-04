<?php
include 'conf/db_connection.php';

// Generate unique booking code
$kode_booking = generateBookingCode();

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_penjemputan = $_POST['tanggal_penjemputan'];
    $email = $_POST['email'];
    $status = 'Menunggu Persetujuan';

    $sql = "INSERT INTO bookings (nama, alamat, tanggal_penjemputan, status, kode_booking, email) VALUES ('$nama', '$alamat', '$tanggal_penjemputan', '$status', '$kode_booking', '$email')";
    mysqli_query($conn, $sql);

    // Redirect atau pesan sukses
    header("Location: index.php?page=booking&&success=1&kode_booking=$kode_booking");
}

// Function to generate unique booking code
function generateBookingCode() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < 8; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}
?>
