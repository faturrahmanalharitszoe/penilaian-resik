<?php
set_time_limit(0);
include 'koneksi.php';
$user=$_POST['user'];
$nama_form=$_POST['nama'];
$jenis_form=$_POST['jenis'];
$perusahaan=$_POST['perusahaan'];
$no_form=$_POST['nomor'];
$judul_form=$_POST['judul'];
$tgl_form=$_POST['tgl'];
$sql=mysqli_query($koneksi,"update header set form='$nama_form',jenis_form='$jenis_form',company='$perusahaan',no_form='$no_form',judul_form='$judul_form',tgl_form='$tgl_form'");
if($sql)
{
    ?>
        <script>
	        alert("Simpan Form Sukses");
			var user = "<?php echo $user; ?>";
            window.location="master_form.php?user="+user;
        </script>
    <?php
}
else
{
    echo 'gagal simpan';
}
?>