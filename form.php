<?php
session_start();
if(empty($_SESSION['nama']))
{		
	?>
	<script>
    alert("Anda Harus Login Dahulu"); 
    window.location="login.php"; 
    </script>
    <?php
}
else
{
    //include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    include "koneksi.php";
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d H:i:s");
    if(isset($_GET['nama']))
    {
        $nama=$_GET['nama'];   // nama penilai
        ?>
        <script>
            var a = '<?php echo $nama; ?>';
            document.getElementById('nama').value = a;
        </script>
        <?php	  
    }
    if(isset($_GET['email']))
    {
        $email=$_GET['email'];   // email penilai
        ?>
        <script>
            var b = '<?php echo $email; ?>';
            document.getElementById('email').value = b;
        </script>
        <?php	
    }
	$month = date('m');
$year = date('Y');
if($month == 1) {
    $periode = 'Jul - Des '.($year - 1);
} else if($month <= 7) {
    $periode = 'Jan - Jun '.$year;
} else {
    $periode = 'Jul - Des '.$year;
}
	$i=0;
	$qaspek=mysqli_query($koneksi,"select * from aspek_penilaian order by id asc");
	while($row=mysqli_fetch_array($qaspek))
	{
	   $aspek[$i] = $row['aspek_penilaian'];
	   $id_aspek[$i] = $row['id_aspek'];
	   $i++;
	}
    $query=mysqli_query($koneksi,"select * from karyawan where nama = '$nama'");
    $a=mysqli_fetch_array($query);
    $id_jabatan =$a['id_jabatan'];  // id jabatan penilai
	$jabatan 	= $a['jabatan'];    // jabatan penilai
	$divisi1    = $a['divisi'];
	$divisi2	= $a['divisi2'];
    $divisi3    = $a['divisi3'];
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
        margin-left:16px;
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

        /* WIZARD STYLES */
        .step-container { display: none; }
        .step-container.active { display: block; }
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 0 10px;
        }
        .step-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ddd;
            color: #555;
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
    
        <div class="col-md-8 offset-md-2">
        <form action="update_form.php" method="post" id="form" role="form" enctype="multipart/form-data">
            <div class="text-white form-header">
                <h3 class="text-center header"><b> Form Penilaian Karyawan </b></h3>
            </div>
            <div class="form-content">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="header mb-0"><b>Selamat Datang Bpk/Ibu <?php echo $nama; ?></b></h4>  
                    <button type="button" class="btn btn-sm btn-info text-white" id="btnTogglePanduan" data-toggle="collapse" data-target="#collapsePanduan" aria-expanded="true" aria-controls="collapsePanduan">
                        <span class="glyphicon glyphicon-info-sign"></span> Sembunyikan Panduan
                    </button>
                </div>
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
                    <h6>
                        <b> PERSONAL YANG DINILAI </b>
                    </h6>
                    <hr>
	            <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                <input type="hidden" name="penilai" class="form-control" id="penilai" placeholder="Your Answer" value="<?php echo $nama; ?>" />
                <input type="hidden" name="email" class="form-control" id="email" placeholder="Your Answer" value="<?php echo $email; ?>" />
                <input type="hidden" name="tgl" class="form-control" id="tgl" placeholder="Your Answer" required value="<?php echo $tgl; ?>" />
                </div>
	            <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
	                <?php
                        // PRELOAD ROLE MAP
                        $role_map = array();
                        $q_all_roles = mysqli_query($koneksi, "SELECT id_penilai, id_penilaian FROM role");
                        while($r = mysqli_fetch_array($q_all_roles)) {
                            $role_map[$r['id_penilai']][] = $r['id_penilaian'];
                        }
                        
                        // PRELOAD ALL ACTIVE SUPERIORS FOR CLOSENESS LOGIC
                        $all_superiors = array();
                        $q_all_sup = mysqli_query($koneksi, "SELECT nama, id_jabatan, divisi, divisi2, divisi3, divisi4, divisi5, divisi6, divisi7, divisi8 FROM karyawan WHERE aktif = 1 AND id_jabatan IN (2,3,4,5,6,7,8,9,10)");
                        while($sup = mysqli_fetch_array($q_all_sup)) {
                            $all_superiors[] = $sup;
                        }

			            $seledivisi=mysqli_query($koneksi,"select * from karyawan where nama = '$nama' and aktif = 1");
						$data=mysqli_fetch_array($seledivisi);
                        
                        // Kumpulkan divisi penilai
                        $divisi_list = array();
                        for ($i = 1; $i <= 8; $i++) {
                            $key = 'divisi' . ($i == 1 ? '' : $i);
                            if (isset($data[$key]) && $data[$key] != '' && $data[$key] != 'NONE' && $data[$key] != null) {
                                $divisi_list[] = $data[$key];
                            }
                        }
                        $divisi_list = array_unique($divisi_list);

                        $valid_targets = array();
                        
                        $target_roles = array();
                        if (isset($role_map[$id_jabatan])) {
                            $target_roles = $role_map[$id_jabatan];
                        }
                        
                        if(count($target_roles) > 0 && count($divisi_list) > 0) {
                            $roles_in = implode(",", $target_roles);
                            $divisi_in = "'" . implode("','", $divisi_list) . "'";
                            
                            $like_clauses = "";
                            if (in_array('OPERASIONAL', $divisi_list)) {
                                $like_clauses .= " OR divisi LIKE 'OPS - %' OR divisi2 LIKE 'OPS - %' OR divisi3 LIKE 'OPS - %' OR divisi4 LIKE 'OPS - %' OR divisi5 LIKE 'OPS - %' OR divisi6 LIKE 'OPS - %' OR divisi7 LIKE 'OPS - %' OR divisi8 LIKE 'OPS - %'";
                            }
                            
                            $q_targets = mysqli_query($koneksi, "
                                SELECT nama, jabatan, id_jabatan, divisi, divisi2, divisi3, divisi4, divisi5, divisi6, divisi7, divisi8, golongan, id_role_approval
                                FROM karyawan 
                                WHERE aktif = 1 
                                AND id_jabatan IN ($roles_in)
                                AND (
                                    divisi IN ($divisi_in) OR 
                                    divisi2 IN ($divisi_in) OR 
                                    divisi3 IN ($divisi_in) OR 
                                    divisi4 IN ($divisi_in) OR 
                                    divisi5 IN ($divisi_in) OR 
                                    divisi6 IN ($divisi_in) OR 
                                    divisi7 IN ($divisi_in) OR
                                    divisi8 IN ($divisi_in)
                                    $like_clauses
                                )
                                ORDER BY nama ASC
                            ");
                            
                            $all_valid_targets = array();
                            while($t = mysqli_fetch_array($q_targets)) {
                                if($t['nama'] != $nama) {
                                    $all_valid_targets[] = $t;
                                }
                            }
                            
                            foreach($all_valid_targets as $t) {
                                // BYPASS LOGIC: If target has a specific id_role_approval
                                if (isset($t['id_role_approval']) && $t['id_role_approval'] != 0) {
                                    if ($t['id_role_approval'] > 0) {
                                        $q_req_role = mysqli_query($koneksi, "SELECT id_penilai FROM role_approval WHERE id = '" . $t['id_role_approval'] . "' LIMIT 1");
                                        if ($req_role = mysqli_fetch_array($q_req_role)) {
                                            if ($id_jabatan == $req_role['id_penilai']) {
                                                $valid_targets[] = $t;
                                            }
                                        }
                                    }
                                    continue; 
                                }
                            
                                $is_direct = true;
                                foreach($all_superiors as $m) {
                                    if ($m['nama'] == $nama) continue;
                                    
                                    if (isset($role_map[$m['id_jabatan']]) && in_array($t['id_jabatan'], $role_map[$m['id_jabatan']])) {
                                        $m_divs = array($m['divisi'], $m['divisi2'], $m['divisi3'], $m['divisi4'], $m['divisi5'], $m['divisi6'], $m['divisi7'], $m['divisi8']);
                                        $m_divs_clean = array_filter($m_divs, function($v) { return $v != '' && $v != 'NONE' && $v != null; });
                                        $t_divs = array($t['divisi'], $t['divisi2'], $t['divisi3'], $t['divisi4'], $t['divisi5'], $t['divisi6'], $t['divisi7'], $t['divisi8']);
                                        
                                        $m_exact = (count(array_intersect($m_divs_clean, $t_divs)) > 0);
                                        $m_prefix = false;
                                        if (!$m_exact) {
                                            foreach($m_divs_clean as $md) {
                                                if ($md == 'OPERASIONAL') { foreach($t_divs as $td) { if (strpos($td, 'OPS - ') === 0) { $m_prefix = true; break; } } }
                                                if ($m_prefix) break;
                                            }
                                        }
                                        
                                        if ($m_exact || $m_prefix) {
                                            $eval_exact = (count(array_intersect($divisi_list, $t_divs)) > 0);
                                            $eval_closeness = ($eval_exact ? 1000 : 0) + $id_jabatan;
                                            $m_closeness = ($m_exact ? 1000 : 0) + $m['id_jabatan'];
                                            
                                            if ($m_closeness > $eval_closeness) {
                                                $is_direct = false;
                                                break;
                                            }
                                        }
                                    }
                                }
                                
                                if ($is_direct) {
                                    $valid_targets[] = $t;
                                }
                            }
                        }

                        $valid_jabatans = array();
                        foreach($valid_targets as $vt) {
                            $nm = $vt['nama'];
                            // Pastikan belum dinilai
                            $qpilih=mysqli_query($koneksi,"select * from penilaian where karyawan = '$nm' and periode = '$periode' and penilai = '$nama'");
                            if(mysqli_num_rows($qpilih) == 0) {
                                $valid_jabatans[] = $vt['id_jabatan'];
                            }
                        }
                        $valid_jabatans = array_unique($valid_jabatans);
?>
	                <label>Jabatan</label> 
	                <form method="post">
		            <select id="jabatan" name="jabatan" class="form-control">
		                <option disabled selected> Pilih Jabatan </option>
			            <?php
						$select=mysqli_query($koneksi,"select * from role where id_penilai = '$id_jabatan' order by id");
						$jum=mysqli_num_rows($select);
			            while($row=mysqli_fetch_array($select))
			            {
                            if (in_array($row['id_penilaian'], $valid_jabatans)) {
			                ?>
						    <option value="<?php echo $row['id_penilaian']; ?>">
                            <?php echo $row['penilaian']; ?>
						    </option>
						    <?php
                            }
			            }
			            ?>
		            </select>
                </div>
		        <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label>Nama</label> 
					<form action="" method="post">
		            <select id="nama" name="nama" class="form-control" onchange="val()">    
		                <option value=""> Pilih Nama </option>
			            <?php
                        foreach($valid_targets as $row) {
						    $nm = $row['nama'];
						 	$qpilih=mysqli_query($koneksi,"select * from penilaian where karyawan = '$nm' and periode = '$periode' and penilai = '$nama'");
							$result=mysqli_num_rows($qpilih);
							if($result == 0) { 								   
			            ?>
						    <option id="bag" class="<?php echo $row['id_jabatan']; ?>" value="<?php echo $row['nama']; ?>">
                            <?php echo $row['nama']; ?> - <?php echo $row['golongan']; ?> - <?php echo $row['divisi'];?>
						    </option>
						<?php
							}
			            }
			            ?>
			                function val() {
                            d = document.getElementById("nama").value;
                            document.getElementById('karyawan').value = d;
                            }

			            </script>
		            </select>
					</form>
                </div><br>
                <input type="hidden" name="karyawan" class="form-control" id="karyawan" >
                <!--<h6><b> ASPEK KEPEMIMPINAN </b></h6>-->
				
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
	            <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai1"> <?php echo $kriteria[0];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai1) && $nilai1==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai1" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai1) && $nilai1==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai2"> <?php echo $kriteria[1];?>  <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai2) && $nilai2==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai2" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai2) && $nilai2==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai3"> <?php echo $kriteria[2];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai3) && $nilai3==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai3" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai3) && $nilai3==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai4"> <?php echo $kriteria[3];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai4) && $nilai4==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai4" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai4) && $nilai4==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai5"> <?php echo $kriteria[4];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai5) && $nilai5==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai5" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai5) && $nilai5==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai6"> <?php echo $kriteria[5];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai6) && $nilai6==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai6" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai6) && $nilai6==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai7"> <?php echo $kriteria[6];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai7) && $nilai7==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai7" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai7) && $nilai7==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai8"> <?php echo $kriteria[7];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai8) && $nilai8==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai8" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai8) && $nilai8==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan1"> CATATAN <?php echo $aspek[1];?> : </label>
			        <textarea rows="3" maxlength="80" name="catatan1" id="catatan1" class="form-control" ></textarea>
                </div><br>
                
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
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai9"> <?php echo $kriteria[0];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai9) && $nilai9==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required  name="nilai9" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai9) && $nilai9==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                                                        
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai10"> <?php echo $kriteria[1];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai10) && $nilai10==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai10" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai10) && $nilai10==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai11"> <?php echo $kriteria[2];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai11) && $nilai11==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai11" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai11) && $nilai11==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai12"> <?php echo $kriteria[3];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai12) && $nilai12==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai12" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai12) && $nilai12==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai13"> <?php echo $kriteria[4];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai13) && $nilai13==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai13" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai13) && $nilai13==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai14"> <?php echo $kriteria[5];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai14) && $nilai14==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai14" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai14) && $nilai14==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai15"> <?php echo $kriteria[6];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai15) && $nilai15==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai15" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai15) && $nilai15==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div>	
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan2"> CATATAN <?php echo $aspek[2];?> : </label>
			        <textarea rows="3" maxlength="80" name="catatan2" id="catatan2" class="form-control" ></textarea>
                </div><br>
                
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
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai16"> <?php echo $kriteria[0];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai16) && $nilai16==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai16" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai16) && $nilai16==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai17"> <?php echo $kriteria[1];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai17) && $nilai17==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai17" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai17) && $nilai17==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai18"> <?php echo $kriteria[2];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai18) && $nilai18==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai18" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai18) && $nilai18==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai19"> <?php echo $kriteria[3];?> <a style="color:red">*</a></label><br>
			        <div class="btn-group btn-group-toggle d-flex radio-group-segmented w-100" data-toggle="buttons">
                        <?php for($v=1; $v<=10; $v++): ?>
                        <label class="btn btn-outline-secondary btn-score-<?php echo $v; ?> <?php if (isset($nilai19) && $nilai19==$v) echo 'active'; ?>" style="flex:1;">
                            <input type="radio" required name="nilai19" value="<?php echo $v; ?>" autocomplete="off" class="score-radio" <?php if (isset($nilai19) && $nilai19==$v) echo 'checked'; ?>> <?php echo $v; ?>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div><br>	
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan3"> CATATAN <?php echo $aspek[0];?> : </label>
			        <textarea rows="3" maxlength="80" name="catatan3" id="catatan3" class="form-control" ></textarea>
                </div><br>
                
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
        <?php
    }
?>
</div>
</div>
</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

</div>


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
            // Step 2: nilai1 to nilai8
            let step2Filled = $('#step2 .radio-group-segmented').filter(function() { return $(this).find('input:checked').length > 0; }).length;
            let step2Total = $('#step2 .radio-group-segmented').length;
            $('#counter2').text(step2Filled + " dari " + step2Total + " kriteria terisi");

            // Step 3: nilai9 to nilai15
            let step3Filled = $('#step3 .radio-group-segmented').filter(function() { return $(this).find('input:checked').length > 0; }).length;
            let step3Total = $('#step3 .radio-group-segmented').length;
            $('#counter3').text(step3Filled + " dari " + step3Total + " kriteria terisi");

            // Step 4: nilai16 to nilai19
            let step4Filled = $('#step4 .radio-group-segmented').filter(function() { return $(this).find('input:checked').length > 0; }).length;
            let step4Total = $('#step4 .radio-group-segmented').length;
            $('#counter4').text(step4Filled + " dari " + step4Total + " kriteria terisi");
        }

        $(document).ready(function() {
            // Listen for radio changes to update UI and counters
            $('.score-radio').on('change', function() {
                updateCounters();
            });
            // Initial counter update
            updateCounters();
            $('#collapsePanduan').on('hidden.bs.collapse', function () {
                $('#btnTogglePanduan').html('<span class="glyphicon glyphicon-info-sign"></span> Lihat Panduan Skor');
            });
            $('#collapsePanduan').on('show.bs.collapse', function () {
                $('#btnTogglePanduan').html('<span class="glyphicon glyphicon-info-sign"></span> Sembunyikan Panduan');
            });

        });

</script>
</body>
</html>