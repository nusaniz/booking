<?php
include 'conf/db_connection.php';

if (isset($_POST['submit'])) {
    // $kode_booking = $_POST['kode_booking'];
    $kode_booking = mysqli_real_escape_string($conn, $_POST['kode_booking']);

    $sql = "SELECT * FROM bookings WHERE kode_booking = '$kode_booking'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
            // Kode kode_booking valid, tampilkan informasi kode_booking

        $row = mysqli_fetch_assoc($result);
        $status = "<span class='" . ($row['status'] == 'Disetujui' ? 'status-setuju' : '') . ($row['status'] == 'Ditolak' ? 'status-tolak' : '') . ($row['status'] == 'Menunggu Persetujuan' ? 'status-pending' : '') . "'>" . $row['status'] . "</span>";
        $kode_booking = $row['kode_booking'];
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $tanggal_penjemputan = $row['tanggal_penjemputan'];
        $email = $row['email'];
    } else {
            // Kode kode_booking tidak valid

        $status = "Kode booking tidak ditemukan";
        $kode_booking = "-";
        $nama = "-";
        $alamat = "-";
        $tanggal_penjemputan = "-";
        $email = "-";
    }
}
?>
