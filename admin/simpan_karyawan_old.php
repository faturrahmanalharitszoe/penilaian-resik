<?php
set_time_limit(0);
include 'config/koneksi.php';
$nik=$_POST['nik'];
$nama=$_POST['nama'];
$jabatan=$_POST['jabatan'];
$qjabatan=mysqli_query($koneksi,"select * from jabatan where jabatan = '$jabatan'");
$row=mysqli_fetch_array($qjabatan);
$id_jabatan=$row['id_jabatan'];
$divisi=$_POST['divisi'];
$email=$_POST['email'];
$qcek=mysqli_query($koneksi,"select * from karyawan where nik = '$nik'");
if(mysqli_num_rows($qcek)===0)
{
    $sql=mysqli_query($koneksi,"insert into karyawan(nik,nama,jabatan,id_jabatan,divisi,email) values('$nik','$nama','$jabatan','$id_jabatan','$divisi','$email')");
    if($sql)
    {
        ?>
        <script>
	        alert("Simpan Karyawan Sukses");
            window.location="index.php?pilih=9.1";
        </script>
        <?php
    }
    else
    {
	    echo 'gagal simpan';
    }
}
else
{
    ?>
    <script>
        alert("NIK Karyawan sudah terdaftar di system");
        window.location="index.php?pilih=9.1";
    </script>
    <?php
}
?>