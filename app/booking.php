<?php
// session_start();
// Memeriksa apakah user sudah login atau belum
if (!isset($_SESSION['username'])) {
    header("Location: ../login/");
    exit();
}
?>

<?php include '../booking_process.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>
<body>
    <h1>Form Booking</h1>
    <!-- <?php if (isset($_GET['success']) && isset($_GET['kode_booking'])): ?> -->
        <!-- <p>Kode Booking Anda: <span class="alert alert-success" role="alert"><?php echo $_GET['kode_booking']; ?></span></p> -->
    <!-- <?php endif; ?> -->
    

    <?php if (isset($_GET['success']) && isset($_GET['kode_booking'])): ?>
    <div id="copyAlert" class="alert alert-success" role="alert">
        Kode Booking Anda: <span id="kodeBooking"><?php echo $_GET['kode_booking']; ?></span>
        <button id="copyButton" class="btn btn-sm btn-secondary">Salin</button>
    </div>
<?php endif; ?>

<script>
    document.getElementById('copyButton').addEventListener('click', function() {
        var kodeBooking = document.getElementById('kodeBooking').innerText;
        navigator.clipboard.writeText(kodeBooking).then(function() {
            document.getElementById('copyAlert').innerHTML += '<br>Kode berhasil disalin!';
        }, function(err) {
            console.error('Gagal menyalin: ', err);
        });
    });
</script>






    <!-- <form action="" method="POST">
    <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="k" required><br>
        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" value="k" required><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value=""><br>
        <label for="tanggal_penjemputan">Tanggal Penjemputan:</label><br>
        <input type="date" id="tanggal_penjemputan" name="tanggal_penjemputan" required><br>
        <button type="submit" name="submit">Submit</button>
    </form> -->

    <div class="container">
    <div class="row">
        <div class="col">
            <form action="" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="indah">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="amerika">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="">
            </div>
            <div class="form-group">
                <label for="tanggal_penjemputan">Nama</label>
                <input type="date" class="form-control" id="tanggal_penjemputan" name="tanggal_penjemputan" value="">
            </div>
            <button type="submit" name="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Booking</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
