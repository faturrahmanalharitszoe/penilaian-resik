<?php 
	include "koneksi.php";
	date_default_timezone_set("Asia/Bangkok");
	$tgl=date("Y-m-d");
?>

<head>
    <script src="jquery.js"></script>

    <script type="text/javascript">
    document.getElementById("divisi").focus();
    </script>

</head>

<?php

    if(empty($aksi))
	{
		$id=$_GET['id'];
		$qubah=mysqli_query($koneksi,"SELECT * FROM karyawan WHERE id='$id'");
		$data2=mysqli_fetch_array($qubah);
		?>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="form-panel" style="width:50%;">
					<h4 class="mb"><span></span>New Karyawan</h4>
					<form action="simpan_karyawan.php" method="post" id="form" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<input type="hidden" name="nomor" class="form-control" size="150px" />
						</div>
						<div class="form-group">
							<label>NIK Karyawan </label>
							<input type="text" name="nik" class="form-control" size="54px" autofocus />
						</div>
						<div class="form-group">
							<label>Nama Karyawan <a style="color:red">*</a></label>
							<input type="text" name="nama" class="form-control" size="54px" style="text-transform:uppercase" autofocus required/>
						</div>
						<div class="form-group">
						    <label>Jabatan <a style="color:red">*</a></label>
						    <select id="jabatan" name="jabatan" class="form-control" required> 
						    <option value=""> Choose </option>  
							 <?php
								 $select=mysqli_query($koneksi,"select jabatan from jabatan order by id");
								 while($row=mysqli_fetch_array($select))
								 {
								 echo "<option>".$row['jabatan']."</option>";
								 }
							 ?>
						  </select>
		                </div>   
		                <div class="form-group">
						    <label>Divisi <a style="color:red">*</a></label>
						    <select id="divisi" name="divisi" class="form-control" required >  
		                    <option value=""> Choose </option>  
			                    <?php
			                    $select=mysqli_query($koneksi,"select * from divisi order by id");
			                    while($row=mysqli_fetch_array($select))
			                    {
			                        //echo "<option>".strtoupper($row['jabatan'])."</option>";
			                        ?>
						            <option value="<?php echo $row['nama_divisi']; ?>">
                                    <?php echo $row['nama_divisi']; ?>
						            </option>
						            <?php
			                    }
			                    ?>
		                    </select>
		                </div> 
		                <div class="form-group">
							<label>Email <a style="color:red">*</a></label>
							<input type="text" name="email" class="form-control" size="54px" autofocus required/>
						</div>
						<button class="btn btn-success"><span class='glyphicon glyphicon-floppy-disk'></span> Simpan </button>
						<a class="btn btn-danger" onclick="window.location.href='index.php?pilih=9.1'"><span class='glyphicon glyphicon-remove'></span> Cancel </a>
					</form>
				</div>
			</div>
		</div>
		<?php
	}
?>