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
foreach ($stmt2 as $data) {

    $id = $data['id_umkm'];
    $nama_umkm = "SELECT nama_umkm FROM umkmm WHERE id = $id";
    $nama_umkm = $conn->query($nama_umkm)->fetch();

    $no++;
    $output .= '
        <tr>
            <td>' . $no . '</td>
            <td>' . $data['tanggal'] . '</td>
            <td>' . $nama_umkm['nama_umkm'] . '</td>
            <td>' . $data['alasan'] . '</td>
            <td> <embed type="application/pdf" src="../../../forms/' . $data['dokumen_pendukung'] . '" style="width: 600; heigth: 400; overflow: hidden;"></embed> </td>
            <td>' . $data['kebutuhan_dana_nominal'] . '</td>
            <td>' . $data['kebutuhan_dana_rincian'] . '</td>
            <td>' . $data['kebutuhan_tenda'] . '</td>
            <td>' . $data['kebutuhan_gerobak'] . '</td>
            <td>' . $data['kebutuhan_spanduk'] . '</td>
            <td>' . $data['kebutuhan_lainnya_ket'] . '</td>
            <td>' . $data['keterangan'] . '</td>
            <td>
            <button class="btn btn-outline-success" onclick="terimaBantuan(' . $data['id'] . ')">Terima</button>
            <button class="btn btn-outline-danger" onclick="tolakBantuan(' . $data['id'] . ')">Tolak</button>
            </td>
        </tr>
        ';
}
echo $output;
