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
	$id			   		= $_GET['id'];
	$qcek = mysqli_query($koneksi,"select status from penilaian where id = '$id'");
    $dcek = mysqli_fetch_array($qcek);
    $status = $dcek['status'];
    if ($status == 'PENILAI 1')
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
	
	    $nilai2_1			= isset(isset($_POST['nilai2_1']) ? $_POST['nilai2_1'] : 0) ? isset($_POST['nilai2_1']) ? $_POST['nilai2_1'] : 0 : 0;
	    $nilai2_2			= isset(isset($_POST['nilai2_2']) ? $_POST['nilai2_2'] : 0) ? isset($_POST['nilai2_2']) ? $_POST['nilai2_2'] : 0 : 0;
	    $nilai2_3			= isset(isset($_POST['nilai2_3']) ? $_POST['nilai2_3'] : 0) ? isset($_POST['nilai2_3']) ? $_POST['nilai2_3'] : 0 : 0;
	    $nilai2_4			= isset(isset($_POST['nilai2_4']) ? $_POST['nilai2_4'] : 0) ? isset($_POST['nilai2_4']) ? $_POST['nilai2_4'] : 0 : 0;
	    $nilai2_5			= isset(isset($_POST['nilai2_5']) ? $_POST['nilai2_5'] : 0) ? isset($_POST['nilai2_5']) ? $_POST['nilai2_5'] : 0 : 0;
	    $nilai2_6			= isset(isset($_POST['nilai2_6']) ? $_POST['nilai2_6'] : 0) ? isset($_POST['nilai2_6']) ? $_POST['nilai2_6'] : 0 : 0;
	    $nilai2_7			= isset(isset($_POST['nilai2_7']) ? $_POST['nilai2_7'] : 0) ? isset($_POST['nilai2_7']) ? $_POST['nilai2_7'] : 0 : 0;
	    $nilai2_8			= isset(isset($_POST['nilai2_8']) ? $_POST['nilai2_8'] : 0) ? isset($_POST['nilai2_8']) ? $_POST['nilai2_8'] : 0 : 0;
	    $nilai2_9 			= isset(isset($_POST['nilai2_9']) ? $_POST['nilai2_9'] : 0) ? isset($_POST['nilai2_9']) ? $_POST['nilai2_9'] : 0 : 0;
	    $nilai2_10			= isset(isset($_POST['nilai2_10']) ? $_POST['nilai2_10'] : 0) ? isset($_POST['nilai2_10']) ? $_POST['nilai2_10'] : 0 : 0;
	    $nilai2_11			= isset(isset($_POST['nilai2_11']) ? $_POST['nilai2_11'] : 0) ? isset($_POST['nilai2_11']) ? $_POST['nilai2_11'] : 0 : 0;
	    $nilai2_12			= isset(isset($_POST['nilai2_12']) ? $_POST['nilai2_12'] : 0) ? isset($_POST['nilai2_12']) ? $_POST['nilai2_12'] : 0 : 0;
	    $nilai2_13			= isset(isset($_POST['nilai2_13']) ? $_POST['nilai2_13'] : 0) ? isset($_POST['nilai2_13']) ? $_POST['nilai2_13'] : 0 : 0;
	    $nilai2_14			= isset(isset($_POST['nilai2_14']) ? $_POST['nilai2_14'] : 0) ? isset($_POST['nilai2_14']) ? $_POST['nilai2_14'] : 0 : 0;
	    $nilai2_15			= isset(isset($_POST['nilai2_15']) ? $_POST['nilai2_15'] : 0) ? isset($_POST['nilai2_15']) ? $_POST['nilai2_15'] : 0 : 0;
	    $nilai2_16			= isset(isset($_POST['nilai2_16']) ? $_POST['nilai2_16'] : 0) ? isset($_POST['nilai2_16']) ? $_POST['nilai2_16'] : 0 : 0;
	    $nilai2_17			= isset(isset($_POST['nilai2_17']) ? $_POST['nilai2_17'] : 0) ? isset($_POST['nilai2_17']) ? $_POST['nilai2_17'] : 0 : 0;
		$nilai2_18			= isset(isset($_POST['nilai2_18']) ? $_POST['nilai2_18'] : 0) ? isset($_POST['nilai2_18']) ? $_POST['nilai2_18'] : 0 : 0;
	    $nilai2_19			= isset(isset($_POST['nilai2_19']) ? $_POST['nilai2_19'] : 0) ? isset($_POST['nilai2_19']) ? $_POST['nilai2_19'] : 0 : 0;
	    $total_nilai2		= $nilai2_1+$nilai2_2+$nilai2_3+$nilai2_4+$nilai2_5+$nilai2_6+$nilai2_7+$nilai2_8+$nilai2_9+$nilai2_10+$nilai2_11+$nilai2_12+$nilai2_13+$nilai2_14+$nilai2_15+$nilai2_16+$nilai2_17+$nilai2_18+$nilai2_19;
	    $rata_nilai2		= round($total_nilai2/19,1);
	    $qgrade_nilai2 = mysqli_query($koneksi,"select * from grade where '$rata_nilai2' >= min and '$rata_nilai2' <= max");
        $dgrade_nilai2 = mysqli_fetch_array($qgrade_nilai2);
        $grade_nilai2 = $dgrade_nilai2['grade'];
	
	    $akhir1				= round(($nilai1_1+$nilai2_1)/2,2);
	    $akhir2				= round(($nilai1_2+$nilai2_2)/2,2);
	    $akhir3				= round(($nilai1_3+$nilai2_3)/2,2);
	    $akhir4				= round(($nilai1_4+$nilai2_4)/2,2);
	    $akhir5				= round(($nilai1_5+$nilai2_5)/2,2);
	    $akhir6				= round(($nilai1_6+$nilai2_6)/2,2);
	    $akhir7				= round(($nilai1_7+$nilai2_7)/2,2);
	    $akhir8				= round(($nilai1_8+$nilai2_8)/2,2);
	    $akhir9				= round(($nilai1_9+$nilai2_9)/2,2);
	    $akhir10			= round(($nilai1_10+$nilai2_10)/2,2);
	    $akhir11			= round(($nilai1_11+$nilai2_11)/2,2);
	    $akhir12			= round(($nilai1_12+$nilai2_12)/2,2);
	    $akhir13			= round(($nilai1_13+$nilai2_13)/2,2);
	    $akhir14			= round(($nilai1_14+$nilai2_14)/2,2);
	    $akhir15			= round(($nilai1_15+$nilai2_15)/2,2);
	    $akhir16			= round(($nilai1_16+$nilai2_16)/2,2);
	    $akhir17			= round(($nilai1_17+$nilai2_17)/2,2);
		$akhir18			= round(($nilai1_18+$nilai2_18)/2,2);
	    $akhir19			= round(($nilai1_19+$nilai2_19)/2,2);
	    $total_akhir		= $akhir1+$akhir2+$akhir3+$akhir4+$akhir5+$akhir6+$akhir7+$akhir8+$akhir9+$akhir10+$akhir11+$akhir12+$akhir13+$akhir14+$akhir15+$akhir16+$akhir17+$akhir18+$akhir19;
	    $rata_akhir			= round($total_akhir/19,1);
	    $qgrade_akhir = mysqli_query($koneksi,"select * from grade where '$rata_akhir' >= min and '$rata_akhir' <= max");
        $dgrade_akhir = mysqli_fetch_array($qgrade_akhir);
        $grade_akhir = $dgrade_akhir['grade'];
	
	    $catatan1			= isset(isset($_POST['catatan1']) ? $_POST['catatan1'] : '') ? isset($_POST['catatan1']) ? $_POST['catatan1'] : '' : '';
	    $catatan2			= isset(isset($_POST['catatan2']) ? $_POST['catatan2'] : '') ? isset($_POST['catatan2']) ? $_POST['catatan2'] : '' : '';
	    $catatan3			= isset(isset($_POST['catatan3']) ? $_POST['catatan3'] : '') ? isset($_POST['catatan3']) ? $_POST['catatan3'] : '' : '';
		$catatan4			= isset(isset($_POST['catatan4']) ? $_POST['catatan4'] : '') ? isset($_POST['catatan4']) ? $_POST['catatan4'] : '' : '';
        $catatan11          = isset(isset($_POST['catatan11']) ? $_POST['catatan11'] : '') ? isset($_POST['catatan11']) ? $_POST['catatan11'] : '' : '';
        $catatan21          = isset(isset($_POST['catatan21']) ? $_POST['catatan21'] : '') ? isset($_POST['catatan21']) ? $_POST['catatan21'] : '' : '';
        $catatan31          = isset(isset($_POST['catatan31']) ? $_POST['catatan31'] : '') ? isset($_POST['catatan31']) ? $_POST['catatan31'] : '' : '';
		$catatan41          = isset(isset($_POST['catatan41']) ? $_POST['catatan41'] : '') ? isset($_POST['catatan41']) ? $_POST['catatan41'] : '' : '';
	
	    $update = mysqli_query($koneksi, "update penilaian set nilai2_1='$nilai2_1',nilai2_2='$nilai2_2',nilai2_3='$nilai2_3',nilai2_4='$nilai2_4',nilai2_5='$nilai2_5',nilai2_6='$nilai2_6',nilai2_7='$nilai2_7',nilai2_8='$nilai2_8',nilai2_9='$nilai2_9',nilai2_10='$nilai2_10',nilai2_11='$nilai2_11',nilai2_12='$nilai2_12',nilai2_13='$nilai2_13',nilai2_14='$nilai2_14',nilai2_15='$nilai2_15',nilai2_16='$nilai2_16',nilai2_17='$nilai2_17',nilai2_18='$nilai2_18',nilai2_19='$nilai2_19',total_nilai2='$total_nilai2',rata_nilai2='$rata_nilai2',grade_nilai2='$grade_nilai2',catatan1='$catatan1',catatan2='$catatan2',catatan3='$catatan3',
				catatan4='$catatan4',akhir1='$akhir1',akhir2='$akhir2',akhir3='$akhir3',akhir4='$akhir4',akhir5='$akhir5',akhir6='$akhir6',akhir7='$akhir7',akhir8='$akhir8',akhir9='$akhir9',akhir10='$akhir10',akhir11='$akhir11',akhir12='$akhir12',akhir13='$akhir13',akhir14='$akhir14',akhir15='$akhir15',akhir16='$akhir16',akhir17='$akhir17',akhir18='$akhir18',akhir19='$akhir19',total_akhir='$total_akhir',rata_akhir='$rata_akhir',grade_akhir='$grade_akhir',catatan11='$catatan11',catatan21='$catatan21',catatan31='$catatan31',catatan41='$catatan41',tgl_mengetahui_1='$tgl',status='PENILAI 2' where id = '$id'");

	    if($update)
	    {
	 	    ?>
	   	    <script>
		        var id = "<?php echo $id; ?>";
	            /*alert("Revisi Penilaian Berhasil dikirim ke system");*/
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
            window.location.href = 'print_form1.php?id='+id;
        </script>
        <?php
    }
?>
	

		