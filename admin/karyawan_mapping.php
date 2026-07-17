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
    include("koneksi.php");
    $user = $_GET['user'];
}	
?>
<?php
require_once "../approval_logic.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mapping Penilaian Karyawan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="line-height:0.5rem;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3"> Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Setting
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded" style="background-color: rgb(255, 255, 255,0.5);">
                        <h6 class="collapse-header">Master:</h6>
						<a class="collapse-item" href="master_cuti.php?user=<?php echo $user;?>">Master Cuti</a>
                        <a class="collapse-item" href="master_form.php?user=<?php echo $user;?>">Form</a>
                        <a class="collapse-item" href="master_aspek.php?user=<?php echo $user;?>">Aspek Penilaian</a>
						<a class="collapse-item" href="master_kategori.php?user=<?php echo $user;?>">Kriteria Penilaian</a>
						<a class="collapse-item" href="rule_penilaian.php?user=<?php echo $user;?>">Rule Penilaian</a>
						<a class="collapse-item" href="rule_approval.php?user=<?php echo $user;?>">Rule Approval</a>
                    </div>
                </div>
            </li>
			
			<!-- Divider -->
            <hr class="sidebar-divider">
			
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="karyawan.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Karyawan</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="divisi.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Divisi</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="jabatan.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jabatan</span></a>
            </li>
			
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="registrasi.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Registrasi</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="penilaian.php?user=<?php echo $user;?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Penilaian</span></a>
            </li>
            
            <!-- Nav Item - Mapping -->
            <li class="nav-item active">
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
            
        </ul>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $user; ?> </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Mapping Karyawan dan Siapa yang Dinilai</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:12px;">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penilai</th>
                                            <th>Jabatan</th>
                                            <th>Divisi</th>
                                            <th>Bisa Menilai Siapa Saja</th>
                                            <th>Mengetahui 1</th>
                                            <th>Mengetahui 2</th>
                                            <th>Penyetuju</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 1;
                                    
                                    // PRELOAD ROLE MAP
                                    $role_map = array();
                                    $q_all_roles = mysqli_query($koneksi, "SELECT id_penilai, id_penilaian FROM role");
                                    while($r = mysqli_fetch_array($q_all_roles)) {
                                        $role_map[$r['id_penilai']][] = $r['id_penilaian'];
                                    }

                                    $q_karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE aktif = 1 ORDER BY nama ASC");
                                    
                                    // PRELOAD ALL ACTIVE SUPERIORS FOR CLOSENESS LOGIC
                                    $all_superiors = array();
                                    $q_all_sup = mysqli_query($koneksi, "SELECT nama, id_jabatan, divisi, divisi2, divisi3, divisi4, divisi5, divisi6, divisi7, divisi8 FROM karyawan WHERE aktif = 1 AND id_jabatan IN (2,3,4,5,6,7,8,9,10)");
                                    while($sup = mysqli_fetch_array($q_all_sup)) {
                                        $all_superiors[] = $sup;
                                    }
                                    

                                    while($row = mysqli_fetch_array($q_karyawan)) {
                                        $id_jabatan = $row['id_jabatan'];
                                        $nama = $row['nama'];
                                        
                                        // Collect ALL divisions for this employee
                                        $divisi_list = array();
                                        for ($i = 1; $i <= 7; $i++) {
                                            $col = ($i == 1) ? 'divisi' : 'divisi' . $i;
                                            if (isset($row[$col]) && $row[$col] != '' && $row[$col] != 'NONE' && $row[$col] != null) {
                                                $divisi_list[] = $row[$col];
                                            }
                                        }
                                        $divisi_list = array_unique($divisi_list);
                                        
                                        // Fetch valid target roles
                                        $target_roles = array();
                                        if (isset($role_map[$id_jabatan])) {
                                            $target_roles = $role_map[$id_jabatan];
                                        }
                                        
                                        $target_names = array();
                                        $m1_names = array();
                                        $m2_names = array();
                                        $s_names = array();
                                        
                                        if(count($target_roles) > 0 && count($divisi_list) > 0) {
                                            $roles_in = implode(",", $target_roles);
                                            $divisi_in = "'" . implode("','", $divisi_list) . "'";
                                            
                                            $like_clauses = "";
                                            if (in_array('OPERASIONAL', $divisi_list)) {
                                                $like_clauses .= " OR divisi LIKE 'OPS - %' OR divisi2 LIKE 'OPS - %' OR divisi3 LIKE 'OPS - %' OR divisi4 LIKE 'OPS - %' OR divisi5 LIKE 'OPS - %' OR divisi6 LIKE 'OPS - %' OR divisi7 LIKE 'OPS - %' OR divisi8 LIKE 'OPS - %'";
                                            }
                                            
                                            // Query to find valid targets based on role and division intersection
                                            // The target must have an id_jabatan in $target_roles 
                                            // AND target must have at least one valid division overlapping with $divisi_list
                                            $q_targets = mysqli_query($koneksi, "
                                                SELECT nama, jabatan, id_jabatan, divisi, divisi2, divisi3, divisi4, divisi5, divisi6, divisi7, divisi8, id_role_approval
                                                FROM karyawan 
                                                WHERE aktif = 1 
                                                AND id_jabatan IN ($roles_in)
                                                AND (
                                                    divisi IN ($divisi_in) OR 
                                                    divisi2 IN ($divisi_in) OR 
                                                    divisi3 IN ($divisi_in) OR 
                                                    divisi4 IN ($divisi_in) OR 
                                                    divisi5 IN ($divisi_in) OR 
                                                    divisi6 IN ($divisi_in) OR 
                                                    divisi7 IN ($divisi_in) OR
                                                    divisi8 IN ($divisi_in)
                                                    $like_clauses
                                                )
                                                ORDER BY nama ASC
                                            ");
                                            
                                            $all_valid_targets = array();
                                            while($t = mysqli_fetch_array($q_targets)) {
                                                // Exclude self if for some reason role allows self evaluation
                                                if($t['nama'] != $nama) {
                                                    $all_valid_targets[] = $t;
                                                }
                                            }
                                            
                                            // Filter targets based on closest superior logic
                                            foreach($all_valid_targets as $t) {
                                                // BYPASS LOGIC: If target has a specific id_role_approval
                                                if (isset($t['id_role_approval']) && $t['id_role_approval'] != 0) {
                                                    if ($t['id_role_approval'] > 0) {
                                                        // Fetch the ENTIRE required role row
                                                        $q_req_role = mysqli_query($koneksi, "SELECT * FROM role_approval WHERE id = '" . $t['id_role_approval'] . "' LIMIT 1");
                                                        if ($req_role = mysqli_fetch_array($q_req_role)) {
                                                            if ($id_jabatan == $req_role['id_penilai']) {
                                                                // Match! This person is the designated evaluator.
                                                                $target_names[] = $t['nama'] . " (" . $t['jabatan'] . ")";
                                                                
                                                                $chain = get_approval_chain($koneksi, $id_jabatan, $t['divisi'], $t['id_role_approval'], $t['divisi']);
                                                                $m1_names[] = $chain['m1'];
                                                                $m2_names[] = $chain['m2'];
                                                                $s_names[] = $chain['setuju'];
                                                            }
                                                        }
                                                    }
                                                    continue; // Skip the rest of the logic for this target
                                                }
                                                
                                                $is_direct = true;
                                                foreach($all_superiors as $m) {
                                                    if ($m['nama'] == $nama) continue; // skip self
                                                    
                                                    // Check if M can evaluate T
                                                    if (isset($role_map[$m['id_jabatan']]) && in_array($t['id_jabatan'], $role_map[$m['id_jabatan']])) {
                                                        // Get clean divisions for M
                                                        $m_divs = array($m['divisi'], $m['divisi2'], $m['divisi3'], $m['divisi4'], $m['divisi5'], $m['divisi6'], $m['divisi7'], $m['divisi8']);
                                                        $m_divs_clean = array_filter($m_divs, function($v) { return $v != '' && $v != 'NONE' && $v != null; });
                                                        
                                                        $t_divs = array($t['divisi'], $t['divisi2'], $t['divisi3'], $t['divisi4'], $t['divisi5'], $t['divisi6'], $t['divisi7'], $t['divisi8']);
                                                        
                                                        // Does M match T?
                                                        $m_exact = (count(array_intersect($m_divs_clean, $t_divs)) > 0);
                                                        
                                                        $m_prefix = false;
                                                        if (!$m_exact) {
                                                            foreach($m_divs_clean as $md) {
                                                                if ($md == 'OPERASIONAL') { foreach($t_divs as $td) { if (strpos($td, 'OPS - ') === 0) { $m_prefix = true; break; } } }
                                                                if ($m_prefix) break;
                                                            }
                                                        }
                                                        
                                                        if ($m_exact || $m_prefix) {
                                                            // M matches T. Now compare closeness!
                                                            $eval_exact = (count(array_intersect($divisi_list, $t_divs)) > 0);
                                                            
                                                            $eval_closeness = ($eval_exact ? 1000 : 0) + $id_jabatan;
                                                            $m_closeness = ($m_exact ? 1000 : 0) + $m['id_jabatan'];
                                                            
                                                            // If M is strictly closer to the target than the current evaluator
                                                            if ($m_closeness > $eval_closeness) {
                                                                $is_direct = false;
                                                                break;
                                                            }
                                                        }
                                                    }
                                                }
                                                
                                                if ($is_direct) {
                                                    $target_names[] = $t['nama'] . " (" . $t['jabatan'] . ")";
                                                    $chain = get_approval_chain($koneksi, $id_jabatan, $t['divisi']);
                                                    $m1_names[] = $chain['m1'];
                                                    $m2_names[] = $chain['m2'];
                                                    $s_names[] = $chain['setuju'];
                                                }
                                            }
                                        }
                                        if(count($target_names) > 0) {
                                        ?>
                                        <tr>
                                            <td><center><?php echo $count; ?></center></td>
                                            <td><strong><?php echo $row['nama']; ?></strong></td>
                                            <td><?php echo $row['jabatan']; ?></td>
                                            <td>
                                                <?php 
                                                    echo implode(", ", $divisi_list);
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo "<ul style='margin-bottom:0; padding-left:15px;'>";
                                                    foreach($target_names as $tn) {
                                                        echo "<li>" . $tn . "</li>";
                                                    }
                                                    echo "</ul>";
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo "<ul style='margin-bottom:0; padding-left:15px;'>";
                                                    foreach($m1_names as $tn) echo "<li>" . $tn . "</li>";
                                                    echo "</ul>";
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo "<ul style='margin-bottom:0; padding-left:15px;'>";
                                                    foreach($m2_names as $tn) echo "<li>" . $tn . "</li>";
                                                    echo "</ul>";
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo "<ul style='margin-bottom:0; padding-left:15px;'>";
                                                    foreach($s_names as $tn) echo "<li>" . $tn . "</li>";
                                                    echo "</ul>";
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                         <span>Copyright &copy; PT Resik Cemerlang 2021</span>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            var exportFormatter = function (data, row, column, node) {
                // If the cell contains an HTML list
                if (typeof data === 'string' && data.indexOf('<li>') !== -1) {
                    // Remove <ul> tags
                    var text = data.replace(/<ul[^>]*>/gi, '').replace(/<\/ul>/gi, '');
                    // Replace <li> with a bullet point and </li> with a newline
                    text = text.replace(/<li>/gi, '• ').replace(/<\/li>/gi, '\n');
                    // Remove any other lingering HTML tags just in case
                    text = text.replace(/<[^>]*>?/gm, '');
                    return text.trim();
                }
                // Default: strip HTML tags
                if (typeof data === 'string') {
                    return data.replace(/<[^>]*>?/gm, '').trim();
                }
                return data;
            };

            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            format: {
                                body: exportFormatter
                            }
                        },
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            // Kolom E, F, G, H. Beri style 55 (wrapText bawaan DataTables) agar newline bekerja di Excel.
                            $('row c[r^="E"]', sheet).attr('s', '55');
                            $('row c[r^="F"]', sheet).attr('s', '55');
                            $('row c[r^="G"]', sheet).attr('s', '55');
                            $('row c[r^="H"]', sheet).attr('s', '55');
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            format: {
                                body: exportFormatter
                            }
                        }
                    }
                ]
            });
        });
    </script>

</body>
</html>
