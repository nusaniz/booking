<?php
include '../conf/db_connection.php';

$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);
?>
