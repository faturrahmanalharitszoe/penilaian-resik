<?php
set_time_limit(0);
include 'koneksi.php';
$user=$_POST['user'];
$nik=$_POST['nik'];
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
$sql=mysqli_query($koneksi,"insert into karyawan(nik,nama,jenis_kelamin,jabatan,golongan,id_jabatan,divisi,divisi2,divisi3,email,no_hp,pendidikan,jurusan,tgl_masuk) values('$nik','$nama','$kelamin','$jabatan','$golongan','$id_jabatan','$divisi','$divisi2','$divisi3','$email','$handphone','$pendidikan','$jurusan','$tgl_efektif')");
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