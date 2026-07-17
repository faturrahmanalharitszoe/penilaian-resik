<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d");
    $id      = $_GET['id'];
    //
    $qcek = mysqli_query($koneksi,"select status from penilaian where id = '$id'");
    $dcek = mysqli_fetch_array($qcek);
    $status = $dcek['status'];
    if ($status == 'PENILAI 1' || $status == 'PENILAI 2')
    {
	    //
	    $qnilai = mysqli_query($koneksi,"select * from penilaian where id = '$id'");
	    $dnilai = mysqli_fetch_array($qnilai);
	    $mengetahui = $dnilai['mengetahui_2'];
	    $menyetujui = $dnilai['menyetujui'];
	    //
        //$mengetahui = $_GET['mengetahui'];
	    //$menyetujui = $_GET['menyetujui'];
	    $qmengetahui = mysqli_query($koneksi,"select * from karyawan where nama = '$mengetahui'");
	    $dmengetahui = mysqli_fetch_array($qmengetahui);
	    $email = $dmengetahui['email'];
	    //
	    //$qnilai = mysqli_query($koneksi,"select * from penilaian where id = '$id'");
	    //$dnilai = mysqli_fetch_array($qnilai);
	    $nilai1_1 = $dnilai['nilai1_1'];
	    $nilai1_2 = $dnilai['nilai1_2'];
	    $nilai1_3 = $dnilai['nilai1_3'];
	    $nilai1_4 = $dnilai['nilai1_4'];
	    $nilai1_5 = $dnilai['nilai1_5'];
	    $nilai1_6 = $dnilai['nilai1_6'];
        $nilai1_7 = $dnilai['nilai1_7'];
        $nilai1_8 = $dnilai['nilai1_8'];
	    $nilai1_9 = $dnilai['nilai1_9'];
	    $nilai1_10 = $dnilai['nilai1_10'];
	    $nilai1_11 = $dnilai['nilai1_11'];
	    $nilai1_12 = $dnilai['nilai1_12'];
	    $nilai1_13 = $dnilai['nilai1_13'];
	    $nilai1_14 = $dnilai['nilai1_14'];
	    $nilai1_15 = $dnilai['nilai1_15'];
	    $nilai1_16 = $dnilai['nilai1_16'];
	    $nilai1_17 = $dnilai['nilai1_17'];
		$nilai1_18 = $dnilai['nilai1_18'];
	    $nilai1_19 = $dnilai['nilai1_19'];
    	$total_nilai1 = $dnilai['total_nilai1'];
	    $rata_nilai1 = $dnilai['rata_nilai1'];
	    $grade_nilai1 = $dnilai['grade_nilai1'];
	
	    $mengetahui_1 = $dnilai['mengetahui_1'];
	    if ($mengetahui_1 == '-' || $mengetahui_1 == '') {
	        $nilai3_1 = $nilai1_1;
	        $nilai3_2 = $nilai1_2;
	        $nilai3_3 = $nilai1_3;
	        $nilai3_4 = $nilai1_4;
	        $nilai3_5 = $nilai1_5;
	        $nilai3_6 = $nilai1_6;
	        $nilai3_7 = $nilai1_7;
	        $nilai3_8 = $nilai1_8;
	        $nilai3_9 = $nilai1_9;
	        $nilai3_10 = $nilai1_10;
	        $nilai3_11 = $nilai1_11;
	        $nilai3_12 = $nilai1_12;
	        $nilai3_13 = $nilai1_13;
	        $nilai3_14 = $nilai1_14;
	        $nilai3_15 = $nilai1_15;
	        $nilai3_16 = $nilai1_16;
	        $nilai3_17 = $nilai1_17;
		    $nilai3_18 = $nilai1_18;
	        $nilai3_19 = $nilai1_19;
	        $total_nilai3 = $total_nilai1;
	        $rata_nilai3 = $rata_nilai1;
	        $grade_nilai3 = $grade_nilai1;
	    } else {
	        $nilai3_1 = $dnilai['nilai2_1'];
	        $nilai3_2 = $dnilai['nilai2_2'];
	        $nilai3_3 = $dnilai['nilai2_3'];
	        $nilai3_4 = $dnilai['nilai2_4'];
	        $nilai3_5 = $dnilai['nilai2_5'];
	        $nilai3_6 = $dnilai['nilai2_6'];
	        $nilai3_7 = $dnilai['nilai2_7'];
	        $nilai3_8 = $dnilai['nilai2_8'];
	        $nilai3_9 = $dnilai['nilai2_9'];
	        $nilai3_10 = $dnilai['nilai2_10'];
	        $nilai3_11 = $dnilai['nilai2_11'];
	        $nilai3_12 = $dnilai['nilai2_12'];
	        $nilai3_13 = $dnilai['nilai2_13'];
	        $nilai3_14 = $dnilai['nilai2_14'];
	        $nilai3_15 = $dnilai['nilai2_15'];
	        $nilai3_16 = $dnilai['nilai2_16'];
	        $nilai3_17 = $dnilai['nilai2_17'];
		    $nilai3_18 = $dnilai['nilai2_18'];
	        $nilai3_19 = $dnilai['nilai2_19'];
	        $total_nilai3 = $dnilai['total_nilai2'];
	        $rata_nilai3 = $dnilai['rata_nilai2'];
	        $grade_nilai3 = $dnilai['grade_nilai2'];
	    }
	
	    if ($mengetahui_1 == '-' || $mengetahui_1 == '') {
	        $pembagi = 2;
	        $n2_1 = 0; $n2_2 = 0; $n2_3 = 0; $n2_4 = 0; $n2_5 = 0; $n2_6 = 0; $n2_7 = 0; $n2_8 = 0; $n2_9 = 0;
	        $n2_10 = 0; $n2_11 = 0; $n2_12 = 0; $n2_13 = 0; $n2_14 = 0; $n2_15 = 0; $n2_16 = 0; $n2_17 = 0; $n2_18 = 0; $n2_19 = 0;
	    } else {
	        $pembagi = 3;
	        $n2_1 = $dnilai['nilai2_1']; $n2_2 = $dnilai['nilai2_2']; $n2_3 = $dnilai['nilai2_3']; $n2_4 = $dnilai['nilai2_4'];
	        $n2_5 = $dnilai['nilai2_5']; $n2_6 = $dnilai['nilai2_6']; $n2_7 = $dnilai['nilai2_7']; $n2_8 = $dnilai['nilai2_8'];
	        $n2_9 = $dnilai['nilai2_9']; $n2_10 = $dnilai['nilai2_10']; $n2_11 = $dnilai['nilai2_11']; $n2_12 = $dnilai['nilai2_12'];
	        $n2_13 = $dnilai['nilai2_13']; $n2_14 = $dnilai['nilai2_14']; $n2_15 = $dnilai['nilai2_15']; $n2_16 = $dnilai['nilai2_16'];
	        $n2_17 = $dnilai['nilai2_17']; $n2_18 = $dnilai['nilai2_18']; $n2_19 = $dnilai['nilai2_19'];
	    }
	    $akhir1 = round(($nilai1_1 + $n2_1 + $nilai3_1) / $pembagi, 1);
	    $akhir2 = round(($nilai1_2 + $n2_2 + $nilai3_2) / $pembagi, 1);
	    $akhir3 = round(($nilai1_3 + $n2_3 + $nilai3_3) / $pembagi, 1);
	    $akhir4 = round(($nilai1_4 + $n2_4 + $nilai3_4) / $pembagi, 1);
	    $akhir5 = round(($nilai1_5 + $n2_5 + $nilai3_5) / $pembagi, 1);
	    $akhir6 = round(($nilai1_6 + $n2_6 + $nilai3_6) / $pembagi, 1);
	    $akhir7 = round(($nilai1_7 + $n2_7 + $nilai3_7) / $pembagi, 1);
	    $akhir8 = round(($nilai1_8 + $n2_8 + $nilai3_8) / $pembagi, 1);
	    $akhir9 = round(($nilai1_9 + $n2_9 + $nilai3_9) / $pembagi, 1);
	    $akhir10 = round(($nilai1_10 + $n2_10 + $nilai3_10) / $pembagi, 1);
	    $akhir11 = round(($nilai1_11 + $n2_11 + $nilai3_11) / $pembagi, 1);
	    $akhir12 = round(($nilai1_12 + $n2_12 + $nilai3_12) / $pembagi, 1);
	    $akhir13 = round(($nilai1_13 + $n2_13 + $nilai3_13) / $pembagi, 1);
	    $akhir14 = round(($nilai1_14 + $n2_14 + $nilai3_14) / $pembagi, 1);
	    $akhir15 = round(($nilai1_15 + $n2_15 + $nilai3_15) / $pembagi, 1);
	    $akhir16 = round(($nilai1_16 + $n2_16 + $nilai3_16) / $pembagi, 1);
	    $akhir17 = round(($nilai1_17 + $n2_17 + $nilai3_17) / $pembagi, 1);
		$akhir18 = round(($nilai1_18 + $n2_18 + $nilai3_18) / $pembagi, 1);
	    $akhir19 = round(($nilai1_19 + $n2_19 + $nilai3_19) / $pembagi, 1);
    	$total_akhir = $akhir1+$akhir2+$akhir3+$akhir4+$akhir5+$akhir6+$akhir7+$akhir8+$akhir9+$akhir10+$akhir11+$akhir12+$akhir13+$akhir14+$akhir15+$akhir16+$akhir17+$akhir18+$akhir19;
	    $rata_akhir = round($total_akhir/19,1);
	    $qgrade_akhir = mysqli_query($koneksi,"select * from grade where '$rata_akhir' >= min and '$rata_akhir' <= max");
        $dgrade_akhir = mysqli_fetch_array($qgrade_akhir);
        $grade_akhir = $dgrade_akhir['grade'];
	
	    $qupdate = mysqli_query($koneksi,"update penilaian set nilai3_1='$nilai3_1',nilai3_2='$nilai3_2',nilai3_3='$nilai3_3',nilai3_4='$nilai3_4',nilai3_5='$nilai3_5',nilai3_6='$nilai3_6',nilai3_7='$nilai3_7',nilai3_8='$nilai3_8',nilai3_9='$nilai3_9',nilai3_10='$nilai3_10',nilai3_11='$nilai3_11',nilai3_12='$nilai3_12',nilai3_13='$nilai3_13',nilai3_14='$nilai3_14',nilai3_15='$nilai3_15',nilai3_16='$nilai3_16',nilai3_17='$nilai3_17',nilai3_18='$nilai3_18',nilai3_19='$nilai3_19',total_nilai3='$total_nilai3',rata_nilai3='$rata_nilai3',
	        grade_nilai3='$grade_nilai3',akhir1='$akhir1',akhir2='$akhir2',akhir3='$akhir3',akhir4='$akhir4',akhir5='$akhir5',akhir6='$akhir6',akhir7='$akhir7',akhir8='$akhir8',akhir9='$akhir9',akhir10='$akhir10',akhir11='$akhir11',akhir12='$akhir12',akhir13='$akhir13',akhir14='$akhir14',akhir15='$akhir15',akhir16='$akhir16',akhir17='$akhir17',akhir18='$akhir18',akhir19='$akhir19',total_akhir='$total_akhir',rata_akhir='$rata_akhir',grade_akhir='$grade_akhir',tgl_mengetahui_2='$tgl',status='PENYETUJU' where id = '$id'");
	    if($qupdate)
	    {
	   
	        //update form dan kirim email ke sdm
	        ?>
	        <script>
	            var id = "<?php echo $id; ?>";
		        var email = "<?php echo $email; ?>";
		        var approval = "<?php echo $menyetujui;?>";
	            /*alert("Update Penilaian Berhasil dikirim ke system");*/
		        /*window.location.href = 'index.php?pilih="2.1"';*/
		        window.location.href = 'print_form2.php?id='+id;
	        </script>
	         <?php	
	    }
    }
    else
    {
        ?>
        <script>
            var id = "<?php echo $id; ?>";
            alert("Status Penilaian sudah di Approved");
            //window.location.href = 'print_form2.php?id='+id;
        </script>
        <?php
    }
?>