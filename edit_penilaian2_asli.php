<?php

    include "koneksi.php"; // memanggil file koneksi.php untuk koneksi ke database
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d");
	$id=$_GET['id'];
	//
	$qcek = mysqli_query($koneksi,"select status from penilaian where id = '$id'");
	$dcek = mysqli_fetch_array($qcek);
	$status = $dcek['status'];
	if ($status == 'PENILAI 1')
	{
	    //
        $qnilai = mysqli_query($koneksi,"select * from penilaian where id = '$id'");
        $dnilai = mysqli_fetch_array($qnilai);
	    $penilai = $dnilai['mengetahui_2'];
        $karyawan = $dnilai['karyawan'];
        $golongan = $dnilai['golongan'];
        $divisi = $dnilai['divisi'];
	    $qemail = mysqli_query($koneksi,"select * from karyawan where nama = '$penilai'");
        $demail = mysqli_fetch_array($qemail);
	    $email = $demail['email'];
	    $i=0;
	    $qaspek=mysqli_query($koneksi,"select * from aspek_penilaian order by id asc");
	    while($row=mysqli_fetch_array($qaspek))
	    {
	        $aspek[$i] = $row['aspek_penilaian'];
	        $id_aspek[$i] = $row['id_aspek'];
	        $i++;
	    }
	    ?>
        <!DOCTYPE html>
        <html lang="en" dir="ltr">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>PT. Resik Cemerlang</title>
            <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-icon-57x57.png">
            <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicon/faviconapple-icon-60x60.png">
            <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-icon-72x72.png">
            <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-icon-76x76.png">
            <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-icon-114x114.png">
            <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-icon-120x120.png">
            <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-icon-144x144.png">
            <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-icon-152x152.png">
            <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-icon-180x180.png">
            <link rel="icon" type="image/png" sizes="192x192"  href="assets/images/favicon/android-icon-192x192.png">
            <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon/favicon-96x96.png">
            <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
            <link rel="manifest" href="/manifest.json">
            <meta name="msapplication-TileColor" content="#ffffff">
            <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
            <meta name="theme-color" content="#ffffff">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
            <link href="assets/css/gijgo.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="assets/css/bootstrap.css">
            <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="assets/css/style.css">
        </head>
        <body>
        <nav class="navbar navbar-expand-lg navbar-dark resiknav">
            <a class="navbar-brand" href="home.html">
                <img src="assets/images/logo.png" alt="" class="img-fluid">
            </a>
      
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="language-box">
                    <a href="career.php" class="language-active"></a>
                </div>
            </div>
        </nav>
        <br>
        <style>
            input[type="radio"] {
            margin-left:10px;
            }
		    table {
  		    font-family: arial, sans-serif;
		    font-size:12px;
  		    border-collapse: collapse;
  		    width: 100%;
		    }

		    td, th {
  		    border: 1px solid #dddddd;
  		    text-align: left;
  		    padding: 3px;
		    }

        </style>

        <div class="col-md-8 offset-md-2">
        <form action="update_form_edit2.php?id=<?php echo $id;?>" method="post" id="form" role="form" enctype="multipart/form-data">
            <div class="text-white form-header">
                <h3 class="text-center header"><b> Revisi Form Penilaian Karyawan </b></h3>
            </div>
            <div class="form-content">
                <h4 class="text-center header"><b>Selamat Datang Bpk/Ibu <?php echo $penilai; ?></b></h4>  
	            <hr style="height:3px;border-width:0;color:#2878AA;background-color:#2878AA">
				<h6 style="font-size:12px;"><b>PANDUAN KLASIFIKASI PENILAIAN :</b></h6>
				<table>
				   <tr>
    			   	   <th style="background-color:#2878aa;color:white"><center>Score</center></th>
    			   	   <th style="background-color:#2878aa;color:white"><center>Keterangan</center></th>
                       <th style="background-color:#2878aa;color:white"><center>Score</center></th>
    			   	   <th style="background-color:#2878aa;color:white"><center>Keterangan</center></th>
  				   </tr>
				   <tr>
    				   <td><center>10</center></td>
    				   <td>Terbaik</td>
                       <td><center>5</center></td>
    				   <td>Rata-rata</td>
  				   </tr>
				   <tr>
    				   <td><center>9</center></td>
    				   <td>Sangat Baik</td>
                       <td><center>4</center></td>
    				   <td>Dibawah Rata-rata</td>
  				   </tr>
                   <tr>
        				<td><center>8</center></td>
        				<td>Baik</td>
                        <td><center>3</center></td>
        				<td>Buruk</td>
    				</tr>
                    <tr>
        				<td><center>7</center></td>
        				<td>Sangat Cukup</td>
                        <td><center>2</center></td>
        				<td>Sangat Buruk</td>
    				</tr>
                    <tr>
        				<td><center>6</center></td>
        				<td>Cukup</td>
                        <td><center>1</center></td>
        				<td>Terburuk</td>
    				</tr>
				</table>
				<hr style="height:1px;border-width:0;color:#2878AA;background-color:#2878AA">
	            <h6><b> PERSONAL YANG DINILAI </b></h6>
	            <hr>
	            <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
				<input type="hidden" name="id" class="form-control" id="id" value="<?php echo $a['id']; ?>" />
                <input type="hidden" name="penilai" class="form-control" id="penilai" value="<?php echo $a['penilai']; ?>" />
                <input type="hidden" name="email" class="form-control" id="email" value="<?php echo $email; ?>" />
                <input type="hidden" name="tgl" class="form-control" id="tgl" value="<?php echo $tgl; ?>" />
				<input type="hidden" name="mengetahui" class="form-control" id="mengetahui" value="<?php echo $mengetahui; ?>" />
				<input type="hidden" name="menyetujui" class="form-control" id="menyetujui" value="<?php echo $menyetujui; ?>" />
                </div>
	            <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
	                <label>Jabatan</label> 
					<input type="text" name="jabatan" class="form-control" readonly id="jabatan" value="<?php echo $dnilai['jabatan']; ?>" />
                </div>
		        <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label>Nama</label>
					<input type="text" name="nama" class="form-control" readonly id="nama" value="<?php echo $karyawan; ?> - <?php echo $golongan;?> - <?php echo $divisi;?>" /> 
                </div><br>
                <input type="hidden" name="karyawan" class="form-control" id="karyawan" >
				<h6><b> <?php echo $aspek[0];?> </b></h6>
	            <hr>
				<?php
				$qkriteria=mysqli_query($koneksi,"select * from kriteria_penilaian where id_aspek = '$id_aspek[0]'");
				$i=0;
				while($row=mysqli_fetch_array($qkriteria))
				{
	  			    $kriteria[$i] = $row['kriteria'];
	   				$i++;
				}
				?>
	            <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil1"> <?php echo $kriteria[0];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_1" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_1']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_1" 
                        <?php if ($dnilai['nilai1_1']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_1"
                        <?php if ($dnilai['nilai1_1']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_1"
                        <?php if ($dnilai['nilai1_1']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_1"
                        <?php if ($dnilai['nilai1_1']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_1"
                        <?php if ($dnilai['nilai1_1']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_1"
                        <?php if ($dnilai['nilai1_1']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_1"
                        <?php if ($dnilai['nilai1_1']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_1"
                        <?php if ($dnilai['nilai1_1']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_1"
                        <?php if ($dnilai['nilai1_1']=="10") echo "checked";?> value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil2"> <?php echo $kriteria[1];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_2" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_2']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_2"
                        <?php if ($dnilai['nilai1_2']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_2"
                        <?php if ($dnilai['nilai1_2']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_2"
                        <?php if ($dnilai['nilai1_2']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_2"
                        <?php if ($dnilai['nilai1_2']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_2"
                        <?php if ($dnilai['nilai1_2']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_2"
                        <?php if ($dnilai['nilai1_2']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_2"
                        <?php if ($dnilai['nilai1_2']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_2"
                        <?php if ($dnilai['nilai1_2']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_2"
                        <?php if ($dnilai['nilai1_2']=="10") echo "checked";?> value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil3"> <?php echo $kriteria[2];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_3" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_3']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_3"
                        <?php if ($dnilai['nilai1_3']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_3"
                        <?php if ($dnilai['nilai1_3']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_3"
                        <?php if ($dnilai['nilai1_3']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_3"
                        <?php if ($dnilai['nilai1_3']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_3"
                        <?php if ($dnilai['nilai1_3']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_3"
                        <?php if ($dnilai['nilai1_3']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_3"
                        <?php if ($dnilai['nilai1_3']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_3"
                        <?php if ($dnilai['nilai1_3']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_3"
                        <?php if ($dnilai['nilai1_3']=="10") echo "checked";?> value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil4"> <?php echo $kriteria[3];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_4" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_4']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_4"
                        <?php if ($dnilai['nilai1_4']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_4"
                        <?php if ($dnilai['nilai1_4']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_4"
                        <?php if ($dnilai['nilai1_4']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_4"
                        <?php if ($dnilai['nilai1_4']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_4"
                        <?php if ($dnilai['nilai1_4']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_4"
                        <?php if ($dnilai['nilai1_4']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_4"
                        <?php if ($dnilai['nilai1_4']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_4"
                        <?php if ($dnilai['nilai1_4']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_4"
                        <?php if ($dnilai['nilai1_4']=="10") echo "checked";?> value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan1"> Catatan :  </label>
			        <textarea rows="1" maxlength="80" name="catatan1" id="catatan1" class="form-control" readonly > <?php echo $dnilai['catatan1'];?> </textarea>
                    <textarea rows="1" maxlength="80" name="catatan11" id="catatan11" class="form-control" > </textarea>
                </div><br>
                <h6><b> <?php echo $aspek[1];?> </b></h6>
	            <hr>
				<?php
				$qkriteria=mysqli_query($koneksi,"select * from kriteria_penilaian where id_aspek = '$id_aspek[1]'");
				$i=0;
				while($row=mysqli_fetch_array($qkriteria))
				{
	  			    $kriteria[$i] = $row['kriteria'];
	   				$i++;
				}
				?>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil5"> <?php echo $kriteria[0];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_5" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_5']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_5"
                        <?php if ($dnilai['nilai1_5']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_5"
                        <?php if ($dnilai['nilai1_5']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_5"
                        <?php if ($dnilai['nilai1_5']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_5"
                        <?php if ($dnilai['nilai1_5']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_5"
                        <?php if ($dnilai['nilai1_5']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_5"
                        <?php if ($dnilai['nilai1_5']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_5"
                        <?php if ($dnilai['nilai1_5']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_5"
                        <?php if ($dnilai['nilai1_5']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_5"
                        <?php if ($dnilai['nilai1_5']=="10") echo "checked";?> value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil6"> <?php echo $kriteria[1];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_6" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_6']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_6"
                        <?php if ($dnilai['nilai1_6']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_6"
                        <?php if ($dnilai['nilai1_6']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_6"
                        <?php if ($dnilai['nilai1_6']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_6"
                        <?php if ($dnilai['nilai1_6']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_6"
                        <?php if ($dnilai['nilai1_6']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_6"
                        <?php if ($dnilai['nilai1_6']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_6"
                        <?php if ($dnilai['nilai1_6']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_6"
                        <?php if ($dnilai['nilai1_6']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_6"
                        <?php if ($dnilai['nilai1_6']=="10") echo "checked";?> value="10"> 10
                                                        
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil7"> <?php echo $kriteria[2];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_7" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_7']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_7"
                        <?php if ($dnilai['nilai1_7']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_7"
                        <?php if ($dnilai['nilai1_7']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_7"
                        <?php if ($dnilai['nilai1_7']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_7"
                        <?php if ($dnilai['nilai1_7']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_7"
                        <?php if ($dnilai['nilai1_7']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_7"
                        <?php if ($dnilai['nilai1_7']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_7"
                        <?php if ($dnilai['nilai1_7']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_7"
                        <?php if ($dnilai['nilai1_7']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_7"
                        <?php if ($dnilai['nilai1_7']=="10") echo "checked";?> value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil8"> <?php echo $kriteria[3];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_8" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_8']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_8"
                        <?php if ($dnilai['nilai1_8']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_8"
                        <?php if ($dnilai['nilai1_8']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_8"
                        <?php if ($dnilai['nilai1_8']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_8"
                        <?php if ($dnilai['nilai1_8']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_8"
                        <?php if ($dnilai['nilai1_8']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_8"
                        <?php if ($dnilai['nilai1_8']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_8"
                        <?php if ($dnilai['nilai1_8']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_8"
                        <?php if ($dnilai['nilai1_8']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_8"
                        <?php if ($dnilai['nilai1_8']=="10") echo "checked";?> value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil9"> <?php echo $kriteria[4];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_9" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_9']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_9"
                        <?php if ($dnilai['nilai1_9']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_9"
                        <?php if ($dnilai['nilai1_9']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_9"
                        <?php if ($dnilai['nilai1_9']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_9"
                        <?php if ($dnilai['nilai1_9']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_9"
                        <?php if ($dnilai['nilai1_9']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_9"
                        <?php if ($dnilai['nilai1_9']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_9"
                        <?php if ($dnilai['nilai1_9']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_9"
                        <?php if ($dnilai['nilai1_9']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_9"
                        <?php if ($dnilai['nilai1_9']=="10") echo "checked";?> value="10"> 10
                </div><br>
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil10"> <?php echo $kriteria[5];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_10" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_10']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_10"
                        <?php if ($dnilai['nilai1_10']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_10"
                        <?php if ($dnilai['nilai1_10']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_10"
                        <?php if ($dnilai['nilai1_10']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_10"
                        <?php if ($dnilai['nilai1_10']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_10"
                        <?php if ($dnilai['nilai1_10']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_10"
                        <?php if ($dnilai['nilai1_10']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_10"
                        <?php if ($dnilai['nilai1_10']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_10"
                        <?php if ($dnilai['nilai1_10']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_10"
                        <?php if ($dnilai['nilai1_10']=="10") echo "checked";?> value="10"> 10
                </div><br>
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil11"> <?php echo $kriteria[6];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_11" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_11']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_11"
                        <?php if ($dnilai['nilai1_11']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_11"
                        <?php if ($dnilai['nilai1_11']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_11"
                        <?php if ($dnilai['nilai1_11']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_11"
                        <?php if ($dnilai['nilai1_11']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_11"
                        <?php if ($dnilai['nilai1_11']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_11"
                        <?php if ($dnilai['nilai1_11']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_11"
                        <?php if ($dnilai['nilai1_11']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_11"
                        <?php if ($dnilai['nilai1_11']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_11"
                        <?php if ($dnilai['nilai1_11']=="10") echo "checked";?> value="10"> 10
                </div>
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan2"> Catatan :  </label>
			        <textarea rows="1" maxlength="80" name="catatan2" id="catatan2" class="form-control" readonly > <?php echo $dnilai['catatan2'];?> </textarea>
                    <textarea rows="1" maxlength="80" name="catatan21" id="catatan21" class="form-control" > </textarea>
                </div><br>
                <h6><b> <?php echo $aspek[2];?> </b></h6>
	            <hr>
				<?php
				$qkriteria=mysqli_query($koneksi,"select * from kriteria_penilaian where id_aspek = '$id_aspek[2]'");
				$i=0;
				while($row=mysqli_fetch_array($qkriteria))
				{
	  			    $kriteria[$i] = $row['kriteria'];
	   				$i++;
				}
				?>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil12"> <?php echo $kriteria[0];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_12" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_12']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_12"
                        <?php if ($dnilai['nilai1_12']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_12"
                        <?php if ($dnilai['nilai1_12']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_12"
                        <?php if ($dnilai['nilai1_12']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_12"
                        <?php if ($dnilai['nilai1_12']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_12"
                        <?php if ($dnilai['nilai1_12']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_12"
                        <?php if ($dnilai['nilai1_12']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_12"
                        <?php if ($dnilai['nilai1_12']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_12"
                        <?php if ($dnilai['nilai1_12']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_12"
                        <?php if ($dnilai['nilai1_12']=="10") echo "checked";?> value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil13"> <?php echo $kriteria[1];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_13" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_13']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_13"
                        <?php if ($dnilai['nilai1_13']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_13"
                        <?php if ($dnilai['nilai1_13']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_13"
                        <?php if ($dnilai['nilai1_13']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_13"
                        <?php if ($dnilai['nilai1_13']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_13"
                        <?php if ($dnilai['nilai1_13']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_13"
                        <?php if ($dnilai['nilai1_13']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_13"
                        <?php if ($dnilai['nilai1_13']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_13"
                        <?php if ($dnilai['nilai1_13']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_13"
                        <?php if ($dnilai['nilai1_13']=="10") echo "checked";?> value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil14"> <?php echo $kriteria[2];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_14" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_14']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_14"
                        <?php if ($dnilai['nilai1_14']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_14"
                        <?php if ($dnilai['nilai1_14']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_14"
                        <?php if ($dnilai['nilai1_14']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_14"
                        <?php if ($dnilai['nilai1_14']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_14"
                        <?php if ($dnilai['nilai1_14']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_14"
                        <?php if ($dnilai['nilai1_14']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_14"
                        <?php if ($dnilai['nilai1_14']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_14"
                        <?php if ($dnilai['nilai1_14']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_14"
                        <?php if ($dnilai['nilai1_14']=="10") echo "checked";?> value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil15"> <?php echo $kriteria[3];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_15" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_15']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_15"
                        <?php if ($dnilai['nilai1_15']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_15"
                        <?php if ($dnilai['nilai1_15']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_15"
                        <?php if ($dnilai['nilai1_15']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_15"
                        <?php if ($dnilai['nilai1_15']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_15"
                        <?php if ($dnilai['nilai1_15']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_15"
                        <?php if ($dnilai['nilai1_15']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_15"
                        <?php if ($dnilai['nilai1_15']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_15"
                        <?php if ($dnilai['nilai1_15']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_15"
                        <?php if ($dnilai['nilai1_15']=="10") echo "checked";?> value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil16"> <?php echo $kriteria[4];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_16" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_16']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_16"
                        <?php if ($dnilai['nilai1_16']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_16"
                        <?php if ($dnilai['nilai1_16']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_16"
                        <?php if ($dnilai['nilai1_16']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_16"
                        <?php if ($dnilai['nilai1_16']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_16"
                        <?php if ($dnilai['nilai1_16']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_16"
                        <?php if ($dnilai['nilai1_16']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_16"
                        <?php if ($dnilai['nilai1_16']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_16"
                        <?php if ($dnilai['nilai1_16']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_16"
                        <?php if ($dnilai['nilai1_16']=="10") echo "checked";?> value="10"> 10
                </div><br>
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="hasil17"> <?php echo $kriteria[5];?> <a style="color:red">*</a></label><br>
			        <input type="radio" name="nilai2_17" style="cursor:pointer;"
                        <?php if ($dnilai['nilai1_17']=="1") echo "checked";?> value="1"> 1 
                    <input type="radio" name="nilai2_17"
                        <?php if ($dnilai['nilai1_17']=="2") echo "checked";?> value="2"> 2
                    <input type="radio" name="nilai2_17"
                        <?php if ($dnilai['nilai1_17']=="3") echo "checked";?> value="3"> 3
                    <input type="radio" name="nilai2_17"
                        <?php if ($dnilai['nilai1_17']=="4") echo "checked";?> value="4"> 4
                    <input type="radio" name="nilai2_17"
                        <?php if ($dnilai['nilai1_17']=="5") echo "checked";?> value="5"> 5
                    <input type="radio" name="nilai2_17"
                        <?php if ($dnilai['nilai1_17']=="6") echo "checked";?> value="6"> 6
                    <input type="radio" name="nilai2_17"
                        <?php if ($dnilai['nilai1_17']=="7") echo "checked";?> value="7"> 7
                    <input type="radio" name="nilai2_17"
                        <?php if ($dnilai['nilai1_17']=="8") echo "checked";?> value="8"> 8
                    <input type="radio" name="nilai2_17"
                        <?php if ($dnilai['nilai1_17']=="9") echo "checked";?> value="9"> 9
                    <input type="radio" name="nilai2_17"
                        <?php if ($dnilai['nilai1_17']=="10") echo "checked";?> value="10"> 10
                </div><br>
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan3"> Catatan :  </label>
			        <textarea rows="1" maxlength="80" name="catatan3" id="catatan3" class="form-control" readonly > <?php echo $dnilai['catatan3'];?> </textarea>
                    <textarea rows="1" maxlength="80" name="catatan31" id="catatan31" class="form-control" > </textarea>
                </div><br>
                <div class="row">
                    <div class="col-12 text-center">
                    <br>
                         <!--<button type="submit" name="add" value="Send" class="btn btn-primary btn-resik btn-lg">Kirim</button>-->
		            	<button class="btn btn-primary" ><span class="glyphicon glyphicon-floppy-disk"></span> SUBMIT</button>
		            	<a class="btn btn-danger" style="color:white;cursor:pointer;" onclick="location.href = 'proses_logout.php'" ><span class="glyphicon glyphicon-log-out"></span> LOGOUT </a><br><br>
                    </div>
                </div>
            </div>
        </form>
        <br><br><br>
        </div>
    </div>
    </div>
    </div>
	    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <footer>
            <div class="container">
            <div class="row">
            <div class="col-md-3" id="logoFooter">
                <br>
                <img src="assets/images/logo.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-3 offset-md-3">
                <br>
                <h4>Address</h4>
                <hr class="footer-line">
                <p class="address">Graha Wijaya, Jl. Melawai IX No.6,<br> Kebayoran Baru, <br> Jakarta Selatan 12160</p>
                <br>
            </div>
            <div class="col-md-3">
                <br>
                <h4>Contact</h4>
                <hr class="footer-line">
                <p class="address">
                <strong>Tel</strong> : (021) 723 7438 <br> (021) 721 0738 <br>
                <strong>Fax</strong> : (021) 727 98257 <br>
                <strong>Email</strong> : customercare@resikcemerlang.id</p>
                <br>
            </div>
            </div>
            </div>
        </footer>
    </div>
    <?php
	}
	else
	{
	    ?>
        <script>
            alert("Status Penilaian sudah di Approved");
        </script>
        <?php
	}

?>
<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
    <script src="assets\js\gijgo.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <script>
    $( document ).ready(function() {
      $('#tanggal-lahir').datepicker();
      
      });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
             event.preventDefault();
             $(this).ekkoLightbox();
         });

         //Get the button
         var mybutton = document.getElementById("myBtn");

         // When the user scrolls down 20px from the top of the document, show the button
         window.onscroll = function() {scrollFunction()};

         function scrollFunction() {
           if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
             mybutton.style.display = "block";
           } else {
             mybutton.style.display = "none";
           }
         }

         // When the user clicks on the button, scroll to the top of the document
         function topFunction() {
           document.body.scrollTop = 0;
           document.documentElement.scrollTop = 0;
         }

		function ktpnumberonly(){
		  var e = document.getElementById('nomor-ktp');

		  if (!/^[0-9]+$/.test(e.value)) 
			{ 
				alert("Please enter only number.");
				e.value = e.value.substring(0,e.value.length-1);
			}
		}

	function PreviewImage() {
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
		oFReader.onload = function (oFREvent) {
		document.getElementById("uploadPreview").src = oFREvent.target.result;
		};
	}
	
	
    </script>
    <script src="jquery-1.10.2.min.js"></script>
        <script src="jquery.chained.min.js"></script>
        <script>
            $("#nama").chained("#jabatan");
            $("#divisi").chained("#nama");
        </script>
  </body>
</html>