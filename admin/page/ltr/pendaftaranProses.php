<?php
require "../../../connect.php";

$sql = "SELECT * FROM umkmm";
$stmt = $conn->query($sql)->fetchAll();

$output = "";

foreach ($stmt as $data) {
    $output .= ' <tr> 
                <td>' . $data['id'] . '<td>
                <td>' . $data['tanggal_pendaftaran'] . '<td>
                <td>' . $data['nama_umkm'] . '<td>
                <td>' . $data['notelp_umkm'] . '<td>
                <td>' . $data['alamat_umkm'] . '<td>
                <td>' . $data['kecamatan'] . '<td>
                <td>' . $data['kategori_umkm'] . '<td>
                <tr> ';
}

echo $output;
