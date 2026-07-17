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
	    //
        $qnilai = mysqli_query($koneksi,"select * from penilaian where id = '$id'");
        $dnilai = mysqli_fetch_array($qnilai);
	    $penilai = $dnilai['mengetahui_1'];
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
        
    <style>
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .step-container {
            display: none;
        }
        .step-container.active {
            display: block;
        }
        .step-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ddd;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }
        .step-circle.active {
            background-color: #1a6ba8;
            color: white;
        }
        .step-circle.completed {
            background-color: #28a745;
            color: white;
        }
        .step-line {
            flex-grow: 1;
            height: 4px;
            background-color: #ddd;
            margin: 13px 10px 0 10px;
        }

        /* SEGMENTED BUTTON STYLES (1-10) */
        .radio-group-segmented .btn {
            padding: 5px 0;
            font-weight: bold;
            font-size: 14px;
            border-color: #ccc;
            color: #333;
            background-color: #f8f9fa;
        }
        .radio-group-segmented .btn:hover {
            filter: brightness(0.9);
        }
        
        /* Gradient colors for Active state */
        .btn-score-1.active, .btn-score-2.active, .btn-score-3.active { background-color: #dc3545 !important; color: white !important; border-color: #dc3545 !important; }
        .btn-score-4.active, .btn-score-5.active { background-color: #fd7e14 !important; color: white !important; border-color: #fd7e14 !important; }
        .btn-score-6.active, .btn-score-7.active { background-color: #ffc107 !important; color: #333 !important; border-color: #ffc107 !important; }
        .btn-score-8.active, .btn-score-9.active, .btn-score-10.active { background-color: #28a745 !important; color: white !important; border-color: #28a745 !important; }

        .counter-text {
            font-size: 12px;
            color: #1a6ba8;
            font-weight: bold;
            float: right;
            margin-top: 3px;
        }
    </style>


    <style>
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .step-container {
            display: none;
        }
        .step-container.active {
            display: block;
        }
        .step-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ddd;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }
        .step-circle.active {
            background-color: #1a6ba8;
            color: white;
        }
        .step-circle.completed {
            background-color: #28a745;
            color: white;
        }
        .step-line {
            flex-grow: 1;
            height: 4px;
            background-color: #ddd;
            margin: 13px 10px 0 10px;
        }

        /* SEGMENTED BUTTON STYLES (1-10) */
        .radio-group-segmented .btn {
            padding: 5px 0;
            font-weight: bold;
            font-size: 14px;
            border-color: #ccc;
            color: #333;
            background-color: #f8f9fa;
        }
        .radio-group-segmented .btn:hover {
            filter: brightness(0.9);
        }
        
        /* Gradient colors for Active state */
        .btn-score-1.active, .btn-score-2.active, .btn-score-3.active { background-color: #dc3545 !important; color: white !important; border-color: #dc3545 !important; }
        .btn-score-4.active, .btn-score-5.active { background-color: #fd7e14 !important; color: white !important; border-color: #fd7e14 !important; }
        .btn-score-6.active, .btn-score-7.active { background-color: #ffc107 !important; color: #333 !important; border-color: #ffc107 !important; }
        .btn-score-8.active, .btn-score-9.active, .btn-score-10.active { background-color: #28a745 !important; color: white !important; border-color: #28a745 !important; }

        .counter-text {
            font-size: 12px;
            color: #1a6ba8;
            font-weight: bold;
            float: right;
            margin-top: 3px;
        }
    </style>

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
        <form action="update_form_edit.php?id=<?php echo $id;?>" method="post" id="form" role="form" enctype="multipart/form-data">
            <div class="text-white form-header">
                <h3 class="text-center header"><b> Revisi Form Penilaian Karyawan </b></h3>
            </div>
            <div class="form-content">
                <h4 class="text-center header"><b>Selamat Datang Bpk/Ibu <?php echo $penilai; ?></b></h4>  
	            <hr style="height:3px;border-width:0;color:#2878AA;background-color:#2878AA">
				
                <!-- STEP INDICATOR -->
                <div class="step-indicator">
                    <div class="step-circle active" id="circle1">1</div>
                    <div class="step-line"></div>
                    <div class="step-circle" id="circle2">2</div>
                    <div class="step-line"></div>
                    <div class="step-circle" id="circle3">3</div>
                    <div class="step-line"></div>
                    <div class="step-circle" id="circle4">4</div>
                </div>

                <!-- COLLAPSE PANDUAN SKOR -->
                <div class="collapse show mb-4" id="collapsePanduan">
                    <div class="card card-body p-3" style="border: 1px solid #1a6ba8; background-color: #f8f9fa;">
                        <h6 style="font-size:14px; color:#1a6ba8; margin-bottom:10px;"><b>PANDUAN KLASIFIKASI PENILAIAN</b></h6>
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
                    </div>
                </div>
                
                <!-- STEP 1: PERSONAL -->
                <div class="step-container active" id="step1">
    
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

                <!-- Tampilkan aspek[1] -->
                
                    <div class="mt-3 text-right">
                        <button type="button" class="btn btn-primary btn-next" onclick="nextStep(1)">Lanjut <span class="glyphicon glyphicon-chevron-right"></span></button>
                    </div>
                </div> <!-- End Step 1 -->

                <!-- STEP 2: TEKNIS -->
                <div class="step-container" id="step2">
                    <span class="counter-text" id="counter2">0 dari 8 pertanyaan terisi</span>
                    
                    <div class="mt-3 text-right">
                        <button type="button" class="btn btn-primary btn-next" onclick="nextStep(1)">Lanjut <span class="glyphicon glyphicon-chevron-right"></span></button>
                    </div>
                </div> <!-- End Step 1 -->

                <!-- STEP 2: TEKNIS -->
                <div class="step-container" id="step2">
                    <span class="counter-text" id="counter2">0 dari 8 pertanyaan terisi</span>
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
                <?php for($j=0;$j<$i;$j++){ 
                        
                        $db_val = $dnilai['nilai1_'.($j+1)];

                        $var_name = 'nilai1_'.($j+1);
                    ?>
                    <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                        <label for="nilai<?php echo $j+1; ?>"> <?php echo $kriteria[$j];?> <a style="color:red">*</a></label><br>
                        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                            <?php for($v=1; $v<=10; $v++): ?>
                            <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if ($db_val == $v) echo 'active'; ?>" style="flex:1;">
                                <input type="radio" required name="<?php echo $var_name; ?>" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if ($db_val == $v) echo 'checked'; ?>> <?php echo $v; ?>
                            </label>
                            <?php endfor; ?>
                        </div>
                    </div><br>
                    <?php } ?>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan1"> CATATAN <?php echo $aspek[1];?> : </label>
                    <textarea rows="1" maxlength="80" name="catatan1" id="catatan1" class="form-control" readonly > <?php echo $dnilai['catatan1'];?> </textarea>
                    <textarea rows="1" maxlength="80" name="catatan11" id="catatan11" class="form-control" > </textarea>
                </div><br>

                <!-- Tampilkan aspek[2] -->
                
                    <div class="mt-3 d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary btn-prev" onclick="prevStep(2)"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</button>
                        <button type="button" class="btn btn-primary btn-next" onclick="nextStep(2)">Lanjut <span class="glyphicon glyphicon-chevron-right"></span></button>
                    </div>
                </div> <!-- End Step 2 -->

                <!-- STEP 3: NON TEKNIS -->
                <div class="step-container" id="step3">
                    <span class="counter-text" id="counter3">0 dari 7 pertanyaan terisi</span>
                    
                    <div class="mt-3 d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary btn-prev" onclick="prevStep(2)"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</button>
                        <button type="button" class="btn btn-primary btn-next" onclick="nextStep(2)">Lanjut <span class="glyphicon glyphicon-chevron-right"></span></button>
                    </div>
                </div> <!-- End Step 2 -->

                <!-- STEP 3: NON TEKNIS -->
                <div class="step-container" id="step3">
                    <span class="counter-text" id="counter3">0 dari 7 pertanyaan terisi</span>
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
                <?php for($j=0;$j<$i;$j++){ 
                        
                        $db_val = $dnilai['nilai1_'.($j+9)];

                        $var_name = 'nilai1_'.($j+9);
                    ?>
                    <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                        <label for="nilai<?php echo $j+9; ?>"> <?php echo $kriteria[$j];?> <a style="color:red">*</a></label><br>
                        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                            <?php for($v=1; $v<=10; $v++): ?>
                            <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if ($db_val == $v) echo 'active'; ?>" style="flex:1;">
                                <input type="radio" required name="<?php echo $var_name; ?>" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if ($db_val == $v) echo 'checked'; ?>> <?php echo $v; ?>
                            </label>
                            <?php endfor; ?>
                        </div>
                    </div><br>
                    <?php } ?>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan2"> CATATAN <?php echo $aspek[2];?> : </label>
                    <textarea rows="1" maxlength="80" name="catatan2" id="catatan2" class="form-control" readonly > <?php echo $dnilai['catatan2'];?> </textarea>
                    <textarea rows="1" maxlength="80" name="catatan21" id="catatan21" class="form-control" > </textarea>
                </div><br>

                <!-- Tampilkan aspek[0] -->
                
                    <div class="mt-3 d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary btn-prev" onclick="prevStep(3)"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</button>
                        <button type="button" class="btn btn-primary btn-next" onclick="nextStep(3)">Lanjut <span class="glyphicon glyphicon-chevron-right"></span></button>
                    </div>
                </div> <!-- End Step 3 -->

                <!-- STEP 4: KEPEMIMPINAN -->
                <div class="step-container" id="step4">
                    <span class="counter-text" id="counter4">0 dari 4 pertanyaan terisi</span>
                    
                    <div class="mt-3 d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary btn-prev" onclick="prevStep(3)"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</button>
                        <button type="button" class="btn btn-primary btn-next" onclick="nextStep(3)">Lanjut <span class="glyphicon glyphicon-chevron-right"></span></button>
                    </div>
                </div> <!-- End Step 3 -->

                <!-- STEP 4: KEPEMIMPINAN -->
                <div class="step-container" id="step4">
                    <span class="counter-text" id="counter4">0 dari 4 pertanyaan terisi</span>
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
                <?php for($j=0;$j<$i;$j++){ 
                        
                        $db_val = $dnilai['nilai1_'.($j+16)];

                        $var_name = 'nilai1_'.($j+16);
                    ?>
                    <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                        <label for="nilai<?php echo $j+16; ?>"> <?php echo $kriteria[$j];?> <a style="color:red">*</a></label><br>
                        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                            <?php for($v=1; $v<=10; $v++): ?>
                            <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if ($db_val == $v) echo 'active'; ?>" style="flex:1;">
                                <input type="radio" required name="<?php echo $var_name; ?>" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if ($db_val == $v) echo 'checked'; ?>> <?php echo $v; ?>
                            </label>
                            <?php endfor; ?>
                        </div>
                    </div><br>
                    <?php } ?>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan3"> CATATAN <?php echo $aspek[0];?> : </label>
                    <textarea rows="1" maxlength="80" name="catatan3" id="catatan3" class="form-control" readonly > <?php echo $dnilai['catatan3'];?> </textarea>
                    <textarea rows="1" maxlength="80" name="catatan31" id="catatan31" class="form-control" > </textarea>
                </div><br>
                
                    <div class="mt-3 d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary btn-prev" onclick="prevStep(4)"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</button>
                    </div>
                </div> <!-- End Step 4 -->
                
                    <div class="mt-3 d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary btn-prev" onclick="prevStep(4)"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</button>
                    </div>
                </div> <!-- End Step 4 -->
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
  <script>

        // WIZARD LOGIC
        function updateStepIndicator(step) {
            $('.step-circle').removeClass('active completed');
            for(let i=1; i<step; i++) {
                $('#circle'+i).addClass('completed');
            }
            $('#circle'+step).addClass('active');
        }

        function validateStep(step) {
            let isValid = true;
            let firstInvalid = null;
            
            // Check all required inputs in the current step
            $('#step' + step + ' [required]').each(function() {
                if ($(this).is(':radio')) {
                    let name = $(this).attr('name');
                    if ($('input[name="' + name + '"]:checked').length === 0) {
                        isValid = false;
                        if (!firstInvalid) firstInvalid = $(this);
                    }
                } else if ($(this).is('select')) {
                    if (!$(this).val()) {
                        isValid = false;
                        if (!firstInvalid) firstInvalid = $(this);
                    }
                } else {
                    if (!$(this).val()) {
                        isValid = false;
                        if (!firstInvalid) firstInvalid = $(this);
                    }
                }
            });

            if (!isValid) {
                alert("Harap lengkapi semua isian yang wajib pada step ini sebelum melanjutkan.");
                if (firstInvalid) {
                    // Scroll to the first invalid element
                    $('html, body').animate({
                        scrollTop: firstInvalid.closest('div').offset().top - 100
                    }, 500);
                }
            }
            return isValid;
        }

        function nextStep(current) {
            if (validateStep(current)) {
                $('#step' + current).removeClass('active');
                $('#step' + (current + 1)).addClass('active');
                updateStepIndicator(current + 1);
                window.scrollTo(0, 0);
            }
        }

        function prevStep(current) {
            $('#step' + current).removeClass('active');
            $('#step' + (current - 1)).addClass('active');
            updateStepIndicator(current - 1);
            window.scrollTo(0, 0);
        }

        function updateCounters() {
            // Step 2:
            let step2Filled = $('#step2 .radio-group-segmented').filter(function() { return $(this).find('input:checked').length > 0; }).length;
            let step2Total = $('#step2 .radio-group-segmented').length;
            $('#counter2').text(step2Filled + " dari " + step2Total + " kriteria terisi");

            // Step 3:
            let step3Filled = $('#step3 .radio-group-segmented').filter(function() { return $(this).find('input:checked').length > 0; }).length;
            let step3Total = $('#step3 .radio-group-segmented').length;
            $('#counter3').text(step3Filled + " dari " + step3Total + " kriteria terisi");

            // Step 4:
            let step4Filled = $('#step4 .radio-group-segmented').filter(function() { return $(this).find('input:checked').length > 0; }).length;
            let step4Total = $('#step4 .radio-group-segmented').length;
            $('#counter4').text(step4Filled + " dari " + step4Total + " kriteria terisi");
        }

        $(document).ready(function() {
            // Listen for radio changes to update UI and counters
            $('.score-radio').on('change', function() {
                // Remove active from all buttons in the group
                $(this).closest('.radio-group-segmented').find('.btn').removeClass('active');
                // Add active to the parent label
                $(this).closest('label').addClass('active');
                updateCounters();
            });
            // Initial counter update
            updateCounters();
        });

</script>
</body>
</html>