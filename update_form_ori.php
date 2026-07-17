<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d H:i:s");
    $email              = $_POST['email'];    // email penilai dari form.php
    $penilai		    = $_POST['penilai'];  // nama penilai dari form.php
	$jabatan		    = $_POST['jabatan'];  // jabatan karyawan dari form.php
	$karyawan	    	= $_POST['karyawan']; // nama karyawan dari form.php
	?>
	<script>
	alert("email : "+"<?php echo $email; ?>"+" penilai : "+"<?php echo $penilai; ?>");
	alert("jabatan : "+"<?php echo $jabatan; ?>"+" karyawan : "+"<?php echo $karyawan; ?>");
	</script>
	<?php
	$qjabatan_penilai	= mysqli_query($koneksi,"select * from karyawan where nama = '$penilai'");
	$dpenilai			= mysqli_fetch_array($qjabatan_penilai);
	$id_penilai			= $dpenilai['id_jabatan'];   // id jabatan penilai
    
    $qjabatan=mysqli_query($koneksi,"select * from jabatan where id_jabatan = '$id_penilai'");
    $row=mysqli_fetch_array($qjabatan);
    $jabat              = $row['jabatan'];
    
	$qdivisi=mysqli_query($koneksi,"select * from karyawan where nama = '$karyawan'");
	$row1=mysqli_fetch_array($qdivisi);
    $divisi             = $row1['divisi'];
    $nilai1	 			= $_POST['nilai1'];
    $nilai2	 			= $_POST['nilai2'];
    $nilai3	 			= $_POST['nilai3'];
    $nilai4	 			= $_POST['nilai4'];
    $nilai5	 			= $_POST['nilai5'];
    $nilai6	 			= $_POST['nilai6'];
    $nilai7	 			= $_POST['nilai7'];
    $nilai8	 			= $_POST['nilai8'];
    $nilai9	 			= $_POST['nilai9'];
    $nilai10	 	    = $_POST['nilai10'];
    $nilai11	 		= $_POST['nilai11'];
    $nilai12	 		= $_POST['nilai12'];
    $nilai13	 		= $_POST['nilai13'];
    $nilai14	 		= $_POST['nilai14'];
    $nilai15	 		= $_POST['nilai15'];
    $nilai16	 		= $_POST['nilai16'];
    $nilai17	 		= $_POST['nilai17'];
	$catatan1			= $_POST['catatan1'];
	$catatan2			= $_POST['catatan2'];
	$catatan3			= $_POST['catatan3'];
	
	$insert = mysqli_query($koneksi, "insert into penilaian(tgl,karyawan,jabatan,divisi,penilai,nilai1,nilai2,nilai3,nilai4,nilai5,nilai6,nilai7,nilai8,nilai9,nilai10,nilai11,nilai12,nilai13,nilai14,nilai15,nilai16,nilai17,catatan1,catatan2,catatan3,status) values('$tgl','$karyawan','$jabatan','$divisi','$penilai','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$nilai6','$nilai7','$nilai8','$nilai9','$nilai10','$nilai11','$nilai12','$nilai13','$nilai14','$nilai15','$nilai16','$nilai17','$catatan1','$catatan2','$catatan3','CREATE')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
	if($insert)
	{ 
	    if($id_penilai == 2) // direktur utama
		{
		 	?>
	    	<script>
	           var a = "<?php echo $email; ?>";
	           var b = "<?php echo $penilai; ?>";
			   var nama = "<?php echo $karyawan; ?>";
			   var id_penilai = "<?php echo $id_penilai; ?>";
	           alert("Penilaian Berhasil dikirim ke system");
			   window.location.href = 'print_form.php?idp='+id_penilai+'&nama='+nama+'&email='+a;
		</script>
		<?php				  
		}
		else
		if($id_penilai == 3)  // wadirut
		{
	        ?>
	    	<script>
	        	var a = "<?php echo $email; ?>";
	        	var b = "<?php echo $penilai; ?>";
				var nama = "<?php echo $karyawan; ?>";
	        	alert("Penilaian Berhasil dikirim ke system");
				window.location.href = 'print_form_3.php?nama='+nama+'&email='+a;
			</script>
			<?php
		}
		else
		if($id_penilai == 4)   // direktur
		{
		    ?>
	    	<script>
	            var a = "<?php echo $email; ?>";
	        	var b = "<?php echo $penilai; ?>";
				var nama = "<?php echo $karyawan; ?>";
	        	alert("Penilaian Berhasil dikirim ke system");
				window.location.href = 'print_form_4.php?nama='+nama+'&email='+a;
		    </script>
			<?php
		}
		else
		if($id_penilai == 5)   // senior manager
		{
		    ?>
	    	<script>
	            var a = "<?php echo $email; ?>";
	        	var b = "<?php echo $penilai; ?>";
				var nama = "<?php echo $karyawan; ?>";
	        	alert("Penilaian Berhasil dikirim ke system");
				window.location.href = 'print_form_5.php?nama='+nama+'&email='+a;
		    </script>
			<?php
		}
		else
		if($id_penilai == 6)   // manager
		{
		    ?>
	    	<script>
	            var a = "<?php echo $email; ?>";
	        	var b = "<?php echo $penilai; ?>";
				var nama = "<?php echo $karyawan; ?>";
	        	alert("Penilaian Berhasil dikirim ke system");
				window.location.href = 'print_form_6.php?nama='+nama+'&email='+a;
		    </script>
			<?php
		}
		else
		if($id_penilai == 7)    // asmen
		{
		    ?>
	    	<script>
	            var a = "<?php echo $email; ?>";
	        	var b = "<?php echo $penilai; ?>";
				var nama = "<?php echo $karyawan; ?>";
	        	alert("Penilaian Berhasil dikirim ke system");
				window.location.href = 'print_form_7.php?nama='+nama+'&email='+a;
		    </script>
			<?php
		}	
	}		   
