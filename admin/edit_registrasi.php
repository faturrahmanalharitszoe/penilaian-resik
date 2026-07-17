<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
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
    <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
<?php 
session_start();
if(empty($_GET['user']))
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
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="line-height:0.5rem;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3"><img src="img/logo.png" alt="logo"></div>
            </a>

            <!-- Divider -->
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

                    <!-- Page Heading -->
                    <!--<h1 class="h3 mb-2 text-gray-800">Karyawan</h1>-->

                    <!-- Data Karyawan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">New Karyawan
							 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            
					<form action="perubahan_registrasi.php" method="post" id="form" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<input type="hidden" name="nomor" class="form-control" size="150px" />
						</div>
						<?php
						$id=$_GET['id'];
						$user=$_GET['user'];
						$query=mysqli_query($koneksi,"select * from daftar_penilaian where id = '$id'");
						$data=mysqli_fetch_array($query);
						?>
						<div class="form-group">
							<input type="hidden" name="id" class="form-control" size="54px" width="10px;" value="<?php echo $id;?>" readonly />
							<input type="hidden" name="user" class="form-control" size="54px" width="10px;" value="<?php echo $user;?>" readonly />
						</div>
						<div class="form-group">
							<label> Nama Karyawan <a style="color:red">*</a></label>
							<input type="text" name="nama" class="form-control" size="54px" value="<?php echo $data['nama'];?>" required/>
						</div>
		                <div class="form-group">
							<label> Email <a style="color:red">*</a></label>
							<input type="text" name="email" class="form-control" size="54px" value="<?php echo $data['email'];?>"/>
						</div>
                        <div class="form-group">
							<label> Aktif <a style="color:red">*</a></label>
                            <?php
                                if ($data['aktif'] == '1')
                                {
                                    ?>
                                       <input type="checkbox" checked name="aktif" value="0" class="form-control" size="14px" width="10px;" style="width:25px" />
                                    <?php
                                }
                                else
                                if ($data['aktif'] == '0')
                                {
                                    ?>
                                        <input type="checkbox" name="aktif" value="1" class="form-control" size="14px" width="10px;" style="width:25px" />
                                    <?php
                                }
                            ?>

						</div>
						<button class="btn btn-success"><span class='glyphicon glyphicon-floppy-disk'></span> Simpan </button>
						<a class="btn btn-danger" onclick="window.location.href='karyawan.php?nama=<?php echo $nama;?>'"><span class='glyphicon glyphicon-remove'></span> Cancel </a>
					</form>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>