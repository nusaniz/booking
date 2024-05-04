<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



// require 'vendor/autoload.php'; // Sesuaikan dengan lokasi file autoload PHPMailer
require 'PHPMailer/PHPMailer/PHPMailer.php';
require 'PHPMailer/PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer/Exception.php';




// Fungsi untuk mengirim email
function kirimEmail($penerima, $subjek, $pesan) {
    $mail = new PHPMailer(true);
    
    try {
        // Konfigurasi SMTP
        include 'mailConf/config_email.php';

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Ganti dengan host SMTP Anda
        $mail->SMTPAuth = true;
        $mail->Username = $username; // Ganti dengan alamat email Anda
        $mail->Password = $password; // Ganti dengan password email Anda
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Siapkan email
        $mail->setFrom($email_pengirim, $nama_pengirim); // Ganti dengan alamat email dan nama Anda
        // $mail->setFrom($email_pengirim, $nama_pengirim); // Ganti dengan alamat email dan nama Anda
        $mail->addAddress($penerima); // Tambahkan penerima email
        $mail->isHTML(true);
        $mail->Subject = $subjek;
        $mail->Body = $pesan;

        // Kirim email
        $mail->send();
        echo "Email berhasil dikirim.";
    } catch (Exception $e) {
        echo "Email gagal dikirim: {$mail->ErrorInfo}";
    }
}

// Koneksi ke database
include 'conf/db_connection.php';
$id = $_GET['id'];


// Query untuk memeriksa kolom "status" yang bernilai "divalidasi"
// $sql = "SELECT email FROM bookings WHERE status = 'Disetujui'";
// $sql = "SELECT * FROM bookings WHERE status = 'Disetujui' AND id = $id";
// $sql = "SELECT * FROM bookings WHERE status = 'Disetujui'";
$sql = "SELECT * FROM bookings WHERE id = $id";
$result = mysqli_query($conn, $sql);

// Kirim email ke setiap pengguna yang statusnya divalidasi
while ($row = mysqli_fetch_assoc($result)) {
    $penerima = $row['email'];
    $subjek = "Booking " . $row['kode_booking'] . " " . $row['status'];
    // $pesan = "Status validasi Anda telah berubah menjadi divalidasi.";

    $pesan =
    "Kode Boooking: " . $row['kode_booking'] . "<br><br>" .

    "Nama: " . $row['nama'] . "<br>" .
    "Alamat: " . $row['alamat'] . "<br>" .
    "Tanggal penjemputan: " . $row['tanggal_penjemputan'] . "<br>" .
    "Email: " . $row['email'] . "<br><br>" .
    
    "Status: <span style='background-color: #8fff8f;padding: 10px;'>" . $row['status'] . "</span><br><br>" .
    
    "-GOLA"
    ;
    kirimEmail($penerima, $subjek, $pesan);
}

header("Location: app/index.php?page=admin");
?>
