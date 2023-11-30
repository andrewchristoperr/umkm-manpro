<?php

    require '../connect.php';
    session_start();

    // send bantuan to database

        $id = $_SESSION['login'];
        $alasan_pengajuan = $_POST['alasan_pengajuan'];
        $dokumen_pendukung = $_POST['dokumen_pendukung'];
        $nominal = $_POST['nominal'];
        $rincian_dana = $_POST['rincian_dana'];
        $tenda = $_POST['tenda'];
        $gerobak = $_POST['gerobak'];
        $spanduk = $_POST['spanduk'];
        $lainnya = $_POST['lainnya'];
        $keterangan = $_POST['keterangan'];

        $sql = "INSERT INTO bantuan (id_umkm,alasan, dokumen_pendukung, kebutuhan_dana_nominal, kebutuhan_dana_rincian, kebutuhan_tenda, kebutuhan_gerobak, kebutuhan_spanduk, kebutuhan_lainnya_ket,keterangan) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $query = $conn->prepare($sql);
        $query->execute([$id, $alasan_pengajuan, $dokumen_pendukung, $nominal, $rincian_dana, $tenda, $gerobak, $spanduk, $lainnya, $keterangan]);

        echo json_encode(['status' => 'success', 'msg' => 'Berhasil Submit!']);
        // $stmt = $conn->query($query);

        // $sql = "INSERT INTO bantuan (alasan, dokumen_pendukung, keterangan) VALUES (?,?,?,?,?,?,?,?,?)";
        // $bindParam = [$alasan_pengajuan, $dokumen_pendukung,$keterangan];
        // $query = $conn->prepare("");
        // $query->execute($bindParam);
        // $bantuan = $query->fetch();
        // if ($query->rowCount() == 0) {
        //     $_SESSION['error'] = 'Pengajuan Bantuan Gagal!';
        // } else {
        //     $_SESSION['success'] = 'Pengajuan Bantuan Berhasil!';
        //     // header('location: profile.php');
        // }
    

    


?>