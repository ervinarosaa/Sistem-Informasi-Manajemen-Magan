<?php
include  '../koneksi.php';
session_start();
$admin=$_SESSION['admin'];

// Mengambil nilai dari form
$tanggalAwal = $_POST['tanggalAwal'];
$tanggalAkhir = $_POST['tanggalAkhir'];

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-Arsip-Data-Magang " . $tanggalAwal . "-" . $tanggalAkhir . ".xls"); 

?>

<p align="center" style="font-weight:bold;font-size:16pt">LAPORAN ARSIP DATA MAGANG</p>

<?php
    $view = null; // Initialize $view variable
        
    if (isset($_POST['exportArsip'])) {
        // Mengambil nilai dari form
        $tanggalAwal = $_POST['tanggalAwal'];
        $tanggalAkhir = $_POST['tanggalAkhir'];
        
        // Default query
        $query = "SELECT * FROM `tb_mahasiswa` a 
        JOIN `tb_lokasi_penempatan` b ON a.ID_LOKASI = b.ID_LOKASI 
        JOIN `tb_status` c ON a.ID_STATUS = c.ID_STATUS 
        JOIN `tb_sekolah_pt` d ON a.ID_SEKOLAH_PT = d.ID_SEKOLAH_PT
        JOIN `tb_pendidikan` e ON d.ID_PENDIDIKAN = e.ID_PENDIDIKAN
        JOIN `tb_nilai` f ON a.ID_NILAI = f.ID_NILAI
        WHERE c.STATUS != 'Aktif' AND a.MULAI_MAGANG BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
        ORDER BY a.ID_MAHASISWA";
        
        // Execute query and fetch data
        $view = $dbh->query($query);
    }
?>

<table border="1" class="table">
    <thead class=" text-primary">
        <th class="text-center">No</th>
        <th class="text-center">Nama</th>
        <th class="text-center">NIS/NIM</th>
        <th class="text-center">Nomor Telepon</th>
        <th class="text-center">Tingkat Pendidikan</th>
        <th class="text-center">Sekolah/PT</th>
        <th class="text-center">Jurusan</th>
        <th class="text-center">Guru/Dosen Pembimbing</th>
        <th class="text-center">Kontak Pembimbing</th>
        <th class="text-center">Mulai Magang</th>
        <th class="text-center">Selesai Magang</th>
        <th class="text-center">Lokasi</th>
        <th class="text-center">Status</th>
        <th class="text-center">Nilai</th>
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
                    <td class="text-center"><?php echo $data['NIS'];?></td>
                    <td class="text-center"><?php echo "'" . $data['NO_TELP'];?></td>
                    <td class="text-center"><?php echo $data['TINGKAT_PENDIDIKAN'];?></td>
                    <td class="text-center"><?php echo $data['NAMA_SEKOLAH_PT'];?></td>
                    <td class="text-center"><?php echo $data['JURUSAN'];?></td>>
                    <td class="text-center"><?php echo $data['DOSEN_GURU_PEMBIMBING'];?></td>
                    <td class="text-center"><?php echo "'" . $data['KONTAK_PEMBIMBING'];?></td>
                    <td class="text-center"><?php echo $data['MULAI_MAGANG'];?></td>
                    <td class="text-center"><?php echo $data['SELESAI_MAGANG'];?></td>
                    <td class="text-center"><?php echo $data['NAMA_LOKASI'];?></td>
                    <td class="text-center"><?php echo $data['STATUS'];?></td>
                    <td class="text-center"><?php echo $data['NILAI'];?></td>
                </tr>
        <?php
                }
            }
        ?>
    </tbody>
</table>