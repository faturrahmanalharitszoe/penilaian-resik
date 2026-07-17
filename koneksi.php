<?php
$host = "db.resikcemerlang.com"; // server
$username = "u5633506_resik"; // username
$pass = "Resik2022"; // password

$database = "u5633506_resik_new"; // nama database

// $host = "localhost"; // server
// $username = "root"; // username
// $pass = ""; // password

// $database = "resik_new"; // nama database

$koneksi = mysqli_connect($host, $username, $pass, $database); // menggunakan mysqli_connect
 
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
} else {
    // echo "Koneksi berhasil"; // bisa dicomment setelah testing
}
?>