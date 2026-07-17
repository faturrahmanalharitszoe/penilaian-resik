<?php
//============================================
//@author : suckittrees.com
//============================================
//setting koneksi php dan mysql anda
$root = "root"; //username db anda
$pass = ""; //password database anda
$db  = "resik"; //nama database anda
$host = "localhost";
$con = mysqli_connect($host,$root,$pass,$db);
$mysqli = new mysqli($host,$root,$pass,$db);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>