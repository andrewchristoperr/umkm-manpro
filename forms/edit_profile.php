<?php
require '../connect.php';
session_start();

$umkm_id = $_POST['id'];
$nama_umkm = $_POST['namaUMKM_edited'];
$deskripsi_umkm = $_POST['deskripsiUMKM_edited'];
$kategori_umkm = $_POST['kategoriUMKM_edited'];
$alamat_umkm = $_POST['alamatUMKM_edited'];
$kecamatan = $_POST['kecamatanUMKM_edited'];
$notelp_umkm = $_POST['noWhatsApp_edited'];

$query = "UPDATE umkmm SET nama_umkm = ?, deskripsi_umkm = ?, kategori_umkm = ?, alamat_umkm = ?, kecamatan = ?, notelp_umkm = ? WHERE id = ?";
$update = $conn->prepare($query);
$update->execute([$nama_umkm, $deskripsi_umkm, $kategori_umkm, $alamat_umkm, $kecamatan, $notelp_umkm, $umkm_id]);

$result = 1;

echo $result;
?>