<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    $email		    = $_POST['email'];
    $password		= $_POST['password'];
    $repassword     = $_POST['re-password'];
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d H:i:s");
    if($password != $repassword)
    {
        ?>
        <script>
            alert('Password dan Retype Tidak Sama, Silahkan ulangi kembali')
            window.history.back();
        </script>
        <?php
    }
    else
    {
        $key            = md5('resikcemerlang');
        $pass           = $key.base64_encode($password);
	    $qcek = mysqli_query($koneksi,"select * from daftar_penilaian where email = '$email'");
	    if(mysqli_num_rows($qcek)===0)
	    {
	        $qcek=mysqli_query($koneksi,"select * from karyawan where email = '$email'");
			$jum=mysqli_num_rows($qcek);
			if($jum ===0)
			{
			   ?>
			   <script>
			      alert("Mohon maaf anda tidak bisa melakukan registrasi karena tidak terdaftar");
				  /*window.location="login.html";*/
			   </script>
			   <?php
			}
			else
			{
	         	$a=mysqli_fetch_array($qcek);
	        	$nama=$a['nama'];
 		    	$qinsert=mysqli_query($koneksi,"insert into daftar_penilaian set tgl='$tgl',nama='$nama',email='$email',password='$pass'");
	 	    	if($qinsert)
		    	{
		         	$qupdate=mysqli_query($koneksi,"update karyawan set password='$pass' where email='$email'");
		        	if($qupdate)
		        	{
		                header('location:kirim_email_konfirmasi.php?nama='.$nama.'&email='.$email.'&id='.$pass);
		            	?>
			               <script>
				           	  alert("Silahkan Cek Email anda untuk proses lebih lanjut, Terima kasih");
				              window.location="login.php";
			               </script>
		                <?php
		        	}      
	            }
			}	
	    }	
	    else
	    {
	        ?>
			<script>
				alert("Email sudah terdaftar, silahkan login, Terima kasih");
				/*window.location="login.html";*/
			</script>
	        <?php
	    }
    }    
?>
