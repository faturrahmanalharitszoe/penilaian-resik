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
$jumlah=mysqli_num_rows($query);
$a=mysqli_fetch_array($query);
if($jumlah > 0)
{
    $nama=$a['nama'];
    $_SESSION['nama']=$nama;
    ?>
    <script>
        alert("<?php echo $_SESSION['nama'];?>")
    </script>
    <?php
	$email=$a['email'];
	header('location:form.php?email='.$email.'&nama='.$nama);
}
else
{
?>
	<script>
		alert("Username Atau Password Salah");
		window.location="login.php";
	</script>
<?php
}
?>

