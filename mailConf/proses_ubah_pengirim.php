<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email_pengirim = $_POST['email'];
    $nama_pengirim = $_POST['nama'];

    // Validasi input di sini jika diperlukan

    // Simpan nilai pengirim ke dalam file konfigurasi atau database jika diperlukan
    $config_file = 'config_email.php'; // Ganti dengan nama file konfigurasi Anda
    $content = "<?php
    \n\$username = '$username';
    \n\$password = '$password';
    \n\$email_pengirim = '$email_pengirim';
    \n\$nama_pengirim = '$nama_pengirim';
    \n?>";

    // Tulis ke dalam file konfigurasi
    if (file_put_contents($config_file, $content)) {
        echo "Pengirim email berhasil diubah.";
    } else {
        echo "Gagal mengubah pengirim email.";
    }
} else {
    // Tampilkan pesan jika pengguna mencoba mengakses halaman ini secara langsung tanpa melalui form
    echo "Akses tidak sah.";
}

header ('Location: ../app/index.php?page=mail&&mail=ok');
?>

../app/index.php?page=mail
