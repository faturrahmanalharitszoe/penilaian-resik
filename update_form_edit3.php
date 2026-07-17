<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d");
	$month = date('m');
$year = date('Y');
if($month == 1) {
    $periode = 'Jul - Des '.($year - 1);
} else if($month <= 7) {
    $periode = 'Jan - Jun '.$year;
} else {
    $periode = 'Jul - Des '.$year;
}

	$id					= $_GET['id'];
	$qcek = mysqli_query($koneksi,"select status from penilaian where id = '$id'");
    $dcek = mysqli_fetch_array($qcek);
    $status = $dcek['status'];
    if ($status == 'PENYETUJU' || $status == 'PENILAI 2')
    {
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
	$nilai1_18			= $dnilai['nilai1_18'];
	$nilai1_19			= $dnilai['nilai1_19'];
	$total_nilai1		= $dnilai['total_nilai1'];
	$rata_nilai1		= $dnilai['rata_nilai1'];
	
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
	$nilai2_18			= $dnilai['nilai2_18'];
	$nilai2_19			= $dnilai['nilai2_19'];
	$total_nilai2		= $dnilai['total_nilai2'];
	$rata_nilai2		= $dnilai['rata_nilai2'];
	
	$nilai3_1			= $dnilai['nilai3_1'];
	$nilai4_1			= isset($_POST['nilai4_1']) ? $_POST['nilai4_1'] : 0;
	$nilai3_2			= $dnilai['nilai3_2'];
	$nilai4_2			= isset($_POST['nilai4_2']) ? $_POST['nilai4_2'] : 0;
	$nilai3_3			= $dnilai['nilai3_3'];
	$nilai4_3			= isset($_POST['nilai4_3']) ? $_POST['nilai4_3'] : 0;
	$nilai3_4			= $dnilai['nilai3_4'];
	$nilai4_4			= isset($_POST['nilai4_4']) ? $_POST['nilai4_4'] : 0;
	$nilai3_5			= $dnilai['nilai3_5'];
	$nilai4_5			= isset($_POST['nilai4_5']) ? $_POST['nilai4_5'] : 0;
	$nilai3_6			= $dnilai['nilai3_6'];
	$nilai4_6			= isset($_POST['nilai4_6']) ? $_POST['nilai4_6'] : 0;
	$nilai3_7			= $dnilai['nilai3_7'];
	$nilai4_7			= isset($_POST['nilai4_7']) ? $_POST['nilai4_7'] : 0;
	$nilai3_8			= $dnilai['nilai3_8'];
	$nilai4_8			= isset($_POST['nilai4_8']) ? $_POST['nilai4_8'] : 0;
	$nilai3_9 			= $dnilai['nilai3_9'];
	$nilai4_9			= isset($_POST['nilai4_9']) ? $_POST['nilai4_9'] : 0;
	$nilai3_10			= $dnilai['nilai3_10'];
	$nilai4_10			= isset($_POST['nilai4_10']) ? $_POST['nilai4_10'] : 0;
	$nilai3_11			= $dnilai['nilai3_11'];
	$nilai4_11			= isset($_POST['nilai4_11']) ? $_POST['nilai4_11'] : 0;
	$nilai3_12			= $dnilai['nilai3_12'];
	$nilai4_12			= isset($_POST['nilai4_12']) ? $_POST['nilai4_12'] : 0;
	$nilai3_13			= $dnilai['nilai3_13'];
	$nilai4_13			= isset($_POST['nilai4_13']) ? $_POST['nilai4_13'] : 0;
	$nilai3_14			= $dnilai['nilai3_14'];
	$nilai4_14			= isset($_POST['nilai4_14']) ? $_POST['nilai4_14'] : 0;
	$nilai3_15			= $dnilai['nilai3_15'];
	$nilai4_15			= isset($_POST['nilai4_15']) ? $_POST['nilai4_15'] : 0;
	$nilai3_16			= $dnilai['nilai3_16'];
	$nilai4_16			= isset($_POST['nilai4_16']) ? $_POST['nilai4_16'] : 0;
	$nilai3_17			= $dnilai['nilai3_17'];
	$nilai4_17			= isset($_POST['nilai4_17']) ? $_POST['nilai4_17'] : 0;
	$nilai3_18			= $dnilai['nilai3_18'];
	$nilai4_18			= isset($_POST['nilai4_18']) ? $_POST['nilai4_18'] : 0;
	$nilai3_19			= $dnilai['nilai3_19'];
	$nilai4_19			= isset($_POST['nilai4_19']) ? $_POST['nilai4_19'] : 0;
	$total_nilai3		= $nilai3_1+$nilai3_2+$nilai3_3+$nilai3_4+$nilai3_5+$nilai3_6+$nilai3_7+$nilai3_8+$nilai3_9+$nilai3_10+$nilai3_11+$nilai3_12+$nilai3_13+$nilai3_14+$nilai3_15+$nilai3_16+$nilai3_17+$nilai3_18+$nilai3_19;
	$total_nilai4		= $nilai4_1+$nilai4_2+$nilai4_3+$nilai4_4+$nilai4_5+$nilai4_6+$nilai4_7+$nilai4_8+$nilai4_9+$nilai4_10+$nilai4_11+$nilai4_12+$nilai4_13+$nilai4_14+$nilai4_15+$nilai4_16+$nilai4_17+$nilai4_18+$nilai4_19;
	$rata_nilai3		= round($total_nilai3/19,1);
	$rata_nilai4		= round($total_nilai4/19,1);
	$qgrade_nilai4 = mysqli_query($koneksi,"select * from grade where '$rata_nilai4' >= min and '$rata_nilai4' <= max");
	$dgrade_nilai4 = mysqli_fetch_array($qgrade_nilai4);
	$grade_nilai4 = $dgrade_nilai4['grade'];
	$qgrade_nilai3 = mysqli_query($koneksi,"select * from grade where '$rata_nilai3' >= min and '$rata_nilai3' <= max");
    $dgrade_nilai3 = mysqli_fetch_array($qgrade_nilai3);
    $grade_nilai3 = $dgrade_nilai3['grade'];
	
	
    $pembagi_1 = 0;
    if(intval($nilai1_1) > 0) $pembagi_1++;
    if(intval($nilai2_1) > 0) $pembagi_1++;
    if(intval($nilai3_1) > 0) $pembagi_1++;
    if(intval($nilai4_1) > 0) $pembagi_1++;
    if($pembagi_1 == 0) $pembagi_1 = 1; // prevent division by zero
    $akhir1 = round(($nilai1_1 + $nilai2_1 + $nilai3_1 + $nilai4_1) / $pembagi_1, 2);

    $pembagi_2 = 0;
    if(intval($nilai1_2) > 0) $pembagi_2++;
    if(intval($nilai2_2) > 0) $pembagi_2++;
    if(intval($nilai3_2) > 0) $pembagi_2++;
    if(intval($nilai4_2) > 0) $pembagi_2++;
    if($pembagi_2 == 0) $pembagi_2 = 1; // prevent division by zero
    $akhir2 = round(($nilai1_2 + $nilai2_2 + $nilai3_2 + $nilai4_2) / $pembagi_2, 2);

    $pembagi_3 = 0;
    if(intval($nilai1_3) > 0) $pembagi_3++;
    if(intval($nilai2_3) > 0) $pembagi_3++;
    if(intval($nilai3_3) > 0) $pembagi_3++;
    if(intval($nilai4_3) > 0) $pembagi_3++;
    if($pembagi_3 == 0) $pembagi_3 = 1; // prevent division by zero
    $akhir3 = round(($nilai1_3 + $nilai2_3 + $nilai3_3 + $nilai4_3) / $pembagi_3, 2);

    $pembagi_4 = 0;
    if(intval($nilai1_4) > 0) $pembagi_4++;
    if(intval($nilai2_4) > 0) $pembagi_4++;
    if(intval($nilai3_4) > 0) $pembagi_4++;
    if(intval($nilai4_4) > 0) $pembagi_4++;
    if($pembagi_4 == 0) $pembagi_4 = 1; // prevent division by zero
    $akhir4 = round(($nilai1_4 + $nilai2_4 + $nilai3_4 + $nilai4_4) / $pembagi_4, 2);

    $pembagi_5 = 0;
    if(intval($nilai1_5) > 0) $pembagi_5++;
    if(intval($nilai2_5) > 0) $pembagi_5++;
    if(intval($nilai3_5) > 0) $pembagi_5++;
    if(intval($nilai4_5) > 0) $pembagi_5++;
    if($pembagi_5 == 0) $pembagi_5 = 1; // prevent division by zero
    $akhir5 = round(($nilai1_5 + $nilai2_5 + $nilai3_5 + $nilai4_5) / $pembagi_5, 2);

    $pembagi_6 = 0;
    if(intval($nilai1_6) > 0) $pembagi_6++;
    if(intval($nilai2_6) > 0) $pembagi_6++;
    if(intval($nilai3_6) > 0) $pembagi_6++;
    if(intval($nilai4_6) > 0) $pembagi_6++;
    if($pembagi_6 == 0) $pembagi_6 = 1; // prevent division by zero
    $akhir6 = round(($nilai1_6 + $nilai2_6 + $nilai3_6 + $nilai4_6) / $pembagi_6, 2);

    $pembagi_7 = 0;
    if(intval($nilai1_7) > 0) $pembagi_7++;
    if(intval($nilai2_7) > 0) $pembagi_7++;
    if(intval($nilai3_7) > 0) $pembagi_7++;
    if(intval($nilai4_7) > 0) $pembagi_7++;
    if($pembagi_7 == 0) $pembagi_7 = 1; // prevent division by zero
    $akhir7 = round(($nilai1_7 + $nilai2_7 + $nilai3_7 + $nilai4_7) / $pembagi_7, 2);

    $pembagi_8 = 0;
    if(intval($nilai1_8) > 0) $pembagi_8++;
    if(intval($nilai2_8) > 0) $pembagi_8++;
    if(intval($nilai3_8) > 0) $pembagi_8++;
    if(intval($nilai4_8) > 0) $pembagi_8++;
    if($pembagi_8 == 0) $pembagi_8 = 1; // prevent division by zero
    $akhir8 = round(($nilai1_8 + $nilai2_8 + $nilai3_8 + $nilai4_8) / $pembagi_8, 2);

    $pembagi_9 = 0;
    if(intval($nilai1_9) > 0) $pembagi_9++;
    if(intval($nilai2_9) > 0) $pembagi_9++;
    if(intval($nilai3_9) > 0) $pembagi_9++;
    if(intval($nilai4_9) > 0) $pembagi_9++;
    if($pembagi_9 == 0) $pembagi_9 = 1; // prevent division by zero
    $akhir9 = round(($nilai1_9 + $nilai2_9 + $nilai3_9 + $nilai4_9) / $pembagi_9, 2);

    $pembagi_10 = 0;
    if(intval($nilai1_10) > 0) $pembagi_10++;
    if(intval($nilai2_10) > 0) $pembagi_10++;
    if(intval($nilai3_10) > 0) $pembagi_10++;
    if(intval($nilai4_10) > 0) $pembagi_10++;
    if($pembagi_10 == 0) $pembagi_10 = 1; // prevent division by zero
    $akhir10 = round(($nilai1_10 + $nilai2_10 + $nilai3_10 + $nilai4_10) / $pembagi_10, 2);

    $pembagi_11 = 0;
    if(intval($nilai1_11) > 0) $pembagi_11++;
    if(intval($nilai2_11) > 0) $pembagi_11++;
    if(intval($nilai3_11) > 0) $pembagi_11++;
    if(intval($nilai4_11) > 0) $pembagi_11++;
    if($pembagi_11 == 0) $pembagi_11 = 1; // prevent division by zero
    $akhir11 = round(($nilai1_11 + $nilai2_11 + $nilai3_11 + $nilai4_11) / $pembagi_11, 2);

    $pembagi_12 = 0;
    if(intval($nilai1_12) > 0) $pembagi_12++;
    if(intval($nilai2_12) > 0) $pembagi_12++;
    if(intval($nilai3_12) > 0) $pembagi_12++;
    if(intval($nilai4_12) > 0) $pembagi_12++;
    if($pembagi_12 == 0) $pembagi_12 = 1; // prevent division by zero
    $akhir12 = round(($nilai1_12 + $nilai2_12 + $nilai3_12 + $nilai4_12) / $pembagi_12, 2);

    $pembagi_13 = 0;
    if(intval($nilai1_13) > 0) $pembagi_13++;
    if(intval($nilai2_13) > 0) $pembagi_13++;
    if(intval($nilai3_13) > 0) $pembagi_13++;
    if(intval($nilai4_13) > 0) $pembagi_13++;
    if($pembagi_13 == 0) $pembagi_13 = 1; // prevent division by zero
    $akhir13 = round(($nilai1_13 + $nilai2_13 + $nilai3_13 + $nilai4_13) / $pembagi_13, 2);

    $pembagi_14 = 0;
    if(intval($nilai1_14) > 0) $pembagi_14++;
    if(intval($nilai2_14) > 0) $pembagi_14++;
    if(intval($nilai3_14) > 0) $pembagi_14++;
    if(intval($nilai4_14) > 0) $pembagi_14++;
    if($pembagi_14 == 0) $pembagi_14 = 1; // prevent division by zero
    $akhir14 = round(($nilai1_14 + $nilai2_14 + $nilai3_14 + $nilai4_14) / $pembagi_14, 2);

    $pembagi_15 = 0;
    if(intval($nilai1_15) > 0) $pembagi_15++;
    if(intval($nilai2_15) > 0) $pembagi_15++;
    if(intval($nilai3_15) > 0) $pembagi_15++;
    if(intval($nilai4_15) > 0) $pembagi_15++;
    if($pembagi_15 == 0) $pembagi_15 = 1; // prevent division by zero
    $akhir15 = round(($nilai1_15 + $nilai2_15 + $nilai3_15 + $nilai4_15) / $pembagi_15, 2);

    $pembagi_16 = 0;
    if(intval($nilai1_16) > 0) $pembagi_16++;
    if(intval($nilai2_16) > 0) $pembagi_16++;
    if(intval($nilai3_16) > 0) $pembagi_16++;
    if(intval($nilai4_16) > 0) $pembagi_16++;
    if($pembagi_16 == 0) $pembagi_16 = 1; // prevent division by zero
    $akhir16 = round(($nilai1_16 + $nilai2_16 + $nilai3_16 + $nilai4_16) / $pembagi_16, 2);

    $pembagi_17 = 0;
    if(intval($nilai1_17) > 0) $pembagi_17++;
    if(intval($nilai2_17) > 0) $pembagi_17++;
    if(intval($nilai3_17) > 0) $pembagi_17++;
    if(intval($nilai4_17) > 0) $pembagi_17++;
    if($pembagi_17 == 0) $pembagi_17 = 1; // prevent division by zero
    $akhir17 = round(($nilai1_17 + $nilai2_17 + $nilai3_17 + $nilai4_17) / $pembagi_17, 2);

    $pembagi_18 = 0;
    if(intval($nilai1_18) > 0) $pembagi_18++;
    if(intval($nilai2_18) > 0) $pembagi_18++;
    if(intval($nilai3_18) > 0) $pembagi_18++;
    if(intval($nilai4_18) > 0) $pembagi_18++;
    if($pembagi_18 == 0) $pembagi_18 = 1; // prevent division by zero
    $akhir18 = round(($nilai1_18 + $nilai2_18 + $nilai3_18 + $nilai4_18) / $pembagi_18, 2);

    $pembagi_19 = 0;
    if(intval($nilai1_19) > 0) $pembagi_19++;
    if(intval($nilai2_19) > 0) $pembagi_19++;
    if(intval($nilai3_19) > 0) $pembagi_19++;
    if(intval($nilai4_19) > 0) $pembagi_19++;
    if($pembagi_19 == 0) $pembagi_19 = 1; // prevent division by zero
    $akhir19 = round(($nilai1_19 + $nilai2_19 + $nilai3_19 + $nilai4_19) / $pembagi_19, 2);

	$total_akhir		= $akhir1+$akhir2+$akhir3+$akhir4+$akhir5+$akhir6+$akhir7+$akhir8+$akhir9+$akhir10+$akhir11+$akhir12+$akhir13+$akhir14+$akhir15+$akhir16+$akhir17+$akhir18+$akhir19;
	$rata_akhir			= round($total_akhir/19,1);
	$qgrade_akhir = mysqli_query($koneksi,"select * from grade where '$rata_akhir' >= min and '$rata_akhir' <= max");
    $dgrade_akhir = mysqli_fetch_array($qgrade_akhir);
    $grade_akhir = $dgrade_akhir['grade'];
	
	$catatan5 = isset($_POST['catatan5']) ? $_POST['catatan5'] : '';
    
    $post_catatan11 = isset($_POST['catatan111']) ? trim($_POST['catatan111']) : '';
    $catatan11 = $dnilai['catatan11'];
    if($post_catatan11 != '') {
        $catatan11 = ($catatan11 != '') ? $catatan11 . " | " . $post_catatan11 : $post_catatan11;
    }
    
    $post_catatan21 = isset($_POST['catatan211']) ? trim($_POST['catatan211']) : '';
    $catatan21 = $dnilai['catatan21'];
    if($post_catatan21 != '') {
        $catatan21 = ($catatan21 != '') ? $catatan21 . " | " . $post_catatan21 : $post_catatan21;
    }
    
    $post_catatan31 = isset($_POST['catatan311']) ? trim($_POST['catatan311']) : '';
    $catatan31 = $dnilai['catatan31'];
    if($post_catatan31 != '') {
        $catatan31 = ($catatan31 != '') ? $catatan31 . " | " . $post_catatan31 : $post_catatan31;
    }
    
    $post_catatan41 = isset($_POST['catatan411']) ? trim($_POST['catatan411']) : '';
    $catatan41 = $dnilai['catatan41'];
    if($post_catatan41 != '') {
        $catatan41 = ($catatan41 != '') ? $catatan41 . " | " . $post_catatan41 : $post_catatan41;
    }
    
	
	//$insert = mysqli_query($koneksi, "insert into penilaian(tgl,periode,nik,karyawan,jabatan,golongan,divisi,divisi2,penilai,nilai1,nilai2,nilai3,nilai4,nilai5,nilai6,nilai7,nilai8,nilai9,nilai10,nilai11,nilai12,nilai13,nilai14,nilai15,nilai16,nilai17,total_nilai,rata_nilai,catatan1,catatan2,catatan3,mengetahui_1,mengetahui_2,menyetujui,status) values('$tgl','$periode','$nik','$karyawan','$jabatan','$golongan','$divisi','$divisi2','$penilai','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$nilai6','$nilai7','$nilai8','$nilai9','$nilai10','$nilai11','$nilai12','$nilai13','$nilai14','$nilai15','$nilai16','$nilai17','$total_nilai','$rata_nilai','$catatan1','$catatan2','$catatan3','$nm_mengetahui_1','$nm_mengetahui_2','$nm_menyetujui','CREATE')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
	$update = mysqli_query($koneksi, "update penilaian set nilai4_1='$nilai4_1',nilai4_2='$nilai4_2',nilai4_3='$nilai4_3',nilai4_4='$nilai4_4',nilai4_5='$nilai4_5',nilai4_6='$nilai4_6',nilai4_7='$nilai4_7',nilai4_8='$nilai4_8',nilai4_9='$nilai4_9',nilai4_10='$nilai4_10',nilai4_11='$nilai4_11',nilai4_12='$nilai4_12',nilai4_13='$nilai4_13',nilai4_14='$nilai4_14',nilai4_15='$nilai4_15',nilai4_16='$nilai4_16',nilai4_17='$nilai4_17',nilai4_18='$nilai4_18',nilai4_19='$nilai4_19',total_nilai4='$total_nilai4',rata_nilai4='$rata_nilai4',grade_nilai4='$grade_nilai4',
	          akhir1='$akhir1',akhir2='$akhir2',akhir3='$akhir3',akhir4='$akhir4',akhir5='$akhir5',akhir6='$akhir6',akhir7='$akhir7',akhir8='$akhir8',akhir9='$akhir9',akhir10='$akhir10',akhir11='$akhir11',akhir12='$akhir12',akhir13='$akhir13',akhir14='$akhir14',akhir15='$akhir15',akhir16='$akhir16',akhir17='$akhir17',akhir18='$akhir18',akhir19='$akhir19',total_akhir='$total_akhir',rata_akhir='$rata_akhir',grade_akhir='$grade_akhir',catatan11='$catatan11', catatan21='$catatan21', catatan31='$catatan31', catatan41='$catatan41', catatan_approval='$catatan5',status='APPROVED',tgl_approval='$tgl' where id = '$id'");

	if($update)
	{  
	 	?>
	   	<script>
		    var id = "<?php echo $id; ?>";
	        alert("Revisi Penilaian Berhasil dikirim ke system");
			window.location.href = 'print_form3.php?id='+id;
		</script>
		<?php				  
	}
	else
	{
	    ?>
	    <script>
	        var id = "<?php echo $id; ?>";
	        alert("Status Penilaian sudah di Approved");
	        window.location.href = 'print_form3.php?id='+id;
	    </script>
	    <?php
	}
    } // Penutup kurung untuk if ($status == 'PENYETUJU' || $status == 'PENILAI 2')
	?>