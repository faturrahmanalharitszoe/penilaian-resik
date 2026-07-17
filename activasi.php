<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    $email		    = $_GET['email'];
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d H:i:s");
    $qupdate=mysqli_query($koneksi,"update daftar_penilaian set aktif=1,tgl_aktivasi='$tgl' where email='$email'");
	if($qupdate)
	{
	    header('location:login.php?email='.$email);
    }
?>
