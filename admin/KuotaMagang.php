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
                        <li class="active">
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
                
                <!--KUOTA-->
                <div class="content">
                    <h2 style="text-align: center;">
                        <a href="./KuotaMagang.php" style="text-decoration: none; color: black;">KUOTA MAGANG</a>
                    </h2>
                    <div class="row"> 
                        <!-- Button trigger modal -->
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createLocation">
                                <i class="bi bi-plus-square-fill" style="text-decoration: none; color: inherit; font-size:large"></i>
                            </button>
                        </div>
                            
                        <!-- POP UP CREATE LOCATION -->
                        <div class="modal fade" id="createLocation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title fs-5" id="createLocationLabel">Tambah Lokasi</h5>
                                    </div>
                                    <?php
                                        $update=$dbh->query("ALTER TABLE `tb_lokasi_penempatan` AUTO_INCREMENT = 1;");
                                    ?>
                                    <form method="POST" action="KuotaMagang.php">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="ID_LOKASI" class="form-label">ID Lokasi</label>
                                                <?php
                                                    $result = $dbh->query("SELECT * FROM `tb_lokasi_penempatan` ORDER BY `ID_LOKASI` DESC LIMIT 1");
                                                    if ($result->rowCount() > 0) {
                                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                        $IdLokasi = ($row["ID_LOKASI"]+1);
                                                ?>
                                                <input type="text" name="ID_LOKASI" class="form-control" value="<?php echo $IdLokasi; ?>" readonly>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="namaLokasi" class="form-label">Nama Lokasi</label>
                                                <input type="text" name="namaLokasi" class="form-control" id="namaLokasi" placeholder="Nama Lokasi">
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamatLokasi" class="form-label">Alamat Lokasi</label>
                                                <input type="text" name="alamatLokasi" class="form-control" id="alamatLokasi" placeholder="Alamat Lokasi">
                                            </div>
                                            <div class="mb-3">
                                                <label for="kuotaLokasi" class="form-label">Kuota Lokasi</label>
                                                <input type="number" name="kuotaLokasi" class="form-control" id="kuotaLokasi" placeholder="Kuota">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" name="tambahLokasi">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end pop up -->
                    </div>
                    
                    <!-- INSERT DATA LOKASI -->
                    <?php
                        if (isset($_POST['tambahLokasi'])) {
                            // Mengambil nilai dari form
                            $nama_lokasi = $_POST['namaLokasi'];
                            $alamat_lokasi = $_POST['alamatLokasi'];
                            $kuota = $_POST['kuotaLokasi'];
                            // Menjalankan query INSERT
                            $insert_lokasi = $dbh->prepare("INSERT INTO `tb_lokasi_penempatan` (`NAMA_LOKASI`,`ALAMAT_LOKASI`,`KUOTA`) 
                                                            VALUES ('$nama_lokasi','$alamat_lokasi', $kuota)");
                            if ($insert_lokasi->execute()) {
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
                                            window.location.href = './KuotaMagang.php';
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
                                            window.location.href = './KuotaMagang.php';
                                    });
                                </script>
                    <?php
                            }
                        }
                    ?>

                    <!-- DELETE SLOKASI -->
                    <?php
                    if (isset($_GET['lokasi_id'])) {
                        // Mengambil nilai dari form
                        $deleteId = $_GET['lokasi_id'];

                        // Melakukan pengecekan apakah nama_sekolah_pt sudah ada di database
                        $check_query = $dbh->query("SELECT COUNT(*) as total FROM `tb_mahasiswa` WHERE `ID_LOKASI` = $deleteId");

                        $total_rows = $check_query->fetchColumn();

                        $notifikasi = false;
                        // Jika sudah ada, tampilkan alert
                        if ($total_rows > 0) {
                            if($notifikasi == false){
                    ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <strong>Perhatian!</strong> Lokasi tidak bisa dihapus
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    <?php
                            // Set notifikasi ke true agar tidak ditampilkan lagi
                                $notifikasi = true;
                            }
                        } else {
                    ?>
                            <?php
                            // Hapus data dari database
                            $deleteLokasi = $dbh->prepare("DELETE FROM `tb_lokasi_penempatan` WHERE `ID_LOKASI` = ?");
                            if ($deleteLokasi->execute([$deleteId])) {
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
                                            window.location.href = './KuotaMagang.php';
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
                                            window.location.href = './KuotaMagang.php';
                                    });
                                </script>
                        <?php
                            }
                        ?>
                    <?php
                        }
                    }
                    ?>

                    <!-- EDIT DATA LOKASI -->
                    <?php
                        if (isset($_POST['edit_lokasi'])) {
                            // Mengambil nilai dari form
                            $IdLokasi = $_POST['ID_LOKASI'];
                            $namaLokasi = $_POST['namaLokasi'];
                            $alamatLokasi = $_POST['alamatLokasi'];
                            $kuota = $_POST['kuotaLokasi'];

                            // Menjalankan query UPDATE
                            $update_lokasi = $dbh->prepare("UPDATE `tb_lokasi_penempatan` 
                                                            SET `NAMA_LOKASI`=?, `ALAMAT_LOKASI`=?, `KUOTA`=?
                                                            WHERE `ID_LOKASI`=$IdLokasi");

                            // Eksekusi query dengan melewatkan nilai langsung ke dalam execute()
                            if ($update_lokasi->execute([$namaLokasi, $alamatLokasi, $kuota])) {
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
                                            window.location.href = './KuotaMagang.php';
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
                                            window.location.href = './KuotaMagang.php';
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
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th class="text-center">No</th>
                                                <th class="text-center">Lokasi</th>
                                                <th class="text-center">Alamat Lokasi</th>
                                                <th class="text-center">Kuota</th>
                                                <th class="text-center">Kuota Terisi</th>
                                                <th class="text-center">Aksi</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    $view = $dbh->query("SELECT * FROM `tb_lokasi_penempatan` ORDER BY `KUOTA` DESC;");
                                                    if($view->rowCount()>0){
                                                        $no=1;
                                                        while($data = $view->fetch()){
                                                    ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $no++; ?></td>
                                                                <td class="text-left"><?php echo $data['NAMA_LOKASI'];?></td>
                                                                <td class="text-left"><?php echo $data['ALAMAT_LOKASI'];?></td>
                                                                <td class="text-center"><?php echo $data['KUOTA'];?></td>
                                                                <td class="text-center"><?php echo $data['KUOTA_TERISI'];?></td>
                                                                <td class="text-center">
                                                                    <!-- Button Edit Data Mahasiswa-->
                                                                    <button type="button" class="btn btn-warning"
                                                                        data-id="<?php echo $data['ID_LOKASI']; ?>"
                                                                        data-nama="<?php echo $data['NAMA_LOKASI']; ?>"
                                                                        data-alamat="<?php echo $data['ALAMAT_LOKASI']; ?>"
                                                                        kuota="<?php echo $data['KUOTA']; ?>"
                                                                        onclick="displayEdit(this)">
                                                                        <i class="bi bi-pencil-square" style="text-decoration: none; color: inherit;"></i>
                                                                    </button>

                                                                    <!-- Delete  -->
                                                                    <a href='?lokasi_id=<?php echo $data["ID_LOKASI"]; ?>' class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                                                        <i class="bi bi-trash-fill"></i>
                                                                    </a>     
                                                            </tr>
                                                            
                                                            <script>
                                                                function displayEdit(button) {
                                                                    var modalId = button.getAttribute('data-id');
                                                                    var modal = $('#editLokasi-' + modalId);
                                                                    modal.find('#IdLokasi').val(modalId);
                                                                    modal.find('#namaLokasi').val(button.getAttribute('data-nama'));
                                                                    modal.find('#alamatLokasi').val(button.getAttribute('data-alamat'));
                                                                    modal.find('#kuotaLokasi').val(button.getAttribute('kuota'));
                                                                    // Menampilkan modal
                                                                    modal.modal('show');
                                                                }
                                                            </script>

                                                            <!-- POP UP EDIT LOCATION -->
                                                            <div class="modal fade" id="editLokasi-<?php echo $data['ID_LOKASI']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <h5 class="modal-title fs-5" id="editLocationLabel">Edit Lokasi Magang</h5>
                                                                        </div>
                                                                        <form method="POST" action="KuotaMagang.php?edit=<?php echo $data["ID_LOKASI"]; ?>">
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="ID_LOKASI" class="form-label">ID Lokasi</label>
                                                                                    <input type="text" name="ID_LOKASI" class="form-control" value="<?php echo $data['ID_LOKASI']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="namaLokasi" class="form-label">Nama Lokasi</label>
                                                                                    <input type="text" name="namaLokasi" class="form-control" id="namaLokasi" value="<?php echo $data['NAMA_LOKASI']; ?>" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="alamatLokasi" class="form-label">Alamat Lokasi</label>
                                                                                    <input type="text" name="alamatLokasi" class="form-control" id="alamatLokasi" value="<?php echo $data['ALAMAT_LOKASI']; ?>" required> 
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="kuotaLokasi" class="form-label">Kuota Lokasi</label>
                                                                                    <input type="number" name="kuotaLokasi" class="form-control" id="kuotaLokasi" value="<?php echo $data['KUOTA']; ?>" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-primary" name="edit_lokasi">Simpan</button>
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
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end tabel tampil -->

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
                <!-- akhir content -->
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