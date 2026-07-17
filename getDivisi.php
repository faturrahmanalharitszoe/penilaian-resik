<?php 
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database

$job  = $_POST['job'];
$lang = $_POST['lang'];
$pilihan = $lang == 'id' ? 'Pilih Bagian' : 'Choose Department';
if(!isset($job)){
	return false;
}

$query = mysqli_query($koneksi,"select * from karyawan where divisi = $job order by id");
$i = 0;
$r = '<option value="">'.$pilihan.'</option>';
while ($row = mysqli_fetch_array($query)) {
	$result[$i]['nama'] = $row['nama'];
	$r .= '<option id="nama" value="'.$result[$i]['nama'].'</option>';
	$i++;
}

echo $r;
?>