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
                        <li class="active">
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
                
                <div class="content">
                    <h2 style="text-align: center;">
                        <a href="./ArsipPresensi.php" style="text-decoration: none; color: black;">REKAPITULASI PRESENSI</a>
                    </h2>

                    <div class="row">
                        <div class="d-flex justify-conten col-lg-8 col-md-8 col-sm-8">
                            <!-- Button trigger modal -->
                            <div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPresensi">
                                    Presensi
                                </button>
                            </div>
                            <!-- Button trigger modal -->
                            <div>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#filter">
                                    Filter
                                </button>
                            </div>
                            <!-- Cetak Laporan Arsip Presensi -->
                            <div>
                                <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#exportPresensi">
                                    Export
                                </button>
                            </div>
                        </div>

                        <!-- POP UP EXPORT PRESENSI -->
                        <div class="modal fade" id="exportPresensi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title fs-5" id="exportPresensiLabel">Export Presensi</h5>
                                    </div>
                                    <form method="POST" action="ArsipPresensi-export.php">
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
                                            <input type="submit" class="btn btn-primary" name="exportPresensi" value="Export">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end pop up -->

                        <!-- POP UP FILTER PRESENSI -->
                        <div class="modal fade" id="filter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title fs-5" id="filterLabel">Filter Presensi</h5>
                                    </div>
                                    <form method="POST" action="ArsipPresensi.php">
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
                                            <button type="submit" class="btn btn-primary" name="filterPresensi">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end pop up -->

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
                                    <form method="POST" action="ArsipPresensi.php">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nis" class="form-label">NIS</label>
                                                <input type="text" name="nis" class="form-control" id="nis" placeholder="NIS" oninput="this.value = this.value.toUpperCase()" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sekolah_pt" class="form-label">Asal Sekolah/PT</label>
                                                <select name="sekolah_pt" class="form-control" id="sekolah_pt" required>
                                                    <?php
                                                        $get_sekolah_pt = $dbh->query("SELECT * FROM `tb_sekolah_pt`");
                                                        while ($pd = $get_sekolah_pt->fetch()) {
                                                            $id_sekolah_pt = $pd['ID_SEKOLAH_PT'];
                                                            $nama_sekolah_pt = $pd['NAMA_SEKOLAH_PT']; // Corrected variable name
                                                            echo '<option value="'.$id_sekolah_pt.'">'.$nama_sekolah_pt.'</option>'; // Corrected echo statement
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>
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
                        
                        
                        <div class="col-md-12">
                            <!-- INSERT DATA PRESENSI -->
                            <?php
                                if (isset($_POST['tambahPresensi'])) {
                                    // Mengambil nilai dari form
                                    $nis = $_POST['nis'];
                                    $id_sekolah_pt = $_POST['sekolah_pt'];
                                    $tanggal = $_POST['tanggal'];
                                    $id_kode_kehadiran = $_POST['keterangan'];

                                    // Melakukan pengecekan apakah nis dan id_mahasiswa sudah ada di database
                                    $check_query = $dbh->prepare("SELECT ID_MAHASISWA, NIS FROM `tb_mahasiswa` WHERE `NIS`=? AND `ID_SEKOLAH_PT`=?");
                                    $check_query->execute([$nis, $id_sekolah_pt]);
                                    $result = $check_query->fetch(PDO::FETCH_ASSOC);

                                    // jika ada 
                                    if($result !== false && $result['NIS'] == $nis) {
                                        $id_mahasiswa = $result['ID_MAHASISWA'];

                                        // Melakukan pengecekan apakah tanggal dan id_mahasiswa sudah ada di database
                                        $check_query = $dbh->prepare("SELECT COUNT(*) as total FROM `tb_kehadiran` WHERE `TANGGAL` = ? AND `ID_MAHASISWA` = ?");
                                        $check_query->execute([$tanggal, $id_mahasiswa]);
                                        $result_presensi = $check_query->fetch(PDO::FETCH_ASSOC);
                                        
                                        // Jika sudah ada presensi
                                        if($result_presensi['total'] > 0){
                                            ?>
                                            <div class="alert alert-warning alert-dismissible" role="alert">
                                                <strong>Perhatian!</strong> Presensi sudah diisi
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                        } else {
                                            // Menjalankan query INSERT
                                            $insert_presensi = $dbh->prepare("INSERT INTO `tb_kehadiran` (`ID_MAHASISWA`,`TANGGAL`,`ID_KODE_KEHADIRAN`) 
                                                                            VALUES ('$id_mahasiswa','$tanggal', $id_kode_kehadiran)");
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
                                                            window.location.href = './ArsipPresensi.php';
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
                                                            window.location.href = './ArsipPresensi.php';
                                                    });
                                                </script>
                                <?php
                                            }
                                        }
                                    } else {
                                        ?>
                                        <div class="alert alert-warning alert-dismissible" role="alert">
                                            <strong>Perhatian!</strong> NIS tidak ditemukan!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                    }
                                }
                            ?>

                            <!-- EDIT DATA PRESENSI -->
                            <?php
                                if (isset($_POST['editMahasiswa'])) {
                                    // Mengambil nilai dari form
                                    $id_kehadiran = $_POST['id_kehadiran'];
                                    $tanggal = $_POST['tanggal'];
                                    $keterangan = $_POST['keterangan'];
                                    // Menjalankan query UPDATE
                                    $update_data = $dbh->prepare("UPDATE `tb_kehadiran` 
                                                                    SET `TANGGAL`=?, `ID_KODE_KEHADIRAN`=?
                                                                    WHERE `ID_KEHADIRAN`=?");

                                    // Eksekusi query dengan melewatkan nilai langsung ke dalam execute()
                                    if ($update_data->execute([$tanggal, $keterangan, $id_kehadiran])) {
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
                                                    window.location.href = './ArsipPresensi.php';
                                            });
                                        </script>
                            <?php
                                    } else {
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
                                                    window.location.href = './ArsipPresensi.php';
                                            });
                                        </script>
                            <?php
                                    }
                                }
                            ?>

                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                            if (isset($_POST['filterPresensi'])) {
                                                // Mengambil nilai dari form
                                                $tanggalAwal = $_POST['tanggalAwal'];
                                                $tanggalAkhir = $_POST['tanggalAkhir'];
                                                
                                                // Filter query
                                                $query = "SELECT a.ID_KEHADIRAN, a.TANGGAL, a.ID_KODE_KEHADIRAN, b.KODE_KEHADIRAN, c.NAMA_MAHASISWA, d.NAMA_LOKASI,e.NAMA_SEKOLAH_PT
                                                FROM `tb_kehadiran` a 
                                                JOIN `tb_kode_kehadiran` b ON a.ID_KODE_KEHADIRAN = b.ID_KODE_KEHADIRAN
                                                JOIN `tb_mahasiswa` c ON a.ID_MAHASISWA = c.ID_MAHASISWA
                                                JOIN `tb_lokasi_penempatan` d ON c.ID_LOKASI = d.ID_LOKASI
                                                JOIN `tb_sekolah_pt` e ON c.ID_SEKOLAH_PT = e.ID_SEKOLAH_PT
                                                WHERE a.TANGGAL BETWEEN '$tanggalAwal' AND '$tanggalAkhir'";
                                                
                                                // Execute query and fetch data
                                                $view = $dbh->query($query);
                                            } else{
                                                // Default query
                                                $query = "SELECT a.ID_KEHADIRAN, a.TANGGAL, a.ID_KODE_KEHADIRAN, b.KODE_KEHADIRAN, c.NAMA_MAHASISWA, d.NAMA_LOKASI,e.NAMA_SEKOLAH_PT
                                                            FROM `tb_kehadiran` a 
                                                            JOIN `tb_kode_kehadiran` b ON a.ID_KODE_KEHADIRAN = b.ID_KODE_KEHADIRAN
                                                            JOIN `tb_mahasiswa` c ON a.ID_MAHASISWA = c.ID_MAHASISWA
                                                            JOIN `tb_lokasi_penempatan` d ON c.ID_LOKASI = d.ID_LOKASI
                                                            JOIN `tb_sekolah_pt` e ON c.ID_SEKOLAH_PT = e.ID_SEKOLAH_PT
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
                                                <th class="text-center">Keterangan</th>
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
                                                                <td class="text-center"><?php echo $data['TANGGAL'];?></td>
                                                                <td class="text-center"><?php echo $data['NAMA_MAHASISWA'];?></td>
                                                                <td class="text-center"><?php echo $data['NAMA_SEKOLAH_PT'];?></td>
                                                                <td class="text-center"><?php echo $data['NAMA_LOKASI'];?></td>
                                                                <td class="text-center"><?php echo $data['KODE_KEHADIRAN'];?></td>
                                                                <td class="text-center">
                                                                    <!-- Button Edit Data Mahasiswa-->
                                                                    <button type="button" class="btn btn-warning"
                                                                            data-id="<?php echo $data['ID_KEHADIRAN']; ?>"
                                                                            data-tanggal="<?php echo $data['TANGGAL']; ?>"
                                                                            data-keterangan="<?php echo $data['ID_KODE_KEHADIRAN']; ?>"
                                                                            onclick="displayEdit(this)">
                                                                        <i class="bi bi-pencil-square" style="text-decoration: none; color: inherit;"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <!-- POP UP EDIT PRESENSI -->
                                                            <div class="modal fade" id="editKehadiran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <h5 class="modal-title fs-5" id="editKehadiranLabel">Edit Presensi</h5>
                                                                        </div>
                                                                        <form method="POST" action="ArsipPresensi.php?edit=<?php echo $data["ID_KEHADIRAN"]; ?>">
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="id_kehadiran" class="form-label">ID_KEHADIRAN</label>
                                                                                    <input type="text" name="id_kehadiran" class="form-control" id="id_kehadiran" value="<?php echo $data['ID_KEHADIRAN']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="tanggal" class="form-label">Tanggal</label>
                                                                                    <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $data['TANGGAL']; ?>" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                                                    <select name="keterangan" class="form-control" id="keterangan" required>
                                                                                        <?php
                                                                                        $getketerangan = $dbh->query("SELECT * FROM `tb_kode_kehadiran`");
                                                                                        while ($pd = $getketerangan->fetch()) {
                                                                                            $id_kode_kehadiran = $pd['ID_KODE_KEHADIRAN'];
                                                                                            $kode_kehadiran = $pd['KODE_KEHADIRAN'];
                                                                                            $selected = ($data['ID_KODE_KEHADIRAN'] == $id_kode_kehadiran) ? 'selected' : '';
                                                                                            echo '<option value="' . $id_kode_kehadiran . '" ' . $selected . '>' . $id_kode_kehadiran . '-' . $kode_kehadiran . '</option>';
                                                                                        }
                                                                                        ?>
                                                                                    </select>                                                                
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary" name="editMahasiswa">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end pop up -->
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    <script>
                                                        function displayEdit(button) {
                                                            var modal = $('#editKehadiran');
                                                            modal.find('#id_kehadiran').val(button.getAttribute('data-id'));
                                                            modal.find('#tanggal').val(button.getAttribute('data-tanggal'));
                                                            modal.find('#keterangan').val(button.getAttribute('data-keterangan'));
                                                            
                                                            // Menampilkan modal
                                                            modal.modal('show');
                                                        }
                                                    </script>
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