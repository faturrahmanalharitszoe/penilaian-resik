<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d H:i:s");
	$id	   			   	= $_POST['id'];
    $nama               = $_POST['penilai'];
	$karyawan			= $_POST['karyawan'];
	?>
	<script>
	alert("<?php echo $karyawan; ?>");
	</script>
	<?php
	$query=mysqli_query($koneksi,"select * from karyawan where nama='$nama'");
	$data=mysqli_fetch_array($query);
	$email=$data['email'];
    $hasil1	 			= $_POST['hasil1'];
    $hasil2	 			= $_POST['hasil2'];
    $hasil3	 			= $_POST['hasil3'];
    $hasil4	 			= $_POST['hasil4'];
    $hasil5	 			= $_POST['hasil5'];
    $hasil6	 			= $_POST['hasil6'];
    $hasil7	 			= $_POST['hasil7'];
    $hasil8	 			= $_POST['hasil8'];
    $hasil9	 			= $_POST['hasil9'];
    $hasil10	 	    = $_POST['hasil10'];
    $hasil11	 		= $_POST['hasil11'];
    $hasil12	 		= $_POST['hasil12'];
    $hasil13	 		= $_POST['hasil13'];
    $hasil14	 		= $_POST['hasil14'];
    $hasil15	 		= $_POST['hasil15'];
    $hasil16	 		= $_POST['hasil16'];
    $hasil17	 		= $_POST['hasil17'];
	$hasil18	 		= $_POST['hasil18'];
	$hasil19	 		= $_POST['hasil19'];
	$catatan11			= $_POST['catatan11'];
	$catatan21			= $_POST['catatan21'];
	$catatan31			= $_POST['catatan31'];
	$catatan41			= $_POST['catatan41'];
	
	$insert = mysqli_query($koneksi, "update penilaian set hasil1='$hasil1',hasil2='$hasil2',hasil3='$hasil3',hasil4='$hasil4',hasil5='$hasil5',hasil6='$hasil6',hasil7='$hasil7',hasil8='$hasil8',hasil9='$hasil9',hasil10='$hasil10',hasil11='$hasil11',hasil12='$hasil12',hasil13='$hasil13',hasil14='$hasil14',hasil15='$hasil15',hasil16='$hasil16',hasil17='$hasil17',hasil18='$hasil18',hasil19='$hasil19',catatan11='$catatan11',catatan21='$catatan21',catatan31='$catatan31',catatan41='$catatan41',approval='$nama',tgl_approval='$tgl' where id='$id'");
	if($insert)
	{ 
	    ?>
	    <script>
	        var a = "<?php echo $email; ?>";
	        var b = "<?php echo $nama; ?>";
			var nama = "<?php echo $karyawan; ?>";
			alert("a = "+a+"/b = "+b+"/nama = "+nama);
			
	        alert("Penilaian Berhasil dikirim ke system");
			window.location.href = 'print_approval.php?nama='+nama+'&email='+a;
 
		</script>
		<?php
	}		   
?>