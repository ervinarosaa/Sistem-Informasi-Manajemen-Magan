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
                        <li>
                            <a href="./ArsipLogbook.php">
                                <i class="bi bi-journal-bookmark-fill"></i>
                                <p>Arsip Logbook</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="./Arsip.php">
                                <i class="bi bi-archive-fill"></i>
                                <p>Arsip Data Magang</p>
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
                                            <p>Arsip Data Magang</p>
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
            
                <!--MAHASISWA-->
                <div class="content">
                    <h2 style="text-align: center;">
                        <a href="./Arsip.php" style="text-decoration: none; color: black;">ARSIP DATA MAGANG</a>
                    </h2>
                    <!-- TABEL -->
                    <div class="row">
                        <div class="d-flex justify-content col-lg-8 col-md-8 col-sm-8">
                            <!-- Cetak Laporan Data Magang -->
                            <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#exportArsip">
                                Export
                            </button>

                            <!-- Formulir Filter -->
                            <form id="filterForm" style="margin: 10px;">
                                <select class="form-control" style="font-size:large;" id="filterTingkatPendidikan" name="filterTingkatPendidikan" onchange="updateTable()">
                                    <option value="">Semua</option>
                                    <option value="Sekolah" <?php if(isset($_GET['filterTingkatPendidikan']) && $_GET['filterTingkatPendidikan'] == "Sekolah") echo "selected"; ?>>Sekolah Kejuruan</option>
                                    <option value="PeguruanTinggi"  <?php if(isset($_GET['filterTingkatPendidikan']) && $_GET['filterTingkatPendidikan'] == "PeguruanTinggi") echo "selected"; ?>>Perguruan Tinggi</option>
                                    <option value="Selesai" <?php if(isset($_GET['filterTingkatPendidikan']) && $_GET['filterTingkatPendidikan'] == "Selesai") echo "selected"; ?>>Status Selesai</option>
                                    <option value="Batal"  <?php if(isset($_GET['filterTingkatPendidikan']) && $_GET['filterTingkatPendidikan'] == "Batal") echo "selected"; ?>>Status Batal</option>
                                    <!-- Tambahkan opsi untuk universitas lainnya sesuai kebutuhan -->
                                </select>
                            </form>
                        </div>

                        <!-- POP UP EXPORT ARSIP -->
                        <div class="modal fade" id="exportArsip" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title fs-5" id="exportArsipLabel">Export Data Arsip</h5>
                                    </div>
                                    <form method="POST" action="Arsip-export.php">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="tanggalAwal" class="form-label">Tanggal Awal</label>
                                                <input type="date" name="tanggalAwal" class="form-control" id="tanggalAwal" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggalAkhir" class="form-label">Tanggal Akhir</label>
                                                <input type="date" name="tanggalAkhir" class="form-control" id="tanggalAkhir" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <input type="submit" class="btn btn-primary" name="exportArsip" value="Export">
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
                                        <script>
                                            function updateTable() {
                                                var filterValue = document.getElementById("filterTingkatPendidikan").value;
                                                var url = window.location.href.split('?')[0]; // Mendapatkan URL tanpa parameter query

                                                // Mengubah URL dengan menambahkan parameter filterTingkatPendidikan
                                                var newUrl = url + "?filterTingkatPendidikan=" + filterValue;

                                                // Memperbarui halaman dengan URL yang baru
                                                window.location.href = newUrl;
                                                // Mendapatkan elemen body
                                                var body = document.getElementsByTagName("body")[0];

                                                // Menambahkan kelas dan gaya baru ke elemen body
                                                body.className = "main-panel";
                                                body.style.height = "100%";
                                                body.style.overflowY = "auto";

                                                // Memperbarui halaman dengan URL yang baru
                                                window.location.href = urlObject.href;
                                            }
                                        </script>
                                        <?php
                                            // Default query
                                            $query = "SELECT * FROM `tb_mahasiswa` a 
                                                        JOIN `tb_lokasi_penempatan` b ON a.ID_LOKASI = b.ID_LOKASI 
                                                        JOIN `tb_status` c ON a.ID_STATUS = c.ID_STATUS 
                                                        JOIN `tb_sekolah_pt` d ON a.ID_SEKOLAH_PT = d.ID_SEKOLAH_PT
                                                        JOIN `tb_pendidikan` e ON d.ID_PENDIDIKAN = e.ID_PENDIDIKAN
                                                        JOIN `tb_nilai` f ON a.ID_NILAI = f.ID_NILAI
                                                        WHERE c.STATUS != 'Aktif'
                                                        ORDER BY `ID_MAHASISWA` DESC";

                                            // Update query based on filter
                                            if (isset($_GET['filterTingkatPendidikan'])) {
                                                $filterValue = $_GET['filterTingkatPendidikan'];
                                                if ($filterValue === "Sekolah") {
                                                    $query = "SELECT * FROM `tb_mahasiswa` a  
                                                                JOIN `tb_lokasi_penempatan` b ON a.ID_LOKASI = b.ID_LOKASI 
                                                                JOIN `tb_status` c ON a.ID_STATUS = c.ID_STATUS 
                                                                JOIN `tb_sekolah_pt` d ON a.ID_SEKOLAH_PT = d.ID_SEKOLAH_PT
                                                                JOIN `tb_pendidikan` e ON d.ID_PENDIDIKAN = e.ID_PENDIDIKAN
                                                                JOIN `tb_nilai` f ON a.ID_NILAI = f.ID_NILAI
                                                                WHERE c.STATUS != 'Aktif' AND e.TINGKAT_PENDIDIKAN = 'Sekolah Kejuruan'
                                                                ORDER BY `ID_MAHASISWA` DESC;";
                                                } elseif ($filterValue === "PeguruanTinggi") {
                                                    $query = "SELECT * FROM `tb_mahasiswa` a 
                                                                JOIN `tb_lokasi_penempatan` b ON a.ID_LOKASI = b.ID_LOKASI 
                                                                JOIN `tb_status` c ON a.ID_STATUS = c.ID_STATUS 
                                                                JOIN `tb_sekolah_pt` d ON a.ID_SEKOLAH_PT = d.ID_SEKOLAH_PT
                                                                JOIN `tb_pendidikan` e ON d.ID_PENDIDIKAN = e.ID_PENDIDIKAN
                                                                JOIN `tb_nilai` f ON a.ID_NILAI = f.ID_NILAI
                                                                WHERE c.STATUS != 'Aktif' AND e.TINGKAT_PENDIDIKAN = 'Perguruan Tinggi'
                                                                ORDER BY `ID_MAHASISWA` DESC;";
                                                } elseif ($filterValue === "Selesai") {
                                                    $query = "SELECT * FROM `tb_mahasiswa` a 
                                                                JOIN `tb_lokasi_penempatan` b ON a.ID_LOKASI = b.ID_LOKASI 
                                                                JOIN `tb_status` c ON a.ID_STATUS = c.ID_STATUS 
                                                                JOIN `tb_sekolah_pt` d ON a.ID_SEKOLAH_PT = d.ID_SEKOLAH_PT
                                                                JOIN `tb_pendidikan` e ON d.ID_PENDIDIKAN = e.ID_PENDIDIKAN
                                                                JOIN `tb_nilai` f ON a.ID_NILAI = f.ID_NILAI 
                                                                WHERE c.STATUS = 'Selesai'
                                                                ORDER BY `ID_MAHASISWA` DESC;";
                                                } elseif ($filterValue === "Batal") {
                                                    $query = "SELECT * FROM `tb_mahasiswa` a 
                                                                JOIN `tb_lokasi_penempatan` b ON a.ID_LOKASI = b.ID_LOKASI 
                                                                JOIN `tb_status` c ON a.ID_STATUS = c.ID_STATUS 
                                                                JOIN `tb_sekolah_pt` d ON a.ID_SEKOLAH_PT = d.ID_SEKOLAH_PT
                                                                JOIN `tb_pendidikan` e ON d.ID_PENDIDIKAN = e.ID_PENDIDIKAN
                                                                JOIN `tb_nilai` f ON a.ID_NILAI = f.ID_NILAI
                                                                WHERE c.STATUS = 'Batal'
                                                                ORDER BY `ID_MAHASISWA` DESC;";
                                                } 
                                            }
                                            // Execute query and fetch data
                                            $view = $dbh->query($query);
                                        ?>

                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Sekolah/PT</th>
                                                <th class="text-center">Periode Magang</th>
                                                <th class="text-center">Lokasi</th>
                                                <th class="text-center">Nilai</th>
                                                <th class="text-center">Aksi</th>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                        if($view->rowCount()>0){
                                                            $no=1;
                                                            while($data = $view->fetch()){
                                                    ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $no++; ?></td>
                                                                <td class="text-left"><?php echo $data['NAMA_MAHASISWA'];?></td>
                                                                <td class="text-center"><?php echo $data['NAMA_SEKOLAH_PT'];?></td>
                                                                <td class="text-center">
                                                                    <p><?php echo $data['MULAI_MAGANG'];?> s.d</p>
                                                                    <p><?php echo $data['SELESAI_MAGANG'];?></p>
                                                                </td>
                                                                <td class="text-center"><?php echo $data['NAMA_LOKASI'];?></td>
                                                                <td class="text-center"><?php echo $data['NILAI'];?></td>
                                                                <td class="text-center">
                                                                    <?php
                                                                        if($data['STATUS'] == 'Selesai'){
                                                                    ?>
                                                                            <!-- Button Lihat Data Mahasiswa -->
                                                                            <button type="button" class="btn btn-info" onclick="displayData(<?php echo $data['ID_MAHASISWA']; ?>)" data-bs-toggle="modal" data-bs-target="#viewStudent" style="text-decoration: none; color: inherit;">
                                                                                <i class="bi-eye-fill" style="text-decoration: none; color: inherit;"></i>
                                                                            </button>

                                                                            <!-- Button Cetak Sertifikat-->
                                                                            <button type="button" class="btn btn-danger" 
                                                                                    data-id="<?php echo $data['ID_MAHASISWA']; ?>"
                                                                                    data-nama="<?php echo $data['NAMA_MAHASISWA']; ?>"
                                                                                    data-start="<?php echo $data['MULAI_MAGANG']; ?>"
                                                                                    data-finish="<?php echo $data['SELESAI_MAGANG']; ?>"
                                                                                    data-nilai="<?php echo $data['ID_NILAI']; ?>"
                                                                                    onclick="printSertif(this)">
                                                                                    <i class="bi bi-printer-fill" style="text-decoration: none; color: inherit;"></i>
                                                                            </button>
                                                                    <?php
                                                                        } else{
                                                                    ?>
                                                                            <!-- Button Lihat Data Mahasiswa -->
                                                                            <button type="button" class="btn btn-info" onclick="displayData(<?php echo $data['ID_MAHASISWA']; ?>)" data-bs-toggle="modal" data-bs-target="#viewStudent" style="text-decoration: none; color: inherit;">
                                                                                <i class="bi-eye-fill" style="text-decoration: none; color: inherit;"></i>
                                                                            </button>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>

                                                            <!-- POP UP VIEW Student -->
                                                            <div class="modal fade" id="viewStudent-<?php echo $data['ID_MAHASISWA']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <h5 class="modal-title fs-5" id="viewStudentLabel">Data Mahasiswa</h5>
                                                                        </div>
                                                                        <form method="POST" action="Arsip.php?view=<?php echo $data["ID_MAHASISWA"]; ?>">
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="idMahasiswa" class="form-label">ID Mahasiswa</label>
                                                                                    <input type="text" name="idMahasiswa" class="form-control" id="idMahasiswa" value="<?php echo $data['ID_MAHASISWA']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                                                                                    <input type="text" name="namaMahasiswa" class="form-control" id="namaMahasiswa" value="<?php echo $data['NAMA_MAHASISWA']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="nisMahasiswa" class="form-label">NIS</label>
                                                                                    <input type="text" name="nisMahasiswa" class="form-control" id="nisMahasiswa" value="<?php echo $data['NIS']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="alamatMahasiswa" class="form-label">Alamat Mahasiswa</label>
                                                                                    <input type="text" name="alamatMahasiswa" class="form-control" id="alamatMahasiswa" value="<?php echo $data['ALAMAT_MAHASISWA']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                                                                                    <input type="text" name="nomorTelepon" class="form-control" id="nomorTelepon" value="<?php echo $data['NO_TELP']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="sekolah_pt" class="form-label">Asal Sekolah/PT</label>
                                                                                    <input type="text" name="asal_sekolah_pt" class="form-control" id="asal_sekolah_pt" value="<?php echo $data['NAMA_SEKOLAH_PT']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="jurusan" class="form-label">Jurusan</label>
                                                                                    <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?php echo $data['JURUSAN']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="pembimbing" class="form-label">Nama Guru/Dosen Pembimbing</label>
                                                                                    <input type="text" name="nama_pembimbing" class="form-control" id="nama_pembimbing" value="<?php echo $data['DOSEN_GURU_PEMBIMBING']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="kontak_pembimbing" class="form-label">Kontak Guru/Dosen Pembimbing</label>
                                                                                    <input type="text" name="kontak_pembimbing" class="form-control" id="kontak_pembimbing" value="<?php echo $data['KONTAK_PEMBIMBING']; ?>"readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="lokasi" class="form-label">Lokasi</label>
                                                                                    <input type="text" name="lokasi" class="form-control" id="lokasi" value="<?php echo $data['NAMA_LOKASI']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="Start" class="form-label">Mulai Magang </label>
                                                                                    <input type="text" name="Start" class="form-control" id="Start" value="<?php echo $data['MULAI_MAGANG']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="Finish" class="form-label">Selesai Magang</label>
                                                                                    <input type="text" name="Finish" class="form-control" id="Finish" value="<?php echo $data['SELESAI_MAGANG']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="status" class="form-label">Status</label>
                                                                                    <input type="text" name="status" class="form-control" id="status" value="<?php echo $data['STATUS']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="nilai" class="form-label">Nilai</label>
                                                                                    <input type="text" name="nilai" class="form-control" id="nilai" value="<?php echo $data['NILAI']; ?>" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end pop up -->

                                                            <script>
                                                                function displayData(id) {
                                                                    $('#viewStudent-' + id).modal('show');
                                                                }

                                                                function printSertif(button) {
                                                                    var modal = $('#printSertif');
                                                                    modal.find('#id_mahasiswa').val(button.getAttribute('data-id'));
                                                                    modal.find('#namaMahasiswa').val(button.getAttribute('data-nama'));
                                                                    modal.find('#nomorSertif').val(button.getAttribute('data-nomor'));
                                                                    modal.find('#id_nilai').val(button.getAttribute('data-nilai'));
                                                                    modal.find('#mulai_magang').val(button.getAttribute('data-start'));
                                                                    modal.find('#selesai_magang').val(button.getAttribute('data-finish'));
                                                                    // Menampilkan modal
                                                                    modal.modal('show');
                                                                }

                                                                function print() {
                                                                    var idMahasiswa = document.getElementById("id_mahasiswa").value;
                                                                    var nomorSertif = document.getElementById("nomorSertif").value;
                                                                    var id_nilai = document.getElementById("id_nilai").value;
                                                                    var url = "CetakSertif.php?ID_MAHASISWA=" + idMahasiswa + "&NOMOR_SERTIF=" + nomorSertif + "&ID_NILAI=" + id_nilai;
                                                                    window.open(url, "_blank");
                                                                }
                                                            </script>

                                                            <!-- POP UP CETAK SERTIFIKAT -->
                                                            <div class="modal fade" id="printSertif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <h5 class="modal-title fs-5" id="printSertifLabel">Cetak Sertifikat</h5>
                                                                        </div>
                                                                        <form method="POST" action="Arsip.php?ID_MAHASISWA=<?php echo $data["ID_MAHASISWA"]; ?>">
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="id_mahasiswa" class="form-label">ID Mahasiswa</label>
                                                                                    <input type="text" name="id_mahasiswa" class="form-control" id="id_mahasiswa" value="<?php echo $data['ID_MAHASISWA']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                                                                                    <input type="text" name="namaMahasiswa" class="form-control" id="namaMahasiswa" value="<?php echo $data['NAMA_MAHASISWA']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="nomorSertif" class="form-label">Nomor Sertifikat</label>
                                                                                    <input type="text" name="nomorSertif" class="form-control" id="nomorSertif" placeholder="Nomor Sertifikat" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="mulai_magang" class="form-label">Tanggal Mulai</label>
                                                                                    <input type="date" name="mulai_magang" class="form-control" id="mulai_magang" value="<?php echo $data['MULAI_MAGANG']; ?>" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="selesai_magang" class="form-label">Tanggal Selesai</label>
                                                                                    <input type="date" name="selesai_magang" class="form-control" id="selesai_magang" value="<?php echo $data['SELESAI_MAGANG']; ?>" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="nilaiMagang" class="form-label">Nilai Magang</label>
                                                                                    <select name="id_nilai" class="form-control" id="id_nilai" onchange="ceknilai()" required>
                                                                                        <?php
                                                                                        $getnilai = $dbh->query("SELECT * FROM `tb_nilai`");
                                                                                        while ($nilai = $getnilai->fetch()) {
                                                                                            $id_nilai= $nilai['ID_NILAI'];
                                                                                            $nilai = $nilai['NILAI']; // Corrected variable name
                                                                                            echo '<option value="'.$id_nilai.'">'.$id_nilai.'-'.$nilai.'</option>'; // Corrected echo statement
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary" id="submit_print" name="submit_print">
                                                                                    Print
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end pop up --> 

                                                            <script>
                                                                function ceknilai() {
                                                                    var selectedValue = document.getElementById("id_nilai").value;
                                                                    var submitButton = document.getElementById("submit_print");
                                                                    if (selectedValue == 1) {
                                                                        submitButton.style.display = "none";
                                                                    } else {
                                                                        submitButton.style.display = "block";
                                                                    }
                                                                }
                                                                // Panggil fungsi ceknilai() saat halaman dimuat
                                                                window.onload = ceknilai;
                                                            </script>

                                                            <?php
                                                            // Lakukan pengecekan apakah tombol "Print" sudah ditekan
                                                            if (isset($_POST['submit_print'])) {
                                                                // Ambil nilai dari form
                                                                $id_mahasiswa = $_POST['id_mahasiswa'];
                                                                $nomor_sertif = $_POST['nomorSertif'];
                                                                $id_nilai = $_POST['id_nilai'];

                                                                // Menjalankan query UPDATE
                                                                $update_data = $dbh->prepare("UPDATE `tb_mahasiswa` SET ID_NILAI = ? WHERE `ID_MAHASISWA` = ?");

                                                                // Eksekusi query dengan melewatkan nilai langsung ke dalam execute()
                                                                if ($update_data->execute([$id_nilai, $id_mahasiswa])) {
                                                                    // Redirect atau lakukan operasi lain setelah update
                                                                    ?>
                                                                    <script>
                                                                        // Fungsi untuk membuka halaman cetak sertifikat dalam tab atau jendela baru
                                                                        function openCetakSertif() {
                                                                            var url = "CetakSertif.php?ID_MAHASISWA=<?php echo $id_mahasiswa; ?>&NOMOR_SERTIF=<?php echo $nomor_sertif; ?>&ID_NILAI=<?php echo $id_nilai; ?>";
                                                                            window.open(url, "_blank");
                                                                        }

                                                                        // Panggil fungsi openCetakSertif setelah halaman selesai dimuat
                                                                        window.onload = openCetakSertif;
                                                                    </script>
                                                                    <?php
                                                                } else {
                                                                    // Tampilkan pesan kesalahan jika query tidak berhasil dieksekusi
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
                                                                                window.location.href = './Arsip.php';
                                                                        });
                                                                    </script>
                                                                    <?php
                                                                }
                                                            }
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
                    <!-- akhir content -->

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