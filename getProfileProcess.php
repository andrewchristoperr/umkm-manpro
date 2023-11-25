<?php
require 'connect.php';

session_start();

$id = $_POST['id'];

$query = "SELECT * FROM umkmm WHERE id = ?";
$search = $conn->prepare($query);
$search->execute([$id]);

$row = $search->fetch();

if ($row) {
    $data = array(
        'nama_umkm' => $row['nama_umkm'],
        'notelp_umkm' => $row['notelp_umkm'],
        'alamat_umkm' => $row['alamat_umkm'],
        'kecamatan' => $row['kecamatan'],
        'kategori_umkm' => $row['kategori_umkm'],
        'deskripsi_umkm' => $row['deskripsi_umkm'],
    );

    echo json_encode($data);
}
?>