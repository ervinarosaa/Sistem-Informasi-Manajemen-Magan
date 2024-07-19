<?php
include  '../koneksi.php';
session_start();
$admin=$_SESSION['admin'];

// Mengambil nilai dari form
$nis = $_POST['nis'];

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Logbook-Magang-export.xls");
?>

<p align="center" style="font-weight:bold;font-size:16pt">LOGBOOK MAGANG</p>
<br>

<?php 
    $view = null; // Initialize $view variable
    
    if (isset($_POST['exportLogbook'])) {
        // Mengambil nilai dari form
        $nis = $_POST['nis'];
        
        // Filter query
        $query = "SELECT a.ID_LOGBOOK, a.TANGGAL, a.KEGIATAN, b.NIS, b.NAMA_MAHASISWA, c.NAMA_LOKASI,d.NAMA_SEKOLAH_PT
                    FROM `tb_logbook` a 
                    JOIN `tb_mahasiswa` b ON a.ID_MAHASISWA = b.ID_MAHASISWA
                    JOIN `tb_lokasi_penempatan` c ON b.ID_LOKASI = c.ID_LOKASI
                    JOIN `tb_sekolah_pt` d ON b.ID_SEKOLAH_PT = d.ID_SEKOLAH_PT
                    WHERE b.NIS = '$nis'
                    ORDER BY a.TANGGAL";
        
        // Execute query and fetch data
        $view = $dbh->query($query);
    }
?>

<?php
    if($view !== null && $view->rowCount()>0){
        $no=1;
        while($data = $view->fetch()){
?>
        <p align="left" style="font-weight:normal;font-size:12pt">
            Nama   : <?php echo $data['NAMA_MAHASISWA'];?> <br>
            NIS    : <?php echo $data['NIS'];?><br>
            Asal   : <?php echo $data['NAMA_SEKOLAH_PT'];?><br>
            Lokasi : <?php echo $data['NAMA_LOKASI'];?>
        </p>



        <table border="1" class="table">
            <thead class=" text-primary">
                <th class="text-center">No</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Logbook</th>
            </thead>
            <tbody>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $data['TANGGAL'];?></td>
                            <td class="text-center"><?php echo $data['KEGIATAN'];?></td>
                        </tr>
            </tbody>
        </table>
<?php
        }
    }
?>





