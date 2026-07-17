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
	$nilai1_1			= $dnilai['nilai1_1'];
	$nilai1_2			= $dnilai['nilai1_2'];
	$nilai1_3			= $dnilai['nilai1_3'];
	$nilai1_4			= $dnilai['nilai1_4'];
	$nilai1_5			= $dnilai['nilai1_5'];
	$nilai1_6			= $dnilai['nilai1_6'];
	$nilai1_7			= $dnilai['nilai1_7'];
	$nilai1_8			= $dnilai['nilai1_8'];
	$nilai1_9 			= $dnilai['nilai1_9'];
	$nilai1_10			= $dnilai['nilai1_10'];
	$nilai1_11			= $dnilai['nilai1_11'];
	$nilai1_12			= $dnilai['nilai1_12'];
	$nilai1_13			= $dnilai['nilai1_13'];
	$nilai1_14			= $dnilai['nilai1_14'];
	$nilai1_15			= $dnilai['nilai1_15'];
	$nilai1_16			= $dnilai['nilai1_16'];
	$nilai1_17			= $dnilai['nilai1_17'];
	
	$nilai2_1			= $dnilai['nilai2_1'];
	$nilai2_2			= $dnilai['nilai2_2'];
	$nilai2_3			= $dnilai['nilai2_3'];
	$nilai2_4			= $dnilai['nilai2_4'];
	$nilai2_5			= $dnilai['nilai2_5'];
	$nilai2_6			= $dnilai['nilai2_6'];
	$nilai2_7			= $dnilai['nilai2_7'];
	$nilai2_8			= $dnilai['nilai2_8'];
	$nilai2_9 			= $dnilai['nilai2_9'];
	$nilai2_10			= $dnilai['nilai2_10'];
	$nilai2_11			= $dnilai['nilai2_11'];
	$nilai2_12			= $dnilai['nilai2_12'];
	$nilai2_13			= $dnilai['nilai2_13'];
	$nilai2_14			= $dnilai['nilai2_14'];
	$nilai2_15			= $dnilai['nilai2_15'];
	$nilai2_16			= $dnilai['nilai2_16'];
	$nilai2_17			= $dnilai['nilai2_17'];
	
    $nilai3_1 			= $_POST['hasil1'];
    $nilai3_2 			= $_POST['hasil2'];
    $nilai3_3 			= $_POST['hasil3'];
    $nilai3_4 			= $_POST['hasil4'];
    $nilai3_5 			= $_POST['hasil5'];
    $nilai3_6 			= $_POST['hasil6'];
    $nilai3_7 			= $_POST['hasil7'];
    $nilai3_8 			= $_POST['hasil8'];
    $nilai3_9 			= $_POST['hasil9'];
    $nilai3_10	 	    = $_POST['hasil10'];
    $nilai3_11	 		= $_POST['hasil11'];
    $nilai3_12	 		= $_POST['hasil12'];
    $nilai3_13	 		= $_POST['hasil13'];
    $nilai3_14	 		= $_POST['hasil14'];
    $nilai3_15	 		= $_POST['hasil15'];
    $nilai3_16	 		= $_POST['hasil16'];
    $nilai3_17	 		= $_POST['hasil17'];
	
	if($nilai3_1 == 'N/A')
	{
	   $nilai3_1 = 0;
	   $pembagi = 2;
	}
	if($nilai3_2 == 'N/A')
	{
	   $nilai3_2 = 0;
	   $pembagi = 2;
	}
	if($nilai3_3 == 'N/A')
	{
	   $nilai3_3 = 0;
	   $pembagi = 2;
	}
	if($nilai3_4 == 'N/A')
	{
	   $nilai3_4 = 0;
	   $pembagi = 2;
	}
	if($nilai3_5 == 'N/A')
	{
	   $nilai3_5 = 0;
	   $pembagi = 2;
	}
	if($nilai3_6 == 'N/A')
	{
	   $nilai3_6 = 0;
	   $pembagi = 2;
	}
	if($nilai3_7 == 'N/A')
	{
	   $nilai3_7 = 0;
	   $pembagi = 2;
	}
	if($nilai3_8 == 'N/A')
	{
	   $nilai3_8 = 0;
	   $pembagi = 2;
	}
	if($nilai3_9 == 'N/A')
	{
	   $nilai3_9 = 0;
	   $pembagi = 2;
	}
	if($nilai3_10 == 'N/A')
	{
	   $nilai3_10 = 0;
	   $pembagi = 2;
	}
	if($nilai3_11 == 'N/A')
	{
	   $nilai3_11 = 0;
	   $pembagi = 2;
	}
	if($nilai3_12 == 'N/A')
	{
	   $nilai3_12 = 0;
	   $pembagi = 2;
	}
	if($nilai3_13 == 'N/A')
	{
	   $nilai3_13 = 0;
	   $pembagi = 2;
	}
	if($nilai3_14 == 'N/A')
	{
	   $nilai3_14 = 0;
	   $pembagi = 2;
	}
	if($nilai3_15 == 'N/A')
	{
	   $nilai3_15 = 0;
	   $pembagi = 2;
	}
	if($nilai3_16 == 'N/A')
	{
	   $nilai3_16 = 0;
	   $pembagi = 2;
	}
	if($nilai3_17 == 'N/A')
	{
	   $nilai3_17 = 0;
	   $pembagi = 2;
	}
	$akhir1				= ($nilai1_1+$nilai2_1)/2;
	$akhir2				= ($nilai1_2+$nilai2_2)/2;
	$akhir3				= ($nilai1_3+$nilai2_3)/2;
	$akhir4				= ($nilai1_4+$nilai2_4)/2;
	$akhir5				= ($nilai1_5+$nilai2_5)/2;
	$akhir6				= ($nilai1_6+$nilai2_6)/2;
	$akhir7				= ($nilai1_7+$nilai2_7)/2;
	$akhir8				= ($nilai1_8+$nilai2_8)/2;
	$akhir9				= ($nilai1_9+$nilai2_9)/2;
	$akhir10			= ($nilai1_10+$nilai2_10)/2;
	$akhir11			= ($nilai1_11+$nilai2_11)/2;
	$akhir12			= ($nilai1_12+$nilai2_12)/2;
	$akhir13			= ($nilai1_13+$nilai2_13)/2;
	$akhir14			= ($nilai1_14+$nilai2_14)/2;
	$akhir15			= ($nilai1_15+$nilai2_15)/2;
	$akhir16			= ($nilai1_16+$nilai2_16)/2;
	$akhir17			= ($nilai1_17+$nilai2_17)/2;
	$total_akhir		= $akhir1+$akhir2+$akhir3+$akhir4+$akhir5+$akhir6+$akhir7+$akhir8+$akhir9+$akhir10+$akhir11+$akhir12+$akhir13+$akhir14+$akhir15+$akhir16+$akhir17;
	$rata_akhir			= round($total_akhir/17,2);
	
	$total_nilai2		= $nilai2_1+$nilai2_2+$nilai2_3+$nilai2_4+$nilai2_5+$nilai2_6+$nilai2_7+$nilai2_8+$nilai2_9+$nilai2_10+$nilai2_11+$nilai2_12+$nilai2_13+$nilai2_14+$nilai2_15+$nilai2_16+$nilai2_17;
    $rata_nilai2		= round($total_nilai2/17,2);
	$catatan1			= $_POST['catatan1'];
	$catatan2			= $_POST['catatan2'];
	$catatan3			= $_POST['catatan3'];
	
	//$insert = mysqli_query($koneksi, "insert into penilaian(tgl,periode,nik,karyawan,jabatan,golongan,divisi,divisi2,penilai,nilai1,nilai2,nilai3,nilai4,nilai5,nilai6,nilai7,nilai8,nilai9,nilai10,nilai11,nilai12,nilai13,nilai14,nilai15,nilai16,nilai17,total_nilai,rata_nilai,catatan1,catatan2,catatan3,mengetahui_1,mengetahui_2,menyetujui,status) values('$tgl','$periode','$nik','$karyawan','$jabatan','$golongan','$divisi','$divisi2','$penilai','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$nilai6','$nilai7','$nilai8','$nilai9','$nilai10','$nilai11','$nilai12','$nilai13','$nilai14','$nilai15','$nilai16','$nilai17','$total_nilai','$rata_nilai','$catatan1','$catatan2','$catatan3','$nm_mengetahui_1','$nm_mengetahui_2','$nm_menyetujui','CREATE')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
	$update = mysqli_query($koneksi, "update penilaian set nilai2_1='$nilai2_1',nilai2_2='$nilai2_2',nilai2_3='$nilai2_3',nilai2_4='$nilai2_4',nilai2_5='$nilai2_5',nilai2_6='$nilai2_6',nilai2_7='$nilai2_7',nilai2_8='$nilai2_8',nilai2_9='$nilai2_9',nilai2_10='$nilai2_10',nilai2_11='$nilai2_11',nilai2_12='$nilai2_12',nilai2_13='$nilai2_13',nilai2_14='$nilai2_14',nilai2_15='$nilai2_15',nilai2_16='$nilai2_16',nilai2_17='$nilai2_17',total_nilai2='$total_nilai2',rata_nilai2='$rata_nilai2',catatan1='$catatan1',catatan2='$catatan2',catatan3='$catatan3' where id = '$id'");
	$update = mysqli_query($koneksi, "update penilaian set akhir1='$akhir1',akhir2='$akhir2',akhir3='$akhir3',akhir4='$akhir4',akhir5='$akhir5',akhir6='$akhir6',akhir7='$akhir7',akhir8='$akhir8',akhir9='$akhir9',akhir10='$akhir10',akhir11='$akhir11',akhir12='$akhir12',akhir13='$akhir13',akhir14='$akhir14',akhir15='$akhir15',akhir16='$akhir16',akhir17='$akhir17',total_akhir='$total_akhir',rata_akhir='$rata_akhir',status='REVISI' where id = '$id'");

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
	

		