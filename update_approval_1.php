<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d");
    $id      = $_GET['id'];
    //
    $qcek = mysqli_query($koneksi,"select status from penilaian where id = '$id'");
    $dcek = mysqli_fetch_array($qcek);
    $status = $dcek['status'];
    if ($status == 'PENILAI 1')
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
	
	    $nilai2_1 = $nilai1_1;
	    $nilai2_2 = $nilai1_2;
	    $nilai2_3 = $nilai1_3;
	    $nilai2_4 = $nilai1_4;
	    $nilai2_5 = $nilai1_5;
	    $nilai2_6 = $nilai1_6;
	    $nilai2_7 = $nilai1_7;
	    $nilai2_8 = $nilai1_8;
	    $nilai2_9 = $nilai1_9;
	    $nilai2_10 = $nilai1_10;
	    $nilai2_11 = $nilai1_11;
	    $nilai2_12 = $nilai1_12;
	    $nilai2_13 = $nilai1_13;
	    $nilai2_14 = $nilai1_14;
	    $nilai2_15 = $nilai1_15;
	    $nilai2_16 = $nilai1_16;
	    $nilai2_17 = $nilai1_17;
		$nilai2_18 = $nilai1_18;
	    $nilai2_19 = $nilai1_19;
	    $total_nilai2 = $total_nilai1;
	    $rata_nilai2 = $rata_nilai1;
	    $grade_nilai2 = $grade_nilai1;
	
	    $akhir1 = ($nilai1_1 + $nilai2_1)/2;
	    $akhir2 = ($nilai1_2 + $nilai2_2)/2;
	    $akhir3 = ($nilai1_3 + $nilai2_3)/2;
	    $akhir4 = ($nilai1_4 + $nilai2_4)/2;
	    $akhir5 = ($nilai1_5 + $nilai2_5)/2;
	    $akhir6 = ($nilai1_6 + $nilai2_6)/2;
	    $akhir7 = ($nilai1_7 + $nilai2_7)/2;
	    $akhir8 = ($nilai1_8 + $nilai2_8)/2;
	    $akhir9 = ($nilai1_9 + $nilai2_9)/2;
	    $akhir10 = ($nilai1_10 + $nilai2_10)/2;
	    $akhir11 = ($nilai1_11 + $nilai2_11)/2;
	    $akhir12 = ($nilai1_12 + $nilai2_12)/2;
	    $akhir13 = ($nilai1_13 + $nilai2_13)/2;
	    $akhir14 = ($nilai1_14 + $nilai2_14)/2;
	    $akhir15 = ($nilai1_15 + $nilai2_15)/2;
	    $akhir16 = ($nilai1_16 + $nilai2_16)/2;
	    $akhir17 = ($nilai1_17 + $nilai2_17)/2;
		$akhir18 = ($nilai1_18 + $nilai2_18)/2;
	    $akhir19 = ($nilai1_19 + $nilai2_19)/2;
    	$total_akhir = $akhir1+$akhir2+$akhir3+$akhir4+$akhir5+$akhir6+$akhir7+$akhir8+$akhir9+$akhir10+$akhir11+$akhir12+$akhir13+$akhir14+$akhir15+$akhir16+$akhir17+$akhir18+$akhir19;
	    $rata_akhir = round($total_akhir/19,1);
	    $qgrade_akhir = mysqli_query($koneksi,"select * from grade where '$rata_akhir' >= min and '$rata_akhir' <= max");
        $dgrade_akhir = mysqli_fetch_array($qgrade_akhir);
        $grade_akhir = $dgrade_akhir['grade'];
	
	    $qupdate = mysqli_query($koneksi,"update penilaian set nilai2_1='$nilai2_1',nilai2_2='$nilai2_2',nilai2_3='$nilai2_3',nilai2_4='$nilai2_4',nilai2_5='$nilai2_5',nilai2_6='$nilai2_6',nilai2_7='$nilai2_7',nilai2_8='$nilai2_8',nilai2_9='$nilai2_9',nilai2_10='$nilai2_10',nilai2_11='$nilai2_11',nilai2_12='$nilai2_12',nilai2_13='$nilai2_13',nilai2_14='$nilai2_14',nilai2_15='$nilai2_15',nilai2_16='$nilai2_16',nilai2_17='$nilai2_17',nilai2_18='$nilai2_18',nilai2_19='$nilai2_19',total_nilai2='$total_nilai2',rata_nilai2='$rata_nilai2',
	        grade_nilai2='$grade_nilai2',akhir1='$akhir1',akhir2='$akhir2',akhir3='$akhir3',akhir4='$akhir4',akhir5='$akhir5',akhir6='$akhir6',akhir7='$akhir7',akhir8='$akhir8',akhir9='$akhir9',akhir10='$akhir10',akhir11='$akhir11',akhir12='$akhir12',akhir13='$akhir13',akhir14='$akhir14',akhir15='$akhir15',akhir16='$akhir16',akhir17='$akhir17',akhir18='$akhir18',akhir19='$akhir19',total_akhir='$total_akhir',rata_akhir='$rata_akhir',grade_akhir='$grade_akhir',tgl_mengetahui_1='$tgl',status='PENILAI 2' where id = '$id'");
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
		        window.location.href = 'print_form1.php?id='+id;
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