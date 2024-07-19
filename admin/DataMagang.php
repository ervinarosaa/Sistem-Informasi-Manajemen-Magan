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
                        <li class="active">
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
                        <a href="./DataMagang.php" style="text-decoration: none; color: black;">DATA MAGANG</a>
                    </h2>
                    
                    <div class="row"> 
                        <div class="d-flex justify-content col-lg-8 col-md-8 col-sm-8">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudent">
                                <i class="bi bi-person-fill-add" style="text-decoration: none; color: inherit; font-size:medium"></i>
                            </button>

                            <!-- Cetak Laporan Data Magang -->
                            <div style="font-size:medium;">
                                <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#exportDataMagang">
                                    Export
                                </button>
                            </div>

                            <!-- Formulir Filter -->
                            <form id="filterForm" style="margin: 10px;">
                                <select class="form-control" style="font-size:large;" id="filterTingkatPendidikan" name="filterTingkatPendidikan" onchange="updateTable()">
                                    <option value="">Pilih Filter</option>
                                    <option value="Sekolah" <?php if(isset($_GET['filterTingkatPendidikan']) && $_GET['filterTingkatPendidikan'] == "Sekolah") echo "selected"; ?>>Sekolah Kejuruan</option>
                                    <option value="PeguruanTinggi"  <?php if(isset($_GET['filterTingkatPendidikan']) && $_GET['filterTingkatPendidikan'] == "PeguruanTinggi") echo "selected"; ?>>Perguruan Tinggi</option>
                                    <!-- Tambahkan opsi untuk universitas lainnya sesuai kebutuhan -->
                                </select>
                            </form>
                        </div>

                        <!-- POP UP EXPORT PRESENSI -->
                        <div class="modal fade" id="exportDataMagang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title fs-5" id="exportDataMagangLabel">Export Data Magang</h5>
                                    </div>
                                    <form method="POST" action="DataMagang-export.php">
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
                                            <input type="submit" class="btn btn-primary" name="exportDataMagang" value="Export">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end pop up -->

                        <!-- POP UP IMPORT PRESENSI -->
                        <div class="modal fade" id="importDataMagang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title fs-5" id="exportDataMagangLabel">Import Data Magang</h5>
                                    </div>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="tanggalAwal" class="form-label">Pilih File</label>
                                                <input type="file" name="excel" class="form-control" required value="">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <input type="submit" class="btn btn-primary" name="importDataMagang" value="Import Excel">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end pop up -->
                        
                        <div class="col-lg-3 col-md-5 col-sm-5"> 
                            <!-- POP UP ADD Student -->
                            <div class="modal fade" id="addStudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h5 class="modal-title fs-5" id="addStudentLabel">Tambah Mahasiswa</h5>
                                        </div>
                                        <?php
                                            $update=$dbh->query("ALTER TABLE `tb_mahasiswa` AUTO_INCREMENT = 1;");
                                        ?>
                                        <form method="POST" action="DataMagang.php">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="ID_MAHASISWA" class="form-label">ID Mahasiswa</label>
                                                    <?php
                                                        $result = $dbh->query("SELECT * FROM `tb_mahasiswa` ORDER BY `ID_MAHASISWA` DESC LIMIT 1");
                                                        if ($result->rowCount() > 0) {
                                                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                                $IdMahasiswa = ($row["ID_MAHASISWA"]+1);
                                                    ?>
                                                    <input type="text" name="ID_MAHASISWA" class="form-control" value="<?php echo $IdMahasiswa; ?>" readonly>
                                                    <?php
                                                            }
                                                        } else {
                                                            // Jika rowCount() masih kosong, tentukan nilai default untuk $IdMahasiswa
                                                            $IdMahasiswa = 1; 
                                                    ?>
                                                            <input type="text" name="ID_MAHASISWA" class="form-control" value="<?php echo $IdMahasiswa; ?>" readonly>
                                                        <?php
                                                        }
                                                        ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                                                    <input type="text" name="namaMahasiswa" class="form-control" id="namaMahasiswa" placeholder="Nama Mahasiswa" oninput="this.value = this.value.toUpperCase()" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nisMahasiswa" class="form-label">NIS</label>
                                                    <input type="text" name="nisMahasiswa" class="form-control" id="nisMahasiswa" placeholder="Nomor Induk Siswa" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamatMahasiswa" class="form-label">Alamat Mahasiswa</label>
                                                    <input type="text" name="alamatMahasiswa" class="form-control" id="alamatMahasiswa" placeholder="Alamat Mahasiswa" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                                                    <input type="text" name="nomorTelepon" class="form-control" id="nomorTelepon" placeholder="Nomor Telepon" required>
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
                                                    <label for="jurusan" class="form-label">Jurusan</label>
                                                    <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pembimbing" class="form-label">Nama Guru/Dosen Pembimbing</label>
                                                    <input type="text" name="pembimbing" class="form-control" id="pembimbing" placeholder="Nama Guru/Dosen Pembimbing">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kontak_pembimbing" class="form-label">Kontak Guru/Dosen Pembimbing</label>
                                                    <input type="text" name="kontak_pembimbing" class="form-control" id="kontak_pembimbing" placeholder=" Kontak Guru/Dosen Pembimbing">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="lokasi" class="form-label">Lokasi</label>
                                                    <select name="id_lokasi" class="form-control" id="id_lokasi" required>
                                                        <?php
                                                            $getlokasi = $dbh->query("SELECT * FROM `tb_lokasi_penempatan` WHERE `KUOTA`-`KUOTA_TERISI` > 0");
                                                            while ($lk = $getlokasi->fetch()) {
                                                                $id_lokasi = $lk['ID_LOKASI'];
                                                                $nama_lokasi = $lk['NAMA_LOKASI']; // Corrected variable name
                                                                echo '<option value="'.$id_lokasi.'">'.$nama_lokasi.'</option>'; // Corrected echo statement
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Start" class="form-label">Mulai Magang </label>
                                                    <input type="date" class="form-control" name="Start" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Finish" class="form-label">Selesai Magang</label>
                                                    <input type="date" class="form-control" name="Finish" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select name="id_status" class="form-control" id="id_status" required>
                                                        <?php
                                                            $getstatus = $dbh->query("SELECT * FROM `tb_status`");
                                                            while ($st = $getstatus->fetch()) {
                                                                $id_status = $st['ID_STATUS'];
                                                                $status = $st['STATUS']; // Corrected variable name
                                                                echo '<option value="'.$id_status.'">'.$status.'</option>'; // Corrected echo statement
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary" name="tambahMahasiswa">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end pop up -->
                        </div>
                    </div>

                    <!-- INSERT DATA MAHASISWA -->
                    <?php
                        if (isset($_POST['tambahMahasiswa'])) {
                            // Mengambil nilai dari form
                            $IdMahasiswa = $_POST['ID_MAHASISWA'];
                            $lokasi = $_POST['id_lokasi'];
                            $mahasiswa = $_POST['namaMahasiswa'];
                            $nis = $_POST['nisMahasiswa'];
                            $alamat = $_POST['alamatMahasiswa'];
                            $telp = $_POST['nomorTelepon'];
                            $sekolah_pt = $_POST['sekolah_pt'];
                            $jurusan = $_POST['jurusan'];
                            $pembimbing = $_POST['pembimbing'];
                            $kontak_pembimbing = $_POST['kontak_pembimbing'];
                            $mulai = $_POST['Start'];
                            $selesai = $_POST['Finish'];
                            $id_status = $_POST['id_status']; // Added a missing semicolon here
                            $username = $nis;
                            $password = $nis . date('dmY', strtotime($mulai));
                            $id_nilai = 1;
                        
                            // Menjalankan query INSERT
                            $insert_student = $dbh->prepare("INSERT INTO `tb_mahasiswa` (`ID_LOKASI`, `USERNAME`, `PASSWORD`, `NAMA_MAHASISWA`, `NIS`, `ALAMAT_MAHASISWA`, `NO_TELP`, `ID_SEKOLAH_PT`, `JURUSAN`, `DOSEN_GURU_PEMBIMBING`, `KONTAK_PEMBIMBING`, `MULAI_MAGANG`, `SELESAI_MAGANG`, `ID_STATUS`, `ID_NILAI`) 
                                                            VALUES ('$lokasi', '$username', '$password', '$mahasiswa', '$nis', '$alamat', '$telp', '$sekolah_pt', '$jurusan', '$pembimbing', '$kontak_pembimbing', '$mulai', '$selesai', '$id_status', '$id_nilai')");

                            if ($insert_student->execute()) {
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
                                            window.location.href = './DataMagang.php';
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
                                        window.location.href = './DataMagang.php';
                                    });
                                </script>
                            <?php
                            }
                        }               
                    ?>

                    <!-- TABEL -->
                    <div class="row">
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
                                                        WHERE c.STATUS = 'Aktif'
                                                        ORDER BY `SELESAI_MAGANG` ASC";

                                            // Update query based on filter
                                            if (isset($_GET['filterTingkatPendidikan'])) {
                                                $filterValue = $_GET['filterTingkatPendidikan'];
                                                if ($filterValue === "Sekolah") {
                                                    $query = "SELECT * FROM `tb_mahasiswa` a 
                                                                JOIN `tb_lokasi_penempatan` b ON a.ID_LOKASI = b.ID_LOKASI 
                                                                JOIN `tb_status` c ON a.ID_STATUS = c.ID_STATUS 
                                                                JOIN `tb_sekolah_pt` d ON a.ID_SEKOLAH_PT = d.ID_SEKOLAH_PT
                                                                JOIN `tb_pendidikan` e ON d.ID_PENDIDIKAN = e.ID_PENDIDIKAN
                                                                WHERE c.STATUS = 'Aktif' AND e.TINGKAT_PENDIDIKAN = 'Sekolah Kejuruan'
                                                                ORDER BY `SELESAI_MAGANG` ASC;";
                                                } elseif ($filterValue === "PeguruanTinggi") {
                                                    $query = "SELECT * FROM `tb_mahasiswa` a 
                                                                JOIN `tb_lokasi_penempatan` b ON a.ID_LOKASI = b.ID_LOKASI 
                                                                JOIN `tb_status` c ON a.ID_STATUS = c.ID_STATUS 
                                                                JOIN `tb_sekolah_pt` d ON a.ID_SEKOLAH_PT = d.ID_SEKOLAH_PT
                                                                JOIN `tb_pendidikan` e ON d.ID_PENDIDIKAN = e.ID_PENDIDIKAN
                                                                WHERE c.STATUS = 'Aktif' AND e.TINGKAT_PENDIDIKAN = 'Perguruan Tinggi'
                                                                ORDER BY `SELESAI_MAGANG` ASC;";
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
                                                <th class="text-center">Status</th>
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
                                                            <td class="text-center"><?php echo $data['STATUS'];?></td>
                                                            <td class="text-center">
                                                                <!-- Button Lihat Data Mahasiswa -->
                                                                <button type="button" class="btn btn-info" onclick="displayData(<?php echo $data['ID_MAHASISWA']; ?>)" data-bs-toggle="modal" data-bs-target="#viewStudent" style="text-decoration: none; color: inherit;">
                                                                    <i class="bi-eye-fill" style="text-decoration: none; color: inherit;"></i>
                                                                </button>
                                                                
                                                                <!-- Button Edit Data Mahasiswa-->
                                                                <button type="button" class="btn btn-warning"
                                                                        data-id="<?php echo $data['ID_MAHASISWA']; ?>"
                                                                        data-nama="<?php echo $data['NAMA_MAHASISWA']; ?>"
                                                                        data-nis="<?php echo $data['NIS']; ?>"
                                                                        data-alamat="<?php echo $data['ALAMAT_MAHASISWA']; ?>"
                                                                        data-telp="<?php echo $data['NO_TELP']; ?>"
                                                                        data-asal-pt="<?php echo $data['ID_SEKOLAH_PT']; ?>"
                                                                        data-jurusan="<?php echo $data['JURUSAN']; ?>"
                                                                        data-pembimbing="<?php echo $data['DOSEN_GURU_PEMBIMBING']; ?>"
                                                                        data-kontak-pembimbing="<?php echo $data['KONTAK_PEMBIMBING']; ?>"
                                                                        data-lokasi="<?php echo $data['ID_LOKASI']; ?>"
                                                                        data-start="<?php echo $data['MULAI_MAGANG']; ?>"
                                                                        data-finish="<?php echo $data['SELESAI_MAGANG']; ?>"
                                                                        data-status="<?php echo $data['STATUS']; ?>"
                                                                        onclick="displayEdit(this)">
                                                                    <i class="bi bi-pencil-square" style="text-decoration: none; color: inherit;"></i>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <script>
                                                            function displayData(id) {
                                                                $('#viewStudent-' + id).modal('show');
                                                            }

                                                            function displayEdit(button) {
                                                                var modal = $('#editStudent');
                                                                modal.find('#idMahasiswa').val(button.getAttribute('data-id'));
                                                                modal.find('#namaMahasiswa').val(button.getAttribute('data-nama'));
                                                                modal.find('#nisMahasiswa').val(button.getAttribute('data-nis'));
                                                                modal.find('#alamatMahasiswa').val(button.getAttribute('data-alamat'));
                                                                modal.find('#nomorTelepon').val(button.getAttribute('data-telp'));
                                                                modal.find('#asal_sekolah_pt').val(button.getAttribute('data-asal-pt'));
                                                                modal.find('#jurusan').val(button.getAttribute('data-jurusan'));
                                                                modal.find('#nama_pembimbing').val(button.getAttribute('data-pembimbing'));
                                                                modal.find('#kontak_pembimbing').val(button.getAttribute('data-kontak-pembimbing'));
                                                                modal.find('#id_lokasi').val(button.getAttribute('data-lokasi'));
                                                                modal.find('#Start').val(button.getAttribute('data-start'));
                                                                modal.find('#Finish').val(button.getAttribute('data-finish'));
                                                                modal.find('#status').val(button.getAttribute('data-status'));
                                                                
                                                                // Menampilkan modal
                                                                modal.modal('show');
                                                            }
                                                        </script>

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
                                                                    <form method="POST" action="DataMagang.php?view=<?php echo $data["ID_MAHASISWA"]; ?>">
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
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tutup</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end pop up -->

                                                        <!-- POP UP EDIT Student -->
                                                        <div class="modal fade" id="editStudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <h5 class="modal-title fs-5" id="editStudentLabel">Edit Data Mahasiswa</h5>
                                                                    </div>
                                                                    <form method="POST" action="DataMagang.php?edit=<?php echo $data["ID_MAHASISWA"]; ?>">
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="idMahasiswa" class="form-label">ID Mahasiswa</label>
                                                                                <input type="text" name="idMahasiswa" class="form-control" id="idMahasiswa" value="<?php echo $data['ID_MAHASISWA']; ?>" readonly>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                                                                                <input type="text" name="namaMahasiswa" class="form-control" id="namaMahasiswa" value="<?php echo $data['NAMA_MAHASISWA']; ?>" oninput="this.value = this.value.toUpperCase()" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="nisMahasiswa" class="form-label">NIS</label>
                                                                                <input type="text" name="nisMahasiswa" class="form-control" id="nisMahasiswa" value="<?php echo $data['NIS']; ?>" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="alamatMahasiswa" class="form-label">Alamat Mahasiswa</label>
                                                                                <input type="text" name="alamatMahasiswa" class="form-control" id="alamatMahasiswa" value="<?php echo $data['ALAMAT_MAHASISWA']; ?>" >
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                                                                                <input type="text" name="nomorTelepon" class="form-control" id="nomorTelepon" value="<?php echo $data['NO_TELP']; ?>" >
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="asal_sekolah_pt" class="form-label">Asal Sekolah/PT</label>
                                                                                <select name="asal_sekolah_pt" class="form-control" id="asal_sekolah_pt" required>
                                                                                    <?php
                                                                                    $getpendidikan = $dbh->query("SELECT * FROM `tb_sekolah_pt`");
                                                                                    while ($pd = $getpendidikan->fetch()) {
                                                                                        $id_sekolah_pt = $pd['ID_SEKOLAH_PT'];
                                                                                        $nama_sekolah_pt = $pd['NAMA_SEKOLAH_PT'];
                                                                                        $selected = ($data['ID_SEKOLAH_PT'] == $id_sekolah_pt) ? 'selected' : '';
                                                                                        echo '<option value="' . $id_sekolah_pt . '" ' . $selected . '>' . $id_sekolah_pt . '-' . $nama_sekolah_pt . '</option>';
                                                                                    }
                                                                                    ?>
                                                                                </select>                                                                
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="jurusan" class="form-label">Jurusan</label>
                                                                                <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?php echo $data['JURUSAN']; ?>" >
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="pembimbing" class="form-label">Nama Guru/Dosen Pembimbing</label>
                                                                                <input type="text" name="nama_pembimbing" class="form-control" id="nama_pembimbing" placeholder="Nama Guru/Dosen Pembimbing">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="kontak_pembimbing" class="form-label">Kontak Guru/Dosen Pembimbing</label>
                                                                                <input type="text" name="kontak_pembimbing" class="form-control" id="kontak_pembimbing" placeholder=" Kontak Guru/Dosen Pembimbing">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="lokasi" class="form-label">Lokasi</label>
                                                                                <select name="id_lokasi" id="id_lokasi" class="form-control" required>
                                                                                    <?php
                                                                                    $getlokasi = $dbh->query("SELECT * FROM `tb_lokasi_penempatan` WHERE `KUOTA` > 0");
                                                                                    while ($lk = $getlokasi->fetch()) {
                                                                                        $id_lokasi = $lk['ID_LOKASI'];
                                                                                        $nama_lokasi = $lk['NAMA_LOKASI'];
                                                                                        // Cek apakah id_lokasi dari data sama dengan id_lokasi yang dimiliki oleh data yang diambil dari database
                                                                                        $selected = ($data['ID_LOKASI'] == $id_lokasi) ? 'selected' : '';
                                                                                        echo '<option value="' . $id_lokasi . '" ' . $selected . '>' . $id_lokasi . '-' . $nama_lokasi . '</option>';
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="Start" class="form-label">Mulai Magang </label>
                                                                                <input type="date" name="Start" class="form-control" id="Start" value="<?php echo $data['MULAI_MAGANG']; ?>" >
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="Finish" class="form-label">Selesai Magang</label>
                                                                                <input type="date" name="Finish" class="form-control" id="Finish" value="<?php echo $data['SELESAI_MAGANG']; ?>">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="status" class="form-label">Status</label>
                                                                                <select name="id_status" id="id_status" class="form-control" required>
                                                                                    <?php
                                                                                    $getstatus = $dbh->query("SELECT * FROM `tb_status`");
                                                                                    while ($st = $getstatus->fetch()) {
                                                                                        $id_status = $st['ID_STATUS'];
                                                                                        $status = $st['STATUS'];
                                                                                        // Cek apakah id_status dari data sama dengan id_status yang dimiliki oleh data yang diambil dari database
                                                                                        $selected = ($data['ID_STATUS'] == $id_status) ? 'selected' : '';
                                                                                        echo '<option value="' . $id_status . '" ' . $selected . '>' . $id_status . '-' . $status . '</option>';
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
                                            </tbody>
                                        </table>

                                        <!-- EDIT DATA MAHASISWA -->
                                        <?php
                                            if (isset($_POST['editMahasiswa'])) {
                                                // Mengambil nilai dari form
                                                $IdMahasiswa = $_POST['idMahasiswa'];
                                                $lokasi = $_POST['id_lokasi'];
                                                $mahasiswa = $_POST['namaMahasiswa'];
                                                $nis = $_POST['nisMahasiswa'];
                                                $alamat = $_POST['alamatMahasiswa'];
                                                $telp = $_POST['nomorTelepon'];
                                                $asal_sekolah_pt = $_POST['asal_sekolah_pt'];
                                                $jurusan = $_POST['jurusan'];
                                                $pembimbing = $_POST['nama_pembimbing'];
                                                $kontak_pembimbing = $_POST['kontak_pembimbing'];
                                                $mulai = $_POST['Start'];
                                                $selesai = $_POST['Finish'];
                                                $id_status = $_POST['id_status'];
                                                // Menjalankan query UPDATE
                                                $update_data = $dbh->prepare("UPDATE `tb_mahasiswa` 
                                                                                SET `ID_LOKASI`='$lokasi', `NAMA_MAHASISWA`='$mahasiswa', `NIS`='$nis', `ALAMAT_MAHASISWA`='$alamat', `NO_TELP`='$telp', `ID_SEKOLAH_PT`='$asal_sekolah_pt', `JURUSAN`='$jurusan', 
                                                                                    `DOSEN_GURU_PEMBIMBING`='$pembimbing', `KONTAK_PEMBIMBING`='$kontak_pembimbing', `MULAI_MAGANG`='$mulai', `SELESAI_MAGANG`='$selesai', `ID_STATUS`='$id_status'                                                                                                    
                                                                                WHERE `ID_MAHASISWA`='$IdMahasiswa'");
                                                // Eksekusi query dengan melewatkan nilai langsung ke dalam execute()
                                                if ($update_data->execute()) {
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
                                                                window.location.href = 'DataMagang.php';
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
                                                                window.location.href = 'DashboardMahasiswa.php';
                                                        });
                                                    </script>
                                        <?php
                                                }
                                            }
                                        ?>
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
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/demo/demo.js"></script>
        <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    </body>

</html>