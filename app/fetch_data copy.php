<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "db_booking"; // Ganti dengan name database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menentukan jumlah data per halaman
$show = isset($_POST['show']) ? $_POST['show'] : 10;

// Calculate pagination
$total_query = "SELECT COUNT(*) AS total FROM bookings";
$total_result = $conn->query($total_query);
$total_rows = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $show);

$hal = isset($_GET['hal']) && $_GET['hal'] <= $total_pages ? $_GET['hal'] : 1;
$offset = ($hal - 1) * $show;

// Menghitung total data
$total_data_query = "SELECT COUNT(*) AS total FROM bookings";
$result_total = $conn->query($total_data_query);
$total_rows = $result_total->fetch_assoc()['total'];


// Query untuk mengambil data dari tabel dengan pagination
$sql = "SELECT * FROM bookings LIMIT $offset, $show";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM bookings WHERE nama LIKE '%$search%' OR kode_booking LIKE '%$search%' LIMIT $offset, $show";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Menampilkan data dalam format tabel HTML
    $no = ($hal - 1) * $show + 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='text-center'>" . $no++ . ".</td>";
        echo "<td>" . $row["kode_booking"] . "</td>";
        echo "<td>" . $row["nama"] . "</td>";
        echo "<td>" . $row["alamat"] . "</td>";
        echo "<td>" . $row["tanggal_penjemputan"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td> <a href='approve_booking.php?id=" . $row["id"] . "'>Setuju</a> | <a href='reject_booking.php?id=" . $row["id"] . "'>Tolak</a>";
        // echo "<td>" . $row["status_kirim_email"] . "</td>";
        // echo "<td class='" . ($row['status_kirim_email'] == 'Sukses' ? 'status-valid' : '') . "'>" . $row["status_kirim_email"] . "</td>";
        // echo "<td><img src='https://sinau.uinsby.ac.id/uploads/fotomhs/thumb/" . $row["photo"] . "' style='height:150px;'></img></td>";
        // echo "<td>" . $row["seat"] . "</td>";
        // Menandai status dengan warna hijau jika telah divalidasi
        // echo "<td class='" . ($row['status'] == 'Telah divalidasi' ? 'status-valid' : '') . "'>" . $row["status"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
}

// Menutup koneksi database
$conn->close();
?>
