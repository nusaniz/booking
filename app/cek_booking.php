<?php
// session_start();
// Memeriksa apakah user sudah login atau belum
if (!isset($_SESSION['username'])) {
    header("Location: ../login/");
    exit();
}
?>

<?php include '../cek_booking_process.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Booking</title>
    <style>
        .status-setuju {
            background-color: #9bffb2;
            padding:10px;
        }
        .status-tolak {
            background-color: #ff9b9b;
            padding:10px;
        }
        .status-pending {
            background-color: #ffe9bf;
            padding:10px;
        }
    </style>
</head>
<body>
    <h1>Cek Kode Booking</h1>
    <!-- <form action="" method="POST">
        <label for="kode_booking">Masukkan Kode Booking:</label><br>
        <input type="text" id="kode_booking" name="kode_booking" required><br>
        <button type="submit" name="submit">Cek Status</button>
    </form> -->
<div class="container">
    <div class="row">
        <div class="col">
            <form action="" method="POST">
            <div class="form-group">
                <label for="kode_booking">Masukkan Kode Booking</label>
                <input type="text" class="form-control" id="kode_booking" name="kode_booking">
            </div>
            <button type="submit" name="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Cek Status</button>
            </form>
        </div>
    </div>
</div>
    
    <br>
    <br>
    <?php if(isset($status,$nama,$kode_booking,$nama,$alamat,$tanggal_penjemputan,$email)): ?>
    <p>Status Booking: <?php echo $status; ?></p>
    <p>Kode Booking: <?php echo $kode_booking; ?></p>
    <p>Nama: <?php echo $nama; ?></p>
    <p>Alamat: <?php echo $alamat; ?></p>
    <p>Tanggal penjemputan: <?php echo $tanggal_penjemputan; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <?php endif; ?>
</body>
</html>
