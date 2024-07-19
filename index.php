<?php
    include './koneksi.php';
    session_start();

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM tb_admin WHERE USERNAME = '$username' AND PASSWORD = '$password'";
        $result = mysqli_query($koneksi, $sql);
        
        if($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                $_SESSION['username'] = $row['USERNAME'];
                $_SESSION['admin'] = $row['ID_ADMIN'];
            };
            header("Location:./admin/Dashboard.php");
            exit();
        } else if($result && mysqli_num_rows($result) <= 0) {
            $sql = "SELECT * FROM tb_mahasiswa WHERE USERNAME = '$username' AND PASSWORD = '$password'";
            $result = mysqli_query($koneksi, $sql);
            
            if($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    $_SESSION['username'] = $row['USERNAME'];
                    $_SESSION['mahasiswa'] = $row['ID_MAHASISWA'];
                };
                header("Location:./mahasiswa/DashboardMahasiswa.php");
                exit();
            } else {
                echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
            }
        }else {
            echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login</title>
        <link rel="icon" type="image/png" href="../assets/img/LOGO KEMENAG.png">
        <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
        <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            /* Tambahkan aturan CSS untuk mengubah font-family menjadi Arial */
            body, input {
                font-family: Arial, sans-serif;
            }
            /* CSS untuk mengubah background button */
            .btn-primary {
                background-color: #388355; /* Warna latar belakang tombol */
                border-color: #388355; /* Warna tepi tombol */
            }

            /* CSS untuk mengubah background saat tombol diklik */
            .btn-primary:active,
            .btn-primary:focus,
            .btn-primary:active:focus,
            .btn-primary:hover,
            .btn-primary:active:hover {
                background-color: #EEEEEE !important; /* Warna latar belakang saat tombol diklik atau fokus */
                border-color: #3B8B5A; /* Warna tepi saat tombol diklik atau fokus */
                box-shadow: none; /* Menghapus efek bayangan saat tombol diklik atau fokus */
            }

            /* CSS untuk mengubah background input */
            .form-control-user {
                background-color: #EEEEEE; /* Warna latar belakang input */
                border-color: #96C8A4; /* Warna tepi input */
            }

            /* CSS untuk mengubah warna placeholder */
            .form-control-user::placeholder {
                color: #316244; /* Warna placeholder */
            }

            /* CSS untuk mengubah background saat input mendapat fokus */
            .form-control-user:focus {
                background-color: #A9D1B4; /* Warna latar belakang saat input mendapat fokus */
                border-color: #A9D1B4; /* Warna tepi saat input mendapat fokus */
            }

            /* CSS untuk mengatur agar halaman tidak bisa di-scroll */
            body {
                overflow: hidden;
            }

            /* CSS untuk menengahkan kartu login di tengah layar */
            .center-card {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            /* CSS untuk membatasi lebar kartu */
            .card {
                max-width: 700px; /* Lebar kartu */
                max-height: 350px; /* Tinggi kartu */
            }
        </style>
    </head>

    <body class="bg-gradient-primary">
        <div class="center-card">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block"><img src="./assets/img/kemenag.png" style="width: 100%; height: 100%"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="admin" method='POST' action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" placeholder="Username" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" placeholder="Password" name="password" required>
                                    </div>
                                    <button name="submit" class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../assets/js/sb-admin-2.min.js"></script>
    </body>
</html>
