<?php 
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database

$province = $_POST['province'];
$lang = $_POST['lang'];
$pilihan = $lang == 'id' ? 'Pilih Kota' : 'Choose City';

if(!isset($province)){
	return false;
}

$query = mysqli_query($koneksi,"SELECT * FROM kota WHERE id_provinsi_fk = $province ORDER BY nama_kota");
$i = 0;
$r = '<option value="">'.$pilihan.'</option>';
while ($row = mysqli_fetch_array($query)) {
	$result[$i]['id']   = $row['id_kota1'];
	$result[$i]['name'] = $row['nama_kota'];
	$r .= ' <option id="bag" class="'.$result[$i]['id'].'" value="'.$result[$i]['id'].'">'.$result[$i]['name'].'</option>';
	$i++;
}

echo $r;
?>