<?php
include '../koneksi.php';
// require_once('db_simm');
require 'tcpdf_6_2_13/tcpdf/tcpdf.php'; // Sesuaikan path sesuai dengan struktur folder Anda
session_start();
// Periksa apakah sesi login pengguna tidak ada
if (!isset($_SESSION['admin'])) {
    // Redirect pengguna ke halaman login
    header("Location: ../index.php");
    exit; // Pastikan untuk keluar dari skrip setelah melakukan redirect
} else{
    $admin=$_SESSION['admin'];

    $id_mahasiswa = $_GET['ID_MAHASISWA'];
    $nomorSertif = $_GET['NOMOR_SERTIF'];

    // Fetch data for the selected student
    if (isset($_GET['ID_MAHASISWA'])) {
        $query = "SELECT a.ID_MAHASISWA, a.NAMA_MAHASISWA, a.MULAI_MAGANG, a.SELESAI_MAGANG, a.ID_NILAI, b.NILAI
                    FROM `tb_mahasiswa` a
                    JOIN `tb_nilai` b ON a.ID_NILAI = b.ID_NILAI
                    WHERE ID_MAHASISWA = $id_mahasiswa";
        $result = mysqli_query($koneksi, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Create new PDF document
            $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

            // Set document information
            $pdf->SetCreator('Admin');
            $pdf->SetAuthor('Admin');
            $pdf->SetTitle('Certificate for ' . $row['NAMA_MAHASISWA']); // Sesuaikan judul sertifikat dengan nama mahasiswa
            $pdf->SetSubject('Certificate');
            $pdf->SetKeywords('Certificate, TCPDF, PHP');

            // Set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

            // Set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // Set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // Set margins
            $pdf->SetMargins(0, 0, 0);
            $pdf->SetHeaderMargin(0);
            $pdf->SetFooterMargin(0);

            // Set auto page breaks
            $pdf->SetAutoPageBreak(false, 0);

            // Set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // Add a page
            $pdf->AddPage();

            // Set background image
            $pdf->Image('../assets/img/SERTIFIKAT PKL KEMENAG.jpg', 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), '', '', '', false, 300, '', false, false, 0);

            // Include HTML content
            ob_start(); // Start buffering HTML output
            include 'Sertifikat.php'; // Sesuaikan nama file PHP Anda
            $html = ob_get_clean(); // Get buffered HTML content
            $pdf->writeHTML($html, true, false, true, false, '');

            // Output PDF
            $pdf->Output($row['NAMA_MAHASISWA'] . '_certificate.pdf', 'I'); // Sesuaikan nama output PDF dengan nama mahasiswa
        } else {
            echo "Data not found!";
            exit;
        }
    } else {
        echo "Invalid request!";
        exit;
    }
}
?>
