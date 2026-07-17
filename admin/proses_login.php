<?php
session_start();
include "koneksi.php";

// Dikirim dari form
$email=$_POST['email'];
$password=$_POST['password'];
$key = 'e60b7b98b43be1c85903fda55711ab47';
$temp = $key.base64_encode($password);
$pass = $temp;
$query=mysqli_query($koneksi,"select * from daftar_penilaian where email='$email' AND password='$pass' and aktif = 1");
//$query=mysqli_query($koneksi,"select * from karyawan where email='$email' AND password='$pass' and aktif = 1 and id_jabatan < 10");
$jumlah=mysqli_num_rows($query);
$a=mysqli_fetch_array($query);
if($jumlah > 0)
{
    $user=$a['nama'];
    $_SESSION['user']=$user;
	$email=$a['email'];
	header('location:index.php?email='.$email.'&user='.$user);
}
else
{
?>
	<script>
		alert("Username Atau Password Salah");
		window.location="login.html";
	</script>
<?php
}
?>

