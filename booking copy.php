<?php include 'booking_process.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>
<body>
    <h1>Form Booking</h1>
    <?php if (isset($_GET['success']) && isset($_GET['kode_booking'])): ?>
        <p>Kode Booking Anda: <?php echo $_GET['kode_booking']; ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="k" required><br>
        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" value="k" required><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value=""><br>
        <label for="tanggal_penjemputan">Tanggal Penjemputan:</label><br>
        <input type="date" id="tanggal_penjemputan" name="tanggal_penjemputan" required><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
