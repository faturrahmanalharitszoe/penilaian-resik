<?php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
$q = intval($_GET['q']);

$sql=mysqli_query("select divisi from karyawan where nama = '".$q."'";
$result = mysqli_fetch_array($sql);
$divisi=$result['divisi'];
?>
<script>
alert("<?php echo $divisi;?>");
</script>