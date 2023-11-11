<?php
require 'connect.php';

session_start();

$username = $_POST['username'];

$query = "SELECT * FROM umkmm WHERE username = ?";
$search = $conn->prepare($query);
$search->execute([$username]);

$row = $search->fetch();

if ($row) {
    $data = array(
        'nama_umkm' => $row['nama_umkm'],
        'kategori_umkm' => $row['kategori_umkm'],
        'alamat_umkm' => $row['alamat_umkm'],
        'kecamatan' => $row['kecamatan'],
        'notelp_umkm' => $row['notelp_umkm'],
        'deskripsi' => $row['deskripsi_umkm'],
    );

    echo json_encode($data);
}
?>