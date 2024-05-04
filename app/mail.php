<?php
// session_start();
// Memeriksa apakah user sudah login atau belum
if (!isset($_SESSION['username'])) {
    header("Location: ../login/");
    exit();
}
?>  

<?php include '../mailConf/config_email.php'; ?>

<?php
    set_error_handler(function(int $errno, string $errstr) {
        if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
            return false;
        } else {
            return true;
        }
    }, E_WARNING);

    $mail = $_GET['mail']; 

    // Periksa apakah parameter 'send' ada dalam URL
    if (isset($_GET['mail']) && $_GET['mail'] == 'ok') {
        echo "<p style='background-color: #c2ffc2;padding: 10px;'>Mail setup disimpan!</p>";
    }
    else if (isset($_GET['mail']) && $_GET['mail'] == 'gagal'){
        echo "<p>Email gagal dikirim!</p>";
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pengirim Email</title>
</head>
<body>
<h2>Informasi Pengirim Email</h2>
    <p><strong>Username:</strong> <?php echo $username; ?></p>
    <p><strong>Password:</strong> <?php echo $password; ?></p>
    <p><strong>Email Pengirim:</strong> <?php echo $email_pengirim; ?></p>
    <p><strong>Nama Pengirim:</strong> <?php echo $nama_pengirim; ?></p>


    <h2>Ubah Pengirim Email</h2>
    <!-- <form action="../mailConf/proses_ubah_pengirim.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>"><br>
        <label for="password">Password:</label><br>
        <input type="text" id="password" name="password" value="<?php echo $password; ?>"><br>
        <label for="email">Email Pengirim:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email_pengirim; ?>"><br>
        <label for="nama">Nama Pengirim:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $nama_pengirim; ?>"><br>
        <button type="submit" name="submit">Simpan Perubahan</button>
    </form> -->

<div class="container">
    <div class="row">
        <div class="col">
                    <form action="../mailConf/proses_ubah_pengirim.php" method="POST">
            <!-- <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div> -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email_pengirim; ?>">
            </div>
            <div class="form-group">
                <label for="nama">nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_pengirim; ?>">
            </div>
            <!-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" name="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>


    
</body>
</html>
