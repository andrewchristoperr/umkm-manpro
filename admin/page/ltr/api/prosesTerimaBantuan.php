<?php
require "../../../../connect.php";

// if (empty($_SESSION['login'])) 
//     header('location: login.php');

$output = "";
$id = $_POST['id'];
$tolak = "UPDATE bantuan SET status = 1 WHERE id = $id";
$stmt = $conn->prepare($tolak);
$stmt->execute();

$query2 = "SELECT * FROM bantuan WHERE status = 2";
$stmt2 = $conn->query($query2)->fetchAll();
$no = 0;
foreach ($stmt2 as $row) {

    $id = $row['id_umkm'];
    $nama_umkm = "SELECT nama_umkm FROM umkmm WHERE id = $id";
    $nama_umkm = $conn->query($nama_umkm)->fetch();

    $no++;
    $output .= '
        <tr>
            <td>' . $no . '</td>
            <td>' . $row['tanggal'] . '</td>
            <td>' . $nama_umkm['nama_umkm'] . '</td>
            <td>' . $row['alasan'] . '</td>
            <td>' . $row['dokumen_pendukung'] . '</td>
            <td>' . $row['kebutuhan'] . '</td>
            <td>' . $row['keterangan'] . '</td>
            <td>
            <button class="btn btn-outline-success" onclick="terimaBantuan(' . $row['id'] . ')">Terima</button>
            <button class="btn btn-outline-danger" onclick="tolakBantuan(' . $row['id'] . ')">Tolak</button>
            </td>
        </tr>
        ';
}
echo $output;

?>