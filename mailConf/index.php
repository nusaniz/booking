<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pengirim Email</title>
</head>
<body>
    <h2>Ubah Pengirim Email</h2>
    <form action="proses_ubah_pengirim.php" method="POST">
        <label for="email">Email Pengirim:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="nama">Nama Pengirim:</label><br>
        <input type="text" id="nama" name="nama" required><br>
        <button type="submit" name="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
