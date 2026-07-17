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
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
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
	if($month < 8 && $month > 1)
	{
        $periode = 'Jan - Jun '.$year;
	}
	else
	{
 	 	$periode = 'Jul - Des '.$year;
	}
	
    $query=mysqli_query($koneksi,"select * from karyawan where nama = '$nama'");
    $a=mysqli_fetch_array($query);
    $id_jabatan =$a['id_jabatan'];  // id jabatan penilai
	$jabatan 	= $a['jabatan'];    // jabatan penilai
	$divisi1    = $a['divisi'];
	$divisi2	= $a['divisi2'];
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
        <form action="update_form.php" method="post" id="form" role="form" enctype="multipart/form-data">
            <div class="text-white form-header">
                <h3 class="text-center header"><b> Form Penilaian Karyawan </b></h3>
            </div>
            <div class="form-content">
                <h4 class="text-center header"><b>Selamat Datang Bpk/Ibu <?php echo $nama; ?></b></h4>  
	            <hr style="height:3px;border-width:0;color:#2878AA;background-color:#2878AA">
				<h6 style="font-size:12px;"><b>PANDUAN KLASIFIKASI PENILAIAN :</b></h6>
				<table>
				   <tr>
    			   	   <th><center>Grade</center></th>
    			   	   <th><center>Score</center></th>
    			   	   <th><center>Keterangan</center></th>
  				   </tr>
				   <tr>
    			   	   <td><center>A</center></td>
    				   <td><center>9 - 10</center></td>
    				   <td><center>Sangat Baik</center></td>
  				   </tr>
				   <tr>
    			   	   <td><center>B</center></td>
    				   <td><center>7 - 8</center></td>
    				   <td><center>Baik</center></td>
  				   </tr>
				   <tr>
    			   	   <td><center>C</center></td>
    				   <td><center>5 - 6</center></td>
    				   <td><center>Cukup</center></td>
  				   </tr>
				   <tr>
    			   	   <td><center>D</center></td>
    				   <td><center>1 - 4</center></td>
    				   <td><center>Kurang</center></td>
  				   </tr>
				</table>
				<hr style="height:1px;border-width:0;color:#2878AA;background-color:#2878AA">
	            <h6><b> PERSONAL YANG DINILAI </b></h6>
	            <hr>
	            <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                <input type="hidden" name="penilai" class="form-control" id="penilai" placeholder="Your Answer" value="<?php echo $nama; ?>" />
                <input type="hidden" name="email" class="form-control" id="email" placeholder="Your Answer" value="<?php echo $email; ?>" />
                <input type="hidden" name="tgl" class="form-control" id="tgl" placeholder="Your Answer" required value="<?php echo $tgl; ?>" />
                </div>
	            <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
	                <label>Jabatan</label> 
	                <form method="post">
		            <select id="jabatan" name="jabatan" class="form-control">  
		                <option disabled selected> Pilih Jabatan </option>
			            <?php
			            //$select=mysqli_query($koneksi,"select * from jabatan where jabatan = 'SENIOR MANAGER' or jabatan = 'MANAGER' or jabatan = 'ASISTEN MANAGER' or jabatan = 'KEPALA CABANG' order by id");
						$select=mysqli_query($koneksi,"select * from role where id_penilai = '$id_jabatan' order by id");
			            while($row=mysqli_fetch_array($select))
			            {
			                //echo "<option>".strtoupper($row['jabatan'])."</option>";
			                ?>
						    <option value="<?php echo $row['id_penilaian']; ?>">
                            <?php echo $row['penilaian']; ?>
						    </option>
						    <?php
			            }
			            ?>
		            </select>
                </div>
		        <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label>Nama</label> 
		            <select id="nama" name="nama" class="form-control" onchange="val()">    
		                <option value=""> Pilih Nama </option>
			            <?php
			            $seledivisi=mysqli_query($koneksi,"select * from karyawan where nama = '$nama'");
						$data=mysqli_fetch_array($seledivisi);
						$divisi=$data['divisi'];
						if($divisi == 'DIREKSI')
						{
						   $select = mysqli_query($koneksi,"select distinct id_jabatan,nama,divisi from karyawan inner join role on role.id_penilaian = karyawan.id_jabatan");  
						}
						else
						{
			            //$select = mysqli_query($koneksi,"select * from karyawan where id_jabatan ='$id_penilaian'");
						//$select = mysqli_query($koneksi,"select * from karyawan inner join jabatan on jabatan.id_penilaian = karyawan.id_jabatan");
						   $select = mysqli_query($koneksi,"select distinct id_jabatan,nama,divisi from karyawan inner join role on role.id_penilaian = karyawan.id_jabatan where karyawan.divisi = '$divisi1' or karyawan.divisi = '$divisi2'");
						}   
			            while($row=mysqli_fetch_array($select))
			            {
						    $nm=$row['nama'];
						 	$qpilih=mysqli_query($koneksi,"select * from penilaian where karyawan = '$nm' and periode = '$periode' and penilai = '$nama'");
							$result=mysqli_num_rows($qpilih);
							if($result == 0)
							{ 								   
			                ?>
						    <option id="bag" class="<?php echo $row['id_jabatan']; ?>" value="<?php echo $row['nama']; ?>">
                            <?php echo $row['nama']; ?> - DIVISI <?php echo $row['divisi']; ?>
						    </option>
						    <?php
							}
			            }
			            ?>
			            <script>
			                function val() {
                            d = document.getElementById("nama").value;
                            document.getElementById('karyawan').value = d;
                            }
			            </script>
		            </select>
                </div><br>
                <input type="hidden" name="karyawan" class="form-control" id="karyawan" >
                <h6><b> ASPEK KEPEMIMPINAN </b></h6>
	            <hr>
	            <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai1"> Koordinasi anggota  <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai1" style="cursor:pointer;"
                        <?php if (isset($nilai1) && $nilai1=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai1" style="cursor:pointer;"
                        <?php if (isset($nilai1) && $nilai1=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai1" style="cursor:pointer;"
                        <?php if (isset($nilai1) && $nilai1=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai1" style="cursor:pointer;"
                        <?php if (isset($nilai1) && $nilai1=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai1" style="cursor:pointer;"
                        <?php if (isset($nilai1) && $nilai1=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai1" style="cursor:pointer;"
                        <?php if (isset($nilai1) && $nilai1=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai1" style="cursor:pointer;"
                        <?php if (isset($nilai1) && $nilai1=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai1" style="cursor:pointer;"
                        <?php if (isset($nilai1) && $nilai1=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai1" style="cursor:pointer;"
                        <?php if (isset($nilai1) && $nilai1=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai1" style="cursor:pointer;"
                        <?php if (isset($nilai1) && $nilai1=="10") echo "checked";?>value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai2"> Kontrol anggota  <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai2" style="cursor:pointer;"
                        <?php if (isset($nilai2) && $nilai2=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai2" style="cursor:pointer;"
                        <?php if (isset($nilai2) && $nilai2=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai2" style="cursor:pointer;"
                        <?php if (isset($nilai2) && $nilai2=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai2" style="cursor:pointer;"
                        <?php if (isset($nilai2) && $nilai2=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai2" style="cursor:pointer;"
                        <?php if (isset($nilai2) && $nilai2=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai2" style="cursor:pointer;"
                        <?php if (isset($nilai2) && $nilai2=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai2" style="cursor:pointer;"
                        <?php if (isset($nilai2) && $nilai2=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai2" style="cursor:pointer;"
                        <?php if (isset($nilai2) && $nilai2=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai2" style="cursor:pointer;"
                        <?php if (isset($nilai2) && $nilai2=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai2" style="cursor:pointer;"
                        <?php if (isset($nilai2) && $nilai2=="10") echo "checked";?>value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai3"> Evaluasi dan pembinaan anggota  <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai3" style="cursor:pointer;"
                        <?php if (isset($nilai3) && $nilai3=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai3" style="cursor:pointer;"
                        <?php if (isset($nilai3) && $nilai3=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai3" style="cursor:pointer;"
                        <?php if (isset($nilai3) && $nilai3=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai3" style="cursor:pointer;"
                        <?php if (isset($nilai3) && $nilai3=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai3" style="cursor:pointer;"
                        <?php if (isset($nilai3) && $nilai3=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai3" style="cursor:pointer;"
                        <?php if (isset($nilai3) && $nilai3=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai3" style="cursor:pointer;"
                        <?php if (isset($nilai3) && $nilai3=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai3" style="cursor:pointer;"
                        <?php if (isset($nilai3) && $nilai3=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai3" style="cursor:pointer;"
                        <?php if (isset($nilai3) && $nilai3=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai3" style="cursor:pointer;"
                        <?php if (isset($nilai3) && $nilai3=="10") echo "checked";?>value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai4"> Delegasi tanggung jawab dan wewenang  <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai4" style="cursor:pointer;"
                        <?php if (isset($nilai4) && $nilai4=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai4" style="cursor:pointer;"
                        <?php if (isset($nilai4) && $nilai4=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai4" style="cursor:pointer;"
                        <?php if (isset($nilai4) && $nilai4=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai4" style="cursor:pointer;"
                        <?php if (isset($nilai4) && $nilai4=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai4" style="cursor:pointer;"
                        <?php if (isset($nilai4) && $nilai4=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai4" style="cursor:pointer;"
                        <?php if (isset($nilai4) && $nilai4=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai4" style="cursor:pointer;"
                        <?php if (isset($nilai4) && $nilai4=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai4" style="cursor:pointer;"
                        <?php if (isset($nilai4) && $nilai4=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai4" style="cursor:pointer;"
                        <?php if (isset($nilai4) && $nilai4=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai4" style="cursor:pointer;"
                        <?php if (isset($nilai4) && $nilai4=="10") echo "checked";?>value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan1"> Catatan :  </label>
			        <textarea rows="2" maxlength="100" name="catatan1" id="catatan1" class="form-control" ></textarea>
                </div><br>
                <h6><b> ASPEK TEKNIS PEKERJAAN </b></h6>
	            <hr>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai5"> Efektifitas & Efisiensi Kerja <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai5" style="cursor:pointer;"
                        <?php if (isset($nilai5) && $nilai5=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai5" style="cursor:pointer;"
                        <?php if (isset($nilai5) && $nilai5=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai5" style="cursor:pointer;"
                        <?php if (isset($nilai5) && $nilai5=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai5" style="cursor:pointer;"
                        <?php if (isset($nilai5) && $nilai5=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai5" style="cursor:pointer;"
                        <?php if (isset($nilai5) && $nilai5=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai5" style="cursor:pointer;"
                        <?php if (isset($nilai5) && $nilai5=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai5" style="cursor:pointer;"
                        <?php if (isset($nilai5) && $nilai5=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai5" style="cursor:pointer;"
                        <?php if (isset($nilai5) && $nilai5=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai5" style="cursor:pointer;"
                        <?php if (isset($nilai5) && $nilai5=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai5" style="cursor:pointer;"
                        <?php if (isset($nilai5) && $nilai5=="10") echo "checked";?>value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai6"> Ketepatan waktu dalam mengerjakan tugas <a style="color:red">*</a></label><br>
			        <input type="radio" required  name="nilai6" style="cursor:pointer;"
                        <?php if (isset($nilai6) && $nilai6=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai6" style="cursor:pointer;"
                        <?php if (isset($nilai6) && $nilai6=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai6" style="cursor:pointer;"
                        <?php if (isset($nilai6) && $nilai6=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai6" style="cursor:pointer;"
                        <?php if (isset($nilai6) && $nilai6=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai6" style="cursor:pointer;"
                        <?php if (isset($nilai6) && $nilai6=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai6" style="cursor:pointer;"
                        <?php if (isset($nilai6) && $nilai6=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai6" style="cursor:pointer;"
                        <?php if (isset($nilai6) && $nilai6=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai6" style="cursor:pointer;"
                        <?php if (isset($nilai6) && $nilai6=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai6" style="cursor:pointer;"
                        <?php if (isset($nilai6) && $nilai6=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai6" style="cursor:pointer;"
                        <?php if (isset($nilai6) && $nilai6=="10") echo "checked";?>value="10"> 10
                                                        
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai7"> Memiliki Skill/kemampuan yang memadai pada bidangnya <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai7" style="cursor:pointer;"
                        <?php if (isset($nilai7) && $nilai7=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai7" style="cursor:pointer;"
                        <?php if (isset($nilai7) && $nilai7=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai7" style="cursor:pointer;"
                        <?php if (isset($nilai7) && $nilai7=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai7" style="cursor:pointer;"
                        <?php if (isset($nilai7) && $nilai7=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai7" style="cursor:pointer;"
                        <?php if (isset($nilai7) && $nilai7=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai7" style="cursor:pointer;"
                        <?php if (isset($nilai7) && $nilai7=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai7" style="cursor:pointer;"
                        <?php if (isset($nilai7) && $nilai7=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai7" style="cursor:pointer;"
                        <?php if (isset($nilai7) && $nilai7=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai7" style="cursor:pointer;"
                        <?php if (isset($nilai7) && $nilai7=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai7" style="cursor:pointer;"
                        <?php if (isset($nilai7) && $nilai7=="10") echo "checked";?>value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai8"> Kemampuan mencapai target divisi <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai8" style="cursor:pointer;"
                        <?php if (isset($nilai8) && $nilai8=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai8" style="cursor:pointer;"
                        <?php if (isset($nilai8) && $nilai8=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai8" style="cursor:pointer;"
                        <?php if (isset($nilai8) && $nilai8=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai8" style="cursor:pointer;"
                        <?php if (isset($nilai8) && $nilai8=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai8" style="cursor:pointer;"
                        <?php if (isset($nilai8) && $nilai8=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai8" style="cursor:pointer;"
                        <?php if (isset($nilai8) && $nilai8=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai8" style="cursor:pointer;"
                        <?php if (isset($nilai8) && $nilai8=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai8" style="cursor:pointer;"
                        <?php if (isset($nilai8) && $nilai8=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai8" style="cursor:pointer;"
                        <?php if (isset($nilai8) && $nilai8=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai8" style="cursor:pointer;"
                        <?php if (isset($nilai8) && $nilai8=="10") echo "checked";?>value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai9"> Kesesuaian terhadap Intruksi Kerja <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai9" style="cursor:pointer;"
                        <?php if (isset($nilai9) && $nilai9=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai9" style="cursor:pointer;"
                        <?php if (isset($nilai9) && $nilai9=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai9" style="cursor:pointer;"
                        <?php if (isset($nilai9) && $nilai9=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai9" style="cursor:pointer;"
                        <?php if (isset($nilai9) && $nilai9=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai9" style="cursor:pointer;"
                        <?php if (isset($nilai9) && $nilai9=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai9" style="cursor:pointer;"
                        <?php if (isset($nilai9) && $nilai9=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai9" style="cursor:pointer;"
                        <?php if (isset($nilai9) && $nilai9=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai9" style="cursor:pointer;"
                        <?php if (isset($nilai9) && $nilai9=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai9" style="cursor:pointer;"
                        <?php if (isset($nilai9) && $nilai9=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai9" style="cursor:pointer;"
                        <?php if (isset($nilai9) && $nilai9=="10") echo "checked";?>value="10"> 10
                </div><br>
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai10"> Tertib Administrasi <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai10" style="cursor:pointer;"
                        <?php if (isset($nilai10) && $nilai10=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai10" style="cursor:pointer;"
                        <?php if (isset($nilai10) && $nilai10=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai10" style="cursor:pointer;"
                        <?php if (isset($nilai10) && $nilai10=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai10" style="cursor:pointer;"
                        <?php if (isset($nilai10) && $nilai10=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai10" style="cursor:pointer;"
                        <?php if (isset($nilai10) && $nilai10=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai10" style="cursor:pointer;"
                        <?php if (isset($nilai10) && $nilai10=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai10" style="cursor:pointer;"
                        <?php if (isset($nilai10) && $nilai10=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai10" style="cursor:pointer;"
                        <?php if (isset($nilai10) && $nilai10=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai10" style="cursor:pointer;"
                        <?php if (isset($nilai10) && $nilai10=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai10" style="cursor:pointer;"
                        <?php if (isset($nilai10) && $nilai10=="10") echo "checked";?>value="10"> 10
                </div><br>
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai11"> Teliti dan cermat dalam menyelesaikan pekerjaan <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai11" style="cursor:pointer;"
                        <?php if (isset($nilai11) && $nilai11=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai11" style="cursor:pointer;"
                        <?php if (isset($nilai11) && $nilai11=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai11" style="cursor:pointer;"
                        <?php if (isset($nilai11) && $nilai11=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai11" style="cursor:pointer;"
                        <?php if (isset($nilai11) && $nilai11=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai11" style="cursor:pointer;"
                        <?php if (isset($nilai11) && $nilai11=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai11" style="cursor:pointer;"
                        <?php if (isset($nilai11) && $nilai11=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai11" style="cursor:pointer;"
                        <?php if (isset($nilai11) && $nilai11=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai11" style="cursor:pointer;"
                        <?php if (isset($nilai11) && $nilai11=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai11" style="cursor:pointer;"
                        <?php if (isset($nilai11) && $nilai11=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai11" style="cursor:pointer;"
                        <?php if (isset($nilai11) && $nilai11=="10") echo "checked";?>value="10"> 10
                </div>
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan2"> Catatan :  </label>
			        <textarea rows="2" maxlength="100" name="catatan2" id="catatan2" class="form-control" ></textarea>
                </div><br>
                <h6><b> ASPEK UMUM </b></h6>
	            <hr>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai12"> Kehadiran / Kedisiplinan <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai12" style="cursor:pointer;"
                        <?php if (isset($nilai12) && $nilai12=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai12" style="cursor:pointer;"
                        <?php if (isset($nilai12) && $nilai12=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai12" style="cursor:pointer;"
                        <?php if (isset($nilai12) && $nilai12=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai12" style="cursor:pointer;"
                        <?php if (isset($nilai12) && $nilai12=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai12" style="cursor:pointer;"
                        <?php if (isset($nilai12) && $nilai12=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai12" style="cursor:pointer;"
                        <?php if (isset($nilai12) && $nilai12=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai12" style="cursor:pointer;"
                        <?php if (isset($nilai12) && $nilai12=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai12" style="cursor:pointer;"
                        <?php if (isset($nilai12) && $nilai12=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai12" style="cursor:pointer;"
                        <?php if (isset($nilai12) && $nilai12=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai12" style="cursor:pointer;"
                        <?php if (isset($nilai12) && $nilai12=="10") echo "checked";?>value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai13"> Kerapihan dan Penampilan <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai13" style="cursor:pointer;"
                        <?php if (isset($nilai13) && $nilai13=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai13" style="cursor:pointer;"
                        <?php if (isset($nilai13) && $nilai13=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai13" style="cursor:pointer;"
                        <?php if (isset($nilai13) && $nilai13=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai13" style="cursor:pointer;"
                        <?php if (isset($nilai13) && $nilai13=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai13" style="cursor:pointer;"
                        <?php if (isset($nilai13) && $nilai13=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai13" style="cursor:pointer;"
                        <?php if (isset($nilai13) && $nilai13=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai13" style="cursor:pointer;"
                        <?php if (isset($nilai13) && $nilai13=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai13" style="cursor:pointer;"
                        <?php if (isset($nilai13) && $nilai13=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai13" style="cursor:pointer;"
                        <?php if (isset($nilai13) && $nilai13=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai13" style="cursor:pointer;"
                        <?php if (isset($nilai13) && $nilai13=="10") echo "checked";?>value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai14"> Responsif dalam komunikasi (Email, WhatsApp, Telepon)  <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai14" style="cursor:pointer;"
                        <?php if (isset($nilai14) && $nilai14=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai14" style="cursor:pointer;"
                        <?php if (isset($nilai14) && $nilai14=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai14" style="cursor:pointer;"
                        <?php if (isset($nilai14) && $nilai14=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai14" style="cursor:pointer;"
                        <?php if (isset($nilai14) && $nilai14=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai14" style="cursor:pointer;"
                        <?php if (isset($nilai14) && $nilai14=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai14" style="cursor:pointer;"
                        <?php if (isset($nilai14) && $nilai14=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai14" style="cursor:pointer;"
                        <?php if (isset($nilai14) && $nilai14=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai14" style="cursor:pointer;"
                        <?php if (isset($nilai14) && $nilai14=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai14" style="cursor:pointer;"
                        <?php if (isset($nilai14) && $nilai14=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai14" style="cursor:pointer;"
                        <?php if (isset($nilai14) && $nilai14=="10") echo "checked";?>value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai15"> Inisiatif  <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai15" style="cursor:pointer;"
                        <?php if (isset($nilai15) && $nilai15=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai15" style="cursor:pointer;"
                        <?php if (isset($nilai15) && $nilai15=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai15" style="cursor:pointer;"
                        <?php if (isset($nilai15) && $nilai15=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai15" style="cursor:pointer;"
                        <?php if (isset($nilai15) && $nilai15=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai15" style="cursor:pointer;"
                        <?php if (isset($nilai15) && $nilai15=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai15" style="cursor:pointer;"
                        <?php if (isset($nilai15) && $nilai15=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai15" style="cursor:pointer;"
                        <?php if (isset($nilai15) && $nilai15=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai15" style="cursor:pointer;"
                        <?php if (isset($nilai15) && $nilai15=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai15" style="cursor:pointer;"
                        <?php if (isset($nilai15) && $nilai15=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai15" style="cursor:pointer;"
                        <?php if (isset($nilai15) && $nilai15=="10") echo "checked";?>value="10"> 10
                </div><br>
                <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai16"> Loyalitas  <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai16" style="cursor:pointer;"
                        <?php if (isset($nilai16) && $nilai16=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai16" style="cursor:pointer;"
                        <?php if (isset($nilai16) && $nilai16=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai16" style="cursor:pointer;"
                        <?php if (isset($nilai16) && $nilai16=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai16" style="cursor:pointer;"
                        <?php if (isset($nilai16) && $nilai16=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai16" style="cursor:pointer;"
                        <?php if (isset($nilai16) && $nilai16=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai16" style="cursor:pointer;"
                        <?php if (isset($nilai16) && $nilai16=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai16" style="cursor:pointer;"
                        <?php if (isset($nilai16) && $nilai16=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai16" style="cursor:pointer;"
                        <?php if (isset($nilai16) && $nilai16=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai16" style="cursor:pointer;"
                        <?php if (isset($nilai16) && $nilai16=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai16" style="cursor:pointer;"
                        <?php if (isset($nilai16) && $nilai16=="10") echo "checked";?>value="10"> 10
                </div><br>
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="nilai17"> Perilaku dan Sikap <a style="color:red">*</a></label><br>
			        <input type="radio" required name="nilai17" style="cursor:pointer;"
                        <?php if (isset($nilai17) && $nilai17=="1") echo "checked";?>value="1"> 1 
                    <input type="radio" name="nilai17" style="cursor:pointer;"
                        <?php if (isset($nilai17) && $nilai17=="2") echo "checked";?>value="2"> 2
                    <input type="radio" name="nilai17" style="cursor:pointer;"
                        <?php if (isset($nilai17) && $nilai17=="3") echo "checked";?>value="3"> 3
                    <input type="radio" name="nilai17" style="cursor:pointer;"
                        <?php if (isset($nilai17) && $nilai17=="4") echo "checked";?>value="4"> 4
                    <input type="radio" name="nilai17" style="cursor:pointer;"
                        <?php if (isset($nilai17) && $nilai17=="5") echo "checked";?>value="5"> 5
                    <input type="radio" name="nilai17" style="cursor:pointer;"
                        <?php if (isset($nilai17) && $nilai17=="6") echo "checked";?>value="6"> 6
                    <input type="radio" name="nilai17" style="cursor:pointer;"
                        <?php if (isset($nilai17) && $nilai17=="7") echo "checked";?>value="7"> 7
                    <input type="radio" name="nilai17" style="cursor:pointer;"
                        <?php if (isset($nilai17) && $nilai17=="8") echo "checked";?>value="8"> 8
                    <input type="radio" name="nilai17" style="cursor:pointer;"
                        <?php if (isset($nilai17) && $nilai17=="9") echo "checked";?>value="9"> 9
                    <input type="radio" name="nilai17" style="cursor:pointer;"
                        <?php if (isset($nilai17) && $nilai17=="10") echo "checked";?>value="10"> 10
                </div><br>
				<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                    <label for="catatan3"> Catatan :  </label>
			        <textarea rows="2" maxlength="100" name="catatan3" id="catatan3" class="form-control" ></textarea>
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
        <?php
    }
?>
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