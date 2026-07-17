<?php 
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database

$job  = $_POST['job'];
$lang = $_POST['lang'];
$pilihan = $lang == 'id' ? 'Pilih Bagian' : 'Choose Department';
if(!isset($job)){
	return false;
}

$query = mysqli_query($koneksi,"SELECT * FROM bagian WHERE id_bagian_fk = $job ORDER BY nama_bagian");
$i = 0;
$r = '<option value="">'.$pilihan.'</option>';
while ($row = mysqli_fetch_array($query)) {
	$result[$i]['id_department'] = $row['id_bagian'];
	$result[$i]['name'] = $row['nama_bagian'];
	$r .= '<option id="bag" value="'.$result[$i]['id_department'].'">'.$result[$i]['name'].'</option>';
	$i++;
}

echo $r;
?>