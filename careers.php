<?php 
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database

			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 164 ditekan
				$pekerjaan		    = $_POST['pekerjaan'];
				$bagian			    = $_POST['bagian'];
				$nama		    	= $_POST['nama'];
				$no_ktp   			= $_POST['no_ktp'];
				$no_kk	 			= $_POST['no_kk'];
				$alamat	 			= $_POST['alamat'];
				$jenis_kelamin      = $_POST['jenis_kelamin'];
				$tempat_lahir 		= $_POST['tempat_lahir'];
				$exp_tgl_lahir		= explode('/', $_POST['tgl_lahir']);
        		$tgl_lahir          = $exp_tgl_lahir[1].'-'.$exp_tgl_lahir[0].'-'.$exp_tgl_lahir[2];
				if($_POST['status'] == 'Cerai' && $jenis_kelamin == 'Laki-Laki'){
					$status  		 	= 'Duda';
				} elseif ($_POST['status'] == 'Cerai' && $jenis_kelamin == 'Perempuan') {
					$status  		 	= 'Janda';
				} else {
					$status  		 	= $_POST['status'];
				}
				if(!empty($_POST['pendidikan_lain']))
				{	
				 $pendidikan        = $_POST['pendidikan_lain'];
				}
                else
                {
				 $pendidikan 		= $_POST['pendidikan'];
				}
				//$pendidikan 		= $_POST['pendidikan'];
				$no_tlp	     		= $_POST['no_tlp'];
				$email	     		= $_POST['email'];
				$nama_ibu		 	= $_POST['nama_ibu'];
				$sim		 		= isset($_POST['sim']) ? $_POST['sim'] : '';
				$no_sim		 		= $_POST['no_sim'] != '' ? $_POST['no_sim'] : '0';
				$bpjs_kesehatan		= $_POST['bpjs_kesehatan'];
				$bpjs_tenagakerja	= $_POST['bpjs_tenagakerja'];
				$bahasa		 		= $_POST['bahasa'];
				$pengalaman		 	= $_POST['pengalaman'];
				$keahlian	        = $_POST['keahlian'];
				$alasan          	= $_POST['alasan'];
				$provinsi_kerja     = $_POST['provinsi'];
				//$kota_kerja			= $_POST['kota'];
				if(!empty($_POST['kota']))
				{	
				 $kota_kerja   = $_POST['kota'];
				}
                else
                {
				 $kota_kerja   = "";
				}
						
						$insert = mysqli_query($koneksi, "INSERT INTO datapelamar(pekerjaan, bagian, nama, no_ktp, no_kk, alamat, jenis_kelamin, tempat_lahir, tgl_lahir, status,pendidikan, no_tlp, email, nama_ibu, sim, no_sim, bpjs_kesehatan, bpjs_tenagakerja, bahasa, pengalaman, keahlian, alasan, provinsi_kerja,kota_kerja) VALUES('$pekerjaan', '$bagian', '$nama', '$no_ktp', '$no_kk', '$alamat', '$jenis_kelamin', '$tempat_lahir', '$tgl_lahir', '$status','$pendidikan', '$no_tlp', '$email', '$nama_ibu', '$sim', '$no_sim', '$bpjs_kesehatan', '$bpjs_tenagakerja', '$bahasa', '$pengalaman', '$keahlian', '$alasan', '$provinsi_kerja','$kota_kerja')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Pelamar Berhasil Di Kirim. <a href="career.php"><- Kembali</a></div>'; // maka tampilkan 'Data Pelamar Berhasil Di Kirim.'
							header('Location: report.php?ktp='.$no_ktp);
							
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Pelamar Gagal Di Kirim!! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data Pelamar Gagal Di Kirim!'
						}
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
      <button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="language-box">
          <a href="career.php" class="language-active">Indonesian</a>
        </div>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="service.html">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="clients.html">Clients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="career.php">Career</a>
          </li>


        </ul>

      </div>
    </nav>
    <br>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <img src="assets/images/hrd.jpg" alt="" class="img-fluid">
          <br><br>
          <h2>Pengembangan Sumber Daya Manusia</h2>
          <p class="about-text">Pelatihan dan pengembangan SDM yang tepat dan terintegrasi <br>
             adalah modal awal sebuah perusahaan untuk mencapai kesejahteraan karyawan.</p>
          <hr class="biru">
          <p class="about-text">
            Dalam mencapai standar perusahaan jasa dengan kualitas SDM terbaik, kami mengaplikasikan program pelatihan dari calon karyawan sampai tingkat manajer.
          </p>
          <p class="about-text">
            Berbagai macam program kami lakukan sesuai dengan kebutuhan masing-masing tingkatan jabatan dalam organisasi termasuk memberikan program sarjana untuk jabatan tertentu. Program pelatihan ini kami susun secara terstruktur dan berkesinambungan yang ditangani oleh pelatih profesional yang berpengalaman.
          </p>
          <br><br>
        </div>
      </div>
    </div>

    <div id="services">
    <div class="container">

    <br><br>
                <div class="row">
                  <br>
                  <div class="col-md-12">
                    <br>
                    <h2>Pelatihan Calon Pelaksana</h2>
                    <hr class="biru">
                  </div>
                  <div class="col-md-5 col-xs-12">
                    <p class="about-text">Sistem perekrutan di perusahaan kami sangat ketat, diawali dengan penilaian administrasi berupa penerimaan dan pemeriksaan berkas yang harus memenuhi syarat, dilanjutkan ke tahap grooming dan kelengkapan dokumen, lalu melalui tes tertulis dan tes fisik.</p>
                    <p class="about-text">Proses seleksi selengkapnya dapat dilihat pada bagan alur di samping:</p>
                  </div>
                  <div class="col-md-6 offset-md-1 col-xs-12  text-center">
                    <a href="assets/images/flow-training.jpg" data-toggle="lightbox" data-gallery="example-gallery">
                     <img src="assets/images/flow-training.jpg" alt="" class="img-fluid">
                    </a>
                    <br><br>
                  </div>
                  <br><br><br>
                </div>

        </div>
      </div>

      <div>
      <div class="container">

      <br><br>
                  <div class="row">
                    <br>
                    <div class="col-md-6 col-xs-12 text-center">
                      <br><br>
                      <img src="assets/images/hrd-1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-5 offset-md-1 col-xs-12 ">
                      <br>
                       <h2 class="text-center">Pusat Pelatihan</h2>
                       <hr class="biru-tengah tambah">
                       <p class="about-text">Kami membentuk Pusat Pelatihan untuk pembekalan dasar terkait pengetahuan cleaning service, yang merupakan core business kami, serta meningkatkan dan menjaga keahlian (skill), pengetahuan (knowledge) dan sikap (attitude) setiap karyawan.</p>
                       <p class="about-text">Tujuan lain yang kami harapkan dari dilakukannya pelatihan dalam Pusat Pelatihan adalah untuk membentuk mental yang kuat untuk menghadapi situasi dan kondisi kerja apapun.</p>

                      <br>
                    </div>

                  </div>
                <br><br>
          </div>
        </div>

        <div id="services">
        <div class="container">

        <br><br>
                    <div class="row">
                      <div class="col-xs-12 ">
                        <br>
                         <h2>Training On The Spot</h2>
                         <hr class="biru">
                         <p class="about-text">Untuk menjaga kualitas tim, kami memiliki program pelatihan refreshment di lapangan yang dinamakan “Training On The Spot”.</p>
                         <p class="about-text">Pelatihan ini dilakukan secara berkala setiap bulannya di berbagai titik lokasi yang bertujuan untuk mengevaluasi kinerja yang terdiri dari skill, knowledge, dan attitude dari para pelaksana di lapangan.</p>
                        <br>
                      </div>
                      <div class="col-xs-12 ">
                        <br>
                         <h2>Pengawasan dan Pemeriksaan Pekerjaan</h2>
                         <p class="about-text">Rencana atau program kerja yang sudah bagus, akan lebih terarah lagi dengan adanya pengawasan yang konsisten</p>
                         <hr class="biru">
                         <p class="about-text">Kami membuat rencana kunjungan berkala untuk mengawasi kondisi pekerjaan di setiap lokasi. Hal ini dilakukan agar pelaksanaan pekerjaan dapat selalu berjalan sesuai dengan rencana awal yang ditetapkan.</p>
                          <p class="about-text">Pengawasan ini berguna untuk mengetahui sejak dini jika ditemukan hal-hal yang dapat mempengaruhi kualitas kerja para pelaksana serta mengetahui masukan dan saran dari klien.</p>
                         <p class="about-text">
                          Inspeksi mendadak sangat penting dilakukan untuk melihat hasil kerja yang sesungguhnya tanpa direkayasa atau dibuat-buat.</p>
                        <br><br>
                      </div>

                    </div>

            </div>
          </div>



<br><br><br><br>

<div id="services">
  <div class="container">
  <div class="row">
    <div class="col-12">
      <img src="assets/images/karir.jpg" alt=""class="img-fluid">
    </div>
    <div class="col-12">
      <br>
      <h2>Karir</h2>
      <p class="about-text">Temukan kesempatan untukmu!</p>
      <hr class="biru">
    </div>
    <div class="col-md-8 offset-md-2">
      <form action="" method="post">
        <div class="text-white form-header">
          <legend class="text-center heade">Form Pelamar Kerja</legend>
        </div>
      <div class="form-content">
        <div class="form-group">
          <label for="jabatan">Jabatan Pekerjaan</label>
          <select class="form-control" id="jabatan" name="pekerjaan" required onchange="javascript:onChangeJob()">
            <option>Pilih Pekerjaan</option>
            <?php
				$query = mysqli_query($koneksi,"SELECT * FROM pekerjaan"); //ORDER BY nama_pekerjaan");
				while ($row = mysqli_fetch_array($query)) {
			?>
			<option value="<?php echo $row['id_pekerjaan']; ?>"><?php echo $row['nama_pekerjaan']; ?></option>
			<?php
				}
			?>
          </select>
        </div>
        <div class="form-group">
          <label for="bagian-pekerjaan">Bagian Pekerjaan</label>
          <select class="form-control" id="bagian-pekerjaan" onchange="javascript:valueselect()" name="bagian" disabled>
            <option value="">Pilih Bagian</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <small>Sesuai e-KTP</small>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
          <small class="text-danger">Wajib Diisi</small>
        </div>
        <div class="form-group">
          <label for="nama">Nama Ibu Kandung</label>
          <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukan Nama Ibu Kandung" required>
          <small class="text-danger">required</small>
        </div>
        <div class="row">
          <div class="col">
            <label for="tempat-lahir">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" id="tempat-lahir" required>
          </div>
          <div class="col">
            <label for="tanggal-lahir">Tanggal Lahir</label>
            <input type="text" class="form-control" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" id="tanggal-lahir" required>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label for="gender">Jenis Kelamin</label>
          <select class="form-control" name="jenis_kelamin" id="gender">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki-Laki">Pria</option>
            <option value="Perempuan">Wanita</option>
          </select>
        </div>
        <div class="form-group">
          <label for="email">Alamat Email</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Alamat Email">
        </div>

        <div class="form-group">
          <label for="nomor-handphone">Nomor Handphone</label>
          <small>Yang dapat dihubungi</small>
          <input type="text" class="form-control" name="no_tlp" onkeyup="tlpnumberonly()" id="nomor-handphone" placeholder="Masukkan Nomor Handphone">
        </div>

        <div class="form-group">
          <label for="status-pernikahan">Status Pernikahan</label>
          <select class="form-control" name="status" id="status-pernikahan">
            <option value="">Status Pernikahan</option>
            <option value="Lajang">Lajang</option>
            <option value="Menikah">Menikah</option>
            <option value="Cerai">Duda/Janda</option>
          </select>
        </div>



        <div class="row">
          <div class="col-6">
            <label for="nomor-ktp">Nomor e-KTP</label>
            <input type="text" name="no_ktp" class="form-control" placeholder="Masukkan Nomor e-KTP" id="nomor-ktp" onkeyup="ktpnumberonly()" required="">
            <small class="text-danger">Wajib Diisi</small>
          </div>
          <div class="col-6">
            <label for="nomor-ktp">Nomor e-KK</label>
            <input type="text" name="no_kk" class="form-control" placeholder="Masukkan Nomor e-KK" onkeyup="kknumberonly()" id="no-kk" required="required">
            <small class="text-danger">Wajib Diisi</small>
          </div>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <small>Sesuai e-KTP</small>
          <textarea class="form-control" rows="3" name="alamat" id="alamat"></textarea>
        </div>
        <div class="form-group">
          <label for="pendidikan">Pendidikan Terakhir</label>
          <select class="form-control" name="pendidikan" id="pendidikan" onchange="javascript:lainselect()" required="">
            <option value="">Pilih Pendidikan Terakhir</option>
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
            <option value="SMA/SMK">SMA</option>
            <option value="D3">D3</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
            <option value="Lain-Lain">Lain-Lain</option>
          </select>
        </div>
        <div class="row">
        	<div class="col-6">
            <label for="pendidikan_lain">Pendidikan Lain</label>
            <input type="text" name="pendidikan_lain" class="form-control" placeholder="Masukan Pendidikan Lain" id="pendidikan_lain" disabled="disabled">
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <label for="bpjs-kesehatan">BPJS Kesehatan</label>
            <select class="form-control" name="bpjs_kesehatan" id="bpjs-kesehatan">
              <option value="">Status BPJS Kesehatan</option>
              <option value="PBI APBN/KJS">Peserta Bantuan Iuran - APBN/KJS</option>
              <option value="PBI APBD">Peserta Bantuan Iuran - APBD</option>
              <option value="Mandiri">Mandiri</option>
              <option value="Badan Usaha">Badan Usaha</option>
              <option value="Tidak Punya">Tidak Punya</option>
            </select>
          </div>
          <div class="col-6">
            <label for="bpjs-kerja">BPJS Ketenagapekerjaan</label>
            <select class="form-control" id="bpjs-kerja" name="bpjs_tenagakerja">
              <option value="">Status BPJS Ketenagapekerjaan</option>
              <option value="Ada">Ada</option>
              <option value="Tidak Ada">Tidak Ada</option>
            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-6">
            <label for="jenis-sim">SIM Yang dimiliki</label>
            <br>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" name="sim" value="SIM A" id="sim-a" autocomplete="off" data-desc="SIM"/>
              <label class="form-check-label" for="sim-a">SIM-A</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" name="sim" value="SIM C" id="sim-c" autocomplete="off" data-desc="SIM"/>
              <label class="form-check-label" for="sim-c">SIM-C</label>
            </div>
          </div>
          <div class="col-6">
            <label for="nomor-sim">Nomor SIM</label>
            <input type="text" class="form-control" id="nomor-sim" name="no_sim" onkeyup="simnumberonly()" placeholder="Masukkan Nomor SIM">
          </div>
        </div>
        <br>
        <div class="form-group">
          <label for="bahasa">Bahasa Yang Dikuasai</label>
          <textarea class="form-control" name="bahasa" rows="3" id="bahasa"></textarea>
        </div>
        <div class="form-group">
          <label for="pengalaman">Pengalaman Kerja Sebelumnya</label>
          <textarea class="form-control" name="pengalaman" rows="3" id="pengalaman"></textarea>
        </div>
        <div class="form-group">
          <label for="keahlian">Keahlian yang dikuasai</label>
          <textarea class="form-control" rows="3" name="keahlian" id="keahlian"></textarea>
        </div>
        <div class="form-group">
          <label for="alasan">Alasan Ingin Bekerja di PT Resik Cemerlang</label>
          <textarea class="form-control" name="alasan" rows="3" id="alasan"></textarea>
        </div>
        <div class="row">
          <div class="col-12">
            <label>Bersedia Ditempatkan di:</label>
          </div>
          <div class="col-6">
            <label for="provinsi">Provinsi</label>
            <select class="form-control" name="provinsi" id="provinsi" onchange="javascript:onChangeProvince()">
              <option>Pilih Provinsi</option>
              <?php
              $query = mysqli_query($koneksi,"SELECT * FROM provinsi ORDER BY nama_provinsi");
              while ($row = mysqli_fetch_array($query)) {
              ?>
              <option value="<?php echo $row['id_provinsi']; ?>"><?php echo $row['nama_provinsi']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="col-6">
            <label for="kota">Kota</label>
            <select class="form-control" name="kota" id="kota">
              <option>Pilih Kota</option>
              <?php
              $query = mysqli_query($koneksi,"SELECT
                                      *
                                    FROM
                                      kota
                                      INNER JOIN provinsi ON kota.id_provinsi_fk = provinsi.id_provinsi ORDER BY nama_provinsi");
              while ($row = mysqli_fetch_array($query)) {
              ?>
              <option id="bag" class="<?php echo $row['id_provinsi']; ?>" value="<?php echo $row['id_kota1']; ?>"><?php echo $row['nama_kota']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <br>
            <button type="submit" name="add" value="Send" class="btn btn-primary btn-resik btn-lg">Kirim</button>
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
      $("#jabatan").change(function() {
        if ($(this).val() !== "pelaksana") {
          $("#bagian-pekerjaan").attr("disabled", "disabled");
        } else {
          $("#bagian-pekerjaan").removeAttr("disabled");
        }
        }).trigger("change");
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

    	function valueselect()
		{
		    var i = document.getElementById('jabatan');
		    var p = i.options[i.selectedIndex].value;
		    // alert(p);
		    if (p == '11' || p == '15')
		    {
		    document.getElementById("sim").required = true;
		    }
		    else
		    {
		     document.getElementById("sim").required = false;
		     
		    }
		}

		function ktpnumberonly(){
		  var e = document.getElementById('nomor-ktp');

		  if (!/^[0-9]+$/.test(e.value)) 
			{ 
				alert("Please enter only number.");
				e.value = e.value.substring(0,e.value.length-1);
			}
		}

		function kknumberonly(){
		  var e = document.getElementById('no-kk');

		  if (!/^[0-9]+$/.test(e.value)) 
			{ 
				alert("Please enter only number.");
				e.value = e.value.substring(0,e.value.length-1);
			}
		}

		function tlpnumberonly(){
		  var e = document.getElementById('nomor-handphone');

		  if (!/^[0-9]+$/.test(e.value)) 
			{ 
				alert("Please enter only number.");
				e.value = e.value.substring(0,e.value.length-1);
			}
		}

		function simnumberonly(){
		  var e = document.getElementById('no_sim');

		  if (!/^[0-9]+$/.test(e.value)) 
			{ 
				alert("Please enter only number.");
				e.value = e.value.substring(0,e.value.length-1);
			}
		}

		function lainselect()
		{
		    var i = document.getElementById('pendidikan');
		    var p = i.options[i.selectedIndex].value;
		    if (p == 'Lain-Lain')
		    {
		    document.getElementById("pendidikan_lain").disabled = false;
		    }
		    else
		    {
		     document.getElementById("pendidikan_lain").disabled = true;
		    }
		}

		function onChangeProvince() {
        let province = $('#provinsi').val();

        let  data = {
                        province : province,
                        lang: 'id'
                    };
                    $.post(
                        "../getCity.php",
                        data,
                        function(dt) {
                            
                            if(dt) {
                                $('#kota').html('');
                                $('#kota').html(dt);
                            }                                  
                        }
                    );
    }

    function onChangeJob() {
        let job = $('#jabatan').val();

        let  data = {
                        job : job,
                        lang: 'id'
                    };
                    $.post(
                        "../getDepartment.php",
                        data,
                        function(dt) {
                            
                            if(dt) {
                                $('#bagian-pekerjaan').html('');
                                $('#bagian-pekerjaan').html(dt);
                                $('#bagian-pekerjaan').removeAttr("disabled");
                            }                                  
                        }
                    );
    }
    </script>
  </body>
</html>