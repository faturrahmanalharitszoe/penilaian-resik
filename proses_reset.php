<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    $email		    = $_POST['email'];
    ?>
        <script>
            alert('<?php echo $email; ?>')
        </script>
        <?php
    $password		= $_POST['password'];
    $repassword     = $_POST['re-password'];
    if($password != $repassword)
    {
        ?>
        <script>
            alert('Password dan Retype Tidak Sama, Silahkan ulangi kembali')
            window.location="registrasi.php";
        </script>
        <?php
    }
    else
    {
        $key = 'e60b7b98b43be1c85903fda55711ab47';
        $temp = $key.base64_encode($password);
        $pass = $temp;
	    date_default_timezone_set("Asia/Bangkok");
	    $hari = date('D');
	    $bulan = date('n');
        $tahun = date ('Y');
	    $tgl = date("Y-m-d H:i:s");
	    $qno = mysqli_query($koneksi,"select * from daftar_penilaian");
	    $jum=mysqli_num_rows($qno);
	    if($jum > 0)
        {
	       $data = mysqli_fetch_array($qno);
	        $nomor = $data['nomor'];
	        //
	        $no=substr($nomor, 7, 4);
            $nom=(int)$no+1;
            $no=$nom;
            $bln=substr($nomor,4, 2);
            $thn=substr($nomor,1,2);
            $blnnow=date('m');
            $thnnow=date('Y');
	        if($bln != $blnnow && $thn == $thnnow)
            {
                $bln=date('m');
	  	        $no='0001';
	  	        $thn=$thnnow;
            }
            if($bln != $blnnow && $thn == $thnnow)
            {
                $bln=date('m');
	  	        $no='0001';
	  	        $thn=$thnnow;
            }   
            else
            if($bln == $blnnow && $thn =! $thnnow)
            {
                $no='0001';
	  	        $bln=date('m');
	  	        $thn=date('Y');
            }
   
            if (strlen($no) == 1)
   	        {
                $no = '000'.$no;
            }
   	        else
   	        if (strlen($no) == 2)
   	        {
                $no = '00'.$no;
            }
   	        else
   	        if (strlen($no) == 3)
   	        {
                $no = '0'.$no;
            }
            if (strlen($bln) == 1)
            {
                $bln = '0'.$bln;
            }
   	            $nomor=$thnnow.$bln.$no;
        }
        else
        {
            $no='0001';
   	        $bln=date('m');
   	        $thn=date('Y');
   	        $nomor=$thn.$bln.$no;
        }   
	   //
	    $qcek = mysqli_query($koneksi,"select * from daftar_penilaian where email = '$email'");
	    if(mysqli_num_rows($qcek) > 0)
	    {
 		    $qupdate=mysqli_query($koneksi,"update daftar_penilaian set password='$pass' where email = '$email'");
	 	    if($qupdate)
		    {
		        $qupdate_karyawan=mysqli_query($koneksi,"update karyawan set password='$pass' where email = '$email'");
		        if($qupdate_karyawan)
		        {
		            $qcekupdate=mysqli_query($koneksi,"select * from daftar_penilaian where email='$email'");
 		            $data = mysqli_fetch_array($qcek);
	                $nama = $data['nama'];
	                $nomor = $data['nomor']; 
	                $password = $data['password'];
		            header('location:kirim_email_konfirmasi.php?nama='.$nama.'&email='.$email.'&nomor='.$nomor.'&id='.$password);
		            ?>
			            <script>
				            alert("Silahkan Cek Email anda untuk proses lebih lanjut, Terima kasih");
				            window.location="login.php";
			            </script>
		            <?php
	            }
		    }     
	    }	
	    else
	    {
	        ?>
			<script>
				alert("Email belum terdaftar, silahkan lakukan registrasi, Terima kasih");
				window.location="login.php";
			</script>
	        <?php
	    }
    }    
?>
