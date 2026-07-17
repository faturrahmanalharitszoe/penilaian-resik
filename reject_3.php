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
   <?php
   include("koneksi.php"); 
   $id=$_GET['id'];
   $query=mysqli_query($koneksi,"select * from karyawan where id_jabatan = 1");
   $dquery=mysqli_fetch_array($query);
   $nama=$dquery['nama'];
   ?>
   <div class="col-md-8 offset-md-2">
      <form action="update_reject_3.php" method="post" id="form" role="form" enctype="multipart/form-data">
          <div class="text-white form-header">
             <h3 class="text-center header"><b> Reject Hasil Penilaian Karyawan </b></h3>
          </div>
		  <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $id; ?>" />
          <div class="form-content">
             <h4 class="text-center header"><b>Selamat Datang Bpk/Ibu <?php echo $nama; ?></b></h4>  
	         <hr style="height:3px;border-width:0;color:#2878AA;background-color:#2878AA">
	         <hr>
	         <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
                <label for="catatan"> Catatan :  </label>
			        <textarea rows="2" maxlength="100" name="catatan" id="catatan" class="form-control" ></textarea>
             </div>
			 <label><center>Jika ada catatan, silahkan ditambahkan di kolom catatan, jika tidak ada silahkan klik tombol Reject, Terima kasih</center></label>
	         <div class="row">
                 <div class="col-12 text-center">
                    <br>
		            <button class="btn btn-primary" ><span class="glyphicon glyphicon-floppy-disk"></span> REJECT </button>
                 </div>
             </div>
          </div>
      </form>  

