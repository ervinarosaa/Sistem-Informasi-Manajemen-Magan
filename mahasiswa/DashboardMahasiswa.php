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
        <script src="../assets/js/plugins/sweetalert2.min.js"></script>
        <script src="../assets/demo/demo.js"></script>
        <link rel="stylesheet" href="../assets/js/plugins/sweetalert2.min.js">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            $(document).ready(function() {
            // Initialise Sweet Alert library
            demo.showSwal();
            });
        </script>
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
                        <li class="active">
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
                        <li>
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
                        <a href="./DashboardMahasiswa.php" style="text-decoration: none; color: black;">DASHBOARD</a>
                    </h2>
                    <?php
                        $view = $dbh->query("SELECT `NAMA_MAHASISWA` FROM `tb_mahasiswa` WHERE `ID_MAHASISWA`=$mahasiswa;");
                        if($view->rowCount()>0){
                            $no=1;
                            while($data = $view->fetch()){
                    ?>
                                <div class="alert alert-primary alert-dismissible" role="alert">
                                    <strong>Selamat Datang! <?php echo $data['NAMA_MAHASISWA'];?></strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>    
                    <?php
                            }
                        }
                    ?>
                    
                    <div class="row"> 
                        <!-- Button trigger modal -->
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPresensi">
                                Presensi
                            </button>
                        </div>

                        <!-- POP UP CREATE PRESENSI -->
                        <div class="modal fade" id="tambahPresensi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title fs-5" id="tambahPresensiLabel">Presensi</h5>
                                    </div>
                                    <?php
                                        $update=$dbh->query("ALTER TABLE `tb_kehadiran` AUTO_INCREMENT = 1;");
                                    ?>
                                    <form method="POST" action="DashboardMahasiswa.php">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>"  readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <select name="keterangan" class="form-control" id="keterangan" required>
                                                    <?php
                                                        $get_keterangan = $dbh->query("SELECT * FROM `tb_kode_kehadiran`");
                                                        while ($ket = $get_keterangan->fetch()) {
                                                            $id_kode_kehadiran = $ket['ID_KODE_KEHADIRAN'];
                                                            $kode_kehadiran = $ket['KODE_KEHADIRAN']; // Corrected variable name
                                                            echo '<option value="'.$id_kode_kehadiran.'">'.$kode_kehadiran.'</option>'; // Corrected echo statement
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" name="tambahPresensi">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end pop up -->
                    </div>

                    <!-- INSERT DATA PRESENSI -->
                    <?php
                        if (isset($_POST['tambahPresensi'])) {
                            // Mengambil nilai dari form
                            $tanggal = $_POST['tanggal'];
                            $id_kode_kehadiran = $_POST['keterangan'];
                            $mahasiswa=$_SESSION['mahasiswa'];

                            // Melakukan pengecekan apakah tanggal dan id_mahasiswa sudah ada di database
                            $check_query = $dbh->prepare("SELECT COUNT(*) as total FROM `tb_kehadiran` WHERE `TANGGAL` = ? AND `ID_MAHASISWA` = ?");
                            $check_query->execute([$tanggal, $mahasiswa]);
                            $result = $check_query->fetch(PDO::FETCH_ASSOC);

                            // Jika sudah presensi 
                            if($result['total'] > 0){
                                ?>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    <strong>Perhatian!</strong> Presensi sudah diisi
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php
                            } else{
                                // Menjalankan query INSERT
                                $insert_presensi = $dbh->prepare("INSERT INTO `tb_kehadiran` (`ID_MAHASISWA`,`TANGGAL`,`ID_KODE_KEHADIRAN`) 
                                                                VALUES ('$mahasiswa','$tanggal', $id_kode_kehadiran)");
                                if ($insert_presensi->execute()) {
                                ?>
                                    <script>
                                        Swal.fire({
                                            icon: "success",
                                            title: 'Sukses!',
                                            customClass: {
                                                confirmButton: 'btn btn-success'
                                            },
                                            buttonsStyling: false
                                        }).then((result) => {
                                            // Cek jika pengguna menekan tombol OK
                                                window.location.href = 'DashboardMahasiswa.php';
                                        });
                                    </script>
                                <?php
                                } else{
                                ?>
                                    <script>
                                        Swal.fire({
                                            icon: "error",
                                            title: 'Gagal!',
                                            customClass: {
                                                confirmButton: 'btn btn-danger'
                                            },
                                            buttonsStyling: false
                                        }).then((result) => {
                                            // Cek jika pengguna menekan tombol OK
                                                window.location.href = 'DashboardMahasiswa.php';
                                        });
                                    </script>
                                <?php
                                }
                            }
                        }
                        ?>
                    
                    <div class="row">
                        <!-- DOUGHNUT CHART UNTUK REKAPITULASI KEHADIRAN -->
                        <div class="col-md-6 mt-8 mb-12">
                            <div class="card" style="height: 30rem;">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: center;">REKAPITULASI KEHADIRAN</h3>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <canvas id="myDoughnutChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        <?php
                            // Ambil data dari database dan simpan ke dalam array labels
                            $id_mahasiswa=$_SESSION['mahasiswa'];
                            $labels = array();
                            $data = array();

                            try {
                                $stmt = $dbh->prepare("SELECT b.KODE_KEHADIRAN, COUNT(*) AS 'TOTAL_KEHADIRAN'
                                                        FROM tb_kehadiran a
                                                        LEFT JOIN tb_kode_kehadiran b ON a.ID_KODE_KEHADIRAN = b.ID_KODE_KEHADIRAN
                                                        WHERE a.ID_MAHASISWA = $id_mahasiswa
                                                        GROUP BY b.KODE_KEHADIRAN");
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $labels[] = $row['KODE_KEHADIRAN'];
                                    $data[] = $row['TOTAL_KEHADIRAN'];
                                }
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        ?>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var ctx = document.getElementById('myDoughnutChart').getContext('2d');
                                // Ambil data dari database untuk digunakan sebagai label
                                var labels = <?php echo json_encode($labels); ?>;
                                var data_total = <?php echo json_encode($data); ?>;
                                var myDoughnutChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        datasets: [{
                                            data: data_total,
                                            backgroundColor: [
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)',
                                                'rgb(255, 99, 132)'
                                            ],
                                            hoverOffset: 4
                                        }],

                                        // These labels appear in the legend and in the tooltips when hovering different arcs
                                        labels: labels
                                    },
                                    options: {
                                        responsive: true, // Biarkan grafik menyesuaikan ukuran
                                        maintainAspectRatio: false, // Biarkan canvas tidak mempertahankan rasio aspek
                                        legend: {
                                            display: true,
                                            position: 'bottom'
                                        }
                                    }
                                });
                            });
                        </script>
                        <!-- END DOUGHNUT CHART UNTUK PESEBARAN REKAPITULASI KEHADIRAN -->
                        
                        <!-- DOUGHNUT CHART UNTUK KELENGKAPAN LOGBOOK -->
                        <div class="col-md-6 mt-8 mb-12">
                            <div class="card" style="height: 30rem;">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: center;">LOGBOOK</h3>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <canvas id="kelengkapan_logbook" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        <?php
                            // Ambil data dari database dan simpan ke dalam array labels
                            $id_mahasiswa=$_SESSION['mahasiswa'];
                            $data = array();

                            // Misalnya, Anda menggunakan PDO untuk mengambil data
                            try {
                                // Query untuk menghitung total kehadiran
                                $hdr = $dbh->prepare("SELECT COUNT(*) AS 'TOTAL_HADIR' 
                                FROM tb_kehadiran 
                                WHERE `ID_MAHASISWA` = $id_mahasiswa AND `ID_KODE_KEHADIRAN` = 1");
                                $hdr->execute();
                                $row = $hdr->fetch(PDO::FETCH_ASSOC);
                                $total_hadir = $row ? $row['TOTAL_HADIR'] : 0;

                                // Query untuk menghitung total logbook
                                $lb = $dbh->prepare("SELECT COUNT(*) AS 'TOTAL_LOGBOOK' 
                                    FROM tb_logbook 
                                    WHERE `ID_MAHASISWA` = $id_mahasiswa");
                                $lb->execute();
                                $row = $lb->fetch(PDO::FETCH_ASSOC);
                                $total_logbook = $row ? $row['TOTAL_LOGBOOK'] : 0;

                                // Hitung total logbook yang belum dibuat
                                if($total_hadir >= 1){
                                    $total_belum_dibuat = $total_hadir - $total_logbook;
                                } else{
                                    $total_belum_dibuat = 0;
                                }
                                
                                // Simpan data ke dalam array
                                $data = array($total_belum_dibuat, $total_logbook);
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        ?>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var ctx = document.getElementById('kelengkapan_logbook').getContext('2d');
                                // Ambil data dari database untuk digunakan sebagai label
                                var data = <?php echo json_encode($data); ?>;
                                var kelengkapan_logbook = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        datasets: [{
                                            data: data,
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(102, 204, 153)'
                                            ],
                                            hoverOffset: 4
                                        }],

                                        // These labels appear in the legend and in the tooltips when hovering different arcs
                                        labels: ['Logbook belum dibuat', 'Logbook dibuat']
                                    },
                                    options: {
                                        responsive: true, // Biarkan grafik menyesuaikan ukuran
                                        maintainAspectRatio: false, // Biarkan canvas tidak mempertahankan rasio aspek
                                        legend: {
                                            display: true,
                                            position: 'bottom'
                                        }
                                    }
                                });
                            });
                        </script>
                        <!-- END DOUGHNUT CHART UNTUK KELENGKAPAN LOGBOOK -->
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

        <script src="../assets/js/plugins/jquery.validate.min.js"></script>

        <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/demo/demo.js"></script>
        <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
        
    </body>

</html>