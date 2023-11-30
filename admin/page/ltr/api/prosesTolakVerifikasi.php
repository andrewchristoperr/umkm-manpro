<?php
require "../../../../connect.php";

// if (empty($_SESSION['login'])) 
//     header('location: login.php');
    $output="";
    $id = $_POST['id'];
    $tolak = "UPDATE umkmm SET verification_status = 0 WHERE id = $id";
    // $stmt = $conn->prepare($tolak);
    // $stmt->execute();
    $stmt = $conn->query($tolak);

    $query2 = "SELECT * FROM umkmm WHERE verification_status = 2";
    $stmt2 = $conn->query($query2)->fetchAll();

    foreach($stmt2 as $row){
        $output.='
        <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['tanggal_pendaftaran'].'</td>
            <td>'.$row['nama_umkm'].'</td>
            <td>'.$row['notelp_umkm'].'</td>
            <td>'.$row['alamat_umkm'].'</td>
            <td>'.$row['kecamatan'].'</td>
            <td>'.$row['kategori_umkm'].'</td>
            <td>'.$row['deskripsi_umkm'].'</td>
            <td>'.$row['formulir'].'</td>
            <td>'.$row['surat_pengantar'].'</td>
            <td>'.$row['ktp'].'</td>
            <td>'.$row['npwp'].'</td>
            <td>
            <button class="btn btn-outline-success" onclick="terima('. $row['id'] .')">Terima</button>
            <button class="btn btn-outline-danger" onclick="tolak('. $row['id'] .')">Tolak</button>
            </td>
        </tr>
        ';
    }
    echo $output;

?>