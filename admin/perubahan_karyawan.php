<?php
set_time_limit(0);
include 'koneksi.php';
$id=$_POST['id'];
$nik=$_POST['nik'];
$user=$_POST['user'];
$nama=$_POST['nama'];
$jabatan=$_POST['jabatan'];
if(isset($_POST['golongan']))
{
    $golongan=$_POST['golongan'];
} 
else
{
 	$golongan = '';
}
if(isset($_POST['jurusan']))
{
 	$jurusan=$_POST['jurusan'];
}
else
{
 	$jurusan = '';
}
if(isset($_POST['tgl_efektif']))
{	
	$tgl_efektif=$_POST['tgl_efektif'];
}	
else
{
 	$tgl_efektif = '';
}
if(isset($_POST['pendidikan']))
{
    $pendidikan=$_POST['pendidikan'];
} 
else
{
 	$pendidikan = '';
}  
if(isset($_POST['handphone']))
{
    $handphone=$_POST['handphone'];
} 
else
{
 	$handphone = '';
}
$kelamin=$_POST['kelamin'];
$aktif=$_POST['aktif'];
$qjabatan=mysqli_query($koneksi,"select * from jabatan where jabatan = '$jabatan'");
$row=mysqli_fetch_array($qjabatan);
$id_jabatan=$row['id_jabatan'];
$divisi=$_POST['divisi'];
if(isset($_POST['divisi2']))
{
  	$divisi2=$_POST['divisi2'];
}
else
{
 	$divisi2='';
}
if(isset($_POST['divisi3']))
{	
	$divisi3=$_POST['divisi3'];
}
else
{
 	$divisi3='';
}
if(isset($_POST['email']))
{	
	$email=$_POST['email'];
}	
else
{
 	$email='';
}
$sql=mysqli_query($koneksi,"update karyawan set nama='$nama',jenis_kelamin='$kelamin',jabatan='$jabatan',golongan='$golongan',id_jabatan='$id_jabatan',divisi='$divisi',divisi2='$divisi2',divisi3='$divisi3',email='$email',no_hp='$handphone',pendidikan='$pendidikan',jurusan='$jurusan',tgl_masuk='$tgl_efektif',aktif='$aktif' where id='$id'");
if($sql)
{
    ?>
        <script>
	        alert("Simpan Karyawan Sukses");
			var
			user = "<?php echo $user; ?>";
            window.location="karyawan.php?user="+user;
        </script>
    <?php
}
else
{
    echo 'gagal simpan';
}
?>