<?php
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
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
	$vaksin		   	 	= $_POST['vaksin'];
	if (basename($_FILES["uploadImage"]["name"]) === ''){
		$nmfoto='';}
	else 
	{
		$nmfoto='foto_'.$no_ktp.'.jpg';
	}
	$target_dirfoto = "vaksin/";
    $target_foto = $target_dirfoto . $nmfoto;
	move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $target_foto);	

	$insert = mysqli_query($koneksi, "INSERT INTO datapelamar(pekerjaan, bagian, nama, no_ktp, no_kk, alamat, jenis_kelamin, tempat_lahir, tgl_lahir, status,pendidikan, no_tlp, email, nama_ibu, sim, no_sim, bpjs_kesehatan, bpjs_tenagakerja, bahasa, pengalaman, keahlian, alasan, provinsi_kerja,kota_kerja,vaksin,sertifikat) VALUES('$pekerjaan', '$bagian', '$nama', '$no_ktp', '$no_kk', '$alamat', '$jenis_kelamin', '$tempat_lahir', '$tgl_lahir', '$status','$pendidikan', '$no_tlp', '$email', '$nama_ibu', '$sim', '$no_sim', '$bpjs_kesehatan', '$bpjs_tenagakerja', '$bahasa', '$pengalaman', '$keahlian', '$alasan', '$provinsi_kerja','$kota_kerja','$vaksin','$nmfoto')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
	if($insert)
	{ // jika query insert berhasil dieksekusi
		echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Pelamar Berhasil Di Kirim. <a href="career.php"><- Kembali</a></div>'; // maka tampilkan 'Data Pelamar Berhasil Di Kirim.'
		header('Location: report.php?ktp='.$no_ktp);
							
	}else
	{ // jika query insert gagal dieksekusi
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Pelamar Gagal Di Kirim!! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data Pelamar Gagal Di Kirim!'
	}		   
?>