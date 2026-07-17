<script type="text/javascript" src="js/sweetalert2.min.js"></script>
<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    require_once "approval_logic.php";
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
    $email              = $_POST['email'];    // email penilai dari form.php
    $penilai		    = $_POST['penilai'];  // nama penilai dari form.php
	$jabatan		    = $_POST['jabatan'];  // jabatan karyawan dari form.php
	$karyawan	    	= $_POST['nama']; // nama karyawan dari form.php
	$qgol				= mysqli_query($koneksi,"select * from karyawan where nama = '$karyawan'");
	$dgol				= mysqli_fetch_array($qgol);
	$golongan			= $dgol['golongan'];
	$divisi_karyawan    = $dgol['divisi'];
	$qjabatan_penilai	= mysqli_query($koneksi,"select * from karyawan where nama = '$penilai'");
	$dpenilai			= mysqli_fetch_array($qjabatan_penilai);
	$id_penilai			= $dpenilai['id_jabatan'];   // id jabatan penilai
    $jabat				= $dpenilai['jabatan'];      // jabatan penilai
	$divisi				= $dpenilai['divisi'];       // divisi penilai
    if($dpenilai['divisi2'] == 'NONE')
    {
        $divisi2        = $divisi;
    }
    else
    {
        $divisi2        = $dpenilai['divisi2'];
    }
    if ($dpenilai['divisi3'] == 'NONE')
    {
        if ($dpenilai['divisi2'] == 'NONE')
        {
            $divisi3    = $divisi;
        }
        else
        {
            $divisi3        = $divisi2;
        }
    }
    else
    {
        $divisi3        = $dpenilai['divisi3'];
    }

    // Use centralized logic to determine approval chain
    $target_id_role_approval = isset($dgol['id_role_approval']) ? $dgol['id_role_approval'] : 0;
    
    // get_approval_chain requires the evaluator's ID, the evaluator's division, the target's id_role_approval, and the target's division
    $chain = get_approval_chain($koneksi, $id_penilai, $divisi, $target_id_role_approval, $divisi_karyawan);
    $nm_mengetahui_1 = $chain['m1'];
    $nm_mengetahui_2 = $chain['m2'];
    $nm_menyetujui = $chain['setuju'];

    $qjabatan=mysqli_query($koneksi,"select * from jabatan where id_jabatan = '$id_penilai'");
    $row=mysqli_fetch_array($qjabatan);
    $jabat              = $row['jabatan'];
    
	$qdivisi=mysqli_query($koneksi,"select * from karyawan where nama = '$karyawan'");
	$row1=mysqli_fetch_array($qdivisi);
	$nik				= $row1['nik'];
	$jabatan			= $row1['jabatan'];			   
    $divisi             = $row1['divisi'];
	$divisi2			= $row1['divisi2'];
    $divisi3            = $row1['divisi3'];
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
    $nilai18	 		= $_POST['nilai18'];
    $nilai19	 		= $_POST['nilai19'];
	$total_nilai		= $nilai1+$nilai2+$nilai3+$nilai4+$nilai5+$nilai6+$nilai7+$nilai8+$nilai9+$nilai10+$nilai11+$nilai12+$nilai13+$nilai14+$nilai15+$nilai16+$nilai17+$nilai18+$nilai19;
    $rata_nilai			= round($total_nilai/19,1);
    $qgrade = mysqli_query($koneksi,"select grade from grade where '$rata_nilai' between min and max");
                                                
    $dgrade = mysqli_fetch_array($qgrade);
    $grade_nilai = $dgrade['grade'];
    
	$catatan1			= $_POST['catatan1'];
	$catatan2			= $_POST['catatan2'];
	$catatan3			= $_POST['catatan3'];
    $catatan4			= isset($_POST['catatan4']) ? $_POST['catatan4'] : '';
	
	$akhir1=$nilai1;
    $akhir2=$nilai2;
    $akhir3=$nilai3;
    $akhir4=$nilai4;
    $akhir5=$nilai5;
    $akhir6=$nilai6;
    $akhir7=$nilai7;
    $akhir8=$nilai8;
    $akhir9=$nilai9;
    $akhir10=$nilai10;
    $akhir11=$nilai11;
    $akhir12=$nilai12;
    $akhir13=$nilai13;
    $akhir14=$nilai14;
    $akhir15=$nilai15;
    $akhir16=$nilai16;
    $akhir17=$nilai17;
    $akhir18=$nilai18;
    $akhir19=$nilai19;
	$total_akhir = $total_nilai;
	$rata_akhir = $rata_nilai;
	$qgrade_akhir = mysqli_query($koneksi,"select grade from grade where '$rata_akhir' between min and max");
    $dgrade_akhir = mysqli_fetch_array($qgrade_akhir);
    $grade_akhir = $dgrade_akhir['grade'];
	//
    //if ($id_mengetahui_2 == '3' )
    //{
    //    $q2=mysqli_query($koneksi,"select * from karyawan where id_jabatan = '$id_mengetahui_2' and ((divisi in ('$divisi','$divisi2','$divisi3')) or (divisi2 in ('$divisi','$divisi2','$divisi3')) or (divisi3 in ('$divisi','$divisi2','$divisi3')))");
    //    $dsql2=mysqli_fetch_array($q2);
	//    $nm_mengetahui_2	= $dsql2['nama'];
    //}

    // Tentukan status awal berdasarkan ada tidaknya penilai lanjutan
    $status_awal = 'PENILAI 1';
    if ($nm_mengetahui_1 == '-' || $nm_mengetahui_1 == '') {
        $status_awal = 'PENILAI 2';
        if ($nm_mengetahui_2 == '-' || $nm_mengetahui_2 == '') {
            $status_awal = 'PENYETUJU';
        }
    }

	$insert = mysqli_query($koneksi, "insert into penilaian(tgl,periode,nik,karyawan,jabatan,golongan,divisi,divisi2,penilai,nilai1_1,nilai1_2,nilai1_3,nilai1_4,nilai1_5,nilai1_6,nilai1_7,nilai1_8,nilai1_9,nilai1_10,nilai1_11,nilai1_12,nilai1_13,nilai1_14,nilai1_15,nilai1_16,nilai1_17,nilai1_18,nilai1_19,total_nilai1,rata_nilai1,grade_nilai1,catatan1,catatan2,catatan3,catatan4,akhir1,akhir2,akhir3,akhir4,akhir5,akhir6,akhir7,akhir8,akhir9,akhir10,akhir11,akhir12,akhir13,akhir14,akhir15,akhir16,akhir17,akhir18,akhir19,total_akhir,rata_akhir,grade_akhir,mengetahui_1,mengetahui_2,menyetujui,status)
	          values('$tgl','$periode','$nik','$karyawan','$jabatan','$golongan','$divisi','$divisi2','$penilai','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$nilai6','$nilai7','$nilai8','$nilai9','$nilai10','$nilai11','$nilai12','$nilai13','$nilai14','$nilai15','$nilai16','$nilai17','$nilai18','$nilai19','$total_nilai','$rata_nilai','$grade_nilai','$catatan1','$catatan2','$catatan3','$catatan4','$akhir1','$akhir2','$akhir3','$akhir4','$akhir5','$akhir6','$akhir7','$akhir8','$akhir9','$akhir10','$akhir11','$akhir12','$akhir13','$akhir14','$akhir15','$akhir16','$akhir17','$akhir18','$akhir19','$total_akhir','$rata_akhir','$grade_akhir','$nm_mengetahui_1','$nm_mengetahui_2','$nm_menyetujui','$status_awal')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
	if($insert)
	{
	  	$qid = mysqli_query($koneksi, "select * from penilaian where periode = '$periode' and karyawan = '$karyawan'");
		$did = mysqli_fetch_array($qid);
		$lastid = $did['id'];
		echo "<script> window.onload = function() {
        myfunction();
        }; </script>";
	 	?>
	 	<script>
	 	function myfunction()
        {
            /*alert("Simpan Bahan Masuk Sukses");*/
            /*swal.fire("Penilaian Berhasil dikirim ke system");*/
            var last_id = "<?php echo $lastid; ?>";
            window.location.href = 'print_form.php?lid='+last_id;
        }
        </script>
	   	
		<!--    var last_id = "<?php echo $lastid; ?>";
		    swal.fire("Penilaian Berhasil dikirim ke system");
	        /*alert("Penilaian Berhasil dikirim ke system");*/
			/*window.location.href = 'form.php?email='+email+'&nama='+nm_penilai;*/
			window.location.href = 'print_form.php?lid='+last_id;-->
		
		<?php				  
	}
	?>
