<?php 
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
$email = $_GET['email'];
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


    <div class="col-md-8 offset-md-2">
        <div class="text-white form-header">
          <h3 class="text-center header"><b> Reset Password </b></h3>
        </div>
	<form action="proses_reset.php" method="post" id="form" role="form" enctype="multipart/form-data">	
      <div class="form-content">
        <div class="col-6" style="margin-bottom:1rem;max-width:100%;">
          <label for="email">Alamat Email <a style="color:red">*</a></label>
          <input type="text" name="email" class="form-control" id="email" value=<?php echo $email;?> />
        </div>  
		<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
          <label for="nama">New Password <a style="color:red">*</a></label>
          <input type="password" name="password" autocomplete="current-password" placeholder="Your Answer" required id="password" class="form-control">
        </div>
		<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
          <label for="nama">Retype Password <a style="color:red">*</a></label>
          <input type="password" class="form-control" id="re-password" name="re-password" placeholder="Your Answer" required>
        </div>
		<div class="col-6" style="margin-bottom:1rem;max-width:100%;">
		  <input type="checkbox" onclick="ShowFunction()"> Show Password
		</div>  
        <div class="row">
          <div class="col-12 text-center">
            <br>
            <!--<button type="submit" name="add" value="Send" class="btn btn-primary btn-resik btn-lg">Kirim</button>-->
			<button class="btn btn-primary" ><span class="glyphicon glyphicon-floppy-disk"></span> SIMPAN </button>
          </div>
        </div>
      </div>
    </form>
      <br><br><br>
    </div>
  </div>
</div>
</div>

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

		function anaknumberonly(){
		  var e = document.getElementById('anak');

		  if (!/^[0-9]+$/.test(e.value)) 
			{ 
				alert("Please enter only number.");
				e.value = e.value.substring(0,e.value.length-1);
			}
		}
		
		function tingginumberonly(){
		  var e = document.getElementById('tinggi');

		  if (!/^[0-9]+$/.test(e.value)) 
			{ 
				alert("Please enter only number.");
				e.value = e.value.substring(0,e.value.length-1);
			}
		}
		
		function beratnumberonly(){
		  var e = document.getElementById('berat');

		  if (!/^[0-9]+$/.test(e.value)) 
			{ 
				alert("Please enter only number.");
				e.value = e.value.substring(0,e.value.length-1);
			}
		}
		
		function gajinumberonly(){
		  var e = document.getElementById('gaji');

		  if (!/^[0-9]+$/.test(e.value)) 
			{ 
				alert("Please enter only number.");
				e.value = e.value.substring(0,e.value.length-1);
			}
		}
		
		function rekeningumberonly(){
		  var e = document.getElementById('no-rekening');

		  if (!/^[0-9]+$/.test(e.value)) 
			{ 
				alert("Please enter only number.");
				e.value = e.value.substring(0,e.value.length-1);
			}
		}
		
		function umurumberonly(){
		  var e = document.getElementById('umur');

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
	
	function ShowFunction() {
  		var x = document.getElementById("password");
  		if (x.type === "password") {
    	x.type = "text";
  		} else {
    	x.type = "password";
  		}
		var y = document.getElementById("re-password");
  		if (y.type === "password") {
    	y.type = "text";
  		} else {
    	y.type = "password";
  		}
   }
	
    </script>
  </body>
</html>