<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d");
    $id      = $_POST['id'];
    $catatan = $_POST['penilai'];
	$qupdate = mysqli_query($koneksi,"update penilaian set tgl_approval='$tgl',catatan_approval = '$catatan' where id = '$id'");
	if($qupdate)
	{
	   //update form dan kirim email ke sdm
	   ?>
	   <script>
	       var id = "<?php echo $id; ?>";
	       var approveal = "<?php echo $approval; ?>";
	       alert("Approval Berhasil dikirim ke system");
		   window.location.href = 'kirim_email_sdm.php?id='+id;
	   </script>
	   <?php	
	}   
?>