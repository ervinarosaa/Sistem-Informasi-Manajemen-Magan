<?php
include  '../koneksi.php';
// session_start();
// Periksa apakah sesi login pengguna tidak ada
if (!isset($_SESSION['admin'])) {
    // Redirect pengguna ke halaman login
    header("Location: ../index.php");
    exit; // Pastikan untuk keluar dari skrip setelah melakukan redirect
} else{
    $admin=$_SESSION['admin'];

    // Set the timezone to Asia/Jakarta
    date_default_timezone_set('Asia/Jakarta');

    // Set the locale to Indonesian
    setlocale(LC_TIME, 'id_ID');

    // Get the current timestamp
    $timestamp = time();
    $mulai_magang_timestamp = strtotime($row['MULAI_MAGANG']);
    $selesai_magang_timestamp = strtotime($row['SELESAI_MAGANG']);

    // Define arrays for day of the week and month names
    // $english_days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

    // $indonesian_days = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    $indonesian_months = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    // Get the day of the week index (0 for Sunday, 1 for Monday, etc.)
    // $day_index = date('w', $timestamp);

    // Get the day of the month
    $day = date('j', $timestamp);
    $day_start = date('j', $mulai_magang_timestamp);
    $day_finish = date('j', $selesai_magang_timestamp);

    // Get the month index (0 for January, 1 for February, etc.)
    $month_index = date('n', $timestamp) - 1; // Subtract 1 because arrays are zero-indexed
    $month_index_start = date('n', $mulai_magang_timestamp) - 1;
    $month_index_finish = date('n', $selesai_magang_timestamp) - 1;

    // Get the year
    $year = date('Y', $timestamp);
    $year_start = date('Y', $mulai_magang_timestamp);
    $year_finish = date('Y', $selesai_magang_timestamp);

    // Translate day of the week and month names to Bahasa Indonesia
    // $day_of_week = $indonesian_days[$day_index];
    $month = $indonesian_months[$month_index];
    $month_start = $indonesian_months[$month_index_start];
    $month_finish = $indonesian_months[$month_index_finish];

    // Construct the current date string
    $current_date_string =  $day . ' ' . $month . ' ' . $year;  // Format: hari, tanggal bulan tahun (misalnya Kamis, 15 Maret 2024)

    // Contoh nomor bentuknya string
    $nomor = $nomorSertif;

    // Format tanggal mulai magang
    $mulai_magang = $day_start . ' ' . $month_start . ' ' . $year_start;

    // Format tanggal selesai magang
    $selesai_magang = $day_finish . ' ' . $month_finish . ' ' . $year_finish;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Sertifikat</title>
        <style>
            /* Gaya desain sertifikat */
            body { 
                font-family: Arial, sans-serif;
                font-optical-sizing: auto;
                font-weight: 10px;
                font-style: normal;
            }
            .sertifikat {
                position: relative;
                width: 800px; /* Lebar sertifikat */
                height: 400px; /* Tinggi sertifikat */
                text-align: center; /* Rata tengah konten */
            }
            h1{
                font-size: 38px;
                font-weight: bold;
                color: goldenrod;
            }
            h2{
                font-size: 21px;
                font-weight: bold;
            }
        </style>
    </head>
    
    <body>
        <div class="sertifikat">
            <div><div><div><div><br></div></div></div></div>
            <h4><?php echo 'No.'. $nomor; ?></h4>
            <div>
                <br>
                <br>
            </div>
            <h1><?php echo $row['NAMA_MAHASISWA']; ?></h1>
            <h3>
                Telah menyelesaikan Praktik Kerja Lapangan di Kantor Kementerian Agama Kota Surabaya 
                terhitung mulai
            </h3>
            <h3>
                dari tanggal <?php echo $mulai_magang . ' sampai dengan ' . $selesai_magang; ?> dengan predikat nilai <?php echo '"' . $row['NILAI'] . '"'; ?>
            </h3>
            <div style="margin-top: 500px;">
                <h3><?php echo 'Surabaya, ' . $current_date_string; ?></h3>
            </div>
        </div>
    </body>
</html>