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

    foreach($stmt2 as $data){
        $output.=
        '<tr>
        <td>' . $data['id'] . '</td>
        <td>' . $data['tanggal_pendaftaran'] . '</td>
        <td>' . $data['nama_umkm'] . '</td>
        <td>' . $data['notelp_umkm'] . '</td>
        <td>' . $data['alamat_umkm'] . '</td>
        <td>' . $data['kecamatan'] . '</td>
        <td>' . $data['kategori_umkm'] . '</td>
        <td>' . $data['deskripsi_umkm'] . '</td>
        <td> <embed type="application/pdf" src="../../../forms/'. $data['formulir'] .'" style="width: 600; heigth: 400; overflow: hidden;"></embed> </td>
        <td> <embed type="application/pdf" src="../../../forms/'. $data['surat_pengantar'] .'" style="width: 600; heigth: 400; overflow: hidden;"></embed> </td>
        <td> <embed type="application/pdf" src="../../../forms/'. $data['ktp'] .'" style="width: 600; heigth: 400; overflow: hidden;"></embed> </td>
        <td> <embed type="application/pdf" src="../../../forms/'. $data['npwp'] .'" style="width: 600; heigth: 400; overflow: hidden;"></embed> </td>
        <td>
            <button type="button" class="btn btn-outline-success" onclick = "terima(' . $data['id'] . ')">Terima</button>
            <button type="button" class="btn btn-outline-danger" onclick = "tolak(' . $data['id'] . ')">Tolak</button>
        </td>
        </tr>';
    }
    echo $output;

?>