<?php
    include  '../koneksi.php';
    session_start();
    // Periksa apakah sesi login pengguna tidak ada
    if (!isset($_SESSION['mahasiswa'])) {
        // Redirect pengguna ke halaman login
        header("Location: ../index.php");
        exit; // Pastikan untuk keluar dari skrip setelah melakukan redirect
    } else{
        $mahasiswa=$_SESSION['mahasiswa'];
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
        <!-- Include Chart.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
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
                            <a href="./DashboardMahasiswa.php">
                                <i class="bi bi-house-fill"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="./Logbook.php">
                                <i class="bi bi-journal-bookmark-fill"></i>
                                <p>Logbook</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="./Presensi.php">
                                <i class="bi bi-person-bounding-box"></i>
                                <p>Presensi</p>
                            </a>
                        </li>
                        <li class="nav-item-door">
                                <a href="../index.php">
                                <i class="bi bi-door-open-fill"></i>
                            <p>Logout</p>
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
                                <a href="#">
                                    <button id="minimizeSidebar" class="btn btn-icon btn-round">
                                        <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                                        <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
                                    </button>
                                </a>
                                
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
                                        <a class="dropdown-item" href="./DashboardMahasiswa.php">
                                            <i class="bi bi-house-fill"></i>
                                            <p>Dashboard</p>
                                        </a>
                                        <a class="dropdown-item" href="./Logbook.php">
                                            <i class="bi bi-journal-bookmark-fill"></i>
                                            <p>Logbook</p>
                                        </a>
                                        <a class="dropdown-item" href="./Presensi.php">
                                            <i class="bi bi-person-bounding-box"></i>
                                            <p>Presensi</p>
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
                        <a href="./Presensi.php" style="text-decoration: none; color: black;">REKAPITULASI PRESENSI</a>
                    </h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                            $IdMahasiswa = $_SESSION['mahasiswa'];
                                            // Default query
                                            $query = "SELECT a.ID_KEHADIRAN, a.TANGGAL, b.ID_KODE_KEHADIRAN, b.KODE_KEHADIRAN 
                                                        FROM `tb_kehadiran` a 
                                                        JOIN `tb_kode_kehadiran` b ON a.ID_KODE_KEHADIRAN = b.ID_KODE_KEHADIRAN
                                                        WHERE a.`ID_MAHASISWA` = $IdMahasiswa";
                                            // Execute query and fetch data
                                            $view = $dbh->query($query);
                                        ?>
                                        
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Keterangan</th>
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
                                                            <td class="text-center"><?php echo $data['KODE_KEHADIRAN'];?></td>
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
                                        Kementerian Agama Kota Surabaya
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