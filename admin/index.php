<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<?php 
session_start();
if(empty($_SESSION['user']))
{		
	?>
	<script>
    alert("Anda Harus Login Dahulu"); 
    window.location="login.html"; 
    </script>
    <?php
}
else
{
    include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
    date_default_timezone_set("Asia/Bangkok");
    $tgl = date("Y-m-d H:i:s");
    if(isset($_GET['user']))
    {
        $user=$_GET['user'];   // nama penilai 
    }
    if(isset($_GET['email']))
    {
        $email=$_GET['email'];   // email penilai	
    }
}	
 ?>
<script>
  function preventBack(){history.forward();}
  setTimeout("preventBack()",0);
  window.onunload=function(){null};
</script> 
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="line-height:0.5rem;">

			<!-- Logo Perusahaan -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3"><img src="img/logo.png" alt="logo"></div>
            </a>

            <!-- Garis Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Menu Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Garis Divider -->
            <hr class="sidebar-divider">

            <!-- Header Menu Setting -->
            <div class="sidebar-heading">
                Setting
            </div>

            <!-- Menu Master -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded" style="background-color: rgb(255, 255, 255,0.5);">
                        <h6 class="collapse-header">Master:</h6>
						<a class="collapse-item" href="master_cuti.php?user=<?php echo $user;?>">Cuti</a>
                        <a class="collapse-item" href="master_form.php?user=<?php echo $user;?>">Form</a>
                        <a class="collapse-item" href="master_aspek.php?user=<?php echo $user;?>">Aspek Penilaian</a>
						<a class="collapse-item" href="master_kategori.php?user=<?php echo $user;?>">Kriteria Penilaian</a>
						<a class="collapse-item" href="rule_penilaian.php?user=<?php echo $user;?>">Rule Penilaian</a>
						<a class="collapse-item" href="rule_approval.php?user=<?php echo $user;?>">Rule Approval</a>
						<a class="collapse-item" href="master_user.php?user=<?php echo $user;?>">User Akses</a>
						<a class="collapse-item" href="master_bobot.php?user=<?php echo $user;?>">Bobot Penilaian</a>
                    </div>
                </div>
            </li>
			
			<!-- Garis Divider -->
            <hr class="sidebar-divider">
			
            <!-- Menu Karyawan -->
            <li class="nav-item">
                <a class="nav-link" href="karyawan.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Karyawan</span></a>
            </li>
			
			<!-- Menu Divisi -->
			<li class="nav-item">
                <a class="nav-link" href="divisi.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Divisi</span></a>
            </li>
			
			<!-- Menu Jabatan -->
			<li class="nav-item">
                <a class="nav-link" href="jabatan.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jabatan</span></a>
            </li>
			
            <!-- Garis Divider -->
            <hr class="sidebar-divider">

            <!-- Header Menu Data -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Menu Registrasi -->
            <li class="nav-item">
                <a class="nav-link" href="registrasi.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Registrasi</span></a>
            </li>

            <!-- Menu Penilaian -->
            <li class="nav-item">
                <a class="nav-link" href="penilaian.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Penilaian</span></a>
            </li>
			
			            <!-- Nav Item - Mapping -->
            <li class="nav-item">
                <a class="nav-link" href="karyawan_mapping.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Mapping Penilaian</span></a>
            </li>
            
            <!-- Menu Cuti -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCuti"
                    aria-expanded="true" aria-controls="collapseCuti">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Cuti</span>
                </a>
                <div id="collapseCuti" class="collapse" aria-labelledby="headingCuti" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded" style="background-color: rgb(255, 255, 255,0.5);">
                        <h6 class="collapse-header">Cuti :</h6>
						<a class="collapse-item" href="new_cuti.php?user=<?php echo $user;?>">Pengajuan Cuti</a>
                        <a class="collapse-item" href="cuti.php?user=<?php echo $user;?>">Data Cuti</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $user; ?> </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">
						<?php
						$qdivisi=mysqli_query($koneksi,"select * from divisi where nama_divisi <> 'DIREKSI' and nama_divisi <> 'JAWA BARAT' and nama_divisi <> 'JAWA TENGAH' and nama_divisi <> 'JAWA TIMUR' and nama_divisi <> 'SUMATERA 1' and nama_divisi <> 'SUMATERA 2' and nama_divisi <> 'SOELAMPUA' and nama_divisi <> 'KALIMANTAN' and nama_divisi <> 'BALI'");
						$ttl_divisi=mysqli_num_rows($qdivisi);
						?> 
                        <!-- Divisi Card  -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Divisi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ttl_divisi;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cubes fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
						$qemployee=mysqli_query($koneksi,"select * from karyawan where divisi <> 'DIREKSI' and jabatan <> 'ADMIN' and jabatan <> 'KEPALA CABANG'");
						$ttl_employee=mysqli_num_rows($qemployee);
						?>
                        <!-- Total Employee Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Employee</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ttl_employee;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

						<?php
						$qdirektur=mysqli_query($koneksi,"select * from karyawan where jabatan = 'DIREKTUR'");
						$ttl_direktur=mysqli_num_rows($qdirektur);
						?>
                        <!-- Direktur Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Direktur</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ttl_direktur;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

						<?php
						$qsm=mysqli_query($koneksi,"select * from karyawan where jabatan = 'SENIOR MANAGER'");
						$ttl_sm=mysqli_num_rows($qsm);
						?>
                        <!-- Senior Manager Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Senior Manager</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ttl_sm;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>	
					
					<div class="row">
					
						 <?php
						 $qmanager=mysqli_query($koneksi,"select * from karyawan where jabatan = 'MANAGER'");
						 $ttl_manager=mysqli_num_rows($qmanager);
						 ?>
					     <!-- Manager Card -->
						 <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Manager</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ttl_manager;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<?php
						$qam=mysqli_query($koneksi,"select * from karyawan where jabatan = 'ASISTEN MANAGER'");
						$ttl_am=mysqli_num_rows($qam);
						?>
						<!-- Asisten Manager Card -->
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Asisten Manager</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ttl_am;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<?php
						$qkabag=mysqli_query($koneksi,"select * from karyawan where jabatan = 'KEPALA BAGIAN'");
						$ttl_kabag=mysqli_num_rows($qkabag);
						?>
						<!-- Kabag Card -->
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Kabag / Kasie</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ttl_kabag;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<?php
						$qstaff=mysqli_query($koneksi,"select * from karyawan where jabatan = 'STAFF'");
						$ttl_staff=mysqli_num_rows($qstaff);
						?>
						<!-- Staff Card -->
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Staff</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ttl_staff;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>	

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart Bar -->
                        <!--<div class="col-xl-8 col-lg-7" style="flex: 0 0 50%;">-->
						<div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-3" style="margin-bottom:1rem;">
                                <!-- Card Header - Dropdown -->
                                <div
								    <?php
									$month = date('m');
									$year = date('Y');
									if($month == 1)
									{
        							    $periode = 'Jul - Des '.($year - 1);
									}
									else if($month <= 7)
									{
        							    $periode = 'Jan - Jun '.$year;
									}
									else
									{
 	 								 	$periode = 'Jul - Des '.$year;
									}
									?>
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Nilai Rata-rata Hasil Penilaian Periode : <?php echo $periode;?></h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        </a>
                                    </div>
                                </div>
								<!-- Bar Graphics -->
								
								<div id="container" style="width: 90%;">
 								   <canvas id="canvas"></canvas>
 								</div>                               
                            </div>
						</div>	
						
						<!-- Area Chart Pie -->
						<!--<div class="col-xl-8 col-lg-7" style="flex: 0 0 50%;">-->
						<div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-3" style="margin-bottom:1rem;">
                                <!-- Card Header - Dropdown -->
                                <div
								    <?php
									$month = date('m');
$year = date('Y');
if($month == 1) {
    $periode = 'Jul - Des '.($year - 1);
} else if($month <= 7) {
    $periode = 'Jan - Jun '.$year;
} else {
    $periode = 'Jul - Des '.$year;
}
									
									?>
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Karyawan</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        </a>
                                    </div>
                                </div>
								<!-- Bar Graphics -->
								
								<div id="container" style="width: 90%;">
 								   <canvas id="canvas2"></canvas>
 								</div>                               
                            </div>
						</div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PT Resik Cemerlang 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Mau Logout ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
   <script>
		var ctx = document.getElementById("canvas").getContext('2d');
		var myAreaChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["MARKETING", "OPERASIONAL", "KEUANGAN/ACC","GA/IT", "SDM/LEGAL"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$qmarketing = mysqli_query($koneksi,"select avg(rata_akhir) as avg_marketing from penilaian where divisi='MARKETING'");
					$data_marketing = mysqli_fetch_array($qmarketing);
					echo $data_marketing['avg_marketing'] ? round($data_marketing['avg_marketing'],2) : 0;
					?>, 
					<?php 
					$qops = mysqli_query($koneksi,"select avg(rata_akhir) as avg_ops from penilaian where divisi='OPERASIONAL'");
					$data_ops = mysqli_fetch_array($qops);
					echo $data_ops['avg_ops'] ? round($data_ops['avg_ops'],2) : 0;
					?>, 
					<?php 
					$qfinance = mysqli_query($koneksi,"select avg(rata_akhir) as avg_finance from penilaian where (divisi='KEUANGAN' or divisi = 'ACCOUNTING')");
					$data_finance = mysqli_fetch_array($qfinance);
					echo $data_finance['avg_finance'] ? round($data_finance['avg_finance'],2) : 0;
					?>, 
					<?php 
					$qga = mysqli_query($koneksi,"select avg(rata_akhir) as avg_ga from penilaian where (divisi='GA' or divisi='IT')");
					$data_ga = mysqli_fetch_array($qga);
					echo $data_ga['avg_ga'] ? round($data_ga['avg_ga'],2) : 0;
					?>,
					<?php
					$qsdm = mysqli_query($koneksi,"select avg(rata_akhir) as avg_sdm from penilaian where (divisi='SDM' or divisi='LEGAL')");
					$data_sdm = mysqli_fetch_array($qsdm);
					echo $data_sdm['avg_sdm'] ? round($data_sdm['avg_sdm'],2) : 0;
					?>
					],
					backgroundColor: [
					'rgba(255, 0, 0, 0.5)',
					'rgba(255, 102, 102, 0.5)',
					'rgba(252, 165, 3, 0.5)',
					'rgba(255, 255, 0, 0.5)',
					'rgba(27, 128, 1, 0.5)',
					'rgba(0, 204, 0, 0.5)',
					'rgba(0, 0, 255, 0.5)'
					],
					borderColor: [
					'rgba(255,0,0,1)',
					'rgba(255,102,102,1)',
					'rgba(252, 165, 3, 1)',
					'rgba(255, 255, 0, 1)',
					'rgba(27, 128, 1, 1)',
					'rgba(0, 204, 0, 1)',
					'rgba(0, 0, 255, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {legend: {display: false},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
		
		var ctx = document.getElementById("canvas2").getContext('2d');
		var myAreaChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ["Marketing", "Operasional", "GA/IT", "SDM/Legal", "Keuangan"],
				datasets: [{
					label: ["Marketing", "Operasional", "GA/IT", "SDM/Legal", "Keuangan"],
					data: [
					<?php 
					//
					$query_marketing=mysqli_query($koneksi,"select * from karyawan where divisi ='MARKETING' and aktif = 1");
					$jum_marketing=mysqli_num_rows($query_marketing);
					echo $jum_marketing;	
					?>, 
					<?php 
					$query_ops=mysqli_query($koneksi,"select * from karyawan where divisi ='OPERASIONAL' and aktif = 1");
					$jum_ops=mysqli_num_rows($query_ops);
					echo $jum_ops;
					?>, 
					<?php 
					$query_sdm=mysqli_query($koneksi,"select * from karyawan where (divisi ='GA' or divisi = 'IT') and aktif = 1");
					$jum_sdm=mysqli_num_rows($query_sdm);
					echo $jum_sdm;
					?>, 
					<?php 
					$query_finance=mysqli_query($koneksi,"select * from karyawan where (divisi ='SDM' or divisi = 'LEGAL') and aktif = 1");
					$jum_finance=mysqli_num_rows($query_finance);
					echo $jum_finance;
					?>, 
					<?php 
					$query_legal=mysqli_query($koneksi,"select * from karyawan where (divisi ='KEUANGAN' or divisi = 'ACCOUNTING') and aktif = 1");
					$jum_legal=mysqli_num_rows($query_legal);
					echo $jum_legal;
					?>
					],
					backgroundColor: [
					'rgba(255, 0, 0, 0.5)',
					'rgba(252, 165, 3, 0.5)',
					'rgba(255, 255, 0, 0.5)',
					'rgba(27, 128, 1, 0.5)',
					'rgba(0, 0, 255, 0.5)',
					'rgba(128, 0, 128, 0.5)'
					],
					borderColor: [
					'rgba(255,0,0,1)',
					'rgba(252, 165, 3, 1)',
					'rgba(255, 255, 0, 1)',
					'rgba(27, 128, 1, 1)',
					'rgba(0, 0, 255, 1)',
					'rgba(128, 0, 128, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {legend: {display: true},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
	
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!--<script src="vendor/chart.js/Chart.min.js"></script>
	<script src="vendor/chart.js/Chart.js"></script>-->

    <!-- Page level custom scripts -->
    <!--<script src="js/demo/chart-area-demo.js"></script>
    <!--<script src="js/demo/chart-pie-demo.js"></script>-->

</body>

</html>