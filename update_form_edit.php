<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d");
	$month = date('m');
	$year = date('Y');
	if($month < 8 && $month > 1)
	{
        $periode = 'Jan - Jun '.$year;
	}
	else
	{
 	 	$periode = 'Jul - Des '.$year;
	}
    $email              = $_POST['email'];    // email penilai dari form.php
    $penilai		    = $_POST['penilai'];  // nama penilai dari form.php
	$jabatan		    = $_POST['jabatan'];  // jabatan karyawan dari form.php
	$karyawan	    	= $_POST['nama']; // nama karyawan dari form.php
	$id					= $_POST['id'];
	?>
	<script>
	alert("id : "+"<?php echo $id;?>");
	alert("email : "+"<?php echo $email; ?>");
	alert("penilai : "+"<?php echo $penilai;?>");
	alert("jabatan : "+"<?php echo $jabatan;?>");
	alert("karyawan : "+"<?php echo $karyawan;?>");
	</script>
	<?php
	
	$qjabatan_penilai	= mysqli_query($koneksi,"select * from karyawan where nama = '$penilai'");
	$dpenilai			= mysqli_fetch_array($qjabatan_penilai);
	$id_penilai			= $dpenilai['id_jabatan'];   // id jabatan penilai
    $jabat				= $dpenilai['jabatan'];      // jabatan penilai
	$golongan			= $dpenilai['golongan'];
	
	$qrole				= mysqli_query($koneksi,"select * from role_approval where id_penilai = '$id_penilai'");
	$drole				= mysqli_fetch_array($qrole);
	$id_mengetahui_1	= $drole['id_mengetahui_1'];
	$mengetahui_1		= $drole['mengetahui_1'];
	$q1=mysqli_query($koneksi,"select * from karyawan where id_jabatan = '$id_mengetahui_1'");
	$dsql1=mysqli_fetch_array($q1);
	$nm_mengetahui_1	= $dsql1['nama'];
			  
	$id_mengetahui_2	= $drole['id_mengetahui_2'];
	$mengetahui_2		= $drole['mengetahui_2'];
	$q2=mysqli_query($koneksi,"select * from karyawan where id_jabatan = '$id_mengetahui_2'");
	$dsql2=mysqli_fetch_array($q2);
	$nm_mengetahui_2	= $dsql2['nama'];
	
	$id_menyetujui		= $drole['id_menyetujui'];
	$menyetujui			= $drole['menyetujui'];
	$q3=mysqli_query($koneksi,"select * from karyawan where id_jabatan = '$id_menyetujui'");
	$dsql3=mysqli_fetch_array($q3);
	$nm_menyetujui		= $dsql3['nama'];
	
    $qjabatan=mysqli_query($koneksi,"select * from jabatan where id_jabatan = '$id_penilai'");
    $row=mysqli_fetch_array($qjabatan);
    $jabat              = $row['jabatan'];
    
	$qdivisi=mysqli_query($koneksi,"select * from karyawan where nama = '$karyawan'");
	$row1=mysqli_fetch_array($qdivisi);
	$nik				= $row1['nik'];
	$jabatan			= $row1['jabatan'];			   
    $divisi             = $row1['divisi'];
	$divisi2			= $row1['divisi2'];
	
	$qnilai				= mysqli_query($koneksi,"select * from penilaian where id='$id'");
	$dnilai				= mysqli_fetch_array($qnilai);
	$nilai1				= $dnilai['nilai1_1'];
	$nilai2				= $dnilai['nilai1_2'];
	$nilai3				= $dnilai['nilai1_3'];
	$nilai4				= $dnilai['nilai1_4'];
	$nilai5				= $dnilai['nilai1_5'];
	$nilai6				= $dnilai['nilai1_6'];
	$nilai7				= $dnilai['nilai1_7'];
	$nilai8				= $dnilai['nilai1_8'];
	$nilai9 			= $dnilai['nilai1_9'];
	$nilai10			= $dnilai['nilai1_10'];
	$nilai11			= $dnilai['nilai1_11'];
	$nilai12			= $dnilai['nilai1_12'];
	$nilai13			= $dnilai['nilai1_13'];
	$nilai14			= $dnilai['nilai1_14'];
	$nilai15			= $dnilai['nilai1_15'];
	$nilai16			= $dnilai['nilai1_16'];
	$nilai17			= $dnilai['nilai1_17'];
	$nilai18			= $dnilai['nilai1_18'];
	$nilai19			= $dnilai['nilai1_19'];
	
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
	
	$akhir1				= ($nilai1+$hasil1)/2;
	$akhir2				= ($nilai2+$hasil2)/2;
	$akhir3				= ($nilai3+$hasil3)/2;
	$akhir4				= ($nilai4+$hasil4)/2;
	$akhir5				= ($nilai5+$hasil5)/2;
	$akhir6				= ($nilai6+$hasil6)/2;
	$akhir7				= ($nilai7+$hasil7)/2;
	$akhir8				= ($nilai8+$hasil8)/2;
	$akhir9				= ($nilai9+$hasil9)/2;
	$akhir10			= ($nilai10+$hasil10)/2;
	$akhir11			= ($nilai11+$hasil11)/2;
	$akhir12			= ($nilai12+$hasil12)/2;
	$akhir13			= ($nilai13+$hasil13)/2;
	$akhir14			= ($nilai14+$hasil14)/2;
	$akhir15			= ($nilai15+$hasil15)/2;
	$akhir16			= ($nilai16+$hasil16)/2;
	$akhir17			= ($nilai17+$hasil17)/2;
	$akhir18			= ($nilai18+$hasil18)/2;
	$akhir19			= ($nilai19+$hasil19)/2;
	$total_akhir		= $akhir1+$akhir2+$akhir3+$akhir4+$akhir5+$akhir6+$akhir7+$akhir8+$akhir9+$akhir10+$akhir11+$akhir12+$akhir13+$akhir14+$akhir15+$akhir16+$akhir17+$akhir18+$akhir19;
	$rata_akhir			= round($total_akhir/19,2);
	
	$total_hasil		= $hasil1+$hasil2+$hasil3+$hasil4+$hasil5+$hasil6+$hasil7+$hasil8+$hasil9+$hasil10+$hasil11+$hasil12+$hasil13+$hasil14+$hasil15+$hasil16+$hasil17+$hasil18+$hasil19;
    $rata_hasil			= round($total_hasil/19,2);
	$catatan1			= $_POST['catatan1'];
	$catatan2			= $_POST['catatan2'];
	$catatan3			= $_POST['catatan3'];
	$catatan4			= $_POST['catatan4'];
	
	//$insert = mysqli_query($koneksi, "insert into penilaian(tgl,periode,nik,karyawan,jabatan,golongan,divisi,divisi2,penilai,nilai1,nilai2,nilai3,nilai4,nilai5,nilai6,nilai7,nilai8,nilai9,nilai10,nilai11,nilai12,nilai13,nilai14,nilai15,nilai16,nilai17,total_nilai,rata_nilai,catatan1,catatan2,catatan3,mengetahui_1,mengetahui_2,menyetujui,status) values('$tgl','$periode','$nik','$karyawan','$jabatan','$golongan','$divisi','$divisi2','$penilai','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$nilai6','$nilai7','$nilai8','$nilai9','$nilai10','$nilai11','$nilai12','$nilai13','$nilai14','$nilai15','$nilai16','$nilai17','$total_nilai','$rata_nilai','$catatan1','$catatan2','$catatan3','$nm_mengetahui_1','$nm_mengetahui_2','$nm_menyetujui','CREATE')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
	$update = mysqli_query($koneksi, "update penilaian set nilai1_1='$hasil1',nilai1_2='$hasil2',nilai1_3='$hasil3',nilai1_4='$hasil4',nilai1_4='$hasil5',nilai1_6='$hasil6',nilai1_7='$hasil7',nilai1_8='$hasil8',nilai1_9='$hasil9',nilai1_10='$hasil10',nilai1_11='$hasil11',nilai1_12='$hasil12',nilai1_13='$hasil13',nilai1_14='$hasil14',nilai1_15='$hasil15',nilai1_16='$hasil16',nilai1_17='$hasil17',nilai1_18='$hasil18',nilai1_19='$hasil19',total_nilai1='$total_hasil',rata_nilai1='$rata_hasil',catatan1='$catatan1',catatan2='$catatan2',catatan3='$catatan3',catatan4='$catatan4' where id = '$id'");
	$update = mysqli_query($koneksi, "update penilaian set akhir1='$akhir1',akhir2='$akhir2',akhir3='$akhir3',akhir4='$akhir4',akhir5='$akhir5',akhir6='$akhir6',akhir7='$akhir7',akhir8='$akhir8',akhir9='$akhir9',akhir10='$akhir10',akhir11='$akhir11',akhir12='$akhir12',akhir13='$akhir13',akhir14='$akhir14',akhir15='$akhir15',akhir16='$akhir16',akhir17='$akhir17',akhir18='$akhir18',akhir19='$akhir19',total_akhir='$total_akhir',rata_akhir='$rata_akhir',status='REVISI' where id = '$id'");

	if($update)
	{  
	 	?>
	   	<script>
		    var last_id = "<?php echo $id; ?>";
	        var email = "<?php echo $email; ?>";
	        var nm_penilai = "<?php echo $penilai; ?>";
	        var nama = "<?php echo $karyawan; ?>";
	 	    var id_penilai = "<?php echo $id_penilai; ?>";
			var id_mengetahui_1 = "<?php echo $id_mengetahui_1; ?>";
			var mengetahui_1 = "<?php echo $mengetahui_1; ?>";
			var id_mengetahui_2 = "<?php echo $id_mengetahui_2; ?>";
			var mengetahui_2 = "<?php echo $mengetahui_2; ?>";
			var id_menyetujui = "<?php echo $id_menyetujui; ?>";
			var menyetujui = "<?php echo $menyetujui; ?>";
			alert("last_id : "+last_id+"/ email : "+email+"/ nm_penilai : "+nm_penilai+"/ nama : "+nama+"/ id_penilai : "+id_penilai);
	        alert("Penilaian Berhasil dikirim ke system");
			/*window.location.href = 'form.php?email='+email+'&nama='+nm_penilai;*/
			window.location.href = 'print_form.php?lid='+last_id+'&idp='+id_penilai+'&penilai='+nm_penilai+'&nama='+nama+'&email='+email+'&id2='+id_mengetahui_1+'&id3='+id_mengetahui_2+'&id4='+id_menyetujui;
		</script>
		<?php				  
	}
	

		