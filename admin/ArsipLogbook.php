<?php
    include  '../koneksi.php';
    session_start();
    // Periksa apakah sesi login pengguna tidak ada
    if (!isset($_SESSION['admin'])) {
        // Redirect pengguna ke halaman login
        header("Location: ../index.php");
        exit; // Pastikan untuk keluar dari skrip setelah melakukan redirect
    } else{
        $admin=$_SESSION['admin'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/LOGO KEMENAG.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            KEMENTERIAN AGAMA KOTA SURABAYA
        </title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />

        <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/paper-dashboard.min.css?v=2.1.1" rel="stylesheet" />
        <!--  Plugin for Sweet Alert -->
        <script src="../assets/js/plugins/sweetalert2.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
        <link href="../assets/demo/demo.css" rel="stylesheet" />
    </head>

    <body class="">
        <div class="wrapper ">
            <!-- SIDEBAR -->
            <div class="sidebar" data-color="white" data-active-color="danger">
                <div class="sidebar-wrapper">
                    <div class="user">
                        <div class="photo">
                            <img src="../assets/img/LOGO KEMENAG.png" alt="Logo">
                        </div>
                        <div class="info" style="font-weight: bold;">
                        <a class="simple-text logo-normal">
                            <span>
                                KEMENTERIAN AGAMA
                            </span>
                        </a>
                        </div>
                    </div>
                    <ul class="nav">
                        <li>
                        <a href="./Dashboard.php">
                            <i class="bi bi-house-fill"></i>
                            <p>Dashboard</p>
                        </a>
                        </li>
                        <li>
                        <a href="./DataMagang.php">
                            <i class="bi bi-people-fill"></i>
                            <p>Data Magang</p>
                        </a>
                        </li>
                        <li>
                            <a href="./KuotaMagang.php">
                                <i class="bi bi-collection-fill"></i>
                                <p>Kuota Magang</p>
                            </a>
                        </li>
                        <li>
                            <a href="./DaftarSekolahPT.php">
                                <i class="bi bi-buildings-fill"></i>
                                <p>Sekolah dan PT</p>
                            </a>
                        </li>
                        <li>
                            <a href="./ArsipPresensi.php">
                                <i class="bi bi-person-bounding-box"></i>
                                <p>Rekapitulasi Presensi</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="./ArsipLogbook.php">
                                <i class="bi bi-journal-bookmark-fill"></i>
                                <p>Arsip Logbook</p>
                            </a>
                        </li>
                        <li >
                            <a href="./Arsip.php">
                                <i class="bi bi-archive-fill"></i>
                                <p>Arsip Data</p>
                            </a>
                        </li>
                        <li class="nav-item-door">
                            <a href="../index.php">
                                <i class="bi bi-door-open-fill"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END SIDEBAR -->

            <div class="main-panel" style="height: 100%; overflow-y: auto;">    
                <!-- NAVBAR -->
                <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-minimize">
                                <button id="minimizeSidebar" class="btn btn-icon btn-round">
                                    <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                                    <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
                                </button>
                            </div>
                            <div class="navbar-toggle">
                                <button type="button" class="navbar-toggler">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </button>
                            </div>
                            
                            <a class="navbar-brand" href="javascript:;">SISTEM INFORMASI MANAJEMEN MAGANG</a>
                        
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                            </button>
                        </div>
                                
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="navbar-nav">
                                <li class="nav-item btn-rotate dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <p>
                                            <span class="d-lg-none d-md-block">Sidebar</span>
                                        </p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="./Dashboard.php">
                                            <i class="bi bi-house-fill"></i>
                                            <p>Dashboard</p>
                                        </a>
                                        <a class="dropdown-item" href="./DataMagang.php">
                                            <i class="bi bi-people-fill"></i>
                                            <p>Data Magang</p>
                                        </a>
                                        <a class="dropdown-item" href="./KuotaMagang.php">
                                            <i class="bi bi-collection-fill"></i>
                                            <p>Kuota Magang</p>
                                        </a>
                                        <a class="dropdown-item" href="./DaftarSekolahPT.php">
                                            <i class="bi bi-buildings-fill"></i>
                                            <p>Sekolah dan PT</p>
                                        </a>
                                        <a class="dropdown-item" href="./ArsipPresensi.php">
                                            <i class="bi bi-person-bounding-box"></i>
                                            <p>Rekapitulasi Presensi</p>
                                        </a>
                                        <a class="dropdown-item" href="./ArsipLogbook.php">
                                            <i class="bi bi-journal-bookmark-fill"></i>
                                            <p>Logbook Magang</p>
                                        </a>
                                        <a class="dropdown-item" href="./Arsip.php">
                                            <i class="bi bi-archive-fill"></i>
                                            <p>Arsip Data</p>
                                        </a>
                                        <a class="dropdown-item" href="../index.php">
                                            <i class="bi bi-door-open-fill"></i>
                                            <p>Logout</p>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- END NAVBAR -->
                
                <div class="content">
                    <h2 style="text-align: center;">
                        <a href="./ArsipLogbook.php" style="text-decoration: none; color: black;">LOGBOOK MAGANG</a>
                    </h2>

                    <div class="row">
                        <div class="d-flex justify-conten col-lg-8 col-md-8 col-sm-8">
                            <!-- Button trigger modal -->
                            <div>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#filter">
                                    Filter
                                </button>
                            </div>
                            <!-- Cetak Laporan Arsip Logbook -->
                            <div>
                                <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#exportLogbook">
                                    Export
                                </button>
                            </div>
                        </div>

                        <!-- POP UP EXPORT LOGBOOK -->
                        <div class="modal fade" id="exportLogbook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title fs-5" id="exportLogbookLabel">Export Logbook</h5>
                                    </div>
                                    <form method="POST" action="ArsipLogbook-export.php">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nis" class="form-label">NIS Peserta Magang</label>
                                                <input type="text" name="nis" class="form-control" id="nis" placeholder="NIS Peserta Magang" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <input type="submit" class="btn btn-primary" name="exportLogbook" value="Export">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end pop up -->

                        <!-- POP UP FILTER LOGBOOK -->
                        <div class="modal fade" id="filter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title fs-5" id="filterLabel">Filter Logbook</h5>
                                    </div>
                                    <form method="POST" action="ArsipLogbook.php">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nis" class="form-label">NIS Peserta Magang</label>
                                                <input type="text" name="nis" class="form-control" id="nis" placeholder="NIS Peserta Magang" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" name="filterLogbook">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end pop up -->

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                            if (isset($_POST['filterLogbook'])) {
                                                // Mengambil nilai dari form
                                                $nis = $_POST['nis'];
                                                
                                                // Filter query
                                                $query = "SELECT a.ID_LOGBOOK, a.TANGGAL, a.KEGIATAN, b.NIS, b.NAMA_MAHASISWA, c.NAMA_LOKASI,d.NAMA_SEKOLAH_PT
                                                            FROM `tb_logbook` a 
                                                            JOIN `tb_mahasiswa` b ON a.ID_MAHASISWA = b.ID_MAHASISWA
                                                            JOIN `tb_lokasi_penempatan` c ON b.ID_LOKASI = c.ID_LOKASI
                                                            JOIN `tb_sekolah_pt` d ON b.ID_SEKOLAH_PT = d.ID_SEKOLAH_PT
                                                            WHERE b.NIS = '$nis'";
                                                
                                                // Execute query and fetch data
                                                $view = $dbh->query($query);
                                            } else{
                                                // Default query
                                                $query = "SELECT a.ID_LOGBOOK, a.TANGGAL, a.KEGIATAN, b.NIS, b.NAMA_MAHASISWA, c.NAMA_LOKASI,d.NAMA_SEKOLAH_PT
                                                            FROM `tb_logbook` a 
                                                            JOIN `tb_mahasiswa` b ON a.ID_MAHASISWA = b.ID_MAHASISWA
                                                            JOIN `tb_lokasi_penempatan` c ON b.ID_LOKASI = c.ID_LOKASI
                                                            JOIN `tb_sekolah_pt` d ON b.ID_SEKOLAH_PT = d.ID_SEKOLAH_PT
                                                            WHERE a.TANGGAL = CURDATE()";
                                                // Execute query and fetch data
                                                $view = $dbh->query($query);
                                            }
                                        ?>
                                        
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Asal Sekolah/PT</th>
                                                <th class="text-center">Lokasi Magang</th>
                                                <th class="text-center" style="width: 400px;">Logbook</th>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                        if($view->rowCount()>0){
                                                            $no=1;
                                                            while($data = $view->fetch()){
                                                    ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $no++; ?></td>
                                                                <td class="text-center"><?php echo $data['TANGGAL'];?></td>
                                                                <td class="text-center"><?php echo $data['NAMA_MAHASISWA'];?></td>
                                                                <td class="text-center"><?php echo $data['NAMA_SEKOLAH_PT'];?></td>
                                                                <td class="text-center"><?php echo $data['NAMA_LOKASI'];?></td>
                                                                <td class="text-left"><?php echo $data['KEGIATAN'];?></td>
                                                            </tr>
                                                    <?php
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

                    <footer class="footer" style="position: relative; bottom: 0;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="credits ml-auto">
                                    <span class="copyright">
                                        © <script>
                                        document.write(new Date().getFullYear())
                                        </script>
                                        Kementrian Agama Kota Surabaya
                                    </span>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <script src="../assets/js/plugins/moment.min.js"></script>
        <!-- Insert data pop up -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="../assets/js/plugins/sweetalert2.min.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/demo/demo.js"></script>
        <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
        
    </body>

</html>