<?php
set_time_limit(0);
include 'koneksi.php';
$id=$_POST['id'];
$user=$_POST['user'];
$nama=$_POST['nama'];
if(isset($_POST['email']))
{	
	$email=$_POST['email'];
}	
else
{
 	$email='';
}
$nama=$_POST['aktif'];
$sql=mysqli_query($koneksi,"update daftar_penilaian set nama='$nama',email='$email',aktif='$aktif' where id='$id'");
if($sql)
{
    ?>
        <script>
	        alert("Simpan Registrasi Sukses");
			var
			user = "<?php echo $user; ?>";
            window.location="registrasi.php?user="+user;
        </script>
    <?php
}
else
{
    echo 'gagal simpan';
}
?>