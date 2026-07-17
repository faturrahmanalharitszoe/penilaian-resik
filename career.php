<?php 
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
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

        <div class="row">
          <div class="col-12 text-center">
            <br>
            <!--<button type="submit" name="add" value="Send" class="btn btn-primary btn-resik btn-lg">Kirim</button>-->
			<button class="btn btn-primary" onclick="location.href = 'login.php'" ><span class="glyphicon glyphicon-floppy-disk"></span> LOGIN</button>
			<button class="btn btn-danger" onclick="location.href = 'registrasi.php'" ><span class="glyphicon glyphicon-log-out"></span> DAFTAR</button>
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
	  $("#vaksin").change(function() {
        if ($(this).val() !== "Sudah") {
          $("#uploadImage").attr("hidden", "hidden");
		  $("#uploadPreview").attr("hidden", "hidden");
		  $("#lblsertifikat").attr("hidden", "hidden");
        } else {
          $("#uploadImage").removeAttr("hidden");
		  $("#uploadPreview").removeAttr("hidden");
		  $("#lblsertifikat").removeAttr("hidden");
        }
        }).trigger("change");
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
	function PreviewImage() {
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
		oFReader.onload = function (oFREvent) {
		document.getElementById("uploadPreview").src = oFREvent.target.result;
		};
	}
	
    </script>
  </body>
</html>