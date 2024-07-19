<?php
include  '../koneksi.php';
session_start();
$admin=$_SESSION['admin'];

// Mengambil nilai dari form
$tanggalAwal = $_POST['tanggalAwal'];
$tanggalAkhir = $_POST['tanggalAkhir'];

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-Arsip-Presensi-Magang " . $tanggalAwal . "-" . $tanggalAkhir . ".xls");
?>

<p align="center" style="font-weight:bold;font-size:16pt">LAPORAN ARSIP PRESENSI MAGANG</p>

<?php 
    $view = null; // Initialize $view variable
    
    if (isset($_POST['exportPresensi'])) {
        // Mengambil nilai dari form
        $tanggalAwal = $_POST['tanggalAwal'];
        $tanggalAkhir = $_POST['tanggalAkhir'];
        
        // Filter query
        $query = "SELECT a.ID_KEHADIRAN, a.TANGGAL, a.ID_KODE_KEHADIRAN, b.KODE_KEHADIRAN, c.NIS, c.NAMA_MAHASISWA, d.NAMA_LOKASI,e.NAMA_SEKOLAH_PT
        FROM `tb_kehadiran` a 
        JOIN `tb_kode_kehadiran` b ON a.ID_KODE_KEHADIRAN = b.ID_KODE_KEHADIRAN
        JOIN `tb_mahasiswa` c ON a.ID_MAHASISWA = c.ID_MAHASISWA
        JOIN `tb_lokasi_penempatan` d ON c.ID_LOKASI = d.ID_LOKASI
        JOIN `tb_sekolah_pt` e ON c.ID_SEKOLAH_PT = e.ID_SEKOLAH_PT
        WHERE a.TANGGAL BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
        ORDER BY a.TANGGAL";
        
        // Execute query and fetch data
        $view = $dbh->query($query);
    }
?>

<table border="1" class="table">
    <thead class=" text-primary">
        <th class="text-center">No</th>
        <th class="text-center">Nama</th>
        <th class="text-center">NIS/NIM</th>
        <th class="text-center">Asal Sekolah/PT</th>
        <th class="text-center">Lokasi</th>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Keterangan</th>
    </thead>
    <tbody>
        <?php
            if($view !== null && $view->rowCount()>0){
                $no=1;
                while($data = $view->fetch()){
        ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="text-left"><?php echo $data['NAMA_MAHASISWA'];?></td>
                    <td class="text-center"><?php echo $data['NIS'];?></td>
                    <td class="text-center"><?php echo $data['NAMA_SEKOLAH_PT'];?></td>
                    <td class="text-center"><?php echo $data['NAMA_LOKASI'];?></td>
                    <td class="text-center"><?php echo $data['TANGGAL'];?></td>
                    <td class="text-center"><?php echo $data['KODE_KEHADIRAN'];?></td>
                </tr>
        <?php
                }
            }
        ?>
    </tbody>
</table>






