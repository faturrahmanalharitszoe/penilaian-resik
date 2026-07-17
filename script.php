<?php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
if (isset($_GET['region'])) {
    $region = mysqli_real_escape_string($koneksi,$_GET['region']);
    $query = "SELECT * FROM karyawan WHERE jabatan = $region";
    $ret = $sql->query($query);
    $result = array();
    while ($row = $ret->fetch_assoc()) {
         $result[] = array(
             'nama' => $row['nama']
         );
    }
    echo json_encode($result);
}