<?php
    $host = 'localhost'; //nama host database
    $dbname = 'db_simm'; //nama database
    $username = 'root';
    $password = '';
    $koneksi = mysqli_connect("localhost", "root", "", "db_simm");

    try {
        // membuat koneksi ke database
        $dsn = "mysql:host=$host; dbname=$dbname";
        $dbh = new PDO($dsn, $username, $password);

        // Set error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Perintah SQL untuk cek apakah event sudah ada
        $checkEventQuery = "SELECT COUNT(*) AS event_count FROM information_schema.events WHERE event_name = 'UpdateStatusMahasiswa';";
        $stmt = $dbh->query($checkEventQuery);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $eventCount = $result['event_count'];
        
        // Jika event belum ada, maka buat event dan aktifkan scheduler global
        if($eventCount == 0) {
            // Perintah SQL untuk membuat event
            $createEventSql = "CREATE EVENT IF NOT EXISTS `UpdateStatusMahasiswa` 
                    ON SCHEDULE EVERY 1 SECOND 
                    STARTS '2024-03-15 09:02:33' 
                    ON COMPLETION NOT PRESERVE 
                    ENABLE 
                    DO 
                    BEGIN
                        -- Update ID_STATUS menjadi 2 jika SELESAI_MAGANG sama dengan tanggal saat ini
                        UPDATE tb_mahasiswa
                        SET ID_STATUS = 2
                        WHERE SELESAI_MAGANG = CURDATE();
                    END;";

            
            // Menjalankan perintah SQL untuk membuat event
            $dbh->exec($createEventSql);
            
            // Mengaktifkan scheduler event global
            $dbh->exec("SET GLOBAL event_scheduler='ON'");
        } else {
            // Jika event sudah ada, hanya perlu mengaktifkan scheduler event global
            $dbh->exec("SET GLOBAL event_scheduler='ON'");
        }
    } catch(PDOException $e) {
        echo "Koneksi ke database gagal: " . $e->getMessage();
    }
?>