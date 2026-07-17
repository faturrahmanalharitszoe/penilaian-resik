<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d");
    $id      = $_GET['id'];
	$catatan_approve = $_POST['catatan'];
	$qnilai = mysqli_query($koneksi,"select * from penilaian where id = '$id'");
	$dnilai = mysqli_fetch_array($qnilai);
	$menyetujui = $dnilai['menyetujui'];
	
	$qupdate = mysqli_query($koneksi,"update penilaian set catatan_approval='$catatan_approve',status='APPROVED',tgl_approval='$tgl' where id = '$id'");
	if($qupdate)
	{
	   //update form dan kirim email ke sdm
	   ?>
	   <script>
	       var id = "<?php echo $id; ?>";
	       alert("Update Penilaian Berhasil dikirim ke system");
		   window.location.href = 'print_form3.php?id='+id;
	   </script>
	   <?php	
	}   
?>