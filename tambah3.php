<?php 
include("header.html"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database

?>
<style>
  body {
    background: url('img/background1.jpg') no-repeat center center;
    top:0;
    left:0;
    min-width:100%;
    min-height:100%;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
   background-size: cover; 
</style>
	<div class="container">
		<div class="content">
		<br><br><br><br>
			<h2 style="text-align:center"><b>Form Data Calon Pelamar Kerja</b></h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 164 ditekan
				$pekerjaan		    = $_POST['pekerjaan'];
				$bagian			    = $_POST['bagian'];
				$nama		    	= $_POST['nama'];
				$no_ktp   			= $_POST['no_ktp'];
				$no_kk	 			= $_POST['no_kk'];
				$alamat	 			= $_POST['alamat'];
				$jenis_kelamin      = $_POST['jenis_kelamin'];
				$tempat_lahir 		= $_POST['tempat_lahir'];
				$tgl_lahir		 	= $_POST['tgl_lahir'];
				$status  		 	= $_POST['status'];
				$pendidikan 		= $_POST['pendidikan'];
				$no_tlp	     		= $_POST['no_tlp'];
				$email	     		= $_POST['email'];
				$nama_ibu		 	= $_POST['nama_ibu'];
				$sim		 		= $_POST['sim'];
				$no_sim		 		= $_POST['no_sim'];
				$bpjs_kesehatan		= $_POST['bpjs_kesehatan'];
				$bpjs_tenagakerja	= $_POST['bpjs_tenagakerja'];
				$bahasa		 		= $_POST['bahasa'];
				$pengalaman		 	= $_POST['pengalaman'];
				$keahlian	        = $_POST['keahlian'];
				$alasan          	= $_POST['alasan'];
				$lokasi_kerja       = $_POST['lokasi_kerja'];
							
						$insert = mysqli_query($koneksi, "INSERT INTO datapelamar(pekerjaan, bagian, nama, no_ktp, no_kk, alamat, jenis_kelamin, tempat_lahir, tgl_lahir, status,pendidikan, no_tlp, email, nama_ibu, sim, no_sim, bpjs_kesehatan, bpjs_tenagakerja, bahasa, pengalaman, keahlian, alasan, lokasi_kerja) VALUES('$pekerjaan', '$bagian', '$nama', '$no_ktp', '$no_kk', '$alamat', '$jenis_kelamin', '$tempat_lahir', '$tgl_lahir', '$status','$pendidikan', '$no_tlp', '$email', '$nama_ibu', '$sim', '$no_sim', '$bpjs_kesehatan', '$bpjs_tenagakerja', '$bahasa', '$pengalaman', '$keahlian', '$alasan', '$lokasi_kerja')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Pelamar Berhasil Di Kirim. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data Pelamar Berhasil Di Kirim.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Pelamar Gagal Di Kirim!! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data Pelamar Gagal Di Kirim!'
						}				
			}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Pekerjaan yang diinginkan*</label>
					<div class="col-sm-4">
					
					
					<?php
//        koneksi ke database
        mysql_connect('localhost', 'root', '');
        mysql_select_db('datamahasiswa');
        ?>
        <form method="post">
		
		
						<select id="pekerjaan" class="form-control" name="pekerjaan">
                <option value=" " >Pilih Pekerjaan</option>
				
                <?php
                $query = mysql_query("SELECT * FROM pekerjaan ORDER BY nama_pekerjaan");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['id_pekerjaan']; ?>">
                        <?php echo $row['nama_pekerjaan']; ?>
						
                    </option>
                <?php
                }
				 
                ?>
				
            </select>
			<br>
            
            <!--kota-->
            <select id="bagian" class="form-control" name="bagian">
                <option value=""> Pilih Bagian </option>
                <?php
                $query = mysql_query("SELECT
                                    *
                                  FROM
                                    bagian
                                    INNER JOIN pekerjaan ON bagian.id_bagian_fk = pekerjaan.id_pekerjaan ORDER BY nama_bagian");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option id="kota" class="<?php echo $row['id_pekerjaan']; ?>" value="<?php echo $row['id_bagian']; ?>">
                        <?php echo $row['nama_bagian']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
			
			
		
			
					</div>
				</div>
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Nama sesui E-KTP*</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">No. E-KTP*</label>
					<div class="col-sm-4">
						<input type="text" name="no_ktp" class="form-control" placeholder="E-KTP" required>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">No. E-KK*</label>
					<div class="col-sm-4">
						<input type="text" name="no_kk" class="form-control" placeholder="E-KK" required>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Alamat sesuai E-KTP*</label>
					<div class="col-sm-4">
						<textarea name="alamat" class="form-control" placeholder="alamat"></textarea>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Jenis Kelamin*</label>
					<div class="col-sm-4">
						<select name="jenis_kelamin" class="form-control" required>
							<option value=""> Pilih Jenis Kelamin </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Tempat & Tanggal Lahir*</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label"> </label>
					<div class="col-sm-4">
						<!--<input type="text" name="tgl_lahir" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>-->
						<input data-provide="datepicker" name="tgl_lahir" data-date-format="yyyy-mm-dd" placeholder="Select date" required>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Status*</label>
					<div class="col-sm-4">
						<select name="status" class="form-control" required>
							<option value=""> Status </option>
							<option value="Menikah">Menikah</option>
							<option value="Lajang">Lajang</option>
							<option value="Duda">Duda</option>
							<option value="Janda">Janda</option>
						</select>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Pendidikan Terakhir*</label>
					<div class="col-sm-4">
						<select name="pendidikan" class="form-control" required>
							<option value=""> Pendidikan </option>
							<option value="SD">SD</option>
							<option value="SMP">SMP</option>
							<option value="SMA/SMK">SMA/SMK</option>
							<option value="S1">S1</option>
							<option value="S2">S2</option>
							<option value="S3">S3</option>
							<option value="Lain-Lain">Lain-Lain</option>
						</select>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">No. Telp/HP*</label>
					<div class="col-sm-4">
						<input type="text" name="no_tlp" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Email*</label>
					<div class="col-sm-4">
						<input type="text" name="email" class="form-control" placeholder="Email" required>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Nama Ibu Kandung*</label>
					<div class="col-sm-4">
						<input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu Kandung" required>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Surat Izin Mengemudi (jika ada)</label>
					<div class="col-sm-4">
						<select name="sim" class="form-control" required>
							<option value=""> Pilih Jenis Sim </option>
							<option value="SIM A">SIM A</option>
							<option value="SIM C">SIM C</option>
						</select>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-4">
						<input type="text" name="no_sim" class="form-control" placeholder="No. SIM" required>
					</div>
				</div>
	
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Jenis BPJS Kesehatan*</label>
					<div class="col-sm-4">
						<select name="bpjs_kesehatan" class="form-control" required>
							<option value="">Bpjs Kesehatan</option>
							<option value="Pbi Apbn/Kjs">Pbi Apbn/Kjs</option>
							<option value="Pbi Apbd">Pbi Apbd</option>
							<option value="Mandiri">Mandiri</option>
							<option value="Badan USaha">Badan USaha</option>
							<option value="Tidak Punya">Tidak Punya</option>
						</select>
					</div>
				</div>
	
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Kepesertaan BPJS Ketenagakerjaan*</label>
					<div class="col-sm-4">
						<select name="bpjs_tenagakerja" class="form-control" required>
							<option value=""> Bpjs Ketenagakerjaan </option>
							<option value="Ada">Ada</option>
							<option value="Tidak Ada">Tidak Ada</option>
						</select>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Bahasa yang dikuasai</label>
					<div class="col-sm-4">
						<input type="text" name="bahasa" class="form-control" placeholder="Bahasa" required>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Pengalaman kerja sebelumnya</label>
					<div class="col-sm-4">
						<input type="text" name="pengalaman" class="form-control" placeholder="Pengalaman Kerja" required>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Keahlian Khusus</label>
					<div class="col-sm-4">
						<input type="text" name="keahlian" class="form-control" placeholder="Keahlian" required>
					</div>
				</div>
	
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Alasan bekerja di PT. Resik Cemerlang</label>
					<div class="col-sm-4">
						<textarea name="alasan" class="form-control" placeholder="Alasan"></textarea>
					</div>
				</div>
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">Bersedia di tempatkan di :</label>
					<div class="col-sm-4">
					
					
					<?php
//        koneksi ke database
        mysql_connect('localhost', 'root', '');
        mysql_select_db('datamahasiswa');
        ?>
        <form method="post">
		
		
						<select id="provinsi" class="form-control" name="lokasi_kerja">
                <option value=" " > Pilih Provinsi </option>
                <?php
                $query = mysql_query("SELECT * FROM provinces ORDER BY nama_provinsi");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['id_provinsi']; ?>">
                        <?php echo $row['nama_provinsi']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
			<br>
            
            <!--kota-->
            <select id="regencies" class="form-control" name="regencies">
                <option value=""> Pilih Kota </option>
                <?php
                $query = mysql_query("SELECT
                                    *
                                  FROM
                                    regencies
                                    INNER JOIN provinces ON regencies.id_provinsi_fk = provinces.id_provinsi ORDER BY nama_kota");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option id="regencies" class="<?php echo $row['id_provinsi']; ?>" value="<?php echo $row['id_kota']; ?>">
                        <?php echo $row['nama_kota']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
			
			</div>
				</div>
				
							
				
				<div class="form-group" style="margin-left:200px;margin-right:-250px">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Send" data-toggle="tooltip" title="Send CV">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.html"); // memanggil file footer.php
include ("script2.php");
?>