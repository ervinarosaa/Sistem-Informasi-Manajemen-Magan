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
                        <li>
                            <a href="./DashboardMahasiswa.php">
                                <i class="bi bi-house-fill"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="active">
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
                
                <!--KUOTA-->
                <div class="content">
                    <h2 style="text-align: center;">
                        <a href="./Logbook.php" style="text-decoration: none; color: black;">LOGBOOK MAGANG</a>
                    </h2>
                    <div class="row"> 
                        <div class="col-lg-3 col-md-5 col-sm-5">
                            <!-- Button trigger modal -->
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahLogbook">
                                    <i class="bi bi-plus-square-fill" style="text-decoration: none; color: inherit; font-size:large"></i>
                                </button>
                            </div>

                            <!-- POP UP TAMBAH LOGBOOK -->
                            <div class="modal fade" id="TambahLogbook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h5 class="modal-title fs-5" id="TambahLogbookLabel">Tambah Logbook</h5>
                                        </div>
                                        <?php
                                            $update=$dbh->query("ALTER TABLE `tb_logbook` AUTO_INCREMENT = 1;");
                                        ?>
                                        <form method="POST" action="Logbook.php">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <?php
                                                        $result = $dbh->query("SELECT * FROM `tb_logbook` ORDER BY `ID_LOGBOOK` DESC LIMIT 1");
                                                        if ($result->rowCount() > 0) {
                                                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                                $IdLogbook = ($row["ID_LOGBOOK"]+1);
                                                    ?>
                                                                <input type="text" name="id_logbook" class="form-control" value="<?php echo $IdLogbook; ?>" readonly>
                                                    <?php
                                                            }
                                                        } else {
                                                            // Jika rowCount() masih kosong, tentukan nilai default untuk $IdLogbook
                                                            $IdLogbook = 1; 
                                                    ?>
                                                            <input type="text" name="id_logbook" class="form-control" value="<?php echo $IdLogbook; ?>" hidden>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggal" class="form-label">Tanggal</label>
                                                    <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Tanggal" max="<?php echo date('Y-m-d'); ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kegiatan" class="form-label">Kegiatan</label>
                                                    <div>
                                                        <textarea id="kegiatan" name="kegiatan" rows="8" cols="59" placeholder="Tuliskan dalam bentuk paragraf" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary" name="tambahLogbook">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end pop up -->
                        </div>
                    </div>
                    
                    <!-- INSERT DATA Logbook -->
                    <?php
                    if (isset($_POST['tambahLogbook'])) {
                        // Mengambil nilai dari form
                        $tanggal = $_POST['tanggal'];
                        $kegiatan = $_POST['kegiatan'];
                        $IdMahasiswa = $_SESSION['mahasiswa'];

                        // Melakukan pengecekan apakah tanggal dan id_mahasiswa sudah ada di database
                        $check_query = $dbh->prepare("SELECT COUNT(*) as total FROM `tb_logbook` WHERE `TANGGAL` = ? AND `ID_MAHASISWA` = ?");
                        $check_query->execute([$tanggal, $IdMahasiswa]);
                        $result = $check_query->fetch(PDO::FETCH_ASSOC);

                        // Jika sudah isi logbook
                        if($result['total'] > 0){
                            ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <strong>Perhatian!</strong> Logbook sudah diisi
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                        } else{
                            // Menjalankan query INSERT dengan nilai langsung
                            $sql = "INSERT INTO `tb_logbook` (`ID_MAHASISWA`, `TANGGAL`, `KEGIATAN`) 
                                    VALUES ('$IdMahasiswa', '$tanggal', '$kegiatan')";

                            // Eksekusi query
                            if ($dbh->exec($sql)) {
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
                                            window.location.href = 'Logbook.php';
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
                                                window.location.href = 'Logbook.php';
                                        });
                                    </script>
                        <?php
                            }
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
                                                <th class="text-center" style="width: 150px;">Tanggal</th>
                                                <th class="text-center" style="width: 700px;">Kegiatan</th>
                                                <th class="text-center">Aksi</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    $IdMahasiswa = $_SESSION['mahasiswa'];
                                                    $view = $dbh->query("SELECT * FROM `tb_logbook` WHERE `ID_MAHASISWA`=$IdMahasiswa ORDER BY `ID_LOGBOOK`");
                                                    if($view->rowCount()>0){
                                                        $no=1;
                                                        while($data = $view->fetch()){
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $no++; ?></td>
                                                            <td class="text-center"><?php echo $data['TANGGAL'];?></td>
                                                            <td class="text-left"><?php echo $data['KEGIATAN'];?></td>
                                                            <td class="text-center">
                                                                <!-- Button Edit Data Mahasiswa-->
                                                                <button type="button" class="btn btn-warning"
                                                                        data-id="<?php echo $data['ID_LOGBOOK']; ?>"
                                                                        data-tanggal="<?php echo $data['TANGGAL']; ?>"
                                                                        data-kegiatan="<?php echo $data['KEGIATAN']; ?>"
                                                                        onclick="displayEdit(this)">
                                                                        <i class="bi bi-pencil-square" style="text-decoration: none; color: inherit;"></i>
                                                                </button>

                                                                <!-- Delete  -->
                                                                <a href='?id_logbook=<?php echo $data["ID_LOGBOOK"]; ?>' class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </a>     
                                                        </tr>
                                                        
                                                        <!-- DELETE -->
                                                        <?php
                                                            if (isset($_GET['id_logbook'])) {
                                                                try {
                                                                    $deleteId = $_GET['id_logbook'];
                                                                    $stmt = $dbh->prepare("DELETE FROM `tb_logbook` WHERE `ID_LOGBOOK` = ?");
                                                                    $stmt->bindParam(1, $deleteId);
                                                                    if ($stmt->execute()) {
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
                                                                                    window.location.href = 'Logbook.php';
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
                                                                                    window.location.href = 'Logbook.php';
                                                                            });
                                                                        </script>
                                                        <?php
                                                                    }
                                                                } catch (PDOException) {
                                                                    // Handle database error
                                                                    ?>
                                                                        <script>
                                                                            Swal.fire({
                                                                                icon: "danger",
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
                                                        
                                                        <script>
                                                            function displayEdit(button) {
                                                                var modalId = button.getAttribute('data-id');
                                                                var modal = $('#editLogbook-' + modalId);
                                                                modal.find('#IdLogbook').val(modalId);
                                                                modal.find('#tanggal').val(button.getAttribute('data-tanggal'));
                                                                modal.find('#kegiatan').val(button.getAttribute('data-kegiatan'));
                                                                // Menampilkan modal
                                                                modal.modal('show');
                                                            }
                                                        </script>

                                                        <!-- POP UP EDIT LOCATION -->
                                                        <div class="modal fade" id="editLogbook-<?php echo $data['ID_LOGBOOK']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <h5 class="modal-title fs-5" id="editLogbookLabel">Edit Logbook</h5>
                                                                    </div>
                                                                    <form method="POST" action="Logbook.php?edit=<?php echo $data["ID_LOGBOOK"]; ?>">
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="ID_LOGBOOK" class="form-label">ID Logbook</label>
                                                                                <input type="text" name="ID_LOGBOOK" class="form-control" value="<?php echo $data['ID_LOGBOOK']; ?>" readonly>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                                                <input type="text" name="tanggal" class="form-control" id="tanggal" value="<?php echo $data['TANGGAL']; ?>" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="kegiatan" class="form-label">Kegiatan</label>
                                                                                <div>
                                                                                    <textarea id="kegiatan" name="kegiatan" value="<?php echo $data['KEGIATAN']; ?>" rows="8" cols="59" required></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                            <button type="submit" class="btn btn-primary" name="edit_logbook">Simpan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end pop up -->

                                                        <!-- EDIT DATA Logbook -->
                                                        <?php
                                                            if (isset($_POST['edit_logbook'])) {
                                                                // Mengambil nilai dari form
                                                                $IdLogbook = $_POST['ID_LOGBOOK'];
                                                                $tanggal = $_POST['tanggal'];
                                                                $kegiatan = $_POST['kegiatan'];

                                                                // Menjalankan query UPDATE
                                                                $update_logbook = $dbh->prepare("UPDATE `tb_logbook` 
                                                                                                SET `TANGGAL`=?, `KEGIATAN`=?
                                                                                                WHERE `ID_LOGBOOK`=$IdLogbook");

                                                                // Eksekusi query dengan melewatkan nilai langsung ke dalam execute()
                                                                if ($update_logbook->execute([$tanggal, $kegiatan])) {
                                                                    echo '<script>alert("Data berhasil disimpan");</script>';
                                                                    echo '<script>window.location.href = "Logbook.php";</script>';                                                                
                                                                } else{
                                                        ?>
                                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                                        <strong>Sukses!</strong> Logbook gagal diubah
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                        <?php
                                                                }
                                                            }
                                                        ?>
                                                            
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