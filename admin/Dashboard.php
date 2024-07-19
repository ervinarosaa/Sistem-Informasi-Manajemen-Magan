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
                        <li>
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
                        <a href="./Dashboard.php" style="text-decoration: none; color: black;">DASHBOARD</a>
                    </h2>

                    <div class="row">
                        <!-- BAR CHART UNTUK MAHASISWA AKTIF -->
                        <div class="col-md-8 mt-8 mb-12">
                            <div class="card" style="height: auto";>
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: center;">PESERTA MAGANG</h3>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart" height: "20rem"></canvas>
                                </div>
                            </div>
                        </div>

                        <?php
                        // Ambil data dari database dan simpan ke dalam array labels
                        $labels = array();
                        $data = array();

                        try {
                            $stmt = $dbh->prepare("SELECT DISTINCT b.NAMA_SEKOLAH_PT, COUNT(*) AS 'TOTAL_MAHASISWA'
                                                    FROM tb_mahasiswa a
                                                    JOIN tb_sekolah_pt b ON a.ID_SEKOLAH_PT = b.ID_SEKOLAH_PT
                                                    JOIN tb_status c ON a.ID_STATUS = c.ID_STATUS
                                                    WHERE c.STATUS = 'Aktif'
                                                    GROUP BY a.ID_SEKOLAH_PT");
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $labels[] = $row['NAMA_SEKOLAH_PT'];
                                $data[] = $row['TOTAL_MAHASISWA'];
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>

                        <script>
                        // Get the context of the canvas element we want to select
                        var ctx = document.getElementById("myChart").getContext('2d');

                        // Ambil data dari database untuk digunakan sebagai label
                        var labels = <?php echo json_encode($labels); ?>;
                        var data_total = <?php echo json_encode($data); ?>;

                        // Define the data for the chart
                        var data = {
                            labels: labels,
                            datasets: [{
                            label: 'Total Mahasiswa',
                            data: data_total, // Data ini akan diambil dari database
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(102, 51, 0, 0.2)',
                                'rgba(51, 0, 102, 0.2)',
                                'rgba(0, 102, 51, 0.2)',
                                'rgba(255, 0, 0, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(102, 51, 0, 1)',
                                'rgba(51, 0, 102, 1)',
                                'rgba(0, 102, 51, 1)',
                                'rgba(255, 0, 0, 1)'
                            ],
                            borderWidth: 1
                            }]
                        };

                        // Create the chart
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: data,
                            options: {
                            legend: {
                                display: true,
                                position: 'right', // Ubah posisi keterangan jika diperlukan
                                labels: {
                                boxWidth: 20, // Lebar kotak warna
                                padding: 5, // Ruang antara kotak warna dan teks
                                generateLabels: function(chart) {
                                    var data = chart.data;
                                    if (data.labels.length) {
                                    return data.labels.map(function(label, i) {
                                        return {
                                        text: label,
                                        fillStyle: data.datasets[0].backgroundColor[i],
                                        hidden: false // Tetapkan ke false agar keterangan selalu ditampilkan
                                        };
                                    });
                                    } else {
                                    return [];
                                    }
                                }
                                }
                            },
                            scales: {
                                yAxes: [{
                                ticks: {
                                    beginAtZero: true // Mulai indeks dari 0
                                }
                                }],
                                xAxes: [{
                                display: false // Menyembunyikan sumbu x
                                }]
                            }
                            }
                        });
                        </script>
                        <!-- END BAR CHART UNTUK MAHASISWA AKTIF -->

                        <!-- DOUGHNUT CHART UNTUK PESEBARAN SEKOLAH/PT -->
                        <div class="col-md-4 mt-8 mb-12">
                            <div class="card" style="height: auto;">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: center;">DISTRIBUSI</h3>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <canvas id="myDoughnutChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        <?php
                        // Ambil data dari database dan simpan ke dalam array labels
                        $labels = array();
                        $data = array();

                        try {
                            $stmt = $dbh->prepare("SELECT DISTINCT c.TINGKAT_PENDIDIKAN, COUNT(*) AS 'TOTAL_MAHASISWA'
                                                    FROM tb_mahasiswa a
                                                    JOIN tb_sekolah_pt b ON a.ID_SEKOLAH_PT = b.ID_SEKOLAH_PT
                                                    JOIN tb_pendidikan c ON b.ID_PENDIDIKAN = c.ID_PENDIDIKAN
                                                    JOIN tb_status d ON a.ID_STATUS = d.ID_STATUS
                                                    WHERE d.STATUS = 'Aktif'
                                                    GROUP BY b.ID_PENDIDIKAN");
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $labels[] = $row['TINGKAT_PENDIDIKAN'];
                                $data[] = $row['TOTAL_MAHASISWA'];
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
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 205, 86)',
                                    'rgb(54, 162, 235)'
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
                        <!-- END DOUGHNUT CHART UNTUK PESEBARAN SEKOLAH/PT -->
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
                <!-- END CONTENT -->
            </div>
            <!-- END MAIN PANEL -->
        </div>

        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <script src="../assets/js/plugins/moment.min.js"></script>

        <!-- Chart JS -->
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>

        <script src="../assets/js/paper-dashboard.min.js?v=2.1.1" type="text/javascript"></script>
        <script src="../assets/demo/demo.js"></script>
        <script src="../assets/demo/jquery.sharrre.js"></script>
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"86d5c9f8ba369ce8","version":"2024.3.0","token":"1b7cbb72744b40c580f8633c6b62637e"}' crossorigin="anonymous"></script>
    </body>
</html>