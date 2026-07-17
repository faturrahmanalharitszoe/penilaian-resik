<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d");
    $id      = $_POST['id'];
    $catatan = $_POST['catatan'];
	$qdirut = mysqli_query($koneksi,"select * from karyawan where id_jabatan = 1");
	$ddirut = mysqli_fetch_array($qdirut);
	$dirut = $ddirut['nama'];
	$qpenilai = mysqli_query($koneksi,"select * from penilaian where id = '$id'");
	$dpenilai = mysqli_fetch_array($qpenilai);
	$penilai = $dpenilai['penilai'];
	$karyawan = $dpenilai['karyawan'];
	$query = mysqli_query($koneksi,"select * from karyawan where nama = '$penilai'");
	$data=mysqli_fetch_array($query);
	$emailpenilai=$data['email'];
	$qupdate = mysqli_query($koneksi,"update penilaian set catatan_reject = '$catatan',reject='$dirut',tgl_reject='$tgl',status='REJECT' where id = '$id'");
	if($qupdate)
	{
	   //update form dan kirim email ke sdm
	   ?>
	   <script>
	       var id = "<?php echo $id; ?>";
	       var email = "<?php echo $emailpenilai; ?>";
		   var nama = "<?php echo $karyawan; ?>";
	       alert("Reject Penilaian Berhasil dikirim ke system");
		   /*window.location.href = 'kirim_email_reject_3.php?id='+id+'&email='+email+'&nama='+nama;*/
		   var win = window.open("https://resikcemerlang.com/penilaian/kirim_email_reject_3.php?id="+id+"&email="+email+"&nama="+nama, "win", "width=600,height=800");
	   </script>
	   <?php	
	}   
?>